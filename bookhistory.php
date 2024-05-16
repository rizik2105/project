<?php
    session_start();
    if (!isset($_SESSION["minor"])) {
        header("location:./signin.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrowed Books - College Library</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #408b88;
            color: #070210;
            padding: 10px 20px;
            text-align: center;
        }
        nav {
            background-color: black;
            color: #fff;
            padding: 10px;
            text-align: center;
        }
        nav a {
            color: white ;
            text-decoration: box-shadow;
            padding: 10px 20px;
        }
        nav a:hover {
            background-color: #555;
        }
        section {
            padding: 20px;
            text-align: center ;
            h1 {
               font-size: 100px;
        }
        }
        footer {
            background-color:  #4d918f;
            color:  #070107;
            text-align: center;
            padding: 10px;
            /* position: fixed;
            bottom: 0;
            width: 100%; */
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #1e7b7b;
            color: #1c0404;
        }
        button{
            display: inline-block;
            padding: 10px 20px;
            background-color:  #1e7b7b;
            color:  #1c0404;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin: 2px 0;
            text-align: center;
        }
        body{
    min-height: 100vh;
    display: flex;
    flex-direction: column;
}
footer{
    margin-top: auto;
}
    </style>
</head>
<body>
    <header>
        <h1>College Library</h1>
    </header>
    <nav>
        <a href="secondpage.php">Home</a>
        
    </nav>
    <section>
        <h2>Borrowed Books</h2>
        <table id="myTable">
        
        <tr>
            <th>Book Number</th>
            <th>Book Name</th>
            <th>Borrowed Date</th>
            <th>Return Date</th>
            <th>Due/On Time</th>
            <th>Late Fees</th>
            <th>Actions</th> 
        </tr>

    
        </table>
        <button onclick="addRow()">Add New Row</button>
    </section>
    <form method="post" action="logout.php">
        <button type="submit" name="logout">Logout</button> 
    </form>
    <footer>
        <p>&copy; 2024 College Library Management System</p>
    </footer>
        <script>
        function editRow(button) {
            var row = button.parentNode.parentNode;
            var cells = row.getElementsByTagName("td");
            var BookNumber = cells[0].innerText;
            var BookName = cells[1].innerText;
            var BorrowedDate = cells[2].innerText;
            var ReturnDate = cells[3].innerText;
            var DueOnTime = cells[4].innerText;
            var LateFees = cells[5].innerText;

            var newBookNumber = prompt("Book Number", BookNumber);
            var newBookName = prompt("Book Name", BookName);
            var newBorrowedDate = prompt("Borrowed Date", BorrowedDate);
            var newReturnDate = prompt("Return Date", ReturnDate);
            var newDueOnTime = prompt("Due/On Time", DueOnTime);
            var newLateFees = prompt("Late Fees", LateFees);

            if (newBookNumber !== null && newBookName !== null && newBorrowedDate !== null && newReturnDate !== null && newDueOnTime !== null && newLateFees !== null) {
                cells[0].innerText = newBookNumber;
                cells[1].innerText = newBookName;
                cells[2].innerText = newBorrowedDate;
                cells[3].innerText = newReturnDate;
                cells[4].innerText = newDueOnTime;
                cells[5].innerText = newLateFees;
            }
        }

        function deleteRow(button) {
            var row = button.parentNode.parentNode;
            row.parentNode.removeChild(row);
        }

        function addRow() {
            var table = document.getElementById("myTable");
            var newRow = table.insertRow(-1); // Insert row at the last position

            var cell1 = newRow.insertCell(0); // Insert cells to the new row
            var cell2 = newRow.insertCell(1);
            var cell3 = newRow.insertCell(2);
            var cell4 = newRow.insertCell(3);
            var cell5 = newRow.insertCell(4);
            var cell6 = newRow.insertCell(5);
            var cell7 = newRow.insertCell(6);

            
            cell1.innerHTML = "New Book Number";
            cell2.innerHTML = "New Book Name";
            cell3.innerHTML = "New Borrowed Date";
            cell4.innerHTML = "New Return Date";
            cell5.innerHTML = "New Due/On Time";
            cell6.innerHTML = "New Late Fees";

            
            cell7.innerHTML = '<button onclick="editRow(this)">Edit</button>' + 
                              '<button onclick="deleteRow(this)">Delete</button>';
        }
    </script>
</body>
</html>

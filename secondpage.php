<?php
include "conn.php";
session_start();
if (!isset($_SESSION["minor"])) {
    header("location:./signin.php");
    session_start();
    if (!isset($_SESSION["minor"])) {
        header("location:./signin.php");
    }


    $query = "SELECT * FROM second_page";
    $result = mysqli_query($conn, $query);

    echo "<table id='mytable'>";
    echo "<tr>
            <th>S No.</th>
            <th>Book Name</th>
            <th>Author Name</th>
            <th>Available</th>
            <th>Actions</th>
          </tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['S No.']}</td>
                <td>{$row['Book Name']}</td>
                <td>{$row['Author Name']}</td>
                <td>{$row['Available']}</td>
                <td>
                    <button onclick='editRow(this)'>Edit</button>
                    <button onclick='deleteRow(this)'>Delete</button>
                </td>
              </tr>";
    }
    echo "</table>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College Library</title>
    <style>
        button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #1e7b7b;
            color: white;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin: 2px 0;
            text-align: center;
        }

        form {
            text-align: center;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #1e7b7b;
            color: #fff;
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
            color: #fff;
            text-decoration: box-shadow;
            padding: 10px 20px;
        }

        nav a:hover {
            background-color: #555;
        }

        section {
            padding: 20px;
            text-align: center;
        }

        h1 {
            font-size: 50px;
        }

        footer {
            background-color: #1e7b7b;
            color: #fff;
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

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
            color: #333;
        }

        body {
            font-family: Arial, sans-serif;
        }

        .search-container {
            text-align: right;
            margin-top: 50px;
        }

        .search-container input[type=text] {
            padding: 10px;
            width: 100px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
            font-size: 16px;
        }

        .search-container input[type=submit] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .search-container input[type=submit]:hover {
            background-color: #45a049;
        }

        .button {
            text-align: right;
        }

        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        footer {
            margin-top: auto;
        }
    </style>
</head>

<body>
    <header>
        <h1>College Library</h1>
    </header>
    <nav>
        <a href="bookhistory.php">Book History</a>

    </nav>
    <form method="post" action="logout.php">
        <button type="submit" name="logout">Logout</button>
    </form>
    <div class="search-container">
        <form action="secondpage.php" method="GET">
            <input type="text" name="query" placeholder="Search ">
            <input type="submit" value="Search">
        </form>
    </div>

    <section>

        <h1> Books List</h1>

        <button onclick="addRow()">Add New Row</button>

        <table id="mytable">

            <tr>
                <th>S No.</th>
                <th>Book Name</th>
                <th>Author Name</th>
                <th>Available</th>
                <th>Actions</th>
                <button class="button" onclick="saveData()">Save</button>
            </tr>
        </table>
    </section>
    <footer>
        <p> College Library Management System</p>
    </footer>
                
    <script>
        function editRow(button) {
            var row = button.parentNode.parentNode.parentNode.parentNode;
            var cells = row.getElementsByTagName("td");
            var SNo = cells[0].innerText;
            var BookName = cells[1].innerText;
            var AuthorName = cells[2].innerText;
            var Available = cells[3].innerText;





            var SNo = prompt("S No.", SNo);
            var BookName = prompt("Book Name", BookName);
            var AuthorName = prompt("Author Name", AuthorName);
            var Available = prompt("Available", Available);


            if (SNo !== null && BookName !== null && AuthorName !== null && Available !== null) {
                cells[0].innerText = SNo;
                cells[1].innerText = BookName;
                cells[2].innerText = AuthorName;
                cells[3].innerText = Available;
            }
        }

        function deleteRow(button) {
            var row = button.parentNode.parentNode;
            row.parentNode.removeChild(row);
        }

        function addRow() {
            var table = document.getElementById("mytable");
            var newRow = table.insertRow(-1);

            var cell1 = newRow.insertCell(0);
            var cell2 = newRow.insertCell(1);
            var cell3 = newRow.insertCell(2);
            var cell4 = newRow.insertCell(3);
            var cell5 = newRow.insertCell(4);

            cell1.innerHTML = "New S No.";
            cell2.innerHTML = "New Book Name";
            cell3.innerHTML = "New Author Name";
            cell4.innerHTML = "Yes";

            cell5.innerHTML = '<button onclick="editRow(this)">Edit</button>' +
                '<button onclick="deleteRow(this)">Delete</button>';
        }


        
        



        
    </script>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $sno = $_POST['sno.'];
        $bookname = $_POST['bookname'];
        $authorname = $_POST['authorname'];
        $available = $_POST['available'];
        $query = "INSERT * INTO second_page WHERE sno = '$sno'AND bookname = '$bookname' AND authorname = '$authorname' AND available = '$available'";
        $result = $conn->query($query);
        if ($result && $result->num_rows > 0) {
            echo "new record insert successfully";
            exit();
        } else {
            echo '<script>alert("Invalid Roll No or Password. Please try again.");</script>';
        }
    }
    ?>

</body>

</html>

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
            position: fixed;
            bottom: 0;
            width: 100%;
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
    <thead>
        <tr>
            <th>Book Number</th>
            <th>Book Name</th>
            <th>Borrowed Date</th>
            <th>Return Date</th>
            <th>Due/On Time</th>
            <th>Late Fees</th>
            <th>Actions</th> <!-- New column for edit/delete buttons -->
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>101</td>
            <td>Python Learning edition 2</td>
            <td>27-02-2024</td>
            <td>25-10-2024</td>
            <td>On Time</td>
            <td>0rs</td>
            <td>
                <button onclick="editRow(this)">Edit</button>
                <button onclick="deleteRow(this)">Delete</button>
            </td>
        </tr>
        <tr>
            <td>102</td>
            <td>Let Us C</td>
            <td>05-05-2023</td>
            <td>14-04-2024</td>
            <td>Due</td>
            <td>50rs</td>
            <td>
                <button onclick="editRow(this)">Edit</button>
                <button onclick="deleteRow(this)">Delete</button>
            </td>
        </tr>
    </tbody>
</table>
    </section>
    <footer>
        <p>&copy; 2024 College Library Management System</p>
    </footer>
    <form method="post" action="logout.php">
            <button type="submit" name="logout">Logout</button> 
        </form>
        <script>
    function editRow(button) {
        var row = button.parentNode.parentNode;
        var cells = row.getElementsByTagName("td");
        var name = cells[0].innerText;
        var email = cells[1].innerText;
        var newName = prompt("Enter new name:", name);
        var newEmail = prompt("Enter new email:", email);

        if (newName !== null && newEmail !== null) {
            cells[0].innerText = newName;
            cells[1].innerText = newEmail;
        }
    }

    function deleteRow(button) {
        var row = button.parentNode.parentNode;
        row.parentNode.removeChild(row);
    }
</script>
</body>
</html>

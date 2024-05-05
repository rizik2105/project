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
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            text-align: center;
        }
        nav {
            background-color: #444;
            color: #fff;
            padding: 10px;
            text-align: center;
        }
        nav a {
            color: #fff;
            text-decoration: none;
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
            background-color: #333;
            color: #fff;
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
            background-color: #f2f2f2;
            color: #333;
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
        <table>
            <tr>
                <th>book number</th>
                <th>book name</th>
                <th>Borrowed Date</th>
                <th>Return Date</th>
                <th>due/on time</th>
                <th>late fees have to pay</th>
            </tr>
            <tr>
                <td>101</td>
                <td>Python Learning edition 2</td>
                <td>27-02-2024</td>
                <td>25-10-2024</td>
                <td>on time</td>
                <td>0rs</td>
            </tr>
            <tr>
                <td>102</td>
                <td>Let Us C</td>
                <td>05-05-2023</td>
                <td>14-04-2024</td>
                <td>Due</td>
                <td>50rs</td>
            </tr>
        </table>
    </section>
    <footer>
        <p>&copy; 2024 College Library Management System</p>
    </footer>
    <form method="post" action="logout.php">
            <button type="submit" name="logout">Logout</button> 
        </form>
</body>
</html>

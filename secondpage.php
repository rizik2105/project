<?php
    include "conn.php";
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
    <title>College Library</title>
    <style>

        button{
            display: inline-block;
            padding: 10px 20px;
            background-color:#1e7b7b;
            color: white;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin: 2px 0;
            text-align: center;
        }
        form{
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

    </style>
</head>
<body>
    <header>
        <h1>College Library</h1>
    </header>
    <nav>
        <a href="secondpage.php">Home</a>
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


        <table>
            <tr>
                <th>S No.</th>
                <th>Book Name</th>
                <th>Author Name</th>
                <th>Available</th>
                
            </tr>
            <tr>
                <td>101</td>
                <td>Python Learning edition 2</td>
                <td>Mark Lutz </td>
                <td>yes</td>
            </tr>
            <tr>
                <td>102</td>
                <td>Let Us C</td>
                <td>Yashavant P Kanetkar</td>
                <td>yes</td>
            </tr>
        </table>
    </section>
    <footer>
        <p>&copy;  College Library Management System</p>
    </footer>
    
</body>
</html>

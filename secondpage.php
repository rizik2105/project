<?php
include "conn.php";
session_start();

if (!isset($_SESSION["minor"])) {
    header("location:./studentlogin.php");
    exit();
}

$query = "SELECT * FROM book_history";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College Library</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
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
            color: gray;
            text-decoration: none;
            padding: 10px 20px;
        }

        nav a:hover {
            background-color: #555;
        }

        section {
            padding: 20px;
            text-align: center;
            flex: 1;
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

        .button {
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

        .logout-container {
            text-align: center;
            margin: 20px 0;
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
        <!-- Navigation links can be added here -->
    </nav>
    <section>
        <h1>Books List</h1>
        <table id="mytable">
            <thead>
                <tr>
                    <th>S No.</th>
                    <th>Book Name</th>
                    <th>Author Name</th>
                    <th>Available</th>
                    <th>Borrowed Date</th>
                    <th>Return Date</th>
                    <th>Due/On Time</th>
                    <th>Late Fees</th>
                    <th>book location</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    $count = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                            <td>{$count}</td>
                            <td>" . ucwords(strtolower($row["bookname"])) . "</td>
                            <td>" . ucwords(strtolower($row["author"])) . "</td>
                            <td>" . ucwords(strtolower($row["available"])) . "</td>
                            <td>" . ucwords(strtolower($row["borroweddate"])) . "</td>
                            <td>" . ucwords(strtolower($row["returndate"])) . "</td>
                            <td>" . ucwords(strtolower($row["dueontime"])) . "</td>
                            <td>" . ucwords(strtolower($row["latefees"])) . "</td>
                            <td>" . ucwords(strtolower($row["booklocation"])) . "</td>
                            <td>
                                <form action='editbh.php' method='post' style='display:inline-block;'>
                                    <input type='hidden' name='item_id' value='{$row["sno"]}'>
                                    <button type='submit' class='button'>Edit</button>
                                </form>
                               
                            </td>
                        </tr>";
                        $count++;
                    }
                } else {
                    echo "<tr><td colspan='9'>No results found</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <div class="logout-container">
            <form method="post" action="logout.php">
                <button type="submit" name="logout" class="button">Logout</button>
            </form>
        </div>
    </section>
    <footer>
        <p>College Library Management System</p>
    </footer>
</body>

</html>

<?php
include "conn.php";
session_start();
if (!isset($_SESSION["minor"])) {
    header("location:./studentlogin.php");
    session_start();
    if (!isset($_SESSION["minor"])) {
        header("location:./studentlogin.php");
    }
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
            display: inline-block;
           
        }

        .button-container {
            display: flex;
            gap: 10px;
            justify-content: center;
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
            text-decoration: none;
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

        .logout-container {
            display: flex;
            justify-content: center;
            margin-bottom: 20px; /* Adjust margin as needed */
        }

        footer {
            background-color: #1e7b7b;
            color: #fff;
            text-align: center;
            padding: 10px;
            margin-top: auto;
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

        .search-container {
            text-align: center;
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

        .popup {
            position: relative;
            display: inline-block;
            cursor: pointer;
            user-select: none;
        }

        .popup .popuptext {
            visibility: hidden;
            width: 160px;
            background-color: #555;
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 8px 0;
            position: absolute;
            z-index: 1;
            bottom: 125%;
            left: 50%;
            margin-left: -80px;
        }

        .popup .popuptext::after {
            content: "";
            position: absolute;
            top: 100%;
            left: 50%;
            margin-left: -5px;
            border-width: 5px;
            border-style: solid;
            border-color: #555 transparent transparent transparent;
        }
            
        .borrow-button,
        .location-button {
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

        .location-button {
            background-color: #1e7b7b; 
        }

        footer {
            background-color: #1e7b7b;
            color: white;
            text-align: center;
            padding: 15px;
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
        }
        
    </style>
</head>
<body>
    <header>
        <h1>College Library</h1>
    </header>
    <nav>
    </nav>
    <section>
        <h1>Books List</h1>
        <?php
        include "conn.php";
        $q = "SELECT * FROM book_history";
        $result = $conn->query($q);
        if ($result->num_rows > 0) {
            $count = 1;
            echo '<table id="student" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>S.NO.</th><th>Book Name</th>
                        <th>Author</th><th>Available</th><th>Action</th>
                    </tr>
                </thead>
                <tbody>';
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $count++ . "</td>
                    <td>" . ucwords(strtolower($row["bookname"])) . "</td>
                    <td>" . ucwords(strtolower($row["author"])) . "</td>
                    <td>" . ucwords(strtolower($row["available"])) . "</td>

                    
                    <td>
                        <div class='button-container'>
                            <form   action='borrow.php' method='post'>
                                <input type='hidden' value='" . $row["sno"] . "' name='sno'>
                                <input class='borrow-button' type='submit' value='Borrow'>
                            </form>
                            <form action='studentlocation.php' method='post'>
                                <input type='hidden' value='" . $row["sno"] . "' name='sno'>
                                <input class='location-button' type='submit' value='Location'>
                            </form>
                            
                        </div>
                    </td>
                </tr>";
            }
            echo '</tbody></table>';
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>
        <div class="logout-container">
    <form method="post" action="logout.php">
        <button type="submit" name="logout">Logout</button>
    </form></div>
    </section>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $sno = $_POST['sno.'];
        $bookname = $_POST['bookname'];
        $authorname = $_POST['authorname'];
        $available = $_POST['available'];
        $query = "INSERT * INTO second_page  WHERE sno = '$sno'AND bookname = '$bookname' AND authorname = '$authorname' AND available = '$available'";
        $result = $conn->query($query);
        if ($result && $result->num_rows > 0) {
            echo "new record insert successfully";
            exit();
        } else {
            echo '<script>alert("Invalid Roll No or Password. Please try again.");</script>';
        }
    }
    ?>
<footer>
        <p>Libary Management 2024</p>
        <p>Copyright © 2024 All Rights Reserved</p>
    </footer>
</body>

</html>

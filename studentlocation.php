<?php
include "conn.php";
session_start();
?>


<!DOCTYPE html>
<html lang="en">


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College Library</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            width: 100%;
            max-width: 400px;
            margin: 40px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form {
            width: 400px;
            margin: 0 auto;
        }

        input[type="text"],
        input[type="password"],
        input[type="email"],
        select {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            box-sizing: border-box;
        }

        input[type="button"] {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            background-color: #4CAF50;
            color: green;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        h2 {
            font-size: 30px;
        }

        input[type="submit"] {
            width: 100%;
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        footer {
            background-color: #3475b0;
            color: white;
            text-align: center;
            padding: 20px;
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
        }
    </style>

<body>


  


</body>
<div class="container">
<?php
    if(isset($_POST['sno'])){
        $sno = $_POST['sno'];
    } else {
        header("location:./studentpage.php");
        exit;
    }
    include "conn.php";
    $q = "SELECT booklocation FROM book_history where sno = $sno";
    $result = $conn->query($q);
    if ($result->num_rows > 0) {
        $count = 1;
        
        echo '<table id="student" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <td>Book Location</td>
                </tr>
            </thead>
            <tbody>';
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>" . ucwords(strtolower($row["booklocation"])) . "</td>
                
            </tr>";
        }
        echo '</tbody></table>';
    } else {
        echo "0 results";
    }
    $conn->close();
?>
</div>


</html>

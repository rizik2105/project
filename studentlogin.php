<?php
    include "conn.php";
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=2.0">
    <title>minor</title>
</head>
<body>
<img src="https://www.polygwalior.ac.in/mono3.jpg" alt="Description of the image" width="2000" height="150">

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College Website Login</title>
    <style>
        
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: white;
        }

        .container {
            width: 100%;
            max-width: 400px;
            margin: 100px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        input[type="text"],
        input[type="password"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
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

        input[type="submit"]:hover {
            background-color: #45a049;
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
</head>
<body>

<div class="container">
    <h2>Login</h2>
    <form action="#" method="post">
        <input type="text" name="Roll No" placeholder="Roll No" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" value="Login">
    </form>
</div>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $rollNo = $_POST['Roll_No'];
    $password = $_POST['password'];
    $query = "SELECT * FROM signup WHERE ROLLNO = '$rollNo' AND password = '$password'";
    $result = $conn->query($query);
    if ($result && $result->num_rows > 0) {
        $_SESSION["minor"] = "1";
        header("Location:studentpage.php");
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

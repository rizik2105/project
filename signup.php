<?php
include "conn.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=2.0">
    <title>College Website Sign Up</title>
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

    </style>
    
</head>

<body>

    <?php
    include 'conn.php';
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        // if (!empty($_POST['ROLLNO'])) {
        //     echo '<script>
        //  document.getElementById("error").innerHTML = "Invalid ROLLNO format";
        //  </script>';
        // } else {
            // $data = "SELECT `ROLLNO` FROM signup WHERE ROLLNO = '" . $_POST['ROLLNO'] . "'";
            // $result = $conn->query($data);
        //     if ($result->num_rows > 0) {
        //         echo '<script>
        //    document.getElementById("error").innerHTML = "ROLLNO already exsits";
        //    </script>';
        //     } else {
                $query = "INSERT INTO `signup`(`firstname`, `lastname`, `ROLLNO`, `password`, `role`) VALUES ('".$_POST['firstname']."','".$_POST['lastname']."','".$_POST['ROLLNO']."','".$_POST['password']."','".$_POST['role']."');";
                $conn->query($query);
                header("Location: signin.php");
        //     }
        // }
    }
    ?>
    
     
    <div>
        <img src="https://www.polygwalior.ac.in/mono3.jpg" alt="Description of the image" width="1500" height="150">
        <div class="container">
        <h2>Create account</h2>
        <form action="signup.php" method="post">
            <input type="text" name="firstname" placeholder="First Name" required><br>
            <input type="text" name="lastname" placeholder="last name" required><br>
            <input type="text" name="ROLLNO" placeholder="Roll No/username" required><br>
            <input type="password" minlength="8" name="password" placeholder="Password" id="pass" required><br>
            <input type="password" minlength="8" name="Reenterpassword" placeholder="Re-enter Password" id="conf_pass" required><br>
            <select name="role" required>
                <option value="">Select Role</option>
                <option value="student" name="student">Student</option>
                <option value="faculty" name="faculty">Faculty</option>
            </select>
            <div id="is-pass-correct"></div>
           <input type="submit" value="Create account">
    </form>
        </form>
        </div>
        <p id="error"></p>
    </div>
    <script>
        const password = document.getElementById("pass");
        const conf_password = document.getElementById("conf_pass");
        const is_correct = document.getElementById('is-pass-correct');

        function checkPasswords() {
            if (password.value === "" && conf_password.value === "") {
                is_correct.style.display = 'none';
            } else if (password.value === conf_password.value) {
                is_correct.style.display = 'block';
                is_correct.innerHTML = "<p>Password Is Correct ✅</p>";
            } else {
                is_correct.style.display = 'block';
                is_correct.innerHTML = "<p>Password Is Not Correct ❌</p>";
            }
        }

        password.addEventListener("input", checkPasswords);
        conf_password.addEventListener("input", checkPasswords);
        
    </script>
</body>
</html>
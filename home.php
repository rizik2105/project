<!DOCTYPE html>
<html>
<head>
    <style>
        /* Style for the signup and login links */
        a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #3475b0 ;
            color: white;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
        }

        a:hover {
            background-color: darkgreen;
        }

        nav {
            background-color: #3475b0;
            overflow: hidden;
            text-align: center; /* Center align the links within the nav */
        }

        nav a {
            display: inline-block; /* Display links in a line */
            color: white;
            padding: 14px 16px;
            text-decoration: none;
        }

        nav a:hover {
            background-color: #0056b3;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #3475b0;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
        }

        .dropdown-content a:hover {
            background-color: #0056b3;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        footer {
            background-color: #3475b0;
            color: white;
            text-align: center;
            padding: 2px;
            
            left: 0;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <img src="https://www.polygwalior.ac.in/mono3.jpg" alt="Description of the image" width="1400" height="120"><br>
    
    <nav>
        <div class="dropdown">
            <a class="blog-nav-item" href="signup.php">Create Account</a>
            <a class="blog-nav-item" href="studentlogin.php">Student Login</a>
            <a class="blog-nav-item" href="facultylogin.php">Faculty Login</a>
            <div class="dropdown-content">
            </div>
        </div>
    </nav>
    
    <img src="https://www.polygwalior.ac.in/image/Picture%20060.jpg" alt="Second slide" style="width: 100%;">
    <footer>
        <p>Libary Management 2024</p>
        <p>Copyright © 2024 All Rights Reserved</p>


    </footer>
</body>
</html>

<?php
session_start();

// Initialize the number of books if not set
if (!isset($_SESSION['number_of_books'])) {
    $_SESSION['number_of_books'] = 10; // starting with 10 books
}

// Check if the button is clicked
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['decrease'])) {
        if ($_SESSION['number_of_books'] > 0) {
            $_SESSION['number_of_books']--;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book Counter</title>
</head>
<body>
    <h1>Number of Books: <?php echo $_SESSION['number_of_books']; ?></h1>
    <form method="post">
        <button type="submit" name="decrease">Decrease Number of Books</button>
    </form>
</body>
</html>

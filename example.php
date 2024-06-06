<?php
include "conn.php";
session_start();

if (!isset($_SESSION["borrow_details"])) {
    header("location:./example.php");
    exit();
}

$borrow_details = $_SESSION['borrow_details'];
$first_name = $borrow_details['first_name'];
$roll_number = $borrow_details['roll_number'];
$bookname = $borrow_details['bookname'];

// Clear session data after displaying
unset($_SESSION['borrow_details']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrowed Book Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .container {
            text-align: center;
        }
        h1 {
            font-size: 50px;
            color: #1e7b7b;
        }
        p {
            font-size: 20px;
            color: #333;
        }
        .button {
            padding: 10px 20px;
            background-color: #1e7b7b;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            text-decoration: none;
        }
        .button:hover {
            background-color: #155d5d;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Book Borrowed Successfully</h1>
        <p><strong>First Name:</strong> <?php echo htmlspecialchars($first_name); ?></p>
        <p><strong>Roll Number:</strong> <?php echo htmlspecialchars($roll_number); ?></p>
        <p><strong>Book Name:</strong> <?php echo htmlspecialchars($bookname); ?></p>
        <a href="studentpage.php" class="button">Go Back</a>
    </div>
</body>

</html>















<?php
include "conn.php";
$id_to_delete = 1; // Example ID to delete
$sql = "DELETE FROM books_history WHERE id = ?";
?>
<?php
// Prepare the statement
$stmt = $conn->prepare($sql);

// Bind the parameter (assuming id is an integer)
$stmt->bind_param("bookname", $bookname);

// Execute the statement
if ($stmt->execute()) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>

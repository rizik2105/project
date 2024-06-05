<?php
include "conn.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the input values
    $sno = $_POST['sno'];
    $bookname = $_POST['bookname'];
    $author = $_POST['author'];
    $available = $_POST['available'];
    $booklocation = $_POST['booklocation'];
    $quantity = $_POST['quantity'];


    // Prepare the SQL statement
    $q = "UPDATE book_history SET 
        bookname = ?,
        author = ?,
        available = ?,
        booklocation = ?,
        quantity = ?
        WHERE sno = ?";

    // Initialize prepared statement
    if ($stmt = $conn->prepare($q)) {
        // Bind parameters (s - string)
        $stmt->bind_param("ssssss", $bookname,$author, $available, $booklocation,$quantity, $sno);

        // Execute the statement
        if ($stmt->execute()) {
            echo "<script>
                alert(' Successfully Updated!!');
                window.location.href='secondpage.php';
                </script>";
        } else {
            echo "<script>
                alert('Not Updated!!');
                window.location.href='secondpage.php';
                </script>";
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
}

// Close the connection
$conn->close();
?>

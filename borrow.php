<?php
include "conn.php";
session_start();
if (!isset($_SESSION["minor"])) {
    header("location:./studentlogin.php");
    exit();
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sno = $_POST['sno'];
    $checkQuery = "SELECT quantity FROM book_history WHERE sno = '$sno'";
    $checkResult = $conn->query($checkQuery);
    if ($checkResult->num_rows > 0) {
        $row = $checkResult->fetch_assoc();
        $quantity = $row['quantity'];
        if ($quantity > 0) {
            $updateQuery = "UPDATE book_history SET quantity = quantity - 1 WHERE sno = '$sno'";
            if ($conn->query($updateQuery) === TRUE) {

                $rollNo = $_SESSION['rollNumber'];
                $user_history= "INSERT INTO `user_history`(`rollno`, `booknumber`) VALUES ('$rollNo','$sno')";
                $result = $conn->query($user_history);
                
                $checkQuantityQuery = "SELECT quantity FROM book_history WHERE sno = '$sno'";
                $checkQuantityResult = $conn->query($checkQuantityQuery);
                if ($checkQuantityResult->num_rows > 0) {
                    $updatedRow = $checkQuantityResult->fetch_assoc();
                    $updatedQuantity = $updatedRow['quantity'];
                    if ($updatedQuantity == 0) {
                        $updateAvailableQuery = "UPDATE book_history SET available = 'No' WHERE sno = '$sno'";
                    
                        $conn->query($updateAvailableQuery);
                    }
                    else
                    {
                        $updateAvailableQuery = "UPDATE book_history SET available = 'Yes' WHERE sno = '$sno'";
                    
                        $conn->query($updateAvailableQuery);
                    }
                }
                echo "<script>alert('Book borrowed successfully!'); window.location.href = 'studentpage.php';</script>";
            } else {
                echo "<script>alert('Error borrowing book: " . $conn->error . "'); window.location.href = 'studentpage.php';</script>";
            }
        } else {
            echo "<script>alert('Book not available'); window.location.href = 'studentpage.php';</script>";
        }
    } else {
        echo "<script>alert('Invalid book selection'); window.location.href = 'studentpage.php';</script>";
    }
}
$conn->close();
?>

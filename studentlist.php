<?php
include "conn.php";

// Prepare the SQL query to select all records from the book_history table
$query = "SELECT bookname, borroweddate, authorname, available, returndate, dueontime, latefees FROM book_history";

// Execute the query and get the result set
$result = $conn->query($query);

if ($result->num_rows > 0) {
    // Start the table
    echo "<table>
            <tr>
                <th>Book Name</th>
                <th>Borrowed Date</th>
                <th>Author Name</th>
                <th>Available</th>
                <th>Return Date</th>
                <th>Due on Time</th>
                <th>Late Fees</th>
            </tr>";
    
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($row['bookname']) . "</td>
                <td>" . htmlspecialchars($row['borroweddate']) . "</td>
                <td>" . htmlspecialchars($row['authorname']) . "</td>
                <td>" . htmlspecialchars($row['available']) . "</td>
                <td>" . htmlspecialchars($row['returndate']) . "</td>
                <td>" . htmlspecialchars($row['dueontime']) . "</td>
                <td>" . htmlspecialchars($row['latefees']) . "</td>
              </tr>";
    }

    // End the table
    echo "</table>";
} else {
    echo "0 results";
}

// Close the connection
$conn->close();
?>

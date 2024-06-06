<html>
<head>
<style>
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
        /* style.css */

/* General body styling */
body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f9;
    margin: 0;
    padding: 20px;
    color: #333;
}

/* Styling for headings */
h1, h2 {
    color: #4CAF50;
    text-align: center;
    margin-bottom: 20px;
}

/* Form styling */
form {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

/* Table styling */
table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

/* Table header and data cell styling */
th, td {
    border: 1px solid #ddd;
    padding: 12px;
    text-align: left;
}

th {
    background-color: #4CAF50;
    color: white;
}

td {
    background-color: #f9f9f9;
}

/* Input field styling */
input[type="text"] {
    width: calc(100% - 16px);
    padding: 8px;
    margin: 4px 0;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type="submit"] {
    background-color: #3475b0;
    color: white;
    padding: 10px 20px;
    margin: 10px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
}

input[type="submit"]:hover {
    background-color: #45a049;
}

/* Additional styling for form layout */
form table tr td:first-child {
    text-align: right;
    padding-right: 10px;
}

form table tr td:last-child {
    text-align: left;
}
</style>
</head>
<body>
    <h2>Edit row</h2>
<?php
include "conn.php";
if(isset($_POST['item_id'])){
    $sno = $_POST['item_id'];
} else {
    header("location:./secondpage.php");
    exit;
}
$q="select * from book_history where sno = $sno";
//echo $q;
$result=$conn->query($q);
if ($result->num_rows > 0) 
{
	if($row = $result->fetch_assoc()) 
	{
        
		$bookname=$row['bookname'];
        $author=$row['author'];
        $available=$row['available'];	
        $booklocation=$row['booklocation'];	
        $quantity=$row['quantity'];	
	}
}

?>
<form action="update.php" method="post">
<table>
    <input type="hidden" name="sno" value="<?php echo $sno; ?>">
<tr><td>BookName</td><td><input type="text" name="bookname" value="<?php echo $bookname;?>"></td></tr>
<tr><td>author</td><td><input type="text" name="author" value="<?php echo $author;?>"></td></tr>
<tr><td>available</td><td><input type="text" name="available" value="<?php echo $available;?>"></td></tr>
<tr><td>location</td><td><input type="text" name="booklocation" value="<?php echo $booklocation;?>"></td></tr>
<tr><td>quantity</td><td><input type="text" name="quantity" value="<?php echo $quantity;?>"></td></tr>
<tr><td></td><td><input type='submit' value='Update'></td></tr>

</table>
</form>


</table>
</form>
</body>
</html>

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

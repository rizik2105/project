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
		$borroweddate=$row['borroweddate'];
		$returndate=$row['returndate'];
		$dueontime=$row['dueontime'];
        $latefees=$row['latefees'];	
        $booklocation=$row['booklocation'];	
	}
}
?>
<form action="update.php" method="post">
<table>
    <input type="hidden" name="sno" value="<?php echo $sno; ?>">
<tr><td>BookName</td><td><input type="text" name="bookname" value="<?php echo $bookname;?>"></td></tr>
<tr><td>author</td><td><input type="text" name="author" value="<?php echo $author;?>"></td></tr>
<tr><td>available</td><td><input type="text" name="available" value="<?php echo $available;?>"></td></tr>
<tr><td>borrowed date</td><td><input type="text" name="borroweddate" value="<?php echo $borroweddate;?>"></td></tr>
<tr><td>returndate</td><td><input type="text" name="returndate" value="<?php echo $returndate;?>"></td></tr>
<tr><td>dueontime</td><td><input type="text" name="dueontime" value="<?php echo $dueontime;?>"></td></tr>
<tr><td>latefees</td><td><input type="text" name="latefees" value="<?php echo $latefees;?>"></td></tr>
<tr><td>location</td><td><input type="text" name="booklocation" value="<?php echo $booklocation;?>"></td></tr>
<tr><td></td><td><input type='submit' value='Update'></td></tr>

</table>
</form>
<h1>borrowers</h1>

<form action="studentlist.php" method="post">
<table>
<tr><td>student list</td><td><input type="list" name="firstname" >

</table>
</form>
</body>
</html>

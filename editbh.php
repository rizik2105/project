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
$q="select * from book_history ";
//echo $q;
$result=$conn->query($q);
if ($result->num_rows > 0) 
{
	if($row = $result->fetch_assoc()) 
	{
		$bookname=$row['bookname'];
		$borroweddate=$row['borroweddate'];
		$returndate=$row['returndate'];
		$dueontime=$row['dueontime'];
        $latefees=$row['latefees'];		
	}
}
?>
<form action="update.php" method="post">
<table>
<tr><td>BookName</td><td><input type="text" name="booknamename" value="<?php echo $bookname;?>"></td></tr>
<tr><td>borroweddate</td><td><input type="text" name="borroweddate" value="<?php echo $borroweddate;?>"></td></tr>
<tr><td>returndate</td><td><input type="text" name="returndate" value="<?php echo $returndate;?>"></td></tr>
<tr><td>dueontime</td><td><input type="text" name="dueontime" value="<?php echo $dueontime;?>"></td></tr>

<tr><td>latefees</td><td><input type="text" name="latefees" value="<?php echo $latefees;?>"></td></tr>
<tr><td></td><td><input type='submit' value='Update'></td></tr>

</table>
</form>
<h1>borrowers</h1>

<form action="borrowstu.php" method="post">
<table>
<tr><td>student list</td><td><input type="text" name="firstname" >

<input type="text" name="firstname" value=></td></tr>

</table>
</form>
</body>
</html>

<html>
<head>
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
</style>
</head>
<body>
<?php
include "conn.php";
$q="select * from sk where rollno='".$_POST['roll']."';";
//echo $q;
$result=$conn->query($q);
if ($result->num_rows > 0) 
{
	if($row = $result->fetch_assoc()) 
	{
		$rollno=$row['rollno'];
		$name=$row['name'];
		$father=$row['father'];
		$dob=$row['dob'];		
	}
}
?>
<form action="update.php" method="post">
<table>
<tr><td>Roll No.</td><td><input type="hidden" name="rollno" value="<?php echo $rollno;?>"><?php echo $rollno;?></td></tr>
<tr><td>Name</td><td><input type="text" name="name" value="<?php echo $name;?>"></td></tr>
<tr><td>Fathers Name</td><td><input type="text" name="father" value="<?php echo $father;?>"></td></tr>
<tr><td>Date of Birth</td><td><input type="date" name="dob" value="<?php echo $dob;?>"></td></tr>
<tr><td></td><td><input type='submit' value='Update'></td></tr>
</table>
</form>
</body>
</html>

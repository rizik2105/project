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
$q="update book_history set bookname='".$_POST['bookname']."',
borroweddate='".$_POST['borroweddate']."',returndate='".$_POST['returndate']."' ,dueontime='".$_POST['dueontime']."' ,latefees='".$_POST['latefees']."' ;
where bookname='".$_POST['bookname']."'";
if($result=$conn->query($q))
{
	?>
<script>
	alert("Successfully Updated!!");
	window.location.href="secondpage.php";
	</script>
<?php
}
else
{
?>
	<script>
	alert("Not Updated!!");
	window.location.href="secondpage.php";
	</script>
<?php
}

?>







<?php
include "conn.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $query = "SELECT * FROM signup WHERE firstname = '$firstname' AND lastname = '$lastname'";
    $result = $conn->query($query);
}
	?>
</body>
</html>

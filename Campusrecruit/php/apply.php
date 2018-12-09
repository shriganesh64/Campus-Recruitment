<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php 
	session_start();
	$cname=$_GET['cname'];
	$connect=mysqli_connect("localhost","root","","campus");
	$query="INSERT INTO students_applied VALUES('$_SESSION[usn]','$cname','$_SESSION[name]','$_SESSION[email]','$_SESSION[aggregate]')";
	mysqli_query($connect,$query);
	?>
	<script>
		alert("Applied!!!!");
		window.location = "studentpage.php";
	</script>
</body>
</html>
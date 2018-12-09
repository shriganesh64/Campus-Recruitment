<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="./../css/register.css">
	<script>
		function preback(){window.history.forward();}
		setTimeout("preback()",0);
		window.onunload=function() { null };
	</script>
</head>
<body>
	<nav>
		<div class="container">
			<div class="logo">
				CAMPUS RECRUITMENT
			</div>
			<ul id="menu">
			  	<li><a href="logintest.php">Home</a></li>
			  	<li><a href="#">About</a></li>
			  	<li><a href="#">Services</a></li>
			  	<li><a href="#">Contact</a></li>
			</ul>
		</div>
	</nav>
	<div class="up"></div>
	<div class="bottom"></div>
	<div class="formcontain">
		<form action="#" method="POST" name="frm" onsubmit="return validate()">
			<div class="inputBox">
				<input type="text" name="usn" required>
				<label>University Seat Number :</label>
			</div>
			<div class="inputBox">
				<input type="text" id="name1" name="names" required>
				<label>Name :</label>
			</div>
			<table class="tablebox">
				<tr>
					<th>Aggregate</th>
					<th>12th</th>
					<th>10th</th>
				</tr>
				<tr>
					<td> <input type="text" name="aggregate" required> </td>
					<td> <input type="text" name="twelve" required> </td>
					<td> <input type="text" name="tenth" required> </td>
				</tr>
			</table>
			<div class="inputBox">
				<input type="password" id="pass" name="password" required>
				<label>Password :</label>
			</div>
			<div class="inputBox">
				<input type="text" id="cpass" name="cpassword" required>
				<label>Confirm Password :</label>
			</div>
			<div class="inputBox">
				<input type="mail" name="email" required>
				<label>Email :</label>
			</div>
			<div class="input1">
				<input type="submit" name="reg_sub" value="Submit">
			</div>
		</form>
	</div>

<?php 
$connect=mysqli_connect("localhost","root","","campus") or die("dead");
if(isset($_POST['reg_sub'])){
	$usn=strtoupper($_POST['usn']);
	$name=strtoupper($_POST['names']);
	$password=$_POST['password'];
	$aggregate=$_POST['aggregate'];
	$twelve=$_POST['twelve'];
	$tenth=$_POST['tenth'];
	$email=$_POST['email'];


	$query="INSERT INTO student_login VALUES('$usn','$name','$password','$aggregate','$twelve','$tenth','$email')";
	mysqli_query($connect,$query);
	header('location:logintest.php');
}


	
?>
<script>
	var names=document.getElementById("name1");
	var pass=document.getElementById("pass");
	var cpass=document.getElementById("cpass");
	var flag1=0;
	var flag2=0;
	function validate(){
		if(pass.value != cpass.value){
			alert("Password missmatch");
			pass.focus();
			flag1=0;
		}
		else {
			flag1=1;
		}
		if(frm.email.value==""){
			alert("Please enter email.");
			frm.email.focus();
			flag2=0;
		}
		var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

		if(reg.test(frm.email.value) == false){
			alert("Invalid email address.");
			frm.email.focus();
			flag2=0;
		}else flag2=1;

		if((flag1 && flag2)==0)
			return false;
		else{
			alert(names.value +" is registered.");
			return true;
		}
	}
</script>
</body>
</html>
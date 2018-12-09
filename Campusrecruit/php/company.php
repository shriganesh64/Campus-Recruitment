<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="./../css/company.css">
	<script>
		function preback(){window.history.forward();}
		setTimeout("preback()",0);
		window.onunload=function() {null};
	</script>
</head>
<body>
	<nav>
		<div class="container">
			<div class="logo">
				CAMPUS RECRUITMENT
			</div>
			<ul id="menu">
			  	<li><a href="#">About</a></li>
			  	<li><a href="#">Services</a></li>
			  	<li><a href="admin.php">Back</a></li>
			  	<li><a href="logintest.php">Logout</a></li>
			</ul>
		</div>
	</nav>
	<div class="up"></div>
	<div class="bottom"></div>
	<div class="formcontain">
		<form action="#" method="POST" enctype="multipart/form-data">
			<div class="inputBox">
				<input type="text" name="cname" required>
				<label>Company Name :</label>
			</div>
			<div class="inputBox">
				<input type="text" name="address" required>
				<label>Address :</label>
			</div>
			<div class="inputBox">
				<input type="text" name="package" required>
				<label>Package :</label>
			</div>
			<div class="inputBox">
				<input type="text" name="descrip" required>
				<label>Description :</label>
			</div>
			<div class="inputlogo">
				<label>LOGO :</label>
				<input type="file" name="logo" id="real-file" hidden="hidden">
				<button type="button" id="custom-button">CHOOSE A FILE</button>
				<span id="custom-text">Should be under size 750 * 350.</span>
			</div> <br>
			<div class="inputBox">
				<input type="text" name="role" required>
				<label>Role :</label>
			</div>
			<div class="inputBox">
				<input type="date" name="date" required>
			</div>
			<div class="input1">
				<input type="submit" name="reg_sub" value="Submit">
			</div>
		</form>
	</div>
	<script>
		const realFileBtn = document.getElementById("real-file");
		const customBtn = document.getElementById("custom-button");
		const customTxt = document.getElementById("custom-text");

		customBtn.addEventListener("click",function(){
			realFileBtn.click();
		});
		customTxt.style.color = "#f00";
		realFileBtn.addEventListener("change",function(){
			if(realFileBtn.value){
				customTxt.innerHTML = realFileBtn.value.match(/[\/\\]([\w\d\s\.\-\(\)]+)$/)[1];
				customTxt.style.color = "#000";
			}else {
				customTxt.style.color = "#f00";
				customTxt.innerHTML = "No File Selected Yet.";
			}
		});
	</script>

<?php 
	$connect=mysqli_connect("localhost","root","","campus") or die("dead");
	if(isset($_POST['reg_sub'])){
		$target="./../img/".basename($_FILES['logo']['name']);
		
		$cname=strtoupper($_POST['cname']);
		$address=$_POST['address'];
		$package=$_POST['package'];
		$descrip=$_POST['descrip'];
		$logo=$_FILES['logo']['name'];
		$role=$_POST['role'];
		$date=$_POST['date'];
		$query="INSERT INTO companies VALUES('$cname','$address','$package','$descrip','$logo','$role','$date')";
		mysqli_query($connect,$query);
		move_uploaded_file($_FILES['logo']['tmp_name'],$target);
		echo "<script>alert('".$cname." added successfully.'); window.location = 'admin.php';</script>";
	}
?>
</body>
</html>
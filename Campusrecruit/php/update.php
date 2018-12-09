<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="./../css/update.css">
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
			  	<li><a href="logintest.php">Logout</a></li>
			  	<li><a href="admin.php">Back</a></li>
			</ul>
		</div>
	</nav>
	<div class="up"></div>
	<div class="bottom"></div>
	<?php 
		$connect = mysqli_connect("localhost","root","","campus");
		$name = $_GET['name'];
		$query1 = "SELECT * FROM companies WHERE c_name='$name'";
		$result = mysqli_query($connect,$query1);
		$row = mysqli_fetch_assoc($result);
		?>
		<div class="formcontain">
	<form action="#" method="POST" enctype="multipart/form-data">
			<div class="inputBox">
				<input type="text" name="cname" value="<?php echo $row['c_name']  ?>" required>
				<label>Company Name :</label>
			</div>
			<div class="inputBox">
				<input type="text" name="address" value="<?php echo $row['address']  ?>" required>
				<label>Address :</label>
			</div>
			<div class="inputBox">
				<input type="text" name="package" value="<?php echo $row['package']  ?>" required>
				<label>Package :</label>
			</div>
			<div class="inputBox">
				<input type="text" name="descrip" value="<?php echo $row['descrip']  ?>" required>
				<label>Description :</label>
			</div>
			<div class="inputlogo">
				<label>LOGO :</label>
				<input type="file" name="logo" id="real-file" hidden="hidden" required>
				<button type="button" id="custom-button">CHOOSE A FILE</button>
				<span id="custom-text">No File Selected Yet.</span>
			</div> <br>
			<div class="inputBox">
				<input type="text" name="role" value="<?php echo $row['role']  ?>" required>
				<label>Role :</label>
			</div>
			<div class="inputBox">
				<input type="date" name="date" value="<?php echo $row['date']  ?>" required>
			</div>
			<div class="input1">
				<input type="submit" name="reg_sub" value="Submit">
			</div>
		</form>
	</div>
	</div>

	<script>
		window.onload = function() { setTimeout("alert('UPLOAD A FILE');",0) };
		const realFileBtn = document.getElementById("real-file");
		const customBtn = document.getElementById("custom-button");
		const customTxt = document.getElementById("custom-text");

		customBtn.addEventListener("click",function(){
			realFileBtn.click();
		});

		realFileBtn.addEventListener("change",function(){
			if(realFileBtn.value){
				customTxt.innerHTML = realFileBtn.value.match(/[\/\\]([\w\d\s\.\-\(\)]+)$/)[1];
			}else {
				customTxt.innerHTML = "No File Selected Yet.";
			}
		});
	</script>

<?php 
	if(isset($_POST['reg_sub'])){
		$target="./../img/".basename($_FILES['logo']['name']);
		
		$cname=$_POST['cname'];
		$address=$_POST['address'];
		$package=$_POST['package'];
		$descrip=$_POST['descrip'];
		$logo=$_FILES['logo']['name'];
		$role=$_POST['role'];
		$date=$_POST['date'];
		$query2="UPDATE companies SET c_name='$cname',address='$address',package='$package',descrip='$descrip',logo='$logo',role='$role',date='$date' WHERE c_name='$name' ";
		mysqli_query($connect,$query2);
		move_uploaded_file($_FILES['logo']['tmp_name'],$target);
		echo "<script>alert('".$cname." updated successfully.');</script>";
		echo "<script type='text/javascript'>window.location = 'admin.php';</script>";
	}
?>
</body>
</html>
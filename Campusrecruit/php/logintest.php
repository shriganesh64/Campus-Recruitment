<!DOCTYPE html>
<head>
	<title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="./../css/logintest.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">
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
				<li><a href="./../team.html">Team</a></li>
			  	<li><a href="#">About</a></li>
			  	<li><a href="#">Services</a></li>
			  	<li><a href="#">Contact</a></li>
			</ul>
		</div>
	</nav>
	<div class="up"></div>
	<div class="bottom"></div>
	<div class="content">
		<h1>CAMPUS RECRUITMENT</h1>
		<p>Choose the perfect company for your carrier in just one click.</p>
	</div>
	<div class="box">
		<div class="head">
			<h2>Login</h2>
		</div>
		<form action="#" name="frm" method="POST" >
			<div class="inputBox">
				<input type="text" name="username" required>
				<label>Username / University Seat Number :</label>
			</div>
			<div class="inputBox">
				<input type="password" name="password" required>
				<label>Password :</label>
			</div>
			<div class="input1">
				<input type="submit" name="submit_btn" value="Submit">
			</div>
			<a href="register.php">Register</a>
		</form>
		</div>

<?php  
session_start();
$connect=mysqli_connect("localhost","root","","campus");
  if (isset($_POST['submit_btn'])) {
    $username=strtoupper(mysqli_real_escape_string($connect,$_POST['username']));
    $password=mysqli_real_escape_string($connect,$_POST['password']);
    $query="SELECT * FROM student_login where usn='$username' and password='$password'";
    $query_run=mysqli_query($connect,$query);
    $result = mysqli_fetch_assoc($query_run);
    $_SESSION['usn'] = $result['usn'];
    $_SESSION['name'] = $result['name'];
    $_SESSION['email'] = $result['email'];
    $_SESSION['aggregate'] = $result['aggregate'];
    if (mysqli_num_rows($query_run)>0) {
       if($username == "ADMIN"){
       	header('location:admin.php');
       }else{
       	 header('location:studentpage.php');
       }

      } 
    else{
        echo '<script type="text/javascript"> alert("Invalid credentials");
			frm.username.focus();
        </script>';
      } 
  }
?>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="./../css/modal.css">
</head>
<body>
	<?php 
		$cname=$_GET['cname'];
	?>
	<nav>
		<div class="container">
			<div class="logo">
				CAMPUS RECRUITMENT
			</div>
			<ul id="menu">
			  	<li><a href="#">About</a></li>
			  	<li><a href="#">Contact</a></li>
			  	<li><a href="admin.php">Back</a></li>
			  	<li><a href="logintest.php">Logout</a></li>
			</ul>
		</div>
	</nav>
	<div class="up"></div>
	<div class="bottom"></div>
	<h2><?php echo $cname; ?></h2>
	<div class="head">
		<div class="tblcontain">
			<table>
				<tr>
					<th>USN</th>
					<th>NAME</th>
					<th>EMAIL</th>
					<th>AGGREGATE</th>
				</tr>
				<?php 
					$connect = mysqli_connect("localhost","root","","campus");
					$query = "SELECT * FROM students_applied WHERE c_name='$cname'";
					$result = mysqli_query($connect,$query);
					while($row = mysqli_fetch_assoc($result)){
						?>
							<tr>
								<td><?php echo $row['usn']; ?></td>
								<td><?php echo $row['stud_name']; ?></td>
								<td><?php echo $row['stud_email']; ?></td>
								<td><?php echo $row['stud_aggregate']; ?></td>
							</tr>
						<?php
					}
				?>
			</table>
		</div>	
	</div>
</body>
</html>
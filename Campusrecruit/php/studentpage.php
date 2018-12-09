<!DOCTYPE html>
<head>
	<title></title>
	<link rel="stylesheet" href="./../css/studentpage.css">
	<script>
		function preback(){window.history.forward();}
		setTimeout("preback()",0);
		window.onunload=function() {null};
	</script>
	<?php 
		session_start();
	?>
</head>
<body>
	<nav>
		<div class="contain">
			<div class="logo">
				CAMPUS RECRUITMENT
			</div>
			<ul id="menu">
			  	<li><a href="#">About</a></li>
			  	<li><a href="#">Services</a></li>
			  	<li><a href="#">Contact</a></li>
			  	<li><a href="logintest.php">Logout</a></li>
			</ul>
		</div>
	</nav>

	<?php 
		$connect = mysqli_connect("localhost","root","","campus") or die("Could not connect");
		$query = "SELECT * FROM companies ORDER BY date DESC";
		$result = mysqli_query($connect,$query);

		while($row = $result->fetch_assoc()){ 
	?>
			<div class='container'>
			<div class='box'>
			<div style='
						background:url("./../img/<?php echo $row['logo']; ?>"); 
						background-size:cover;
						background-position: center;
						position: relative;
						width: 308px;
						height: 100%;
						overflow: hidden;
				    '>
			</div>
			<table class='tbl'>
				<tr>
					<th>Address</th>
					<th>Package</th>
					<th>Role</th>
					<th>Date</th>
				</tr>
				<tr>
					<td><?php echo $row['address']; ?></td>
					<td><?php echo $row['package']; ?></td>
					<td><?php echo $row['role']; ?></td>
					<td><?php echo $row['date']; ?></td>
				</tr>
			</table>
			<div class='details'>
				<div class='content'>
					<h2><?php echo $row['c_name']; ?></h2>
					<p><?php echo $row['descrip']; ?></p>
					<label>*Eligible</label>	
				</div>
				<?php 
				 $query1="SELECT * FROM students_applied where usn='$_SESSION[usn]' and c_name='$row[c_name]'";
				 $res=mysqli_query($connect,$query1); 
				?>
				<a href="studentpage.php?cname=<?php echo $row['c_name']; ?>" 
																<?php
																	if(mysqli_num_rows($res)>0){
																		echo " class='btn1' disabled >APPLIED";
																	}else {
																		echo " class='btn' >APPLY";
																	}
																?> </a>
			</div>
		</div>
		</div> 

		<?php
			}

			if(isset($_GET['cname'])){
				$cname=$_GET['cname'];
				$connect=mysqli_connect("localhost","root","","campus");
				$query="INSERT INTO students_applied VALUES('$_SESSION[usn]','$cname','$_SESSION[name]','$_SESSION[email]','$_SESSION[aggregate]')";
				mysqli_query($connect,$query);
				echo "<script>
					alert('Applied to ".$cname."');
					window.location = 'studentpage.php';
				</script>";
			}
		?>
<footer>
	<div class="footer">
		<div class="foot-head">
			<h3>CAMPUS RECRUITMENT</h3>
		</div>
		<div class="foot-bottom">
			<h6>Copyright 2018</h6>
		</div>
	</div>
</footer>
</body>
</html>
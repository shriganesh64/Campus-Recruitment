<!DOCTYPE html>
<head>
	<title></title>
	<link rel="stylesheet" href="./../css/admin.css">
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
	<script>
		function preback(){window.history.forward();}
		setTimeout("preback()",0);
		window.onunload=function() {null};
	</script>
</head>
<body>
	<nav>
		<div class="contain">
			<div class="logo">
				CAMPUS RECRUITMENT
			</div>
			<ul id="menu">
			  	<li><a href="#">About</a></li>
			  	<li><a href="company.php">Add Company</a></li>
			  	<li><a href="#">Contact</a></li>
			  	<li><a href="logintest.php">Logout</a></li>
			</ul>
		</div>
	</nav>

	<?php 
		$connect = mysqli_connect("localhost","root","","campus") or die("Could not connect");
		$query = "SELECT * FROM companies ORDER BY date DESC";
		$result = mysqli_query($connect,$query);
		$count = mysqli_num_rows($result);

		while($row = $result->fetch_assoc()){
			echo " 
			<div class='container'>
			<div class='box'>
			<div style='
										background:url(./../img/".$row['logo']."); 
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
					<td>".$row['address']."</td>
					<td>".$row['package']."</td>
					<td>".$row['role']."</td>
					<td>".$row['date']."</td>
				</tr>
			</table>
			<div class='details'>
				<div class='content'>
					<h2>".$row['c_name']."</h2>
					<p>	
					".$row['descrip']."</p>
				</div>
				<a href='admin.php?delete=".$row['c_name']."' class='remove' onclick='return conf()' title='DELETE COMPANY'>&times</a>
				<a href='modal.php?cname=".$row['c_name']."' class='modal'>STUD_LIST</a>
				<a href='update.php?name=".$row['c_name']."' class='btn'>UPDATE</a>
			</div>
		</div>
		</div> ";
		}
				if (isset($_GET['delete'])) {
		            	$delete_id=$_GET['delete'];
		            	$queries= "DELETE FROM companies WHERE c_name='$delete_id'";
		            	$res = mysqli_query($connect,$queries);
		            	echo "<script>window.location = 'admin.php';</script>";
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
<script type="text/javascript">
	function conf(){
		var con = confirm("Are you sure you want to delete");
		if(con == true){
			return true;
		}
		else{
			return false;
		}
	}
</script>
</body>
</html>
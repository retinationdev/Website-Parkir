<?php
session_start();
//echo "welcom".$_SESSION['email'];
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Home</title>
		<link rel="stylesheet" href="../css/styles.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Lato:400,700,900" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Lato:400,700,900" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<style type="text/css">
.header {
 background-color: #e4f1fe;
 height: 100px;
}

.header h3 {
	text-align: left;
	margin-left: -300px;
	font-weight: 20px;
}
</style>		
	</head>
	<body>
		<div class="wrapper">
			<div class="w1">
				<div class="container">
					
					<!-- header starts here -->
					<div class="header">
						<div class="logo">
							<img src="../images/carLogo.png" alt="">
							
						</div>
						<h3 href="?module=adminHome#pos">Ayo Parkir</h3>
						<div class="nav">
							<ul>
								<li><a href="home.php">Home</a></li>
								<li><a href="myProfile.php">My Profile</a></li>
								<li><a href="myBooking.php">My Booking</a></li>
							</ul>
							
						</div>
						<div class="nav-right">
							<ul>
								<li><a href="../index.php">Logout</a></li>
							</ul>
						</div>
						
					</div>
					<!-- header ends here -->
					<?php
					if (isset($_SESSION['email'])) {
					?>
					<div style="text-align: center;">
						<h3 style="padding: 10px;"><?php echo "Welcome: ".$_SESSION['email']; ?></h3>
					</div>
					
					<?php
					}
					?>
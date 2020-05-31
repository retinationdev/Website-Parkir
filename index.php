<!DOCTYPE html>
<html>
<head>
<title>Ayo Parkir</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Bubble SignUp Form template Responsive, Login form web template,Flat Pricing tables,Flat Drop downs  Sign up Web Templates, Flat Web Templates, Login sign up Responsive web template, SmartPhone Compatible web template, free web designs for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- //Custom Theme files -->
<!-- web font --> 
<link href="//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i" rel="stylesheet">
<!-- //web font -->
<style type="text/css">
.wrapper {
  height : 750px;
}

.agileits-top {
  height : 100%;
}

.button1 a {
color: #494949 !important;
text-transform: uppercase;
background: #ffffff;
padding: 20px;
border-radius: 6px;
display: inline-block;
align-content: center;
margin-top: 30px;
}

.button2 a {
color: #494949 !important;
text-transform: uppercase;
background: #ffffff;
padding: 20px;
border-radius: 6px;
display: inline-block;
align-content: center;
margin-top: 10px;
}

.button1 a:hover {
color: #ffffff !important;
background: #00b5cc;
border-color: #00b5cc !important;
transition: all 0.4s ease 0s;
}

.button2 a:hover {
color: #ffffff !important;
background: #29f1c3;
border-color: #29f1c3 !important;
transition: all 0.4s ease 0s;
}

</style>
</head>
<body>
	<!-- main -->
	<div class="main-w3layouts wrapper">


		<h1>Ayo Parkir Login </h1>

	<span id="msg">
		
		<?php

			if (isset($_GET['msg'])) {
				echo "<h3>".$_GET['msg']."</h3>";
			}


		?>


	</span>

		<div class="main-agileinfo">
			<div class="agileits-top"> 
        <?php
        if(isset($_GET['module']))
          include"konten/$_GET[module].php";
        else
          include"konten/index.php";
      ?>
      </div>

			

        <ul class="w3lsg-bubbles">
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
    </ul>
</div>	
	<!-- //main -->






<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>





</body>
</html>
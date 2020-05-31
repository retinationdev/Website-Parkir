
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Online Parking Booking</title>
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
</head>
<body>
	<!-- main -->
	<div class="main-w3layouts wrapper">





		<h1>Online Parking Booking SignUp Form</h1>

	<span id="msg">
		
		<?php

			if (isset($_GET['msg'])) {
				echo $_GET['msg'];
			}


		?>


	</span>

		
		<div class="main-agileinfo">
			<div class="agileits-top"> 
				<form action="classes/formValue.php" method="post" onsubmit="return validate()"> 
					<input type="hidden" name="role" value="2">
					<input class="text email" type="text" name="firstName" placeholder="First Name" required="required">
					<input class="text email" type="text" name="lastName" placeholder="Last Name" required="required">
					<input class="text email" type="text" name="phone" placeholder="Phone Number" required="required">
					<input class="text email" type="text" name="licenseNo" placeholder="License Number" required="required">
					<input class="text email" type="email" name="email" id="email" placeholder="Email" required="required">
					<span id="msgAjax"></span>
					<input class="text" type="password" name="password" id="password" placeholder="Password" required="required">
					<input class="text w3lpass" type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" required="required">
					<div class="wthree-text">  
						<label class="anim">
							<input type="checkbox" class="checkbox" required="">
							<span>I Agree To The Terms & Conditions</span> 
						</label>  
						<div class="clear"> </div>
					</div>   
					<input type="submit" name="register" id="register" value="SIGNUP">
				</form>
				<p>Already have an Account? <a href="index.php"> Login Now!</a></p>
			</div>	 
		</div>	
		<!-- copyright -->
		<div class="w3copyright-agile">
			<p>© 2018 All rights reserved</p>
		</div>
		<!-- //copyright -->
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

  <script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous">
  </script>
  <script type="text/javascript">
  	$(document).ready(function(){
  		$('#msg').fadeOut(2000);


  		$("#register").prop("disabled",true);
  		$("#email").on("keyup",function(){
  				var emailAjax = $("#email").val();

  				$.ajax({

  					url: 'emailCheck.php',
  					method:'POST',
  					dataType:'JSON',
  					data:{
  						emailRegister : emailAjax
  					},

  					success : function(response){
  						if (!response.status) {
  							$("#msgAjax").html(response.msg);
  							$("#register").prop("disabled",true);

  						}else{
  							$("#register").prop("disabled",false);
  							//$("#msgAjax").html(response.msg);
  							$("#msgAjax").html('');
  						}
  					}

  				});
  		});


  	});
  	

  </script>

  <script type="text/javascript">
  		
	function validate(){
		if ($('#password').val() != $('#confirmPassword').val()) {
			alert('confirm password do not match');
			return false;
		}else{
			return true;
		}
	}

  </script>



	
</body>
</html>
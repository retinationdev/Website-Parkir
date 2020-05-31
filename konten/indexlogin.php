
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
<style type="text/css">

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
        
<div id="login1">
  <button onclick="myFunction()">Try it</button>
        <form action="classes/formValue.php" method="post"> 
          
          <input class="text" type="text" name="licenseNo" id="licenseNo" placeholder="licenseNo" required="">
          <span id="response"></span>
          <input class="text" type="password" name="password" id="password" placeholder="Password" required="">
          <span id="responsePass"></span>
        
          <div class="wthree-text">  
            <!-- <label class="anim">
              <input type="checkbox" class="checkbox" required="">
              <span>I Agree To The Terms & Conditions</span> 
            </label>   -->
            <div class="clear"> </div>
          </div>   
          <input type="submit" name="login" id="login" value="LOGIN">
        </form>
      

      <script>
function myFunction() {
  var x = document.getElementById("login1");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script>

</div>

<div id="login2">
 <form action="classes/formValue.php"  method="POST">

            <div class="form-group">
                <label for="email">Username</label>
               <input class="text email" type="text" name="email" id="email" placeholder="Email" required="">
            </div>


            <div class="form-group">
                <label for="password">Password</label>
               <input class="text" type="password" name="password" id="password" placeholder="Password" required="">
            </div>

          <input type="submit" name="login" id="login" value="LOGIN">

        </form>
      </div>>






				<p>Don't have an Account? <a href="registration.php"> Register Now!</a></p>


			</div>	 
		</div>	
		<!-- copyright -->
		<div class="w3copyright-agile">
			<p>© 2018 All rights reserved </p>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- for login email  -->
  <script type="text/javascript">
  	$(document).ready(function(){
  		$('#msg').fadeOut(2000);

  		//$("#login").prop("disabled",true);

  		$("#email").on("keyup", function(){
  			// console.log("fdsadf");
  			var emailAjax = $('#email').val();
  			  
  		// For Email check

  			$.ajax({
  				url:'emailCheck.php',
  				method:'POST',
  				dataType:'JSON',
  				data:{
  					email: emailAjax
  				},
  				success: function(response){
  					console.log(response);

  					if (response.status) {
  						$('#response').html(response.msg);

  						//$("#login").prop("disabled",false);
  						
  					}else{
  						$('#response').html(response.msg);
  					}

  					//$('#response').html(response);
  				}



  			});

  		});


  	});
  	

  </script>

  <script type="text/javascript">
  	
	$(document).ready(function(){

		  		// For Password check

		$("#password").on("keyup", function(){

		  var passwordAjax = $("#password").val();

  			$.ajax({
  				url:'emailCheck.php',
  				method:'POST',
  				dataType:'JSON',
  				data:{
  					password: passwordAjax
  				},
  				success: function(response){
  					console.log(response);

  					if (response.status) {
  						$('#responsePass').html(response.msg);

  						$("#login").prop("disabled",false);

  						$("#login").on("click",function(){
  							//alert('okey');
  							//window.location.replace('views/home.php');
  							//location.href='views/home.php';
  						})
  						
  					}else{
  						$('#responsePass').html(response.msg);
  						$("#login").prop("disabled",true);
  					}

  					//$('#response').html(response);
  				}



  			});

	  });
  });

  </script>

<!--   <script type="text/javascript">
  	$(document).ready(function(){

  		$("#login").on("click",function(){
  			alert('ok');
  			// $.ajax({
  			// 	window.location.replace('views/home.php');
  			// });

  			

  		});

  	});
  </script> -->




</body>
</html>
<style type="text/css">

#back{
    font-size:.9em;
    color: #fff;
    background: #00b5cc;
    outline: none;
    border: 1px solid #00b5cc;
    cursor: pointer;
    padding: 0.9em;
    -webkit-appearance: none;
    letter-spacing: 4px;
}
#back a {
  color: #fff;
  text-transform: uppercase;
    width: 100%;
  display: inline-block;
}

#back:hover{
    -moz-box-shadow: 0 3px 3px 0 rgba(0, 0, 0, 0.58);
    box-shadow:0px -1px 3px 0 rgba(0, 0, 0, 0.58);  
    -webkit-transition: .5s all;
    -moz-transition: .5s all;
    -o-transition: .5s all;
    -ms-transition: .5s all;
    transition: .5s all;
    background: transparent;
}

.agileits-top h3 {
  text-align: center;
  color: #fff;
  padding: 10px;
  font-size: 20px;
}

</style>
        
<div id="login1">
  <h3>Login Admin</h3>
        <form action="classes/formloginadmin.php" method="post"> 
          
          <input class="text email" type="email" name="email" id="email" placeholder="Email" required="">
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



<div id="back" align="center">
        <a href="index.php"> Kembali</a>
         </div>
</div>
    <!-- copyright -->
    <div class="w3copyright-agile">
      <p>© 2018 All rights reserved </p>
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
        //  window.location.replace('views/home.php');
        // });

        

      });

    });
  </script> -->

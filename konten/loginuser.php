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
  <h3>Login User</h3>
       <form action="classes/formValue.php" method="post"> 

          </br>
          <input class="text" type="text" name="licenseNo" id="licenseNo" placeholder="LicenseNo" required="">
          </br>
          
          <input class="text" type="password" name="password" id="password" placeholder="Password" required="">
          </br>

        
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
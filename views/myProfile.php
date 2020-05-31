<?php
include_once'../classes/crud.php';
include_once'header.php';
//include_once'main.php';
	$crud = new crud();
	if (isset($_SESSION['email'])) {
		
	
	$result = $crud->getUserDetails($_SESSION['email']);
	foreach ($result as  $value) {
		
	
?>
<!-- Main Section starts here -->
<div class="main">
	<div class="profile-wrapper">
		
		<div class="formWrapper">
			<form action="../classes/formValue.php" method="POST">
				<input type="hidden" name="email" value="<?php echo $value['email']; ?>">
				<label for="email">Nama ID
					<input type="text" name="email" id="email" value="<?php echo $value['email']; ?>" enable>
				</label>
				<label for="licenseNo">Nomor Kendaraan
					<input type="text" name="licenseNo" value="<?php echo $value['licenseNo']; ?>">
				</label>
				<input type="submit" class="button" name="update" value="Update">
			</form>
		</div>
		<div class="changePassword">
			<span id="msg">
				
				<?php
					if (isset($_GET['msg'])) {
						echo "<h3>".$_GET['msg']."</h3>";
					}
				?>
			</span>
			<a href="" class="button" id="changePassword">Change Password</a>
			<div class="changePass" id="change">
				<form action="../classes/formValue.php" method="POST" onsubmit="return validate()">
					
					<input type="hidden" name="email" value="<?php echo $value['email']; ?>">
					<label for="password">Old Password</label>
					<input type="password" name="password" id="oldPassword">
					
					
					<span id="oldPasswordAjax"></span>
					<label for="newPassword">New Password
						<input type="password" name="newPassword" id="newPassword">
					</label>
					<label for="email">Retype Password
						<input type="password" name="confirmPassword" id="confirmPassword">
						<!-- <span id="confirmPassAjax"></span> -->
					</label>
					<input type="submit" class="button" name="updatePassword" id="updatePassword" value="Update">
				</form>
			</div>
		</div>
	</div>
</div>
<!-- Main Section ends here -->
<?php
}
}
include_once'footer.php';
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
	
	$(document).ready(function(){
		$('#changePassword').on("click",function(e){
			e.preventDefault();
			$('#change').show(1000);
			$('#updatePassword').prop("disabled",true);
			$('#oldPassword').on("keyup",function(){
				var oldPassword = $('#oldPassword').val();
				var emailAjax = $('#email').val();
				$.ajax({
					url:'../emailCheck.php',
					method:'POST',
					dataType:'JSON',
					data:{
						passwordCheck : oldPassword,
						emailCheck : emailAjax
					},
				success: function(result){
					
					if (result.status) {
						
						$("#oldPasswordAjax").html(result.msg);
												$('#updatePassword').prop("disabled",false);
					}else{
						$("#oldPasswordAjax").html(result.msg);
						$('#updatePassword').prop("disabled",true);
					}
					
				}
				});
			});
		});
	});
</script>
<script type="text/javascript">
		//var newPass = $("#newPassword").val();
		//var confirmPass = $("#confirmPassword").val();
		function validate(){
			
			if ($("#newPassword").val() != $("#confirmPassword").val()) {
				alert('confirm password do not matched');
				return false;
			}else{
				return true;
			}
			// if(newPass !== confirmPass) {
							// 	alert('new password do not match');
							// 	return false;
			// }else{
							// 	return true;
			// }
		}
</script>
<script>
	$(document).ready(function(){
		$('#msg').hide(1000);
	});
</script>
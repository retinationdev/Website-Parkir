<?php
require_once'classes/dbConfig.php';
require_once'classes/crud.php';

$crud = new crud();

// for Register
if (isset($_POST['register'])) {
	$role = $_POST['role'];
	$email = $_POST['email'];
	$password = $_POST['password'];


	$checkUser = $crud->checkUser($email,$password);
	//print_r($checkUser);

	//die();

	if (!($checkUser->num_rows>0)) {
		
			//$result = $crud->registerUser($_POST);
			$result = $crud->register($email,$password,$licenseNo,$role);
			//$result = $crud->RegisterFrom_sp($firstName,$lastName,$email,$password,$licenseNo,$phone,$role);

			if ($result) {
				echo "Successfully Registered";
				$msg="<h2><font color='green'>Pendaftaran telah berhasil</font></h2>";
				header("Location:../admin/adminHome.php?msg=".$msg);
			}else{
				die($result);
			}

	}else{
		$msg="<h2><font color='green'>ID telah digunakan..</font></h2>";
		header("Location:../registration.php?msg=".$msg);
	}

}


// for Login

if (isset($_POST['login'])) {
	$result = $crud->checkUser($_POST['email'],$_POST['licenseNo'],$_POST['password']);
//print_r($result);
	if (mysqli_num_rows($result)<1) {
		$msg = "Incorrect Email or password";
		header("Location:../index.php?msg=".$msg);
		
	}else{
		$role = $crud->checkRole($_POST['email'],$_POST['licenseNo']);
		 $r = $role->fetch_assoc();                 // to fetch single value from array
		// print_r($r['role_id']); 
		if ($r['role_id']==2) {
		session_start();
		$_SESSION['email']=$_POST['email'];
		//header("Location:../admin/home.php");
		header("Location:../admin/adminHome.php");	
		
		}else{
		session_start();
		$_SESSION['licenseNo']=$_POST['licenseNo'];
		header("Location:../views/home.php");		// redirect to user page
		}

	}


}

// for booking

if (isset($_POST['book'])) {
	$date = $_POST['bookingDate'];
	$vehicleNo = $_POST['vehicleNo'];
	$parkingSlot_id = $_POST['parkingSlot_id'];
	$user_id = $_POST['user_id'];

	$result = $crud->insertBooking($date,$vehicleNo,$parkingSlot_id,$user_id);
	// print_r($result);

	header("Location:../views/home.php");

	
}

// user Update

if (isset($_POST['update'])) {
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$licenseNo = $_POST['licenseNo'];
	$email = $_POST['email'];


	$result = $crud->updateUser($firstName,$lastName,$licenseNo,$email);

	if ($result) {
		header("Location:../views/myProfile.php");
	}
}

	
	// For updating password

if (isset($_POST['updatePassword'])) {
	$newPassword = $_POST['newPassword'];
	$email = $_POST['email'];

	$msg = "Error in updating password";
	$successMsg = "Successfully updated password";
	$result = $crud->updatePassword($email,$newPassword);

	if ($result) {
		header("Location:../views/myProfile.php?msg=".$successMsg);
	}else{
		header("Location:../views/myProfile.php?msg=".$msg);
	}
}

if (isset($_GET['id'])) {
	$parkingSlot_id = $_GET['id'];

	$result = $crud->updateParkingSlot($parkingSlot_id);


	

	if ($result) {
		header("Location:../views/myBooking.php");
	}
	else{
		die('error');
	}
	
	

}
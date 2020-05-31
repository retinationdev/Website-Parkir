<?php
require_once'classes/crud.php';
$crud = new crud();
// For email check
if (isset($_POST['email'])) {
	
	$email = $_POST['email'];
	$result = $crud->checkEmailAjax($email);
	$data = array();
	if ($result) {
		$data['status']=true;
		$data['msg']="<font color='lightgreen'>Email available</font>";
		// exit("<font color='blue'>Email not available</font>");
	}else{
		$data['status']=false;
		$data['msg']="<font color='skyblue'>Email not available</font>";
		//exit("<font color='green'>Email available</font>");
	}
	echo json_encode($data);  // changing array ($data is array) to json and sending
	exit();
}
//for password check
if (isset($_POST['password'])) {
	
	$password = $_POST['password'];
	$result = $crud->checkPasswordAjax($password);
	$data = array();
	if ($result) {
		$data['status']=true;
		$data['msg']="<font color='blue'>Password Matched</font>";
	}else{
		$data['status']=false;
		$data['msg']="<font color='skyblue'>Password do not Match</font>";
	}
	echo json_encode($data);
	exit();
}
	// for email check in registration
	if (isset($_POST['emailRegister'])) {
		$email = $_POST['emailRegister'];
		$result = $crud->checkEmailAjax($email);
		$data = array();
		if ($result) {
			$data['status']=false;
			$data['msg']=$data['msg']="<font color='skyblue'>Email already taken</font>";
		}else{
			$data['status'] = true;
			$data['msg']="<font color='lightgreen'>Email available</font>";
		}
		echo json_encode($data);
		exit();
	}
	// check old password Ajax
	if (isset($_POST['passwordCheck']) && isset($_POST['emailCheck'])) {
		
		$oldPassword = $_POST['passwordCheck'];
		$email = $_POST['emailCheck'];
		$result = $crud->checkOldPassword($oldPassword,$email);
		$data = array();
		if ($result->num_rows>0) {
			$data['status'] = true;
			$data['msg'] = "<font color='green'>Password Matched</font>";
		}else{
			$data['status'] = false;
			$data['msg'] = "<font color='red'>Password do not Match</font>";
		}
		echo json_encode($data);
		exit();
	}
<?php
require_once'dbConfig.php';
/**
*
*/
class curd extends dbConfig
{
	
	function __construct()
	{
		parent::__construct();
	}
	
		function checkUser($email,$password){
		//print_r($email);
		$sql = "select * from `user` where `email` = '".$email."' AND `password`='".$password."' ";
		//print_r($email);
		$result = $this->conn->query($sql);
		//$_SESSION['email'] = $email;
		//print_r($result);
		//die();
		return $result;
	}
	// checking email usng ajax
	function checkEmailAjax($email){
		$sql = "select * from `user` where `email` ='".$email."' ";
		$result = $this->conn->query($sql);
		if ($result->num_rows>0) {
			return true;
		}else{
			return false;
		}
	}
	// checking password usng ajax
	function checkPasswordAjax($password){
		$sql = "select * from `user` where `password` ='".$password."' ";
		$result = $this->conn->query($sql);
		if ($result->num_rows >0) {
			return true;
		}else{
			return false;
		}
	}
	function RegisterFrom_sp($firstName,$lastName,$email,$password,$licenseNo,$phone,$role){
		$sql = "CALL sp_Register('".$firstName."','".$lastName."','".$email."','".$password."','".$licenseNo."','".$phone."','".$role."')";
		$result = $this->conn->query($sql);
		return $result;
	}
	function register($firstName,$lastName,$email,$password,$licenseNo,$phone){
	// $stmt = $this->conn->prepare("INSERT INTO `user` (`firstName`, `lastName`, `email`, `password`, `licenseNo`, `role_id`, `blackListPoint`, `emailConfirmed`, `verificationCode`) VALUES (?, ?, ?,?,?,?,?,?,?)");
	// $stmt->bind_param("sssssiiis", $firstname, $lastname, $email,$password,'','1','','','');
	// $result = $stmt->execute();
	// // print_r($result);
	// // die();
								// 	if ($result == false) {
															// 		return false;
								// 	}
								// 	else{
															// 		return true;
								// 	}
		$sql = "INSERT INTO `user` (`user_id`, `firstName`, `lastName`, `email`, `password`, `licenseNo`, `role_id`, `blackListPoint`, `emailConfirmed`, `verificationCode`) VALUES (NULL, '$firstName', '$lastName', '$email', '$password', '$licenseNo', '', '', '', '')";
		$result = $this->conn->query($sql);
		if ($result == false) {
			return false;
		}else{
			return true;
		}
	}
	function registerUser($values){
		$sql="";
		$keys="";
		$data="";
		foreach ($values as $key => $value) {
			if ($key != "register" && $key != "confirmPassword") {
				$keys .= '`'.$key.'`, ';
				$data .= '"'.$value.'", ';
				//$result = $this->conn->query("Insert Into `user`('$key') VALUES ('$value') ");
			}
			
		}
		// print_r($keys);
		// print_r($data);
		// $keys = substr($keys,0,-1);
		// print_r($keys);
		$sql = "Insert Into `user`(" .substr($keys,0,-2).") VALUES (".substr($data,0,-2).") ";
		$result = $this->conn->query($sql);
		// echo $sql;
		if ($result == false) {
			return false;
		}
		else{
			return $result;
		}
	}
	function getParkingSlots(){
		$sql = "Select * from parking_slots ";
		$result = $this->conn->query($sql);
		if ($result->num_rows>0) {
			return $result;
		}else {
			return false;
		}
	}
	// Getting user's Id
	function getUserId($email){
		$sql = "select `user_id` from `user` where email = '$email' ";
		$result = $this->conn->query($sql);
		return $result;
	}
	// inserting booking info
	function insertBooking($date,$vehicleNo,$parkingSlot_id,$user_id){
		$today = date("Y-m-d");
		// $sql = "INSERT INTO `booking_info` ( `user_id`, `bookingDate`, `parkingSlot_id`, `vehicleNo`, `bookedOn`) VALUES ( '$user_id', '$date', '$parkingSlot_id', '$vehicleNo', '$today')";
		$sql = "CALL INSERTTABLE('".$user_id."','".$date."','".$parkingSlot_id."','".$vehicleNo."','".$today."')";
		// echo $sql;
		$result = $this->conn->query($sql);
		// print_r($result);
	}
	// getting Users Details
	function getUserDetails($email){
		$sql = "SELECT * from `user` where `email` = '".$email."' ";
		$result = $this->conn->query($sql);
		
		return $result;
	}
	// reset slots
	function resetSlots(){
		$today = date("Y-m-d");
		$sql = "SELECT `bookedOn` FROM `parking_slots`";
		$result = $this->conn->query($sql);
		// print_r($result);
		foreach ($result as $value) {
			if ($value['bookedOn']<$today) {
			
				$qry = "UPDATE `parking_slots` set `status` ='active' where `bookedOn` < '".$today."' ";
				$rslt = $this->conn->query($qry);
			}
		}
	}
	// update user
	function updateUser($firstName,$lastName,$licenseNo,$email){
		$sql = "UPDATE `user` set `firstname` = '".$firstName."', `lastname` = '".$lastName."',
				`licenseNo` = '".$licenseNo."'
				WHERE
				`email` = '".$email."' ";
		$result = $this->conn->query($sql);
		return $result;
	}
	// checking old password using ajax
	function checkOldPassword($oldPassword,$email){
		$sql = "select `user_id` from `user` where `email` = '".$email."' AND `password` = '".$oldPassword."' ";
		$result = $this->conn->query($sql);
		return $result;
	}
	// updating user password
	function updatePassword($email,$newPassword){
		$sql = "UPDATE `user` set `password` = '".$newPassword."' where `email` = '".$email."' ";
		$result = $this->conn->query($sql);
		if ($result) {
			return true;
		}else{
			return false;
		}
	}
	// get user's booking history
	function getUserBooking($userId){
		$sql = "SELECT * FROM `booking_info` WHERE `user_id` ='".$userId."' ";
		$result = $this->conn->query($sql);
		return $result;
	}
	// get users today's booking
	function getUserTodaysBooking($userId){
		$sql = "SELECT `parkingSlots_id` from `parking_slots` WHERE `user_id` = '".$userId."' AND `status` = 'booked' ";
		$result = $this->conn->query($sql);
		return $result;
	}
	// updating parking slots
	function updateParkingSlot($parkingSlot_id){
	$sql = "UPDATE `parking_slots` SET `status` = 'active' where `parkingSlots_id` = '".$parkingSlot_id."'  ";
	$result = $this->conn->query($sql);
	return $result;
	}
}
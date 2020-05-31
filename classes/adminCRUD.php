<?php
require_once'dbConfig.php';

/**
 * 
 */
class adminCRUD extends dbConfig
{
	
	function __construct()
	{
		parent::__construct();
	}


	function updateParkingSlot($parkingSlot_id){
		$sql = "UPDATE `parking_slots` set `status` = 'active' where `parkingSlots_id`='".$parkingSlot_id."' ";

		$result = $this->conn->query($sql);

		return $result;
	}

	function bookingHistory(){
		$sql = "SELECT * from `booking_info` ";
		$result = $this->conn->query($sql);

		return $result;
	}

	// booking search by date

	function searchData($dateFrom,$dateTo){
		$sql = "SELECT * from `booking_info` where `bookingDate` between '".$dateFrom."' AND '".$dateTo."' ";
		$result = $this->conn->query($sql);

		// print_r($sql);
		return $result;
	}

	// search all user 

	function searchUser(){
		$sql = "SELECT * FROM `user` ";

		$result = $this->conn->query($sql);
		return $result;
	}

	// search user by email

	function searchUserByEmail($email){
		$sql = "SELECT * FROM `user` where `email` = '".$email."' ";

		$result = $this->conn->query($sql);
		return $result;
	}

	// get rates

	function getRate(){
		$sql = "SELECT * FROM `vehicle_type`";

		$result = $this->conn->query($sql);
		return $result;
	}
	//get rate by id of vehicle

	function getRateById($id){
		$sql = "SELECT * FROM `vehicle_type` where `vehicleType_id` ='".$id."' ";
		$result = $this->conn->query($sql);
		return $result;

	}

	// update rate

	function updateRate($type,$rate,$vehicleType_id){
		$sql = "UPDATE `vehicle_type` set `type` = '".$type."' ANd  `rate` = '".$rate."' where `vehicleType_id` = '".$vehicleType_id."' ";
	
		$result = $this->conn->query($sql);

		return $result;
	}







}


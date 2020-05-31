<?php

class dbConfig{

private $server = "localhost";
private $username = "root";
private $pass = "";
private $db = "onlineparkingbooking";

protected $conn;



	function __construct(){
		
		if (!isset($this->conn)) {
			$this->conn = new mysqli($this->server,$this->username,$this->pass,$this->db);

			if (!$this->conn) {
				die("cannot connect to database");
			}
			else{
				// echo "connected successfully";
			}
		}
	}

}
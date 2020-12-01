<?php
	define("HOST", "127.0.0.1");
	define("USER", "root");
	define("PASS", "");
	define("DB", "projectweb");
	
	class DB_Connection {
		private $connect;
		function __construct() {
			$this->connect=mysqli_connect(HOST,USER,PASS,DB) or die("DB Connection error.");
		}
		public function get_connection() {
			return $this->connect;
		}
	}
	
	function open_database(){
		$conn = new mysqli(HOST, USER, PASS, DB);
		if($conn->conn_error){
			die('Connect error: '.$conn->connect_error);
		}
		return $conn;
	}

	function login($user_name, $pass_word){
		$data = "select * from user where user_name = ?";
		$conn = open_database(); 
	}
?>
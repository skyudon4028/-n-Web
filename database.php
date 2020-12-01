<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

define('HOST', '127.0.0.1');
define('USER', 'root');
define('PASS','admin123');
define('DB', 'login');

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
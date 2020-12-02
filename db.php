<?php 

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require 'vendor/autoload.php';

	define('HOST', '127.0.0.1');
	define('USER', 'root');
	define('PASS', '');
	define('DB', 'web');

	function open_db(){
		$conn = new mysqli(HOST, USER, PASS, DB);
		if($conn->connect_error){
			die('Connect error: '.$conn->connect_error);
		}
		return $conn;
	}

	function login($username, $password){
		$sql = "select * from user where username = ?";
		$conn = open_db();

		$stm = $conn->prepare($sql);
		$stm->bind_param('s', $username);

		if(!$stm->execute()){
			return null;
		}

		$result =  $stm->get_result();
		if ($result->num_rows == 0) {
			return 0;
		}
		$data = $result->fetch_assoc();

		$hashed_password = $data['password'];

		if(!password_verify("$password", "$hashed_password")){

			return 1;
		} else return $data;
	}

	function is_email_exists($email){
		$sql = 'select username from user where email = ?';
		$conn = open_db();

		$stm = $conn->prepare($sql);
		$stm->bind_param('s',$email);

		if(!$stm->execute()){
			die ('Error: '.$stm->error);
		}

		$result = $stm->get_result();
		if($result->num_rows > 0){
			return true;
		} else return false;
	}

	function is_username_exists($username){
		$sql = 'select username from user where username = ?';
		$conn = open_db();

		$stm = $conn->prepare($sql);
		$stm->bind_param('s',$username);

		if(!$stm->execute()){
			die ('Error: '.$stm->error);
		}

		$result = $stm->get_result();
		if($result->num_rows > 0){
			return true;
		} else return false;
	}

	function signUp($username, $password, $fullname, $dateofbirth, $email, $phone){
		if(is_email_exists($email)){
			return array('code' => 1, 'error' => 'Email exists');
		}

		if(is_username_exists($username)){
			return array('code' => 3, 'error' => 'Username exists');
		}

		$permission = 2;
		$hash = password_hash($password, PASSWORD_DEFAULT);
		$rand = random_int(0, 1000);
		$token = md5($username.'+'.$rand);
		$sql = 'INSERT INTO user(username, password, fullname, ngaysinh, email, sdt, token, permission) VALUES (?,?,?,?,?,?,?,?)';

		$conn = open_db();
		$stm = $conn->prepare($sql);
		$stm->bind_param('sssssssi',$username, $hash, $fullname, $dateofbirth, $email, $phone, $token, $permission);

		if(!$stm->execute()){
			return array('code' => 2, 'error' => 'Cant Execute');
		}

		return array('code' => 0, 'error' => 'Succesful');
	}

	function send_reset_email($email, $token){
		$mail = new PHPMailer(true);

		try {
		    $mail->isSMTP();                                    
		    $mail->CharSet = 'UTF-8';
		    $mail->Host = 'smtp.gmail.com';                  
		    $mail->SMTPAuth = true;                                
		    $mail->Username = 'thanhnhan1234@gmail.com';                    
		    $mail->Password = 'gekduagjlanoemwv';                             
		    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;        
		    $mail->Port = 587;                                  

		    //Recipients
		    $mail->setFrom('machtin1234@gmail.com', 'machtin');
		    $mail->addAddress($email, 'Người nhận');   

		    $mail->isHTML(true);                              
		    $mail->Subject = 'Recovery your password';
		    $mail->Body    = "Click <a href ='http://localhost:8088/Project/-n-Web/reset_password.php?email=$email&token=$token'>here</a> to recover password'";

		    $mail->send();
		    return true;
		} catch (Exception $e) {
		    return false;
		}
	}

	
	function reset_password($email){
		if(!is_email_exists($email)){
			return array('code' => 1, 'error' => 'Email doesnt exists');
		}

		$exp = time() + 3600 *5;
		$token = md5($email.'+'.random_int(1000,3000));
		$sql = 'update reset_token set token = ?, expire_on = ? where email = ?';

		$conn = open_db();
		$stm = $conn->prepare($sql);
		$stm->bind_param('sis',$token, $exp ,$email);

		if(!$stm->execute()){
			return array('code' => 2, 'error' => 'Cant execute statement 1');
		}

		if($stm->affected_rows == 0){	
			$sql = 'insert into reset_token values (?,?,?)';
			$stm = $conn->prepare($sql);
			$stm->bind_param('ssi', $email, $token ,$exp);

			if(!$stm->execute()){
				return array('code' => 2, 'error' => 'Cant execute statement 2');
			}
		}
		$success = send_reset_email($email, $token);
		return array('code' => 0, 'success' => $success);
	}

	function update_new_password($email, $password){
		$hash = password_hash($password, PASSWORD_DEFAULT);
		$sql = 'update user set password = ? where email = ?';

		$conn = open_db();
		$stm = $conn->prepare($sql);
		$stm->bind_param('ss',$hash,$email);

		if(!$stm->execute()){
			return array('code' => 2, 'error' => 'Cant Execute');
		}
		return array('code' => 0, 'error' => 'Password is changed successfully');
	}
	function add_class($nameClass,$nameTeacher,$nameSubject,$nameRoom,$teacherID){
		$sql = "Insert into class values(0,'$nameClass','$nameTeacher','$nameSubject','$nameRoom','$teacherID')";
		$conn = open_db();
		if($conn->query($sql)===TRUE){
			echo "Success";
		}else{
			echo "".$conn->error;
		}
	}
 ?>
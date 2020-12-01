<?php
	session_start();
	include('db.php');
	$message = '';
	$target_dir = "uploads/";

	if(isset($_POST["submit"])) {
		if (!empty($_FILES["fileToUpload"]["name"])) {
			$fileName = basename($_FILES["fileToUpload"]["name"]);
			$target_file = $target_dir . $fileName;
			$uploadOk = 1;
			$fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			$allowedfileTypes = array('jpg', 'gif', 'png', 'rar', 'zip', 'txt', 'xls', 'doc', 'docx', 'pdf');
			
			if (!in_array($fileType, $allowedfileTypes)) {
				$uploadOk = 0;
			} else {
				$uploadOk = 1;
			}
			
			if (file_exists($target_file)) {
				$message = "Sorry, file already exists.";
			} else {
				if ($_FILES["fileToUpload"]["size"] > 5000000) {
					$message = "Sorry, your file is too large.";
				} else {
					if ($uploadOk == 0) {
						$message = "Sorry, only ". implode(', ', $allowedfileTypes). " files are allowed.";
					} else {
						class Upload {
							private $db;
							private $connection;

							function __construct() {
								//constructor call    
								$this->db = new DB_Connection();
								$this->connection = $this->db->get_connection();
							}
							
							public function upload_file($file_name) {
								//set default time zone
								date_default_timezone_set("Asia/Ho_Chi_Minh");   
								//VietNam time (GMT+7)
								// get date and time
								$date_upload = date('Y-m-d H:i:s');
								
								//saving the file 
								$query = "INSERT INTO fileinfo(file_name, date_upload) VALUES('$file_name', '$date_upload')";
								$is_uploaded = mysqli_query($this->connection,$query);
								
								mysqli_close($this->connection);
							}
						}
						
						$load_file = new Upload();
						
						if (is_array($_FILES)) { 
							if (is_uploaded_file($_FILES['fileToUpload']['tmp_name'])) {
								$sourcePath = $_FILES['fileToUpload']['tmp_name'];
								$targetPath = "uploads/" .$_FILES['fileToUpload']['name'];        
								if (move_uploaded_file($sourcePath,$targetPath)) {
									$insert = $load_file-> upload_file($_FILES['fileToUpload']['name']);
									if (!$insert) {
										$message = "The file " .$fileName. " has been uploaded successfully.";
									} else {
										$message = "File upload failed, please try again.";
									}
								} else {
									$message = "Sorry, there was an error uploading your file.";
								}
							}
						}
					}
				}
			}
		} else {
			$message = "Please select a file to upload.";
		}
	}
	
	$_SESSION['message'] = $message;
	header("Location: nopbt.php");
?>
<?php
	session_start();
	$message = ''; 

	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	$allowedfileTypes = array('jpg', 'gif', 'png', 'rar', 'zip', 'txt', 'xls', 'doc', 'docx');

	if(isset($_POST["submit"])) {
		if ($fileType != "jpg" && $fileType != "gif" && $fileType != "png" && $fileType != "rar" && $fileType != "zip" && $fileType != "txt" 
		&& $fileType != "xls" && $fileType != "doc" && $fileType != "docx") {
			$uploadOk = 0;
		} else {
			$uploadOk = 1;
		}
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
				if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
					$message = "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
				} else {
					$message = "Sorry, there was an error uploading your file.";
				}
			}
		}
	}
	
	$_SESSION['message'] = $message;
	header("Location: dangnhap.php");
?>
<?php
	session_start();
	$comment = ''; 
	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["uploadFile"]["name"]);
	$uploadDone = 1;
	$fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	$allowedfileTypes = array('jpg', 'gif', 'png', 'rar', 'zip', 'txt', 'xls', 'doc', 'docx');

	if(isset($_POST["submit"])) {
		if ($fileType != "jpg" && $fileType != "gif" && $fileType != "png" && $fileType != "rar" && $fileType != "zip" && $fileType != "txt" 
		&& $fileType != "xls" && $fileType != "doc" && $fileType != "docx") {
			$uploadDone = 0;
		} else {
			$uploadDone = 1;
		}
	}
    if ($_FILES["uploadFile"]["size"] > 5000000) {
        $comment = "Too large";
    } else {
        if ($uploadDone == 0) {
            $comment = "This file type is not supported";
        } else {
            if (move_uploaded_file($_FILES["uploadFile"]["tmp_name"], $target_file)) {
                $comment = htmlspecialchars( basename( $_FILES["uploadFile"]["name"])). "uploaded";
            } else {
                $comment = "Sorry, there was an error uploading your file.";
            }
        }
    }

	$_SESSION['comment'] = $comment;
?>
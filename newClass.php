<?php
	include('db.php');

	if(isset($_POST['addclass']))
	{
		$nameClass=$_POST['nameClass'];
		$nameTeacher=$_POST['nameTeacher'];
		$nameSubject=$_POST['nameSubject'];
		$nameRoom=$_POST['nameRoom'];
		$teacherID='abc';
		add_class($nameClass,$nameTeacher,$nameSubject,$nameRoom,$teacherID);
		
	}else{
		DIE("unable");
	}
?>
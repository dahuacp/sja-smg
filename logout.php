<?php
	session_start();
	session_destroy();
	unset($_SESSION['ta_izad_username']); 
	unset($_SESSION['ta_izad_id']);
	unset($_SESSION['ta_izad_nama']);
	header('location:login.php');

?>
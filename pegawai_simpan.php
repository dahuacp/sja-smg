<?php
	error_reporting(E_ALL ^ E_NOTICE);
	include "session.php";
	include "koneksi.php";	
	
	$id = $_POST['hdn_id'];
	$txt_nama = $_POST['txt_nama'];
	$txt_uid = $_POST['txt_uid'];
	$cb_departemen = $_POST['cb_departemen'];
	$txt_pass = $_POST['txt_pass'];
	$txt_pass2=md5($txt_pass);
	
	$input = "INSERT INTO user (D_ID,U_USERNM,U_PASS,U_TYPE,U_NAMA) 
                          values ('$cb_departemen','$txt_uid','$txt_pass2',3,'$txt_nama')";						  
	//echo $input;
	$input = mysqli_query($con,$input);
	if($input) {
		echo "Data berhasil disimpan.";
	} else {
		echo "Data gagal disimpan.";
	}
?>


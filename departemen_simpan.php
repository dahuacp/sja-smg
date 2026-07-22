<?php
	
	include "session.php";
	include "koneksi.php";	
	
	$txt_nama = $_POST['txt_nama'];
	
	$input = "INSERT INTO departemen (	D_NAME) 
                          values ('$txt_nama')";						  
	//echo $input;
	$input = mysqli_query($con,$input);
	if($input) {
		echo "Data berhasil disimpan.";
	} else {
		echo "Data gagal disimpan.";
	}
?>


<?php
	
	include "session.php";
	include "koneksi.php";	
	
	$txt_password = $_POST['txt_password'];
	
	$input= "	UPDATE	user 
					SET	U_PASS = md5('$txt_password')
				WHERE	U_ID = $s_id ";
    echo $input;                
	$input = mysqli_query($con,$input);
	if($input) {
		echo "Data berhasil diubah.";
	} else {
		echo "Data gagal diubah.";
	}
?>


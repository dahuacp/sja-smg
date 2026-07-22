<?php
	
	include "session.php";
	include "koneksi.php";	
	
   	$id = $_POST['hdn_id'];
	$txt_nama = $_POST['txt_nama'];
	$txt_uid = $_POST['txt_uid'];
	$cb_departemen = $_POST['cb_departemen'];
	$txt_pass = $_POST['txt_pass'];
	if ($txt_pass==""){
	$input= "	UPDATE	user 
					SET	U_NAMA = '$txt_nama',
						D_ID = '$cb_departemen',
						U_USERNM = '$txt_uid'
						
				WHERE	U_ID = $id ";
    
	}
	else
	{
	$txt_pass2=md5($txt_pass);
	$input= "	UPDATE	user 
					SET	U_NAMA = '$txt_nama',
						D_ID = '$cb_departemen',
						U_USERNM = '$txt_uid',
						U_PASS= '$txt_pass2'
				WHERE	U_ID = $id ";
    
	}
										
	//echo $input;                
	$input = mysqli_query($con,$input);
	if($input) {
		echo "Data berhasil diubah.";
	} else {
		echo "Data gagal diubah.";
	}
?>


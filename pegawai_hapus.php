<?php
	
	include "session.php";
	include "koneksi.php";	
	
   	$id = $_POST['hdn_id'];
	
	$input= "	UPDATE	user 
					SET	U_IS_DELETE = 1
				WHERE	U_ID = $id ";
    //echo $input;                
	$input = mysqli_query($con,$input);
	if($input) {
		echo "Data berhasil dihapus.";
	} else {
		echo "Data gagal dihapus.";
	}
?>


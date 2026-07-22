<?php
	
	include "session.php";
	include "koneksi.php";	
	
   	$id = $_POST['hdn_id'];
	
	$input= "	UPDATE	departemen 
					SET	D_IS_DELETE = 1
				WHERE	D_ID = $id ";
    //echo $input;                
	$input = mysqli_query($con,$input);
	if($input) {
		echo "Data berhasil dihapus.";
	} else {
		echo "Data gagal dihapus.";
	}
?>


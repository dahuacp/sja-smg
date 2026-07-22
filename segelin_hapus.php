<?php
	
	include "session.php";
	include "koneksi.php";	
	
   	$id = $_POST['hdn_id'];
	$cb_dokumen = $_POST['cb_dokumen'];
	$input= "	UPDATE	segelin 
					SET	SG_IS_DELETE = 1
				WHERE	SG_ID = $id ";
    //echo $input;                
	$input = mysqli_query($con,$input);
	if($input) {
		
		echo "Data berhasil dihapus.";
	} else {
		echo "Data gagal dihapus.";
	}
?>


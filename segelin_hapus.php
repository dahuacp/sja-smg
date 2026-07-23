<?php
	
	include "session.php";
	include "koneksi.php";	
	
   	$id = (int)$_POST['hdn_id'];
	$cb_dokumen = $_POST['cb_dokumen'];
	$input= "	UPDATE	segelin
					SET	SG_IS_DELETE = 1
				WHERE	SG_ID = $id ";
    //echo $input;
	$input = mysqli_query($con,$input);
	if($input) {

		include "fn_dea.php";
		update_saldo();

		echo "Data berhasil dihapus.";
	} else {
		echo "Data gagal dihapus.";
	}
?>


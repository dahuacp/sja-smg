<?php
	
	include "session.php";
	include "koneksi.php";	
	
   	$id = (int)$_POST['hdn_id'];
	
	$input= "	UPDATE	pemasukan 
					SET	PE_IS_DELETE = 1
				WHERE	PE_ID = $id ";
    //echo $input;                
	$input = mysqli_query($con,$input);
	if($input) {

		include "fn_dea.php";
		mysqli_query($con, "UPDATE kartu_stok SET KS_IS_DELETE = 1 WHERE KS_PE_PENG_ID = $id AND KS_JENIS_DOKUMEN = 'PPKB'");
		update_saldo();

		echo "Data berhasil dihapus.";
	} else {
		echo "Data gagal dihapus.";
	}
?>


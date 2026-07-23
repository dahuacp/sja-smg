<?php

	include "session.php";
	include "koneksi.php";

  	$id = (int)$_POST['hdn_id'];

	$input= "	UPDATE	kartu_stok
					SET	KS_IS_DELETE = 1
				WHERE	KS_ID = $id ";
	$input = mysqli_query($con,$input);
	if($input) {

		include "fn_dea.php";
		update_saldo();

		echo "Data berhasil dihapus.";
	} else {
		echo "Data gagal dihapus.";
	}
?>
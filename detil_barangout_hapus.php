<?php

	include "session.php";
	include "koneksi.php";

   	$id = $_POST['hdn_id'];

	$input= "	UPDATE	kartu_stok
					SET	KS_IS_DELETE = 1
				WHERE	KS_ID = $id ";
	$input = mysqli_query($con,$input);
	if($input) {
		echo "Data berhasil dihapus.";
	} else {
		echo "Data gagal dihapus.";
	}
?>
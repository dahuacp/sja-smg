<?php
	
	include "session.php";
	include "koneksi.php";	
	
   	$id = $_POST['hdn_id'];
	$txt_nama = $_POST['txt_nama'];
	
	$input= "	UPDATE	departemen 
					SET	D_NAME = '$txt_nama'
						
				WHERE	D_ID = $id ";
    //echo $input;                
	$input = mysqli_query($con,$input);
	if($input) {
		echo "Data berhasil diubah.";
	} else {
		echo "Data gagal diubah.";
	}
?>


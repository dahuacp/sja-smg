<?php
	
	include "session.php";
	include "koneksi.php";	
	
   	$id = $_POST['hdn_id'];
	$cb_PENG_JENIS_DOKUMEN = $_POST['cb_PENG_JENIS_DOKUMEN'];
	$txt_PENG_NOMOR_DOK = $_POST['txt_PENG_NOMOR_DOK'];
	$txt_PENG_DATE_DOK = $_POST['txt_PENG_DATE_DOK'];
	$cb_PENG_JALUR_DOK = $_POST['cb_PENG_JALUR_DOK'];
	$txt_PENG_BALE = $_POST['txt_PENG_BALE'];
	$cb_PENG_JENIS_BARANG = $_POST['cb_PENG_JENIS_BARANG'];
	$txt_PENG_IW = $_POST['txt_PENG_IW'];
	$txt_PENG_PENERIMA = $_POST['txt_PENG_PENERIMA'];
	$txt_PENG_PENERIMA_KOTA = $_POST['txt_PENG_PENERIMA_KOTA'];
	$txt_PENG_DATE = $_POST['txt_PENG_DATE'];
	
	
	$input= "	UPDATE	pengeluaran 
					SET	
											PENG_JENIS_DOKUMEN = '$cb_PENG_JENIS_DOKUMEN', 
											PENG_NOMOR_DOK = '$txt_PENG_NOMOR_DOK',
											PENG_DATE_DOK = STR_TO_DATE('$txt_PENG_DATE_DOK','%d/%m/%Y'), 
											PENG_JALUR_DOK = '$cb_PENG_JALUR_DOK', 
											PENG_BALE = '$txt_PENG_BALE', 
											PENG_JENIS_BARANG = '$cb_PENG_JENIS_BARANG', 
											PENG_IW = '$txt_PENG_IW',
											PENG_PENERIMA = '$txt_PENG_PENERIMA', 
											PENG_PENERIMA_KOTA = '$txt_PENG_PENERIMA_KOTA', 
											PENG_DATE = STR_TO_DATE('$txt_PENG_DATE','%d/%m/%Y %H:%i')
											
						
				WHERE	PENG_ID = $id ";
    //echo $input;                
	$input = mysqli_query($con,$input);

	//update sekalian yg di kartu_stok
	$input2= "	UPDATE kartu_stok
				SET     KS_INOUT_NOMOR='$txt_PENG_NOMOR_DOK'
				WHERE KS_PE_PENG_ID=$id	 ";
	$input= mysqli_query($con,$input2);
	if($input) {
		echo "Data berhasil diubah.";
	} else {
		echo "Data gagal diubah.";
	}
?>


<?php
	error_reporting(E_ALL ^ E_NOTICE);
	include "session.php";
	include "koneksi.php";	
	
	
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
	$txt_PENG_HARGA_PENYERAHAN = "0";

	$input = "INSERT INTO pengeluaran  (	PENG_JENIS_DOKUMEN, 
											PENG_NOMOR_DOK, 
											PENG_DATE_DOK, 
											PENG_JALUR_DOK, 
											PENG_BALE, 
											PENG_JENIS_BARANG, 
											PENG_IW,
											PENG_PENERIMA, 
											PENG_PENERIMA_KOTA, 
											PENG_DATE, 
											PENG_HARGA_PENYERAHAN	) 
        values (	'$cb_PENG_JENIS_DOKUMEN',  
					'$txt_PENG_NOMOR_DOK', 
					STR_TO_DATE('$txt_PENG_DATE_DOK','%d/%m/%Y'), 
					'$cb_PENG_JALUR_DOK', 
					'$txt_PENG_BALE',
					'$cb_PENG_JENIS_BARANG',
					'$txt_PENG_IW',
					'$txt_PENG_PENERIMA',
					'$txt_PENG_PENERIMA_KOTA',
					STR_TO_DATE('$txt_PENG_DATE','%d/%m/%Y %H:%i'), 
					'$txt_PENG_HARGA_PENYERAHAN'	)";						  
	//echo $input;
	$input = mysqli_query($con,$input);
	if($input) {
		echo "Data berhasil disimpan.";
	} else {
		echo "Data gagal disimpan.";
	}
	
?>




<?php
	error_reporting(E_ALL ^ E_NOTICE);
	include "session.php";
	include "koneksi.php";	
	
	
	
	$txt_KS_DATE = $_POST['txt_KS_DATE'];
	$cb_PENGELUARAN = $_POST['cb_PENGELUARAN'];
	$txt_PENG_IW = $_POST['txt_PENG_IW'];
	$txt_PENG_BALE = $_POST['txt_PENG_BALE'];
	$txt_PENG_KE = $_POST['txt_PENG_KE'];
	$txt_NO_OD = $_POST['txt_NO_OD'];
	$txt_NO_PACKING_SLIP = $_POST['txt_NO_PACKING_SLIP'];
	$txt_NOPOL = $_POST['txt_NOPOL'];
	
	include "fn_dea.php";
	$tonase_sisa = tonase_sisa($cb_PENGELUARAN);
	//echo $tonase_sisa;
	$tonase_sisa = $tonase_sisa - $txt_PENG_IW;
    //echo "  $txt_PENG_IW";
	if($tonase_sisa < -1){			
		echo "Pengeluaran Tonase (IW) lebih besar dari sisa.";
	}else{
	
	
                      $sql = "  SELECT	d.*,
										DATE_FORMAT(d.PENG_DATE_DOK, '%d/%m/%Y') AS PENG_DATE_DOK_NEW,
										DATE_FORMAT(d.PENG_DATE, '%d/%m/%Y %H:%i ') AS PENG_DATE_NEW
								FROM	pengeluaran d   
								WHERE	d.PENG_ID = $cb_PENGELUARAN	";
                      //echo $sql;      
                      $sql = mysqli_query($con,$sql);
                      while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
						  $d_PENG_JENIS_DOKUMEN = $data["PENG_JENIS_DOKUMEN"];
						  $d_PENG_DATE_DOK_NEW = $data["PENG_DATE_DOK_NEW"];
						  $d_PENG_NOMOR_DOK = $data["PENG_NOMOR_DOK"];
						  $d_PENG_JALUR_DOK = $data["PENG_JALUR_DOK"];
						  $d_PENG_BALE = $data["PENG_BALE"];
						  $d_PENG_JENIS_BARANG = $data["PENG_JENIS_BARANG"];
						  $d_PENG_IW = $data ["PENG_IW"];
						  $d_PENG_KGM = $data ["PENG_KGM"];
						  $d_PENG_PENERIMA = $data["PENG_PENERIMA"];
						  $d_PENG_PENERIMA_KOTA = $data["PENG_PENERIMA_KOTA"];
						  $d_PENG_DATE_NEW = $data["PENG_DATE_NEW"];
						  $d_PENG_HARGA_PENYERAHAN = $data["PENG_HARGA_PENYERAHAN"];
					  }


		//include "fn_dea.php";
    	$data_ret = inout_tambah();
		$arr_data_ret = explode("_", $data_ret);
		$tonase_saldo = $arr_data_ret[2];
		//echo "saldo tonase $tonase_saldo";
		$bales_saldo = $arr_data_ret[3];	
		//echo "IW = $txt_PENG_IW   Bale=$txt_PENG_BALE";
		$tonase_saldo = $tonase_saldo - $txt_PENG_IW;
		$bales_saldo = $bales_saldo - $txt_PENG_BALE;							  

		$input = "	INSERT INTO kartu_stok  (	KS_PE_PENG_ID, 
												KS_DATE, 
												KS_JENIS_DOKUMEN, 
												KS_INOUT_DATE, 
												KS_INOUT_NOMOR, 
												KS_TONASE_KELUAR, 
												KS_BALES_OUT,
												KS_PENGELUARAN_KE, 
												KS_NOMOR_OD, 
												KS_NOMOR_PACKING_SLIP,
												KS_NOPOL,
												KS_TONASE_SALDO,
												KS_BALES_SALDO		) 
					values (	$cb_PENGELUARAN, 
								STR_TO_DATE('$txt_KS_DATE','%d/%m/%Y %H:%i'), 
								'$d_PENG_JENIS_DOKUMEN', 							
								STR_TO_DATE('$d_PENG_DATE_DOK_NEW','%d/%m/%Y'), 
								'$d_PENG_NOMOR_DOK', 						
								'$txt_PENG_IW', 
								'$txt_PENG_BALE', 
								'$txt_PENG_KE',  
								'$txt_NO_OD',  
								'$txt_NO_PACKING_SLIP', 
								'$txt_NOPOL',
								$tonase_saldo,
								$bales_saldo)";						  
		//echo $input;

		$input = mysqli_query($con,$input);
		if($input) {
			
			if($tonase_sisa<=0){
				$update= "	UPDATE	pengeluaran 
								SET	PENG_KET = 'SELESAI'
							WHERE	PENG_ID = $cb_PENGELUARAN ";
				//echo $update;                
				$update = mysqli_query($con,$update);						
			}else{
				$update= "	UPDATE	pengeluaran 
								SET	PENG_KET = ''
							WHERE	PENG_ID = $cb_PENGELUARAN ";
				//echo $update;                
				$update = mysqli_query($con,$update);						
			}			
			
			echo "Data berhasil disimpan.";
		} else {
			echo "Data gagal disimpan.";
		}
		
	
	}
?>





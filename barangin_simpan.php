<?php
	error_reporting(E_ALL ^ E_NOTICE);
	include "session.php";
	include "koneksi.php";	
	
	
	$txt_jenisbr = $_POST['t_jenisbr'];
	$txt_TGL_TPB = $_POST['txt_TGL_TPB'];
	$txt_PE_No_PPBKB = $_POST['txt_PE_No_PPBKB'];
	$txt_TGL_PPB = $_POST['txt_TGL_PPB'];
	$txt_PE_IW = $_POST['txt_PE_IW'];
	$txt_Bale = $_POST['txt_Bale'];
	$txt_PE_No_Container = $_POST['txt_PE_No_Container'];
	$txt_PE_Segel = $_POST['txt_PE_Segel'];
	$t_jeniscnt = $_POST['t_jeniscnt'];
    $txt_PE_KET= $_POST['txt_PE_KET'];
	$d_SG_ID= $_POST['cb_voyage'];
	if($t_jeniscnt="Container")$txt_PE_Feet = 40;
	else $txt_PE_Feet=0;
	$input = "INSERT INTO pemasukan  (SG_ID, PE_Date_TPB, PE_No_PPBKB, PE_Date_PPBKB, PE_IW,PE_Bale,PE_Type_Cont,PE_No_Container,PE_Feet,PE_Segel,PE_Jenis_Barang,PE_KET) 
        values ( $d_SG_ID, STR_TO_DATE('$txt_TGL_TPB','%d/%m/%Y %H:%i'),'$txt_PE_No_PPBKB',STR_TO_DATE('$txt_TGL_PPB','%d/%m/%Y'),$txt_PE_IW,$txt_Bale,'$t_jeniscnt','$txt_PE_No_Container', $txt_PE_Feet,'$txt_PE_Segel','$txt_jenisbr'
              ,'$txt_PE_KET'             )";						  
	//echo $input;
	$input = mysqli_query($con,$input);
	if($input) {	


    


                      $d_id = mysqli_insert_id($con);
		include "cekstatus.php";
		ceksesuai($d_SG_ID);
		include "fn_dea.php";
    	$data_ret = inout_tambah();
		//echo $arr_data_ret;
		$arr_data_ret = explode("_", $data_ret);
		
		$tonase_saldo = $arr_data_ret[2];
		$bales_saldo = $arr_data_ret[3];
		
		$tonase_saldo = $tonase_saldo + $txt_PE_IW;
		$bales_saldo = $bales_saldo + $txt_Bale;		
		
		$input2 = "INSERT INTO kartu_stok  ( KS_PE_PENG_ID, KS_DATE, KS_JENIS_DOKUMEN, KS_INOUT_DATE, KS_INOUT_NOMOR, KS_TONASE_MASUK, KS_TONASE_SALDO, KS_BALES_IN, KS_BALES_SALDO ) values ( $d_id, STR_TO_DATE('$txt_TGL_TPB','%d/%m/%Y %H:%i'), 'PPKB', STR_TO_DATE('$txt_TGL_PPB','%d/%m/%Y'), '$txt_PE_No_PPBKB', $txt_PE_IW, $tonase_saldo, $txt_Bale, $bales_saldo ) ";						  
		//echo $input2;
		$input2 = mysqli_query($con,$input2);
		
		
		
		echo "Data berhasil disimpan.";
	} else {
		echo "Data gagal disimpan.";
	}
	
?>






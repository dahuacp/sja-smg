<?php
	
	include "session.php";
	include "koneksi.php";	
	include "fn_dea.php";
	
   	$id = $_POST['hdn_id'];
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
	if($t_jeniscnt=="Container")$txt_PE_Feet = 40;
	else $txt_PE_Feet=0;
	$cb_voyage= $_POST['cb_voyage'];
		
    	$data_ret = in_cek($id);
		//echo $data_ret;
		$arr_data_ret = explode("_", $data_ret);
		
		$id_ks = $arr_data_ret[0];
		
		$tonase_masuk_old = $arr_data_ret[2];
		$tonase_saldo_old = $arr_data_ret[4];
		
		$bales_in_old = $arr_data_ret[5];		
		$bales_saldo_old = $arr_data_ret[7];

		$tonase_saldo = ( $tonase_saldo_old - $tonase_masuk_old ) + $txt_PE_IW;
		$bales_saldo = ( $bales_saldo_old - $bales_in_old ) + $txt_Bale;	
		
	$input= "	UPDATE	pemasukan 
					SET	PE_Date_TPB = STR_TO_DATE('$txt_TGL_TPB','%d/%m/%Y %H:%i'), 
					    PE_No_PPBKB = '$txt_PE_No_PPBKB', 
					    PE_Date_PPBKB = STR_TO_DATE('$txt_TGL_PPB','%d/%m/%Y'), 
					    PE_IW = $txt_PE_IW,
					    PE_Bale = $txt_Bale,
					    PE_No_Container = '$txt_PE_No_Container',
					    PE_Feet = $txt_PE_Feet,
					    PE_Segel = '$txt_PE_Segel',
					    PE_Jenis_Barang = '$txt_jenisbr',
						PE_Type_Cont = '$t_jeniscnt',
					    PE_KET = '$txt_PE_KET',
					    SG_ID=$cb_voyage
				WHERE	PE_ID = $id ";
    //echo $input;                
	$input = mysqli_query($con,$input);
	if($input) {
		
		$input2= "	UPDATE	kartu_stok 
						SET	
												KS_TONASE_MASUK = '$txt_PE_IW', 
												KS_TONASE_SALDO = '$tonase_saldo', 
												KS_BALES_IN = '$txt_Bale', 
												KS_BALES_SALDO = '$bales_saldo'
							
					WHERE	KS_ID = $id_ks ";
		//echo $input2;                
		$input2 = mysqli_query($con,$input2);	
		
    	inout_update($id_ks, $tonase_saldo, $bales_saldo);
		
		echo "Data berhasil diubah.";
	} else {
		echo "Data gagal diubah.";
	}
?>


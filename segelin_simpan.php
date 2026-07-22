<?php
	error_reporting(E_ALL ^ E_NOTICE);
	include "session.php";
	include "koneksi.php";	
	
	
	
	$txt_SG_DATE = $_POST['txt_SG_DATE'];
	$cb_dokumen = $_POST['cb_dokumen'];
	$txt_SG_JML = $_POST['txt_SG_JML'];
	$txt_Bale = $_POST['txt_Bale'];
	$txt_Iw = $_POST['txt_Iw'];
	$txt_Voyage = $_POST['txt_Voyage'];
	

	$input = "INSERT INTO segelin  ( SG_DATE, SG_JML,SG_BL,SG_KG,SG_VOYAGE,SG_KET ) 
        values ( STR_TO_DATE('$txt_SG_DATE','%d/%m/%Y %H:%i'),'$txt_SG_JML',$txt_Bale,$txt_Iw
        ,'$txt_Voyage','NOT OK')";						  
	//echo $input;

	$input = mysqli_query($con,$input);
	if($input) {
		echo "Data berhasil disimpan.";
		//update status pengecekan
		
	} else {
		echo "Data gagal disimpan.";
	}
	
?>





<?php
/*	
	include "session.php";
	include "koneksi.php";	
	error_reporting(E_ALL ^ E_NOTICE);
	          echo  $_POST['$txt_nama'];  

	          $txt_PE_Date_TPB = $_POST['$txt_PE_Date_TPB'];
              $txt_PE_No_PPBKB= $_POST['$txt_PE_No_PPBKB']; 
              $txt_PE_Date_PPBKB= $_POST['$txt_PE_Date_PPBKB']; 
			  $txt_PE_IW= $_POST['$txt_PE_IW']; 
              $txt_PE_KGM= $_POST['$txt_PE_KGM']; 
			  $txt_PE_Bale= $_POST['$txt_PE_Bale']; 
			  $txt_PE_No_Container= $_POST['$txt_PE_No_Container']; 
			  $txt_PE_Feet= $_POST['$txt_PE_Feet']; 
			  $txt_PE_Segel= $_POST['$txt_PE_Segel'];   
              $txt_PE_Jenis_Barang= $_POST['$txt_PE_Jenis_Barang'];  

	
	
	$input = "INSERT INTO pemasukan  ( PE_Date_TPB, PE_No_PPBKB, PE_Date_PPBKB, PE_IW,PE_KGM,PE_Bale,
										PE_No_Container,PE_Feet,PE_Segel,PE_Jenis_Barang)
										
            values (STR_TO_DATE('$txt_PE_Date_TPB','%m/%d/%Y %H:%i'),'$txt_PE_No_PPBKB',STR_TO_DATE('$txt_PE_Date_PPBKB','%m/%d/%Y'),'$txt_PE_IW',$txt_PE_KGM,$txt_PE_Bale,'$txt_PE_No_Container',$txt_PE_Feet,'$txt_PE_Segel','$txt_PE_Jenis_Barang')";			 
	//echo $input;
	$input = mysqli_query($con,$input);
	if($input) {
		echo "Data berhasil disimpan."; 
	} else {
		echo "Data gagal disimpan.";
	}

*/
?>


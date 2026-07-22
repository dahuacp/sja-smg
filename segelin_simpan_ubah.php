<?php
	
	include "session.php";
	include "koneksi.php";	
	
   	$id = $_POST['hdn_id'];
	$txt_SG_DATE = $_POST['txt_SG_DATE'];
	
	$txt_SG_JML = $_POST['txt_SG_JML'];
	$txt_Bale = $_POST['txt_Bale'];
	$txt_Iw = $_POST['txt_Iw'];
	$txt_Voyage = $_POST['txt_Voyage'];
	
	$input= "	UPDATE	segelin 
					SET	SG_DATE = STR_TO_DATE('$txt_SG_DATE','%d/%m/%Y %H:%i'), 
					    
					    SG_JML = '$txt_SG_JML', 
					    SG_BL = $txt_Bale,
					    SG_KG = $txt_Iw,
					    SG_VOYAGE = '$txt_Voyage'
				WHERE	SG_ID = $id ";
    //echo $input;                
	$input = mysqli_query($con,$input);
	if($input) {
		
		echo "Data berhasil diubah.";
	} else {
		echo "Data gagal diubah.";
	}
?>


<?php
	
	include "session.php";
	include "koneksi.php";	
	include "file_fn.php";	
	
   	$id = $_POST['hdn_id'];
	$txt_PENG_IW = $_POST['txt_PENG_IW'];
	$txt_PENG_BALE = $_POST['txt_PENG_BALE'];
	$txt_PENG_KE = $_POST['txt_PENG_KE'];
	$txt_NO_OD = $_POST['txt_NO_OD'];
	$txt_NO_PACKING_SLIP = $_POST['txt_NO_PACKING_SLIP'];
	$txt_NOPOL = $_POST['txt_NOPOL'];

		include "fn_dea.php";
    	$data_ret = out_cek($id);
		$arr_data_ret = explode("_", $data_ret);
		
		$tonase_keluar_old = $arr_data_ret[3];
		$tonase_saldo_old = $arr_data_ret[4];
		
		$bales_out_old = $arr_data_ret[6];		
		$bales_saldo_old = $arr_data_ret[7];



                      $sql = "  SELECT	d.*
								FROM	kartu_stok d   
								WHERE	d.KS_ID = $id 	";
					  //echo $sql;
					  $sql = mysqli_query($con,$sql);
					  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){							
							$d_peng_id = $data["KS_PE_PENG_ID"]; 						  
					  }
					
						$tonase_sisa = tonase_sisa($d_peng_id);
						$tonase_sisa = $tonase_sisa + $tonase_keluar_old;
						$tonase_sisa = $tonase_sisa - $txt_PENG_IW;

					
	if($tonase_sisa < -1){			
		echo "Pengeluaran Tonase (IW) lebih besar dari sisa.";
	}else{					
    

		$tonase_saldo = ( $tonase_saldo_old + $tonase_keluar_old ) - $txt_PENG_IW;
		$bales_saldo = ( $bales_saldo_old + $bales_out_old ) - $txt_PENG_BALE;	
		
		$input= "	UPDATE	kartu_stok 
						SET	
												KS_TONASE_KELUAR = '$txt_PENG_IW', 
												KS_TONASE_SALDO = '$tonase_saldo', 
												KS_BALES_OUT = '$txt_PENG_BALE', 
												KS_BALES_SALDO = '$bales_saldo', 
												KS_PENGELUARAN_KE = '$txt_PENG_KE', 
												KS_NOMOR_OD = '$txt_NO_OD', 
												KS_NOMOR_PACKING_SLIP = '$txt_NO_PACKING_SLIP', 
												KS_NOPOL = '$txt_NOPOL'
							
					WHERE	KS_ID = $id ";
		//echo $input;                
		$input = mysqli_query($con,$input);
		if($input) {	
		
			inout_update($id, $tonase_saldo, $bales_saldo);
						
			if($tonase_sisa<=1){
				$update= "	UPDATE	pengeluaran 
								SET	PENG_KET = 'SELESAI'
							WHERE	PENG_ID = $d_peng_id ";
				//echo $update;                
				$update = mysqli_query($con,$update);						
			}else{
				$update= "	UPDATE	pengeluaran 
								SET	PENG_KET = ''
							WHERE	PENG_ID = $d_peng_id ";
				//echo $update;                
				$update = mysqli_query($con,$update);						
			}			
			
			echo "Data berhasil diubah.";
		} else {
			echo "Data gagal diubah.";
		}
		
	}	
		
?>


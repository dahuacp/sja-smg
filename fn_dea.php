<?php
	error_reporting(E_ALL ^ E_NOTICE);
	
	
	
	function update_saldo(){
		global $con;
		
                      $sql = "  SELECT	d.*
								FROM	kartu_stok d   
								WHERE	d.KS_IS_DELETE = 0
								ORDER BY d.KS_ID	";
					  //echo $sql;
					  $tonase_saldo = 0;
					  $bales_saldo = 0;
					  $sql = mysqli_query($con,$sql);
					  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
							
							$d_id = $data["KS_ID"]; 
						  
						  $d_KS_JENIS_DOKUMEN = $data["KS_JENIS_DOKUMEN"];
						  $d_KS_TONASE_MASUK = $data ["KS_TONASE_MASUK"];
						  $d_KS_TONASE_KELUAR = $data ["KS_TONASE_KELUAR"];
						  $d_KS_BALES_IN = $data["KS_BALES_IN"];
						  $d_KS_BALES_OUT = $data["KS_BALES_OUT"];
						  
						  if($d_KS_JENIS_DOKUMEN=='PPKB'){
								$tonase_saldo = $tonase_saldo +  $d_KS_TONASE_MASUK; 
								$bales_saldo = $bales_saldo +  $d_KS_BALES_IN; 
						  }else{
								$tonase_saldo = $tonase_saldo -  $d_KS_TONASE_KELUAR; 	
								$bales_saldo = $bales_saldo -  $d_KS_BALES_OUT; 						  
						  }
						  

							$input= "	UPDATE	kartu_stok 
											SET	
																	KS_TONASE_SALDO = '$tonase_saldo', 
																	KS_BALES_SALDO = '$bales_saldo'						
										WHERE	KS_ID = $d_id ";
							//echo $input;                
							$input = mysqli_query($con,$input);						  
						  
							
						}	
						
	}	


	function inout_tambah(){
		global $con;
		
                      $sql = "  SELECT	d.*
								FROM	kartu_stok d   
								WHERE	d.KS_IS_DELETE = 0
								ORDER BY d.KS_ID desc limit 1	";
					  //echo $sql;
					  $tonase_saldo = 0;
					  $bales_saldo = 0;
					  $sql = mysqli_query($con,$sql);
					  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
							
							$d_id = $data["KS_ID"]; 
						  
							  $d_KS_JENIS_DOKUMEN = $data["KS_JENIS_DOKUMEN"];
							  $d_KS_TONASE_SALDO = $data ["KS_TONASE_SALDO"];
							  $d_KS_BALES_SALDO = $data["KS_BALES_SALDO"];
						  									
					  }		
		
		return $ret_val = $d_id . "_" . $d_KS_JENIS_DOKUMEN . "_" . $d_KS_TONASE_SALDO . "_" . $d_KS_BALES_SALDO ;			  
	}		
	
	
	function out_cek($id){
		global $con;
		
                      $sql = "  SELECT	d.*
								FROM	kartu_stok d   
								WHERE	d.KS_ID = $id
								ORDER BY d.KS_ID LIMIT 1";
					  //echo $sql;
					  $tonase_saldo = 0;
					  $bales_saldo = 0;
					  $sql = mysqli_query($con,$sql);
					  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
							
							$d_id = $data["KS_ID"]; 
						  
							  $d_KS_JENIS_DOKUMEN = $data["KS_JENIS_DOKUMEN"];
							  $d_KS_TONASE_MASUK = $data ["KS_TONASE_MASUK"];
							  $d_KS_TONASE_KELUAR = $data ["KS_TONASE_KELUAR"];
							  $d_KS_TONASE_SALDO = $data ["KS_TONASE_SALDO"];
							  $d_KS_BALES_IN = $data["KS_BALES_IN"];
							  $d_KS_BALES_OUT = $data["KS_BALES_OUT"];
							  $d_KS_BALES_SALDO = $data["KS_BALES_SALDO"];
						  									
					  }		
		
		return $ret_val =	$d_id . "_" . $d_KS_JENIS_DOKUMEN 
							. "_" . $d_KS_TONASE_MASUK . "_" . $d_KS_TONASE_KELUAR . "_" . $d_KS_TONASE_SALDO 
							. "_" . $d_KS_BALES_IN . "_" . $d_KS_BALES_OUT  . "_" . $d_KS_BALES_SALDO ;		
					
	}	
	
	
	function in_cek($id){
		global $con;
		
                      $sql = "  SELECT	d.*
								FROM	kartu_stok d   
								WHERE	d.KS_PE_PENG_ID = $id 
										AND d.KS_JENIS_DOKUMEN = 'PPKB'
										AND d.KS_IS_DELETE = 0 
								ORDER BY d.KS_ID DESC LIMIT 1";
					  //echo $sql;
					  $tonase_saldo = 0;
					  $bales_saldo = 0;
					  $sql = mysqli_query($con,$sql);
					  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
							
							$d_id = $data["KS_ID"]; 
						  
							  $d_KS_JENIS_DOKUMEN = $data["KS_JENIS_DOKUMEN"];
							  $d_KS_TONASE_MASUK = $data["KS_TONASE_MASUK"];
							  $d_KS_TONASE_KELUAR = $data["KS_TONASE_KELUAR"];
							  $d_KS_TONASE_SALDO = $data["KS_TONASE_SALDO"];
							  $d_KS_BALES_IN = $data["KS_BALES_IN"];
							  $d_KS_BALES_OUT = $data["KS_BALES_OUT"];
							  $d_KS_BALES_SALDO = $data["KS_BALES_SALDO"];
						  									
					  }		
		
		return $ret_val =	$d_id . "_" . $d_KS_JENIS_DOKUMEN 
							. "_" . $d_KS_TONASE_MASUK . "_" . $d_KS_TONASE_KELUAR . "_" . $d_KS_TONASE_SALDO 
							. "_" . $d_KS_BALES_IN . "_" . $d_KS_BALES_OUT  . "_" . $d_KS_BALES_SALDO ;		
					
	}	
	

	function inout_update($id, $tonase_saldo_old, $bales_saldo_old){
		global $con;
		
                      $sql = "  SELECT	d.*
								FROM	kartu_stok d   
								WHERE	d.KS_IS_DELETE = 0 AND d.KS_ID > $id 
								ORDER BY d.KS_ID	";
					  //echo $sql;
					  $tonase_saldo = $tonase_saldo_old;
					  $bales_saldo = $bales_saldo_old;
					  $sql = mysqli_query($con,$sql);
					  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
							
							$d_id = $data["KS_ID"]; 
						  
						  $d_KS_JENIS_DOKUMEN = $data["KS_JENIS_DOKUMEN"];
						  $d_KS_TONASE_MASUK = $data ["KS_TONASE_MASUK"];
						  $d_KS_TONASE_KELUAR = $data ["KS_TONASE_KELUAR"];
						  $d_KS_BALES_IN = $data["KS_BALES_IN"];
						  $d_KS_BALES_OUT = $data["KS_BALES_OUT"];
						  
						  if($d_KS_JENIS_DOKUMEN=='PPKB'){
								$tonase_saldo = $tonase_saldo +  $d_KS_TONASE_MASUK; 
								$bales_saldo = $bales_saldo +  $d_KS_BALES_IN; 
						  }else{
								$tonase_saldo = $tonase_saldo -  $d_KS_TONASE_KELUAR; 	
								$bales_saldo = $bales_saldo -  $d_KS_BALES_OUT; 						  
						  }
						  

							$input= "	UPDATE	kartu_stok 
											SET	
																	KS_TONASE_SALDO = '$tonase_saldo', 
																	KS_BALES_SALDO = '$bales_saldo'						
										WHERE	KS_ID = $d_id ";
							//echo $input;                
							$input = mysqli_query($con,$input);						  
						  							
						}	

						
	}	


	function tonase_sisa($peng_id){
		global $con;
		
                      $sql = "  SELECT	d.*
								FROM	pengeluaran d   
								WHERE	d.PENG_ID = $peng_id LIMIT 1";
					  //echo $sql;					  
					  $sql = mysqli_query($con,$sql);
					  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){							
							$d_peng_iw = $data["PENG_IW"]; 
							$d_peng_jenis_dokumen = $data["PENG_JENIS_DOKUMEN"]; 							
					  }
					
                      $sql = "  SELECT	IFNULL(ROUND(SUM(d.KS_TONASE_KELUAR),2),0) AS SUM_TONASE
								FROM	kartu_stok d   
								WHERE	d.KS_PE_PENG_ID = $peng_id 
										AND d.KS_JENIS_DOKUMEN = '$d_peng_jenis_dokumen'	";
					  //echo $sql;					  
					  $sql = mysqli_query($con,$sql);
					  $d_sum_tonase = 0;
					  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){								
							$d_sum_tonase = $data["SUM_TONASE"]; 							
					  }	
					  
					  $tonase_sisa = $d_peng_iw - $d_sum_tonase;
					  
					  return $tonase_sisa;
					
						
	}	

function tonase_sisa2($peng_id){
		global $con;
		
                      $sql = "  SELECT	d.*
								FROM	pengeluaran d   
								WHERE	d.PENG_ID = $peng_id LIMIT 1";
					  //echo $sql;					  
					  $sql = mysqli_query($con,$sql);
					  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){							
							$d_peng_iw = $data["PENG_IW"];
							$d_peng_bale=$data["PENG_BALE"]; 
							$d_peng_jenis_dokumen = $data["PENG_JENIS_DOKUMEN"]; 							
					  }
					
                      $sql = "  SELECT	IFNULL(ROUND(SUM(d.KS_TONASE_KELUAR),2),0) AS SUM_TONASE,
                                        IFNULL(ROUND(SUM(d.KS_BALES_OUT),2),0) AS SUM_BALES
								FROM	kartu_stok d   
								WHERE	d.KS_PE_PENG_ID = $peng_id 
										AND d.KS_JENIS_DOKUMEN = '$d_peng_jenis_dokumen'	";
					  //echo $sql;					  
					  $sql = mysqli_query($con,$sql);
					  $d_sum_tonase = 0;
					  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){								
							$d_sum_tonase = $data["SUM_TONASE"];
							$d_sum_bales= $data["SUM_BALES"]; 							
					  }	
					  
					  $ret_val[0] = $d_peng_iw - $d_sum_tonase;
                      $ret_val[1] = $d_peng_bale - $d_sum_bales;
					  return $ret_val ;	
					  
					
						
	}

function sisa_voyage($segel_id){
		global $con;
		
                      $sql = "  SELECT	d.*
								FROM	segelin d   
								WHERE	d.SG_ID = $segel_id LIMIT 1";
					  //echo $sql;					  
					  $sql = mysqli_query($con,$sql);
					  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){							
							$d_peng_iw = $data["SG_KG"];
							$d_peng_bale=$data["SG_BL"]; 
								
					  }
					
                      $sql = "  SELECT	IFNULL(ROUND(SUM(d.PE_IW),2),0) AS SUM_TONASE,
        						IFNULL(ROUND(SUM(d.PE_Bale),2),0) AS SUM_BALES
								FROM	pemasukan d
								WHERE	d.SG_ID = $segel_id";
					  //echo $sql;					  
					  $sql = mysqli_query($con,$sql);
					  $d_sum_tonase = 0;
					  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){								
							$d_sum_tonase = $data["SUM_TONASE"];
							$d_sum_bales= $data["SUM_BALES"]; 							
					  }	
					  
					  $ret_val[0] = $d_peng_iw - $d_sum_tonase;
                      $ret_val[1] = $d_peng_bale - $d_sum_bales;
					  return $ret_val ;	
					  
					
						
	}				
	
	function tgl_indo($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);
	
	// variabel pecahkan 0 = tanggal
	// variabel pecahkan 1 = bulan
	// variabel pecahkan 2 = tahun
 
	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}
	

	
	
?>



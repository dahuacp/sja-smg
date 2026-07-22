<?php
	
	include "session.php";
	include "koneksi.php";	
	include "file_fn.php";	
	




                      $sql = "  SELECT	d.*
								FROM	kartu_stok d   
								ORDER BY d.KS_ID 	";
					  //echo $sql;
					  $sql = mysqli_query($con,$sql);
					  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){							
							$d_KS_ID = $data["KS_ID"]; 								
							$d_KS_JENIS_DOKUMEN = $data["KS_JENIS_DOKUMEN"]; 						
							$d_KS_IN_OUT_NOMOR = $data["KS_INOUT_NOMOR"]; 		

								$d_KS_PE_PENG_ID = 0;
								if($d_KS_JENIS_DOKUMEN=="PPBKB"){
									
									$sql2 = "	SELECT	pe.*
												FROM	pemasukan pe   
												WHERE	pe.PE_No_PPBKB = '$d_KS_IN_OUT_NOMOR'
												ORDER BY pe.PE_ID 	";
									//echo $sql2;
									$sql2 = mysqli_query($con,$sql2);
									while ($data2=mysqli_fetch_array($sql2,MYSQLI_ASSOC)){							
										$d_PE_ID = $data2["PE_ID"]; 											
									}
									$d_KS_PE_PENG_ID = $d_PE_ID;
									
									
								}else if(($d_KS_JENIS_DOKUMEN=="BC 25") || ($d_KS_JENIS_DOKUMEN=="BC 27") || ($d_KS_JENIS_DOKUMEN=="BC 30")){
									
									$sql2 = "	SELECT	peng.*
												FROM	pengeluaran peng   
												WHERE	peng.PENG_JENIS_DOKUMEN = '$d_KS_JENIS_DOKUMEN' 
														AND peng.PENG_NOMOR_DOK = '$d_KS_IN_OUT_NOMOR'
												ORDER BY peng.PENG_ID 	";
									//echo $sql2;
									$sql2 = mysqli_query($con,$sql2);
									while ($data2=mysqli_fetch_array($sql2,MYSQLI_ASSOC)){							
										$d_PENG_ID = $data2["PENG_ID"]; 											
									}
									$d_KS_PE_PENG_ID = $d_PENG_ID;
									
								}	

							$input= "	UPDATE	kartu_stok 
											SET	KS_PE_PENG_ID = '$d_KS_PE_PENG_ID'												
										WHERE	KS_ID = $d_KS_ID ";
							//echo $input;                
							$input = mysqli_query($con,$input);
							
					  }
		
?>


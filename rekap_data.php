<?php 
  include "koneksi.php";
  include "session.php";
  include "file_fn.php";
  error_reporting(E_ALL ^ E_NOTICE);
  $urut=0;
?>

      
         <div id="printableArea">
            <div class="row">       
        
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Rekap</h2>
                    <div class="clearfix"></div>
                  </div>      
          
          
                  <div class="x_content">
                    <div class="rekap-table-wrap">
                      <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th width="10px">&nbsp;</th>
                          <th colspan="3">BULAN</th>
                          <th>Saldo Awal</th>
                          <th>JANUARI</th>
                          <th>FEBRUARI</th>
                          <th>MARET</th>
                          <th>APRIL</th>
                          <th>MEI</th>
                          <th>JUNI</th>
                          <th>JULI</th>
                          <th>AGUSTUS</th>
                          <th>SEPTEMBER</th>
                          <th>OKTOBER</th>
                          <th>NOVEMBER</th>
                          <th>DESEMBER</th>
                        </tr>
                      </thead>
                      <tbody>             
                        <tr>
                          <td width="10px" rowspan="2">I</td>  
                          <td rowspan="2">PEMASUKAN</td>   
                          <td rowspan="2">PPKB</td>    
                          <td>Berat</td>    
                          <td>
                         <!-- Saldo awal ambil dari saldo akhir dibulan desember tahun sebelumnya -->
                         <?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PE_IW),2),0) AS SUM_IW
											FROM	pemasukan  
											WHERE	YEAR(PE_Date_TPB) = YEAR(DATE_SUB(CURDATE(), INTERVAL 1 YEAR)) 
											AND MONTH(PE_Date_TPB) = '12'	AND PE_IS_DELETE=0";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>					
                         
                      	  </td>  
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PE_IW),2),0) AS SUM_IW
											FROM	pemasukan  
											WHERE	YEAR(PE_Date_TPB) = YEAR(CURDATE()) AND MONTH(PE_Date_TPB) = '01'	AND PE_IS_DELETE=0";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>        
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PE_IW),2),0) AS SUM_IW
											FROM	pemasukan  
											WHERE	YEAR(PE_Date_TPB) = YEAR(CURDATE()) AND MONTH(PE_Date_TPB) = '02'	AND PE_IS_DELETE=0";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>    
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PE_IW),2),0) AS SUM_IW
											FROM	pemasukan  
											WHERE	YEAR(PE_Date_TPB) = YEAR(CURDATE()) AND MONTH(PE_Date_TPB) = '03'	AND PE_IS_DELETE=0";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>        
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PE_IW),2),0) AS SUM_IW
											FROM	pemasukan  
											WHERE	YEAR(PE_Date_TPB) = YEAR(CURDATE()) AND MONTH(PE_Date_TPB) = '04'	AND PE_IS_DELETE=0";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>    
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PE_IW),2),0) AS SUM_IW
											FROM	pemasukan  
											WHERE	YEAR(PE_Date_TPB) = YEAR(CURDATE()) AND MONTH(PE_Date_TPB) = '05'	AND PE_IS_DELETE=0";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>       
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PE_IW),2),0) AS SUM_IW
											FROM	pemasukan  
											WHERE	YEAR(PE_Date_TPB) = YEAR(CURDATE()) AND MONTH(PE_Date_TPB) = '06'	AND PE_IS_DELETE=0";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>        
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PE_IW),2),0) AS SUM_IW
											FROM	pemasukan  
											WHERE	YEAR(PE_Date_TPB) = YEAR(CURDATE()) AND MONTH(PE_Date_TPB) = '07'	AND PE_IS_DELETE=0";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>             
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PE_IW),2),0) AS SUM_IW
											FROM	pemasukan  
											WHERE	YEAR(PE_Date_TPB) = YEAR(CURDATE()) AND MONTH(PE_Date_TPB) = '08'	AND PE_IS_DELETE=0";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>          
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PE_IW),2),0) AS SUM_IW
											FROM	pemasukan  
											WHERE	YEAR(PE_Date_TPB) = YEAR(CURDATE()) AND MONTH(PE_Date_TPB) = '09'	AND PE_IS_DELETE=0";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>     
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PE_IW),2),0) AS SUM_IW
											FROM	pemasukan  
											WHERE	YEAR(PE_Date_TPB) = YEAR(CURDATE()) AND MONTH(PE_Date_TPB) = '10'	AND PE_IS_DELETE=0";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>          
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PE_IW),2),0) AS SUM_IW
											FROM	pemasukan  
											WHERE	YEAR(PE_Date_TPB) = YEAR(CURDATE()) AND MONTH(PE_Date_TPB) = '11'	AND PE_IS_DELETE=0";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>       
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PE_IW),2),0) AS SUM_IW
											FROM	pemasukan  
											WHERE	YEAR(PE_Date_TPB) = YEAR(CURDATE()) AND MONTH(PE_Date_TPB) = '12'	AND PE_IS_DELETE=0";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>    
                        </tr>          
                        <tr>    
                          <td>Bale</td>    
                          <td>
                          <?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PE_Bale),2),0) AS SUM_Bale
											FROM	pemasukan  
											WHERE	YEAR(PE_Date_TPB) = YEAR(DATE_SUB(CURDATE(), INTERVAL 1 YEAR)) 
											AND MONTH(PE_Date_TPB) = '12'	AND PE_IS_DELETE=0";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_Bale"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>			
                          </td>  
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PE_Bale),2),0) AS SUM_Bale
											FROM	pemasukan  
											WHERE	YEAR(PE_Date_TPB) = YEAR(CURDATE()) AND MONTH(PE_Date_TPB) = '01'	AND PE_IS_DELETE=0";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_Bale"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>        
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PE_Bale),2),0) AS SUM_Bale
											FROM	pemasukan  
											WHERE	YEAR(PE_Date_TPB) = YEAR(CURDATE()) AND MONTH(PE_Date_TPB) = '02'	AND PE_IS_DELETE=0";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_Bale"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>    
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PE_Bale),2),0) AS SUM_Bale
											FROM	pemasukan  
											WHERE	YEAR(PE_Date_TPB) = YEAR(CURDATE()) AND MONTH(PE_Date_TPB) = '03'	AND PE_IS_DELETE=0";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_Bale"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>        
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PE_Bale),2),0) AS SUM_Bale
											FROM	pemasukan  
											WHERE	YEAR(PE_Date_TPB) = YEAR(CURDATE()) AND MONTH(PE_Date_TPB) = '04'	AND PE_IS_DELETE=0";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_Bale"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>    
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PE_Bale),2),0) AS SUM_Bale
											FROM	pemasukan  
											WHERE	YEAR(PE_Date_TPB) = YEAR(CURDATE()) AND MONTH(PE_Date_TPB) = '05'	AND PE_IS_DELETE=0";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_Bale"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>       
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PE_Bale),2),0) AS SUM_Bale
											FROM	pemasukan  
											WHERE	YEAR(PE_Date_TPB) = YEAR(CURDATE()) AND MONTH(PE_Date_TPB) = '06'	AND PE_IS_DELETE=0";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_Bale"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>        
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PE_Bale),2),0) AS SUM_Bale
											FROM	pemasukan  
											WHERE	YEAR(PE_Date_TPB) = YEAR(CURDATE()) AND MONTH(PE_Date_TPB) = '07'	AND PE_IS_DELETE=0";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_Bale"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>             
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PE_Bale),2),0) AS SUM_Bale
											FROM	pemasukan  
											WHERE	YEAR(PE_Date_TPB) = YEAR(CURDATE()) AND MONTH(PE_Date_TPB) = '08'	AND PE_IS_DELETE=0";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_Bale"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>          
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PE_Bale),2),0) AS SUM_Bale
											FROM	pemasukan  
											WHERE	YEAR(PE_Date_TPB) = YEAR(CURDATE()) AND MONTH(PE_Date_TPB) = '09'	AND PE_IS_DELETE=0";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_Bale"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>     
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PE_Bale),2),0) AS SUM_Bale
											FROM	pemasukan  
											WHERE	YEAR(PE_Date_TPB) = YEAR(CURDATE()) AND MONTH(PE_Date_TPB) = '10'	AND PE_IS_DELETE=0";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_Bale"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>          
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PE_Bale),2),0) AS SUM_Bale
											FROM	pemasukan  
											WHERE	YEAR(PE_Date_TPB) = YEAR(CURDATE()) AND MONTH(PE_Date_TPB) = '11'	AND PE_IS_DELETE=0";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_Bale"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>       
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PE_Bale),2),0) AS SUM_Bale
											FROM	pemasukan  
											WHERE	YEAR(PE_Date_TPB) = YEAR(CURDATE()) AND MONTH(PE_Date_TPB) = '12'	AND PE_IS_DELETE=0";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_Bale"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>   
                        </tr>    
                        <tr>
                          <td rowspan="6">II</td>    
                          <td rowspan="6">PENGELUARAN<br>Berdasarkan<br>Penerbitan<br>Dokumen</td>   
                          <td rowspan="2">BC 25</td>    
                          <td>Berat</td>     
                          <td>&nbsp;</td> 
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '01'	
													AND PENG_JENIS_DOKUMEN = 'BC 25'
													AND PENG_IS_DELETE=0
														";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>        
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '02'	
													AND PENG_JENIS_DOKUMEN = 'BC 25'	
													AND PENG_IS_DELETE=0";	
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>    
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '03'	
													AND PENG_JENIS_DOKUMEN = 'BC 25'
													AND PENG_IS_DELETE=0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>        
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '04'	
													AND PENG_JENIS_DOKUMEN = 'BC 25'
													AND PENG_IS_DELETE=0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>    
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '05'	
													AND PENG_JENIS_DOKUMEN = 'BC 25'	
													AND PENG_IS_DELETE=0";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>       
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '06'	
													AND PENG_JENIS_DOKUMEN = 'BC 25'
													AND PENG_IS_DELETE=0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>        
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '07'	
													AND PENG_JENIS_DOKUMEN = 'BC 25'
													AND PENG_IS_DELETE=0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>             
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '08'	
													AND PENG_JENIS_DOKUMEN = 'BC 25'
													AND PENG_IS_DELETE=0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>          
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '09'	
													AND PENG_JENIS_DOKUMEN = 'BC 25'
													AND PENG_IS_DELETE=0	";	
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>     
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '10'	
													AND PENG_JENIS_DOKUMEN = 'BC 25'
													AND PENG_IS_DELETE=0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>          
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '11'	
													AND PENG_JENIS_DOKUMEN = 'BC 25'
													AND PENG_IS_DELETE=0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>       
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '12'	
													AND PENG_JENIS_DOKUMEN = 'BC 25'
													AND PENG_IS_DELETE=0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>    
                        </tr>        
                        <tr>    
                          <td>Bale</td>     
                          <td>&nbsp;</td>    
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '01'	
													AND PENG_JENIS_DOKUMEN = 'BC 25'
													AND PENG_IS_DELETE=0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>        
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '02'	
													AND PENG_JENIS_DOKUMEN = 'BC 25'
													AND PENG_IS_DELETE=0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>    
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '03'	
													AND PENG_JENIS_DOKUMEN = 'BC 25'
													AND PENG_IS_DELETE=0	";	
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>        
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '04'		
													AND PENG_JENIS_DOKUMEN = 'BC 25'
													AND PENG_IS_DELETE=0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>    
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '05'	
													AND PENG_JENIS_DOKUMEN = 'BC 25'
													AND PENG_IS_DELETE=0	";	
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>       
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '06'	
													AND PENG_JENIS_DOKUMEN = 'BC 25'
													AND PENG_IS_DELETE=0	";	
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>        
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '07'	
													AND PENG_JENIS_DOKUMEN = 'BC 25'
													AND PENG_IS_DELETE=0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>             
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '08'	
													AND PENG_JENIS_DOKUMEN = 'BC 25'
													AND PENG_IS_DELETE=0	";	
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>          
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '09'	
													AND PENG_JENIS_DOKUMEN = 'BC 25'
													AND PENG_IS_DELETE=0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>     
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '10'	
													AND PENG_JENIS_DOKUMEN = 'BC 25'
													AND PENG_IS_DELETE=0	";	
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>          
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '11'	
													AND PENG_JENIS_DOKUMEN = 'BC 25'
													AND PENG_IS_DELETE=0	";	
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>       
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '12'	
													AND PENG_JENIS_DOKUMEN = 'BC 25'
													AND PENG_IS_DELETE=0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>    
                        </tr>      
                        <tr>
                          <td rowspan="2">BC 27</td>    
                          <td>Berat</td>     
                          <td>&nbsp;</td>   
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '01'	
													AND PENG_JENIS_DOKUMEN = 'BC 27'
													AND PENG_IS_DELETE=0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>        
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '02'	
													AND PENG_JENIS_DOKUMEN = 'BC 27'
													AND PENG_IS_DELETE=0	";	
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>    
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '03'	
													AND PENG_JENIS_DOKUMEN = 'BC 27'
													AND PENG_IS_DELETE=0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>        
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '04'	
													AND PENG_JENIS_DOKUMEN = 'BC 27'
													AND PENG_IS_DELETE=0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>    
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '05'	
													AND PENG_JENIS_DOKUMEN = 'BC 27'
													AND PENG_IS_DELETE=0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>       
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '06'	
													AND PENG_JENIS_DOKUMEN = 'BC 27'
													AND PENG_IS_DELETE=0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>        
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '07'	
													AND PENG_JENIS_DOKUMEN = 'BC 27'
													AND PENG_IS_DELETE=0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>             
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '08'	
													AND PENG_JENIS_DOKUMEN = 'BC 27'
													AND PENG_IS_DELETE=0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>          
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '09'	
													AND PENG_JENIS_DOKUMEN = 'BC 27'
													AND PENG_IS_DELETE=0	";	
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>     
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '10'	
													AND PENG_JENIS_DOKUMEN = 'BC 27'
													AND PENG_IS_DELETE=0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>          
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '11'	
													AND PENG_JENIS_DOKUMEN = 'BC 27'
													AND PENG_IS_DELETE=0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>       
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '12'	
													AND PENG_JENIS_DOKUMEN = 'BC 27'
													AND PENG_IS_DELETE=0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>    
                        </tr>        
                        <tr>    
                          <td>Bale</td>     
                          <td>&nbsp;</td>    
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '01'	
													AND PENG_JENIS_DOKUMEN = 'BC 27'
													AND PENG_IS_DELETE=0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>        
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '02'	
													AND PENG_JENIS_DOKUMEN = 'BC 27'
													AND PENG_IS_DELETE=0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>    
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '03'	
													AND PENG_JENIS_DOKUMEN = 'BC 27'
													AND PENG_IS_DELETE=0	";	
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>        
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '04'		
													AND PENG_JENIS_DOKUMEN = 'BC 27'
													AND PENG_IS_DELETE=0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>    
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '05'	
													AND PENG_JENIS_DOKUMEN = 'BC 27'	
													AND PENG_IS_DELETE=0";	
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>       
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '06'	
													AND PENG_JENIS_DOKUMEN = 'BC 27'
													AND PENG_IS_DELETE=0	";	
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>        
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '07'	
													AND PENG_JENIS_DOKUMEN = 'BC 27'
													AND PENG_IS_DELETE=0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>             
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '08'	
													AND PENG_JENIS_DOKUMEN = 'BC 27'
													AND PENG_IS_DELETE=0	";	
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>          
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '09'	
													AND PENG_JENIS_DOKUMEN = 'BC 27'
													AND PENG_IS_DELETE=0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>     
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '10'	
													AND PENG_JENIS_DOKUMEN = 'BC 27'
													AND PENG_IS_DELETE=0	";	
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>          
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '11'	
													AND PENG_JENIS_DOKUMEN = 'BC 27'
													AND PENG_IS_DELETE=0	";	
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>       
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '12'	
													AND PENG_JENIS_DOKUMEN = 'BC 27'
													AND PENG_IS_DELETE=0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>  
                        </tr>       
                        <tr>
                          <td rowspan="2">BC 30</td>    
                          <td>Berat</td>     
                          <td>&nbsp;</td>      
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '01'	
													AND PENG_JENIS_DOKUMEN = 'BC 30'
													AND PENG_IS_DELETE=0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>        
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '02'	
													AND PENG_JENIS_DOKUMEN = 'BC 30'
													AND PENG_IS_DELETE=0	";	
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>    
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '03'	
													AND PENG_JENIS_DOKUMEN = 'BC 30'
													AND PENG_IS_DELETE=0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>        
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '04'	
													AND PENG_JENIS_DOKUMEN = 'BC 30'
													AND PENG_IS_DELETE=0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>    
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '05'	
													AND PENG_JENIS_DOKUMEN = 'BC 30'
													AND PENG_IS_DELETE=0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>       
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '06'	
													AND PENG_JENIS_DOKUMEN = 'BC 30'
													AND PENG_IS_DELETE=0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>        
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '07'	
													AND PENG_JENIS_DOKUMEN = 'BC 30'
													AND PENG_IS_DELETE=0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>             
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '08'	
													AND PENG_JENIS_DOKUMEN = 'BC 30'
													AND PENG_IS_DELETE=0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>          
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '09'	
													AND PENG_JENIS_DOKUMEN = 'BC 30'
													AND PENG_IS_DELETE=0	";	
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>     
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '10'	
													AND PENG_JENIS_DOKUMEN = 'BC 30'
													AND PENG_IS_DELETE=0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>          
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '11'	
													AND PENG_JENIS_DOKUMEN = 'BC 30'
													AND PENG_IS_DELETE=0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>       
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '12'	
													AND PENG_JENIS_DOKUMEN = 'BC 30'
													AND PENG_IS_DELETE=0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>    
                        </tr>        
                        <tr>    
                          <td>Bale</td>     
                          <td>&nbsp;</td> 
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '01'	
													AND PENG_JENIS_DOKUMEN = 'BC 30'
													AND PENG_IS_DELETE=0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>        
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '02'	
													AND PENG_JENIS_DOKUMEN = 'BC 30'
													AND PENG_IS_DELETE=0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>    
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '03'	
													AND PENG_JENIS_DOKUMEN = 'BC 30'
													AND PENG_IS_DELETE=0	";	
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>        
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '04'		
													AND PENG_JENIS_DOKUMEN = 'BC 30'
													AND PENG_IS_DELETE=0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>    
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '05'	
													AND PENG_JENIS_DOKUMEN = 'BC 30'
													AND PENG_IS_DELETE=0	";	
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>       
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '06'	
													AND PENG_JENIS_DOKUMEN = 'BC 30'
													AND PENG_IS_DELETE=0	";	
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>        
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '07'	
													AND PENG_JENIS_DOKUMEN = 'BC 30'
													AND PENG_IS_DELETE=0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>             
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '08'	
													AND PENG_JENIS_DOKUMEN = 'BC 30'
													AND PENG_IS_DELETE=0	";	
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>          
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '09'	
													AND PENG_JENIS_DOKUMEN = 'BC 30'
													AND PENG_IS_DELETE=0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>     
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '10'	
													AND PENG_JENIS_DOKUMEN = 'BC 30'
													AND PENG_IS_DELETE=0	";	
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>          
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '11'	
													AND PENG_JENIS_DOKUMEN = 'BC 30'
													AND PENG_IS_DELETE=0	";	
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>       
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '12'	
													AND PENG_JENIS_DOKUMEN = 'BC 30'
													AND PENG_IS_DELETE=0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>  
                        </tr>    
                        <tr>
                          <td rowspan="6">III</td>   
                          <td rowspan="6">PENGELUARAN<br>Berdasarkan<br>Penerbitan<br>Dokumen<br>status SELESAI</td>  
                          <td rowspan="2">BC 25</td>    
                          <td>Berat</td> 
                          <td>&nbsp;</td>   
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '01'	
													AND PENG_JENIS_DOKUMEN = 'BC 25' 
													AND PENG_KET = 'SELESAI' 
													AND PENG_IS_DELETE=0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>        
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '02'	
													AND PENG_JENIS_DOKUMEN = 'BC 25'
													AND PENG_KET = 'SELESAI' 
													AND PENG_IS_DELETE=0	";	
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>    
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '03'	
													AND PENG_JENIS_DOKUMEN = 'BC 25'
													AND PENG_KET = 'SELESAI' 
													AND PENG_IS_DELETE=0	";			
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>        
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '04'	
													AND PENG_JENIS_DOKUMEN = 'BC 25'
													AND PENG_KET = 'SELESAI' 
													AND PENG_IS_DELETE=0	";			
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>    
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '05'	
													AND PENG_JENIS_DOKUMEN = 'BC 25'
													AND PENG_KET = 'SELESAI' 
													AND PENG_IS_DELETE=0	";			
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>       
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '06'	
													AND PENG_JENIS_DOKUMEN = 'BC 25'
													AND PENG_KET = 'SELESAI' 
													AND PENG_IS_DELETE=0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>        
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '07'	
													AND PENG_JENIS_DOKUMEN = 'BC 25'
													AND PENG_KET = 'SELESAI' 	
													AND PENG_IS_DELETE=0 ";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>             
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '08'	
													AND PENG_JENIS_DOKUMEN = 'BC 25'
													AND PENG_KET = 'SELESAI' 
													AND PENG_IS_DELETE=0	";			
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>          
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '09'	
													AND PENG_JENIS_DOKUMEN = 'BC 25'
													AND PENG_KET = 'SELESAI' 
													AND PENG_IS_DELETE=0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>     
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '10'	
													AND PENG_JENIS_DOKUMEN = 'BC 25'
													AND PENG_KET = 'SELESAI' 
													AND PENG_IS_DELETE=0	";			
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>          
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '11'	
													AND PENG_JENIS_DOKUMEN = 'BC 25'
													AND PENG_KET = 'SELESAI' 
													AND PENG_IS_DELETE=0	";			
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>       
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '12'	
													AND PENG_JENIS_DOKUMEN = 'BC 25'
													AND PENG_KET = 'SELESAI' 
													AND PENG_IS_DELETE=0	";			
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>   
                        </tr>        
                        <tr>    
                          <td>Bale</td>     
                          <td>&nbsp;</td>    
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '01'	
													AND PENG_JENIS_DOKUMEN = 'BC 25'
													AND PENG_KET = 'SELESAI' 
													AND PENG_IS_DELETE=0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>        
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '02'	
													AND PENG_JENIS_DOKUMEN = 'BC 25'
													AND PENG_KET = 'SELESAI' 
													AND PENG_IS_DELETE=0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>    
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '03'	
													AND PENG_JENIS_DOKUMEN = 'BC 25'
													AND PENG_KET = 'SELESAI' 
													AND PENG_IS_DELETE=0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>        
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '04'		
													AND PENG_JENIS_DOKUMEN = 'BC 25'
													AND PENG_KET = 'SELESAI' 
													AND PENG_IS_DELETE=0	";			
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>    
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '05'	
													AND PENG_JENIS_DOKUMEN = 'BC 25'
													AND PENG_KET = 'SELESAI' 
													AND PENG_IS_DELETE=0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>       
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '06'	
													AND PENG_JENIS_DOKUMEN = 'BC 25'
													AND PENG_KET = 'SELESAI' 
													AND PENG_IS_DELETE=0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>        
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '07'	
													AND PENG_JENIS_DOKUMEN = 'BC 25'
													AND PENG_KET = 'SELESAI' 
													AND PENG_IS_DELETE=0	";			
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>             
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '08'	
													AND PENG_JENIS_DOKUMEN = 'BC 25'
													AND PENG_KET = 'SELESAI' 
													AND PENG_IS_DELETE=0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>          
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '09'	
													AND PENG_JENIS_DOKUMEN = 'BC 25'
													AND PENG_KET = 'SELESAI' 
													AND PENG_IS_DELETE=0	";			
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>     
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '10'	
													AND PENG_JENIS_DOKUMEN = 'BC 25'
													AND PENG_KET = 'SELESAI' 
													AND PENG_IS_DELETE=0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>          
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '11'	
													AND PENG_JENIS_DOKUMEN = 'BC 25'
													AND PENG_KET = 'SELESAI' 
													AND PENG_IS_DELETE=0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>       
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '12'	
													AND PENG_JENIS_DOKUMEN = 'BC 25'
													AND PENG_KET = 'SELESAI' 
													AND PENG_IS_DELETE=0	";			
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>    
                        </tr>      
                        <tr>
                          <td rowspan="2">BC 27</td>     
                          <td>Berat</td> 
                          <td>&nbsp;</td>   
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '01'	
													AND PENG_JENIS_DOKUMEN = 'BC 27' 
													AND PENG_KET = 'SELESAI' 
													AND PENG_IS_DELETE=0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>        
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '02'	
													AND PENG_JENIS_DOKUMEN = 'BC 27'
													AND PENG_KET = 'SELESAI' 
													AND PENG_IS_DELETE=0	";	
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>    
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '03'	
													AND PENG_JENIS_DOKUMEN = 'BC 27'
													AND PENG_KET = 'SELESAI' 
													AND PENG_IS_DELETE=0	";			
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>        
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '04'	
													AND PENG_JENIS_DOKUMEN = 'BC 27'
													AND PENG_KET = 'SELESAI' 
													AND PENG_IS_DELETE=0	";			
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>    
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '05'	
													AND PENG_JENIS_DOKUMEN = 'BC 27'
													AND PENG_KET = 'SELESAI' 
													AND PENG_IS_DELETE=0	";			
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>       
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '06'	
													AND PENG_JENIS_DOKUMEN = 'BC 27'
													AND PENG_KET = 'SELESAI' 
													AND PENG_IS_DELETE=0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>        
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '07'	
													AND PENG_JENIS_DOKUMEN = 'BC 27'
													AND PENG_KET = 'SELESAI' 
													AND PENG_IS_DELETE=0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>             
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '08'	
													AND PENG_JENIS_DOKUMEN = 'BC 27'
													AND PENG_KET = 'SELESAI' 
													AND PENG_IS_DELETE=0	";			
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>          
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '09'	
													AND PENG_JENIS_DOKUMEN = 'BC 27'
													AND PENG_KET = 'SELESAI' 
													AND PENG_IS_DELETE=0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>     
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '10'	
													AND PENG_JENIS_DOKUMEN = 'BC 27'
													AND PENG_KET = 'SELESAI' 
													AND PENG_IS_DELETE=0	";			
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>          
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '11'	
													AND PENG_JENIS_DOKUMEN = 'BC 27'
													AND PENG_KET = 'SELESAI' 
													AND PENG_IS_DELETE=0	";			
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>       
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '12'	
													AND PENG_JENIS_DOKUMEN = 'BC 27'
													AND PENG_KET = 'SELESAI' 
													AND PENG_IS_DELETE=0	";			
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>   
                        </tr>        
                        <tr>    
                          <td>Bale</td>     
                          <td>&nbsp;</td>    
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '01'	
													AND PENG_JENIS_DOKUMEN = 'BC 27'
													AND PENG_KET = 'SELESAI' 
													AND PENG_IS_DELETE=0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>        
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '02'	
													AND PENG_JENIS_DOKUMEN = 'BC 27'
													AND PENG_KET = 'SELESAI' 
													AND PENG_IS_DELETE=0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>    
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '03'	
													AND PENG_JENIS_DOKUMEN = 'BC 27'
													AND PENG_KET = 'SELESAI' 
													AND PENG_IS_DELETE=0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>        
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '04'		
													AND PENG_JENIS_DOKUMEN = 'BC 27'
													AND PENG_KET = 'SELESAI' 
													AND PENG_IS_DELETE=0	";			
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>    
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '05'	
													AND PENG_JENIS_DOKUMEN = 'BC 27'
													AND PENG_KET = 'SELESAI' 
													AND PENG_IS_DELETE=0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>       
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '06'	
													AND PENG_JENIS_DOKUMEN = 'BC 27'
													AND PENG_KET = 'SELESAI' 
													AND PENG_IS_DELETE=0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>        
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '07'	
													AND PENG_JENIS_DOKUMEN = 'BC 27'
													AND PENG_KET = 'SELESAI' 
													AND PENG_IS_DELETE=0	";			
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>             
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '08'	
													AND PENG_JENIS_DOKUMEN = 'BC 27'
													AND PENG_KET = 'SELESAI' 
													AND PENG_IS_DELETE=0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>          
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '09'	
													AND PENG_JENIS_DOKUMEN = 'BC 27'
													AND PENG_KET = 'SELESAI' 
													AND PENG_IS_DELETE=0	";			
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>     
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '10'	
													AND PENG_JENIS_DOKUMEN = 'BC 27'
													AND PENG_KET = 'SELESAI' 
													AND PENG_IS_DELETE=0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>          
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '11'	
													AND PENG_JENIS_DOKUMEN = 'BC 27'
													AND PENG_KET = 'SELESAI' 
													AND PENG_IS_DELETE=0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>       
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '12'	
													AND PENG_JENIS_DOKUMEN = 'BC 27'
													AND PENG_KET = 'SELESAI' 
													AND PENG_IS_DELETE=0	";			
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>   
                        </tr>       
                        <tr>
                          <td rowspan="2">BC 30</td>      
                          <td>Berat</td> 
                          <td>&nbsp;</td>   
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '01'	
													AND PENG_JENIS_DOKUMEN = 'BC 30' 
													AND PENG_KET = 'SELESAI' 
													AND PENG_IS_DELETE=0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>        
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '02'	
													AND PENG_JENIS_DOKUMEN = 'BC 30'
													AND PENG_KET = 'SELESAI' 
													AND PENG_IS_DELETE=0	";	
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>    
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '03'	
													AND PENG_JENIS_DOKUMEN = 'BC 30'
													AND PENG_KET = 'SELESAI' 
													AND PENG_IS_DELETE=0	";			
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>        
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '04'	
													AND PENG_JENIS_DOKUMEN = 'BC 30'
													AND PENG_KET = 'SELESAI' 
													AND PENG_IS_DELETE=0	";			
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>    
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '05'	
													AND PENG_JENIS_DOKUMEN = 'BC 30'
													AND PENG_KET = 'SELESAI' 	
													AND PENG_IS_DELETE=0";			
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>       
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '06'	
													AND PENG_JENIS_DOKUMEN = 'BC 30'
													AND PENG_KET = 'SELESAI' 
													AND PENG_IS_DELETE=0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>        
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '07'	
													AND PENG_JENIS_DOKUMEN = 'BC 30'
													AND PENG_KET = 'SELESAI' 
													AND PENG_IS_DELETE=0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>             
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '08'	
													AND PENG_JENIS_DOKUMEN = 'BC 30'
													AND PENG_KET = 'SELESAI' 
													AND PENG_IS_DELETE=0	";			
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>          
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '09'	
													AND PENG_JENIS_DOKUMEN = 'BC 30'
													AND PENG_KET = 'SELESAI' 	
													AND PENG_IS_DELETE=0";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>     
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '10'	
													AND PENG_JENIS_DOKUMEN = 'BC 30'
													AND PENG_KET = 'SELESAI' 
													AND PENG_IS_DELETE=0	";			
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>          
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '11'	
													AND PENG_JENIS_DOKUMEN = 'BC 30'
													AND PENG_KET = 'SELESAI' 
													AND PENG_IS_DELETE=0	";			
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>       
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '12'	
													AND PENG_JENIS_DOKUMEN = 'BC 30'
													AND PENG_KET = 'SELESAI' 
													AND PENG_IS_DELETE=0	";			
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>   
                        </tr>        
                        <tr>    
                          <td>Bale</td>     
                          <td>&nbsp;</td>    
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '01'	
													AND PENG_JENIS_DOKUMEN = 'BC 30'
													AND PENG_KET = 'SELESAI' 
													AND PENG_IS_DELETE=0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>        
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '02'	
													AND PENG_JENIS_DOKUMEN = 'BC 30'
													AND PENG_KET = 'SELESAI' 
													AND PENG_IS_DELETE=0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>    
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '03'	
													AND PENG_JENIS_DOKUMEN = 'BC 30'
													AND PENG_KET = 'SELESAI' 
													AND PENG_IS_DELETE=0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>        
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '04'		
													AND PENG_JENIS_DOKUMEN = 'BC 30'
													AND PENG_KET = 'SELESAI' 
													AND PENG_IS_DELETE=0	";			
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>    
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '05'	
													AND PENG_JENIS_DOKUMEN = 'BC 30'
													AND PENG_KET = 'SELESAI' 
													AND PENG_IS_DELETE=0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>       
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '06'	
													AND PENG_JENIS_DOKUMEN = 'BC 30'
													AND PENG_KET = 'SELESAI' 
													AND PENG_IS_DELETE=0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>        
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '07'	
													AND PENG_JENIS_DOKUMEN = 'BC 30'
													AND PENG_KET = 'SELESAI' 
													AND PENG_IS_DELETE=0	";			
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>             
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '08'	
													AND PENG_JENIS_DOKUMEN = 'BC 30'
													AND PENG_KET = 'SELESAI' 
													AND PENG_IS_DELETE=0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>          
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '09'	
													AND PENG_JENIS_DOKUMEN = 'BC 30'
													AND PENG_KET = 'SELESAI' 
													AND PENG_IS_DELETE=0	";			
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>     
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '10'	
													AND PENG_JENIS_DOKUMEN = 'BC 30'
													AND PENG_KET = 'SELESAI' 
													AND PENG_IS_DELETE=0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>          
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '11'	
													AND PENG_JENIS_DOKUMEN = 'BC 30'
													AND PENG_KET = 'SELESAI' 
													AND PENG_IS_DELETE=0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>       
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
											FROM	pengeluaran  
											WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
													AND MONTH(PENG_DATE_DOK) = '12'	
													AND PENG_JENIS_DOKUMEN = 'BC 30'
													AND PENG_KET = 'SELESAI' 
													AND PENG_IS_DELETE=0	";			
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>  
                        </tr>        
                        <tr>
                          <td rowspan="6">IV</td>   
                          <td rowspan="6">PENGELUARAN<br>Berdasarkan<br>Mutasi Barang<br>(Sheet SALDO)</td>  
                          <td rowspan="2">BC 25</td>    
                          <td>Berat</td>     
                          <td>&nbsp;</td> 
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(KS_TONASE_KELUAR),2),0) AS SUM_IW
											FROM	kartu_stok  
											WHERE	YEAR(KS_DATE) = YEAR(CURDATE()) 
													AND MONTH(KS_DATE) = '01'	
													AND KS_JENIS_DOKUMEN = 'BC 25'	
													AND KS_IS_DELETE = 0  ";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>        
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(KS_TONASE_KELUAR),2),0) AS SUM_IW
											FROM	kartu_stok  
											WHERE	YEAR(KS_DATE) = YEAR(CURDATE()) 
													AND MONTH(KS_DATE) = '02'	
													AND KS_JENIS_DOKUMEN = 'BC 25'
													AND KS_IS_DELETE = 0	";	
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>    
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(KS_TONASE_KELUAR),2),0) AS SUM_IW
											FROM	kartu_stok  
											WHERE	YEAR(KS_DATE) = YEAR(CURDATE()) 
													AND MONTH(KS_DATE) = '03'	
													AND KS_JENIS_DOKUMEN = 'BC 25'
													AND KS_IS_DELETE = 0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>        
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(KS_TONASE_KELUAR),2),0) AS SUM_IW
											FROM	kartu_stok  
											WHERE	YEAR(KS_DATE) = YEAR(CURDATE()) 
													AND MONTH(KS_DATE) = '04'	
													AND KS_JENIS_DOKUMEN = 'BC 25'
													AND KS_IS_DELETE = 0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>    
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(KS_TONASE_KELUAR),2),0) AS SUM_IW
											FROM	kartu_stok  
											WHERE	YEAR(KS_DATE) = YEAR(CURDATE()) 
													AND MONTH(KS_DATE) = '05'	
													AND KS_JENIS_DOKUMEN = 'BC 25'
													AND KS_IS_DELETE = 0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>       
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(KS_TONASE_KELUAR),2),0) AS SUM_IW
											FROM	kartu_stok  
											WHERE	YEAR(KS_DATE) = YEAR(CURDATE()) 
													AND MONTH(KS_DATE) = '06'	
													AND KS_JENIS_DOKUMEN = 'BC 25'
													AND KS_IS_DELETE = 0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>        
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(KS_TONASE_KELUAR),2),0) AS SUM_IW
											FROM	kartu_stok  
											WHERE	YEAR(KS_DATE) = YEAR(CURDATE()) 
													AND MONTH(KS_DATE) = '07'	
													AND KS_JENIS_DOKUMEN = 'BC 25'
													AND KS_IS_DELETE = 0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>             
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(KS_TONASE_KELUAR),2),0) AS SUM_IW
											FROM	kartu_stok  
											WHERE	YEAR(KS_DATE) = YEAR(CURDATE()) 
													AND MONTH(KS_DATE) = '08'	
													AND KS_JENIS_DOKUMEN = 'BC 25'
													AND KS_IS_DELETE = 0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>          
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(KS_TONASE_KELUAR),2),0) AS SUM_IW
											FROM	kartu_stok  
											WHERE	YEAR(KS_DATE) = YEAR(CURDATE()) 
													AND MONTH(KS_DATE) = '09'	
													AND KS_JENIS_DOKUMEN = 'BC 25'
													AND KS_IS_DELETE = 0	";	
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>     
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(KS_TONASE_KELUAR),2),0) AS SUM_IW
											FROM	kartu_stok  
											WHERE	YEAR(KS_DATE) = YEAR(CURDATE()) 
													AND MONTH(KS_DATE) = '10'	
													AND KS_JENIS_DOKUMEN = 'BC 25'	
													AND KS_IS_DELETE = 0 ";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>          
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(KS_TONASE_KELUAR),2),0) AS SUM_IW
											FROM	kartu_stok  
											WHERE	YEAR(KS_DATE) = YEAR(CURDATE()) 
													AND MONTH(KS_DATE) = '11'	
													AND KS_JENIS_DOKUMEN = 'BC 25' 
													AND KS_IS_DELETE = 0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>       
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(KS_TONASE_KELUAR),2),0) AS SUM_IW
											FROM	kartu_stok  
											WHERE	YEAR(KS_DATE) = YEAR(CURDATE()) 
													AND MONTH(KS_DATE) = '12'	
													AND KS_JENIS_DOKUMEN = 'BC 25' 
													AND KS_IS_DELETE = 0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>   
                        </tr>   
                        <tr>    
                          <td>Bale</td>     
                          <td>&nbsp;</td>    
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(KS_BALES_OUT),2),0) AS SUM_BALE
											FROM	kartu_stok  
											WHERE	YEAR(KS_DATE) = YEAR(CURDATE()) 
													AND MONTH(KS_DATE) = '01'	
													AND KS_JENIS_DOKUMEN = 'BC 25' 
													AND KS_IS_DELETE = 0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>        
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(KS_BALES_OUT),2),0) AS SUM_BALE
											FROM	kartu_stok  
											WHERE	YEAR(KS_DATE) = YEAR(CURDATE()) 
													AND MONTH(KS_DATE) = '02'	
													AND KS_JENIS_DOKUMEN = 'BC 25' 
													AND KS_IS_DELETE = 0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>    
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(KS_BALES_OUT),2),0) AS SUM_BALE
											FROM	kartu_stok  
											WHERE	YEAR(KS_DATE) = YEAR(CURDATE()) 
													AND MONTH(KS_DATE) = '03'	
													AND KS_JENIS_DOKUMEN = 'BC 25' 
													AND KS_IS_DELETE = 0	";	
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>        
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(KS_BALES_OUT),2),0) AS SUM_BALE
											FROM	kartu_stok  
											WHERE	YEAR(KS_DATE) = YEAR(CURDATE()) 
													AND MONTH(KS_DATE) = '04'		
													AND KS_JENIS_DOKUMEN = 'BC 25' 
													AND KS_IS_DELETE = 0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>    
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(KS_BALES_OUT),2),0) AS SUM_BALE
											FROM	kartu_stok  
											WHERE	YEAR(KS_DATE) = YEAR(CURDATE()) 
													AND MONTH(KS_DATE) = '05'	
													AND KS_JENIS_DOKUMEN = 'BC 25' 
													AND KS_IS_DELETE = 0	";	
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>       
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(KS_BALES_OUT),2),0) AS SUM_BALE
											FROM	kartu_stok  
											WHERE	YEAR(KS_DATE) = YEAR(CURDATE()) 
													AND MONTH(KS_DATE) = '06'	
													AND KS_JENIS_DOKUMEN = 'BC 25'
													AND KS_IS_DELETE = 0	";	
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>        
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(KS_BALES_OUT),2),0) AS SUM_BALE
											FROM	kartu_stok  
											WHERE	YEAR(KS_DATE) = YEAR(CURDATE()) 
													AND MONTH(KS_DATE) = '07'	
													AND KS_JENIS_DOKUMEN = 'BC 25' 
													AND KS_IS_DELETE = 0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>             
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(KS_BALES_OUT),2),0) AS SUM_BALE
											FROM	kartu_stok  
											WHERE	YEAR(KS_DATE) = YEAR(CURDATE()) 
													AND MONTH(KS_DATE) = '08'	
													AND KS_JENIS_DOKUMEN = 'BC 25' 
													AND KS_IS_DELETE = 0	";	
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>          
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(KS_BALES_OUT),2),0) AS SUM_BALE
											FROM	kartu_stok  
											WHERE	YEAR(KS_DATE) = YEAR(CURDATE()) 
													AND MONTH(KS_DATE) = '09'	
													AND KS_JENIS_DOKUMEN = 'BC 25' 
													AND KS_IS_DELETE = 0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>     
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(KS_BALES_OUT),2),0) AS SUM_BALE
											FROM	kartu_stok  
											WHERE	YEAR(KS_DATE) = YEAR(CURDATE()) 
													AND MONTH(KS_DATE) = '10'	
													AND KS_JENIS_DOKUMEN = 'BC 25'	
													AND KS_IS_DELETE = 0 ";	
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>          
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(KS_BALES_OUT),2),0) AS SUM_BALE
											FROM	kartu_stok  
											WHERE	YEAR(KS_DATE) = YEAR(CURDATE()) 
													AND MONTH(KS_DATE) = '11'	
													AND KS_JENIS_DOKUMEN = 'BC 25' 
													AND KS_IS_DELETE = 0	";	
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>       
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(KS_BALES_OUT),2),0) AS SUM_BALE
											FROM	kartu_stok  
											WHERE	YEAR(KS_DATE) = YEAR(CURDATE()) 
													AND MONTH(KS_DATE) = '12'	
													AND KS_JENIS_DOKUMEN = 'BC 25'
													AND KS_IS_DELETE = 0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>   
                        </tr>      
                        <tr>
                          <td rowspan="2">BC 27</td>   
                          <td>Berat</td>     
                          <td>&nbsp;</td> 
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(KS_TONASE_KELUAR),2),0) AS SUM_IW
											FROM	kartu_stok  
											WHERE	YEAR(KS_DATE) = YEAR(CURDATE()) 
													AND MONTH(KS_DATE) = '01'	
													AND KS_JENIS_DOKUMEN = 'BC 27'	
													AND KS_IS_DELETE = 0";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>        
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(KS_TONASE_KELUAR),2),0) AS SUM_IW
											FROM	kartu_stok  
											WHERE	YEAR(KS_DATE) = YEAR(CURDATE()) 
													AND MONTH(KS_DATE) = '02'	
													AND KS_JENIS_DOKUMEN = 'BC 27'	
													AND KS_IS_DELETE = 0 ";	
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>    
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(KS_TONASE_KELUAR),2),0) AS SUM_IW
											FROM	kartu_stok  
											WHERE	YEAR(KS_DATE) = YEAR(CURDATE()) 
													AND MONTH(KS_DATE) = '03'	
													AND KS_JENIS_DOKUMEN = 'BC 27' 
													AND KS_IS_DELETE = 0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>        
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(KS_TONASE_KELUAR),2),0) AS SUM_IW
											FROM	kartu_stok  
											WHERE	YEAR(KS_DATE) = YEAR(CURDATE()) 
													AND MONTH(KS_DATE) = '04'	
													AND KS_JENIS_DOKUMEN = 'BC 27' 
													AND KS_IS_DELETE = 0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>    
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(KS_TONASE_KELUAR),2),0) AS SUM_IW
											FROM	kartu_stok  
											WHERE	YEAR(KS_DATE) = YEAR(CURDATE()) 
													AND MONTH(KS_DATE) = '05'	
													AND KS_JENIS_DOKUMEN = 'BC 27' 
													AND KS_IS_DELETE = 0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>       
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(KS_TONASE_KELUAR),2),0) AS SUM_IW
											FROM	kartu_stok  
											WHERE	YEAR(KS_DATE) = YEAR(CURDATE()) 
													AND MONTH(KS_DATE) = '06'	
													AND KS_JENIS_DOKUMEN = 'BC 27' 
													AND KS_IS_DELETE = 0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>        
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(KS_TONASE_KELUAR),2),0) AS SUM_IW
											FROM	kartu_stok  
											WHERE	YEAR(KS_DATE) = YEAR(CURDATE()) 
													AND MONTH(KS_DATE) = '07'	
													AND KS_JENIS_DOKUMEN = 'BC 27'	
													AND KS_IS_DELETE = 0 ";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>             
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(KS_TONASE_KELUAR),2),0) AS SUM_IW
											FROM	kartu_stok  
											WHERE	YEAR(KS_DATE) = YEAR(CURDATE()) 
													AND MONTH(KS_DATE) = '08'	
													AND KS_JENIS_DOKUMEN = 'BC 27'	
													AND KS_IS_DELETE = 0 ";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>          
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(KS_TONASE_KELUAR),2),0) AS SUM_IW
											FROM	kartu_stok  
											WHERE	YEAR(KS_DATE) = YEAR(CURDATE()) 
													AND MONTH(KS_DATE) = '09'	
													AND KS_JENIS_DOKUMEN = 'BC 27' 
													AND KS_IS_DELETE = 0	";	
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>     
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(KS_TONASE_KELUAR),2),0) AS SUM_IW
											FROM	kartu_stok  
											WHERE	YEAR(KS_DATE) = YEAR(CURDATE()) 
													AND MONTH(KS_DATE) = '10'	
													AND KS_JENIS_DOKUMEN = 'BC 27' 
													AND KS_IS_DELETE = 0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>          
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(KS_TONASE_KELUAR),2),0) AS SUM_IW
											FROM	kartu_stok  
											WHERE	YEAR(KS_DATE) = YEAR(CURDATE()) 
													AND MONTH(KS_DATE) = '11'	
													AND KS_JENIS_DOKUMEN = 'BC 27'	
													AND KS_IS_DELETE = 0 ";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>       
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(KS_TONASE_KELUAR),2),0) AS SUM_IW
											FROM	kartu_stok  
											WHERE	YEAR(KS_DATE) = YEAR(CURDATE()) 
													AND MONTH(KS_DATE) = '12'	
													AND KS_JENIS_DOKUMEN = 'BC 27' 
													AND KS_IS_DELETE = 0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>   
                        </tr>   
                        <tr>    
                          <td>Bale</td>     
                          <td>&nbsp;</td>    
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(KS_BALES_OUT),2),0) AS SUM_BALE
											FROM	kartu_stok  
											WHERE	YEAR(KS_DATE) = YEAR(CURDATE()) 
													AND MONTH(KS_DATE) = '01'	
													AND KS_JENIS_DOKUMEN = 'BC 27'
													AND KS_IS_DELETE = 0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>        
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(KS_BALES_OUT),2),0) AS SUM_BALE
											FROM	kartu_stok  
											WHERE	YEAR(KS_DATE) = YEAR(CURDATE()) 
													AND MONTH(KS_DATE) = '02'	
													AND KS_JENIS_DOKUMEN = 'BC 27'
													AND KS_IS_DELETE = 0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>    
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(KS_BALES_OUT),2),0) AS SUM_BALE
											FROM	kartu_stok  
											WHERE	YEAR(KS_DATE) = YEAR(CURDATE()) 
													AND MONTH(KS_DATE) = '03'	
													AND KS_JENIS_DOKUMEN = 'BC 27'
													AND KS_IS_DELETE = 0	";	
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>        
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(KS_BALES_OUT),2),0) AS SUM_BALE
											FROM	kartu_stok  
											WHERE	YEAR(KS_DATE) = YEAR(CURDATE()) 
													AND MONTH(KS_DATE) = '04'		
													AND KS_JENIS_DOKUMEN = 'BC 27'
													AND KS_IS_DELETE = 0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>    
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(KS_BALES_OUT),2),0) AS SUM_BALE
											FROM	kartu_stok  
											WHERE	YEAR(KS_DATE) = YEAR(CURDATE()) 
													AND MONTH(KS_DATE) = '05'	
													AND KS_JENIS_DOKUMEN = 'BC 27'
													AND KS_IS_DELETE = 0	";	
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>       
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(KS_BALES_OUT),2),0) AS SUM_BALE
											FROM	kartu_stok  
											WHERE	YEAR(KS_DATE) = YEAR(CURDATE()) 
													AND MONTH(KS_DATE) = '06'	
													AND KS_JENIS_DOKUMEN = 'BC 27'
													AND KS_IS_DELETE = 0	";	
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>        
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(KS_BALES_OUT),2),0) AS SUM_BALE
											FROM	kartu_stok  
											WHERE	YEAR(KS_DATE) = YEAR(CURDATE()) 
													AND MONTH(KS_DATE) = '07'	
													AND KS_JENIS_DOKUMEN = 'BC 27'
													AND KS_IS_DELETE = 0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>             
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(KS_BALES_OUT),2),0) AS SUM_BALE
											FROM	kartu_stok  
											WHERE	YEAR(KS_DATE) = YEAR(CURDATE()) 
													AND MONTH(KS_DATE) = '08'	
													AND KS_JENIS_DOKUMEN = 'BC 27'
													AND KS_IS_DELETE = 0	";	
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>          
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(KS_BALES_OUT),2),0) AS SUM_BALE
											FROM	kartu_stok  
											WHERE	YEAR(KS_DATE) = YEAR(CURDATE()) 
													AND MONTH(KS_DATE) = '09'	
													AND KS_JENIS_DOKUMEN = 'BC 27'
													AND KS_IS_DELETE = 0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>     
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(KS_BALES_OUT),2),0) AS SUM_BALE
											FROM	kartu_stok  
											WHERE	YEAR(KS_DATE) = YEAR(CURDATE()) 
													AND MONTH(KS_DATE) = '10'	
													AND KS_JENIS_DOKUMEN = 'BC 27'
													AND KS_IS_DELETE = 0	";	
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>          
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(KS_BALES_OUT),2),0) AS SUM_BALE
											FROM	kartu_stok  
											WHERE	YEAR(KS_DATE) = YEAR(CURDATE()) 
													AND MONTH(KS_DATE) = '11'	
													AND KS_JENIS_DOKUMEN = 'BC 27'
													AND KS_IS_DELETE = 0	";	
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>       
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(KS_BALES_OUT),2),0) AS SUM_BALE
											FROM	kartu_stok  
											WHERE	YEAR(KS_DATE) = YEAR(CURDATE()) 
													AND MONTH(KS_DATE) = '12'	
													AND KS_JENIS_DOKUMEN = 'BC 27'
													AND KS_IS_DELETE = 0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>   
                        </tr>       
                        <tr>
                          <td rowspan="2">BC 30</td>    
                          <td>Berat</td>     
                          <td>&nbsp;</td> 
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(KS_TONASE_KELUAR),2),0) AS SUM_IW
											FROM	kartu_stok  
											WHERE	YEAR(KS_DATE) = YEAR(CURDATE()) 
													AND MONTH(KS_DATE) = '01'	
													AND KS_JENIS_DOKUMEN = 'BC 30'	
													AND KS_IS_DELETE = 0 ";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>        
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(KS_TONASE_KELUAR),2),0) AS SUM_IW
											FROM	kartu_stok  
											WHERE	YEAR(KS_DATE) = YEAR(CURDATE()) 
													AND MONTH(KS_DATE) = '02'	
													AND KS_JENIS_DOKUMEN = 'BC 30'
													AND KS_IS_DELETE = 0	";	
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>    
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(KS_TONASE_KELUAR),2),0) AS SUM_IW
											FROM	kartu_stok  
											WHERE	YEAR(KS_DATE) = YEAR(CURDATE()) 
													AND MONTH(KS_DATE) = '03'	
													AND KS_JENIS_DOKUMEN = 'BC 30'
													AND KS_IS_DELETE = 0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>        
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(KS_TONASE_KELUAR),2),0) AS SUM_IW
											FROM	kartu_stok  
											WHERE	YEAR(KS_DATE) = YEAR(CURDATE()) 
													AND MONTH(KS_DATE) = '04'	
													AND KS_JENIS_DOKUMEN = 'BC 30'
													AND KS_IS_DELETE = 0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>    
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(KS_TONASE_KELUAR),2),0) AS SUM_IW
											FROM	kartu_stok  
											WHERE	YEAR(KS_DATE) = YEAR(CURDATE()) 
													AND MONTH(KS_DATE) = '05'	
													AND KS_JENIS_DOKUMEN = 'BC 30'
													AND KS_IS_DELETE = 0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>       
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(KS_TONASE_KELUAR),2),0) AS SUM_IW
											FROM	kartu_stok  
											WHERE	YEAR(KS_DATE) = YEAR(CURDATE()) 
													AND MONTH(KS_DATE) = '06'	
													AND KS_JENIS_DOKUMEN = 'BC 30'
													AND KS_IS_DELETE = 0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>        
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(KS_TONASE_KELUAR),2),0) AS SUM_IW
											FROM	kartu_stok  
											WHERE	YEAR(KS_DATE) = YEAR(CURDATE()) 
													AND MONTH(KS_DATE) = '07'	
													AND KS_JENIS_DOKUMEN = 'BC 30'
													AND KS_IS_DELETE = 0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>             
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(KS_TONASE_KELUAR),2),0) AS SUM_IW
											FROM	kartu_stok  
											WHERE	YEAR(KS_DATE) = YEAR(CURDATE()) 
													AND MONTH(KS_DATE) = '08'	
													AND KS_JENIS_DOKUMEN = 'BC 30'
													AND KS_IS_DELETE = 0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>          
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(KS_TONASE_KELUAR),2),0) AS SUM_IW
											FROM	kartu_stok  
											WHERE	YEAR(KS_DATE) = YEAR(CURDATE()) 
													AND MONTH(KS_DATE) = '09'	
													AND KS_JENIS_DOKUMEN = 'BC 30'
													AND KS_IS_DELETE = 0	";	
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>     
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(KS_TONASE_KELUAR),2),0) AS SUM_IW
											FROM	kartu_stok  
											WHERE	YEAR(KS_DATE) = YEAR(CURDATE()) 
													AND MONTH(KS_DATE) = '10'	
													AND KS_JENIS_DOKUMEN = 'BC 30'
													AND KS_IS_DELETE = 0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>          
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(KS_TONASE_KELUAR),2),0) AS SUM_IW
											FROM	kartu_stok  
											WHERE	YEAR(KS_DATE) = YEAR(CURDATE()) 
													AND MONTH(KS_DATE) = '11'	
													AND KS_JENIS_DOKUMEN = 'BC 30'
													AND KS_IS_DELETE = 0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>       
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(KS_TONASE_KELUAR),2),0) AS SUM_IW
											FROM	kartu_stok  
											WHERE	YEAR(KS_DATE) = YEAR(CURDATE()) 
													AND MONTH(KS_DATE) = '12'	
													AND KS_JENIS_DOKUMEN = 'BC 30'
													AND KS_IS_DELETE = 0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_IW"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>   
                        </tr>   
                        <tr>    
                          <td>Bale</td>     
                          <td>&nbsp;</td>    
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(KS_BALES_OUT),2),0) AS SUM_BALE
											FROM	kartu_stok  
											WHERE	YEAR(KS_DATE) = YEAR(CURDATE()) 
													AND MONTH(KS_DATE) = '01'	
													AND KS_JENIS_DOKUMEN = 'BC 30'
													AND KS_IS_DELETE = 0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>        
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(KS_BALES_OUT),2),0) AS SUM_BALE
											FROM	kartu_stok  
											WHERE	YEAR(KS_DATE) = YEAR(CURDATE()) 
													AND MONTH(KS_DATE) = '02'	
													AND KS_JENIS_DOKUMEN = 'BC 30'
													AND KS_IS_DELETE = 0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>    
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(KS_BALES_OUT),2),0) AS SUM_BALE
											FROM	kartu_stok  
											WHERE	YEAR(KS_DATE) = YEAR(CURDATE()) 
													AND MONTH(KS_DATE) = '03'	
													AND KS_JENIS_DOKUMEN = 'BC 30'
													AND KS_IS_DELETE = 0	";	
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>        
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(KS_BALES_OUT),2),0) AS SUM_BALE
											FROM	kartu_stok  
											WHERE	YEAR(KS_DATE) = YEAR(CURDATE()) 
													AND MONTH(KS_DATE) = '04'		
													AND KS_JENIS_DOKUMEN = 'BC 30'
													AND KS_IS_DELETE = 0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>    
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(KS_BALES_OUT),2),0) AS SUM_BALE
											FROM	kartu_stok  
											WHERE	YEAR(KS_DATE) = YEAR(CURDATE()) 
													AND MONTH(KS_DATE) = '05'	
													AND KS_JENIS_DOKUMEN = 'BC 30'
													AND KS_IS_DELETE = 0	";	
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>       
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(KS_BALES_OUT),2),0) AS SUM_BALE
											FROM	kartu_stok  
											WHERE	YEAR(KS_DATE) = YEAR(CURDATE()) 
													AND MONTH(KS_DATE) = '06'	
													AND KS_JENIS_DOKUMEN = 'BC 30'
													AND KS_IS_DELETE = 0	";	
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>        
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(KS_BALES_OUT),2),0) AS SUM_BALE
											FROM	kartu_stok  
											WHERE	YEAR(KS_DATE) = YEAR(CURDATE()) 
													AND MONTH(KS_DATE) = '07'	
													AND KS_JENIS_DOKUMEN = 'BC 30'
													AND KS_IS_DELETE = 0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>             
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(KS_BALES_OUT),2),0) AS SUM_BALE
											FROM	kartu_stok  
											WHERE	YEAR(KS_DATE) = YEAR(CURDATE()) 
													AND MONTH(KS_DATE) = '08'	
													AND KS_JENIS_DOKUMEN = 'BC 30'
													AND KS_IS_DELETE = 0	";	
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>          
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(KS_BALES_OUT),2),0) AS SUM_BALE
											FROM	kartu_stok  
											WHERE	YEAR(KS_DATE) = YEAR(CURDATE()) 
													AND MONTH(KS_DATE) = '09'	
													AND KS_JENIS_DOKUMEN = 'BC 30'
													AND KS_IS_DELETE = 0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>     
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(KS_BALES_OUT),2),0) AS SUM_BALE
											FROM	kartu_stok  
											WHERE	YEAR(KS_DATE) = YEAR(CURDATE()) 
													AND MONTH(KS_DATE) = '10'	
													AND KS_JENIS_DOKUMEN = 'BC 30'
													AND KS_IS_DELETE = 0	";	
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>          
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(KS_BALES_OUT),2),0) AS SUM_BALE
											FROM	kartu_stok  
											WHERE	YEAR(KS_DATE) = YEAR(CURDATE()) 
													AND MONTH(KS_DATE) = '11'	
													AND KS_JENIS_DOKUMEN = 'BC 30'
													AND KS_IS_DELETE = 0	";	
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>       
                          <td>
								<?php								
								
								  $sql = "  SELECT	IFNULL(ROUND(SUM(KS_BALES_OUT),2),0) AS SUM_BALE
											FROM	kartu_stok  
											WHERE	YEAR(KS_DATE) = YEAR(CURDATE()) 
													AND MONTH(KS_DATE) = '12'	
													AND KS_JENIS_DOKUMEN = 'BC 30'
													AND KS_IS_DELETE = 0	";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["SUM_BALE"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>   
                        </tr> 
						<tr>
                          <td colspan="2" rowspan="6">Sisa Kuota<br>berdasarkan<br>penerbitan<br>dokumen<br><b>II-III</b></td>   
                          <td rowspan="2">BC 25</td>    
                          <td>Berat</td>     
                          <td>&nbsp;</td> 
                          <td>
								<?php
								
								$sql = "  	SELECT 								
											((
												SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '01'	
														AND PENG_JENIS_DOKUMEN = 'BC 25'
														AND PENG_IS_DELETE = 0
											) -
											(
												SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '01'	
														AND PENG_JENIS_DOKUMEN = 'BC 25' 
														AND PENG_KET = 'SELESAI' 
														AND PENG_IS_DELETE = 0
											)) AS HASIL	
														";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["HASIL"]; 
								  }	  
									echo $d_jumlah;	
															  
								?>								
						  </td>        
                          <td>
								<?php								
								
								$sql = "  	SELECT 								
											((
												SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '02'	
														AND PENG_JENIS_DOKUMEN = 'BC 25'
														AND PENG_IS_DELETE = 0
											) -
											(
												SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '02'	
														AND PENG_JENIS_DOKUMEN = 'BC 25' 
														AND PENG_KET = 'SELESAI' 
														AND PENG_IS_DELETE = 0
											)) AS HASIL	
														";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["HASIL"]; 
								  }	  
									echo $d_jumlah;	
						  
								?>								
						  </td>    
                          <td>
								<?php								
								
								$sql = "  	SELECT 								
											((
												SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '03'	
														AND PENG_JENIS_DOKUMEN = 'BC 25'
														AND PENG_IS_DELETE = 0
											) -
											(
												SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '03'	
														AND PENG_JENIS_DOKUMEN = 'BC 25' 
														AND PENG_KET = 'SELESAI' 
														AND PENG_IS_DELETE = 0
											)) AS HASIL	
														";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["HASIL"]; 
								  }	  
									echo $d_jumlah;	
						  
								?>								
						  </td>        
                          <td>
								<?php								
								
								$sql = "  	SELECT 								
											((
												SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '04'	
														AND PENG_JENIS_DOKUMEN = 'BC 25'
														AND PENG_IS_DELETE = 0
											) -
											(
												SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '04'	
														AND PENG_JENIS_DOKUMEN = 'BC 25' 
														AND PENG_KET = 'SELESAI' 
														AND PENG_IS_DELETE = 0
											)) AS HASIL	
														";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["HASIL"]; 
								  }	  
									echo $d_jumlah;	
						  
								?>								
						  </td>    
                          <td>
								<?php								
								
								$sql = "  	SELECT 								
											((
												SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '05'	
														AND PENG_JENIS_DOKUMEN = 'BC 25'
														AND PENG_IS_DELETE = 0
											) -
											(
												SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '05'	
														AND PENG_JENIS_DOKUMEN = 'BC 25' 
														AND PENG_KET = 'SELESAI' 
														AND PENG_IS_DELETE = 0
											)) AS HASIL	
														";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["HASIL"]; 
								  }	  
									echo $d_jumlah;	
						  
								?>								
						  </td>       
                          <td>
								<?php								
								
								$sql = "  	SELECT 								
											((
												SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '06'	
														AND PENG_JENIS_DOKUMEN = 'BC 25'
														AND PENG_IS_DELETE = 0
											) -
											(
												SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '06'	
														AND PENG_JENIS_DOKUMEN = 'BC 25' 
														AND PENG_KET = 'SELESAI' 
														AND PENG_IS_DELETE = 0
											)) AS HASIL	
														";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["HASIL"]; 
								  }	  
									echo $d_jumlah;	
						  
								?>								
						  </td>        
                          <td>
								<?php								
								
								$sql = "  	SELECT 								
											((
												SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '07'	
														AND PENG_JENIS_DOKUMEN = 'BC 25'
														AND PENG_IS_DELETE = 0
											) -
											(
												SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '07'	
														AND PENG_JENIS_DOKUMEN = 'BC 25' 
														AND PENG_KET = 'SELESAI' 
														AND PENG_IS_DELETE = 0
											)) AS HASIL	
														";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["HASIL"]; 
								  }	  
									echo $d_jumlah;	
						  
								?>								
						  </td>             
                          <td>
								<?php								
								
								$sql = "  	SELECT 								
											((
												SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '08'	
														AND PENG_JENIS_DOKUMEN = 'BC 25'
														AND PENG_IS_DELETE = 0
											) -
											(
												SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '08'	
														AND PENG_JENIS_DOKUMEN = 'BC 25' 
														AND PENG_KET = 'SELESAI' 
														AND PENG_IS_DELETE = 0
											)) AS HASIL	
														";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["HASIL"]; 
								  }	  
									echo $d_jumlah;	
						  
								?>								
						  </td>          
                          <td>
								<?php								
								
								$sql = "  	SELECT 								
											((
												SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '09'	
														AND PENG_JENIS_DOKUMEN = 'BC 25'
														AND PENG_IS_DELETE = 0
											) -
											(
												SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '09'	
														AND PENG_JENIS_DOKUMEN = 'BC 25' 
														AND PENG_KET = 'SELESAI' 
														AND PENG_IS_DELETE = 0
											)) AS HASIL	
														";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["HASIL"]; 
								  }	  
									echo $d_jumlah;	
						  
								?>								
						  </td>     
                          <td>
								<?php								
								
								$sql = "  	SELECT 								
											((
												SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '10'	
														AND PENG_JENIS_DOKUMEN = 'BC 25'
														AND PENG_IS_DELETE = 0
											) -
											(
												SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '10'	
														AND PENG_JENIS_DOKUMEN = 'BC 25' 
														AND PENG_KET = 'SELESAI' 
														AND PENG_IS_DELETE = 0
											)) AS HASIL	
														";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["HASIL"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>          
                          <td>
								<?php								
								
								$sql = "  	SELECT 								
											((
												SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '11'	
														AND PENG_JENIS_DOKUMEN = 'BC 25'
														AND PENG_IS_DELETE = 0
											) -
											(
												SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '11'	
														AND PENG_JENIS_DOKUMEN = 'BC 25' 
														AND PENG_KET = 'SELESAI' 
														AND PENG_IS_DELETE = 0
											)) AS HASIL	
														";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["HASIL"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>       
                          <td>
								<?php								
								
								$sql = "  	SELECT 								
											((
												SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '12'	
														AND PENG_JENIS_DOKUMEN = 'BC 25'
														AND PENG_IS_DELETE = 0
											) -
											(
												SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '12'	
														AND PENG_JENIS_DOKUMEN = 'BC 25' 
														AND PENG_KET = 'SELESAI' 
														AND PENG_IS_DELETE = 0
											)) AS HASIL	
														";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["HASIL"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>    
                        </tr>        
                        <tr>    
                          <td>Bale</td>     
                          <td>&nbsp;</td>    
                          <td>
								<?php								
								
								$sql = "  	SELECT 								
											((
												SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '01'	
														AND PENG_JENIS_DOKUMEN = 'BC 25'
														AND PENG_IS_DELETE = 0
											) -
											(
												SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '01'	
														AND PENG_JENIS_DOKUMEN = 'BC 25'
														AND PENG_KET = 'SELESAI' 
														AND PENG_IS_DELETE = 0
											)) AS HASIL	
														";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["HASIL"]; 
								  }	  
									echo $d_jumlah;	
						  
								?>								
						  </td>        
                          <td>
								<?php								
								
								$sql = "  	SELECT 								
											((
												SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '02'	
														AND PENG_JENIS_DOKUMEN = 'BC 25'
														AND PENG_IS_DELETE = 0
											) -
											(
												SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '02'	
														AND PENG_JENIS_DOKUMEN = 'BC 25'
														AND PENG_KET = 'SELESAI' 
														AND PENG_IS_DELETE = 0
											)) AS HASIL	
														";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["HASIL"]; 
								  }	  
									echo $d_jumlah;	
						  
								?>								
						  </td>    
                          <td>
								<?php								
								
								$sql = "  	SELECT 								
											((
												SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '03'	
														AND PENG_JENIS_DOKUMEN = 'BC 25'
														AND PENG_IS_DELETE = 0
											) -
											(
												SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '03'	
														AND PENG_JENIS_DOKUMEN = 'BC 25'
														AND PENG_KET = 'SELESAI' 
														AND PENG_IS_DELETE = 0
											)) AS HASIL	
														";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["HASIL"]; 
								  }	  
									echo $d_jumlah;	
						  
								?>								
						  </td>        
                          <td>
								<?php								
								
								$sql = "  	SELECT 								
											((
												SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '04'	
														AND PENG_JENIS_DOKUMEN = 'BC 25'
														AND PENG_IS_DELETE = 0
											) -
											(
												SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '04'	
														AND PENG_JENIS_DOKUMEN = 'BC 25'
														AND PENG_KET = 'SELESAI' 
														AND PENG_IS_DELETE = 0
											)) AS HASIL	
														";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["HASIL"]; 
								  }	  
									echo $d_jumlah;	
						  
								?>								
						  </td>    
                          <td>
								<?php								
								
								$sql = "  	SELECT 								
											((
												SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '05'	
														AND PENG_JENIS_DOKUMEN = 'BC 25'
														AND PENG_IS_DELETE = 0
											) -
											(
												SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '05'	
														AND PENG_JENIS_DOKUMEN = 'BC 25'
														AND PENG_KET = 'SELESAI' 
														AND PENG_IS_DELETE = 0
											)) AS HASIL	
														";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["HASIL"]; 
								  }	  
									echo $d_jumlah;	
						  
								?>								
						  </td>       
                          <td>
								<?php								
								
								$sql = "  	SELECT 								
											((
												SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '06'	
														AND PENG_JENIS_DOKUMEN = 'BC 25'
														AND PENG_IS_DELETE = 0
											) -
											(
												SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '06'	
														AND PENG_JENIS_DOKUMEN = 'BC 25'
														AND PENG_KET = 'SELESAI' 
														AND PENG_IS_DELETE = 0
											)) AS HASIL	
														";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["HASIL"]; 
								  }	  
									echo $d_jumlah;	
						  
								?>								
						  </td>        
                          <td>
								<?php								
								
								$sql = "  	SELECT 								
											((
												SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '07'	
														AND PENG_JENIS_DOKUMEN = 'BC 25'
														AND PENG_IS_DELETE = 0
											) -
											(
												SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '07'	
														AND PENG_JENIS_DOKUMEN = 'BC 25'
														AND PENG_KET = 'SELESAI' 
														AND PENG_IS_DELETE = 0
											)) AS HASIL	
														";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["HASIL"]; 
								  }	  
									echo $d_jumlah;	
						  
								?>								
						  </td>             
                          <td>
								<?php								
								
								$sql = "  	SELECT 								
											((
												SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '08'	
														AND PENG_JENIS_DOKUMEN = 'BC 25'
														AND PENG_IS_DELETE = 0
											) -
											(
												SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '08'	
														AND PENG_JENIS_DOKUMEN = 'BC 25'
														AND PENG_KET = 'SELESAI' 
														AND PENG_IS_DELETE = 0
											)) AS HASIL	
														";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["HASIL"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>          
                          <td>
								<?php								
								
								$sql = "  	SELECT 								
											((
												SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '09'	
														AND PENG_JENIS_DOKUMEN = 'BC 25'
														AND PENG_IS_DELETE = 0
											) -
											(
												SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '09'	
														AND PENG_JENIS_DOKUMEN = 'BC 25'
														AND PENG_KET = 'SELESAI' 
														AND PENG_IS_DELETE = 0
											)) AS HASIL	
														";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["HASIL"]; 
								  }	  
									echo $d_jumlah;	
						  
								?>								
						  </td>     
                          <td>
								<?php								
								
								$sql = "  	SELECT 								
											((
												SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '10'	
														AND PENG_JENIS_DOKUMEN = 'BC 25'
														AND PENG_IS_DELETE = 0
											) -
											(
												SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '10'	
														AND PENG_JENIS_DOKUMEN = 'BC 25'
														AND PENG_KET = 'SELESAI' 
														AND PENG_IS_DELETE = 0
											)) AS HASIL	
														";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["HASIL"]; 
								  }	  
									echo $d_jumlah;	
						  
								?>								
						  </td>          
                          <td>
								<?php								
								
								$sql = "  	SELECT 								
											((
												SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '11'	
														AND PENG_JENIS_DOKUMEN = 'BC 25'
														AND PENG_IS_DELETE = 0
											) -
											(
												SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '11'	
														AND PENG_JENIS_DOKUMEN = 'BC 25'
														AND PENG_KET = 'SELESAI' 
														AND PENG_IS_DELETE = 0
											)) AS HASIL	
														";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["HASIL"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>       
                          <td>
								<?php								
								
								$sql = "  	SELECT 								
											((
												SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '12'	
														AND PENG_JENIS_DOKUMEN = 'BC 25'
														AND PENG_IS_DELETE = 0
											) -
											(
												SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '12'	
														AND PENG_JENIS_DOKUMEN = 'BC 25'
														AND PENG_KET = 'SELESAI' 
														AND PENG_IS_DELETE = 0
											)) AS HASIL	
														";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["HASIL"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>    
                        </tr>       
                        <tr>
                          <td rowspan="2">BC 27</td>   
                          <td>Berat</td>     
                          <td>&nbsp;</td>  
                          <td>
								<?php
								
								$sql = "  	SELECT 								
											((
												SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '01'	
														AND PENG_JENIS_DOKUMEN = 'BC 27'
														AND PENG_IS_DELETE = 0
											) -
											(
												SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '01'	
														AND PENG_JENIS_DOKUMEN = 'BC 27' 
														AND PENG_KET = 'SELESAI' 
														AND PENG_IS_DELETE = 0
											)) AS HASIL	
														";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["HASIL"]; 
								  }	  
									echo $d_jumlah;	
															  
								?>								
						  </td>        
                          <td>
								<?php								
								
								$sql = "  	SELECT 								
											((
												SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '02'	
														AND PENG_JENIS_DOKUMEN = 'BC 27'
														AND PENG_IS_DELETE = 0
											) -
											(
												SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '02'	
														AND PENG_JENIS_DOKUMEN = 'BC 27' 
														AND PENG_KET = 'SELESAI' 
														AND PENG_IS_DELETE = 0
											)) AS HASIL	
														";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["HASIL"]; 
								  }	  
									echo $d_jumlah;	
						  
								?>								
						  </td>    
                          <td>
								<?php								
								
								$sql = "  	SELECT 								
											((
												SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '03'	
														AND PENG_JENIS_DOKUMEN = 'BC 27'
														AND PENG_IS_DELETE = 0
											) -
											(
												SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '03'	
														AND PENG_JENIS_DOKUMEN = 'BC 27' 
														AND PENG_KET = 'SELESAI' 
														AND PENG_IS_DELETE = 0
											)) AS HASIL	
														";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["HASIL"]; 
								  }	  
									echo $d_jumlah;	
						  
								?>								
						  </td>        
                          <td>
								<?php								
								
								$sql = "  	SELECT 								
											((
												SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '04'	
														AND PENG_JENIS_DOKUMEN = 'BC 27'
														AND PENG_IS_DELETE = 0
											) -
											(
												SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '04'	
														AND PENG_JENIS_DOKUMEN = 'BC 27' 
														AND PENG_KET = 'SELESAI' 
														AND PENG_IS_DELETE = 0
											)) AS HASIL	
														";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["HASIL"]; 
								  }	  
									echo $d_jumlah;	
						  
								?>								
						  </td>    
                          <td>
								<?php								
								
								$sql = "  	SELECT 								
											((
												SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '05'	
														AND PENG_JENIS_DOKUMEN = 'BC 27'
														AND PENG_IS_DELETE = 0
											) -
											(
												SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '05'	
														AND PENG_JENIS_DOKUMEN = 'BC 27' 
														AND PENG_KET = 'SELESAI' 
														AND PENG_IS_DELETE = 0
											)) AS HASIL	
														";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["HASIL"]; 
								  }	  
									echo $d_jumlah;	
						  
								?>								
						  </td>       
                          <td>
								<?php								
								
								$sql = "  	SELECT 								
											((
												SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '06'	
														AND PENG_JENIS_DOKUMEN = 'BC 27'
														AND PENG_IS_DELETE = 0
											) -
											(
												SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '06'	
														AND PENG_JENIS_DOKUMEN = 'BC 27' 
														AND PENG_KET = 'SELESAI' 
														AND PENG_IS_DELETE = 0
											)) AS HASIL	
														";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["HASIL"]; 
								  }	  
									echo $d_jumlah;	
						  
								?>								
						  </td>        
                          <td>
								<?php								
								
								$sql = "  	SELECT 								
											((
												SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '07'	
														AND PENG_JENIS_DOKUMEN = 'BC 27'
														AND PENG_IS_DELETE = 0
											) -
											(
												SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '07'	
														AND PENG_JENIS_DOKUMEN = 'BC 27' 
														AND PENG_KET = 'SELESAI' 
														AND PENG_IS_DELETE = 0
											)) AS HASIL	
														";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["HASIL"]; 
								  }	  
									echo $d_jumlah;	
						  
								?>								
						  </td>             
                          <td>
								<?php								
								
								$sql = "  	SELECT 								
											((
												SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '08'	
														AND PENG_JENIS_DOKUMEN = 'BC 27'
														AND PENG_IS_DELETE = 0
											) -
											(
												SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '08'	
														AND PENG_JENIS_DOKUMEN = 'BC 27' 
														AND PENG_KET = 'SELESAI' 
														AND PENG_IS_DELETE = 0
											)) AS HASIL	
														";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["HASIL"]; 
								  }	  
									echo $d_jumlah;	
						  
								?>								
						  </td>          
                          <td>
								<?php								
								
								$sql = "  	SELECT 								
											((
												SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '09'	
														AND PENG_JENIS_DOKUMEN = 'BC 27'
														AND PENG_IS_DELETE = 0
											) -
											(
												SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '09'	
														AND PENG_JENIS_DOKUMEN = 'BC 27' 
														AND PENG_KET = 'SELESAI' 
														AND PENG_IS_DELETE = 0
											)) AS HASIL	
														";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["HASIL"]; 
								  }	  
									echo $d_jumlah;	
						  
								?>								
						  </td>     
                          <td>
								<?php								
								
								$sql = "  	SELECT 								
											((
												SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '10'	
														AND PENG_JENIS_DOKUMEN = 'BC 27'
														AND PENG_IS_DELETE = 0
											) -
											(
												SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '10'	
														AND PENG_JENIS_DOKUMEN = 'BC 27' 
														AND PENG_KET = 'SELESAI' 
														AND PENG_IS_DELETE = 0
											)) AS HASIL	
														";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["HASIL"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>          
                          <td>
								<?php								
								
								$sql = "  	SELECT 								
											((
												SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '11'	
														AND PENG_JENIS_DOKUMEN = 'BC 27'
														AND PENG_IS_DELETE = 0
											) -
											(
												SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '11'	
														AND PENG_JENIS_DOKUMEN = 'BC 27' 
														AND PENG_KET = 'SELESAI' 
														AND PENG_IS_DELETE = 0
											)) AS HASIL	
														";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["HASIL"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>       
                          <td>
								<?php								
								
								$sql = "  	SELECT 								
											((
												SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '12'	
														AND PENG_JENIS_DOKUMEN = 'BC 27'
														AND PENG_IS_DELETE = 0
											) -
											(
												SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '12'	
														AND PENG_JENIS_DOKUMEN = 'BC 27' 
														AND PENG_KET = 'SELESAI' 
														AND PENG_IS_DELETE = 0
											)) AS HASIL	
														";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["HASIL"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>    
                        </tr>   
                        <tr>    
                          <td>Bale</td>     
                          <td>&nbsp;</td>     
                          <td>
								<?php								
								
								$sql = "  	SELECT 								
											((
												SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '01'	
														AND PENG_JENIS_DOKUMEN = 'BC 27'
														AND PENG_IS_DELETE = 0
											) -
											(
												SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '01'	
														AND PENG_JENIS_DOKUMEN = 'BC 27'
														AND PENG_KET = 'SELESAI' 
														AND PENG_IS_DELETE = 0
											)) AS HASIL	
														";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["HASIL"]; 
								  }	  
									echo $d_jumlah;	
						  
								?>								
						  </td>        
                          <td>
								<?php								
								
								$sql = "  	SELECT 								
											((
												SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '02'	
														AND PENG_JENIS_DOKUMEN = 'BC 27'
														AND PENG_IS_DELETE = 0
											) -
											(
												SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '02'	
														AND PENG_JENIS_DOKUMEN = 'BC 27'
														AND PENG_KET = 'SELESAI' 
														AND PENG_IS_DELETE = 0
											)) AS HASIL	
														";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["HASIL"]; 
								  }	  
									echo $d_jumlah;	
						  
								?>								
						  </td>    
                          <td>
								<?php								
								
								$sql = "  	SELECT 								
											((
												SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '03'	
														AND PENG_JENIS_DOKUMEN = 'BC 27'
														AND PENG_IS_DELETE = 0
											) -
											(
												SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '03'	
														AND PENG_JENIS_DOKUMEN = 'BC 27'
														AND PENG_KET = 'SELESAI' 
														AND PENG_IS_DELETE = 0
											)) AS HASIL	
														";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["HASIL"]; 
								  }	  
									echo $d_jumlah;	
						  
								?>								
						  </td>        
                          <td>
								<?php								
								
								$sql = "  	SELECT 								
											((
												SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '04'	
														AND PENG_JENIS_DOKUMEN = 'BC 27'
														AND PENG_IS_DELETE = 0
											) -
											(
												SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '04'	
														AND PENG_JENIS_DOKUMEN = 'BC 27'
														AND PENG_KET = 'SELESAI' 
														AND PENG_IS_DELETE = 0
											)) AS HASIL	
														";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["HASIL"]; 
								  }	  
									echo $d_jumlah;	
						  
								?>								
						  </td>    
                          <td>
								<?php								
								
								$sql = "  	SELECT 								
											((
												SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '05'	
														AND PENG_JENIS_DOKUMEN = 'BC 27'
														AND PENG_IS_DELETE = 0
											) -
											(
												SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '05'	
														AND PENG_JENIS_DOKUMEN = 'BC 27'
														AND PENG_KET = 'SELESAI' 
														AND PENG_IS_DELETE = 0
											)) AS HASIL	
														";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["HASIL"]; 
								  }	  
									echo $d_jumlah;	
						  
								?>								
						  </td>       
                          <td>
								<?php								
								
								$sql = "  	SELECT 								
											((
												SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '06'	
														AND PENG_JENIS_DOKUMEN = 'BC 27'
														AND PENG_IS_DELETE = 0
											) -
											(
												SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '06'	
														AND PENG_JENIS_DOKUMEN = 'BC 27'
														AND PENG_KET = 'SELESAI' 
														AND PENG_IS_DELETE = 0
											)) AS HASIL	
														";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["HASIL"]; 
								  }	  
									echo $d_jumlah;	
						  
								?>								
						  </td>        
                          <td>
								<?php								
								
								$sql = "  	SELECT 								
											((
												SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '07'	
														AND PENG_JENIS_DOKUMEN = 'BC 27'
														AND PENG_IS_DELETE = 0
											) -
											(
												SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '07'	
														AND PENG_JENIS_DOKUMEN = 'BC 27'
														AND PENG_KET = 'SELESAI' 
														AND PENG_IS_DELETE = 0
											)) AS HASIL	
														";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["HASIL"]; 
								  }	  
									echo $d_jumlah;	
						  
								?>								
						  </td>             
                          <td>
								<?php								
								
								$sql = "  	SELECT 								
											((
												SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '08'	
														AND PENG_JENIS_DOKUMEN = 'BC 27'
														AND PENG_IS_DELETE = 0
											) -
											(
												SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '08'	
														AND PENG_JENIS_DOKUMEN = 'BC 27'
														AND PENG_KET = 'SELESAI' 
														AND PENG_IS_DELETE = 0
											)) AS HASIL	
														";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["HASIL"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>          
                          <td>
								<?php								
								
								$sql = "  	SELECT 								
											((
												SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '09'	
														AND PENG_JENIS_DOKUMEN = 'BC 27'
														AND PENG_IS_DELETE = 0
											) -
											(
												SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '09'	
														AND PENG_JENIS_DOKUMEN = 'BC 27'
														AND PENG_KET = 'SELESAI' 
														AND PENG_IS_DELETE = 0
											)) AS HASIL	
														";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["HASIL"]; 
								  }	  
									echo $d_jumlah;	
						  
								?>								
						  </td>     
                          <td>
								<?php								
								
								$sql = "  	SELECT 								
											((
												SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '10'	
														AND PENG_JENIS_DOKUMEN = 'BC 27'
														AND PENG_IS_DELETE = 0
											) -
											(
												SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '10'	
														AND PENG_JENIS_DOKUMEN = 'BC 27'
														AND PENG_KET = 'SELESAI' 
														AND PENG_IS_DELETE = 0
											)) AS HASIL	
														";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["HASIL"]; 
								  }	  
									echo $d_jumlah;	
						  
								?>								
						  </td>          
                          <td>
								<?php								
								
								$sql = "  	SELECT 								
											((
												SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '11'	
														AND PENG_JENIS_DOKUMEN = 'BC 27'
														AND PENG_IS_DELETE = 0
											) -
											(
												SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '11'	
														AND PENG_JENIS_DOKUMEN = 'BC 27'
														AND PENG_KET = 'SELESAI' 
														AND PENG_IS_DELETE = 0
											)) AS HASIL	
														";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["HASIL"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>       
                          <td>
								<?php								
								
								$sql = "  	SELECT 								
											((
												SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '12'	
														AND PENG_JENIS_DOKUMEN = 'BC 27'
														AND PENG_IS_DELETE = 0
											) -
											(
												SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '12'	
														AND PENG_JENIS_DOKUMEN = 'BC 27'
														AND PENG_KET = 'SELESAI' 
														AND PENG_IS_DELETE = 0
											)) AS HASIL	
														";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["HASIL"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>  
                        </tr>       
                        <tr>
                          <td rowspan="2">BC 30</td>    
                          <td>Berat</td>     
                          <td>&nbsp;</td>  
                          <td>
								<?php
								
								$sql = "  	SELECT 								
											((
												SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '01'	
														AND PENG_JENIS_DOKUMEN = 'BC 30'
														AND PENG_IS_DELETE = 0
											) -
											(
												SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '01'	
														AND PENG_JENIS_DOKUMEN = 'BC 30' 
														AND PENG_KET = 'SELESAI' 
														AND PENG_IS_DELETE = 0
											)) AS HASIL	
														";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["HASIL"]; 
								  }	  
									echo $d_jumlah;	
															  
								?>								
						  </td>        
                          <td>
								<?php								
								
								$sql = "  	SELECT 								
											((
												SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '02'	
														AND PENG_JENIS_DOKUMEN = 'BC 30'
														AND PENG_IS_DELETE = 0
											) -
											(
												SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '02'	
														AND PENG_JENIS_DOKUMEN = 'BC 30' 
														AND PENG_KET = 'SELESAI' 
														AND PENG_IS_DELETE = 0
											)) AS HASIL	
														";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["HASIL"]; 
								  }	  
									echo $d_jumlah;	
						  
								?>								
						  </td>    
                          <td>
								<?php								
								
								$sql = "  	SELECT 								
											((
												SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '03'	
														AND PENG_JENIS_DOKUMEN = 'BC 30'
														AND PENG_IS_DELETE = 0
											) -
											(
												SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '03'	
														AND PENG_JENIS_DOKUMEN = 'BC 30' 
														AND PENG_KET = 'SELESAI' 
														AND PENG_IS_DELETE = 0
											)) AS HASIL	
														";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["HASIL"]; 
								  }	  
									echo $d_jumlah;	
						  
								?>								
						  </td>        
                          <td>
								<?php								
								
								$sql = "  	SELECT 								
											((
												SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '04'	
														AND PENG_JENIS_DOKUMEN = 'BC 30'
														AND PENG_IS_DELETE = 0
											) -
											(
												SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '04'	
														AND PENG_JENIS_DOKUMEN = 'BC 30' 
														AND PENG_KET = 'SELESAI' 
														AND PENG_IS_DELETE = 0
											)) AS HASIL	
														";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["HASIL"]; 
								  }	  
									echo $d_jumlah;	
						  
								?>								
						  </td>    
                          <td>
								<?php								
								
								$sql = "  	SELECT 								
											((
												SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '05'	
														AND PENG_JENIS_DOKUMEN = 'BC 30'
														AND PENG_IS_DELETE = 0
											) -
											(
												SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '05'	
														AND PENG_JENIS_DOKUMEN = 'BC 30' 
														AND PENG_KET = 'SELESAI' 
														AND PENG_IS_DELETE = 0
											)) AS HASIL	
														";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["HASIL"]; 
								  }	  
									echo $d_jumlah;	
						  
								?>								
						  </td>       
                          <td>
								<?php								
								
								$sql = "  	SELECT 								
											((
												SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '06'	
														AND PENG_JENIS_DOKUMEN = 'BC 30'
														AND PENG_IS_DELETE = 0
											) -
											(
												SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '06'	
														AND PENG_JENIS_DOKUMEN = 'BC 30' 
														AND PENG_KET = 'SELESAI' 
														AND PENG_IS_DELETE = 0
											)) AS HASIL	
														";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["HASIL"]; 
								  }	  
									echo $d_jumlah;	
						  
								?>								
						  </td>        
                          <td>
								<?php								
								
								$sql = "  	SELECT 								
											((
												SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '07'	
														AND PENG_JENIS_DOKUMEN = 'BC 30'
														AND PENG_IS_DELETE = 0
											) -
											(
												SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '07'	
														AND PENG_JENIS_DOKUMEN = 'BC 30' 
														AND PENG_KET = 'SELESAI' 
														AND PENG_IS_DELETE = 0
											)) AS HASIL	
														";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["HASIL"]; 
								  }	  
									echo $d_jumlah;	
						  
								?>								
						  </td>             
                          <td>
								<?php								
								
								$sql = "  	SELECT 								
											((
												SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '08'	
														AND PENG_JENIS_DOKUMEN = 'BC 30'
														AND PENG_IS_DELETE = 0
											) -
											(
												SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '08'	
														AND PENG_JENIS_DOKUMEN = 'BC 30' 
														AND PENG_KET = 'SELESAI' 
														AND PENG_IS_DELETE = 0
											)) AS HASIL	
														";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["HASIL"]; 
								  }	  
									echo $d_jumlah;	
						  
								?>								
						  </td>          
                          <td>
								<?php								
								
								$sql = "  	SELECT 								
											((
												SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '09'	
														AND PENG_JENIS_DOKUMEN = 'BC 30'
														AND PENG_IS_DELETE = 0
											) -
											(
												SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '09'	
														AND PENG_JENIS_DOKUMEN = 'BC 30' 
														AND PENG_KET = 'SELESAI' 
														AND PENG_IS_DELETE = 0
											)) AS HASIL	
														";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["HASIL"]; 
								  }	  
									echo $d_jumlah;	
						  
								?>								
						  </td>     
                          <td>
								<?php								
								
								$sql = "  	SELECT 								
											((
												SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '10'	
														AND PENG_JENIS_DOKUMEN = 'BC 30'
														AND PENG_IS_DELETE = 0
											) -
											(
												SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '10'	
														AND PENG_JENIS_DOKUMEN = 'BC 30' 
														AND PENG_KET = 'SELESAI' 
														AND PENG_IS_DELETE = 0
											)) AS HASIL	
														";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["HASIL"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>          
                          <td>
								<?php								
								
								$sql = "  	SELECT 								
											((
												SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '11'	
														AND PENG_JENIS_DOKUMEN = 'BC 30'
														AND PENG_IS_DELETE = 0
											) -
											(
												SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '11'	
														AND PENG_JENIS_DOKUMEN = 'BC 30' 
														AND PENG_KET = 'SELESAI' 
														AND PENG_IS_DELETE = 0
											)) AS HASIL	
														";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["HASIL"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>       
                          <td>
								<?php								
								
								$sql = "  	SELECT 								
											((
												SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '12'	
														AND PENG_JENIS_DOKUMEN = 'BC 30'
														AND PENG_IS_DELETE = 0
											) -
											(
												SELECT	IFNULL(ROUND(SUM(PENG_IW),2),0) AS SUM_IW
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '12'	
														AND PENG_JENIS_DOKUMEN = 'BC 30' 
														AND PENG_KET = 'SELESAI' 
														AND PENG_IS_DELETE = 0
											)) AS HASIL	
														";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["HASIL"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>    
                        </tr>   
                        <tr>    
                          <td>Bale</td>     
                          <td>&nbsp;</td>    
                          <td>
								<?php								
								
								$sql = "  	SELECT 								
											((
												SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '01'	
														AND PENG_JENIS_DOKUMEN = 'BC 30'
														AND PENG_IS_DELETE = 0
											) -
											(
												SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '01'	
														AND PENG_JENIS_DOKUMEN = 'BC 30'
														AND PENG_KET = 'SELESAI' 
														AND PENG_IS_DELETE = 0
											)) AS HASIL	
														";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["HASIL"]; 
								  }	  
									echo $d_jumlah;	
						  
								?>								
						  </td>        
                          <td>
								<?php								
								
								$sql = "  	SELECT 								
											((
												SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '02'	
														AND PENG_JENIS_DOKUMEN = 'BC 30'
														AND PENG_IS_DELETE = 0
											) -
											(
												SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '02'	
														AND PENG_JENIS_DOKUMEN = 'BC 30'
														AND PENG_KET = 'SELESAI' 
														AND PENG_IS_DELETE = 0
											)) AS HASIL	
														";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["HASIL"]; 
								  }	  
									echo $d_jumlah;	
						  
								?>								
						  </td>    
                          <td>
								<?php								
								
								$sql = "  	SELECT 								
											((
												SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '03'	
														AND PENG_JENIS_DOKUMEN = 'BC 30'
														AND PENG_IS_DELETE = 0
											) -
											(
												SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '03'	
														AND PENG_JENIS_DOKUMEN = 'BC 30'
														AND PENG_KET = 'SELESAI' 
														AND PENG_IS_DELETE = 0
											)) AS HASIL	
														";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["HASIL"]; 
								  }	  
									echo $d_jumlah;	
						  
								?>								
						  </td>        
                          <td>
								<?php								
								
								$sql = "  	SELECT 								
											((
												SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '04'	
														AND PENG_JENIS_DOKUMEN = 'BC 30'
														AND PENG_IS_DELETE = 0
											) -
											(
												SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '04'	
														AND PENG_JENIS_DOKUMEN = 'BC 30'
														AND PENG_KET = 'SELESAI' 
														AND PENG_IS_DELETE = 0
											)) AS HASIL	
														";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["HASIL"]; 
								  }	  
									echo $d_jumlah;	
						  
								?>								
						  </td>    
                          <td>
								<?php								
								
								$sql = "  	SELECT 								
											((
												SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '05'	
														AND PENG_JENIS_DOKUMEN = 'BC 30'
														AND PENG_IS_DELETE = 0
											) -
											(
												SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '05'	
														AND PENG_JENIS_DOKUMEN = 'BC 30'
														AND PENG_KET = 'SELESAI' 
														AND PENG_IS_DELETE = 0
											)) AS HASIL	
														";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["HASIL"]; 
								  }	  
									echo $d_jumlah;	
						  
								?>								
						  </td>       
                          <td>
								<?php								
								
								$sql = "  	SELECT 								
											((
												SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '06'	
														AND PENG_JENIS_DOKUMEN = 'BC 30'
														AND PENG_IS_DELETE = 0
											) -
											(
												SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '06'	
														AND PENG_JENIS_DOKUMEN = 'BC 30'
														AND PENG_KET = 'SELESAI' 
														AND PENG_IS_DELETE = 0
											)) AS HASIL	
														";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["HASIL"]; 
								  }	  
									echo $d_jumlah;	
						  
								?>								
						  </td>        
                          <td>
								<?php								
								
								$sql = "  	SELECT 								
											((
												SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '07'	
														AND PENG_JENIS_DOKUMEN = 'BC 30'
														AND PENG_IS_DELETE = 0
											) -
											(
												SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '07'	
														AND PENG_JENIS_DOKUMEN = 'BC 30'
														AND PENG_KET = 'SELESAI' 
														AND PENG_IS_DELETE = 0
											)) AS HASIL	
														";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["HASIL"]; 
								  }	  
									echo $d_jumlah;	
						  
								?>								
						  </td>             
                          <td>
								<?php								
								
								$sql = "  	SELECT 								
											((
												SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '08'	
														AND PENG_JENIS_DOKUMEN = 'BC 30'
														AND PENG_IS_DELETE = 0
											) -
											(
												SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '08'	
														AND PENG_JENIS_DOKUMEN = 'BC 30'
														AND PENG_KET = 'SELESAI' 
														AND PENG_IS_DELETE = 0
											)) AS HASIL	
														";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["HASIL"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>          
                          <td>
								<?php								
								
								$sql = "  	SELECT 								
											((
												SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '09'	
														AND PENG_JENIS_DOKUMEN = 'BC 30'
														AND PENG_IS_DELETE = 0
											) -
											(
												SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '09'	
														AND PENG_JENIS_DOKUMEN = 'BC 30'
														AND PENG_KET = 'SELESAI' 
														AND PENG_IS_DELETE = 0
											)) AS HASIL	
														";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["HASIL"]; 
								  }	  
									echo $d_jumlah;	
						  
								?>								
						  </td>     
                          <td>
								<?php								
								
								$sql = "  	SELECT 								
											((
												SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '10'	
														AND PENG_JENIS_DOKUMEN = 'BC 30'
														AND PENG_IS_DELETE = 0
											) -
											(
												SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '10'	
														AND PENG_JENIS_DOKUMEN = 'BC 30'
														AND PENG_KET = 'SELESAI' 
														AND PENG_IS_DELETE = 0
											)) AS HASIL	
														";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["HASIL"]; 
								  }	  
									echo $d_jumlah;	
						  
								?>								
						  </td>          
                          <td>
								<?php								
								
								$sql = "  	SELECT 								
											((
												SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '11'	
														AND PENG_JENIS_DOKUMEN = 'BC 30'
														AND PENG_IS_DELETE = 0
											) -
											(
												SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '11'	
														AND PENG_JENIS_DOKUMEN = 'BC 30'
														AND PENG_KET = 'SELESAI' 
														AND PENG_IS_DELETE = 0
											)) AS HASIL	
														";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["HASIL"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>       
                          <td>
								<?php								
								
								$sql = "  	SELECT 								
											((
												SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '12'	
														AND PENG_JENIS_DOKUMEN = 'BC 30'
														AND PENG_IS_DELETE = 0
											) -
											(
												SELECT	IFNULL(ROUND(SUM(PENG_BALE),2),0) AS SUM_BALE
												FROM	pengeluaran  
												WHERE	YEAR(PENG_DATE_DOK) = YEAR(CURDATE()) 
														AND MONTH(PENG_DATE_DOK) = '12'	
														AND PENG_JENIS_DOKUMEN = 'BC 30'
														AND PENG_KET = 'SELESAI' 
														AND PENG_IS_DELETE = 0
											)) AS HASIL	
														";		
								  //echo $sql;      
								  $sql = mysqli_query($con,$sql);
								  $d_jumlah = 0;
								  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									  $d_jumlah = $data["HASIL"]; 
								  }	  
									echo $d_jumlah;		
						  
								?>								
						  </td>  
                        </tr>    
                        	
                      </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>    
        
            </div>
            </div>
 
          
    <!-- Datatables -->
    <script src="vendors/datatables.net/js/jquery.dataTables.js"></script>
    <script src="vendors/datatables.net-bs/js/dataTables.bootstrap.js"></script>

    <script type="text/javascript">

    
  $(document).ready(function(){

    $('#datatable').DataTable({
      scrollX: true,
      scrollY: '65vh',
      scrollCollapse: true,
      autoWidth: false
    });
	$("#btn_tambah").click(function(){          
      $.ajax({
          type:"POST",
          url:"saldo_rekap.php",    
          success: function(msg){   
              $("#div_tambah").html(msg);     
          }  
        });           
    }); 
    function Cetakan()
{
    document.all.tombol.style.visibility="hidden";
    
    window.print();
    alert("Jangan di tekan tombol OK sebelum dokumen selesai tercetak!");
    
    document.all.tombol.style.visibility="visible";
 }
function Cetakan(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();
alert("Jangan di tekan tombol OK sebelum dokumen selesai tercetak!");
    document.all.tombol.style.visibility="visible";
     document.body.innerHTML = originalContents;
}
  });

    
  </script>   
<!DOCTYPE html>
<html>

<body>
	<style type="text/css">
	body{
		font-family: sans-serif;
	}
	table{
		margin: 20px auto;
		border-collapse: collapse;
	}
	table th,
	table td{
		border: 1px solid #3c3c3c;
		padding: 3px 8px;

	}
	a{
		background: blue;
		color: #fff;
		padding: 8px 10px;
		text-decoration: none;
		border-radius: 2px;
	}
	</style>

	<?php
	include"koneksi.php";
	include "fn_dea.php";
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=rekap_saldo_detail.xls");
	$tgl_awal= $_GET['awal'];
	$tgl_akhir= $_GET['akhir'];
	$jmlIW=0;
    $jmlBL=0;
    $urut=0;
	?>
<p align="right">
Lampiran ND-08/WBC.10/KPP.MP.071107/2020<br>
tanggal <?php echo tgl_indo(date('Y-m-d'));?> tentang Rekapitulasi Kegiatan<br>
Pemasukan dan Pengeluaran TPB
<br><br>
</p>
	<center>
<h2>REKAPITULASI KEGIATAN PEMASUKAN DAN PENGELUARAN <br> 								
TPB PT. ASIA PACIFIC RAYON							<br>	

PERIODE TANGGAL <?php echo $tgl_awal; ?> S.D <?php echo $tgl_akhir; ?> 
<br>
</h2>
	</center>
<left>
	1.	DOKUMEN PABEAN MASUK <br>		
</left>
    
	<table border="1">
		<tr>
			<th>No</th>
			<th>No. PPBKB</th>
			<th>Tgl. PPBKB</th>
			<th>Tgl. Masuk</th>
<th>Jenis Barang</th>
<th>Jumlah Tonase <br>(KG)</th>
<th>Jumlah Barang <br>(BL)</th>
<th>Keterangan</th>


		</tr>
		<?php 
		

		// pemasukan
		            
                      $sql = "  SELECT v.SG_DATE,v.SG_VOYAGE,d.*,
                            DATE_FORMAT(d.PE_Date_TPB, '%d/%m/%Y ') AS ST_DATE_NEW,
                            DATE_FORMAT(d.PE_Date_PPBKB, '%d/%m/%Y') AS ST_DATE_PPB
                            FROM  pemasukan d inner join segelin v
                            WHERE d.PE_IS_DELETE = 0 and d.SG_ID=v.SG_ID AND d.PE_IW > 0 
                            AND d.PE_Date_TPB between 
                            STR_TO_DATE('$tgl_awal','%d/%m/%Y')
                            AND 
                            STR_TO_DATE('$tgl_akhir','%d/%m/%Y')
                            ORDER BY d.PE_Date_TPB asc ";
                      //echo $sql;      
                      $sql = mysqli_query($con,$sql);
                      while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
                        $urut++;
              $d_id = $data["PE_ID"];
              $d_SG_VOYAGE = $data["SG_VOYAGE"] ;
              $d_PE_Date_TPB= $data["ST_DATE_NEW"];
              $d_PE_No_PPBKB= $data["PE_No_PPBKB"];
              $d_PE_Date_PPBKB= $data["ST_DATE_PPB"];
              $d_PE_IW= $data["PE_IW"];
              $d_PE_KGM = $data["PE_KGM"];
              $d_PE_Bale = $data["PE_Bale"];
              $d_PE_No_Container = $data ["PE_No_Container"];
              $d_PE_Feet = $data ["PE_Feet"];
              $d_PE_Segel = $data["PE_Segel"];
              $d_PE_Jenis_Barang = $data["PE_Jenis_Barang"];
              $d_PE_Type_Cont = $data["PE_Type_Cont"];
              $d_PE_KET = $data ["PE_KET"];
              $jmlIW+=$d_PE_IW;
              $jmlBL+=$d_PE_Bale;
              
                      ?>                    
                        <tr>
                          <td><?php echo $urut; ?></th>
                          <td><?php echo $d_PE_No_PPBKB; ?></td>
                          <td><?php echo $d_PE_Date_PPBKB; ?></td>
                          <td><?php echo $d_PE_Date_TPB; ?></td>
                          <td><?php echo $d_PE_Jenis_Barang; ?></td>
                          <td><?php echo $d_PE_IW; ?></td>
                          <td><?php echo $d_PE_Bale; ?></td>
                          <td><?php echo $d_PE_KET; ?></td>
                          
                        </tr>


                      <?php
                      } 
                      ?>
						<tr>
                        <th colspan="5">JUMLAH</th>
                        <th><?php echo $jmlIW; ?></th>
                        <th><?php echo $jmlBL; ?></th>
                        </tr>


</table>
<br><br>
<?php $urut=0;
$jmlIW=0;
$jmlBL=0;
 ?>
<left>2. DOKUMEN PABEAN KELUAR<br></left>
<table border="1">
		<tr>
			<th>No</th>
			<th>Jenis Dokumen</th>
			<th>Nomor Dokumen</th>
			<th>Tgl. Dokumen</th>
			<th>Jenis Barang</th>
			<th>Jumlah Tonase <br>(KG)</th>
			<th>Jumlah Barang <br>(BL)</th>
			<th>Keterangan</th>


		</tr>
		<?php 
		

		
		
                      $sql = "  SELECT	d.*,
										DATE_FORMAT(d.PENG_DATE_DOK, '%d/%m/%Y') AS PENG_DATE_DOK_NEW,
										DATE_FORMAT(d.PENG_DATE, '%d/%m/%Y %H:%i ') AS PENG_DATE_NEW
								FROM	pengeluaran d   
								WHERE	d.PENG_IS_DELETE = 0 and d.PENG_IW > 0
								AND d.PENG_DATE_DOK BETWEEN 
								STR_TO_DATE('$tgl_awal','%d/%m/%Y')
                            	AND 
                           		STR_TO_DATE('$tgl_akhir','%d/%m/%Y')                
								ORDER BY d.PENG_DATE_DOK asc";
                      //echo $sql;      
                      $sql = mysqli_query($con,$sql);
                      while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
						$urut++;
						  $d_id = $data["PENG_ID"]; 
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
						  $d_PENG_KET = $data["PENG_KET"];
						  $jmlIW+=$d_PENG_IW;
              			  $jmlBL+=$d_PENG_BALE;                      
                      
              
                      ?>                    
                        <tr>
                          <td><?php echo $urut; ?></th>
                          <td><?php echo $d_PENG_JENIS_DOKUMEN; ?></td>
                          <td><?php echo $d_PENG_NOMOR_DOK; ?></td>
                          <td><?php echo $d_PENG_DATE_DOK_NEW; ?></td>
                          <td><?php echo $d_PENG_JENIS_BARANG; ?></td>
                          <td><?php echo $d_PENG_IW; ?></td>
                          <td><?php echo $d_PENG_BALE; ?></td>
                          <td><?php echo $d_PENG_KET; ?></td>
                          
                        </tr>
                        
                      <?php
                      } 
                      ?>
                      <tr>
                        <th colspan="5">JUMLAH</th>
                        <th><?php echo $jmlIW; ?></th>
                        <th><?php echo $jmlBL; ?></th>
                        <th> &nbsp; </th>
                        </tr>



	</table>
<br><br>
<?php $urut=0;
$jmlIW=0;
$jmlBL=0;
 ?>
<left>3. DOKUMEN PABEAN KELUAR MASIH DALAM PROSES<br> </left>

<!-- cari di dokumen yang statusnya masih belum selesai/ tidak ada keterangan --> 
<?php
 
 $sql = "  SELECT	d.*,
										DATE_FORMAT(d.PENG_DATE_DOK, '%d/%m/%Y') AS PENG_DATE_DOK_NEW,
										DATE_FORMAT(d.PENG_DATE, '%d/%m/%Y %H:%i ') AS PENG_DATE_NEW
								FROM	pengeluaran d   
								WHERE	d.PENG_IS_DELETE = 0 AND d.PENG_IW > 0 AND
								d.PENG_KET=''				 and	
								d.PENG_DATE_DOK BETWEEN 
								STR_TO_DATE('$tgl_awal','%d/%m/%Y')
                            	AND 
                           		STR_TO_DATE('$tgl_akhir','%d/%m/%Y')                
								ORDER BY d.PENG_DATE_DOK asc";
                      //echo $sql;  
                       $sql = mysqli_query($con,$sql);
                      $rowcount=mysqli_num_rows($sql);
                      //jika tidak ada record yang gantung
                      if($rowcount==0)
                      { ?>
<!-- jika 0 maka cetak nihil --> 
						<table border="1">
						<tr>
						<th>No</th>
						<th>Jenis Dokumen</th>
						<th>Nomor Dokumen</th>
						<th>Tgl. Dokumen</th>
						<th>Jenis Barang</th>
						<th>Jumlah Barang <br>(KG)</th>
						<th>Jumlah Barang <br>(BL)</th>
						<th>Sisa Tonase Belum <br>Dikeluarkan (KG)</th>
						
						</tr>
						<tr>
							<th colspan="8"><h2>NIHIL</h2></th>
						</tr>
					</table>
                      <?php }
	  else { ?>
<!-- jika ada isinya yang belum sesuai, cek total di kartu stok utk pengeluarannya, cek sisa nya --> 

						<table border="1">
						<tr>
						<th>No</th>
						<th>Jenis Dokumen</th>
						<th>Nomor Dokumen</th>
						<th>Tgl. Dokumen</th>
						<th>Jenis Barang</th>
						<th>Jumlah Barang <br>(KG)</th>
						<th>Jumlah Barang <br>(BL)</th>
						<th>Sisa Tonase Belum <br>Dikeluarkan (KG)</th>
						
						</tr>
						

           
	<?php		$sql = "  SELECT	d.*,
					DATE_FORMAT(d.PENG_DATE_DOK, '%d/%m/%Y') AS PENG_DATE_DOK_NEW,
					DATE_FORMAT(d.PENG_DATE, '%d/%m/%Y %H:%i ') AS PENG_DATE_NEW
					FROM	pengeluaran d   
					WHERE	d.PENG_IS_DELETE = 0 AND d.PENG_IW > 0 AND
					d.PENG_KET=''				 and	
					d.PENG_DATE_DOK BETWEEN 
					STR_TO_DATE('$tgl_awal','%d/%m/%Y')
					AND 
						STR_TO_DATE('$tgl_akhir','%d/%m/%Y')                
					ORDER BY d.PENG_DATE_DOK asc";		
			$sql = mysqli_query($con,$sql);
                      while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
						$urut++;
						  $d_id = $data["PENG_ID"]; 
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
						  $d_PENG_KET = $data["PENG_KET"];
						  $jmlIW+=$d_PENG_IW;
              			  $jmlBL+=$d_PENG_BALE;                      
                      	  $tonase_sisa = tonase_sisa($d_id);	
              
                      ?>                    
                        <tr>
                          <td><?php echo $urut; ?></th>
                          <td><?php echo $d_PENG_JENIS_DOKUMEN; ?></td>
                          <td><?php echo $d_PENG_NOMOR_DOK; ?></td>
                          <td><?php echo $d_PENG_DATE_DOK_NEW; ?></td>
                          <td><?php echo $d_PENG_JENIS_BARANG; ?></td>
                          <td><?php echo $d_PENG_IW; ?></td>
                          <td><?php echo $d_PENG_BALE; ?></td>
                          <td><?php echo $tonase_sisa; ?></td>
                          
                          
                        </tr>
                        
                      <?php
                      } ?>

						<tr>
                        <th colspan="5">JUMLAH</th>
                        <th><?php echo $jmlIW; ?></th>
                        <th><?php echo $jmlBL; ?></th>
                        <th>&nbsp;</th>
                        </tr>



	</table>
<br><br>
	
<?php	  }

?>

<br>
<br><br>
<p align="right">
	<br> NIP 	


</p>


</body>
</html>
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

 
 // 21 Oktober 2017
?>
	<?php
	include "fn_dea.php";
	include"koneksi.php";
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=rekap_saldo.xls");
	$tgl_awal= $_GET['awal'];
	$tgl_akhir= $_GET['akhir'];
	$jmlIW=0;
    $jmlBL=0;
    $urut=0;
	?>

<?php 
		

		// pemasukan
		            
                      $sql = "  SELECT count(a.PE_No_PPBKB) as jumlah_dokumen, ROUND(sum(a.PE_IW),2) as Tonase_IN
								from pemasukan a
								where a.PE_IS_DELETE=0 and a.PE_IW >0 and a.PE_Date_TPB between  
								STR_TO_DATE('$tgl_awal','%d/%m/%Y') and 
								STR_TO_DATE('$tgl_akhir','%d/%m/%Y') ";
                      //echo $sql;      
                      $sql = mysqli_query($con,$sql);
                      while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
                     
              				$d_Dokumen_masuk = $data["jumlah_dokumen"];
              				$d_Tonase_IN = $data ["Tonase_IN"];
              			}

        //pengeluaran BC25
/*		$sql = "  SELECT count(a.KS_JENIS_DOKUMEN) as jumlah_dokumen, ROUND(sum(a.KS_TONASE_KELUAR),2) as Tonase_OUT
								from kartu_stok a
								WHERE a.KS_JENIS_DOKUMEN='BC 25' and a.KS_TONASE_KELUAR > 0 and 
								a.KS_DATE between  
								STR_TO_DATE('$tgl_awal','%d/%m/%Y') and 
								STR_TO_DATE('$tgl_akhir','%d/%m/%Y') ";
  */				   $sql="SELECT count(a.PENG_JENIS_DOKUMEN) as jumlah_dokumen, 
								ROUND(sum(a.PENG_IW),2) as Tonase_OUT
								from pengeluaran a
								WHERE a.PENG_JENIS_DOKUMEN='BC 25' and a.PENG_IW > 0 and
								a.PENG_DATE_DOK between
								STR_TO_DATE('$tgl_awal','%d/%m/%Y') and 
								STR_TO_DATE('$tgl_akhir','%d/%m/%Y')
";
                      //echo $sql;      
                      $sql = mysqli_query($con,$sql);
                      while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
                     
              				$d_Dokumen_keluar25 = $data["jumlah_dokumen"];
              				$d_Tonase_OUT25 = $data ["Tonase_OUT"];
              			}
//pengeluaran BC27
					 $sql = "  SELECT count(a.PENG_JENIS_DOKUMEN) as jumlah_dokumen, 
								ROUND(sum(a.PENG_IW),2) as Tonase_OUT
								from pengeluaran a
								WHERE a.PENG_JENIS_DOKUMEN='BC 27' and a.PENG_IW > 0 and
								a.PENG_DATE_DOK between
								STR_TO_DATE('$tgl_awal','%d/%m/%Y') and 
								STR_TO_DATE('$tgl_akhir','%d/%m/%Y') ";
                      //echo $sql;      
                      $sql = mysqli_query($con,$sql);
                      while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
                     
              				$d_Dokumen_keluar27 = $data["jumlah_dokumen"];
              				$d_Tonase_OUT27 = $data ["Tonase_OUT"];
              			}
//pengeluaran BC30
					 $sql = "  SELECT count(a.PENG_JENIS_DOKUMEN) as jumlah_dokumen, 
								ROUND(sum(a.PENG_IW),2) as Tonase_OUT
								from pengeluaran a
								WHERE a.PENG_JENIS_DOKUMEN='BC 30' and a.PENG_IW > 0 and
								a.PENG_DATE_DOK between
								STR_TO_DATE('$tgl_awal','%d/%m/%Y') and 
								STR_TO_DATE('$tgl_akhir','%d/%m/%Y') ";
                      //echo $sql;      
                      $sql = mysqli_query($con,$sql);
                      while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
                     
              				$d_Dokumen_keluar30 = $data["jumlah_dokumen"];
              				$d_Tonase_OUT30 = $data ["Tonase_OUT"];
              			}
              			$d_Tonase_OUT30+=$d_Tonase_OUT27+$d_Tonase_OUT25;

                      ?> 


<p align="right">
Lampiran ND-08/WBC.10/KPP.MP.071107/2020<br>
tanggal <?php echo tgl_indo(date('Y-m-d'));?> tentang Rekapitulasi Kegiatan<br>
Pemasukan dan Pengeluaran TPB
<br><br>
</p>
	<center>
<h2>               LAPORAN  PERIODIK<br> 								
   				PDKB  PT ASIA PASIFIC RAYON SEMARANG	<br>	
TANGGAL <?php echo $tgl_awal; ?> S.D <?php echo $tgl_akhir; ?> 
<br>
</h2>
	</center>

    
	<table border="1">
		<tr>
			<th rowspan="3">NO</th>
			<th rowspan="3">NAMA PDKB</th>
			<th colspan="4">JUMLAH DOKUMEN</th>
			<th rowspan="2" colspan="4">TONASE <br> ( KG )	</th>
		</tr>
		<tr>
			<th>PEMASUKAN</th>
			<th colspan="3">PENGELUARAN</th>
		</tr>
		<tr>
			<th>PPBKB</th>
			<th>BC 2.5</th>
			<th>BC 2.7</th>
			<th>BC 3.0</th>
			<th colspan="2">MASUK </th>
			<th colspan="2">KELUAR </th>
		</tr>
		<tr>
		<td colspan="10">&nbsp;</td>
		</tr>


                        <tr>
                          <td>1</td>
                          <td>PT  ASIA PASIFIC RAYON - SEMARANG</td>
                          <td align="center"><?php echo $d_Dokumen_masuk; ?></td>
                          <td align="center"><?php echo $d_Dokumen_keluar25; ?></td>
                          <td align="center"><?php echo $d_Dokumen_keluar27; ?></td>
                          <td align="center"><?php echo $d_Dokumen_keluar30; ?></td>
                          <td align="center" colspan="2"><?php echo number_format($d_Tonase_IN,2); ?></td>
                          <td align="center" colspan="2"><?php echo number_format($d_Tonase_OUT30,2); ?></td>
             
                        </tr>


             			<tr>
                        <td>&nbsp;</td>
                        <th>TOTAL</th>
                        <th><?php echo $d_Dokumen_masuk; ?></th>
                        <th><?php echo $d_Dokumen_keluar25; ?></th>
                        <th><?php echo $d_Dokumen_keluar27; ?></th>
                        <th><?php echo $d_Dokumen_keluar30; ?></th>
                        <th colspan="2"><?php echo number_format($d_Tonase_IN,2); ?></th>
                        <th colspan="2"><?php echo number_format($d_Tonase_OUT30,2); ?></th>
                        </tr>


</table>

<br>
<left>
Catatan:<br>
1. Jumlah dokumen pengeluaran berdasarkan dokumen yang diajukan oleh PT Asia Pacific Rayon - Riau		<br>
2. Tonase pemasukan berdasarkan PPBKB yang diterima dan dilakukan pembongkaran di PT Asia Pacific Rayon - Semarang<br>
3. Tonase pengeluaran berdasarkan BC 25,BC 27, dan BC 30 yang dikeluarkan baik secara parsial maupun sekaligus di PT Asia Pacific Rayon - Semarang pada periode tersebut

</left>
<br><br>
<p align="right">
Semarang, <?php echo tgl_indo(date('Y-m-d'));?> <br>
Kasubsi Hangar Pabean dan Cukai <br><br>
	<br> NIP 	
</p>


</body>
</html>
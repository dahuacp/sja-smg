<?php
include "../../koneksi.php";
//============================================================+
// File name   : example_048.php
// Begin       : 2009-03-20
// Last Update : 2013-05-14
//
// Description : Example 048 for TCPDF class
//               HTML tables and table headers
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: HTML tables and table headers
 * @author Nicola Asuni
 * @since 2009-03-20
 */
function konversi_tanggal($format, $tanggal="now", $bahasa="id"){
 $en=array("Sun","Mon","Tue","Wed","Thu","Fri","Sat","Jan","Feb",
 "Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
 
 $id=array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu",
 "Januari","Pebruari","Maret","April","Mei","Juni","Juli","Agustus","September",
 "Oktober","Nopember","Desember");
 
 // tambahan untuk bahasa prancis
 // sumber http://w.blankon.in/6V
 $fr = array("dimanche","lundi","mardi","mercredi","jeudi","vendredi","samedi",
 "janvier","février","mars","avril","Mei","mai","juillet","aoùt","septembre",
 "octobre","novembre","décembre");
 
 // mengganti kata yang berada pada array en dengan array id, fr (default id)
 return str_replace($en,$$bahasa,date($format,strtotime($tanggal)));
 }
// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', 'B', 20);

// add a page
$pdf->AddPage('L', 'F4');


$pdf->Write(0, 'Pemeriksaan Mincing', '', 0, 'L', true, 0, false, false, 0);

$pdf->SetFont('helvetica', '', 8);

// -----------------------------------------------------------------------------
$tgl=$_GET['tgl'];
$produkx=$_GET['produkx'];

$sql = "	SELECT  d.*
			FROM	mincing d 											
			WHERE	MN_DATE= STR_TO_DATE('$tgl','%m/%d/%Y') and MN_PRODUK='$produkx'								
			ORDER BY d.MN_ID asc";
//echo $sql;
$sql = mysqli_query($con,$sql);
$id="";
while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC))
{
	$id=$data["MN_ID"];

    
	
}
$single_cal1 = konversi_tanggal("j M Y",$tgl);

// set border width
$pdf->SetLineWidth(0.0);

// set color for cell border
$pdf->SetDrawColor(0,0,0);

$tbl = '
    <style type="text/css">
    
    .tg {width:100%; border-spacing:0; border:1;}
    .tg th{font-family:Arial, sans-serif;font-size:18px;padding:10px;overflow:hidden;word-break:normal;}
    .tg td{font-family:Arial, sans-serif;font-size:15px;padding:6px;overflow:hidden;word-break:normal;}
    .tg .atas{font-weight:bold;font-size:18px;font-family:Arial, Helvetica, sans-serif !important;;text-align:center;vertical-align:top}
	.tg .atas2{font-weight:bold;font-size:9px;font-family:Arial, Helvetica, sans-serif !important;;text-align:left;vertical-align:top}
    .tg .kolom1{font-size:12px;font-family:Arial, Helvetica, sans-serif !important;;vertical-align:top}
    .tg .kolom2{font-size:16px;font-family:Arial, Helvetica, sans-serif !important;;vertical-align:top}
    .tg .titikdua{font-size:15px;font-family:Arial, Helvetica, sans-serif !important;;vertical-align:top}
    .tg .namajabatan{font-weight:bold;font-size:15px;font-family:Arial, Helvetica, sans-serif !important;;vertical-align:top}
    .tg .isidokumen{font-size:15px;text-align:justify;font-family:Arial, Helvetica, sans-serif !important;;vertical-align:top}
    .tg .tandatangan{width:50%; font-size:15px;font-family:Arial, Helvetica, sans-serif !important;;text-align:center;vertical-align:top}
    </style>

<table class="tg" border="1" cellspacing="1" color="black">
  <tr>
    <th class="atas" rowspan="4"><img src="images/CPI.JPG" height="112"></th>
	<th class="atas" colspan="5" rowspan="2" valign="center"><br>FORM</th>
	<td class="atas2">No. Dokumen <br></td>
	<td class="atas2">FR-QC-08 <br></td>
  </tr>
  <tr>
  <td class="atas2">Revisi<br></td>
  <td class="atas2">1<br></td>
  </tr>
  <tr>
    
	<th class="atas" colspan="5" rowspan="2">PEMERIKSAAN MINCING - EMULSFYING - AGING </th>
	<th class="atas2">Tanggal Efektif <br></th>
	<th class="atas2">01-04-2016 <br></th>
  </tr>
  <tr>
  <th class="atas2"> Halaman <br></th>
  <th class="atas2"> 1 dari 1 <br></th>
  </tr>
  <br>
  </table>
  <br><br>
  <table border="0" cell spacing="0">
  <tr>
  <th class="kolom2" width="10%"> Hari/Tgl :</th> <th class="kolom2" align="left" width="40%">'.$single_cal1.'</th>
  <th class="kolom2" width="10%"> Produk :</th> <th class="kolom2" align="left" width="40%">'.$produkx.'</th> 
  </tr>
  
  </table>
  
<br><br>  
';



                    	$sql = "	SELECT  d.*
                    				FROM	mincing d 											
									WHERE	d.MN_ID = $id									
                    				ORDER BY d.MN_ID	";
                    	//echo $sql;			
                    	$sql = mysqli_query($con,$sql);
                    	while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
                    		$tanggal = $data["MN_DATE"];
                    		$produk = $data["MN_PRODUK"];
						}	
						



$sql = "	SELECT  d.*
			FROM	mincing d 											
			WHERE	d.MN_DATE = '$tanggal' AND d.MN_PRODUK = '$produk'								
			ORDER BY d.MN_ID	";
//echo $sql;			
$sql = mysqli_query($con,$sql);
$jum_data = mysqli_num_rows($sql);
$urut = 0;
while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){

	$d_id = $data["MN_ID"];	
	$d_PRODUK = $data["MN_PRODUK"];
	$d_BATCH = $data["MN_BATCH"];
	$d_PREP = $data["MN_PREP"];
	
	$data_id[$urut] = $d_id;
	$produk[$urut] = $d_PRODUK;
	$batch[$urut] = $d_BATCH;
	$prep[$urut] = $d_PREP;
	
	$urut++;

}	
	
	$jum_kolom_data = $urut;

	$v_produk = "";
	$v_batch = "";
	$v_prep = "";
	$v_parameter = "";
	$kolspan = "colspan=''4''";

	for($i=0;$i<$urut;$i++){

		$v_batch = $v_batch.'<td colspan="4">'.$batch[$i].'</td>';
		$v_prep = $v_prep.'<td colspan="4">'.$prep[$i].'</td>';
		$v_parameter = $v_parameter.'
	
		<td>Kode</td>
		<td>C</td>
		<td>Kg</td>	
		<td>Sens</td>	
						';

	}

	

	

	$in_id = "";
	for($i=0;$i<$urut;$i++){	
		if($i==0){
			$in_id = $in_id . $data_id[$i];
		}else{
			$in_id = $in_id . "," . $data_id[$i];
		}
	}	


$sql = "	SELECT  DISTINCT(MND_NAMA) AS NAMA
			FROM	mincing_det d 											
			WHERE	d.MND_MN_ID IN ($in_id)									
			ORDER BY NAMA	";
//echo $sql;			
$sql = mysqli_query($con,$sql);
$baris = '';
$baris_1 = '';
$baris_3 = '';
while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){

	$d_item_nama = $data["NAMA"];	                    	
	
$baris_1 = '
<tr>
  <td>'.$d_item_nama.'</td>	
' ;

	$baris_2 = '';
	for($i=0;$i<$urut;$i++){

		$id = $data_id[$i];

		$sql_3 = "	SELECT  d.*
					FROM	mincing_det d 											
					WHERE	d.MND_MN_ID = $id AND d.MND_NAMA = '$d_item_nama'								
					ORDER BY d.MND_ID	";
		//echo $sql_3;			
		$sql_3 = mysqli_query($con,$sql_3);
		$jum_data_3 = mysqli_num_rows($sql_3);
		$urut_3 = 0;
		while ($data_3=mysqli_fetch_array($sql_3, MYSQLI_ASSOC)){

			$det_id = $data_3["MND_ID"];	
			$det_NAMA = $data_3["MND_NAMA"];
			$det_KODE = $data_3["MND_KODE"];
			$det_SUHU = $data_3["MND_SUHU"];
			$det_BERAT = $data_3["MND_BERAT"];
			$det_SENS = $data_3["MND_SENS"];

		}		

		$baris_2 = $baris_2 . '
		<td>'.$det_KODE.'</td>
		<td>'.$det_SUHU.'</td>
		<td>'.$det_BERAT.'</td>
		<td>'.$det_SENS.'</td>
		';
	}

$baris_3 = '</tr>';	

$baris = $baris . $baris_1 . $baris_2 . $baris_3;

}			


$tbl .= <<<EOD


<table cellspacing="0" cellpadding="1" border="1">

<tr>
  <td>Batch</td>
  $v_batch
</tr>	
<tr>
  <td>Parameter</td>	
  $v_parameter
</tr>	
<tr>
  <td>Preparation</td>
  $v_prep
</tr>			
$baris 

</table>
EOD;

$pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------


//Close and output PDF document
$pdf->Output('lap_mincing.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+

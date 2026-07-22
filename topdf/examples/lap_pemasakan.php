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
$pdf->AddPage();

$pdf->Write(0, '', '', 0, 'L', true, 0, false, false, 0);

$pdf->SetFont('helvetica', '', 8);

// -----------------------------------------------------------------------------


$mr_id = $_GET['mr_id'];

$sql = "	SELECT  d.*
			FROM	masak_retort d 											
			WHERE	d.MR_ID = $mr_id								
			ORDER BY d.MR_ID	";
//echo $sql;			
$sql = mysqli_query($con,$sql);
while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
	$tanggal = $data["MR_DATE"];	
	$kodeprod = $data["MR_KOPROD"];	
}


$single_cal1 = konversi_tanggal("j M Y",$tanggal);

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
	<td class="atas2">FR-QC-10 <br></td>
  </tr>
  <tr>
  <td class="atas2">Revisi<br></td>
  <td class="atas2">1<br></td>
  </tr>
  <tr>
    
	<th class="atas" colspan="5" rowspan="2">PEMERIKSAAN PEMASAKAN <br>DENGAN RETORT CHAMBER </th>
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
  <table border="0" cell spacing="3">
  <tr>
  <th class="kolom1"> Hari/Tgl :</th> <th class="kolom1">'.$single_cal1.'</th> 
  </tr>
  
  </table>
  
<br><br>  
';



$sql = "	SELECT  d.*
			FROM	masak_retort d 											
			WHERE	MR_DATE= '$tanggal' and MR_KOPROD='$kodeprod'								
			ORDER BY d.MR_ID asc";
//echo $sql;		
$sql = mysqli_query($con,$sql);
while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
	$tanggal = $data["MR_DATE"];	
}


$sql = "	SELECT	d.*, e.P_NAME 
			FROM	masak_retort d
					LEFT JOIN produk e ON e.P_ID = d.MR_NMPRODUK
			WHERE	d.MR_DATE = '$tanggal' 
					and d.MR_KOPROD = '$kodeprod' 
			ORDER BY d.MR_ID asc";
//echo $sql;			
$sql = mysqli_query($con,$sql);
$jum_data = mysqli_num_rows($sql);
$urut = 0;
while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){

	$d_id = $data["MR_ID"];	
	$d_NMPRODUK = $data["P_NAME"];
	$d_NOCHAM = $data["MR_NOCHAM"];
	$d_KOPROD= $data["MR_KOPROD"];			
	$d_BPROD = $data["MR_BPROD"];
	$d_SUHU = $data["MR_SUHU"];
	$d_JMLTRAY = $data["MR_JMLTRAY"];

	$d_PER_TANGIN = $data["MR_PER_TANGIN"];
	$d_PER_TSTEAM = $data["MR_PER_TSTEAM"];
	$d_PER_TEKAIR = $data["MR_PER_TEKAIR"];

	$d_PEM_SUHU = $data["MR_PEM_SUHU"];
	$d_PEM_TEKANAN = $data["MR_PEM_TEKANAN"];
	$d_PEM_MULAI = $data["MR_PEM_MULAI"];
	$d_PEM_SELESAI = $data["MR_PEM_SELESAI"];

	$d_PEMANAS_SUHU = $data["MR_PEMANAS_SUHU"];
	$d_PEMANAS_TEKANAN = $data["MR_PEMANAS_TEKANAN"];
	$d_PEMANAS_MULAI = $data["MR_PEMANAS_MULAI"];
	$d_PEMANAS_AKHIR = $data["MR_PEMANAS_AKHIR"];

	$d_STE_SUHU = $data["MR_STE_SUHU"];
	$d_STE_THERMOMETER = $data["MR_STE_THERMOMETER"];
	$d_STE_TEKANAN = $data["MR_STE_TEKANAN"];
	$d_STE_MULAI = $data["MR_STE_MULAI"];
	$d_STE_SELESAI = $data["MR_STE_SELESAI"];

	$d_PAWAL_SUHU = $data["MR_PAWAL_SUHU"];
	$d_PAWAL_TEKANAN = $data["MR_PAWAL_TEKANAN"];
	$d_PAWAL_MULAI = $data["MR_PAWAL_MULAI"];
	$d_PAWAL_SELESAI = $data["MR_PAWAL_SELESAI"];

	$d_PEND_SUHU = $data["MR_PEND_SUHU"];
	$d_PEND_TEKANAN = $data["MR_PEND_TEKANAN"];
	$d_PEND_MULAI = $data["MR_PEND_MULAI"];
	$d_PEND_SELESAI = $data["MR_PEND_SELESAI"];

	$d_PAKHIR_SUHU = $data["MR_PAKHIR_SUHU"];
	$d_PAKHIR_TEKANAN = $data["MR_PAKHIR_TEKANAN"];
	$d_PAKHIR_AWAL = $data["MR_PAKHIR_AWAL"];
	$d_PAKHIR_AKHIR = $data["MR_PAKHIR_AKHIR"];

	$d_TWP_AWAL = $data["MR_TWP_AWAL"];
	$d_TWP_AKHIR = $data["MR_TWP_AKHIR"];

	$d_MR_HPEM_SUHU = $data["MR_HPEM_SUHU"];
	$d_MR_HPEM_PJG = $data["MR_HPEM_PJG"];
	$d_MR_HPEM_DIAMETER = $data["MR_HPEM_DIAMETER"];
	$d_MR_HPEM_RASA = $data["MR_HPEM_RASA"];
	$d_MR_HPEM_WARNA = $data["MR_HPEM_WARNA"];
	$d_MR_HPEM_AROMA = $data["MR_HPEM_AROMA"];
	$d_MR_HPEM_TEXTURE = $data["MR_HPEM_TEXTURE"];
	$d_MR_HPEM_SOBEK = $data["MR_HPEM_SOBEK"];

	$d_MR_TOTAL_REJECT = $data["MR_TOTAL_REJECT"];
	$d_MR_QC = $data["MR_QC"];

	$nmproduk[$urut] = $d_NMPRODUK;
	$nocham[$urut] = $d_NOCHAM;
	$koprod[$urut] = $d_KOPROD;
	$bprod[$urut] = $d_BPROD;
	$suhu[$urut] = $d_SUHU;
	$jmltray[$urut] = $d_JMLTRAY;

	$per_tangin[$urut] = $d_PER_TANGIN;
	$per_tsteam[$urut] = $d_PER_TSTEAM;
	$per_tekair[$urut] = $d_PER_TEKAIR;

	$pem_suhu[$urut] = $d_PEM_SUHU;
	$pem_tekanan[$urut] = $d_PEM_TEKANAN;
	$pem_mulai[$urut] = $d_PEM_MULAI;
	$pem_selesai[$urut] = $d_PEM_SELESAI;

	$pemanas_suhu[$urut] = $d_PEMANAS_SUHU;
	$pemanas_tekanan[$urut] = $d_PEMANAS_TEKANAN;
	$pemanas_mulai[$urut] = $d_PEMANAS_MULAI;
	$pemanas_akhir[$urut] = $d_PEMANAS_AKHIR;

	$ste_suhu[$urut] = $d_STE_SUHU;
	$ste_thermometer[$urut] = $d_STE_THERMOMETER;
	$ste_tekanan[$urut] = $d_STE_TEKANAN;
	$ste_mulai[$urut] = $d_STE_MULAI;
	$ste_selesai[$urut] = $d_STE_SELESAI;

	$pawal_suhu[$urut] = $d_PAWAL_SUHU;
	$pawal_tekanan[$urut] = $d_PAWAL_TEKANAN;
	$pawal_mulai[$urut] = $d_PAWAL_MULAI;
	$pawal_selesai[$urut] = $d_PAWAL_SELESAI;

	$pend_suhu[$urut] = $d_PEND_SUHU;
	$pend_tekanan[$urut] = $d_PEND_TEKANAN;
	$pend_mulai[$urut] = $d_PEND_MULAI;
	$pend_selesai[$urut] = $d_PEND_SELESAI;

	$pakhir_suhu[$urut] = $d_PAKHIR_SUHU;
	$pakhir_tekanan[$urut] = $d_PAKHIR_TEKANAN;
	$pakhir_awal[$urut] = $d_PAKHIR_AWAL;
	$pakhir_akhir[$urut] = $d_PAKHIR_AKHIR;
	
	$twp_awal[$urut] = $d_TWP_AWAL;
	$twp_akhir[$urut] = $d_TWP_AKHIR;

	$mr_hpem_suhu[$urut] = $d_MR_HPEM_SUHU;
	$mr_hpem_pjg[$urut] = $d_MR_HPEM_PJG;
	$mr_hpem_diameter[$urut] = $d_MR_HPEM_DIAMETER;
	$mr_hpem_rasa[$urut] = $d_MR_HPEM_RASA;
	$mr_hpem_warna[$urut] = $d_MR_HPEM_WARNA;
	$mr_hpem_aroma[$urut] = $d_MR_HPEM_AROMA;
	$mr_hpem_texture[$urut] = $d_MR_HPEM_TEXTURE;
	$mr_hpem_sobek[$urut] = $d_MR_HPEM_SOBEK;
	
	$mr_total_reject[$urut] = $d_MR_TOTAL_REJECT;
	$mr_qc[$urut] = $d_MR_QC;

	$urut++;

}	
	
	$jum_kolom_data = $urut;

	$v_nmproduk = "";
	$v_nocham = "";
	$v_koprod = "";
	$v_bprod = "";
	$v_suhu = "";
	$v_jmltray = "";

	$v_per_tangin = "";
	$v_per_tsteam = "";
	$v_per_tekair = "";

	$v_pem_suhu = "";
	$v_pem_tekanan = "";
	$v_pem_mulai = "";
	$v_pem_selesai = "";

	$v_pemanas_suhu = "";
	$v_pemanas_tekanan = "";
	$v_pemanas_mulai = "";
	$v_pemanas_akhir = "";

	$v_ste_suhu = "";
	$v_ste_thermometer = "";
	$v_ste_tekanan = "";
	$v_ste_mulai = "";
	$v_ste_selesai = "";

	$v_pawal_suhu = "";
	$v_pawal_tekanan = "";
	$v_pawal_mulai = "";
	$v_pawal_selesai = "";

	$v_pend_suhu = "";
	$v_pend_tekanan = "";
	$v_pend_mulai = "";
	$v_pend_selesai = "";

	$v_pakhir_suhu = "";
	$v_pakhir_tekanan = "";
	$v_pakhir_awal = "";
	$v_pakhir_akhir = "";

	$v_twp_awal = "";
	$v_twp_akhir = "";
	
	$v_mr_hpem_suhu = "";
	$v_mr_hpem_pjg = "";
	$v_mr_hpem_diameter = "";
	$v_mr_hpem_rasa = "";
	$v_mr_hpem_warna = "";
	$v_mr_hpem_aroma = "";
	$v_mr_hpem_texture = "";
	$v_mr_hpem_sobek = "";

	$v_mr_total_reject = "";
	$v_mr_qc = "";

	for($i=0;$i<$urut;$i++){

		$v_nmproduk = $v_nmproduk."<td>".$nmproduk[$i]."</td>";
		$v_nocham = $v_nocham."<td>".$nocham[$i]."</td>";
		$v_koprod = $v_koprod."<td>".$koprod[$i]."</td>";
		$v_bprod = $v_bprod."<td>".$bprod[$i]."</td>";
		$v_suhu = $v_suhu."<td>".$suhu[$i]."</td>";
		$v_jmltray = $v_jmltray."<td>".$jmltray[$i]."</td>";

		$v_per_tangin = $v_per_tangin."<td>".$per_tangin[$i]."</td>";
		$v_per_tsteam = $v_per_tsteam."<td>".$per_tsteam[$i]."</td>";
		$v_per_tekair = $v_per_tekair."<td>".$per_tekair[$i]."</td>";

		$v_pem_suhu = $v_pem_suhu."<td>".$pem_suhu[$i]."</td>";
		$v_pem_tekanan = $v_pem_tekanan."<td>".$pem_tekanan[$i]."</td>";
		$v_pem_mulai = $v_pem_mulai."<td>".$pem_mulai[$i]."</td>";
		$v_pem_selesai = $v_pem_selesai."<td>".$pem_selesai[$i]."</td>";

		$v_pemanas_suhu = $v_pemanas_suhu."<td>".$pemanas_suhu[$i]."</td>";
		$v_pemanas_tekanan = $v_pemanas_tekanan."<td>".$pemanas_tekanan[$i]."</td>";
		$v_pemanas_mulai = $v_pemanas_mulai."<td>".$pemanas_mulai[$i]."</td>";
		$v_pemanas_akhir = $v_pemanas_akhir."<td>".$pemanas_akhir[$i]."</td>";

		$v_ste_suhu = $v_ste_suhu."<td>".$ste_suhu[$i]."</td>";
		$v_ste_thermometer = $v_ste_thermometer."<td>".$ste_thermometer[$i]."</td>";
		$v_ste_tekanan = $v_ste_tekanan."<td>".$ste_tekanan[$i]."</td>";
		$v_ste_mulai = $v_ste_mulai."<td>".$ste_mulai[$i]."</td>";
		$v_ste_selesai = $v_stem_selesai."<td>".$ste_selesai[$i]."</td>";

		$v_pawal_suhu = $v_pawal_suhu."<td>".$pawal_suhu[$i]."</td>";
		$v_pawal_tekanan = $v_pawal_tekanan."<td>".$pawal_tekanan[$i]."</td>";
		$v_pawal_mulai = $v_pawal_mulai."<td>".$pawal_mulai[$i]."</td>";
		$v_pawal_selesai = $v_pawal_selesai."<td>".$pawal_selesai[$i]."</td>";
		
		$v_pend_suhu = $v_pend_suhu."<td>".$pend_suhu[$i]."</td>";
		$v_pend_tekanan = $v_pend_tekanan."<td>".$pend_tekanan[$i]."</td>";
		$v_pend_mulai = $v_pend_mulai."<td>".$pend_mulai[$i]."</td>";
		$v_pend_selesai = $v_pend_selesai."<td>".$pend_selesai[$i]."</td>";

		$v_pakhir_suhu = $v_pakhir_suhu."<td>".$pakhir_suhu[$i]."</td>";
		$v_pakhir_tekanan = $v_pakhir_tekanan."<td>".$pakhir_tekanan[$i]."</td>";
		$v_pakhir_awal = $v_pakhir_awal."<td>".$pakhir_awal[$i]."</td>";
		$v_pakhir_akhir = $v_pakhir_akhir."<td>".$pakhir_akhir[$i]."</td>";

		$v_twp_awal = $v_twp_awal."<td>".$twp_awal[$i]."</td>";
		$v_twp_akhir = $v_twp_akhir."<td>".$twp_akhir[$i]."</td>";

		$v_mr_hpem_suhu = $v_mr_hpem_suhu."<td>".$mr_hpem_suhu[$i]."</td>";
		$v_mr_hpem_pjg = $v_mr_hpem_pjg."<td>".$mr_hpem_pjg[$i]."</td>";
		$v_mr_hpem_diameter = $v_mr_hpem_diameter."<td>".$mr_hpem_diameter[$i]."</td>";
		$v_mr_hpem_rasa = $v_mr_hpem_rasa."<td>".$mr_hpem_rasa[$i]."</td>";
		$v_mr_hpem_warna = $v_mr_hpem_warna."<td>".$mr_hpem_warna[$i]."</td>";
		$v_mr_hpem_aroma = $v_mr_hpem_aroma."<td>".$mr_hpem_aroma[$i]."</td>";
		$v_mr_hpem_texture = $v_mr_hpem_texture."<td>".$mr_hpem_texture[$i]."</td>";
		$v_mr_hpem_sobek = $v_mr_hpem_sobek."<td>".$mr_hpem_sobek[$i]."</td>";

		$v_mr_total_reject = $v_mr_total_reject."<td>".$mr_total_reject[$i]."</td>";
		$v_mr_qc = $v_mr_qc."<td>".$mr_qc[$i]."</td>";
		
	}

$tbl .= <<<EOD


<table cellspacing="0" cellpadding="1" border="1">

<tr>
  <td bgcolor="#F0F8FF">IDENTIFIKASI</td>
  <td bgcolor="#F0F8FF" colspan="$jum_kolom_data"></td>
</tr>	
<tr>
  <td>Nama Produk</td>
  $v_nmproduk
</tr>	
<tr>
  <td>No.Chamber</td>	
  $v_nocham
</tr>	
<tr>
  <td>Kode Prod</td>
  $v_koprod
</tr>	
<tr>
  <td>Berat Produk</td>	
  $v_bprod
</tr>	
<tr>
  <td>Suhu Produk</td>	
  $v_suhu
</tr>
<tr>
  <td>Jumlah Tray</td>	
  $v_jmltray
</tr>
<tr>
  <td bgcolor="#F0F8FF">PERSIAPAN</td>
  <td bgcolor="#F0F8FF" colspan="$jum_kolom_data"></td>
</tr>	
<tr>
  <td>Tekanan Angin</td>	
  $v_per_tangin
</tr>	
<tr>
  <td>Tekanan Steam</td>	
  $v_per_tsteam
</tr>	
<tr>
  <td>Tekanan Air</td>	
  $v_per_tekair
</tr>
<tr>
  <td bgcolor="#F0F8FF">PEMANASAN AWAL</td>
  <td bgcolor="#F0F8FF" colspan="$jum_kolom_data"></td>
</tr>		
<tr>
  <td>Suhu Air</td>	
  $v_pem_suhu
</tr>	
<tr>
  <td>Tekanan</td>	
  $v_pem_tekanan
</tr>	
<tr>
  <td>Waktu Mulai</td>	
  $v_pem_mulai
</tr>	
<tr>
  <td>Waktu Selesai</td>	
  $v_pem_selesai
</tr>
<tr>
  <td bgcolor="#F0F8FF">PROSES PEMANASAN</td>
  <td bgcolor="#F0F8FF" colspan="$jum_kolom_data"></td>
</tr>		
<tr>
  <td>Suhu Air</td>	
  $v_pemanas_suhu
</tr>	
<tr>
  <td>Tekanan</td>	
  $v_pemanas_tekanan
</tr>	
<tr>
  <td>Waktu Mulai</td>	
  $v_pemanas_mulai
</tr>	
<tr>
  <td>Waktu Selesai</td>	
  $v_pemanas_akhir
</tr>
<tr>
  <td bgcolor="#F0F8FF">STERILISASI</td>
  <td bgcolor="#F0F8FF" colspan="$jum_kolom_data"></td>
</tr>		
<tr>
  <td>Suhu Air</td>	
  $v_ste_suhu
</tr>	
<tr>
  <td>Termometer Retort</td>	
  $v_ste_thermometer
</tr>	
<tr>
  <td>Tekanan</td>	
  $v_ste_tekanan
</tr>	
<tr>
  <td>Waktu Mulai</td>	
  $v_ste_mulai
</tr>	
<tr>
  <td>Waktu Selesai</td>	
  $v_ste_selesai
</tr>
<tr>
  <td bgcolor="#F0F8FF">PENDINGINAN AWAL</td>
  <td bgcolor="#F0F8FF" colspan="$jum_kolom_data"></td>
</tr>		
<tr>
  <td>Suhu Air</td>	
  $v_pawal_suhu
</tr>
<tr>
  <td>Tekanan</td>	
  $v_pawal_tekanan
</tr>	
<tr>
  <td>Waktu Mulai</td>	
  $v_pawal_mulai
</tr>	
<tr>
  <td>Waktu Selesai</td>	
  $v_pawal_selesai
</tr>
<tr>
  <td bgcolor="#F0F8FF">PENDINGINAN</td>
  <td bgcolor="#F0F8FF" colspan="$jum_kolom_data"></td>
</tr>			
<tr>
  <td>Suhu Air</td>	
  $v_pend_suhu
</tr>
<tr>
  <td>Tekanan</td>	
  $v_pend_tekanan
</tr>	
<tr>
  <td>Waktu Mulai</td>	
  $v_pend_mulai
</tr>	
<tr>
  <td>Waktu Selesai</td>	
  $v_pend_selesai
</tr>
<tr>
  <td bgcolor="#F0F8FF">PROSES AKHIR</td>
  <td bgcolor="#F0F8FF" colspan="$jum_kolom_data"></td>
</tr>			
<tr>
  <td>Suhu Air</td>	
  $v_pakhir_suhu
</tr>
<tr>
  <td>Tekanan</td>	
  $v_pakhir_tekanan
</tr>	
<tr>
  <td>Waktu Mulai</td>	
  $v_pakhir_awal
</tr>	
<tr>
  <td>Waktu Selesai</td>	
  $v_pakhir_akhir
</tr>
<tr>
  <td bgcolor="#F0F8FF">TOTAL WAKTU PROSES</td>
  <td bgcolor="#F0F8FF" colspan="$jum_kolom_data"></td>
</tr>		
<tr>
  <td>Waktu Mulai</td>	
  $v_twp_awal
</tr>		
<tr>
  <td>Waktu Selesai</td>	
  $v_twp_akhir
</tr>	
<tr>
  <td bgcolor="#F0F8FF">HASIL PEMASAKAN</td>
  <td bgcolor="#F0F8FF" colspan="$jum_kolom_data"></td>
</tr>		
<tr>
  <td>Suhu Produk Akhir</td>	
  $v_mr_hpem_suhu 
</tr>			
<tr>
  <td>Panjang</td>	
  $v_mr_hpem_pjg
</tr>				
<tr>
  <td>Diameter</td>	
  $v_mr_hpem_diameter
</tr>				
<tr>
  <td>Rasa</td>	
  $v_mr_hpem_rasa
</tr>				
<tr>
  <td>Warna</td>	
  $v_mr_hpem_warna
</tr>				
<tr>
  <td>Aroma</td>	
  $v_mr_hpem_aroma
</tr>				
<tr>
  <td>Texture</td>	
  $v_mr_hpem_texture
</tr>					
<tr>
  <td>Sobek Seal</td>	
  $v_mr_hpem_sobek
</tr>				
<tr>
  <td bgcolor="#F0F8FF">TOTAL REJECT</td>	
  $v_mr_total_reject
</tr>				

</table>
<br><br><br><br><br><br><br>
<table width="100%">
<tr>
<td align="right">Disetujui oleh,<br><br><br></td>
</tr>
<tr>
<td align="right"><u>Purwoko</u></td>
</tr>
<tr>
<td align="right">QC SPV</td>
</tr>


</table>
EOD;

$pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------


//Close and output PDF document
$pdf->Output('lap_pemasakan.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+

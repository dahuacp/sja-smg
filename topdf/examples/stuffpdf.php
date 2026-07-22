<?php
//============================================================+
// File name   : example_021.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 021 for TCPDF class
//               WriteHTML text flow
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
 * @abstract TCPDF - Example: WriteHTML text flow.
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');
require_once"koneksi.php";			
//include "indonesia.php";
error_reporting(E_ALL ^(E_NOTICE|E_WARNING) ); 

class MYPDF extends TCPDF {

	//Page header
	public function Header() {
		// Logo
		//$image_file = K_PATH_IMAGES.'LogoJawaTimur.jpg';
		//$this->Image($image_file, 90, 10, 30, '', 'JPG', '', 'T', false, 200, '', false, false, 0, false, false, false);
		// Set font
		$this->SetFont('helvetica', 'B', 20);
		// Title
		//$this->Cell(0, 15, '<< TCPDF Example 003 >>', 0, false, 'C', 0, '', 0, false, 'M', 'M');
	}

	// Page footer
	public function Footer() {
		// Position at 15 mm from bottom
		$this->SetY(-15);
		// Set font
		$this->SetFont('helvetica', 'I', 8);
		// Page number
		$this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
	}
}

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


// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('FORM STUFFING SOSIS');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 021', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
//$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP-15, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$pdf->setPrintFooter(false);
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
$pdf->SetFont('helvetica', '', 11);

// add a page
$pdf->AddPage('L', 'F4');

/*
$txt = <<<EOD



PERJANJIAN KINERJA TAHUN $perkin_tahun

Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.
EOD;

// print a block of text using Write()
$pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);

*/

// create some HTML content
include "koneksi.php";



$tanggal = $_GET['tanggal'];
$mesin = $_GET['mesin'];

$sql = "SELECT a.*,DATE_FORMAT(a.ST_date, '%m/%d/%Y') AS ST_DATE_NEW,DATE_FORMAT(a.ST_bb, '%m/%d/%Y') AS ST_BB_NEW  
from stuffer a
where a.ST_DATE= '$tanggal' and a.ST_kdmesin='$mesin'";
//echo $sql;
$sql = mysqli_query($con,$sql);

while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC))
{
    $date_awal = $data["ST_DATE_NEW"];
	$date_akhir = $data["ST_BB_NEW"];
	$ST_nmproduk= $data["ST_nmproduk"];
	$ST_kdmesin= $data["ST_kdmesin"];
	$ST_kodebatch= $data["ST_kodebatch"];
	$ST_waktusampling= $data["ST_waktusampling"];
	$ST_suhuadonan= $data["ST_suhuadonan"];
	$ST_sensori= $data["ST_sensori"];
	$ST_kcptstuffing= $data["ST_kcptstuffing"];
	$ST_panjang= $data["ST_panjang"];
	$ST_berat= $data["ST_berat"];
	$ST_cekvacuum= $data["ST_cekvacuum"];
	$ST_kebersihanseal= $data["ST_kebersihanseal"];
	$ST_kekuatanseal= $data["ST_kekuatanseal"];
	$ST_diameter= $data["ST_diameter"];
	$ST_printkode= $data["ST_printkode"];
	$ST_lebar= $data["ST_lebar"];
	$ST_ttdqc= $data["ST_ttdqc"];
	$ST_ttdprod= $data["ST_ttdprod"];
	$ST_ket =$data["ST_ket"];

	
}
$single_cal1 = konversi_tanggal("j M Y",$date_awal);
$single_cal2 = konversi_tanggal("j M Y",$date_akhir);
// set border width
$pdf->SetLineWidth(0.0);

// set color for cell border
$pdf->SetDrawColor(0,0,0);

$html = '
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
	<td class="atas2">FR-QC-09 <br></td>
  </tr>
  <tr>
  <td class="atas2">Revisi<br></td>
  <td class="atas2">1<br></td>
  </tr>
  <tr>
    
	<th class="atas" colspan="5" rowspan="2">PEMERIKSAAN STUFFING SOSIS RETORT</th>
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
  <th class="kolom1"> Nama Produk : </th><th class="kolom1">'.$ST_nmproduk.'</th>
  </tr>
  <tr>
  <th class="kolom1"> Kode Mesin : </th><th class="kolom1">'.$ST_kdmesin.'</th>
  <th class="kolom1"> Exp. Date : </th><th class="kolom1">'.$single_cal2.'</th>
  </tr>
  
  </table>
  
<br><br>  
';


$html .= <<<EOD
<table border ="1" width ="100%" cellpadding="2" class="tg">
	<tr>
	<td colspan="2">&nbsp;</td>
	<td align="center" colspan="2">PARAMETER ADONAN</td>
	 <td align="center" colspan="9">PARAMETER STUFFING</td>
	 <td align="center" colspan="2">Paraf</td>
	 <td align="center">Catatan </td>
	</tr>
	<tr>
	    <td align="center">No</td>
    	<td align="center" >Kode Batch</td>
		<td align="center" >Waktu Samping</td>
		<td align="center">Suhu</td>
		<td align="center">Sensori</td>
		<td align="center">Kecepatan Stuffing</td>
		<td align="center">Panjang per piece</td>
		<td align="center">Cek Vacuum</td>
		<td align="center">Kebersihan ujung seal</td>
		<td align="center">Kekuatan Seal</td>
		<td align="center">Diameter Klip</td>
		<td align="center">Print Kode Produksi</td>
		<td align="center">Lebar Casing</td>
		<td align="center">QC</td>
		<td align="center">Prod</td>
        <td align="center">Catatan</td>
	</tr>
	

EOD;

$sql = "SELECT a.*,DATE_FORMAT(a.ST_date, '%m/%d/%Y') AS ST_DATE_NEW,DATE_FORMAT(a.ST_bb, '%m/%d/%Y') AS ST_BB_NEW  
from stuffer a
where a.ST_DATE= '$tanggal' and a.ST_kdmesin='$mesin'";
//echo $sql;
$sql = mysqli_query($con,$sql);
$urut = 0;
while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC))
{
	$urut++;
    $date_awal = $data["ST_DATE_NEW"];
	$date_akhir = $data["ST_BB_NEW"];
	$ST_nmproduk= $data["ST_nmproduk"];
	$ST_kdmesin= $data["ST_kdmesin"];
	$ST_kodebatch= $data["ST_kodebatch"];
	$ST_waktusampling= $data["ST_waktusampling"];
	$ST_suhuadonan= $data["ST_suhuadonan"];
	$ST_sensori= $data["ST_sensori"];
	$ST_kcptstuffing= $data["ST_kcptstuffing"];
	$ST_panjang= $data["ST_panjang"];
	$ST_berat= $data["ST_berat"];
	$ST_cekvacuum= $data["ST_cekvacuum"];
	$ST_kebersihanseal= $data["ST_kebersihanseal"];
	$ST_kekuatanseal= $data["ST_kekuatanseal"];
	$ST_diameter= $data["ST_diameter"];
	$ST_printkode= $data["ST_printkode"];
	$ST_lebar= $data["ST_lebar"];
	$ST_ttdqc= $data["ST_ttdqc"];
	$ST_ttdprod= $data["ST_ttdprod"];
	$ST_ket =$data["ST_ket"];


$html .= <<<EOD
	<tr>
    <td align="center">$urut</td>
    	<td align="center">$ST_kodebatch</td>
		<td align="left">$ST_waktusampling</td>
		<td align="left">$ST_suhuadonan</td>
		<td align="left">$ST_sensori</td>
		<td align="left">$ST_kcptstuffing</td>
		<td align="left">$ST_panjang</td>
		<td align="left">$ST_berat</td>
		<td align="left">$ST_cekvacuum</td>
		<td align="left">$ST_kebersihanseal</td>
		<td align="left">$ST_diameter</td>
		<td align="left">$ST_printkode</td>
		<td align="left">$ST_lebar</td>
		<td align="left">$ST_ttdqc</td>
		<td align="left">$ST_ttdprod</td>
		<td align="left">$ST_ket</td>
	</tr>
EOD;

	
}

$html .= <<<EOD
</table>
<br><br><br>

EOD;







// reset pointer to the last page
$pdf->lastPage();
$html .= <<<EOD
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
// output the HTML content
$pdf->writeHTML($html, true, 0, true, 0);

// ---------------------------------------------------------

//Close and output PDF document
$nama="Stuffing".$id_nie.".pdf";
$pdf->Output($nama, 'I');

//============================================================+
// END OF FILE
//============================================================+

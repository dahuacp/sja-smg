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



$SH_id = $_GET['mr_id'];

$sql = "SELECT a.*,DATE_FORMAT(a.SH_TGL, '%m/%d/%Y') AS PE_DATE_NEW 
from suhu a
where a.SH_ID= '$SH_id' ";
//echo $sql;
$sql = mysqli_query($con,$sql);

while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC))
{
    $d_jam=$data["SH_PUKUL"];
              $d_tgl = $data["PE_DATE_NEW"];
              $tanggal= $data["SH_TGL"];
              $d_cs = $data["SH_CS"];
              $d_SH_RAWM1 = $data["SH_RAWM1"];
              $d_CR= $data["SH_CR"];      
              $d_SH_RAWM2 = $data["SH_RAWM2"];
              $d_MP = $data["SH_MP"];     
              $SH_KET1 =$data["SH_KET1"];
              $SH_HOPPER =$data["SH_HOPPER"];
              $SH_KET2 =$data["SH_KET2"];
              $SH_RETORT=$data["SH_RETORT"];
              $SH_KET3=$data["SH_KET3"];
              $SH_SUSUN =$data["SH_SUSUN"];
              $SH_KET4 =$data["SH_KET4"];
              $SH_DRYING =$data["SH_DRYING"];
              $SH_RHDRYING=$data["SH_RHDRYING"];
              $SH_KET5 = $data["SH_KET5"];
              $dSH_PROD= $data["SH_PROD"];
              $dSH_ENG= $data["SH_ENG"];
              $d_QC = $data["SH_QC"];   
              $d_APPROV = $data["SH_APPROV"];

	
}
$single_cal1 = konversi_tanggal("j M Y",$d_tgl);

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
  <td class="atas2">2<br></td>
  </tr>
  <tr>
    
	<th class="atas" colspan="5" rowspan="2">PEMANTAUAN SUHU RUANG</th>
	<th class="atas2">Tanggal Efektif <br></th>
	<th class="atas2">03-01-2016 <br></th>
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
  <th class="kolom1"> Hari/Tgl :</th> <th class="kolom1" align="left">'.$single_cal1.'</th> 
  
  </tr>
  
  </table>
  
<br><br>  
';


$html .= <<<EOD
<table border ="1" width ="100%" cellpadding="2" class="tg">
	<tr>
	    <td rowspan="2" align="center">No</td>
    	<td rowspan="2" align="center" >Pukul</td>
		<td colspan="13" align="center" >Actual Suhu Ruang</td>
		<td rowspan="2" align="center">RH<br>Drying</td>
		<td rowspan="2" align="center">Keterangan</td>
        <td colspan="3" align="center">Paraf</td>
	</tr>
	<tr>
	    <td align="center">CS</td>
    	<td align="center" >Suhu Raw <br>Meat</td>
		<td align="center" >CR</td>
		<td align="center">Suhu Raw<br>Meat</td>
		<td align="center">MP</td>
		<td align="center">Keterangan</td>
		<td align="center">Hopper</td>
		<td align="center">Keterangan</td>
		<td align="center">Retort</td>
		<td align="center">Keterangan</td>
		<td align="center">Susun</td>
		<td align="center">Keterangan</td>
		<td align="center">Drying</td>
		<td align="center">QC</td>
		<td align="center">PROD</td>
		<td align="center">ENG</td>
		
	</tr>
	

EOD;

$sql = "SELECT a.* 
from suhu a
where a.SH_TGL= '$tanggal' and a.SH_IS_DELETE=0";
//echo $sql;
$sql = mysqli_query($con,$sql);
$urut = 0;
while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC))
{
	$urut++;
    $dSH_ID =$data["SH_ID"];
  $dSH_TGL=$data["SH_TGL"];
  $dSH_PUKUL=$data["SH_PUKUL"];
  $dSH_CS=$data["SH_CS"];
  $dSH_RAWM1=$data["SH_RAWM1"];
  $dSH_CR=$data["SH_CR"];
  $dSH_RAWM2=$data["SH_RAWM2"];
  $dSH_MP=$data["SH_MP"];
  $dSH_KET1=$data["SH_KET1"];
  $dSH_HOPPER=$data["SH_HOPPER"];
  $dSH_KET2=$data["SH_KET2"];
  $dSH_RETORT=$data["SH_RETORT"];
  $dSH_KET3=$data["SH_KET3"];
  $dSH_SUSUN=$data["SH_SUSUN"];
  $dSH_KET4=$data["SH_KET4"];
  $dSH_DRYING=$data["SH_DRYING"];
  $dSH_RHDRYING=$data["SH_RHDRYING"];
  $dSH_KET5=$data["SH_KET5"];
  $dSH_QC=$data["SH_QC"];
  $dSH_PROD=$data["SH_PROD"];
  $dSH_ENG=$data["SH_ENG"];
  

$html .= <<<EOD
	<tr>
    <td align="center">$urut</td>
    	<td align="center">$dSH_PUKUL</td>
		<td align="center">$dSH_CS</td>
		<td align="center">$dSH_RAWM1</td>
		<td align="center">$dSH_CR</td>
		<td align="center">$dSH_RAWM2</td>
		<td align="center">$dSH_MP</td>
		<td align="center">$dSH_KET1</td>
		<td align="center">$dSH_HOPPER</td>
		<td align="center">$dSH_KET2</td>
		<td align="center">$dSH_RETORT</td>
		<td align="center">$dSH_KET3</td>
		<td align="center">$dSH_SUSUN</td>
		<td align="center">$dSH_KET4</td>
		<td align="center">$dSH_DRYING</td>
		<td align="center">$dSH_RHDRYING</td>
		<td align="center">$dSH_KET5</td>
		<td align="center">$dSH_QC</td>
		<td align="center">$dSH_PROD</td>
		<td align="center">$dSH_ENG</td>


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
$nama="Stuffing".$id_ne.".pdf";
$pdf->Output($nama, 'I');

//============================================================+
// END OF FILE
//============================================================+

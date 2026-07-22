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
$pdf->SetTitle('LAPORAN  PERJANJIAN KINERJA');
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

$id_ne = $_GET['perkin'];
$id_ne= "2019-10-21";

$sql = "SELECT top 1 a.*,DATE_FORMAT(a.ST_date, '%m/%d/%Y') AS ST_DATE_NEW,DATE_FORMAT(a.ST_bb, '%m/%d/%Y') AS ST_BB_NEW  
from stuffer a
where a.ST_date= '$id_ne' limit 1";
echo $sql;
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
//$single_cal1 = konversi_tanggal("j M Y",$single_cal12);
$html .= <<<EOD
<tr>
                          <td align="left">$urut</td>	
						  <td align="left">$d_program</td>
						  <td align="left">Rp.$d_view_anggaran</td>
						  <td align="left">$d_ket</td>
                        </tr>
						

EOD;




while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
$urut++;
$d_id=$data["PR_ID"];	
$d_program=$data["PR_NAME"];
$d_anggaran=$data["PR_ANGGARAN"];
$d_view_anggaran=number_format($d_anggaran,0,',','.');
$d_ket=$data["PR_KET"];				
$d_de_pe_pr_id = $data["DE_PE_PR_ID"];	

$html .= <<<EOD
<tr>
                          <td align="left">$urut</td>	
						  <td align="left">$d_program</td>
						  <td align="left">Rp.$d_view_anggaran</td>
						  <td align="left">$d_ket</td>
                        </tr>
						

EOD;

								}



// output the HTML content
$pdf->writeHTML($html, true, 0, true, 0);



// reset pointer to the last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
$nama="FormStuffer".$id_ne."pdf";
$pdf->Output($nama, 'I');

//============================================================+
// END OF FILE
//============================================================+

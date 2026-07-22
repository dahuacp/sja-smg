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
$pdf->AddPage('P', 'F4');

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

$id_perkin = $_GET['perkin'];

//$sql = "SELECT pk.PG_NIK, DATE_FORMAT(pk.PE_DATE, '%d %M %Y') AS PE_DATE_NEW, DATE_FORMAT(pk.PE_DATE, '%Y') AS TAHUN FROM perjanjian_kinerja pk WHERE pk.PE_ID = '$id_perkin' ";
$sql = "SELECT pk.PG_NIK, pk.PE_DATE AS PE_DATE_NEW, DATE_FORMAT(pk.PE_DATE, '%Y') AS TAHUN FROM perjanjian_kinerja pk WHERE pk.PE_ID = '$id_perkin' ";
//echo $sql;
$sql = mysqli_query($con,$sql);

while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC))
{
    $single_cal12 = $data["PE_DATE_NEW"];
	//$single_cal1=konversi_tanggal("D, j M Y",'$single_cal12');
	$id_pihak_pertama = $data["PG_NIK"];
	$perkin_tahun = $data["TAHUN"];
}
$single_cal1 = konversi_tanggal("j M Y",$single_cal12);


$sql = "SELECT p.PG_NAME, p.D_ID, p.J_ID, p.P_ID, p.PG_ATSAN FROM pegawai p WHERE p.PG_NIK = '$id_pihak_pertama' ";
//echo $sql;			
$sql = mysqli_query($con,$sql);
while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC))
{
    $nama_pihak_pertama = $data["PG_NAME"];
	$id_atasan = $data["PG_ATSAN"];
	$id_departemen = $data["D_ID"];
	$id_jabatan_pihak_pertama = $data["J_ID"];
	$id_pangkat_pihak_pertama = $data["P_ID"];
}	

$sql = "SELECT p.PG_NAME, p.J_ID, p.P_ID FROM pegawai p WHERE p.PG_NIK = '$id_atasan'";
//echo $sql;			
$sql = mysqli_query($con,$sql);
while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC))
{
    $nama_atasan = $data["PG_NAME"];
	$id_jabatan_atasan = $data["J_ID"];
	$id_pangkat_atasan = $data["P_ID"];
}	

$sql = "SELECT p.D_NAME FROM departemen p WHERE p.D_ID = '$id_departemen'";
//echo $sql;			
$sql = mysqli_query($con,$sql);
while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC))
{
    $nama_departemen = strtoupper($data["D_NAME"]);
}
//jika nama departemen merupakan departemen induk maka tidak ditampilkan
if($id_departemen==6)
{

  $nama_departemen="";
}
else
{
$nama_departemen=$nama_departemen."<br>";

}
$sql = "SELECT p.J_NAME FROM jabatan p WHERE p.J_ID = '$id_jabatan_pihak_pertama'";
//echo $sql;
$sql = mysqli_query($con,$sql);
while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC))
{
    $nama_jabatan_pihak_pertama = $data["J_NAME"];
}	
								
$sql = "SELECT p.J_NAME FROM jabatan p WHERE p.J_ID = '$id_jabatan_atasan'";
//echo $sql;			
$sql = mysqli_query($con,$sql);
while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC))
{
    $nama_jabatan_atasan = $data["J_NAME"];
}	

$sql = "SELECT p.P_NAME FROM pangkat p WHERE p.P_ID = '$id_pangkat_pihak_pertama'";
//echo $sql;			
$sql = mysqli_query($con,$sql);
while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC))
{
    $nama_pangkat_pihak_pertama = $data["P_NAME"];
}	
								
$sql = "SELECT p.P_NAME FROM pangkat p WHERE p.P_ID = '$id_pangkat_atasan'";
//echo $sql;			
$sql = mysqli_query($con,$sql);
while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC))
{
    $nama_pangkat_atasan = $data["P_NAME"];
}	

//jika nip atasan = 123 maka hilangkan
if($id_atasan="123")
{
$id_atasan="";
}
else
{
$id_atasan="NIP".$id_atasan;
}


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
    .tg .kolom1{font-size:15px;font-family:Arial, Helvetica, sans-serif !important;;vertical-align:top}
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
    
	<th class="atas" colspan="5" rowspan="2">PEMERIKSAAN MINCING - EMULSFYING - AGING</th>
	<th class="atas2">Tanggal Efektif <br></th>
	<th class="atas2">FR-QC-08 <br></th>
  </tr>
  <tr>
  <th class="atas2"> Halaman <br></th>
  <th class="atas2"> 1 dari 1 <br></th>
  </tr>
  <br>
  
  <tr>
    <td class="isidokumen" colspan="5">Dalam rangka mewujudkan manajemen pemerintahan yang efektif, transparan, akuntabel serta berorientasi pada hasil, yang bertanda tangan di bawah ini :</td>
  </tr>
  <tr>
    <td class="kolom1" width="15%">Nama</td>
    <td class="titikdua" width="5%">:</td>
    <td class="namajabatan" width="80%"colspan="3">'.$nama_pihak_pertama.'</td>
  </tr>
  <tr>
    <td class="kolom1">Jabatan</td>
    <td class="titikdua">:</td>
    <td class="namajabatan" colspan="3">'.$nama_jabatan_pihak_pertama.'</td>
  </tr>
  <tr>
    <td class="isidokumen" colspan="5">Selanjutnya disebut pihak pertama</td>
  </tr>
  <tr>
    <td class="kolom1">Nama</td>
    <td class="titikdua">:</td>
    <td class="namajabatan" colspan="3">'.$nama_atasan.'</td>
  </tr>
  <tr>
    <td class="kolom1">Jabatan</td>
    <td class="titikdua">:</td>
    <td class="namajabatan" colspan="3">'.$nama_jabatan_atasan.'</td>
  </tr>
  <tr>
    <td class="isidokumen" colspan="5">Selaku atasan pihak pertama, selanjutnya disebut pihak kedua.<br></td>
  </tr>
  <tr>
    <td class="isidokumen" colspan="5">Pihak pertama berjanji akan mewujudkan target kinerja yang seharusnya sesuai lampiran perjanjian ini, dalam rangka mencapai target kinerja jangka menengah seperti yang telah ditetapkan dalam dokumen perencanaan. Keberhasilan dan kegagalan pencapaian target kinerja tersebut menjadi tanggung jawab kami.</td>
  </tr>
  <tr>
    <td class="isidokumen" colspan="5">Pihak kedua akan melakukan supervisi yang diperlukan serta akan melakukan evaluasi terhadap capaian kinerja dari perjanjian ini dan mengambil tindakan yang diperlukan dalam rangka pemberian penghargaan dan sanksi.</td>
  </tr>
  <tr>
    <td><br><br><br><br>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
  <tr>
    <td class="tandatangan" colspan="4">&nbsp;</td>
    <td class="tandatangan">Surabaya, '.$single_cal1.'</td>
  </tr>
  <tr>
    <td class="tandatangan" colspan="4">Pihak Kedua<br><b>'.$nama_jabatan_atasan.'</b></td>
    <td class="tandatangan">Pihak Pertama<br><b>'.$nama_jabatan_pihak_pertama.'</b></td>
  </tr>
  <tr>
    <td class="tandatangan" colspan="4">&nbsp;</td>
    <td class="tandatangan">&nbsp;</td>
  </tr>
  <tr>
    <td class="tandatangan" colspan="4"><b><u>'.$nama_atasan.'</u></b><br>'.$nama_pangkat_atasan.'<br>'.$id_atasan.'</td>
    <td class="tandatangan"><b><u>'.$nama_pihak_pertama.'</u></b><br>'.$nama_pangkat_pihak_pertama.'<br>NIP. '.$id_pihak_pertama.'</td>
  </tr>
</table>


';

// output the HTML content
$pdf->writeHTML($html, true, 0, true, 0);

// add a page
$pdf->AddPage('P', 'F4');
// set border width
$pdf->SetLineWidth(3);

// set color for cell border
$pdf->SetDrawColor(0,128,255);
$html = <<<EOD
<p align="center" size="18"> <b>
PERJANJIAN KINERJA TAHUN $perkin_tahun<br>$nama_departemenDINAS TENAGA KERJA DAN TRANSMIGRASI<br>PROVINSI JAWA TIMUR<br><br></b>
</p>
EOD;
$html .= <<<EOD
<table border ="1" width ="100%" cellpadding="2">
	<tr>
    <td align="center" width="5%" rowspan="2">No</td>
		<td align="center" width="25%" rowspan="2">Sasaran</td>
		<td align="center" width="30%" rowspan="2">Indikator Kinerja Utama</td>
		<td align="center" width="30%" rowspan="2">Penjelasan/Formulasi Perhitungan</td>
		<td align="center" width="10%"rowspan="2">Target</td>
	</tr>
	<tr>
	    
	</tr>

EOD;
$urut = 0;
$sql = "SELECT	i.*, s.SA_STRATEGIS, pk.DE_PE_SA_ID
		FROM 	detil_perjanjian_kinerja_sasaran pk
				LEFT JOIN indikator i ON i.SA_ID = pk.SA_ID 
				LEFT JOIN sasaran s ON s.SA_ID = i.SA_ID 
		WHERE 	pk.PE_ID = '$id_perkin' 
				AND pk.DE_PE_SA_IS_DELETE = 0
				ORDER BY i.SA_ID, i.IN_ID";							

//echo $sql;			
$sql = mysqli_query($con,$sql);
$d_sa_old = "";
$tabel_sasaran_isi = "";
while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
	$urut++;
	$d_id = $data["IN_ID"];								
    $d_sa_id = $data["SA_ID"];
	$d_sa = $data["SA_STRATEGIS"];
	$d_kinerja = $data["IN_KINERJA"];
	$d_penjelasan = $data["IN_PENJELASAN"];
	$d_sumberdt = $data["IN_SUMBERDT"];						
	$d_de_pe_sa_id = $data["DE_PE_SA_ID"];
	$d_in_target = $data["IN_TARGET"];
	$d_in_tw1 = $data["IN_TARGET_TW1"];
	$d_in_tw2 = $data["IN_TARGET_TW2"];
	$d_in_tw3 = $data["IN_TARGET_TW3"];
	if($d_sa_old!=$d_sa){
		$d_sa_old = $d_sa;
		$d_sa_view = $d_sa;
		$nomor++;
		$nomor_view = $nomor;
	}else{
		$d_sa_view = "";
		$nomor_view = "";
	}
	
$html .= <<<EOD
<tr>
    <td>$nomor_view</td>	
	<td width=10%>$d_sa_view</td>
	<td width=30%>$d_kinerja</td>
	<td>$d_penjelasan</td>
	<td>$d_in_target</td>
	
</tr>

EOD;

	
	
									}	
$html .= <<<EOD
</table> 
<br>
<br><br><br>

<table border="0" width="100%" cellspacing="3">
	<tr>
		<th width="5%"><b>No</b></th>
		<th width="40%"><b>Program</b></th>
		<th width="20%"><b>Anggaran</b></th>
		<th width="35%"><b>Keterangan</b></th>
	</tr>

EOD;
$urut = 0;									
$sql = "SELECT	i.*, pk.DE_PE_PR_ID
		FROM 	detil_perjanjian_kinerja_program pk
				LEFT JOIN program i ON i.PR_ID = pk.PR_ID 
		WHERE 	pk.PE_ID = '$id_perkin' 
				AND pk.DE_PE_PR_IS_DELETE = 0
		ORDER BY i.PR_ID ";						
//echo $sql;			
$sql = mysqli_query($con,$sql);
$jumlah_prog=0;
$tabel_program_isi = "";
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

$jumlah_prog+=$d_anggaran;

									}

$d_view_jmlanggaran=number_format($jumlah_prog,0,',','.');
$html .= <<<EOD
						<tr>
						<td><br></td>
						</tr>
						<tr>
                          <td align="left"></td>	
						  <td align="left">Jumlah</td>
						  <td align="left">_______________</td>
						  <td align="left">+</td>
                        </tr>
						<tr>
                          <td align="left"></td>	
						  <td align="left"></td>
						  <td align="left">Rp.$d_view_jmlanggaran</td>
						  <td align="left"></td>
                        </tr>
</table>
EOD;

// output the HTML content
$pdf->writeHTML($html, true, 0, true, 0);


$html = '
    <style type="text/css">
    
    .tg {width:100%; border-spacing:0;}
    .tg th{font-family:Arial, sans-serif;font-size:18px;padding:10px;overflow:hidden;word-break:normal;}
    .tg td{font-family:Arial, sans-serif;font-size:15px;padding:6px;overflow:hidden;word-break:normal;}
    .tg .atas{font-weight:bold;font-size:18px;font-family:Arial, Helvetica, sans-serif !important;;text-align:center;vertical-align:top}
    .tg .kolom1{font-size:15px;font-family:Arial, Helvetica, sans-serif !important;;vertical-align:top}
    .tg .titikdua{font-size:15px;font-family:Arial, Helvetica, sans-serif !important;;vertical-align:top}
    .tg .namajabatan{font-weight:bold;font-size:15px;font-family:Arial, Helvetica, sans-serif !important;;vertical-align:top}
    .tg .isidokumen{font-size:15px;text-align:justify;font-family:Arial, Helvetica, sans-serif !important;;vertical-align:top}
    .tg .tandatangan{width:50%; font-size:15px;font-family:Arial, Helvetica, sans-serif !important;;text-align:center;vertical-align:top}
    </style>

<table class="tg" border=0 cellspacing="10">
  <tr>
    <td class="kolom1"></td>
    <td class="titikdua"></td>
    <td class="namajabatan" colspan="3"></td>
  </tr>
  <tr>
    <td class="isidokumen" colspan="5"></td>
  </tr>
  <tr>
    <td class="kolom1"></td>
    <td class="titikdua"></td>
    <td class="namajabatan" colspan="3"></td>
  </tr>
    <tr>
    <td class="isidokumen" colspan="5"></td>
  </tr>
  <tr>
    <td class="tandatangan" colspan="4">&nbsp;</td>
    <td class="tandatangan">Surabaya, '.$single_cal1.'</td>
  </tr>
  <tr>
    <td class="tandatangan" colspan="4">Pihak Kedua<br><b>'.$nama_jabatan_atasan.'</b></td>
    <td class="tandatangan">Pihak Pertama<br><b>'.$nama_jabatan_pihak_pertama.'</b></td>
  </tr>
  <tr>
    <td class="tandatangan" colspan="4">&nbsp;</td>
    <td class="tandatangan">&nbsp;</td>
  </tr>
  <tr>
    <td class="tandatangan" colspan="4"><b><u>'.$nama_atasan.'</u></b><br>'.$nama_pangkat_atasan.'<br>'.$id_atasan.'</td>
    <td class="tandatangan"><b><u>'.$nama_pihak_pertama.'</u></b><br>'.$nama_pangkat_pihak_pertama.'<br>NIP. '.$id_pihak_pertama.'</td>
  </tr>
</table>


';

// output the HTML content
$pdf->writeHTML($html, true, 0, true, 0);



// reset pointer to the last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
$nama="perjanjian_kinerja_".$nama_pihak_pertama.".pdf";
$pdf->Output($nama, 'I');

//============================================================+
// END OF FILE
//============================================================+

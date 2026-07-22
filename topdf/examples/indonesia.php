<?php
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
 /*include "koneksi.php";
 $sql = "SELECT pk.PG_NIK, pk.PE_DATE AS PE_DATE_NEW, DATE_FORMAT(pk.PE_DATE, '%Y') AS TAHUN FROM perjanjian_kinerja pk WHERE pk.PE_ID = '14' ";
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
 echo $single_cal1;
*/

?> 
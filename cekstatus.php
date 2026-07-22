<?php
	error_reporting(E_ALL ^ E_NOTICE);
	
	
	
	function ceksesuai($SG_asal)
	{
    //$con2=mysqli_connect("localhost","root","","dea_web");
		$con2=mysqli_connect("localhost","root","","dea_web");
	//cek apakah sudah cocok dengan inputan IW antara tabel asal dan sum dari table tujuan
	
    //cek total IW dalam dokumen segelin
	$input = "  SELECT SG_KG FROM  segelin d   
                      
                  WHERE d.SG_ID = $SG_asal LIMIT 1
                            ";
                      //echo $input;      
                      $sql = mysqli_query($con2,$input);
                      while ($data=mysqli_fetch_array($sql,MYSQLI_NUM)){
                      	$d_IwDokumen = $data[0]; 
       						}

    //cek total IW dalam dokumen pemasukan
				$input = "  SELECT sum(d.PE_IW) as totalx
                          FROM  pemasukan d   
                          WHERE d.SG_ID = $SG_asal and d.PE_IS_DELETE=0                   
                            ";
                      //echo $input;      
                      $sql = mysqli_query($con2,$input);
                      while ($data=mysqli_fetch_array($sql, MYSQLI_NUM)){
                      	$d_totalKG = $data[0]; 
       						}

    //bandingkan , apabila tidak sesuai maka set keterangan NOT OK, jika ya set keterangan OK
       if($d_IwDokumen==$d_totalKG) $sesuai="SESUAI";
              else $sesuai="NOT OK";


	$input = " UPDATE segelin  SET SG_KET='$sesuai' WHERE SG_ID= $SG_asal";						 
	//echo $input;
	$input = mysqli_query($con2,$input);

/*
//jika sesuai maka input di table kartu stok
          if($sesuai=="SESUAI")
          {
          //get data dari table pemasukan
          $input = "  SELECT d.* FROM  pemasukan d   
                      
                  WHERE d.PE_No_PPBKB = $nomor_PKB and d.PE_IS_DELETE=0                  
                            ";
                      //echo $input;      
                      $sql = mysqli_query($con2,$input);
                      while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
                        $d_tonasein = $data["PE_IW"];
                        $d_tgldokumen= $data["PE_Date_PPBKB"];
                        $d_balesin= $data["PE_Bale"]; 
                  }
          //get latest data saldo
          $input = "  SELECT d.* FROM  kartu_stok d   
                      
                  WHERE  d.KS_IS_DELETE=0 order by d.KS_ID desc limit 1                  
                            ";
                      //echo $input;      
                      $sql = mysqli_query($con2,$input);
                      while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
                        $d_Stonase = $data["KS_TONASE_SALDO"];
                        $d_Sbales= $data["KS_BALES_SALDO"]; 
                  }
          $SaldoTonase=$d_Stonase+$d_tonasein;
          $SaldoBales=$d_Sbales+$d_balesin;
          //input tanggal update saldo, jenis dokumen, nomor dokumen, tonase in, total saldo tonase, bales in, saldo bales
          //get latest data saldo
          $input = " INSERT INTO kartu_stok (KS_Date,KS_JENIS_DOKUMEN,KS_INOUT_DATE,KS_INOUT_NOMOR,KS_TONASE_MASUK,KS_TONASE_SALDO
            ,KS_BALES_IN, KS_BALES_SALDO)
            VALUES
            (STR_TO_DATE('now()','%m/%d/%Y'),'PPBKB',STR_TO_DATE('$d_tgldokumen','%m/%d/%Y'),$nomor_PKB,$d_tonasein
            ,$SaldoTonase,$d_balesin,$SaldoBales)
                            ";
                      //echo $input;      
                      $sql = mysqli_query($con2,$input);
 
          }
*/
	}
	
	
?>



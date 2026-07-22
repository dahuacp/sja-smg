<?php	
	include "koneksi.php";
	include "session.php";
	include "file_fn.php";
	
	$id = $_POST['id'];
  $sql = "  SELECT v.SG_DATE,v.SG_VOYAGE,d.*,
                            DATE_FORMAT(d.PE_Date_TPB, '%m/%d/%Y %H:%i ') AS ST_DATE_NEW,
                            DATE_FORMAT(d.PE_Date_PPBKB, '%m/%d/%Y') AS ST_DATE_PPB
FROM  pemasukan d INNER JOIN segelin v ON d.SG_ID = v.SG_ID
                             WHERE  d.PE_ID = '$id' LIMIT 1";
  //echo $sql;
  $sql = mysqli_query($con,$sql);
  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
              $d_id = $data["PE_ID"]; 
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
              $d_PE_SG_ID= $data["SG_ID"];                  
   }  

?>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>[ Hapus ] Pencatatan barang Masuk</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

					  <input type="hidden" name="hdn_id" id="hdn_id" value="<?php echo $d_id; ?>" >
				  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Voyage dan Tanggal</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" id="cb_voyage" name="cb_voyage" disabled>
              <?php
                
                $sql = "  SELECT  p.*           
                      FROM  segelin p 
                      WHERE p.SG_IS_DELETE=0
                      ORDER BY p.SG_ID desc limit 5  ";
                //echo $sql;      
                $sql = mysqli_query($con,$sql);
                while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
                  $d_SG_ID = $data["SG_ID"];
                  $d_SG_Date = $data["SG_DATE"];
                  $d_SG_Voyage = $data["SG_VOYAGE"];
                  $d_datane= $d_SG_Date . "-" . $d_SG_Voyage;
                  if ($d_PE_SG_ID==$d_SG_ID) $s="selected";
                  else $s="";
                  echo "<option value='$d_SG_ID' $s>$d_datane</option>";
                } 
              ?>
                          </select>
                        </div>
                      </div>


                  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal TPB</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="txt_TGL_TPB" name="txt_TGL_TPB" class="form-control col-md-7 col-xs-12" value="<?php echo $d_PE_Date_TPB; ?>" disabled >
                        </div>
                      </div>
                  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">No. PPB-KB</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="txt_PE_No_PPBKB" name="txt_PE_No_PPBKB" class="form-control col-md-7 col-xs-12" value="<?php echo $d_PE_No_PPBKB; ?>" disabled>
                        </div>
                      </div>
                  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal PPB-KB</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="txt_TGL_PPB" name="txt_TGL_PPB" class="form-control col-md-7 col-xs-12" value="<?php echo $d_PE_Date_PPBKB;?>"  disabled>
                        </div>
                      </div>
            <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Jumlah Barang (IW)</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="txt_PE_IW" name="txt_PE_IW" class="form-control col-md-7 col-xs-12" value="<?php echo $d_PE_IW; ?>" disabled>
                        </div>
                      </div>
                          <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Bale</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="txt_Bale" name="txt_Bale" class="form-control col-md-7 col-xs-12" value="<?php echo $d_PE_Bale; ?>" disabled>
                        </div>
                      </div>
                     
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="button" id="btn_hapus" class="btn btn-danger">Hapus</button>
                          <button type="button" id="btn_tutup" class="btn btn-primary">Tutup</button>
                        </div>
                      </div>
				  
				  
                  </div>
                </div>
              </div>
            </div>

    <script type="text/javascript">
 
	$(document).ready(function(){
		
		$("#btn_hapus").click(function(){	
		    var tampung_data = $("form").serialize();
			$.ajax({
    			type:"POST",
    			url:"barangin_hapus.php",    
    			data: tampung_data,
    			success: function(msg){                          
    			    $("#div_refresh_data").click();
					alert(msg);	     					
    			}  
   			}); 
		});
	
		$("#btn_tutup").click(function(){			    
   			$("#div_tambah").html("");			
		});	
		
	});

    
  </script>  	
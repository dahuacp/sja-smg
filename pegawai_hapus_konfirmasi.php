<?php	
	include "koneksi.php";
	include "session.php";
	include "file_fn.php";
	
  $id = $_POST['id'];
  $sql = "  SELECT  *
        FROM  user
        WHERE U_ID = '$id' ";
  //echo $sql;
  $sql = mysqli_query($con,$sql);
  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
                        $d_id = $data["U_ID"];  
                        $d_nama = $data["U_NAMA"];
              $cb_departemen= $data["D_ID"];
                        $d_uid = $data["U_USERNM"];   
                        $d_type = $data["U_TYPE"];  
                                
   }  
?>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>[ Ubah ] User</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

					  <input type="hidden" name="hdn_id" id="hdn_id" value="<?php echo $d_id; ?>" >
                     
                      
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="txt_nama" name="txt_nama" class="form-control col-md-7 col-xs-12" value="<?php echo $d_nama; ?>" disabled=true>
                        </div>
                      </div>
					  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama User</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="txt_uid" name="txt_uid" class="form-control col-md-7 col-xs-12" value="<?php echo $d_uid; ?>" disabled=true>
                        </div>
                      </div>
                      
                      <div id="progress_delete" class="form-group" style="display:none;">
                        <div class="col-md-12">
                          <div class="progress">
                            <div class="progress-bar progress-bar-striped active" style="width:100%">
                              Updating data...
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="button" id="btn_hapus" class="btn btn-success">Hapus</button>
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
		    $("#progress_delete").show();
		    $("#btn_hapus").prop("disabled", true).text("Menghapus...");
			$.ajax({
    			type:"POST",
    			url:"pegawai_hapus.php",    
    			data: tampung_data,
    			success: function(msg){                          
    			    $("#div_refresh_data").click();
					alert(msg);
    			},
    			error: function(){
    			    alert("Gagal menghapus data.");
    			},
    			complete: function(){
    			    $("#progress_delete").hide();
    			    $("#btn_hapus").prop("disabled", false).text("Hapus");
    			}
   			}); 
		});
	
		$("#btn_tutup").click(function(){			    
   			$("#div_tambah").html("");			
		});	
		
	});

    
  </script>  	
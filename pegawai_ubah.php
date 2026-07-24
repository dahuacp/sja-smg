<?php	
	include "koneksi.php";
	include "session.php";
	include "file_fn.php";
	
	$id = $_POST['id'];
	$sql = "	SELECT	*
				FROM	user
				WHERE	U_ID = '$id' LIMIT 1";
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
                          <input type="text" id="txt_nama" name="txt_nama" class="form-control col-md-7 col-xs-12" value="<?php echo $d_nama; ?>" >
                        </div>
                      </div>
					  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Departemen</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" id="cb_departemen" name="cb_departemen" >
							<?php
								
								$sql = "	SELECT	p.*						
											FROM	dept p 
											
											ORDER BY p.D_NAME		";
								//echo $sql;			
								$sql = mysqli_query($con,$sql);
								while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
									$d_id = $data["D_ID"];	
									$d_nama = $data["D_NAME"];
									if($d_id==$cb_departemen) $s = "selected";
									else $s = "";
									echo "<option value='$d_id' $s>$d_nama</option>";
								}	
							?>
                          </select>
                        </div>
                      </div>	
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">User Name</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="txt_uid" name="txt_uid" class="form-control col-md-7 col-xs-12" value="<?php echo $d_uid; ?>" >
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">New Pass</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="password" id="txt_pass" name="txt_pass" class="form-control col-md-7 col-xs-12">
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
                           <button type="button" id="btn_simpan" class="btn btn-success">Simpan</button>
                           <button type="button" id="btn_tutup" class="btn btn-primary">Tutup</button>
                         </div>
                       </div>
				  
				  
                  </div>
                </div>
              </div>
            </div>

    <script type="text/javascript">
 
	$(document).ready(function(){
		
$("#btn_simpan").click(function(){	
    var tampung_data = $("form").serialize();
            var txt_nama = $("#txt_nama").val();
		if(txt_nama==""){
			alert("Nama Pegawai harus diisi.");
			$("#txt_nama").focus();
			return false;
		}
		$("#progress_delete").show();
		$("#btn_simpan").prop("disabled", true).text("Menyimpan...");
		$.ajax({
    	type:"POST",
    	url:"pegawai_simpan_ubah.php",    
    	data: tampung_data,
    	success: function(msg){                          
    	    $("#div_refresh_data").click();
			alert(msg);
    	},
		error: function(){
    	    alert("Gagal menyimpan data.");
    	},
		complete: function(){
    	    $("#progress_delete").hide();
    	    $("#btn_simpan").prop("disabled", false).text("Simpan");
    	}
    });
});
		$("#btn_tutup").click(function(){
   			$("#div_tambah").html("");			
		});	
		
	});

    
  </script>  	
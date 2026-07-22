<?php	
	include "koneksi.php";
	include "session.php";
	include "file_fn.php";
	
	$id = $_POST['id'];
	$sql = "	SELECT	*
				FROM	departemen
				WHERE	D_ID = '$id' LIMIT 1";
	//echo $sql;
	$sql = mysqli_query($con,$sql);
	while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
		$txt_nama = $data["D_NAME"];	
        $d_id=$id; 
	 }	
?>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>[ Hapus ] Departemen</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

					  <input type="hidden" name="hdn_id" id="hdn_id" value="<?php echo $d_id; ?>" >
				  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Departemen</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="txt_nama" name="txt_nama" class="form-control col-md-7 col-xs-12" value="<?php echo $txt_nama; ?>" disabled >
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
    			url:"departemen_hapus.php",    
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
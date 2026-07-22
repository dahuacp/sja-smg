<?php	
	include "koneksi.php";
	include "session.php";
	include "file_fn.php";
?>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>[ Tambah ] Departemen</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

				  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Departemen</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="txt_nama" name="txt_nama" class="form-control col-md-7 col-xs-12" >
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
			$.ajax({
    			type:"POST",
    			url:"departemen_simpan.php",    
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
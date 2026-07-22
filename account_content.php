<?php
	
	include "koneksi.php";
	include "session.php";
	include "file_fn.php";

?>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Account</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

				  

                    <form id="form" data-parsley-validate class="form-horizontal form-label-left">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="txt_nama" name="txt_nama" class="form-control col-md-7 col-xs-12" value="<?php echo $s_nama; ?>" disabled >
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Username</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="txt_username" name="txt_username" class="form-control col-md-7 col-xs-12" value="<?php echo $s_username?>" disabled >
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Password</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="password" id="txt_password" name="txt_password" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Password [re-type]</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="password" id="txt_password_re" name="txt_password_re" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="button" id="btn_simpan" class="btn btn-success">Simpan</button>
                        </div>
                      </div>

                    </form>
                  				  
				  
				  
                  </div>
                </div>
              </div>
            </div>

    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript">
 
	$(document).ready(function(){
		
		$("#btn_simpan").click(function(){	
		    var tampung_data = $("form").serialize();
            var txt_password = $("#txt_password").val();
            var txt_password_re = $("#txt_password_re").val();            					
			if(txt_password!=txt_password_re){
				alert("Password tidak sama.");
				$("#txt_password").focus();
				return false;
			}
			$.ajax({
    			type:"POST",
    			url:"account_simpan.php",    
    			data: tampung_data,
    			success: function(msg){   
    			    alert("Password telah diubah.");			
    			}  
   			});     			
		});    
		
	});

    
  </script>  	
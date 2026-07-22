<?php	
	include "koneksi.php";
	include "session.php";
	include "file_fn.php";
  error_reporting(E_ALL ^ E_NOTICE);
?>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>[ Rekap ] Periodik Saldo</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                     
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Awal</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="txt_TGL_AWAL" name="txt_TGL_AWAL" class="form-control col-md-7 col-xs-12" value="<?php echo date("d/m/Y");?>" >
                        </div>
                      </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Akhir</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="txt_TGL_AKHIR" name="txt_TGL_AKHIR" class="form-control col-md-7 col-xs-12" value="<?php echo date("d/m/Y");?>" >
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  
                  <button type="button" id="btn_simpan2" class="btn btn-success">Laporan Periodik</button>
                  <button type="button" id="btn_simpan" class="btn btn-success">Dok Laporan Periodik</button>
                          <button type="button" id="btn_tutup" class="btn btn-primary">Tutup</button>
                        </div>
                      </div>
				  
				  
				  
                  </div>
                </div>
              </div>
            </div>
    <script src="js/jQuery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/moment.js"></script>
    <script src="js/bootstrap-datetimepicker.min.js"></script>
    
    <script type="text/javascript">
 
	$(document).ready(function(){
		$('#txt_TGL_AWAL').datetimepicker({
          format: 'DD/MM/YYYY',
                });
    $('#txt_TGL_AKHIR').datetimepicker({
          format: 'DD/MM/YYYY',
                });
    
		$("#btn_simpan").click(function(){	
		  var x = document.getElementById("txt_TGL_AWAL").value;
      var y = document.getElementById("txt_TGL_AKHIR").value;
			window.location.href = "saldo_rekap_proses.php?awal="+x+"&akhir="+y+"";  
      //pc0="+userInput0+"pn0="+userInput11+"pv0="+userInput21";  
		});
		
    $("#btn_simpan2").click(function(){  
      var x = document.getElementById("txt_TGL_AWAL").value;
      var y = document.getElementById("txt_TGL_AKHIR").value;
      window.location.href = "saldo_rekap_proses2.php?awal="+x+"&akhir="+y+"";  
      //pc0="+userInput0+"pn0="+userInput11+"pv0="+userInput21";  
    });
		$("#btn_tutup").click(function(){			    
   			$("#div_tambah").html("");			
		});	 
		
	});

    
  </script>  	
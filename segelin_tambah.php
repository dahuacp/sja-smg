<?php 
  include "koneksi.php";
  include "session.php";
  include "file_fn.php";
?>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>[ Tambah ] Pencatatan Segel</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">      
                  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="txt_SG_DATE" name="txt_SG_DATE" class="form-control col-md-7 col-xs-12" value="<?php echo date("d/m/Y H:i");?>" >
                        </div>
                      </div>
                    
            <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Jumlah Container</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="txt_SG_JML" name="txt_SG_JML" class="form-control col-md-7 col-xs-12" >
                        </div>
                      </div>
             
            <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Bale</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="txt_Bale" name="txt_Bale" class="form-control col-md-7 col-xs-12" >
                        </div>
                      </div>
            <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">IW (KG)</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="txt_Iw" name="txt_Iw" class="form-control col-md-7 col-xs-12" >
                        </div>
                      </div>
            <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Voyage</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="txt_Voyage" name="txt_Voyage" class="form-control col-md-7 col-xs-12" >
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
    <script src="js/jQuery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/moment.js"></script>
    <script src="js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript">
 
  $(document).ready(function(){
    $('#txt_SG_DATE').datetimepicker({
          format: 'DD/MM/YYYY HH:mm',
                });
    $("#btn_simpan").click(function(){  
        var tampung_data = $("form").serialize();
      $.ajax({
          type:"POST",
          url:"segelin_simpan.php",    
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
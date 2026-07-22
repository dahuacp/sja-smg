<?php 
  include "koneksi.php";
  include "session.php";
  include "file_fn.php";
?>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>[ Tambah ] Pencatatan barang Keluar</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Dokumen Pengeluaran</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" id="cb_PENG_JENIS_DOKUMEN" name="cb_PENG_JENIS_DOKUMEN" >
							  <option value="BC 25" >BC 25</option>
							  <option value="BC 27" >BC 27</option>
							  <option value="BC 30" >BC 30</option>
                          </select>
                        </div>
                      </div>
					  
					<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nomor Dokumen Pengeluaran</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="txt_PENG_NOMOR_DOK" name="txt_PENG_NOMOR_DOK" class="form-control col-md-7 col-xs-12" >
                        </div>
                      </div>
					  
					<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Dokumen Pengeluaran</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="txt_PENG_DATE_DOK" name="txt_PENG_DATE_DOK" class="form-control col-md-7 col-xs-12" value="<?php echo date("d/m/Y");?>" >
                        </div>
                      </div>
					  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Jalur Dokumen Pengeluaran</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" id="cb_PENG_JALUR_DOK" name="cb_PENG_JALUR_DOK" >
							  <option value="HIJAU" >HIJAU</option>
							  <option value="MERAH" >MERAH</option>
                          </select>
                        </div>
                      </div>
					  
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Bale</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="txt_PENG_BALE" name="txt_PENG_BALE" class="form-control col-md-7 col-xs-12" >
                        </div>
                      </div>
          
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Barang</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" id="cb_PENG_JENIS_BARANG" name="cb_PENG_JENIS_BARANG" >
							  <option value="VISCOSE STAPLE FIBER" >VISCOSE STAPLE FIBER</option>
							  <option value="Other" >Other</option>
                          </select>
                        </div>
                      </div>
					  
					<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Jumlah Barang (IW)</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="txt_PENG_IW" name="txt_PENG_IW" class="form-control col-md-7 col-xs-12" >
                        </div>
                      </div>
					  					  					  
					<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Penerima Barang</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="txt_PENG_PENERIMA" name="txt_PENG_PENERIMA" class="form-control col-md-7 col-xs-12" >
                        </div>
                      </div>
					  
                  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Kota</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="txt_PENG_PENERIMA_KOTA" name="txt_PENG_PENERIMA_KOTA" class="form-control col-md-7 col-xs-12" >
                        </div>
                      </div>
					  
                  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Pengeluaran</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="txt_PENG_DATE" name="txt_PENG_DATE" class="form-control col-md-7 col-xs-12" value="<?php echo date("d/m/Y H:i");?>" >
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
    $('#txt_PENG_DATE').datetimepicker({
          format: 'DD/MM/YYYY HH:mm',
                });
    $('#txt_PENG_DATE_DOK').datetimepicker({
          format: 'DD/MM/YYYY',
                });
    $("#btn_simpan").click(function(){  
        var tampung_data = $("form").serialize();
      $.ajax({
          type:"POST",
          url:"barangout_simpan.php",    
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
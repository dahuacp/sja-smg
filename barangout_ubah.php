<?php 
  include "koneksi.php";
  include "session.php";
  include "file_fn.php";
  
  $id = $_POST['id'];
                      $sql = "  SELECT	d.*,
										DATE_FORMAT(d.PENG_DATE_DOK, '%d/%m/%Y') AS PENG_DATE_DOK_NEW,
										DATE_FORMAT(d.PENG_DATE, '%d/%m/%Y %H:%i ') AS PENG_DATE_NEW
								FROM	pengeluaran d   
								WHERE	d.PENG_ID = $id LIMIT 1	";
  //echo $sql;
  $sql = mysqli_query($con,$sql);
  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
						  $d_id = $data["PENG_ID"]; 
						  $cb_PENG_JENIS_DOKUMEN = $data["PENG_JENIS_DOKUMEN"];
						  $txt_PENG_DATE_DOK = $data["PENG_DATE_DOK_NEW"];
						  $txt_PENG_NOMOR_DOK = $data["PENG_NOMOR_DOK"];
						  $cb_PENG_JALUR_DOK = $data["PENG_JALUR_DOK"];
						  $txt_PENG_BALE = $data["PENG_BALE"];
						  $cb_PENG_JENIS_BARANG = $data["PENG_JENIS_BARANG"];
						  $txt_PENG_IW = $data ["PENG_IW"];
						  $txt_PENG_PENERIMA = $data["PENG_PENERIMA"];
						  $txt_PENG_PENERIMA_KOTA = $data["PENG_PENERIMA_KOTA"];
						  $txt_PENG_DATE = $data["PENG_DATE_NEW"];
						  $txt_PENG_HARGA_PENYERAHAN = $data["PENG_HARGA_PENYERAHAN"];
                                
   }  

?>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>[ Ubah ] Pencatatan barang Keluar</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

            <input type="hidden" name="hdn_id" id="hdn_id" value="<?php echo $d_id; ?>" >



                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Dokumen Pengeluaran</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" id="cb_PENG_JENIS_DOKUMEN" name="cb_PENG_JENIS_DOKUMEN" >
							  <option value="BC 25" <?php if($cb_PENG_JENIS_DOKUMEN=="BC 25") echo "selected"; ?> >BC 25</option>
							  <option value="BC 27" <?php if($cb_PENG_JENIS_DOKUMEN=="BC 27") echo "selected"; ?> >BC 27</option>
							  <option value="BC 30" <?php if($cb_PENG_JENIS_DOKUMEN=="BC 30") echo "selected"; ?> >BC 30</option>
                          </select>
                        </div>
                      </div>
					  
					<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nomor Dokumen Pengeluaran</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="txt_PENG_NOMOR_DOK" name="txt_PENG_NOMOR_DOK" class="form-control col-md-7 col-xs-12" value="<?php echo $txt_PENG_NOMOR_DOK; ?>" >
                        </div>
                      </div>
					  
					<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Dokumen Pengeluaran</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="txt_PENG_DATE_DOK" name="txt_PENG_DATE_DOK" class="form-control col-md-7 col-xs-12" value="<?php echo $txt_PENG_DATE_DOK; ?>" >
                        </div>
                      </div>
					  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Jalur Dokumen Pengeluaran</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" id="cb_PENG_JALUR_DOK" name="cb_PENG_JALUR_DOK" >
							  <option value="HIJAU" <?php if($cb_PENG_JALUR_DOK=="HIJAU") echo "selected"; ?> >HIJAU</option>
							  <option value="MERAH" <?php if($cb_PENG_JALUR_DOK=="MERAH") echo "selected"; ?> >MERAH</option>
                          </select>
                        </div>
                      </div>
					  
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Bale</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="txt_PENG_BALE" name="txt_PENG_BALE" class="form-control col-md-7 col-xs-12" value="<?php echo $txt_PENG_BALE; ?>" >
                        </div>
                      </div>
          
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Barang</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" id="cb_PENG_JENIS_BARANG" name="cb_PENG_JENIS_BARANG" >
							  <option value="VISCOSE STAPLE FIBER" <?php if($cb_PENG_JENIS_BARANG=="VISCOSE STAPLE FIBER") echo "selected"; ?> >VISCOSE STAPLE FIBER</option>
							  <option value="Other" <?php if($cb_PENG_JENIS_BARANG=="Other") echo "selected"; ?> >Other</option>
                          </select>
                        </div>
                      </div>
					  
					<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Jumlah Barang (IW)</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="txt_PENG_IW" name="txt_PENG_IW" class="form-control col-md-7 col-xs-12" value="<?php echo $txt_PENG_IW; ?>" >
                        </div>
                      </div>
					  					  					  
					<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Penerima Barang</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="txt_PENG_PENERIMA" name="txt_PENG_PENERIMA" class="form-control col-md-7 col-xs-12" value="<?php echo $txt_PENG_PENERIMA; ?>" >
                        </div>
                      </div>
					  
                  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Kota</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="txt_PENG_PENERIMA_KOTA" name="txt_PENG_PENERIMA_KOTA" class="form-control col-md-7 col-xs-12" value="<?php echo $txt_PENG_PENERIMA_KOTA; ?>" >
                        </div>
                      </div>
					  
                  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Pengeluaran</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="txt_PENG_DATE" name="txt_PENG_DATE" class="form-control col-md-7 col-xs-12" value="<?php echo $txt_PENG_DATE; ?>" >
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
    $('#txt_PENG_DATE_DOK').datetimepicker({
          format: 'DD/MM/YYYY',
                });
     $('#txt_PENG_DATE').datetimepicker({
          format: 'DD/MM/YYYY HH:mm',
                });
    $("#btn_simpan").click(function(){  
        var tampung_data = $("form").serialize();
            var txt_nama = $("#txt_PENG_NOMOR_DOK").val();          
      if(txt_nama==""){
        alert("Nomor Dokumen Pengeluaran harus diisi.");
        $("#txt_nama").focus();
        return false;
      }
      $.ajax({
          type:"POST",
          url:"barangout_simpan_ubah.php",    
          data: tampung_data,
          success: function(msg){                          
              $("#div_refresh_data").click();
			  //$("#div_sql").html(msg);	
			  alert(msg);               
          }  
        }); 
    });
  
    $("#btn_tutup").click(function(){         
        $("#div_tambah").html("");      
    }); 
    
  });

    
  </script>   
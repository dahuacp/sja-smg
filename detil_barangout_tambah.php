<?php 
  include "koneksi.php";
  include "session.php";
  include "file_fn.php";
?>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>[ Tambah ] Detil Barang Keluar</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">   
				  
                  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="txt_KS_DATE" name="txt_KS_DATE" class="form-control col-md-7 col-xs-12" value="<?php echo date("d/m/Y H:i");?>" >
                        </div>
                      </div>
					  
<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Dokumen Pengeluaran</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" id="cb_PENGELUARAN" name="cb_PENGELUARAN" >
              <?php
                
                $sql = " 	SELECT 	p.*, 
									IFNULL(SUM(ks.KS_TONASE_KELUAR), 0) as total_tonase_keluar,
									IFNULL(SUM(ks.KS_BALES_OUT), 0) as total_bales_out,
									(p.PENG_IW - IFNULL(SUM(ks.KS_TONASE_KELUAR), 0)) as sisa_tonase,
									(p.PENG_BALE - IFNULL(SUM(ks.KS_BALES_OUT), 0)) as sisa_bale
							FROM	pengeluaran p 
							LEFT JOIN kartu_stok ks 
								ON p.PENG_ID = ks.KS_PE_PENG_ID 
								AND p.PENG_JENIS_DOKUMEN = ks.KS_JENIS_DOKUMEN
								AND ks.KS_IS_DELETE = 0
							WHERE	p.PENG_IS_DELETE=0
							GROUP BY p.PENG_ID
							HAVING sisa_tonase > 0 OR sisa_bale > 0
							ORDER BY p.PENG_DATE_DOK DESC  ";
                //echo $sql;      
                $sql = mysqli_query($con,$sql);
                while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
						  $d_PENG_ID = $data["PENG_ID"];
						  $d_PENG_JENIS_DOKUMEN = $data["PENG_JENIS_DOKUMEN"];
						  $d_PENG_NOMOR_DOK = $data["PENG_NOMOR_DOK"];
						  $d_PENG_DATE_DOK = $data["PENG_DATE_DOK"];
						  $d_PENG_PENERIMA = $data["PENG_PENERIMA"];
						  
						  $tgl_dok = date('d/m/Y', strtotime($d_PENG_DATE_DOK));
						  $d_nama = "[$d_PENG_JENIS_DOKUMEN] $d_PENG_NOMOR_DOK | $tgl_dok | $d_PENG_PENERIMA";
                   
                  echo "<option value='$d_PENG_ID' $s>$d_nama</option>";
                } 
              ?>
                          </select>
                        </div>
                      </div>
					  
					<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tonase Keluar (IW)</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="txt_PENG_IW" name="txt_PENG_IW" class="form-control col-md-7 col-xs-12" >
                        </div>
                      </div>
					  					
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Bales Out</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="txt_PENG_BALE" name="txt_PENG_BALE" class="form-control col-md-7 col-xs-12" >
                        </div>
                      </div>	
					  
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Pengeluaran Ke</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="txt_PENG_KE" name="txt_PENG_KE" class="form-control col-md-7 col-xs-12" >
                        </div>
                      </div>
					  
					<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">No OD</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="txt_NO_OD" name="txt_NO_OD" class="form-control col-md-7 col-xs-12" >
                        </div>
                      </div>
					  
					<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">No Packing Slip</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="txt_NO_PACKING_SLIP" name="txt_NO_PACKING_SLIP" class="form-control col-md-7 col-xs-12" >
                        </div>
                      </div>
					  
					<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nopol</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="txt_NOPOL" name="txt_NOPOL" class="form-control col-md-7 col-xs-12" >
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
    $('#txt_KS_DATE').datetimepicker({
          format: 'DD/MM/YYYY HH:mm',
                });
    $("#btn_simpan").click(function(){  
        var tampung_data = $("form").serialize();
      $.ajax({
          type:"POST",
          url:"detil_barangout_simpan.php",    
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
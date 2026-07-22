<?php
	include "koneksi.php";
	include "session.php";
	include "file_fn.php";

	$id = $_POST['id'];
	$sql = "	SELECT	d.*,
						DATE_FORMAT(d.KS_DATE, '%d/%m/%Y %H:%i ') AS KS_DATE_NEW,
						DATE_FORMAT(d.KS_INOUT_DATE, '%d/%m/%Y') AS KS_INOUT_DATE_NEW
				FROM	kartu_stok d
				WHERE	d.KS_ID = $id LIMIT 1";
	$sql = mysqli_query($con,$sql);
	while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
				$d_id = $data["KS_ID"];
				$txt_KS_DATE = $data['KS_DATE_NEW'];
				$txt_KS_JENIS_DOKUMEN = $data['KS_JENIS_DOKUMEN'];
				$txt_KS_INOUT_NOMOR = $data['KS_INOUT_NOMOR'];
				$txt_KS_INOUT_DATE = $data['KS_INOUT_DATE_NEW'];
				$txt_KS_TONASE_KELUAR = $data['KS_TONASE_KELUAR'];
				$txt_KS_BALES_OUT = $data['KS_BALES_OUT'];
				$txt_KS_PENGELUARAN_KE = $data['KS_PENGELUARAN_KE'];
				$txt_KS_NOMOR_OD = $data['KS_NOMOR_OD'];
				$txt_KS_NOMOR_PACKING_SLIP = $data['KS_NOMOR_PACKING_SLIP'];
				$txt_KS_NOPOL = $data['KS_NOPOL'];
   }

?>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>[ Hapus ] Detil Barang Keluar</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

					  <input type="hidden" name="hdn_id" id="hdn_id" value="<?php echo $d_id; ?>" >

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal / Jam Keluar</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="txt_KS_DATE" name="txt_KS_DATE" class="form-control col-md-7 col-xs-12" value="<?php echo $txt_KS_DATE; ?>" disabled >
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Dokumen</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="txt_KS_JENIS_DOKUMEN" name="txt_KS_JENIS_DOKUMEN" class="form-control col-md-7 col-xs-12" value="<?php echo $txt_KS_JENIS_DOKUMEN; ?>" disabled >
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nomor Dokumen</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="txt_KS_INOUT_NOMOR" name="txt_KS_INOUT_NOMOR" class="form-control col-md-7 col-xs-12" value="<?php echo $txt_KS_INOUT_NOMOR; ?>" disabled >
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Dokumen</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="txt_KS_INOUT_DATE" name="txt_KS_INOUT_DATE" class="form-control col-md-7 col-xs-12" value="<?php echo $txt_KS_INOUT_DATE; ?>" disabled >
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tonase Keluar (IW)</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="txt_KS_TONASE_KELUAR" name="txt_KS_TONASE_KELUAR" class="form-control col-md-7 col-xs-12" value="<?php echo $txt_KS_TONASE_KELUAR; ?>" disabled >
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Bales Out</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="txt_KS_BALES_OUT" name="txt_KS_BALES_OUT" class="form-control col-md-7 col-xs-12" value="<?php echo $txt_KS_BALES_OUT; ?>" disabled >
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Pengeluaran Ke</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="txt_KS_PENGELUARAN_KE" name="txt_KS_PENGELUARAN_KE" class="form-control col-md-7 col-xs-12" value="<?php echo $txt_KS_PENGELUARAN_KE; ?>" disabled >
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">No OD</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="txt_KS_NOMOR_OD" name="txt_KS_NOMOR_OD" class="form-control col-md-7 col-xs-12" value="<?php echo $txt_KS_NOMOR_OD; ?>" disabled >
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">No Packing Slip</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="txt_KS_NOMOR_PACKING_SLIP" name="txt_KS_NOMOR_PACKING_SLIP" class="form-control col-md-7 col-xs-12" value="<?php echo $txt_KS_NOMOR_PACKING_SLIP; ?>" disabled >
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nopol</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="txt_KS_NOPOL" name="txt_KS_NOPOL" class="form-control col-md-7 col-xs-12" value="<?php echo $txt_KS_NOPOL; ?>" disabled >
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
    			url:"detil_barangout_hapus.php",
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

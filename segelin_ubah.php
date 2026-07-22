<?php 
  include "koneksi.php";
  include "session.php";
  include "file_fn.php";
  
  $id = $_POST['id'];
  $sql = "  SELECT d.*,DATE_FORMAT(d.SG_DATE, '%d/%m/%Y %H:%i ') AS ST_DATE_NEW
            FROM  segelin d  
            WHERE d.SG_ID = '$id' ";
  //echo $sql;
  $sql = mysqli_query($con,$sql);
  while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
               $d_id = $data["SG_ID"]; 
              $d_PE_Date_TPB= $data["ST_DATE_NEW"];
              
              $d_SG_JML= $data["SG_JML"];
              $d_SG_BL= $data["SG_BL"];
              $d_SG_KG = $data["SG_KG"];
              $d_SG_VOYAGE = $data["SG_VOYAGE"];
              
                                
   }  

?>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>[ Ubah ] Pencatatan Segel</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

            <input type="hidden" name="hdn_id" id="hdn_id" value="<?php echo $d_id; ?>" >
                     
                
                  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="txt_SG_DATE" name="txt_SG_DATE" class="form-control col-md-7 col-xs-12" value="<?php echo $d_PE_Date_TPB;?>" >
                        </div>
                      </div>
           
            <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Jumlah Container</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="txt_SG_JML" name="txt_SG_JML" class="form-control col-md-7 col-xs-12" value="<?php echo $d_SG_JML;?>">
                        </div>
                      </div>
             
            <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Bale</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="txt_Bale" name="txt_Bale" class="form-control col-md-7 col-xs-12" value="<?php echo $d_SG_BL;?>">
                        </div>
                      </div>
            <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">IW (KG)</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="txt_Iw" name="txt_Iw" class="form-control col-md-7 col-xs-12" value="<?php echo $d_SG_KG;?>">
                        </div>
                      </div>
            <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Voyage</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="txt_Voyage" name="txt_Voyage" class="form-control col-md-7 col-xs-12" value="<?php echo $d_SG_VOYAGE;?>">
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
     $('#txt_TGL_TPB').datetimepicker({
          format: 'DD/MM/YYYY HH:mm',
                });
    $('#txt_TGL_PPB').datetimepicker({
          format: 'DD/MM/YYYY',
                });
    $("#btn_simpan").click(function(){  
        var tampung_data = $("form").serialize();
            var txt_nama = $("#txt_PE_No_PPBKB").val();          
      if(txt_nama==""){
        alert("Nomor PPB-KB harus diisi.");
        $("#txt_nama").focus();
        return false;
      }
      $.ajax({
          type:"POST",
          url:"segelin_simpan_ubah.php",    
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
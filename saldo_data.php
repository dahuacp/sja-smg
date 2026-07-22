<?php 
  include "koneksi.php";
  include "session.php";
  include "file_fn.php";
  error_reporting(E_ALL ^ E_NOTICE);
  $urut=0;
?>

      
          
            <div class="row">       
        
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Saldo</h2>
                    <div class="clearfix"></div>
                  </div>      
          
          
                  <div class="x_content">
                    <button type="button" id="btn_tambah" class="btn btn-primary">Saldo Periodik</button> 
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th width="10px">No</th>
                          <th>Tanggal<br>Jam Keluar</th>
                          <th>Jenis<br>Dokumen</th>
                          <th>Nomor<br>Dokumen</th>
                          <th>Tanggal<br>Dokumen</th>
                          <th>Tonase Masuk<br>(IW)</th>
                          <th>Tonase Keluar<br>(IW)</th>
                          <th>Saldo<br>Berat Tonase</th>
                          <th>Bales<br>IN</th>
                          <th>Bales<br>OUT</th>
                          <th>Saldo<br>BL</th>
                          <th>Pengeluaran<br>Ke</th>
                          <th>Nomor<br>OD</th>
                          <th>Nomor<br>Packing Slip</th>
                          <th>Nopol</th>
                        </tr>
                      </thead>


                      <tbody>
                      <?php
					  
                      $sql = "  SELECT	ks.*,
										DATE_FORMAT(ks.KS_DATE, '%d/%m/%Y %H:%i ') AS KS_DATE_NEW,
										DATE_FORMAT(ks.KS_INOUT_DATE, '%d/%m/%Y') AS KS_INOUT_DATE_NEW
								FROM	kartu_stok ks  
								WHERE	ks.KS_IS_DELETE = 0  												
								ORDER BY ks.KS_ID desc limit 600	";		
                      //echo $sql;      
                      $sql = mysqli_query($con,$sql);
                      while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
						$urut++;
						  $d_id = $data["KS_ID"]; 
						  $d_KS_DATE_NEW = $data["KS_DATE_NEW"];
						  $d_KS_JENIS_DOKUMEN = $data["KS_JENIS_DOKUMEN"];
						  $d_KS_INOUT_DATE_NEW = $data["KS_INOUT_DATE_NEW"];
						  $d_KS_INOUT_NOMOR = $data["KS_INOUT_NOMOR"];
						  $d_KS_TONASE_MASUK = $data ["KS_TONASE_MASUK"];
						  $d_KS_TONASE_KELUAR = $data ["KS_TONASE_KELUAR"];
						  $d_KS_BALES_IN = $data["KS_BALES_IN"];
						  $d_KS_BALES_OUT = $data["KS_BALES_OUT"];
						  $d_PENGELUARAN_KE = $data["KS_PENGELUARAN_KE"];
						  $d_NOMOR_OD = $data["KS_NOMOR_OD"];
						  $d_NOMOR_PACKING_SLIP = $data["KS_NOMOR_PACKING_SLIP"];
						  $d_NOPOL = $data["KS_NOPOL"];
						  
						  $TONASE_SALDO = $data ["KS_TONASE_SALDO"];
						  $BALES_SALDO = $data ["KS_BALES_SALDO"];
                      
              
                      ?>                    
                        <tr>
                          <td width="10px"><?php echo $urut; ?></td>  
                          <th><?php echo $d_KS_DATE_NEW; ?></th>   
                          <th><?php echo $d_KS_JENIS_DOKUMEN; ?></th>   
                          <th><?php echo $d_KS_INOUT_NOMOR; ?></th>          
                          <th><?php echo $d_KS_INOUT_DATE_NEW; ?></th>
                          <th><?php echo $d_KS_TONASE_MASUK; ?></th>
                          <th><?php echo $d_KS_TONASE_KELUAR; ?></th>
                          <th><?php echo $TONASE_SALDO; ?></th>
                          <th><?php echo $d_KS_BALES_IN; ?></th>
                          <th><?php echo $d_KS_BALES_OUT; ?></th>
                          <th><?php echo $BALES_SALDO; ?></th>
                          <th><?php echo $d_PENGELUARAN_KE; ?></th>
                          <th><?php echo $d_NOMOR_OD; ?></th>
                          <th><?php echo $d_NOMOR_PACKING_SLIP; ?></th>
                          <th><?php echo $d_NOPOL; ?></th>
                          
                          
                          
                        </tr>
                      <?php
                      } 
                      ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>    
        
            </div>
      
 
          
    <!-- Datatables -->
    <script src="vendors/datatables.net/js/jquery.dataTables.js"></script>
    <script src="vendors/datatables.net-bs/js/dataTables.bootstrap.js"></script>

    <script type="text/javascript">

    
  $(document).ready(function(){

    $('#datatable').DataTable({
      scrollX: true,
      scrollY: '70vh',
      scrollCollapse: true,
      responsive: true
    });

$("#btn_tambah").click(function(){          
      $.ajax({
          type:"POST",
          url:"saldo_rekap.php",    
          success: function(msg){   
              $("#div_tambah").html(msg);     
          }  
        });           
    }); 
        
  });

    
  </script>   
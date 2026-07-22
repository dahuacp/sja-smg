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
                    <h2>Pencatatan Detil Barang Keluar</h2>
                    <div class="clearfix"></div>
                  </div>      
          
                  <div class="x_content">
          <button type="button" id="btn_tambah" class="btn btn-primary">Tambah</button> 
          </div>        
          
                  <div class="x_content">
                    
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th width="10px">No</th>
                          <th>Tanggal<br>Jam Keluar</th>
                          <th>Jenis<br>Dokumen</th>
                          <th>Nomor<br>Dokumen</th>
                          <th>Tanggal<br>Dokumen</th>
                          <th>Tonase Keluar<br>(IW)</th>
                          <th>Bales<br>Out</th>
                          <th>Pengeluaran<br>Ke</th>
                          <th>Nomor<br>OD</th>
                          <th>Nomor<br>Packing Slip</th>
                          <th>Nopol</th>
                          <th width="40px">&nbsp;</th>
                        </tr>
                      </thead>


                      <tbody></tbody>
                    </table>
                  </div>
                </div>
              </div>    
        
            </div>
      

  <input type="hidden" id="id_hapus"/>
  <input type="hidden" id="id_ubah"/>       
  
          
    <!-- Datatables -->
    <script src="vendors/datatables.net/js/jquery.dataTables.js"></script>
    <script src="vendors/datatables.net-bs/js/dataTables.bootstrap.js"></script>

    <script type="text/javascript">

    function hapus(id_hapus){   
    document.getElementById("id_hapus").value = id_hapus;
    $('#id_hapus').click();   
  }
  
  function ubah(id_ubah){   
    document.getElementById("id_ubah").value = id_ubah;
    $('#id_ubah').click();    
  } 
    
  $(document).ready(function(){

$('#datatable').DataTable({
       scrollX: true,
       scrollY: '70vh',
       scrollCollapse: true,
       responsive: true,
       serverSide: true,
      ajax: { url: 'data_ajax.php?dataset=detil_barangout', type: 'GET' },
      columns: [{data: 0, orderable: false}, {data: 1, name: 'KS_DATE'}, {data: 2, name: 'KS_JENIS_DOKUMEN'}, {data: 3, name: 'KS_INOUT_NOMOR'}, {data: 4, name: 'KS_INOUT_DATE'}, {data: 5, name: 'KS_TONASE_KELUAR'}, {data: 6, name: 'KS_BALES_OUT'}, {data: 7, name: 'KS_PENGELUARAN_KE'}, {data: 8, name: 'KS_NOMOR_OD'}, {data: 9, name: 'KS_NOMOR_PACKING_SLIP'}, {data: 10, name: 'KS_NOPOL'}, {data: 11, orderable: false, searchable: false}],
      order: [[1, 'desc']]
    });

    $("#btn_tambah").click(function(){          
      $.ajax({
          type:"POST",
          url:"detil_barangout_tambah.php",    
          success: function(msg){   
              $("#div_tambah").html(msg);     
          }  
        });           
    }); 
    
    $("#id_hapus").click(function(){      
      var tampung_data = $('#id_hapus').val();
      $.ajax({
          type:"POST",
          url:"detil_barangout_hapus_konfirmasi.php",    
          data: "id=" + tampung_data,
          success: function(msg){   
          $("#div_tambah").html(msg);                   
          }  
        });
    });
    
    $("#id_ubah").click(function(){     
      var tampung_data = $('#id_ubah').val();
      $.ajax({
          type:"POST",
          url:"detil_barangout_ubah.php",    
          data: "id=" + tampung_data,
          success: function(msg){   
			$("#div_tambah").html(msg);			
          }   
        });
    });     
    
  });

    
  </script>   
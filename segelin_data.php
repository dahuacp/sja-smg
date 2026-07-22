<?php 
  include "koneksi.php";
  include "session.php";
  include "file_fn.php";
  include "fn_dea.php";
  error_reporting(E_ALL ^ E_NOTICE);
  $urut=0;
?>

      
          
            <div class="row">       
        
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Pencatatan Buka Segel</h2>
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
                          
                          <th>Tanggal</th>
                          <th>JML Container</th>
                          <th>Bale</th>
                          <th>Jumlah Barang (IW)</th>
                          <th>Sisa Tonase (IW)</th>
                          <th>Sisa Bales</th>
                          <th>Voyage</th>
                          <th>Keterangan</th>
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
      ajax: { url: 'data_ajax.php?dataset=segelin', type: 'GET' },
      columns: [{data: 0, orderable: false}, {data: 1, name: 'SG_DATE'}, {data: 2, name: 'SG_JML'}, {data: 3, name: 'SG_BL'}, {data: 4, name: 'SG_KG'}, {data: 5, orderable: false, searchable: false}, {data: 6, orderable: false, searchable: false}, {data: 7, name: 'SG_VOYAGE'}, {data: 8, name: 'SG_KET'}, {data: 9, orderable: false, searchable: false}],
      order: [[1, 'desc']]
    });

    $("#btn_tambah").click(function(){          
      $.ajax({
          type:"POST",
          url:"segelin_tambah.php",    
          success: function(msg){   
              $("#div_tambah").html(msg);     
          }  
        });           
    }); 
    
    $("#id_hapus").click(function(){      
      var tampung_data = $('#id_hapus').val();
      $.ajax({
          type:"POST",
          url:"segelin_hapus_konfirmasi.php",    
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
          url:"segelin_ubah.php",    
          data: "id=" + tampung_data,
          success: function(msg){   
          $("#div_tambah").html(msg);                     
          }   
        });
    });     
    
  });

    
  </script>   
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
                    <h2>Pencatatan barang Keluar</h2>
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
                          <th>Jenis<br>Dokumen</th>
                          <th>Nomor<br>Dokumen</th>
                          <th>Tanggal<br>Dokumen</th>
                          <th>Bale</th>
                          <th>Jumlah Barang<br>(IW)</th>
                          <th>Jumlah Barang<br>(KGM)</th>
                          <th>Sisa Tonase</th>
                          <th>Sisa Bale </th>
                          <th>Penerima<br>Barang</th>
                          <th>Kota</th>
                          <th>Waktu Pengeluaran</th>
                          <th>Keterangan</th>
                          <th>Jalur<br>Dokumen</th>
                          <th>Jenis Barang</th>
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
      ajax: { url: 'data_ajax.php?dataset=barangout', type: 'GET' },
      columns: [
        { data: 0, orderable: false },
        { data: 1, name: 'PENG_JENIS_DOKUMEN' },
        { data: 2, name: 'PENG_NOMOR_DOK' },
        { data: 3, name: 'PENG_DATE_DOK' },
        { data: 4, name: 'PENG_BALE' },
        { data: 5, name: 'PENG_IW' },
        { data: 6, name: 'PENG_KGM' },
        { data: 7, orderable: false, searchable: false },
        { data: 8, orderable: false, searchable: false },
        { data: 9, name: 'PENG_PENERIMA' },
        { data: 10, name: 'PENG_PENERIMA_KOTA' },
        { data: 11, name: 'PENG_DATE' },
        { data: 12, name: 'PENG_KET' },
        { data: 13, name: 'PENG_JALUR_DOK' },
        { data: 14, name: 'PENG_JENIS_BARANG' },
        { data: 15, orderable: false, searchable: false }
      ],
      order: [[0, 'desc']]
    });

    $("#btn_tambah").click(function(){          
      $.ajax({
          type:"POST",
          url:"barangout_tambah.php",    
          success: function(msg){   
              $("#div_tambah").html(msg);     
          }  
        });           
    }); 
    
    $("#id_hapus").click(function(){      
      var tampung_data = $('#id_hapus').val();
      $.ajax({
          type:"POST",
          url:"barangout_hapus_konfirmasi.php",    
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
          url:"barangout_ubah.php",    
          data: "id=" + tampung_data,
          success: function(msg){   
			$("#div_tambah").html(msg);			
          }   
        });
    });     
    
  });

    
  </script>   
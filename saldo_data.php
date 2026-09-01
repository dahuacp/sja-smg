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
            <h2>Saldo Periodik</h2>
            <div class="clearfix"></div>
          </div>      

          <div class="x_content">
            <button type="button" id="btn_periodik" class="btn btn-success"><i class="fa fa-calendar"></i> Saldo Periodik</button>
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

    $(document).ready(function(){

    $("#btn_periodik").click(function(){
        $.ajax({
            type:"POST",
            url:"saldo_rekap.php",
            beforeSend: function(){ $("#div_tambah").html('<img src="LoaderIcon.gif"><h4>Loading...</h4>'); },
            success: function(msg){
                $("#div_tambah").html(msg);
                $('html, body').animate({ scrollTop: $("#div_tambah").offset().top }, 300);
            }
        });
    });

    $('#datatable').DataTable({
        scrollX: true,
        scrollY: '70vh',
        scrollCollapse: true,
        serverSide: true,
        ajax: { url: 'data_ajax.php?dataset=saldo', type: 'GET' },
        order: [[1, 'desc']],
        pageLength: 25,
        columns: [
            {data: 0, orderable: false},
            {data: 1, name: 'KS_DATE'},
            {data: 2, name: 'KS_JENIS_DOKUMEN'},
            {data: 3, name: 'KS_INOUT_NOMOR'},
            {data: 4, name: 'KS_INOUT_DATE'},
            {data: 5, name: 'KS_TONASE_MASUK'},
            {data: 6, name: 'KS_TONASE_KELUAR'},
            {data: 7, name: 'KS_TONASE_SALDO'},
            {data: 8, name: 'KS_BALES_IN'},
            {data: 9, name: 'KS_BALES_OUT'},
            {data: 10, name: 'KS_BALES_SALDO'},
            {data: 11, name: 'KS_PENGELUARAN_KE'},
            {data: 12, name: 'KS_NOMOR_OD'},
            {data: 13, name: 'KS_NOMOR_PACKING_SLIP'},
            {data: 14, name: 'KS_NOPOL', orderable: false, searchable: false}
        ]
    });

    });
    </script>  

<?php
include "koneksi.php";
include "session.php";

$id = (int)($_POST['id'] ?? 0);
$sql = mysqli_query($con, "SELECT d.*, DATE_FORMAT(d.PENG_DATE_DOK, '%d/%m/%Y') AS PENG_DATE_DOK_NEW, DATE_FORMAT(d.PENG_DATE, '%d/%m/%Y %H:%i') AS PENG_DATE_NEW FROM pengeluaran d WHERE d.PENG_ID = $id LIMIT 1");
$data = mysqli_fetch_assoc($sql);
if (!$data) { exit('Data tidak ditemukan.'); }
?>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title"><h2>[ Hapus ] Pencatatan barang Keluar</h2><div class="clearfix"></div></div>
      <div class="x_content">
        <input type="hidden" name="hdn_id" value="<?php echo (int)$data['PENG_ID']; ?>">
        <?php
        $fields = [
          'Jenis Dokumen' => 'PENG_JENIS_DOKUMEN', 'Nomor Dokumen' => 'PENG_NOMOR_DOK',
          'Tanggal Dokumen' => 'PENG_DATE_DOK_NEW', 'Bale' => 'PENG_BALE', 'Jumlah Barang (IW)' => 'PENG_IW',
          'Jumlah Barang (KGM)' => 'PENG_KGM', 'Penerima Barang' => 'PENG_PENERIMA',
          'Kota' => 'PENG_PENERIMA_KOTA', 'Waktu Pengeluaran' => 'PENG_DATE_NEW',
          'Keterangan' => 'PENG_KET', 'Jalur Dokumen' => 'PENG_JALUR_DOK', 'Jenis Barang' => 'PENG_JENIS_BARANG'
        ];
        foreach ($fields as $label => $field) {
          echo '<div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12">' . $label . '</label><div class="col-md-6 col-sm-6 col-xs-12"><input type="text" class="form-control" value="' . htmlspecialchars((string)($data[$field] ?? ''), ENT_QUOTES, 'UTF-8') . '" disabled></div></div>';
        }
        ?>
        <div class="ln_solid"></div>
        <div class="form-group"><div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"><button type="button" id="btn_hapus" class="btn btn-danger">Hapus</button> <button type="button" id="btn_tutup" class="btn btn-primary">Tutup</button></div></div>
      </div>
    </div>
  </div>
</div>
<script>
$(function(){
  $('#btn_hapus').click(function(){ $.post('barangout_hapus.php', $('form').serialize(), function(msg){ $('#div_refresh_data').click(); alert(msg); }); });
  $('#btn_tutup').click(function(){ $('#div_tambah').html(''); });
});
</script>

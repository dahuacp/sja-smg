<?php
include "session.php";
include "koneksi.php";

$id = (int)($_POST['hdn_id'] ?? 0);
$sql = mysqli_query($con, "UPDATE pengeluaran SET PENG_IS_DELETE = 1 WHERE PENG_ID = $id");
if($sql) {
    mysqli_query($con, "UPDATE kartu_stok SET KS_IS_DELETE = 1 WHERE KS_PE_PENG_ID = $id AND KS_JENIS_DOKUMEN != 'PPKB'");
    include "fn_dea.php";
    update_saldo();
    echo "Data berhasil dihapus.";
} else {
    echo "Data gagal dihapus.";
}
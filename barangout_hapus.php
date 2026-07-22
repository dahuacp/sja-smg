<?php
include "session.php";
include "koneksi.php";

$id = (int)($_POST['hdn_id'] ?? 0);
$sql = mysqli_query($con, "UPDATE pengeluaran SET PENG_IS_DELETE = 1 WHERE PENG_ID = $id");
echo $sql ? "Data berhasil dihapus." : "Data gagal dihapus.";
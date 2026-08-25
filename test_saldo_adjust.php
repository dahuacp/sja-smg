<?php
mysqli_report(MYSQLI_REPORT_OFF);
error_reporting(E_ALL);

include "koneksi.php";
include "fn_dea.php";

$pass = 0;
$fail = 0;
$total = 0;

function verify($label, $expected, $actual, $tol = 0.001) {
    global $pass, $fail, $total;
    $total++;
    if (is_array($expected)) {
        $ok = true;
        $detail = [];
        foreach ($expected as $k => $v) {
            if (is_string($v) || is_string($actual[$k])) {
                $is_ok = (string)$v === (string)$actual[$k];
            } else {
                $diff = abs((float)$actual[$k] - (float)$v);
                $is_ok = $diff <= $tol;
            }
            if (!$is_ok) $ok = false;
            $detail[] = "$k: expect=$v actual={$actual[$k]}";
        }
    } elseif (is_string($expected) || is_string($actual)) {
        $ok = (string)$expected === (string)$actual;
        $detail = ["expect=$expected actual=$actual"];
    } else {
        $diff = abs((float)$actual - (float)$expected);
        $ok = $diff <= $tol;
        $detail = ["expect=$expected actual=$actual diff=$diff"];
    }
    $status = $ok ? "PASS" : "FAIL";
    echo "  $status — $label\n";
    if (!$ok) {
        echo "         " . implode(", ", $detail) . "\n";
        $fail++;
    } else {
        $pass++;
    }
    return $ok;
}

function read_saldo($con) {
    $r = mysqli_query($con, "SELECT KS_TONASE_SALDO, KS_BALES_SALDO FROM kartu_stok WHERE KS_IS_DELETE = 0 ORDER BY KS_ID DESC LIMIT 1");
    if (!$r || mysqli_num_rows($r) == 0) return ['KS_TONASE_SALDO' => 0, 'KS_BALES_SALDO' => 0];
    return mysqli_fetch_assoc($r);
}

function walk_chain($con) {
    $r = mysqli_query($con, "SELECT KS_ID, KS_JENIS_DOKUMEN, KS_TONASE_MASUK, KS_TONASE_KELUAR, KS_TONASE_SALDO, KS_BALES_IN, KS_BALES_OUT, KS_BALES_SALDO FROM kartu_stok WHERE KS_IS_DELETE = 0 ORDER BY KS_ID");
    $running_ton = 0;
    $running_bl = 0;
    $all_ok = true;
    while ($row = mysqli_fetch_assoc($r)) {
        if ($row['KS_JENIS_DOKUMEN'] == 'PPKB') {
            $running_ton += $row['KS_TONASE_MASUK'];
            $running_bl += $row['KS_BALES_IN'];
        } else {
            $running_ton -= $row['KS_TONASE_KELUAR'];
            $running_bl -= $row['KS_BALES_OUT'];
        }
        $ton_ok = abs($running_ton - $row['KS_TONASE_SALDO']) <= 0.001;
        $bl_ok = abs($running_bl - $row['KS_BALES_SALDO']) <= 0.001;
        if (!$ton_ok || !$bl_ok) $all_ok = false;
        echo "    KS_ID={$row['KS_ID']}: computed=($running_ton, $running_bl) stored=({$row['KS_TONASE_SALDO']}, {$row['KS_BALES_SALDO']}) " . ($ton_ok && $bl_ok ? "OK" : "MISMATCH") . "\n";
    }
    return $all_ok;
}

// ============================================================
// SETUP: Clean slate
// ============================================================
echo "=== CLEAN SLATE ===\n";
mysqli_query($con, "SET FOREIGN_KEY_CHECKS=0");
mysqli_query($con, "TRUNCATE kartu_stok");
mysqli_query($con, "TRUNCATE pemasukan");
mysqli_query($con, "TRUNCATE pengeluaran");
mysqli_query($con, "TRUNCATE segelin");
mysqli_query($con, "SET FOREIGN_KEY_CHECKS=1");

// Seed: 1 segelin (voyage)
mysqli_query($con, "INSERT INTO segelin (SG_ID, SG_DATE, SG_JML, SG_BL, SG_KG, SG_VOYAGE, SG_KET) 
                     VALUES (1, NOW(), 'V01', 500, 1000, 'VOY-001', 'SESUAI')");
echo "  Seed: segelin SG_ID=1 (KG=1000, BL=500)\n";

// ============================================================
// TC1: TAMBAH PEMASUKAN 1 (IW=200, Bale=50)
// ============================================================
echo "\n=== [TC1] TAMBAH PEMASUKAN 1 (IW=200, Bale=50) ===\n";
mysqli_query($con, "INSERT INTO pemasukan (SG_ID, PE_Date_TPB, PE_No_PPBKB, PE_Date_PPBKB, PE_IW, PE_Bale, PE_Type_Cont, PE_No_Container, PE_Feet, PE_Segel, PE_Jenis_Barang)
                     VALUES (1, NOW(), 'PPKB-001', CURDATE(), 200, 50, 'Container', 'CONT-001', 40, 'SEG-001', 'KERTAS')");
$pe1_id = mysqli_insert_id($con);
echo "  PE_ID=$pe1_id\n";

$ret = inout_tambah();
$parts = explode("_", $ret);
$tonase_saldo = ($parts[2] ?? 0) + 200;
$bales_saldo = ($parts[3] ?? 0) + 50;
mysqli_query($con, "INSERT INTO kartu_stok (KS_PE_PENG_ID, KS_DATE, KS_JENIS_DOKUMEN, KS_INOUT_DATE, KS_INOUT_NOMOR, KS_TONASE_MASUK, KS_TONASE_SALDO, KS_BALES_IN, KS_BALES_SALDO)
                     VALUES ($pe1_id, NOW(), 'PPKB', CURDATE(), 'PPKB-001', 200, $tonase_saldo, 50, $bales_saldo)");

$saldo = read_saldo($con);
verify("Saldo setelah pemasukan 1", ['KS_TONASE_SALDO' => 200, 'KS_BALES_SALDO' => 50], $saldo);

// ============================================================
// TC2: TAMBAH PEMASUKAN 2 (IW=300, Bale=100)
// ============================================================
echo "\n=== [TC2] TAMBAH PEMASUKAN 2 (IW=300, Bale=100) ===\n";
mysqli_query($con, "INSERT INTO pemasukan (SG_ID, PE_Date_TPB, PE_No_PPBKB, PE_Date_PPBKB, PE_IW, PE_Bale, PE_Type_Cont, PE_No_Container, PE_Feet, PE_Segel, PE_Jenis_Barang)
                     VALUES (1, NOW(), 'PPKB-002', CURDATE(), 300, 100, 'Non Container', 'CONT-002', 0, 'SEG-002', 'KERTAS')");
$pe2_id = mysqli_insert_id($con);
echo "  PE_ID=$pe2_id\n";

$ret = inout_tambah();
$parts = explode("_", $ret);
$tonase_saldo = ($parts[2] ?? 0) + 300;
$bales_saldo = ($parts[3] ?? 0) + 100;
mysqli_query($con, "INSERT INTO kartu_stok (KS_PE_PENG_ID, KS_DATE, KS_JENIS_DOKUMEN, KS_INOUT_DATE, KS_INOUT_NOMOR, KS_TONASE_MASUK, KS_TONASE_SALDO, KS_BALES_IN, KS_BALES_SALDO)
                     VALUES ($pe2_id, NOW(), 'PPKB', CURDATE(), 'PPKB-002', 300, $tonase_saldo, 100, $bales_saldo)");

$saldo = read_saldo($con);
verify("Saldo setelah pemasukan 2", ['KS_TONASE_SALDO' => 500, 'KS_BALES_SALDO' => 150], $saldo);

// ============================================================
// TC3: TAMBAH PENGELUARAN 1 + DETIL (Header IW=250, Bale=80, Detil IW=150, Bale=40)
// ============================================================
echo "\n=== [TC3] TAMBAH PENGELUARAN 1 + DETIL (Header IW=250, Bale=80, Detil IW=150, Bale=40) ===\n";
mysqli_query($con, "INSERT INTO pengeluaran (PENG_JENIS_DOKUMEN, PENG_NOMOR_DOK, PENG_DATE_DOK, PENG_JALUR_DOK, PENG_BALE, PENG_JENIS_BARANG, PENG_IW, PENG_KGM, PENG_PENERIMA, PENG_PENERIMA_KOTA, PENG_DATE)
                     VALUES ('BC 25', 'DOK-001', CURDATE(), 'JALUR-1', 80, 'KERTAS', 250, '250000', 'PT ABC', 'JAKARTA', NOW())");
$peng1_id = mysqli_insert_id($con);
echo "  PENG_ID=$peng1_id\n";

$sisa_cek = tonase_sisa2($peng1_id);
verify("Sisa header PENG1", ['KS_TONASE_SALDO' => 250, 'KS_BALES_SALDO' => 80], ['KS_TONASE_SALDO' => $sisa_cek[0], 'KS_BALES_SALDO' => $sisa_cek[1]]);

$ret = inout_tambah();
$parts = explode("_", $ret);
$tonase_saldo = ($parts[2] ?? 0) - 150;
$bales_saldo = ($parts[3] ?? 0) - 40;
mysqli_query($con, "INSERT INTO kartu_stok (KS_PE_PENG_ID, KS_DATE, KS_JENIS_DOKUMEN, KS_INOUT_DATE, KS_INOUT_NOMOR, KS_TONASE_KELUAR, KS_BALES_OUT, KS_PENGELUARAN_KE, KS_NOMOR_OD, KS_NOMOR_PACKING_SLIP, KS_NOPOL, KS_TONASE_SALDO, KS_BALES_SALDO)
                     VALUES ($peng1_id, NOW(), 'BC 25', CURDATE(), 'DOK-001', 150, 40, 1, 'OD-001', 'PS-001', 'B 1234 CD', $tonase_saldo, $bales_saldo)");

$new_sisa = tonase_sisa2($peng1_id);
verify("Sisa header PENG1 setelah detil", ['KS_TONASE_SALDO' => 100, 'KS_BALES_SALDO' => 40], ['KS_TONASE_SALDO' => $new_sisa[0], 'KS_BALES_SALDO' => $new_sisa[1]]);

$saldo = read_saldo($con);
verify("Saldo setelah pengeluaran 1", ['KS_TONASE_SALDO' => 350, 'KS_BALES_SALDO' => 110], $saldo);

// ============================================================
// TC4: TAMBAH PENGELUARAN 2 + DETIL (Header IW=180, Bale=60, Detil IW=100, Bale=30)
// ============================================================
echo "\n=== [TC4] TAMBAH PENGELUARAN 2 + DETIL (Header IW=180, Bale=60, Detil IW=100, Bale=30) ===\n";
mysqli_query($con, "INSERT INTO pengeluaran (PENG_JENIS_DOKUMEN, PENG_NOMOR_DOK, PENG_DATE_DOK, PENG_JALUR_DOK, PENG_BALE, PENG_JENIS_BARANG, PENG_IW, PENG_KGM, PENG_PENERIMA, PENG_PENERIMA_KOTA, PENG_DATE)
                     VALUES ('BC 27', 'DOK-002', CURDATE(), 'JALUR-2', 60, 'KERTAS', 180, '180000', 'PT XYZ', 'SURABAYA', NOW())");
$peng2_id = mysqli_insert_id($con);
echo "  PENG_ID=$peng2_id\n";

$sisa_cek = tonase_sisa2($peng2_id);
verify("Sisa header PENG2", ['KS_TONASE_SALDO' => 180, 'KS_BALES_SALDO' => 60], ['KS_TONASE_SALDO' => $sisa_cek[0], 'KS_BALES_SALDO' => $sisa_cek[1]]);

$ret = inout_tambah();
$parts = explode("_", $ret);
$tonase_saldo = ($parts[2] ?? 0) - 100;
$bales_saldo = ($parts[3] ?? 0) - 30;
mysqli_query($con, "INSERT INTO kartu_stok (KS_PE_PENG_ID, KS_DATE, KS_JENIS_DOKUMEN, KS_INOUT_DATE, KS_INOUT_NOMOR, KS_TONASE_KELUAR, KS_BALES_OUT, KS_PENGELUARAN_KE, KS_NOMOR_OD, KS_NOMOR_PACKING_SLIP, KS_NOPOL, KS_TONASE_SALDO, KS_BALES_SALDO)
                     VALUES ($peng2_id, NOW(), 'BC 27', CURDATE(), 'DOK-002', 100, 30, 1, 'OD-003', 'PS-003', 'B 5678 EF', $tonase_saldo, $bales_saldo)");

$new_sisa = tonase_sisa2($peng2_id);
verify("Sisa header PENG2 setelah detil", ['KS_TONASE_SALDO' => 80, 'KS_BALES_SALDO' => 30], ['KS_TONASE_SALDO' => $new_sisa[0], 'KS_BALES_SALDO' => $new_sisa[1]]);

$saldo = read_saldo($con);
verify("Saldo setelah pengeluaran 2", ['KS_TONASE_SALDO' => 250, 'KS_BALES_SALDO' => 80], $saldo);

echo "\n  Chain sebelum adjust:\n";
$chain_ok = walk_chain($con);
verify("Chain konsisten sebelum adjust", true, $chain_ok);

// ============================================================
// TC5: ADJUST PENGELUARAN 1 (Detil OUT: IW=150->200, Bale=40->50)
//      Proses: out_cek() -> undo old + apply new -> inout_update()
//      Dampak: saldo turun (200-150=50 IW, 50-40=10 Bale)
// ============================================================
echo "\n=== [TC5] ADJUST PENGELUARAN 1 (Detil OUT: IW=150->200, Bale=40->50) ===\n";
$r = mysqli_query($con, "SELECT KS_ID, KS_TONASE_KELUAR, KS_TONASE_SALDO, KS_BALES_OUT, KS_BALES_SALDO FROM kartu_stok WHERE KS_PE_PENG_ID = $peng1_id AND KS_JENIS_DOKUMEN = 'BC 25' AND KS_IS_DELETE = 0 LIMIT 1");
$row = mysqli_fetch_assoc($r);
$detil1_ks_id = $row['KS_ID'];
$old_keluar = $row['KS_TONASE_KELUAR'];
$old_saldo = $row['KS_TONASE_SALDO'];
$old_bale_out = $row['KS_BALES_OUT'];
$old_bale_saldo = $row['KS_BALES_SALDO'];
echo "  KS_ID=$detil1_ks_id: old_IW=$old_keluar old_saldo=$old_saldo old_Bale=$old_bale_out old_bales_saldo=$old_bale_saldo\n";

$new_keluar = 200;
$new_bale_out = 50;

// Undo old, apply new: (old_saldo + old_keluar) - new_keluar
$new_saldo = ($old_saldo + $old_keluar) - $new_keluar;
$new_bale_saldo = ($old_bale_saldo + $old_bale_out) - $new_bale_out;
echo "  new_saldo=($old_saldo+$old_keluar-$new_keluar)=$new_saldo\n";
echo "  new_bale_saldo=($old_bale_saldo+$old_bale_out-$new_bale_out)=$new_bale_saldo\n";

// Check sisa header
$sisa_before = tonase_sisa2($peng1_id);
$undo_sisa_iw = $sisa_before[0] + $old_keluar;
$undo_sisa_bl = $sisa_before[1] + $old_bale_out;
echo "  sisa setelah undo: IW=$undo_sisa_iw, Bale=$undo_sisa_bl\n";
if ($new_keluar > $undo_sisa_iw + 1) {
    echo "  SKIP: over-shipment pada edit\n";
} else {
    mysqli_query($con, "UPDATE kartu_stok SET KS_TONASE_KELUAR = $new_keluar, KS_TONASE_SALDO = $new_saldo, KS_BALES_OUT = $new_bale_out, KS_BALES_SALDO = $new_bale_saldo WHERE KS_ID = $detil1_ks_id");
    inout_update($detil1_ks_id, $new_saldo, $new_bale_saldo);

    // Update PENG_KET header
    $sisa_after = tonase_sisa2($peng1_id);
    if ($sisa_after[0] <= 0) {
        mysqli_query($con, "UPDATE pengeluaran SET PENG_KET = 'SELESAI' WHERE PENG_ID = $peng1_id");
        echo "  PENG_KET PENG1 -> SELESAI\n";
    } else {
        mysqli_query($con, "UPDATE pengeluaran SET PENG_KET = '' WHERE PENG_ID = $peng1_id");
        echo "  PENG_KET PENG1 -> ''\n";
    }

    $saldo = read_saldo($con);
    verify("Saldo setelah adjust PENG1 (naik 50 IW, 10 Bale)", ['KS_TONASE_SALDO' => 200, 'KS_BALES_SALDO' => 70], $saldo);

    $sisa_after = tonase_sisa2($peng1_id);
    verify("Sisa header PENG1 setelah adjust", ['KS_TONASE_SALDO' => 50, 'KS_BALES_SALDO' => 30], ['KS_TONASE_SALDO' => $sisa_after[0], 'KS_BALES_SALDO' => $sisa_after[1]]);

    $r = mysqli_query($con, "SELECT PENG_KET FROM pengeluaran WHERE PENG_ID = $peng1_id");
    $row = mysqli_fetch_assoc($r);
    verify("PENG_KET PENG1 (masih sisa 50/30)", '', $row['PENG_KET']);
}

// ============================================================
// TC6: ADJUST PEMASUKAN 1 (IN: IW=200->250, Bale=50->60)
//      Proses: in_cek() -> undo old + apply new -> inout_update()
//      Dampak: saldo naik (250-200=50 IW, 60-50=10 Bale)
// ============================================================
echo "\n=== [TC6] ADJUST PEMASUKAN 1 (IN: IW=200->250, Bale=50->60) ===\n";
$r = mysqli_query($con, "SELECT KS_ID, KS_TONASE_MASUK, KS_TONASE_SALDO, KS_BALES_IN, KS_BALES_SALDO FROM kartu_stok WHERE KS_PE_PENG_ID = $pe1_id AND KS_JENIS_DOKUMEN = 'PPKB' AND KS_IS_DELETE = 0 LIMIT 1");
$row = mysqli_fetch_assoc($r);
$in1_ks_id = $row['KS_ID'];
$old_masuk = $row['KS_TONASE_MASUK'];
$old_saldo = $row['KS_TONASE_SALDO'];
$old_bale_in = $row['KS_BALES_IN'];
$old_bale_saldo = $row['KS_BALES_SALDO'];
echo "  KS_ID=$in1_ks_id: old_IW=$old_masuk old_saldo=$old_saldo old_Bale=$old_bale_in old_bales_saldo=$old_bale_saldo\n";

$new_masuk = 250;
$new_bale_in = 60;

// Undo old, apply new: (old_saldo - old_masuk) + new_masuk
$new_saldo = ($old_saldo - $old_masuk) + $new_masuk;
$new_bale_saldo = ($old_bale_saldo - $old_bale_in) + $new_bale_in;
echo "  new_saldo=($old_saldo-$old_masuk+$new_masuk)=$new_saldo\n";

mysqli_query($con, "UPDATE kartu_stok SET KS_TONASE_MASUK = $new_masuk, KS_TONASE_SALDO = $new_saldo, KS_BALES_IN = $new_bale_in, KS_BALES_SALDO = $new_bale_saldo WHERE KS_ID = $in1_ks_id");
inout_update($in1_ks_id, $new_saldo, $new_bale_saldo);

// Juga update pemasukan header
mysqli_query($con, "UPDATE pemasukan SET PE_IW = $new_masuk, PE_Bale = $new_bale_in WHERE PE_ID = $pe1_id");

$saldo = read_saldo($con);
verify("Saldo setelah adjust IN1 (naik 50 IW, 10 Bale)", ['KS_TONASE_SALDO' => 250, 'KS_BALES_SALDO' => 80], $saldo);

// ============================================================
// TC7: ADJUST PENGELUARAN 2 (Detil OUT: IW=100->50, Bale=30->20)
//      Proses: out_cek() -> undo old + apply new -> inout_update()
//      Dampak: saldo naik (100-50=50 IW, 30-20=10 Bale)
// ============================================================
echo "\n=== [TC7] ADJUST PENGELUARAN 2 (Detil OUT: IW=100->50, Bale=30->20) ===\n";
$r = mysqli_query($con, "SELECT KS_ID, KS_TONASE_KELUAR, KS_TONASE_SALDO, KS_BALES_OUT, KS_BALES_SALDO FROM kartu_stok WHERE KS_PE_PENG_ID = $peng2_id AND KS_JENIS_DOKUMEN = 'BC 27' AND KS_IS_DELETE = 0 LIMIT 1");
$row = mysqli_fetch_assoc($r);
$detil2_ks_id = $row['KS_ID'];
$old_keluar = $row['KS_TONASE_KELUAR'];
$old_saldo = $row['KS_TONASE_SALDO'];
$old_bale_out = $row['KS_BALES_OUT'];
$old_bale_saldo = $row['KS_BALES_SALDO'];
echo "  KS_ID=$detil2_ks_id: old_IW=$old_keluar old_saldo=$old_saldo old_Bale=$old_bale_out old_bales_saldo=$old_bale_saldo\n";

$new_keluar = 50;
$new_bale_out = 20;

$new_saldo = ($old_saldo + $old_keluar) - $new_keluar;
$new_bale_saldo = ($old_bale_saldo + $old_bale_out) - $new_bale_out;
echo "  new_saldo=($old_saldo+$old_keluar-$new_keluar)=$new_saldo\n";

$sisa_before = tonase_sisa2($peng2_id);
$undo_sisa_iw = $sisa_before[0] + $old_keluar;
echo "  sisa setelah undo: IW=$undo_sisa_iw\n";
if ($new_keluar > $undo_sisa_iw + 1) {
    echo "  SKIP: over-shipment pada edit\n";
} else {
    mysqli_query($con, "UPDATE kartu_stok SET KS_TONASE_KELUAR = $new_keluar, KS_TONASE_SALDO = $new_saldo, KS_BALES_OUT = $new_bale_out, KS_BALES_SALDO = $new_bale_saldo WHERE KS_ID = $detil2_ks_id");
    inout_update($detil2_ks_id, $new_saldo, $new_bale_saldo);

    $sisa_after = tonase_sisa2($peng2_id);
    if ($sisa_after[0] <= 0) {
        mysqli_query($con, "UPDATE pengeluaran SET PENG_KET = 'SELESAI' WHERE PENG_ID = $peng2_id");
        echo "  PENG_KET PENG2 -> SELESAI\n";
    } else {
        mysqli_query($con, "UPDATE pengeluaran SET PENG_KET = '' WHERE PENG_ID = $peng2_id");
        echo "  PENG_KET PENG2 -> ''\n";
    }

    $saldo = read_saldo($con);
    verify("Saldo setelah adjust PENG2 (turun 50 IW, 10 Bale)", ['KS_TONASE_SALDO' => 300, 'KS_BALES_SALDO' => 90], $saldo);
}

// ============================================================
// TC8: VERIFIKASI FINAL — Full chain consistency check
// ============================================================
echo "\n=== [TC8] VERIFIKASI FINAL ===\n";
$saldo = read_saldo($con);
verify("Saldo akhir", ['KS_TONASE_SALDO' => 300, 'KS_BALES_SALDO' => 90], $saldo);

echo "\n  Final chain:\n";
$chain_ok = walk_chain($con);
verify("Semua row konsisten setelah semua adjust", true, $chain_ok);

// Cek sisa header
$sisa_p1 = tonase_sisa2($peng1_id);
$sisa_p2 = tonase_sisa2($peng2_id);
echo "  Sisa PENG1: IW={$sisa_p1[0]}, Bale={$sisa_p1[1]}\n";
echo "  Sisa PENG2: IW={$sisa_p2[0]}, Bale={$sisa_p2[1]}\n";

$r = mysqli_query($con, "SELECT PENG_KET FROM pengeluaran WHERE PENG_ID = $peng1_id");
$row = mysqli_fetch_assoc($r);
echo "  PENG_KET PENG1: '{$row['PENG_KET']}'\n";
$r = mysqli_query($con, "SELECT PENG_KET FROM pengeluaran WHERE PENG_ID = $peng2_id");
$row = mysqli_fetch_assoc($r);
echo "  PENG_KET PENG2: '{$row['PENG_KET']}'\n";

// ============================================================
// FINAL SUMMARY
// ============================================================
echo "\n========================================\n";
echo "  TOTAL TESTS: $total\n";
echo "  PASS: $pass\n";
echo "  FAIL: $fail\n";
echo "========================================\n";

mysqli_close($con);
?>

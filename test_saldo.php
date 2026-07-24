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
                     VALUES (1, NOW(), 'V01', 200, 500, 'VOY-001', 'SESUAI')");
echo "  Seed: segelin SG_ID=1 (KG=500, BL=200)\n";

// ============================================================
// TC1: TAMBAH IN PERTAMA (PE_ID=1, IW=200, Bale=50)
// ============================================================
echo "\n=== [TC1] TAMBAH IN PERTAMA (IW=200, Bale=50) ===\n";
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
verify("Saldo setelah IN pertama", ['KS_TONASE_SALDO' => 200, 'KS_BALES_SALDO' => 50], $saldo);

// ============================================================
// TC2: TAMBAH IN KEDUA (PE_ID=2, IW=300, Bale=100)
// ============================================================
echo "\n=== [TC2] TAMBAH IN KEDUA (IW=300, Bale=100) ===\n";
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
verify("Saldo setelah IN kedua", ['KS_TONASE_SALDO' => 500, 'KS_BALES_SALDO' => 150], $saldo);

// ============================================================
// TC3: TAMBAH HEADER OUT (PENG_ID=1, BC25, IW=150, Bale=40) — TIDAK PENGARUH SALDO
// ============================================================
echo "\n=== [TC3] TAMBAH HEADER OUT (BC25, IW=150, Bale=40) — tidak pengaruh saldo ===\n";
mysqli_query($con, "INSERT INTO pengeluaran (PENG_JENIS_DOKUMEN, PENG_NOMOR_DOK, PENG_DATE_DOK, PENG_JALUR_DOK, PENG_BALE, PENG_JENIS_BARANG, PENG_IW, PENG_KGM, PENG_PENERIMA, PENG_PENERIMA_KOTA, PENG_DATE)
                     VALUES ('BC 25', 'DOK-001', CURDATE(), 'JALUR-1', 40, 'KERTAS', 150, '150000', 'PT ABC', 'JAKARTA', NOW())");
$peng1_id = mysqli_insert_id($con);
echo "  PENG_ID=$peng1_id\n";

$saldo = read_saldo($con);
verify("Saldo tetap 500/150 setelah header OUT", ['KS_TONASE_SALDO' => 500, 'KS_BALES_SALDO' => 150], $saldo);

// ============================================================
// TC4: TAMBAH DETIL OUT PERTAMA (IW=100, Bale=25)
// ============================================================
echo "\n=== [TC4] TAMBAH DETIL OUT (IW=100, Bale=25) ===\n";
// Cek tonase_sisa (simulasi validasi)
$sisa_cek = tonase_sisa2($peng1_id);
$sisa_ton = $sisa_cek[0];
$sisa_bl = $sisa_cek[1];
echo "  Sisa sebelum: IW=$sisa_ton, Bale=$sisa_bl\n";
verify("Sisa awal = header value (150, 40)", ['KS_TONASE_SALDO' => 150, 'KS_BALES_SALDO' => 40], ['KS_TONASE_SALDO' => $sisa_ton, 'KS_BALES_SALDO' => $sisa_bl]);

// Validasi over-shipment
$proposed_iw = 100;
$proposed_bl = 25;
if ($proposed_iw > $sisa_ton + 1) {
    echo "  SKIP: over-shipment\n";
} else {
    $ret = inout_tambah();
    $parts = explode("_", $ret);
    $tonase_saldo = ($parts[2] ?? 0) - $proposed_iw;
    $bales_saldo = ($parts[3] ?? 0) - $proposed_bl;
    mysqli_query($con, "INSERT INTO kartu_stok (KS_PE_PENG_ID, KS_DATE, KS_JENIS_DOKUMEN, KS_INOUT_DATE, KS_INOUT_NOMOR, KS_TONASE_KELUAR, KS_BALES_OUT, KS_PENGELUARAN_KE, KS_NOMOR_OD, KS_NOMOR_PACKING_SLIP, KS_NOPOL, KS_TONASE_SALDO, KS_BALES_SALDO)
                         VALUES ($peng1_id, NOW(), 'BC 25', CURDATE(), 'DOK-001', $proposed_iw, $proposed_bl, 1, 'OD-001', 'PS-001', 'B 1234 CD', $tonase_saldo, $bales_saldo)");

    // Update PENG_KET if sisa <= 0
    $new_sisa = tonase_sisa2($peng1_id);
    if ($new_sisa[0] <= 0) {
        mysqli_query($con, "UPDATE pengeluaran SET PENG_KET = 'SELESAI' WHERE PENG_ID = $peng1_id");
        echo "  PENG_KET -> SELESAI\n";
    }

    $saldo = read_saldo($con);
    verify("Saldo setelah detil OUT (100)", ['KS_TONASE_SALDO' => 400, 'KS_BALES_SALDO' => 125], $saldo);
}

// ============================================================
// TC5: CEK SISA KUOTA HEADER
// ============================================================
echo "\n=== [TC5] CEK SISA KUOTA HEADER PENG_ID=$peng1_id ===\n";
$sisa = tonase_sisa2($peng1_id);
verify("Sisa IW = 150-100 = 50", 50, $sisa[0]);
verify("Sisa Bale = 40-25 = 15", 15, $sisa[1]);

// ============================================================
// TC6: TAMBAH DETIL OUT KEDUA (IW=50, Bale=15) — habisin sisa
// ============================================================
echo "\n=== [TC6] TAMBAH DETIL OUT KEDUA (IW=50, Bale=15) — habisin sisa ===\n";
$sisa_cek = tonase_sisa2($peng1_id);
$sisa_ton = $sisa_cek[0];
$sisa_bl = $sisa_cek[1];
echo "  Sisa sebelum: IW=$sisa_ton, Bale=$sisa_bl\n";
verify("Sisa masih 50/15", 50, $sisa_ton);

$proposed_iw = 50;
$proposed_bl = 15;
if ($proposed_iw > $sisa_ton + 1) {
    echo "  SKIP: over-shipment\n";
} else {
    $ret = inout_tambah();
    $parts = explode("_", $ret);
    $tonase_saldo = ($parts[2] ?? 0) - $proposed_iw;
    $bales_saldo = ($parts[3] ?? 0) - $proposed_bl;
    mysqli_query($con, "INSERT INTO kartu_stok (KS_PE_PENG_ID, KS_DATE, KS_JENIS_DOKUMEN, KS_INOUT_DATE, KS_INOUT_NOMOR, KS_TONASE_KELUAR, KS_BALES_OUT, KS_PENGELUARAN_KE, KS_NOMOR_OD, KS_NOMOR_PACKING_SLIP, KS_NOPOL, KS_TONASE_SALDO, KS_BALES_SALDO)
                         VALUES ($peng1_id, NOW(), 'BC 25', CURDATE(), 'DOK-001', $proposed_iw, $proposed_bl, 2, 'OD-002', 'PS-002', 'B 5678 EF', $tonase_saldo, $bales_saldo)");

    $new_sisa = tonase_sisa2($peng1_id);
    if ($new_sisa[0] <= 0) {
        mysqli_query($con, "UPDATE pengeluaran SET PENG_KET = 'SELESAI' WHERE PENG_ID = $peng1_id");
        echo "  PENG_KET -> SELESAI\n";
    }

    $saldo = read_saldo($con);
    verify("Saldo setelah detil OUT kedua (50)", ['KS_TONASE_SALDO' => 350, 'KS_BALES_SALDO' => 110], $saldo);
}

// ============================================================
// TC7: CEK HEADER SELESAI
// ============================================================
echo "\n=== [TC7] CEK HEADER SELESAI PENG_ID=$peng1_id ===\n";
$sisa = tonase_sisa2($peng1_id);
verify("Sisa IW = 0 (habis)", 0, $sisa[0]);
verify("Sisa Bale = 0 (habis)", 0, $sisa[1]);
$r = mysqli_query($con, "SELECT PENG_KET FROM pengeluaran WHERE PENG_ID = $peng1_id");
$row = mysqli_fetch_assoc($r);
verify("PENG_KET = 'SELESAI'", 'SELESAI', $row['PENG_KET']);

// ============================================================
// TC8: OVER-SHIPMENT DITOLAK
// ============================================================
echo "\n=== [TC8] OVER-SHIPMENT DITOLAK ===\n";
$sisa_cek = tonase_sisa2($peng1_id);
$sisa_ton = $sisa_cek[0];
echo "  Sisa IW=$sisa_ton (harus 0)\n";
if ($sisa_ton < -1) {
    echo "  Over-shipment DITOLAK\n";
} else {
    $proposed_iw = 10;
    if ($proposed_iw > $sisa_ton + 1) {
        echo "  PASS — Over-shipment ditolak (proposed=$proposed_iw > sisa=$sisa_ton)\n";
    } else {
        echo "  FAIL — Over-shipment seharusnya ditolak\n";
    }
}

// ============================================================
// TC9: TAMBAH HEADER OUT KEDUA (PENG_ID=2, BC27, IW=250, Bale=80)
// ============================================================
echo "\n=== [TC9] TAMBAH HEADER OUT KEDUA (BC27, IW=250, Bale=80) ===\n";
mysqli_query($con, "INSERT INTO pengeluaran (PENG_JENIS_DOKUMEN, PENG_NOMOR_DOK, PENG_DATE_DOK, PENG_JALUR_DOK, PENG_BALE, PENG_JENIS_BARANG, PENG_IW, PENG_KGM, PENG_PENERIMA, PENG_PENERIMA_KOTA, PENG_DATE)
                     VALUES ('BC 27', 'DOK-002', CURDATE(), 'JALUR-2', 80, 'PLASTIK', 250, '250000', 'PT XYZ', 'SURABAYA', NOW())");
$peng2_id = mysqli_insert_id($con);
echo "  PENG_ID=$peng2_id\n";

$saldo = read_saldo($con);
verify("Saldo tetap 350/110 setelah header OUT kedua", ['KS_TONASE_SALDO' => 350, 'KS_BALES_SALDO' => 110], $saldo);

// ============================================================
// TC10: TAMBAH DETIL OUT KETIGA (ke PENG_ID=2, IW=150, Bale=50)
// ============================================================
echo "\n=== [TC10] TAMBAH DETIL OUT (ke PENG_ID=2, IW=150, Bale=50) ===\n";
$sisa_cek = tonase_sisa2($peng2_id);
echo "  Sisa PENG_ID=2: IW={$sisa_cek[0]}, Bale={$sisa_cek[1]}\n";

$proposed_iw = 150;
$proposed_bl = 50;
if ($proposed_iw > $sisa_cek[0] + 1) {
    echo "  SKIP: over-shipment\n";
} else {
    $ret = inout_tambah();
    $parts = explode("_", $ret);
    $tonase_saldo = ($parts[2] ?? 0) - $proposed_iw;
    $bales_saldo = ($parts[3] ?? 0) - $proposed_bl;
    mysqli_query($con, "INSERT INTO kartu_stok (KS_PE_PENG_ID, KS_DATE, KS_JENIS_DOKUMEN, KS_INOUT_DATE, KS_INOUT_NOMOR, KS_TONASE_KELUAR, KS_BALES_OUT, KS_PENGELUARAN_KE, KS_NOMOR_OD, KS_NOMOR_PACKING_SLIP, KS_NOPOL, KS_TONASE_SALDO, KS_BALES_SALDO)
                         VALUES ($peng2_id, NOW(), 'BC 27', CURDATE(), 'DOK-002', $proposed_iw, $proposed_bl, 1, 'OD-003', 'PS-003', 'B 9012 GH', $tonase_saldo, $bales_saldo)");

    $new_sisa = tonase_sisa2($peng2_id);
    if ($new_sisa[0] <= 0) {
        mysqli_query($con, "UPDATE pengeluaran SET PENG_KET = 'SELESAI' WHERE PENG_ID = $peng2_id");
    }

    $saldo = read_saldo($con);
    verify("Saldo setelah detil OUT ketiga (150)", ['KS_TONASE_SALDO' => 200, 'KS_BALES_SALDO' => 60], $saldo);
}

// ============================================================
// TC11: SIMULASI EDIT DETIL OUT — NAIK (150→200 IW)
// Proses: out_cek() → undo old + apply new → inout_update()
// ============================================================
echo "\n=== [TC11] EDIT DETIL OUT — NAIK (150→200 IW, 50→60 Bale) ===\n";
$edit_ks_id = 0;
$r = mysqli_query($con, "SELECT KS_ID, KS_TONASE_KELUAR, KS_TONASE_SALDO, KS_BALES_OUT, KS_BALES_SALDO FROM kartu_stok WHERE KS_PE_PENG_ID = $peng2_id AND KS_IS_DELETE = 0 LIMIT 1");
if ($row = mysqli_fetch_assoc($r)) {
    $edit_ks_id = $row['KS_ID'];
    $old_iw = $row['KS_TONASE_KELUAR'];
    $old_saldo = $row['KS_TONASE_SALDO'];
    $old_bl = $row['KS_BALES_OUT'];
    $old_bl_saldo = $row['KS_BALES_SALDO'];
    echo "  KS_ID=$edit_ks_id: old_IW=$old_iw old_saldo=$old_saldo old_Bale=$old_bl old_bales_saldo=$old_bl_saldo\n";

    $new_iw = 200;
    $new_bl = 60;
    // Undo old, apply new
    $new_saldo = ($old_saldo + $old_iw) - $new_iw;
    $new_bl_saldo = ($old_bl_saldo + $old_bl) - $new_bl;
    echo "  new_saldo=($old_saldo+$old_iw-$new_iw)=$new_saldo\n";

    // Check tonase_sisa for the header (allow edit if enough sisa)
    $sisa_before = tonase_sisa2($peng2_id);
    $undo_sisa_iw = $sisa_before[0] + $old_iw; // kembalikan old ke sisa
    echo "  sisa setelah undo old: IW=$undo_sisa_iw\n";
    if ($new_iw > $undo_sisa_iw + 1) {
        echo "  SKIP: over-shipment pada edit\n";
    } else {
        mysqli_query($con, "UPDATE kartu_stok SET KS_TONASE_KELUAR = $new_iw, KS_TONASE_SALDO = $new_saldo, KS_BALES_OUT = $new_bl, KS_BALES_SALDO = $new_bl_saldo WHERE KS_ID = $edit_ks_id");
        inout_update($edit_ks_id, $new_saldo, $new_bl_saldo);

        $saldo = read_saldo($con);
        verify("Saldo setelah edit OUT naik (200-150=50)", ['KS_TONASE_SALDO' => 150, 'KS_BALES_SALDO' => 50], $saldo);
    }
}

// ============================================================
// TC12: SIMULASI EDIT DETIL OUT — TURUN (200→80 IW, 60→20 Bale)
// ============================================================
echo "\n=== [TC12] EDIT DETIL OUT — TURUN (200→80 IW, 60→20 Bale) ===\n";
$r = mysqli_query($con, "SELECT KS_ID, KS_TONASE_KELUAR, KS_TONASE_SALDO, KS_BALES_OUT, KS_BALES_SALDO FROM kartu_stok WHERE KS_ID = $edit_ks_id AND KS_IS_DELETE = 0");
if ($row = mysqli_fetch_assoc($r)) {
    $old_iw = $row['KS_TONASE_KELUAR'];
    $old_saldo = $row['KS_TONASE_SALDO'];
    $old_bl = $row['KS_BALES_OUT'];
    $old_bl_saldo = $row['KS_BALES_SALDO'];

    $new_iw = 80;
    $new_bl = 20;
    $new_saldo = ($old_saldo + $old_iw) - $new_iw;
    $new_bl_saldo = ($old_bl_saldo + $old_bl) - $new_bl;
    echo "  new_saldo=($old_saldo+$old_iw-$new_iw)=$new_saldo\n";

    $undo_sisa = tonase_sisa2($peng2_id);
    $undo_sisa_iw = $undo_sisa[0] + $old_iw;
    if ($new_iw > $undo_sisa_iw + 1) {
        echo "  SKIP: over-shipment\n";
    } else {
        mysqli_query($con, "UPDATE kartu_stok SET KS_TONASE_KELUAR = $new_iw, KS_TONASE_SALDO = $new_saldo, KS_BALES_OUT = $new_bl, KS_BALES_SALDO = $new_bl_saldo WHERE KS_ID = $edit_ks_id");
        inout_update($edit_ks_id, $new_saldo, $new_bl_saldo);

        $saldo = read_saldo($con);
        verify("Saldo setelah edit OUT turun (80 vs 200, naik 120)", ['KS_TONASE_SALDO' => 270, 'KS_BALES_SALDO' => 90], $saldo);
    }
}

// ============================================================
// TC13: SIMULASI EDIT IN — UBAH NILAI (PE_ID=1, IW=200→150, Bale=50→30)
// Proses: in_cek() → undo old + apply new → inout_update()
// ============================================================
echo "\n=== [TC13] EDIT IN — UBAH NILAI (PE_ID=1, IW=200→150, Bale=50→30) ===\n";
$r = mysqli_query($con, "SELECT KS_ID, KS_JENIS_DOKUMEN, KS_TONASE_MASUK, KS_TONASE_KELUAR, KS_TONASE_SALDO, KS_BALES_IN, KS_BALES_OUT, KS_BALES_SALDO FROM kartu_stok WHERE KS_PE_PENG_ID = $pe1_id AND KS_JENIS_DOKUMEN = 'PPKB' AND KS_IS_DELETE = 0 LIMIT 1");
if ($row = mysqli_fetch_assoc($r)) {
    $ks_id = $row['KS_ID'];
    $old_iw = $row['KS_TONASE_MASUK'];
    $old_saldo = $row['KS_TONASE_SALDO'];
    $old_bl = $row['KS_BALES_IN'];
    $old_bl_saldo = $row['KS_BALES_SALDO'];
    echo "  KS_ID=$ks_id: old_IW=$old_iw old_saldo=$old_saldo old_Bale=$old_bl old_bales_saldo=$old_bl_saldo\n";

    $new_iw = 150;
    $new_bl = 30;
    $new_saldo = ($old_saldo - $old_iw) + $new_iw;
    $new_bl_saldo = ($old_bl_saldo - $old_bl) + $new_bl;
    echo "  new_saldo=($old_saldo-$old_iw+$new_iw)=$new_saldo\n";

    mysqli_query($con, "UPDATE kartu_stok SET KS_TONASE_MASUK = $new_iw, KS_TONASE_SALDO = $new_saldo, KS_BALES_IN = $new_bl, KS_BALES_SALDO = $new_bl_saldo WHERE KS_ID = $ks_id");
    inout_update($ks_id, $new_saldo, $new_bl_saldo);

    $saldo = read_saldo($con);
    verify("Saldo setelah edit IN (turun 50 IW, 20 Bale)", ['KS_TONASE_SALDO' => 220, 'KS_BALES_SALDO' => 70], $saldo);
}

// ============================================================
// TC14: HAPUS DETIL OUT (soft-delete kartu_stok + update_saldo())
// ============================================================
echo "\n=== [TC14] HAPUS DETIL OUT (soft-delete + update_saldo) ===\n";
$del_ks_id = $edit_ks_id; // detil PENG_ID=2
mysqli_query($con, "UPDATE kartu_stok SET KS_IS_DELETE = 1 WHERE KS_ID = $del_ks_id");
update_saldo();

$saldo = read_saldo($con);
verify("Saldo setelah hapus detil OUT (kembali 80 IW, 20 Bale)", ['KS_TONASE_SALDO' => 300, 'KS_BALES_SALDO' => 90], $saldo);

// Cek PENG_KET kembali ke kosong (karena sisa > 0 lagi)
$sisa = tonase_sisa2($peng2_id);
echo "  Sisa PENG_ID=2 setelah hapus detil: IW={$sisa[0]}, Bale={$sisa[1]}\n";
if ($sisa[0] > 0) {
    mysqli_query($con, "UPDATE pengeluaran SET PENG_KET = '' WHERE PENG_ID = $peng2_id");
    echo "  PENG_KET -> '' (kosong)\n";
}

// ============================================================
// TC15: HAPUS IN PERTAMA (soft-delete pemasukan + kartu_stok + update_saldo())
// ============================================================
echo "\n=== [TC15] HAPUS IN PERTAMA (PE_ID=$pe1_id) ===\n";
mysqli_query($con, "UPDATE pemasukan SET PE_IS_DELETE = 1 WHERE PE_ID = $pe1_id");
mysqli_query($con, "UPDATE kartu_stok SET KS_IS_DELETE = 1 WHERE KS_PE_PENG_ID = $pe1_id AND KS_JENIS_DOKUMEN = 'PPKB'");
update_saldo();

$saldo = read_saldo($con);
verify("Saldo setelah hapus IN (hilang 150 IW, 30 Bale)", ['KS_TONASE_SALDO' => 150, 'KS_BALES_SALDO' => 60], $saldo);

// ============================================================
// TC16: EDIT IN DI TENGAH — CASCADE CHECK
// ============================================================
echo "\n=== [TC16] EDIT IN DI TENGAH — CASCADE CHECK ===\n";
// Sisa satu IN: PE_ID=2 (IW=300, Bale=100) → saldo 300/100 setelah hapus OUT + IN1
// Tapi setelah TC14 dan TC15: saldo = 200/80
// Mari kita edit PE_ID=2 dari IW=300→100, Bale=100→50
$r = mysqli_query($con, "SELECT KS_ID, KS_TONASE_MASUK, KS_TONASE_SALDO, KS_BALES_IN, KS_BALES_SALDO FROM kartu_stok WHERE KS_PE_PENG_ID = $pe2_id AND KS_JENIS_DOKUMEN = 'PPKB' AND KS_IS_DELETE = 0 LIMIT 1");
if ($row = mysqli_fetch_assoc($r)) {
    $ks_id = $row['KS_ID'];
    $old_iw = $row['KS_TONASE_MASUK'];
    $old_saldo = $row['KS_TONASE_SALDO'];
    $old_bl = $row['KS_BALES_IN'];
    $old_bl_saldo = $row['KS_BALES_SALDO'];
    echo "  KS_ID=$ks_id: old_IW=$old_iw old_saldo=$old_saldo\n";

    $new_iw = 100;
    $new_bl = 50;
    $new_saldo = ($old_saldo - $old_iw) + $new_iw;
    $new_bl_saldo = ($old_bl_saldo - $old_bl) + $new_bl;
    echo "  new_saldo=($old_saldo-$old_iw+$new_iw)=$new_saldo\n";

    mysqli_query($con, "UPDATE kartu_stok SET KS_TONASE_MASUK = $new_iw, KS_TONASE_SALDO = $new_saldo, KS_BALES_IN = $new_bl, KS_BALES_SALDO = $new_bl_saldo WHERE KS_ID = $ks_id");
    inout_update($ks_id, $new_saldo, $new_bl_saldo);

    $saldo = read_saldo($con);
    verify("Saldo setelah cascade edit IN (300→100, turun 200)", ['KS_TONASE_SALDO' => -50, 'KS_BALES_SALDO' => 10], $saldo);

    // Verifikasi ALL rows konsisten: baca semua saldo
    echo "\n  Verifikasi seluruh chain:\n";
    $r2 = mysqli_query($con, "SELECT KS_ID, KS_JENIS_DOKUMEN, KS_TONASE_MASUK, KS_TONASE_KELUAR, KS_TONASE_SALDO, KS_BALES_IN, KS_BALES_OUT, KS_BALES_SALDO FROM kartu_stok WHERE KS_IS_DELETE = 0 ORDER BY KS_ID");
    $running_ton = 0;
    $running_bl = 0;
    $all_ok = true;
    while ($row2 = mysqli_fetch_assoc($r2)) {
        if ($row2['KS_JENIS_DOKUMEN'] == 'PPKB') {
            $running_ton += $row2['KS_TONASE_MASUK'];
            $running_bl += $row2['KS_BALES_IN'];
        } else {
            $running_ton -= $row2['KS_TONASE_KELUAR'];
            $running_bl -= $row2['KS_BALES_OUT'];
        }
        $ton_diff = abs($running_ton - $row2['KS_TONASE_SALDO']);
        $bl_diff = abs($running_bl - $row2['KS_BALES_SALDO']);
        $this_ok = $ton_diff <= 0.001 && $bl_diff <= 0.001;
        if (!$this_ok) $all_ok = false;
        echo "    KS_ID={$row2['KS_ID']}: computed=($running_ton, $running_bl) stored=({$row2['KS_TONASE_SALDO']}, {$row2['KS_BALES_SALDO']}) " . ($this_ok ? "OK" : "MISMATCH") . "\n";
    }
    verify("Semua row konsisten setelah cascade", true, $all_ok);
}

// ============================================================
// TC17: UPDATE_SALDO() FULL REBUILD — corrupt lalu repair
// ============================================================
echo "\n=== [TC17] UPDATE_SALDO() FULL REBUILD ===\n";
// Corrupt 1 row saldo
$r = mysqli_query($con, "SELECT KS_ID FROM kartu_stok WHERE KS_IS_DELETE = 0 ORDER BY KS_ID LIMIT 1");
if ($row = mysqli_fetch_assoc($r)) {
    $corrupt_id = $row['KS_ID'];
    mysqli_query($con, "UPDATE kartu_stok SET KS_TONASE_SALDO = 99999, KS_BALES_SALDO = 99999 WHERE KS_ID = $corrupt_id");
    echo "  Corrupt KS_ID=$corrupt_id → saldo=99999\n";

    // Verifikasi corrupt
    $r2 = mysqli_query($con, "SELECT KS_TONASE_SALDO, KS_BALES_SALDO FROM kartu_stok WHERE KS_ID = $corrupt_id");
    $row2 = mysqli_fetch_assoc($r2);
    verify("Saldo corrupt menjadi 99999", 99999, $row2['KS_TONASE_SALDO']);

    // Rebuild
    update_saldo();

    // Verifikasi semua row konsisten lagi
    $r3 = mysqli_query($con, "SELECT KS_ID, KS_JENIS_DOKUMEN, KS_TONASE_MASUK, KS_TONASE_KELUAR, KS_TONASE_SALDO, KS_BALES_IN, KS_BALES_OUT, KS_BALES_SALDO FROM kartu_stok WHERE KS_IS_DELETE = 0 ORDER BY KS_ID");
    $running_ton = 0;
    $running_bl = 0;
    $all_ok = true;
    while ($row3 = mysqli_fetch_assoc($r3)) {
        if ($row3['KS_JENIS_DOKUMEN'] == 'PPKB') {
            $running_ton += $row3['KS_TONASE_MASUK'];
            $running_bl += $row3['KS_BALES_IN'];
        } else {
            $running_ton -= $row3['KS_TONASE_KELUAR'];
            $running_bl -= $row3['KS_BALES_OUT'];
        }
        $ton_diff = abs($running_ton - $row3['KS_TONASE_SALDO']);
        $bl_diff = abs($running_bl - $row3['KS_BALES_SALDO']);
        $this_ok = $ton_diff <= 0.001 && $bl_diff <= 0.001;
        if (!$this_ok) $all_ok = false;
        echo "    KS_ID={$row3['KS_ID']}: computed=($running_ton, $running_bl) stored=({$row3['KS_TONASE_SALDO']}, {$row3['KS_BALES_SALDO']}) " . ($this_ok ? "OK" : "MISMATCH") . "\n";
    }
    verify("Semua row konsisten setelah update_saldo()", true, $all_ok);
}

// ============================================================
// TC18: HAPUS HEADER OUT — cascade ke child kartu_stok
// ============================================================
echo "\n=== [TC18] HAPUS HEADER OUT — cascade ke child ===\n";

// Set PENG_KET agar detil bisa dihapus (kalau masih ada yg sisa)
mysqli_query($con, "UPDATE pengeluaran SET PENG_KET = '' WHERE PENG_ID = $peng2_id");

$saldo_sebelum = read_saldo($con);
echo "  Saldo sebelum hapus header: IW={$saldo_sebelum['KS_TONASE_SALDO']}, Bale={$saldo_sebelum['KS_BALES_SALDO']}\n";

// Hapus header OLD — kalo PENG_ID=1 masih ada detil yg belum dihapus, ikut cascade
// Tapi PENG_ID=1 sudah SELESAI dengan 2 detil (100+50=150 IW)
// Cek berapa row kartu_stok untuk PENG_ID=1
$r = mysqli_query($con, "SELECT COUNT(*) AS c FROM kartu_stok WHERE KS_PE_PENG_ID = $peng1_id AND KS_IS_DELETE = 0");
$cnt1 = mysqli_fetch_assoc($r)['c'];
echo "  Kartu_stok non-deleted untuk PENG_ID=1: $cnt1 rows\n";

// Cascade delete PENG_ID=1
mysqli_query($con, "UPDATE pengeluaran SET PENG_IS_DELETE = 1 WHERE PENG_ID = $peng1_id");
mysqli_query($con, "UPDATE kartu_stok SET KS_IS_DELETE = 1 WHERE KS_PE_PENG_ID = $peng1_id AND KS_JENIS_DOKUMEN != 'PPKB'");
update_saldo();

$saldo_sesudah = read_saldo($con);
echo "  Saldo setelah hapus header: IW={$saldo_sesudah['KS_TONASE_SALDO']}, Bale={$saldo_sesudah['KS_BALES_SALDO']}\n";
verify("Saldo naik sesuai detil OUT yang dihapus", ['KS_TONASE_SALDO' => 100, 'KS_BALES_SALDO' => 50], $saldo_sesudah);

// Cek semua child ikut soft-delete
$r = mysqli_query($con, "SELECT COUNT(*) AS c FROM kartu_stok WHERE KS_PE_PENG_ID = $peng1_id AND KS_IS_DELETE = 0");
$cnt1_after = mysqli_fetch_assoc($r)['c'];
verify("Semua child kartu_stok ikut soft-delete (0 tersisa)", 0, $cnt1_after);

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
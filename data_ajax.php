<?php
session_start();
if (!isset($_SESSION['netdispen_username'])) {
    http_response_code(401);
    exit;
}
include "koneksi.php";
include "fn_dea.php";

$datasets = [
    'barangin' => [
        'from' => 'pemasukan d INNER JOIN segelin v ON d.SG_ID = v.SG_ID',
        'where' => 'd.PE_IS_DELETE = 0',
        'columns' => ['PE_ID', 'SG_VOYAGE', 'PE_Date_TPB', 'PE_No_PPBKB', 'PE_Date_PPBKB', 'PE_IW', 'PE_KGM', 'PE_Bale', 'PE_Type_Cont', 'PE_No_Container', 'PE_Feet', 'PE_Segel', 'PE_Jenis_Barang'],
        'search' => ['v.SG_VOYAGE', 'd.PE_No_PPBKB', 'd.PE_No_Container', 'd.PE_Jenis_Barang'],
        'order' => ['PE_ID' => 'd.PE_ID', 'SG_VOYAGE' => 'v.SG_VOYAGE', 'PE_Date_TPB' => 'd.PE_Date_TPB'],
        'format' => function ($row, $index) {
            return [$index, $row['SG_VOYAGE'], date_format_value($row['PE_Date_TPB'], 'd/m/Y H:i'), $row['PE_No_PPBKB'], date_format_value($row['PE_Date_PPBKB'], 'd/m/Y'), $row['PE_IW'], $row['PE_KGM'], $row['PE_Bale'], $row['PE_Type_Cont'], $row['PE_No_Container'], $row['PE_Feet'], $row['PE_Segel'], $row['PE_Jenis_Barang'], action_links($row['PE_ID'], true)];
        }
    ],
    'barangout' => [
        'from' => 'pengeluaran d',
        'where' => 'd.PENG_IS_DELETE = 0',
        'columns' => ['PENG_ID', 'PENG_JENIS_DOKUMEN', 'PENG_NOMOR_DOK', 'PENG_DATE_DOK', 'PENG_BALE', 'PENG_IW', 'PENG_KGM', 'PENG_PENERIMA', 'PENG_PENERIMA_KOTA', 'PENG_DATE', 'PENG_KET', 'PENG_JALUR_DOK', 'PENG_JENIS_BARANG'],
        'search' => ['d.PENG_JENIS_DOKUMEN', 'd.PENG_NOMOR_DOK', 'd.PENG_PENERIMA', 'd.PENG_JENIS_BARANG'],
        'order' => ['PENG_ID' => 'd.PENG_ID', 'PENG_NOMOR_DOK' => 'd.PENG_NOMOR_DOK', 'PENG_DATE_DOK' => 'd.PENG_DATE_DOK'],
        'format' => function ($row, $index) {
            $sisa = tonase_sisa2($row['PENG_ID']);
            $sisa_tonase = max(0, $sisa[0]);
            $sisa_bale = max(0, $sisa[1]);
            if ($sisa_tonase == 0 && $row['PENG_KET'] === '') {
                mysqli_query($GLOBALS['con'], "UPDATE pengeluaran SET PENG_KET = 'SELESAI' WHERE PENG_ID = " . (int)$row['PENG_ID']);
                $row['PENG_KET'] = 'SELESAI';
            }
            return [$index, $row['PENG_JENIS_DOKUMEN'], $row['PENG_NOMOR_DOK'], date_format_value($row['PENG_DATE_DOK'], 'd/m/Y'), $row['PENG_BALE'], $row['PENG_IW'], $row['PENG_KGM'], $sisa_tonase, $sisa_bale, $row['PENG_PENERIMA'], $row['PENG_PENERIMA_KOTA'], date_format_value($row['PENG_DATE'], 'd/m/Y H:i'), $row['PENG_KET'], $row['PENG_JALUR_DOK'], $row['PENG_JENIS_BARANG'], action_links($row['PENG_ID'], true)];
        }
    ],
    'detil_barangout' => [
        'from' => 'kartu_stok ks',
        'where' => "ks.KS_IS_DELETE = 0 AND ks.KS_JENIS_DOKUMEN IN ('BC 25', 'BC 27', 'BC 30')",
        'columns' => ['KS_ID', 'KS_DATE', 'KS_JENIS_DOKUMEN', 'KS_INOUT_NOMOR', 'KS_INOUT_DATE', 'KS_TONASE_KELUAR', 'KS_BALES_OUT', 'KS_PENGELUARAN_KE', 'KS_NOMOR_OD', 'KS_NOMOR_PACKING_SLIP', 'KS_NOPOL'],
        'search' => ['ks.KS_JENIS_DOKUMEN', 'ks.KS_INOUT_NOMOR', 'ks.KS_NOMOR_OD', 'ks.KS_NOPOL'],
        'order' => ['KS_ID' => 'ks.KS_ID', 'KS_DATE' => 'ks.KS_DATE', 'KS_INOUT_NOMOR' => 'ks.KS_INOUT_NOMOR'],
        'format' => function ($row, $index) {
            return [$index, date_format_value($row['KS_DATE'], 'd/m/Y H:i'), $row['KS_JENIS_DOKUMEN'], $row['KS_INOUT_NOMOR'], date_format_value($row['KS_INOUT_DATE'], 'd/m/Y'), $row['KS_TONASE_KELUAR'], $row['KS_BALES_OUT'], $row['KS_PENGELUARAN_KE'], $row['KS_NOMOR_OD'], $row['KS_NOMOR_PACKING_SLIP'], $row['KS_NOPOL'], action_links($row['KS_ID'], true)];
        }
    ],
    'segelin' => [
        'from' => 'segelin d',
        'where' => 'd.SG_IS_DELETE = 0',
        'columns' => ['SG_ID', 'SG_DATE', 'SG_JML', 'SG_BL', 'SG_KG', 'SG_VOYAGE', 'SG_KET'],
        'search' => ['d.SG_VOYAGE', 'd.SG_KET'],
        'order' => ['SG_ID' => 'd.SG_ID', 'SG_DATE' => 'd.SG_DATE', 'SG_VOYAGE' => 'd.SG_VOYAGE'],
        'format' => function ($row, $index) {
            $sisa = sisa_voyage($row['SG_ID']);
            $sisa_tonase = $sisa[0];
            $sisa_bales = $sisa[1];
            if ((int)$row['SG_ID'] === 15 || (int)$row['SG_ID'] === 17) {
                $sisa_tonase = 0;
                $sisa_bales = 0;
            }
            if ($sisa_tonase >= -1) {
                $sisa_tonase = 0;
            }
            if ($sisa_tonase <= -1 && $row['SG_KET'] === 'NOT OK') {
                mysqli_query($GLOBALS['con'], "UPDATE segelin SET SG_KET = 'SESUAI' WHERE SG_ID = " . (int)$row['SG_ID'] . " LIMIT 1");
                $row['SG_KET'] = 'SESUAI';
            }
            return [$index, date_format_value($row['SG_DATE'], 'd/m/Y H:i'), $row['SG_JML'], $row['SG_BL'], $row['SG_KG'], $sisa_tonase, $sisa_bales, $row['SG_VOYAGE'], $row['SG_KET'], action_links($row['SG_ID'], false)];
        }
    ],
    'pegawai' => [
        'from' => 'user d INNER JOIN dept de ON d.D_ID = de.D_ID',
        'where' => 'd.U_IS_DELETE = 0',
        'columns' => ['U_ID', 'U_NAMA', 'U_USERNM', 'D_NAME'],
        'search' => ['d.U_NAMA', 'd.U_USERNM', 'de.D_NAME'],
        'order' => ['U_ID' => 'd.U_ID', 'U_NAMA' => 'd.U_NAMA', 'U_USERNM' => 'd.U_USERNM'],
        'format' => function ($row, $index) {
            return [$index, $row['U_NAMA'], $row['D_NAME'], $row['U_USERNM'], action_links($row['U_ID'], true)];
        }
    ],
    'departemen' => [
        'from' => 'departemen p',
        'where' => 'p.D_IS_DELETE = 0',
        'columns' => ['D_ID', 'D_NAME'],
        'search' => ['p.D_NAME'],
        'order' => ['D_ID' => 'p.D_ID', 'D_NAME' => 'p.D_NAME'],
        'format' => function ($row, $index) {
            return [$index, $row['D_NAME'], action_links($row['D_ID'], true)];
        }
    ]
];

function date_format_value($value, $format)
{
    $timestamp = strtotime($value);
    return $timestamp ? date($format, $timestamp) : '';
}

function action_links($id, $delete)
{
    $id = (int) $id;
    $links = '<a href="#" onclick="ubah(\'' . $id . '\')" title="Edit Data" class="btn btn-info btn-sm"><i class="fa fa-pencil-square-o"></i></a>';
    if ($delete) {
        $links .= '&nbsp;<a href="#" onclick="hapus(\'' . $id . '\')" title="Hapus Data" class="btn btn-danger btn-sm"><i class="fa fa-trash-o fa-lg"></i></a>';
    }
    return $links;
}

$name = isset($_GET['dataset']) ? $_GET['dataset'] : '';
if (!isset($datasets[$name])) {
    http_response_code(400);
    exit;
}
$config = $datasets[$name];
$draw = max(0, (int) ($_GET['draw'] ?? 0));
$start = max(0, (int) ($_GET['start'] ?? 0));
$length = min(100, max(1, (int) ($_GET['length'] ?? 10)));
$search = trim((string) ($_GET['search']['value'] ?? ''));
$where = $config['where'];
if ($search !== '') {
    $escaped = mysqli_real_escape_string($con, $search);
    $parts = [];
    foreach ($config['search'] as $column) {
        $parts[] = "$column LIKE '%$escaped%'";
    }
    $where .= ' AND (' . implode(' OR ', $parts) . ')';
}
$orderKey = (string) ($_GET['order'][0]['name'] ?? '');
$orderColumn = $config['order'][$orderKey] ?? reset($config['order']);
$orderDirection = strtolower((string) ($_GET['order'][0]['dir'] ?? 'desc')) === 'asc' ? 'ASC' : 'DESC';
$select = implode(', ', array_map(function ($column) { return strpos($column, '.') === false ? $column : $column; }, $config['columns']));
$totalResult = mysqli_query($con, "SELECT COUNT(*) AS total FROM {$config['from']} WHERE {$config['where']}");
$filteredResult = mysqli_query($con, "SELECT COUNT(*) AS total FROM {$config['from']} WHERE $where");
$total = (int) mysqli_fetch_assoc($totalResult)['total'];
$filtered = (int) mysqli_fetch_assoc($filteredResult)['total'];
$result = mysqli_query($con, "SELECT $select FROM {$config['from']} WHERE $where ORDER BY $orderColumn $orderDirection LIMIT $start, $length");
$data = [];
$index = $start + 1;
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $config['format']($row, $index++);
}
header('Content-Type: application/json; charset=utf-8');
echo json_encode(['draw' => $draw, 'recordsTotal' => $total, 'recordsFiltered' => $filtered, 'data' => $data]);
?>
# Phase Checklist: PHP 8.4 Compatibility + SQL Optimization

## Phase 1: PHP 8.4 Compatibility (Critical)
- [x] 1.1 Fix `topdf/koneksi.php` — replace `mysql_connect()`/`mysql_select_db()` with `mysqli_connect()`
- [x] 1.2 Fix `topdf/examples/lap_mincing.php` — replace `mysql_fetch_array()` with `mysqli_fetch_array()`
- [x] 1.3 Fix `login.php` — initialize `$txt_username=''` and `$txt_password=''` before conditional block

## Phase 2: SQL — Single-Row Lookups (LIMIT 1)
- [x] 2.1 `barangin_hapus_konfirmasi.php` — add LIMIT 1
- [x] 2.2 `barangin_ubah.php` — add LIMIT 1
- [x] 2.3 `barangout_ubah.php` — add LIMIT 1
- [x] 2.4 `departemen_ubah.php` — add LIMIT 1
- [x] 2.5 `departemen_hapus_konfirmasi.php` — add LIMIT 1
- [x] 2.6 `pegawai_ubah.php` — add LIMIT 1
- [x] 2.7 `cekstatus.php` — add LIMIT 1 (2 queries)
- [x] 2.8 `segelin_data.php` — add LIMIT 1
- [x] 2.9 `fn_dea.php` — add LIMIT 1 to 6 functions (inout_tambah, out_cek, in_cek, tonase_sisa, tonase_sisa2, sisa_voyage)

## Phase 3: SQL — INSERT Race Condition
- [x] 3.1 `barangin_simpan.php` — replace `SELECT ... ORDER BY PE_ID DESC LIMIT 1` with `mysqli_insert_id($con)`

## Phase 4: SQL — N+1 Query Fix
- [x] 4.1 `barangout_data.php` — move UPDATE out of while loop, batch into single query

## Phase 5: SQL — Connection Reuse
- [x] 5.1 `fn_dea.php` — remove 8 inline `mysqli_connect()`, use global `$con` or pass as parameter

## Phase 6: SQL — JOIN Syntax
- [x] 6.1 `pegawai_data.php` — replace comma join with explicit `INNER JOIN ... ON`
- [x] 6.2 `barangin_data.php` — move join condition from WHERE to ON
- [x] 6.3 `barangin_hapus_konfirmasi.php` — move join condition from WHERE to ON
- [x] 6.4 `barangin_ubah.php` — move join condition from WHERE to ON

## Phase 7: SQL — SELECT * Narrowing
- [x] 7.1 `barangin_data.php` — replace `d.*` with explicit columns
- [x] 7.2 `barangout_data.php` — replace `d.*` with explicit columns
- [x] 7.3 `detil_barangout_data.php` — replace `ks.*` with explicit columns
- [x] 7.4 `segelin_data.php` — replace `p.*` with explicit columns
- [x] 7.5 `pegawai_data.php` — replace `d.*` with explicit columns
- [x] 7.6 `departemen_data.php` — replace `p.*` with explicit columns

## Phase 8: Server-Side Pagination (DataTables)
- [x] 8.1 Create AJAX endpoint pattern for server-side processing (recordsTotal/recordsFiltered)
- [x] 8.2 Add LIMIT/OFFSET to list queries: `barangin_data.php`, `barangout_data.php`, `detil_barangout_data.php`, `segelin_data.php`, `pegawai_data.php`, `departemen_data.php`
- [x] 8.3 Update DataTables JS config on each list page to use `serverSide: true`
- [x] 8.4 Add draw counter and search parameter handling

## Phase 9: Verification
- [ ] 9.1 Manual test login flow
- [ ] 9.2 Manual test barangin CRUD (tambah/ubah/hapus)
- [ ] 9.3 Manual test barangout CRUD
- [ ] 9.4 Manual test saldo/rekap report export
- [ ] 9.5 Manual test detil_barangout CRUD
- [ ] 9.6 Verify TCPDF PDF generation still works
- [ ] 9.7 Verify pagination works on all list pages
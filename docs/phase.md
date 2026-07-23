# Phase Checklist: Saldo Update Bug Fixes

## Phase 1: DELETE cascade ke kartu_stok (Critical)
- [x] 1.1 `barangin_hapus.php` — soft-delete kartu_stok entry, panggil `update_saldo()` rebuild balance
- [x] 1.2 `detil_barangout_hapus.php` — panggil `update_saldo()` setelah soft-delete kartu_stok
- [x] 1.3 `barangout_hapus.php` — cascade soft-delete ke child kartu_stok, panggil `update_saldo()`
- [x] 1.4 `segelin_hapus.php` — panggil `update_saldo()` setelah soft-delete segelin

## Phase 2: `update_saldo()` — fungsi repair jadi resmi
- [x] 2.1 `fn_dea.php` — tambah docstring/header ke `update_saldo()` yang menjelaskan ini fungsi rebuild total saldo
- [x] 2.2 Gunakan `update_saldo()` sebagai ONE-CALL-FIX di semua delete flows (ganti `inout_update()` cascade) atau simpan sebagai alternatif repair manual

## Phase 3: Minor Bugs
- [x] 3.1 `cekstatus.php:9` — ganti DB koneksi dari `dea_web` ke `sjasmgco_dea` (gunakan `global $con`)
- [x] 3.2 `barangin_simpan.php:18` — ganti `=` jadi `==` (feet container selalu 40 bug)
- [x] 3.3 `barangin_simpan_ubah.php:18` — ganti `=` jadi `==`

## Phase 4: SELECT * Narrowing di fn_dea.php & core functions
- [x] 4.1 `fn_dea.php:update_saldo()` — ganti `d.*` jadi kolom eksplisit: KS_ID, KS_JENIS_DOKUMEN, KS_TONASE_MASUK, KS_TONASE_KELUAR, KS_BALES_IN, KS_BALES_OUT
- [x] 4.2 `fn_dea.php:inout_tambah()` — ganti `d.*` jadi kolom eksplisit: KS_ID, KS_TONASE_SALDO, KS_BALES_SALDO
- [x] 4.3 `fn_dea.php:out_cek()` — ganti `d.*` jadi kolom eksplisit (baca 7 kolom)
- [x] 4.4 `fn_dea.php:in_cek()` — ganti `d.*` jadi kolom eksplisit (baca 7 kolom)
- [x] 4.5 `fn_dea.php:inout_update()` — ganti `d.*` jadi kolom eksplisit (baca 6 kolom)
- [x] 4.6 `fn_dea.php:tonase_sisa()` — ganti `d.*` jadi `PENG_IW, PENG_JENIS_DOKUMEN`
- [x] 4.7 `fn_dea.php:tonase_sisa2()` — ganti `d.*` jadi `PENG_IW, PENG_BALE, PENG_JENIS_DOKUMEN`
- [x] 4.8 `fn_dea.php:sisa_voyage()` — ganti `d.*` jadi `SG_KG, SG_BL`

## Phase 5: N+1 Query Optimization (data_ajax.php)
- [x] 5.1 `data_ajax.php:barangout` — ganti per-row `tonase_sisa2()` jadi LEFT JOIN subquery di query utama
- [x] 5.2 `data_ajax.php:segelin` — ganti per-row `sisa_voyage()` jadi LEFT JOIN subquery di query utama

## Phase 6: Indexing
- [ ] 6.1 Cek index existing: `SHOW INDEX FROM kartu_stok`, `SHOW INDEX FROM pemasukan`, `SHOW INDEX FROM pengeluaran`, `SHOW INDEX FROM segelin`
- [ ] 6.2 ADD INDEX `kartu_stok` (`KS_PE_PENG_ID`, `KS_JENIS_DOKUMEN`, `KS_IS_DELETE`)
- [ ] 6.3 ADD INDEX `pemasukan` (`SG_ID`, `PE_IS_DELETE`)
- [ ] 6.4 ADD INDEX `pengeluaran` (`PENG_IS_DELETE`)
- [ ] 6.5 ADD INDEX `segelin` (`SG_ID`, `SG_IS_DELETE`)
- [ ] 6.6 `data_ajax.php` — cek ORDER BY columns (KS_DATE, PENG_DATE, dll) sudah ada index

## Phase 7: Verification (Manual Testing)
- [ ] 7.1 Test: tambah barang masuk → hapus barang masuk → cek saldo di report (harus kembali ke posisi sebelumnya)
- [ ] 7.2 Test: tambah barang keluar + detil → hapus salah satu detil → cek saldo (harus bertambah sesuai barang yg dikembalikan)
- [ ] 7.3 Test: tambah barang keluar + detil → hapus header barang keluar → cek saldo & child (child ikut terhapus)
- [x] 7.4 Test: `php -l` semua file yang diubah (syntax check)
- [ ] 7.5 Smoke test: login, semua halaman list render, CRUD button still work
- [ ] 7.6 Test: setelah Phase 5, bandingkan response time data tabel sebelum vs sesudah (gunakan browser DevTools Network tab)
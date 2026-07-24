# Delete Progress Bar — Bootstrap Indeterminate

## Summary
Add animated Bootstrap progress bar to delete confirmation forms in `barangin_hapus_konfirmasi.php` and `detil_barangout_hapus_konfirmasi.php`. Shows during AJAX `*_hapus.php` call, hides on response.

## Design
- **Approach:** Bootstrap `.progress-bar-striped.active` (indeterminate, animated)
- **Already available:** Bootstrap CSS+JS loaded by parent pages, zero new deps
- **Placement:** Inside the form, before the button group row
- **Default:** Hidden (`display:none`)

## Behaviour
| Event | Action |
|-------|--------|
| Click "Hapus" (before AJAX) | Show progress bar; disable button text "Menghapus..." |
| AJAX success | Refresh data table; alert(msg); hide progress; restore button |
| AJAX error | alert("Gagal menghapus"); hide progress; restore button |
| complete (both paths) | Hide progress; enable button; restore text "Hapus" |

## Files Changed
| File | Change |
|------|--------|
| `barangin_hapus_konfirmasi.php` | Add progress bar div + JS updates to `#btn_hapus` handler |
| `detil_barangout_hapus_konfirmasi.php` | Same as above |

## Verification
- `php -l` on both files
- Browser click "Hapus": progress bar appears, button changes text, bar disappears after response
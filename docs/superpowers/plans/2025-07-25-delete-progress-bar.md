# Delete Progress Bar Implementation Plan

> **For agentic workers:** REQUIRED SUB-SKILL: Use superpowers:subagent-driven-development or superpowers:executing-plans.

**Goal:** Add animated Bootstrap progress bar to delete confirmation forms while AJAX delete runs.

**Architecture:** Bootstrap `.progress-bar-striped.active` div shown/hidden via jQuery. No new deps.

**Tech Stack:** Bootstrap 3, jQuery, PHP

## Global Constraints

- Only modify `barangin_hapus_konfirmasi.php` and `detil_barangout_hapus_konfirmasi.php`
- Progress bar must use existing Bootstrap classes only
- Must run `php -l` after each file change

---

### Task 1: Add progress bar to barangin_hapus_konfirmasi.php

**Files:**
- Modify: `barangin_hapus_konfirmasi.php`

- [ ] **Step 1: Add progress bar div before button group**

Insert before the `.ln_solid` + button group section (after line 98):

```html
<div id="progress_delete" class="form-group" style="display:none;">
  <div class="col-md-12">
    <div class="progress">
      <div class="progress-bar progress-bar-striped active" style="width:100%">
        Menghapus data...
      </div>
    </div>
  </div>
</div>
```

- [ ] **Step 2: Update JS `#btn_hapus` click handler**

Replace existing handler (lines 117-128) with:

```javascript
$("#btn_hapus").click(function(){
    var tampung_data = $("form").serialize();
    $("#progress_delete").show();
    $("#btn_hapus").prop("disabled", true).text("Menghapus...");
    $.ajax({
        type:"POST",
        url:"barangin_hapus.php",
        data: tampung_data,
        success: function(msg){
            $("#div_refresh_data").click();
            alert(msg);
        },
        error: function(){
            alert("Gagal menghapus data.");
        },
        complete: function(){
            $("#progress_delete").hide();
            $("#btn_hapus").prop("disabled", false).text("Hapus");
        }
    });
});
```

- [ ] **Step 3: Syntax check**

Run: `php -l barangin_hapus_konfirmasi.php`
Expected: `No syntax errors detected`

---

### Task 2: Add progress bar to detil_barangout_hapus_konfirmasi.php

**Files:**
- Modify: `detil_barangout_hapus_konfirmasi.php`

- [ ] **Step 1: Add progress bar div before button group**

Insert before the `.ln_solid` + button group section (after line 108):

```html
<div id="progress_delete" class="form-group" style="display:none;">
  <div class="col-md-12">
    <div class="progress">
      <div class="progress-bar progress-bar-striped active" style="width:100%">
        Menghapus data...
      </div>
    </div>
  </div>
</div>
```

- [ ] **Step 2: Update JS `#btn_hapus` click handler**

Replace existing handler (lines 126-137) with:

```javascript
$("#btn_hapus").click(function(){
    var tampung_data = $("form").serialize();
    $("#progress_delete").show();
    $("#btn_hapus").prop("disabled", true).text("Menghapus...");
    $.ajax({
        type:"POST",
        url:"detil_barangout_hapus.php",
        data: tampung_data,
        success: function(msg){
            $("#div_refresh_data").click();
            alert(msg);
        },
        error: function(){
            alert("Gagal menghapus data.");
        },
        complete: function(){
            $("#progress_delete").hide();
            $("#btn_hapus").prop("disabled", false).text("Hapus");
        }
    });
});
```

- [ ] **Step 3: Syntax check**

Run: `php -l detil_barangout_hapus_konfirmasi.php`
Expected: `No syntax errors detected`
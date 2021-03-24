<?php if(isset($usulan)) { ?>
<div class="form-group">
    <label>Agenda</label><br>
    <input class="form-control" name="agenda" type="text" placeholder="Masukkan agenda Anda..." value="Rapat <?php echo $usulan->jenis;?>" required>
</div>
<div class="form-group">
    <label>Pembahasan</label><br>
    <textarea id="summernote-simple" name="pembahasan"><?php echo $usulan->keterangan;?></textarea>
</div>
<?php } else { ?>
<div class="form-group">
    <label>Agenda</label><br>
    <input class="form-control" name="agenda" type="text" placeholder="Masukkan agenda Anda..." required autocomplete="off">
</div>
<div class="form-group">
    <label>Pembahasan</label><br>
    <textarea id="summernote-simple" name="pembahasan"></textarea>
</div>
<?php } ?>
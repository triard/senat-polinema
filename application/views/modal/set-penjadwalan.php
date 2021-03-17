<?php if(isset($penjadwalan)) { ?>
<div class="form-group">
    <label>Agenda</label><br>
    <input class="form-control" name="agenda" type="text" placeholder="Masukkan agenda Anda..." value="<?php echo $penjadwalan->agenda ?>" required>
</div>
<div class="form-group">
    <label>Pembahasan</label><br>
    <textarea class="form-control" name="pembahasan"><?php echo $penjadwalan->pembahasan ?></textarea>
</div>
<div class="form-group">
    <label>Waktu</label><br>
    <input class="form-control" name="waktu" id="datetimepicker" type="text" value="<?php echo $penjadwalan->waktu ?>" placeholder="Masukkan tanggal ..."
     required autocomplete="off">
</div>
<div class="form-group">
    <label>Tempat</label><br>
    <input class="form-control" name="tempat" type="text" placeholder="Masukkan tempat..." value="<?php echo $penjadwalan->tempat ?>" required>
</div>
<?php } else { ?>
<div class="form-group">
    <label>Agenda</label><br>
    <input class="form-control" name="agenda" type="text" placeholder="Masukkan agenda Anda..." required>
</div>
<div class="form-group">
    <label>Pembahasan</label><br>
    <textarea class="form-control" name="pembahasan"></textarea>
</div>
<div class="form-group">
    <label>Waktu</label><br>
    <input class="form-control" name="waktu" id="datetimepicker" type="text" placeholder="Masukkan tanggal ..."
     required autocomplete="off">
</div>
<div class="form-group">
    <label>Tempat</label><br>
    <input class="form-control" name="tempat" type="text" placeholder="Masukkan tempat..." required>
</div>
<?php } ?>
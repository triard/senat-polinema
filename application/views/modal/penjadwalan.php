<?php if($cek == 0) { ?>
<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label>Referensi Usulan</label>
            <select name="id_usulan" class="custom-select form-control" id="usulan" required>
                <option disabled selected>Pilih Referensi</option>
                <option value="0">Referensi Baru</option>
                <?php foreach ($usulan as $u): ?>
                <option value="<?php echo $u->id_usulan; ?>"><?php echo $u->jenis;?> - <?php echo $u->keterangan;?></option>
                <?php endforeach; ?>
            </select> 
        </div>
        <div class="set-usulan">
            <div class="form-group">
                <label>Agenda</label><br>
                <input class="form-control" name="agenda" type="text" placeholder="Masukkan agenda Anda..." required>
            </div>
            <div class="form-group">
                <label>Pembahasan</label><br>
                <textarea class="form-control" name="pembahasan"></textarea>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label>Waktu</label><br>
            <input class="form-control" name="waktu" id="datetimepicker" type="text" placeholder="Masukkan tanggal ..."
             required autocomplete="off">
        </div>
        <div class="form-group">
            <label>Tempat</label><br>
            <input class="form-control" name="tempat" type="text" placeholder="Masukkan tempat..." required>
        </div>
        <input type="hidden" name="status" value="dijadwalkan">
        <input type="hidden" name="id_user" value="<?php echo $this->session->userdata('id_user');?>">
    </div>
</div>
<?php } else { ?>
<input type="hidden" name="id_penjadwalan" value="<?php echo $penjadwalan->id_penjadwalan;?>">
<?php if($penjadwalan->id_user != null){ ?>
<input type="hidden" name="id_user" value="<?php echo $penjadwalan->id_user;?>">
<?php } ?>
<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label>Referensi Usulan</label>
            <select name="id_usulan" class="custom-select form-control" id="usulan" required>
                <option disabled selected>Pilih Referensi</option>
                <option value="<?php echo $penjadwalan->id_usulan;?>" selected><?php echo $penjadwalan->agenda;?> - <?php echo $penjadwalan->pembahasan;?></option>
                <option disabled>------------------------------</option>
                <option value="0">Referensi Baru</option>
                <?php foreach ($usulan as $u): ?>
                <option value="<?php echo $u->id_usulan; ?>"><?php echo $u->jenis;?> - <?php echo $u->keterangan;?></option>
                <?php endforeach; ?>
            </select> 
        </div>
        <div class="set-usulan">
            <div class="form-group">
                <label>Agenda</label><br>
                <input class="form-control" name="agenda" type="text" placeholder="Masukkan agenda Anda..." value="<?php echo $penjadwalan->agenda;?>" required>
            </div>
            <div class="form-group">
                <label>Pembahasan</label><br>
                <textarea class="form-control" name="pembahasan"><?php echo $penjadwalan->pembahasan;?></textarea>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label>Waktu</label><br>
            <input class="form-control" name="waktu" id="datetimepicker" type="text" placeholder="Masukkan tanggal ..." value="<?php echo $penjadwalan->waktu;?>"
             required autocomplete="off">
        </div>
        <div class="form-group">
            <label>Tempat</label><br>
            <input class="form-control" name="tempat" type="text" placeholder="Masukkan tempat..." value="<?php echo $penjadwalan->tempat;?>" required>
        </div>
        <input type="hidden" name="status" value="<?php echo $penjadwalan->status;?>">
    </div>
</div>
<?php } ?>
<script>
$("#usulan").on("change keydown paste input", function() {
    var a = $("#usulan").val();
    $.get("<?php echo base_url();?>Penjadwalan/set_usulan/" + a, function (b) {
        $(".set-usulan").html(b);
    })
})
</script>
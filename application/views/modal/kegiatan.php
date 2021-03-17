<?php if($cek == 0) { ?>
<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label>Referensi Penjadwalan</label>
            <select name="id_penjadwalan" class="custom-select form-control" id="penjadwalan" required>
                <option disabled selected>Pilih Referensi</option>
                <option value="0">Referensi Baru</option>
                <?php foreach ($penjadwalan as $u): ?>
                <option value="<?php echo $u->id_penjadwalan; ?>"><?php echo $u->agenda;?> - <?php echo $u->pembahasan;?></option>
                <?php endforeach; ?>
            </select> 
        </div>
        <div class="form-group">
            <label>Notula Kegiatan</label><br>
            <input class="form-control" name="notula" type="file" placeholder="Masukkan dokumen Anda...">
        </div>
    </div>
    <div class="col-6">
        <div class="set-penjadwalan">
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
        </div>
        <input type="hidden" name="id_user" value="<?php echo $this->session->userdata('id_user');?>">
    </div>
</div>
<?php } else { ?>
<input type="hidden" name="id_kegiatan" value="<?php echo $kegiatan->id_kegiatan;?>">
<?php if($penjadwalan->id_user != null){ ?>
<input type="hidden" name="id_user" value="<?php echo $kegiatan->id_kegiatan;?>">
<?php } ?>
<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label>Referensi Penjadwalan</label>
            <select name="id_penjadwalan" class="custom-select form-control" id="penjadwalan" required>
                <option value="<?php echo $kegiatan->id_penjadwalan;?>" selected><?php echo $kegiatan->agenda;?> - <?php echo $kegiatan->pembahasan;?></option>
                <option disabled>------------------------------</option>
                <option value="0">Referensi Baru</option>
                <?php foreach ($penjadwalan as $u): ?>
                <option value="<?php echo $u->id_penjadwalan; ?>"><?php echo $u->agenda;?> - <?php echo $u->pembahasan;?></option>
                <?php endforeach; ?>
            </select> 
        </div>
        <div class="form-group">
            <label>Notula Kegiatan</label><br>
            <input class="form-control" name="notula" type="file" placeholder="Masukkan dokumen Anda...">
            <input type="hidden" name="old_dokumen" value="<?php echo $kegiatan->notula ?>" />
        </div>
    </div>
    <div class="col-6">
        <div class="set-penjadwalan">
            <div class="form-group">
                <label>Agenda</label><br>
                <input class="form-control" name="agenda" type="text" placeholder="Masukkan agenda Anda..." value="<?php echo $kegiatan->agenda ?>" required>
            </div>
            <div class="form-group">
                <label>Pembahasan</label><br>
                <textarea class="form-control" name="pembahasan"><?php echo $kegiatan->pembahasan ?></textarea>
            </div>
            <div class="form-group">
                <label>Waktu</label><br>
                <input class="form-control" name="waktu" id="datetimepicker" type="text" value="<?php echo $kegiatan->waktu ?>" placeholder="Masukkan tanggal ..."
                 required autocomplete="off">
            </div>
            <div class="form-group">
                <label>Tempat</label><br>
                <input class="form-control" name="tempat" type="text" placeholder="Masukkan tempat..." value="<?php echo $kegiatan->tempat ?>" required>
            </div>
        </div>
        <input type="hidden" name="id_user" value="<?php echo $this->session->userdata('id_user');?>">
    </div>
</div>
<?php } ?>
<script>
$("#penjadwalan").on("change keydown paste input", function() {
    var a = $("#penjadwalan").val();
    $.get("<?php echo base_url();?>Kegiatan/set_penjadwalan/" + a, function (b) {
        $(".set-penjadwalan").html(b);
    })
})
</script>
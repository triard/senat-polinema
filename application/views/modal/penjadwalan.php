<?php if($cek == 0) { ?>
<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label>Referensi Usulan</label>
            <select name="id_usulan" class="custom-select form-control" id="usulan" required>
                <option disabled selected>Pilih Referensi</option>
                <option value="0">Referensi Baru</option>
                <?php foreach ($usulan as $u): ?>
                <?php if($this->session->userdata('level') == "Sekretaris" && $u->status == "Diajukan - Sekretaris" && ($u->jenis == "Kebijakan" || $u->jenis == "Pertimbangan")){ ?>
                <option value="<?php echo $u->id_usulan; ?>"><?php echo $u->jenis;?> - <?php echo $u->keterangan;?>
                </option>
                <?php } ?>
                <?php if($this->session->userdata('level') == "Ketua Komisi" && ($u->status == "Diajukan - Komisi 1" || $u->status == "Diajukan - Komisi 2" || $u->status == "Diajukan - Komisi 3" || $u->status == "Diajukan - Komisi 4") && $u->jenis == "Pengawasan"){ ?>
                <option value="<?php echo $u->id_usulan; ?>"><?php echo $u->jenis;?> - <?php echo $u->keterangan;?>
                </option>
                <?php } ?>
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
                <textarea id="summernote-simple" name="pembahasan"></textarea>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label>Waktu Mulai</label><br>
            <input class="form-control" name="waktu_mulai" id="datetimepicker" type="text"
                placeholder="Masukkan tanggal ..." required autocomplete="off">
        </div>
        <div class="form-group">
            <label>Waktu Selesai</label><br>
            <input class="form-control" name="waktu_selesai" type="time" placeholder="" required>
        </div>
        <div class="form-group">
            <label>Jenis Rapat</label><br>
            <select name="jenis_rapat" class="custom-select form-control" required>
                <option disabled selected>Pilih Jenis Rapat</option>
                <option disabled>------------------------------</option>
                <option value="Luring">Luring</option>
                <option value="Daring">Daring</option>
            </select>
        </div>
        <div class="form-group">
            <label>Tempat</label><br>
            <input class="form-control" name="tempat" type="text" placeholder="Masukkan tempat..." autocomplete="off">
        </div>
        <div class="form-group">
            <label>Link Ruangan Daring</label><br>
            <textarea class="form-control" name="link"></textarea>
        </div>
        <div class="form-group">
            <label>Password</label><br>
            <input class="form-control" name="password" type="text" placeholder="Masukkan password..."
                autocomplete="off">
        </div>
        <input type="hidden" name="status" value="Diajukan">
        <input type="hidden" name="id_user" value="<?php echo $this->session->userdata('id_user');?>">
    </div>
</div>
<?php }else if($cek == 2) { ?>
<input type="hidden" name="id_penjadwalan" value="<?php echo $penjadwalan->id_penjadwalan;?>">
<div class="form-group">
    <label>Status</label><br>
    <select name="status" class="custom-select form-control" required>
        <option value="<?php echo $penjadwalan->status;?>" selected>
            <?php echo $penjadwalan->status;?></option>
        <option disabled>Pilih Status Rapat</option>
        <option disabled>------------------------------</option>
        <option value="Ditolak">Ditolak</option>
        <option value="Disetujui">Disetujui</option>
    </select>
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
                <option value="<?php echo $penjadwalan->id_usulan;?>" selected><?php echo $penjadwalan->agenda;?> -
                    <?php echo $penjadwalan->pembahasan;?></option>
                <option disabled>------------------------------</option>
                <option value="0">Referensi Baru</option>
                <?php foreach ($usulan as $u): ?>
                <?php if($this->session->userdata('level') == "Sekretaris" && $u->status == "Diajukan - Sekretaris" && ($u->jenis == "Kebijakan" || $u->jenis == "Pertimbangan")){ ?>
                <option value="<?php echo $u->id_usulan; ?>"><?php echo $u->jenis;?> - <?php echo $u->keterangan;?>
                </option>
                <?php } ?>
                <?php if($this->session->userdata('level') == "Ketua Komisi" && ($u->status == "Diajukan - Komisi 1" || $u->status == "Diajukan - Komisi 2" || $u->status == "Diajukan - Komisi 3" || $u->status == "Diajukan - Komisi 4") && $u->jenis == "Pengawasan"){ ?>
                <option value="<?php echo $u->id_usulan; ?>"><?php echo $u->jenis;?> - <?php echo $u->keterangan;?>
                </option>
                <?php } ?>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="set-usulan">
            <div class="form-group">
                <label>Agenda</label><br>
                <input class="form-control" name="agenda" type="text" placeholder="Masukkan agenda Anda..."
                    value="<?php echo $penjadwalan->agenda;?>" required autocomplete="off">
            </div>
            <div class="form-group">
                <label>Pembahasan</label><br>
                <textarea id="summernote-simple" name="pembahasan"><?php echo $penjadwalan->pembahasan;?></textarea>
            </div>
        </div>
        <div class="form-group">
            <label>Status</label><br>
            <select name="status" class="custom-select form-control" required>
                <option value="<?php echo $penjadwalan->status;?>" selected>
                    <?php echo $penjadwalan->status;?></option>
                <option disabled>Pilih Status Rapat</option>
                <option disabled>------------------------------</option>
                <?php if($penjadwalan->status == "Ditolak"){ ?>
                <option value="Diajukan">Diajukan</option>
                <?php }else if($penjadwalan->status == "Disetujui"){ ?>
                <option value="Rapat Berlangsung">Rapat Berlangsung</option>
                <option value="Selesai">Selesai</option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label>Waktu Mulai</label><br>
            <input class="form-control" name="waktu_mulai" id="datetimepicker" type="text"
                placeholder="Masukkan waktu mulai ..." value="<?php echo $penjadwalan->waktu_mulai;?>" required
                autocomplete="off">
        </div>
        <div class="form-group">
            <label>Waktu Selesai</label><br>
            <input class="form-control" name="waktu_selesai" type="time" placeholder=""
                value="<?php echo $penjadwalan->waktu_selesai;?>" required>
        </div>
        <div class="form-group">
            <label>Jenis Rapat</label><br>
            <select name="jenis_rapat" class="custom-select form-control" required>
                <option value="<?php echo $penjadwalan->jenis_rapat;?>" selected>
                    <?php echo $penjadwalan->jenis_rapat;?></option>
                <option disabled>Pilih Jenis Rapat</option>
                <option disabled>------------------------------</option>
                <option value="Luring">Luring</option>
                <option value="Daring">Daring</option>
            </select>
        </div>
        <div class="form-group">
            <label>Tempat</label><br>
            <input class="form-control" name="tempat" type="text" value="<?php echo $penjadwalan->tempat;?>"
                placeholder="Masukkan tempat..." autocomplete="off">
        </div>
        <div class="form-group">
            <label>Link Ruangan Daring</label><br>
            <textarea class="form-control" name="link"><?php echo $penjadwalan->link;?></textarea>
        </div>
        <div class="form-group">
            <label>Password</label><br>
            <input class="form-control" name="password" type="text" value="<?php echo $penjadwalan->password;?>"
                placeholder="Masukkan password..." autocomplete="off">
        </div>
    </div>
</div>
<?php } ?>
<script>
$("#usulan").on("change keydown paste input", function() {
    var a = $("#usulan").val();
    $.get("<?php echo base_url();?>Penjadwalan/set_usulan/" + a, function(b) {
        $(".set-usulan").html(b);
        $("#summernote-simple").summernote({
            dialogsInBody: true,
            minHeight: 150,
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough']],
                ['para', ['paragraph']]
            ]
        });
    })
})
</script>
<?php if($cek == 2) { ?>
<div class="row">
    <input type="hidden" name="id_kegiatan" value="<?php echo $kegiatan->id_kegiatan;?>">
    <input type="hidden" name="status" value="Diajukan">
    <div class="col-6">
        <div class="form-group">
            <label>Nama Laporan</label><br>
            <input class="form-control" name="nama_laporan" type="text" maxlength="50" placeholder="Masukkan Nama Laporan..." required>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label>File Laporan</label><br>
            <input class="form-control" name="file_laporan" type="file" placeholder="Masukkan File Laporan..." required>
            <label for="">Ukuran file maksimum: 5MB</label>
        </div>
    </div>
</div>
<?php }else if($cek == 1) { ?>
<div class="row">
    <input type="hidden" name="id_laporan" value="<?php echo $laporan->id_laporan ?>">
    <input type="hidden" name="id_kegiatan" value="<?php echo $laporan->id_kegiatan ?>">
    <input type="hidden" name="status" value="Diajukan">
    <div class="col-6">
        <div class="form-group">
            <label>Nama Laporan</label><br>
            <input class="form-control" name="nama_laporan" maxlength="50" value="<?php echo $laporan->nama_laporan ?>" type="text" placeholder="Masukkan Nama Laporan..." required>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label>File Laporan</label><br>
            <input type="hidden" name="old_dokumen" value="<?php echo $laporan->file_laporan ?>" />
            <input class="form-control" name="file_laporan" type="file" placeholder="Masukkan File Laporan...">
            <p class="text-primary"><?php echo $laporan->file_laporan ?></p>
            <label for="">Ukuran file maksimum: 5MB</label>
        </div>
    </div>
</div>
<?php } else if($cek == 3) { ?>
<div class="row">
    <div class="col-12">
        <embed type="application/pdf" src="<?php echo base_url('/assets/laporanKegiatan/').$laporan->file_laporan ?>" width="100%"
            height="500"></embed>
    </div>
</div>
<?php }else{ ?>
<input type="hidden" name="id_kegiatan" value="<?php echo $kegiatan->id_kegiatan;?>">
<?php if($kegiatan->id_user != null){ ?>
<input type="hidden" name="id_user" value="<?php echo $kegiatan->id_user;?>">
<?php } ?>
<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label>Referensi Penjadwalan</label>
            <select name="id_penjadwalan" class="custom-select form-control" id="penjadwalan" required>
                <option value="<?php echo $kegiatan->id_penjadwalan;?>" selected><?php echo $kegiatan->agenda;?> -
                    <?php echo $kegiatan->pembahasan;?></option>
                <option disabled>------------------------------</option>
                <option value="0">Referensi Baru</option>
                <?php foreach ($penjadwalan as $u): ?>
                <option value="<?php echo $u->id_penjadwalan; ?>"><?php echo $u->agenda;?> -
                    <?php echo $u->pembahasan;?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label>Tujuan</label><br>
            <textarea class="form-control" id="summernote-tujuan" name="tujuan"
                required><?php echo $kegiatan->tujuan ?></textarea>
        </div>
    </div>
    <div class="col-6">
        <div class="set-penjadwalan">
            <div class="form-group">
                <label>Agenda</label><br>
                <input class="form-control" name="agenda" type="text" placeholder="Masukkan agenda Anda..."
                    value="<?php echo $kegiatan->agenda ?>" required>
            </div>
            <div class="form-group">
                <label>Pembahasan</label><br>
                <textarea class="form-control" name="pembahasan"><?php echo $kegiatan->pembahasan ?></textarea>
            </div>
            <div class="form-group">
                <label>Waktu Mulai</label><br>
                <input class="form-control" name="waktu_mulai" id="datetimepicker" type="text"
                    placeholder="Masukkan waktu mulai ..." value="<?php echo $kegiatan->waktu_mulai;?>" required
                    autocomplete="off">
            </div>
            <div class="form-group">
                <label>Waktu Selesai</label><br>
                <input class="form-control" name="waktu_selesai" type="time" placeholder=""
                    value="<?php echo $kegiatan->waktu_selesai;?>" required>
            </div>
            <div class="form-group">
                <label>Tempat</label><br>
                <input class="form-control" name="tempat" type="text" placeholder="Masukkan tempat..."
                    value="<?php echo $kegiatan->tempat ?>" required>
            </div>
            <div class="form-group">
                <label>Jenis Rapat</label><br>
                <select name="jenis_rapat" class="custom-select form-control" required>
                    <option value="<?php echo $kegiatan->jenis_rapat;?>" selected>
                        <?php echo $kegiatan->jenis_rapat;?></option>
                    <option disabled>Pilih Jenis Rapat</option>
                    <option disabled>------------------------------</option>
                    <option value="Luring">Luring</option>
                    <option value="Daring">Daring</option>
                </select>
            </div>
            <div class="form-group">
                <label>Link Ruangan Daring</label><br>
                <textarea class="form-control" name="link"><?php echo $kegiatan->link;?></textarea>
            </div>
            <div class="form-group">
                <label>Password</label><br>
                <input class="form-control" name="password" type="text" value="<?php echo $kegiatan->password;?>"
                    placeholder="Masukkan password..." autocomplete="off">
            </div>
        </div>
        <input type="hidden" name="id_user" value="<?php echo $this->session->userdata('id_user');?>">
    </div>
</div>
<?php } ?>
<script>
$("#penjadwalan").on("change keydown paste input", function() {
    var a = $("#penjadwalan").val();
    $.get("<?php echo base_url();?>Kegiatan/set_penjadwalan/" + a, function(b) {
        $(".set-penjadwalan").html(b);
        $('#datetimepicker').datetimepicker();
        $("#summernote-simple").summernote({
            dialogsInBody: true,
            minHeight: 150,
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough']],
                ['para', ['paragraph']]
            ]
        });
        $("#summernote-tujuan").summernote({
            dialogsInBody: true,
            minHeight: 30,
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough']],
                ['para', ['paragraph']]
            ]
        });
    })
})
</script>
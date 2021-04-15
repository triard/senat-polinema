<?php if($cek == 0) { ?>
<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label>Nama Pengusul</label><br>
            <input class="form-control" name="nama_pengusul" type="text" value="<?php echo "$nama"; ?>" readonly>
        </div>
        <div class="form-group">
            <label>Email</label><br>
            <input class="form-control" name="email" type="email" value="<?php echo "$email"; ?>"
                placeholder="Masukkan email Anda..." readonly>
        </div>

    </div>
    <div class="col-6">
        <div class="form-group">
            <label>Jenis</label><br>
            <select name="jenis" id="jenis" class="custom-select form-control" required>
                <option selected disabled>---- Pilih Jenis Usulan ----</option>
                <option value="Pengawasan">Usulan Pengawasan</option>
                <option value="Kebijakan">Usulan Kebijakan</option>
                <option value="Pertimbangan">Usulan Pertimbangan</option>
            </select>
        </div>
        <div class="form-group">
            <label>Dokumen Pendukung*</label><br>
            <input class="form-control" name="dokumen_pendukung" type="file" placeholder="Masukkan dokumen Anda...">
        </div>
        <div class="form-group">
            <label>Keterangan</label><br>
            <textarea id="summernote-simple" name="keterangan" required></textarea>
        </div>
        <input type="hidden" name="status" value="Diajukan">
        <input type="hidden" name="id_user" value="<?php echo $this->session->userdata('id_user');?>">
    </div>
    <div class="col-12">
    * untuk file pendukung lebih dari satu harap upload dengan format zip/rar
    </div>
</div>
<?php } else { ?>
<input type="hidden" name="id_usulan" value="<?php echo $usulan->id_usulan;?>">
<?php if($usulan->id_user != null){ ?>
<input type="hidden" name="id_user" value="<?php echo $usulan->id_user;?>">
<?php } ?>
<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label>Email</label><br>
            <input class="form-control" name="email" type="email" value="<?php echo $usulan->email;?>"
                placeholder="Masukkan email Anda..." required>
        </div>
        <div class="form-group">
            <label>Jenis</label><br>
            <select name="jenis" id="jenis" class="custom-select form-control">
                <option value="<?php echo $usulan->jenis;?>" selected><?php echo $usulan->jenis ?></option>
                <option disabled>------------------------------------</option>
                <option value="Pengawasan">Usulan Pengawasan</option>
                <option value="Kebijakan">Usulan Kebijakan</option>
                <option value="Pertimbangan">Usulan Pertimbangan</option>
            </select>
        </div>
        <div class="form-group">
            <label>Keterangan</label><br>
            <textarea id="summernote-simple" name="keterangan"><?php echo $usulan->keterangan;?></textarea>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label>Dokumen Pendukung*</label><br>
            <input class="form-control" name="dokumen_pendukung" type="file" placeholder="Masukkan dokumen Anda...">
            <input type="hidden" name="old_dokumen" value="<?php echo $usulan->dokumen_pendukung ?>" />
            <?php echo "$usulan->dokumen_pendukung";?>
        </div>
        <div class="form-group">
            <label>Status</label><br>
            <select name="status" id="status" class="custom-select form-control">
                <option value="<?php echo $usulan->status;?>" selected><?php echo $usulan->status;?></option>
                <option disabled>------------------------------------</option>
                <?php if ($this->session->userdata('level') == "Admin") { ?>
                <option value="Diajukan - Sekretaris">Diajukan - Sekretaris</option>
                <option value="Diajukan - Komisi 1">Diajukan - Komisi 1</option>
                <option value="Diajukan - Komisi 2">Diajukan - Komisi 2</option>
                <option value="Diajukan - Komisi 3">Diajukan - Komisi 3</option>
                <option value="Diajukan - Komisi 4">Diajukan - Komisi 4</option>
                <option value="Diajukan">Diajukan</option>
                <option value="Ditolak">Ditolak</option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="col-12">
    * untuk file pendukung lebih dari satu harap upload dengan format zip/rar
    </div>
</div>
<?php } ?>
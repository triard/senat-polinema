<?php if($cek == 0) { ?>
<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label>Email</label><br>
            <input class="form-control" name="email" type="email" placeholder="Masukkan email Anda..." required>
        </div>
        <div class="form-group">
            <label>Jenis</label><br>
            <select name="jenis" id="jenis" class="custom-select form-control">
                <option value="1">1</option>
                <option value="2">2</option>
            </select>
        </div>
        <div class="form-group">
            <label>Keterangan</label><br>
            <textarea class="form-control" name="keterangan"></textarea>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label>Dokumen Pendukung</label><br>
            <input class="form-control" name="dokumen_pendukung" type="file" placeholder="Masukkan dokumen Anda..." required>
        </div>
        <div class="form-group">
            <label>Lokasi</label><br>
            <input class="form-control" name="lokasi" type="text" placeholder="Masukkan lokasi Anda..." required>
        </div>
        <input type="hidden" name="status" value="diajukan">
        <input type="hidden" name="id_user" value="<?php echo $this->session->userdata('id_user');?>">
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
            <input class="form-control" name="email" type="email" value="<?php echo $usulan->email;?>" placeholder="Masukkan email Anda..." required>
        </div>
        <div class="form-group">
            <label>Jenis</label><br>
            <select name="jenis" id="jenis" class="custom-select form-control">
                <option value="<?php echo $usulan->jenis;?>" selected><?php echo $usulan->jenis ?></option>
                <option value="1">1</option>
                <option value="2">2</option>
            </select>
        </div>
        <div class="form-group">
            <label>Keterangan</label><br>
            <textarea class="form-control" name="keterangan"><?php echo $usulan->keterangan;?></textarea>
        </div>
    </div>
    <div class="col-6">
    <div class="form-group">
            <label>Dokumen Pendukung</label><br>
            <input class="form-control" name="dokumen_pendukung" type="file" placeholder="Masukkan dokumen Anda..." required>
            <input type="hidden" name="old_dokumen" value="<?php echo $usulan->dokumen_pendukung ?>" />
        </div>
        <div class="form-group">
            <label>Lokasi</label><br>
            <input class="form-control" name="lokasi" type="text" value="<?php echo $usulan->lokasi;?>" placeholder="Masukkan lokasi Anda..." required>
        </div>
        <div class="form-group">
            <label>Status</label><br>
            <select name="status" id="status" class="custom-select form-control">
                <option value="<?php echo $usulan->status;?>" selected><?php echo $usulan->status;?></option>
                <option value="1">1</option>
                <option value="2">2</option>
            </select>
        </div>
    </div>
</div>
<?php } ?>
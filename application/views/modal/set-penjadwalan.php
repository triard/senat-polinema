<?php if(isset($penjadwalan)) { ?>
<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label>Agenda</label><br>
            <input class="form-control" name="agenda" type="text" placeholder="Masukkan agenda Anda..."
                value="<?php echo $penjadwalan->agenda ?>" required>
        </div>
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
            <input class="form-control" name="tempat" type="text" placeholder="Masukkan tempat..."
                value="<?php echo $penjadwalan->tempat ?>" required>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label>Pembahasan</label><br>
            <textarea id="summernote-simple" name="pembahasan"><?php echo $penjadwalan->pembahasan ?></textarea>
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
        <div class="form-group">
            <label>Status Kegiatan</label><br>
            <select name="status" class="custom-select form-control" required>
                <option disabled selected>Pilih Status Kegiatan</option>
                <option disabled>------------------------------</option>
                <option value="Proses">Proses</option>
                <option value="Perlu Tindak Lanjut - Sidang Pleno">Perlu Tindak Lanjut - Sidang Pleno</option>
                <option value="Perlu Tindak Lanjut - Sidang Paripurna">Perlu Tindak Lanjut - Sidang Paripurna</option>
                <option value="Selesai">Selesai</option>
            </select>
        </div>
    </div>
</div>

<?php } else { ?>
<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label>Agenda</label><br>
            <input class="form-control" name="agenda" type="text" placeholder="Masukkan agenda Anda..." required
                autocomplete="off">
        </div>
        <div class="form-group">
            <label>Waktu Mulai</label><br>
            <input class="form-control" name="waktu_mulai" id="datetimepicker" type="text"
                placeholder="Masukkan waktu mulai ..." required
                autocomplete="off">
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
            <input class="form-control" name="tempat" type="text" placeholder="Masukkan tempat..." required>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label>Pembahasan</label><br>
            <textarea id="summernote-simple" name="pembahasan"></textarea>
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
        <div class="form-group">
            <label>Status Kegiatan</label><br>
            <select name="status" class="custom-select form-control" required>
                <option disabled selected>Pilih Status Kegiatan</option>
                <option disabled>------------------------------</option>
                <option value="Proses">Proses</option>
                <option value="Perlu Tindak Lanjut - Sidang Pleno">Perlu Tindak Lanjut - Sidang Pleno</option>
                <option value="Perlu Tindak Lanjut - Sidang Paripurna">Perlu Tindak Lanjut - Sidang Paripurna</option>
                <option value="Selesai">Selesai</option>
            </select>
        </div>
    </div>
</div>
<?php } ?>
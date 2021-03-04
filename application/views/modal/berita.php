<?php if($cek == 0) { ?>
<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label>Judul</label><br>
            <input class="form-control" name="judul" type="judul" placeholder="Masukkan judul  ..." required>
        </div>
        <div class="form-group">
            <label>Keterangan</label><br>
            <textarea class="form-control" name="keterangan"></textarea>
        </div>
        <div class="form-group">
            <label>Image</label><br>
            <input class="form-control" name="image" type="file" placeholder="Masukkan image ..." required>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label>Tanggal</label><br>
            <input class="form-control" name="tanggal" type="date" placeholder="Masukkan tanggal ..." required>
        </div>
        <div class="form-group">
            <label>Waktu</label><br>
            <input class="form-control" name="waktu" type="time" placeholder="Masukkan waktu  ..." required>
        </div>
        <div class="form-group">
            <label>Lokasi</label><br>
            <input class="form-control" name="lokasi" type="text" placeholder="Masukkan lokasi  ..." required>
        </div>
        <input type="hidden" name="status" value="diajukan">
        <input type="hidden" name="id_user" value="<?php echo $this->session->userdata('id_user');?>">
    </div>
</div>
<?php } else { ?>
<input type="hidden" name="id_berita" value="<?php echo $berita->id_berita;?>">
<?php if($berita->id_user != null){ ?>
<input type="hidden" name="id_user" value="<?php echo $berita->id_user;?>">
<?php } ?>
<div class="row">
    <div class="col-6">
    <div class="form-group">
            <label>Judul</label><br>
            <input class="form-control" name="judul" type="judul" value="<?php echo $berita->judul;?>" placeholder="Masukkan judul  ..." required>
        </div>
        <div class="form-group">
            <label>Keterangan</label><br>
            <textarea class="form-control" name="keterangan"><?php echo $berita->keterangan;?></textarea>
        </div>
        <div class="form-group">
            <label>Image</label><br>
            <input class="form-control" name="image" type="file" placeholder="Masukkan image  ...">
            <input type="hidden" name="old_image" value="<?php echo $berita->image ?>" />
        </div>

    </div>
    <div class="col-6">
        <div class="form-group">
            <label>Tanggal</label><br>
            <input class="form-control" name="tanggal" type="date" value="<?php echo $berita->tanggal;?>" placeholder="Masukkan tanggal ..." required>
        </div>
        <div class="form-group">
            <label>Waktu</label><br>
            <input class="form-control" name="waktu" type="time" value="<?php echo $berita->waktu;?>" placeholder="Masukkan waktu  ..." required>
        </div>
        <div class="form-group">
            <label>Lokasi</label><br>
            <input class="form-control" name="lokasi" type="text" value="<?php echo $berita->lokasi;?>" placeholder="Masukkan lokasi  ..." required>
        </div>
    </div>
</div>
<?php } ?>
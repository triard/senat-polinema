<?php if($cek == 0) { ?>
<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label>Judul Berita</label><br>
            <input class="form-control" name="judul" type="judul" placeholder="Judul berita  ..." required autocomplete="off">
        </div>
        <div class="form-group">
            <label>Isi Berita</label><br>
            <textarea id="content" name="keterangan"></textarea>
        </div>

    </div>
    <div class="col-6">
        <div class="form-group">
            <label>Tanggal</label><br>
            <input class="form-control" type="text" id="datetimepicker" name="tanggal" autocomplete="off" placeholder="Masukkan tanggal ..." required>
        </div>

        <div class="form-group">
            <label>Image</label><br>
            <input class="form-control" name="image" type="file" placeholder="Masukkan image ..." required>
        </div>
    </div>
    <div class="col-6">
        <input type="hidden" name="id_user" value="<?php echo $this->session->userdata('id_user');?>">
    </div>
</div>
<?php } else { ?>
<input type="hidden" name="id_berita" value="<?php echo $berita->id_berita;?>">
<input type="hidden" name="id_user" value="<?php echo $berita->id_user;?>">
<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label>Judul Berita</label><br>
            <input class="form-control" name="judul" type="judul" value="<?php echo $berita->judul;?>"
                placeholder="Masukkan judul  ..." required autocomplete="off">
        </div>
        <div class="form-group">
            <label>Isi Berita</label><br>
            <textarea  id="content" name="keterangan"><?php echo $berita->keterangan;?></textarea>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label>Tanggal</label><br>
            <input class="form-control" id="datetimepicker" name="tanggal" type="text" value="<?php echo $berita->tanggal;?>"
                placeholder="Masukkan tanggal ..." required autocomplete="off">
        </div>
        <div class="form-group">
            <label>Image</label><br>
            <input class="form-control" name="image" type="file" placeholder="Masukkan image  ...">
            <input type="hidden" name="old_image" value="<?php echo $berita->image ?>" />
        </div>

    </div>
    </div>
</div>
<?php } ?>
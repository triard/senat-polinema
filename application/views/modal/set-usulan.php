<?php if(isset($usulan)) { ?>
<?php if($this->session->userdata('level') == "Sekretaris" && $usulan->status == "Diajukan - Sekretaris"){ ?>
	<input type="hidden" name="status" value="Dijadwalkan - Sekretaris">
	<div class="form-group">
	    <label>Agenda</label><br>
	    <input class="form-control" name="agenda" type="text" placeholder="Masukkan agenda Anda..." value="Rapat <?php echo $usulan->jenis;?>" required>
	</div>
<?php } ?>
<?php if($this->session->userdata('level') == "Sekretaris" && $usulan->status == "Perlu Tindak Lanjut - Sidang Pleno"){ ?>
	<input type="hidden" name="status" value="Dijadwalkan - Sidang Pleno">
	<div class="form-group">
	    <label>Agenda</label><br>
	    <input class="form-control" name="agenda" type="text" placeholder="Masukkan agenda Anda..." value="Sidang Pleno" required>
	</div>
<?php } ?>
<?php if($this->session->userdata('level') == "Sekretaris" && $usulan->status == "Perlu Tindak Lanjut - Sidang Paripurna"){ ?>
	<input type="hidden" name="status" value="Dijadwalkan - Sidang Paripurna">
	<div class="form-group">
	    <label>Agenda</label><br>
	    <input class="form-control" name="agenda" type="text" placeholder="Masukkan agenda Anda..." value="Sidang Paripurna" required>
	</div>
<?php } ?>
<?php if($this->session->userdata('level') == "Ketua Komisi 1"){ ?>
	<input type="hidden" name="status" value="Dijadwalkan - Komisi 1">
	<div class="form-group">
	    <label>Agenda</label><br>
	    <input class="form-control" name="agenda" type="text" placeholder="Masukkan agenda Anda..." value="Rapat Komisi" required>
	</div>
<?php } ?>
<?php if($this->session->userdata('level') == "Ketua Komisi 2"){ ?>
	<input type="hidden" name="status" value="Dijadwalkan - Komisi 2">
	<div class="form-group">
	    <label>Agenda</label><br>
	    <input class="form-control" name="agenda" type="text" placeholder="Masukkan agenda Anda..." value="Rapat Komisi" required>
	</div>
<?php } ?>
<?php if($this->session->userdata('level') == "Ketua Komisi 3"){ ?>
	<input type="hidden" name="status" value="Dijadwalkan - Komisi 3">
	<div class="form-group">
	    <label>Agenda</label><br>
	    <input class="form-control" name="agenda" type="text" placeholder="Masukkan agenda Anda..." value="Rapat Komisi" required>
	</div>
<?php } ?>
<?php if($this->session->userdata('level') == "Ketua Komisi 4"){ ?>
	<input type="hidden" name="status" value="Dijadwalkan - Komisi 4">
	<div class="form-group">
	    <label>Agenda</label><br>
	    <input class="form-control" name="agenda" type="text" placeholder="Masukkan agenda Anda..." value="Rapat Komisi" required>
	</div>
<?php } ?>
<div class="form-group">
    <label>Pembahasan</label><br>
    <textarea id="summernote-simple" name="pembahasan"><?php echo $usulan->keterangan;?></textarea>
</div>
<input type="hidden" name="nama_pengusul" value="<?php echo $usulan->nama_pengusul;?>">
<input type="hidden" name="email" value="<?php echo $usulan->email;?>">
<?php } else { ?>
<input type="hidden" name="status" value="Dijadwalkan - Sekretaris">
<div class="form-group">
    <label>Agenda</label><br>
    <input class="form-control" name="agenda" type="text" placeholder="Masukkan agenda Anda..." required autocomplete="off">
</div>
<div class="form-group">
    <label>Pembahasan</label><br>
    <textarea id="summernote-simple" name="pembahasan"></textarea>
</div>
<?php } ?>
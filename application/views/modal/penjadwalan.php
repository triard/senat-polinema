<?php if($cek == 0) { ?>
<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label>Agenda</label><br>
            <input class="form-control" name="agenda" type="agenda" placeholder="Masukkan agenda Anda..." required>
        </div>
        <div class="form-group">
            <label>Pembahasan</label><br>
            <textarea class="form-control" name="pembahasan"></textarea>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label>Tanggal</label><br>
            <input class="form-control" name="tanggal" id="datetimepicker" type="text" placeholder="Masukkan tanggal ..."
             required autocomplete="off">
        </div>
        <div class="form-group">
            <label>Tempat</label><br>
            <input class="form-control" name="tempat" type="text" placeholder="Masukkan tempat..." required>
        </div>
        <input type="hidden" name="status" value="diajukan">
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
            <label>Agenda</label><br>
            <input class="form-control" name="agenda" type="agenda" value="<?php echo $penjadwalan->agenda;?>"
                placeholder="Masukkan agenda Anda..." required>
        </div>
        <div class="form-group">
            <label>Pembahasan</label><br>
            <textarea class="form-control" name="pembahasan"><?php echo $penjadwalan->pembahasan;?></textarea>
        </div>
        <div class="form-group">
            <label>Status</label><br>
            <select name="status" id="status" class="custom-select form-control">
                <option value="<?php echo $penjadwalan->status;?>" selected><?php echo $penjadwalan->status;?></option>
                <option value="1">1</option>
                <option value="2">2</option>
            </select>
        </div>
    </div>
    <div class="col-6">
    <div class="form-group">
            <label>Tanggal</label><br>
            <input class="form-control" name="tanggal" type="text" id="datetimepicker" value="<?php echo $penjadwalan->tanggal ?>"
             placeholder="Masukkan tanggal ..." required autocomplete="off">
        </div>
        <div class="form-group">
            <label>Tempat</label><br>
            <input class="form-control" name="tempat" type="text" value="<?php echo $penjadwalan->tempat;?>"
                placeholder="Masukkan tempat Anda..." required>
        </div>
    </div>
</div>
<?php } ?>
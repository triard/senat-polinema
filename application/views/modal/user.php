<?php if($cek == 0) { ?>
<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label>Username</label><br>
            <input class="form-control" name="username" type="text" placeholder="username..." required>
        </div>
        <div class="form-group">
            <label>Email</label><br>
            <input class="form-control" name="email" type="email" placeholder="Email..." required>
        </div>
        <div class="form-group">
            <label>Password</label><br>
            <input class="form-control" name="password" type="password" placeholder="*****" required>
        </div>
        <div class="form-group">
            <label>Level</label><br>
            <select name="level" id="level" class="custom-select form-control">
                <option value="Admin">Admin</option>
                <option value="Sekretaris">Sekretaris</option>
                <option value="Ketua Senat">Ketua Senat</option>
                <option value="Ketua Komisi 1">Ketua Komisi 1</option>
                <option value="Ketua Komisi 2">Ketua Komisi 2</option>
                <option value="Ketua Komisi 3">Ketua Komisi 3</option>
                <option value="Ketua Komisi 4">Ketua Komisi 4</option>
                <option value="Anggota Komisi 1">Anggota Komisi 1</option>
                <option value="Anggota Komisi 2">Anggota Komisi 2</option>
                <option value="Anggota Komisi 3">Anggota Komisi 3</option>
                <option value="Anggota Komisi 4">Anggota Komisi 4</option>
            </select>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label>Nama</label><br>
            <input class="form-control" name="nama" type="text" placeholder="Masukkan Nama..." required>
        </div>
        <div class="form-group">
            <label>NIP</label><br>
            <input class="form-control" name="NIP" type="text" maxlength="18" minlength="18" placeholder="Masukkan NIP..." value="">
        </div>
        <div class="form-group">
            <label>Jabatan</label><br>
            <input class="form-control" name="jabatan" type="text" placeholder="Masukkan Jabatan..." value="">
        </div>
        <div class="form-group">
            <label>Keterangan</label><br>
            <input class="form-control" name="keterangan" type="text" placeholder="Masukkan Keternagan..." value="">
        </div>
    </div>
</div>
<?php } else { ?>
<input type="hidden" name="id_user" value="<?php echo $user->id_user;?>">
<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label>Username</label><br>
            <input class="form-control" value="<?php echo $user->username;?>" name="username" type="text"
                placeholder="username" required>
        </div>
        <div class="form-group">
            <label>Email</label><br>
            <input class="form-control" value="<?php echo $user->email;?>" name="email" type="email" placeholder="Email"
                required>
        </div>
        <div class="form-group">
            <label>Level</label><br>
            <select name="level" id="level" class="form-control">
                <option value="<?php echo $user->level;?>" selected><?php echo $user->level;?></option>
                <option value="Admin">Admin</option>
                <option value="Sekretaris">Sekretaris</option>
                <option value="Ketua Senat">Ketua Senat</option>
                <option value="Ketua Komisi 1">Ketua Komisi 1</option>
                <option value="Ketua Komisi 2">Ketua Komisi 2</option>
                <option value="Ketua Komisi 3">Ketua Komisi 3</option>
                <option value="Ketua Komisi 4">Ketua Komisi 4</option>
                <option value="Anggota Komisi 1">Anggota Komisi 1</option>
                <option value="Anggota Komisi 2">Anggota Komisi 2</option>
                <option value="Anggota Komisi 3">Anggota Komisi 3</option>
                <option value="Anggota Komisi 4">Anggota Komisi 4</option>
            </select>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label>Nama</label><br>
            <input class="form-control" value="<?php echo $user->nama;?>" name="nama" type="text" placeholder="Nama..."
                required>
        </div>
        <div class="form-group">
            <label>NIP</label><br>
            <input class="form-control" name="NIP" type="text" maxlength="18" minlength="18" value="<?php echo $user->NIP;?>" placeholder="Masukkan NIP..." value="">
        </div>
        <div class="form-group">
            <label>Jabatan</label><br>
            <input class="form-control" value="<?php echo $user->jabatan;?>" name="jabatan" type="text"
                placeholder="Jabatan..." >
        </div>
        <div class="form-group">
            <label>Keterangan</label><br>
            <input class="form-control" value="<?php echo $user->keterangan;?>" name="keterangan" type="text"
                placeholder="Keterangan..." >
        </div>
    </div>
</div>
<?php } ?>
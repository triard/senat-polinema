<?php if($cek == 0) { ?>
<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label>Username</label><br>
            <input class="form-control" name="username" type="text" placeholder="username" required>
        </div>
        <div class="form-group">
            <label>Email</label><br>
            <input class="form-control" name="email" type="email" placeholder="Email" required>
        </div>
        <div class="form-group">
            <label>Password</label><br>
            <input class="form-control" name="password" type="password" placeholder="*****" required>
        </div>
        <div class="form-group">
            <label>Level</label><br>
            <select name="level" id="level" class="custom-select form-control">
                <option value="admin">Admin</option>
                <option value="superadmin">Super Admin</option>
            </select>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label>Nama</label><br>
            <input class="form-control" name="nama" type="text" placeholder="Nama" required>
        </div>
        <div class="form-group">
            <label>Jabatan</label><br>
            <input class="form-control" name="jabatan" type="text" placeholder="Jabatan" required>
        </div>
        <div class="form-group">
            <label>Komisi</label><br>
            <input class="form-control" name="komisi" type="text" placeholder="Komisi" required>
        </div>
    </div>
</div>
<?php } else { ?>
<input type="hidden" name="id_user" value="<?php echo $user->id_user;?>">
<input type="hidden" name="user_id" value="<?php echo $user->user_id;?>">
<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label>Username</label><br>
            <input class="form-control" value="<?php echo $user->username;?>" name="username" type="text" placeholder="username" required>
        </div>
        <div class="form-group">
            <label>Email</label><br>
            <input class="form-control" value="<?php echo $user->email;?>" name="email" type="email" placeholder="Email"
                required>
        </div>
        <div class="form-group">
            <label>Level</label><br>
            <select name="level" id="level" class="form-control" value="<?php echo $user->level;?>">
                <option value="admin">Admin</option>
                <option value="superadmin">Super Admin</option>
            </select>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label>Nama</label><br>
            <input class="form-control" value="<?php echo $user->nama;?>" name="nama" type="text"
                placeholder="Nama" required>
        </div>
        <div class="form-group">
            <label>Jabatan</label><br>
            <input class="form-control"  value="<?php echo $user->jabatan;?>" name="jabatan" type="text" placeholder="Jabatan" required>
        </div>
        <div class="form-group">
            <label>Komisi</label><br>
            <input class="form-control"  value="<?php echo $user->komisi;?>" name="komisi" type="text" placeholder="Komisi" required>
        </div>
    </div>
</div>
<?php } ?>
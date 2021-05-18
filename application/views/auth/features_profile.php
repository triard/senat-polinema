<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('_partials/header');
$this->load->view('_partials/layout');
$this->load->view('_partials/sidebar');
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Profile</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Profile</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <?php if($this->session->flashdata('success') == TRUE){?>
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <?php echo $this->session->flashdata('success') ?>
                    </div>
                    <?php }else if($this->session->flashdata('failed') == TRUE){ ?>
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <?php echo $this->session->flashdata('failed') ?>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <h2 class="section-title"><?php echo $user->nama ?></h2>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form action="<?php echo base_url('user/updateProfile') ?>" method="POST">
                            <div class="card-header">
                                <h4>Edit Profile</h4>
                            </div>
                            <div class="card-body">
                                <input type="hidden" name="id_user" value="<?php echo $user->id_user;?>">
                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label>Nama</label>
                                        <input type="text" class="form-control" name="nama"
                                            value="<?php echo $user->nama;?>" required="">
                                        <div class="invalid-feedback">
                                            Silahkan isi nama
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Username</label>
                                        <input type="text" class="form-control" name="username"
                                            value="<?php echo $user->username;?>" required="">
                                        <div class="invalid-feedback">
                                            Silahkan isi username>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Jabatan</label>
                                        <input type="text" class="form-control" name="jabatan"
                                            value="<?php echo $user->jabatan;?>" required="">
                                        <div class=" invalid-feedback">
                                            Silahkan isi jabatan
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Keterangan</label>
                                        <input type="text" class="form-control" name="keterangan"
                                            value="<?php echo $user->keterangan;?>" required="">
                                        <div class="invalid-feedback">
                                            Silahkan isi keterangan
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="email"
                                            value="<?php echo $user->email;?>" required="">
                                        <div class="invalid-feedback">
                                            Silahkan isi email
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <div class="card-footer text-right">
                                            <button class="btn btn-primary m-2">Simpan Perubahan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <center>

                                <img alt="image" src="<?php echo base_url('assets/img/user/'.$user->image.'?rand='.rand(1,2000)); ?>"
                                    class="rounded mx-auto d-block" width="50%">
                            </center>
                        </div>
                        <div class="card-body">
                            <form action="<?php echo base_url('user/updateFoto') ?>" method="POST"
                                enctype="multipart/form-data">
                                <input type="hidden" name="id_user" value="<?php echo $user->id_user;?>">
                                <input type="hidden" name="old_image" value="<?php echo $user->image ?>" />

                                <label>Edit Foto Profile</label>
                                <center>
                                    <div id="image-preview" class="image-preview">
                                        <label for="image-upload" id="image-label">Choose File</label>
                                        <input type="file" name="image" id="image-upload" required/>
                                    </div>
                                </center>
                                <label for="">Maksimum Gambar 5mb</label>
                                <div class="invalid-feedback">
                                    Tolong Pilih Foto Profile Anda!
                                </div>

                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                        </form>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Update Password</h4>
                        </div>
                        <div class="card-body">
                            <form action="<?php echo base_url('user/resetPassword') ?>" method="POST">
                                <input type="hidden" name="id_user" value="<?php echo $user->id_user;?>">
                                <div class="form-group">
                                    <label>Password Baru</label>
                                    <input type="password" id="password" class="form-control" name="password"
                                        placeholder="password..." required="">
                                    <div class="invalid-feedback">
                                        Silahkan Isi Password
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Konfirmasi Password Baru</label>
                                    <input type="password" id="password-confirm" class="form-control" name="confirm"
                                        placeholder="Konfirmasi Password" required="">
                                    <div class="invalid-feedback">
                                        Silahkan Isi Konfirmasi Password
                                    </div>
                                    <p class="text-small"><input type="checkbox" onclick="myFunction()"> Lihat
                                        Password</p>
                                </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php $this->load->view('_partials/footer'); ?>
<script type="text/javascript">
function myFunction() {
    var x = document.getElementById("password");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
    var x = document.getElementById("password-confirm");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
</script>
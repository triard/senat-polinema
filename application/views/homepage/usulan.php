<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('homepage/_partials/header');
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Usulan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo base_url('Homepage/home') ?>">Beranda</a></div>
                <div class="breadcrumb-item">Usulan</div>
            </div>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="row">
                                    <div class="col-12">
                                        <?php if($this->session->flashdata('success') == TRUE){?>
                                        <div class="alert alert-success alert-dismissible">
                                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                                            <?php echo $this->session->flashdata('success') ?>
                                        </div>
                                        <?php }else if($this->session->flashdata('failed') == TRUE){ ?>
                                        <div class="alert alert-failed alert-dismissible">
                                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                                            <?php echo $this->session->flashdata('failed') ?>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>

                                <div class="card-header">
                                    <h4>Form Pengajuan Usulan</h4><br>
                                </div>
                                <div class="card-body">
                                    <form action="<?php echo base_url('Usulan/add_homepage') ?>" method="POST"
                                        enctype="multipart/form-data">
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama
                                                Pengusul</label>
                                            <div class="col-sm-12 col-md-7">
                                                <input type="text" class="form-control" name="nama_pengusul"
                                                    required="">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label
                                                class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                                            <div class="col-sm-12 col-md-7">
                                                <input type="email" name="email" class="form-control" required="">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label
                                                class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jenis</label>
                                            <div class="col-sm-12 col-md-7">
                                                <select name="jenis" class="form-control selectric" required="">
                                                    <option>Pertimbangan</option>
                                                    <option>Pengawasan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">File
                                                Pendukung</label>
                                            <div class="col-sm-12 col-md-7">
                                                <input class="form-control" name="dokumen_pendukung" type="file">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label
                                                class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Keterangan</label>
                                            <div class="col-sm-12 col-md-7">
                                                <textarea name="keterangan" class="form-control" required=""></textarea>
                                            </div>
                                        </div>
                                        <input type="hidden" name="status" value="diajukan">

                                        <div class="form-group row mb-4">
                                            <label
                                                class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                            <div class="col-sm-12 col-md-7">
                                                <button class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>
<?php $this->load->view('homepage/_partials/scrolltop'); ?>
<?php $this->load->view('homepage/_partials/loader'); ?>
</div>
<?php $this->load->view('homepage/_partials/footer'); ?>
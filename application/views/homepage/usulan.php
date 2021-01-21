<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('homepage/_partials/header');
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <?php $this->load->view('homepage/_partials/breadcrumb'); ?>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Simple Summernote</h4>
                                </div>
                                <div class="card-body">
                                    <form action="">
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama
                                                Pengusul</label>
                                            <div class="col-sm-12 col-md-7">
                                                <input type="text" class="form-control" required="">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label
                                                class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Posisi</label>
                                            <div class="col-sm-12 col-md-7">
                                                <input type="text" class="form-control" required="">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label
                                                class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                                            <div class="col-sm-12 col-md-7">
                                                <input type="email" class="form-control" required="">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label
                                                class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category</label>
                                            <div class="col-sm-12 col-md-7">
                                                <select class="form-control selectric" required="">
                                                    <option>Pertimbangan</option>
                                                    <option>Pengawasan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label
                                                class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category
                                                2</label>
                                            <div class="col-sm-12 col-md-7">
                                                <select class="form-control selectric" required="">
                                                    <option>Tech</option>
                                                    <option>News</option>
                                                    <option>Political</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label
                                                class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Content</label>
                                            <div class="col-sm-12 col-md-7">
                                                <textarea class="form-control" required=""></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label
                                                class="col-form-label text-md-right col-12 col-md-3 col-lg-3">File Pendukung</label>
                                            <div class="col-sm-12 col-md-7">
                                            <input class="form-control" type="file" name="my_file[]" multiple>
                                            </div>
                                        </div>
                                       
                                        <?php if (isset($_FILES['my_file'])) {
                                            $myFile = $_FILES['my_file'];
                                            $fileCount = count($myFile["name"]);
                                            for ($i = 0; $i < $fileCount; $i++) { ?>
                                            <p>File #<?= $i+1 ?>:</p>
                                            <p>
                                            Name: <?= $myFile["name"][$i] ?><br>
                                            Temporary file: <?= $myFile["tmp_name"][$i] ?><br>
                                            Type: <?= $myFile["type"][$i] ?><br>
                                            Size: <?= $myFile["size"][$i] ?><br>
                                            Error: <?= $myFile["error"][$i] ?><br>
                                            </p>
                                        <?php  }
                                        } ?>
                                        <div class="form-group row mb-4">
                                            <label
                                                class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                            <div class="col-sm-12 col-md-7">
                                                <button class="btn btn-primary">Publish</button>
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
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('homepage/_partials/header');
?>

<div class="main-content">
    <section class="section">
    <div class="section-header">
            <h1>Dokuemntasi Rapat</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo base_url('Homepage/home') ?>">Beranda</a></div>
                <div class="breadcrumb-item">Dokuemntasi Rapat</div>
            </div>
        </div> 
        <div class="row">
            <div class="col-10">
            </div>
            <div class="col-2">
                <a class="btn btn-primary btn-sm float-right mb-2"
                    href="<?php echo base_url('Homepage/gallery_folder') ?>"><i class="fas fa-folder"></i></a>
            </div>
        </div>

        <div class="section-body">
            <style>
            .image-custom {
                display: inline-block;
                width: 250px;
                height: 150px;
                background-repeat: no-repeat;
                background-size: cover;
                background-position: center;
                border-radius: 3px;
                cursor: pointer;
            }
            </style>
            <div class="container">
                <div class="row">
                    <?php foreach ($dokumentasi as $d) { ?>
                    <div class="col-sm-3">
                        <div class="m-1">
                            <a href="<?php echo base_url('assets/dokumentasiKegiatan/'.$d->nama_dokumentasi); ?>"
                                data-fancybox data-caption="">
                                <img class="image-custom img-fluid" loading="lazy"
                                    src="<?php echo base_url('assets/dokumentasiKegiatan/'.$d->nama_dokumentasi); ?>"
                                    alt="" />
                            </a>
                        </div>

                    </div>
                    <?php }  ?>
                </div>
            </div>

        </div>


</div>
</section>

</div>
<?php $this->load->view('homepage/_partials/scrolltop'); ?>
<?php $this->load->view('homepage/_partials/loader'); ?>
</div>
<?php $this->load->view('homepage/_partials/footer'); ?>
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
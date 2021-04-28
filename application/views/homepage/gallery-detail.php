<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('homepage/_partials/header');
?>
<!-- Main Content -->
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <a class="btn btn-warning btn-sm" href="<?php echo base_url('Homepage/gallery_folder') ?>"><i
                    class="fas fa-arrow-left"></i> </a>&nbsp;&nbsp;
            <h4><?php echo $kegiatan->agenda ?></h4>
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
                    <?php if($dokumentasi != null){ ?>
                    <?php foreach ($dokumentasi as $d) { ?>
                    <?php if($d->id_kegiatan == $kegiatan->id_kegiatan){ ?>
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
                    <?php }}} ?>
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
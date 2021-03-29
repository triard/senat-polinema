<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('homepage/_partials/header');
?>
<!-- Main Content -->
<!-- Main Content -->
<div class="main-content">
    <section class="section">
    <div class="row">
            <div class="col-10">
                <?php $this->load->view('homepage/_partials/breadcrumb'); ?>
            </div>
            <div class="col-2">
                <a class="btn btn-primary btn-sm float-right"
                    href="<?php echo base_url('Homepage/gallery') ?>"><i class="fas fa-list-alt"></i></a>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <?php foreach($kegiatan as $k){ ?>
                <div class="col-12 col-sm-6 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4><?php echo $k->agenda ?></h4>
                            <div class="card-header-action">
                                <a href="<?php echo base_url('homepage/gallery_detail/'.$k->id_kegiatan)?>" class="btn btn-primary"><i class="fas fa-eye"></i> Lihat</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="mb-2 text-muted"><?php echo date('d-m-Y', strtotime($k->waktu_mulai)); ?></div>
                            <div class="chocolat-parent">
                                <div data-crop-image="285">
                                    <img alt="image" src="<?php echo base_url(); ?>assets/img/folder.png"
                                        class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>

</div>
<?php $this->load->view('homepage/_partials/scrolltop'); ?>
<?php $this->load->view('homepage/_partials/loader'); ?>
</div>
<?php $this->load->view('homepage/_partials/footer'); ?>
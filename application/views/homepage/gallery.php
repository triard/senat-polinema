<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('homepage/_partials/header');
?>
<!-- Main Content -->
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <?php $this->load->view('homepage/_partials/breadcrumb'); ?>
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-sm-6 col-lg-6">

                    <div class="card">
                        <div class="card-header">
                            <h4>Rapat Terbuka 1</h4>
                            <div class="card-header-action">
                                <a href="<?php echo base_url('homepage/gallery_detail')?>" class="btn btn-primary">View
                                    All</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="mb-2 text-muted">Selasa,20 januari 2021</div>
                            <div class="chocolat-parent">
                                <a href="<?php echo base_url(); ?>assets/img/example-image.jpg" class="chocolat-image"
                                    title="Just an example">
                                    <div data-crop-image="285">
                                        <img alt="image" src="<?php echo base_url(); ?>assets/img/example-image.jpg"
                                            class="img-fluid">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-6">

                    <div class="card">
                        <div class="card-header">
                            <h4>Rapat Terbuka 2</h4>
                            <div class="card-header-action">
                                <a href="#" class="btn btn-primary">View All</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="mb-2 text-muted">Selasa,20 januari 2021</div>
                            <div class="chocolat-parent">
                                <a href="<?php echo base_url(); ?>assets/img/example-image.jpg" class="chocolat-image"
                                    title="Just an example">
                                    <div data-crop-image="285">
                                        <img alt="image" src="<?php echo base_url(); ?>assets/img/example-image.jpg"
                                            class="img-fluid">
                                    </div>
                                </a>
                            </div>
                        </div>
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
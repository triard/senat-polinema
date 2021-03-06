<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('homepage/_partials/header');
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <div id="carouselExampleIndicators3" class="carousel slide" data-ride="carousel">

                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img class="d-block w-100"
                                            src="<?php echo base_url(); ?>assets/img/news/img01.jpg" alt="First slide">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100"
                                            src="<?php echo base_url(); ?>assets/img/news/img07.jpg" alt="Second slide">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100"
                                            src="<?php echo base_url(); ?>assets/img/news/img08.jpg" alt="Third slide">
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleIndicators3" role="button"
                                    data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleIndicators3" role="button"
                                    data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                        <div class="card-body" style="background-color: #EE5A24;">
                            <ol class="carousel-indicators m-2">
                                <li data-target="#carouselExampleIndicators3" data-slide-to="0" class="active">
                                </li>
                                <li data-target="#carouselExampleIndicators3" data-slide-to="1"></li>
                                <li data-target="#carouselExampleIndicators3" data-slide-to="2"></li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-header text-white" style="background-color: #1E3799;">
                            <h4><b>BERITA</b></h4>
                            <div class="card-header-action">
                                <a href="#" class="btn btn-warning">View All</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled">
                                <li class="media">
                                    <div class="media-body">

                                        <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque
                                            ante sollicitudin. Cras purus oringilla. Donec lacinia congue felis in
                                            faucibus.</p>
                                    </div>
                                </li>
                                <li class="media my-4">
                                    <div class="media-body">

                                        <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque
                                            ante sollicitudin. Cras purus oringilla. Donec lacinia congue felis in
                                            faucibus.</p>
                                    </div>
                                </li>
                                <li class="media">
                                    <div class="media-body">

                                        <p class="mb-0">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus
                                            scelerisque ante sollicitudin. Cras purus oringilla. Donec lacinia
                                            congue felis in faucibus.</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</div>

<div class="section-body">
    <div class="row">
        <div class="col-sm-5">
            <div class="card">
                <div class="card-body mt-5">
                    <div class="section-title" style="color: #1E3799;">
                        <h3><b>Selamat Datang di
                            Webiste Senat Polinema</b></h3>
                    </div>
                    <hr>
                    <p>Tetap semangat menghadapi mimpi,
                        Tetap tangguh hadapi pandemi.</p>
                </div>
            </div>
        </div>
        <div class="col-sm-7">
            <img src="<?php echo base_url(); ?>assets/img/polinema.jpg" alt="poinema" height="285" width="650">
        </div>
    </div>
</div>
<?php $this->load->view('homepage/_partials/scrolltop'); ?>
</section>
<?php $this->load->view('homepage/_partials/loader'); ?>

</div>
<?php $this->load->view('homepage/_partials/footer'); ?>
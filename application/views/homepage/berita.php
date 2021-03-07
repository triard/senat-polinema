<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('homepage/_partials/header');
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Berita</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo base_url('Homepage/home') ?>">Beranda</a></div>
                <div class="breadcrumb-item">Berita</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <?php foreach ($berita as $k) { ?>

                <div class="col-lg-3 d-flex align-items-stretch">
                    <article class="article">
                        <div class="article-header">
                            <div class="article-image"
                                data-background="<?php echo base_url('assets/berita/').$k->image; ?>" loading="lazy">
                            </div>
                            <div class="article-title">
                                <!-- <h2><a href="#">Excepteur sint occaecat cupidatat non proident</a></h2> -->
                            </div>
                        </div>
                        <div class="article-details">
                            <div class="row">
                                <div class="col-6">
                                    <p class="text-small">
                                        <?php echo date('d M Y',strtotime($k->tanggal));?><br><i class="fas fa-eye"></i>
                                        <?php echo $k->jumlah_view ?>
                                    </p>
                                </div>
                                <div class="col-6">
                                    <p class="text-small float-right">
                                        Author: <?php echo $k->nama;?>
                                    </p>
                                </div>
                                <h4 class="p-2">
                                    <small>
                                        <a class="text-dark font-weight-bold"
                                            href="<?php echo base_url('Berita/berita_detail/').$k->id_berita ?>"
                                            style="text-decoration:none;">
                                            <?php echo $k->judul ?>
                                        </a>
                                    </small>
                                </h4>
                            </div>
                        </div>
                    </article>
                </div>
                <?php } ?>
            </div>

        </div>
</div>
</section>
<?php $this->load->view('homepage/_partials/scrolltop'); ?>
<?php $this->load->view('homepage/_partials/loader'); ?>
</div>
<?php $this->load->view('homepage/_partials/footer'); ?>
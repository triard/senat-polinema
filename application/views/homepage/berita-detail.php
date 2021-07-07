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
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-12">
                            <p><?php echo $berita->tanggal ?>
                                <span class="badge badge-success float-right"><i class="fas fa-eye"></i>
                                    <?php echo $berita->jumlah_view ?></span>
                            </p>
                        </div>
                        <div class="col-12 text-dark">
                            <h2><?php echo $berita->judul ?></h2>
                        </div>
                        <div class="col-12">
                            <p>Diposting oleh <?php echo $berita->nama ?></p>
                        </div>
                        <div class="col-12 text-center">
                        <img class="img-fluid img-thumbnail" src="<?php echo base_url('assets/berita/').$berita->image; ?>" alt="" style="width: 800px; ">
                        </div>
                    </div>
                </div>
                <div class="card-body text-dark" style="font-size: 1.1rem; text-align: justify">
                <?php echo $berita->keterangan ?>
                </div>
            </div>
        </div>
</div>
</section>
<?php $this->load->view('homepage/_partials/scrolltop'); ?>
<?php $this->load->view('homepage/_partials/loader'); ?>
</div>
<?php $this->load->view('homepage/_partials/footer'); ?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('homepage/_partials/header');
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Arsip Dokumen</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo base_url('Homepage/home') ?>">Beranda</a></div>
                <div class="breadcrumb-item">Arsip Dokumen</div>
            </div>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-4">
                              <ul class="nav nav-pills flex-column" id="myTab4" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab4" data-toggle="tab" href="#home4" role="tab"
                                        aria-controls="home" aria-selected="true">Hasil Rapat Senat </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab4" data-toggle="tab" href="#profile4" role="tab"
                                        aria-controls="profile" aria-selected="false">Hasil Rapat Pengawasan</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="contact-tab4" data-toggle="tab" href="#contact4" role="tab"
                                        aria-controls="contact" aria-selected="false">Hasil Rapat Pertimbangan</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="contact-tab4" data-toggle="tab" href="#komisid" role="tab"
                                        aria-controls="contact" aria-selected="false">Hasil Rapat Ketetapan Kebijakan</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-12 col-sm-12 col-md-8">
                            <div class="tab-content no-padding" id="myTab2Content">
                                <div class="tab-pane fade show active" id="home4" role="tabpanel"
                                    aria-labelledby="home-tab4">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th style="width: 30px;">No.</th>
                                                <th>Nama File</th>
                                                <th>Tanggal</th>
                                                <th>Jenis</th>
                                                <th style="width: 30px;">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no=1;
                                            foreach ($laporan as $l) { ?>
                                            <?php if($l->status != "Diajukan" && $l->status != "Revisi"){ ?>
                                            <tr>
                                                <td><?php echo $no;?></td>
                                                <td><?php echo $l->nama_laporan ?></td>
                                                <td><?php echo date('d-m-Y', strtotime($l->waktu_mulai)) ?></td>
                                                <td><?php echo $l->jenis ?></td>
                                                <td class="text-center">
                                                    <?php echo "<a class='btn btn-icon btn-success' target='_blank' href='".base_url()."Laporan/download_file/$l->file_laporan'><i class='fas fa-download'></i></a>";?>
                                                </td>
                                            </tr>
                                            <?php  $no++; }}  ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="profile4" role="tabpanel" aria-labelledby="profile-tab4">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th style="width: 30px;">No.</th>
                                                <th>Nama File</th>
                                                <th>Tanggal</th>
                                                <th>Jenis</th>
                                                <th style="width: 30px;">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no=1;
                                            foreach ($pengawasan as $l) { ?>
                                            <?php if($l->status != "Diajukan" && $l->status != "Revisi"){ ?>
                                            <tr>
                                                <td><?php echo $no;?></td>
                                                <td><?php echo $l->nama_laporan ?></td>
                                                <td><?php echo date('d-m-Y', strtotime($l->waktu_mulai)) ?></td>
                                                <td><?php echo $l->jenis ?></td>
                                                <td class="text-center">
                                                    <?php echo "<a class='btn btn-icon btn-success' target='_blank' href='".base_url()."Laporan/download_file/$l->file_laporan'><i class='fas fa-download'></i></a>";?>
                                                </td>
                                            </tr>
                                            <?php  $no++; }}  ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="contact4" role="tabpanel" aria-labelledby="contact-tab4">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th style="width: 30px;">No.</th>
                                                <th>Nama File</th>
                                                <th>Tanggal</th>
                                                <th>Jenis</th>
                                                <th style="width: 30px;">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no=1;
                                            foreach ($pertimbangan as $l) { ?>
                                            <?php if($l->status != "Diajukan" && $l->status != "Revisi"){ ?>
                                            <tr>
                                                <td><?php echo $no;?></td>
                                                <td><?php echo $l->nama_laporan ?></td>
                                                <td><?php echo date('d-m-Y', strtotime($l->waktu_mulai)) ?></td>
                                                <td><?php echo $l->jenis ?></td>
                                                <td class="text-center">
                                                    <?php echo "<a class='btn btn-icon btn-success' target='_blank' href='".base_url()."Laporan/download_file/$l->file_laporan'><i class='fas fa-download'></i></a>";?>
                                                </td>
                                            </tr>
                                            <?php  $no++; }}  ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="komisid" role="tabpanel" aria-labelledby="contact-tab4">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th style="width: 30px;">No.</th>
                                                <th>Nama File</th>
                                                <th>Tanggal</th>
                                                <th>Jenis</th>
                                                <th style="width: 30px;">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no=1;
                                            foreach ($kebijakan as $l) { ?>
                                            <?php if($l->status != "Diajukan" && $l->status != "Revisi"){ ?>
                                            <tr>
                                                <td><?php echo $no;?></td>
                                                <td><?php echo $l->nama_laporan ?></td>
                                                <td><?php echo date('d-m-Y', strtotime($l->waktu_mulai)) ?></td>
                                                <td><?php echo $l->jenis ?></td>
                                                <td class="text-center">
                                                    <?php echo "<a class='btn btn-icon btn-success' target='_blank' href='".base_url()."Laporan/download_file/$l->file_laporan'><i class='fas fa-download'></i></a>";?>
                                                </td>
                                            </tr>
                                            <?php  $no++; }}  ?>
                                        </tbody>
                                    </table>
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
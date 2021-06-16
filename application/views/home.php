<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('_partials/header');
$this->load->view('_partials/layout');
$this->load->view('_partials/sidebar');
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>
        <div class="row">
            <?php if($this->session->userdata('level') == "Admin"){?>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total User</h4>
                        </div>
                        <div class="card-body">
                            <?php echo $user ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon" style="background-color: #f1c40f;">
                        <i class="far fa-newspaper"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Berita</h4>
                        </div>
                        <div class="card-body">
                            <?php echo $berita?>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="far fa-lightbulb"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Usulan</h4>
                        </div>
                        <div class="card-body">
                            <?php echo $usulan?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="far fa-file-alt"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Laporan Hasil Rapat/Sidang</h4>
                        </div>
                        <div class="card-body">
                            <?php echo $laporan ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon" style="background-color:#706fd3;">
                        <i class="far fa-file-image"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Dokumentasi</h4>
                        </div>
                        <div class="card-body">
                            <?php echo $dokumentasi ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php if($this->session->userdata('level') == "Admin"){?>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="fas fa-lightbulb"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Usulan Perlu Diverifikasi</h4>
                        </div>
                        <div class="card-body">
                            <?php echo $verifikasi ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="far fa-calendar-check"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Agenda Kegiatan Terlaksana</h4>
                        </div>
                        <div class="card-body">
                            <?php echo $jadwalTerlaksana ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-5 col-sm-7 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon" style="background-color:#f1c40f;">
                        <i class="far fa-calendar-minus"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Agenda Kegiatan Belum Terlaksana</h4>
                        </div>
                        <div class="card-body">
                            <?php echo $jadwalBelumTerlaksana ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon" style="background-color:#44bd32;">
                        <i class="far fa-calendar"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Agenda Kegiatan Komisi 1</h4>
                        </div>
                        <div class="card-body">
                            <?php echo $jadwalKomisi1 ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon" style="background-color:#a29bfe;">
                        <i class="far fa-calendar"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Agenda Kegiatan Komisi 2</h4>
                        </div>
                        <div class="card-body">
                            <?php echo $jadwalKomisi2 ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon" style="background-color:#81ecec;">
                        <i class="far fa-calendar"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Agenda Kegiatan Komisi 3</h4>
                        </div>
                        <div class="card-body">
                            <?php echo $jadwalKomisi3 ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon" style="background-color:#ff7675;">
                        <i class="far fa-calendar"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Agenda Kegiatan Komisi 4</h4>
                        </div>
                        <div class="card-body">
                            <?php echo $jadwalKomisi4 ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
            <?php if($this->session->userdata('level') == "Sekretaris"){?>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="far fa-calendar-alt"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Usulan Perlu Dijadwalkan</h4>
                        </div>
                        <div class="card-body">
                            <?php echo $sekretaris; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="far fa-calendar-check"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Agenda Kegiatan Terlaksana</h4>
                        </div>
                        <div class="card-body">
                            <?php echo $jadwalTerlaksana ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon" style="background-color:#f1c40f;">
                        <i class="far fa-calendar-minus"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Agenda Kegiatan Belum Terlaksana</h4>
                        </div>
                        <div class="card-body">
                            <?php echo $jadwalBelumTerlaksana ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon" style="background-color:#55efc4;">
                        <i class="far fa-calendar"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Agenda Kegiatan Komisi 1</h4>
                        </div>
                        <div class="card-body">
                            <?php echo $jadwalKomisi1 ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon" style="background-color:#a29bfe;">
                        <i class="far fa-calendar"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Agenda Kegiatan Komisi 2</h4>
                        </div>
                        <div class="card-body">
                            <?php echo $jadwalKomisi2 ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon" style="background-color:#81ecec;">
                        <i class="far fa-calendar"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Agenda Kegiatan Komisi 3</h4>
                        </div>
                        <div class="card-body">
                            <?php echo $jadwalKomisi3 ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon" style="background-color:#ff7675;">
                        <i class="far fa-calendar"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Agenda Kegiatan Komisi 4</h4>
                        </div>
                        <div class="card-body">
                            <?php echo $jadwalKomisi4 ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
            <?php if($this->session->userdata('level') == "Ketua Komisi 1" || $this->session->userdata('level') == "Ketua Komisi 2" || $this->session->userdata('level') == "Ketua Komisi 3" || $this->session->userdata('level') == "Ketua Komisi 4"){?>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="far fa-calendar-alt"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Usulan Perlu Dijadwalkan</h4>
                        </div>
                        <div class="card-body">
                            <?php if($this->session->userdata('level') == "Ketua Komisi 1"){
                                echo $komisi1;
                            }else if($this->session->userdata('level') == "Ketua Komisi 2"){
                                echo $komisi2;
                            }else if($this->session->userdata('level') == "Ketua Komisi 3"){
                               echo $komisi3;
                            }else if($this->session->userdata('level') == "Ketua Komisi 4"){
                                echo $komisi4;
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="far fa-calendar-check"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Agenda Kegiatan Terlaksana</h4>
                        </div>
                        <div class="card-body">
                            <?php echo $jadwalTerlaksana ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon" style="background-color:#f1c40f;">
                        <i class="far fa-calendar-minus"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Agenda Kegiatan Belum Terlaksana</h4>
                        </div>
                        <div class="card-body">
                            <?php echo $jadwalBelumTerlaksana ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon" style="background-color:#44bd32;">
                        <i class="far fa-calendar"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <?php if($this->session->userdata('level') == "Ketua Komisi 1"){
                            ?>
                            <h4>Agenda Kegiatan Komisi 1 Terlaksana</h4>
                            <?php
                            }else if($this->session->userdata('level') == "Ketua Komisi 2"){
                            ?>
                            <h4>Agenda Kegiatan Komisi 2 Terlaksana</h4>
                            <?php
                            }else if($this->session->userdata('level') == "Ketua Komisi 3"){
                            ?>
                            <h4>Agenda Kegiatan Komisi 3 Terlaksana</h4>
                            <?php
                            }else if($this->session->userdata('level') == "Ketua Komisi 4"){
                            ?>
                            <h4>Agenda Kegiatan Komisi 4 Terlaksana</h4>
                            <?php
                            } ?>
                        </div>
                        <div class="card-body">
                            <?php if($this->session->userdata('level') == "Ketua Komisi 1"){
                                echo $jadwalKomisi1Terlaksana;
                            }else if($this->session->userdata('level') == "Ketua Komisi 2"){
                                echo $jadwalKomisi2Terlaksana;
                            }else if($this->session->userdata('level') == "Ketua Komisi 3"){
                                echo $jadwalKomisi3Terlaksana;
                            }else if($this->session->userdata('level') == "Ketua Komisi 4"){
                                echo $jadwalKomisi4Terlaksana;
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon" style="background-color:#f9ca24;">
                        <i class="far fa-calendar"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <?php if($this->session->userdata('level') == "Ketua Komisi 1"){
                            ?>
                            <h4>Agenda Kegiatan Komisi 1 Belum Terlaksana</h4>
                            <?php
                            }else if($this->session->userdata('level') == "Ketua Komisi 2"){
                            ?>
                            <h4>Agenda Kegiatan Komisi 2 Belum Terlaksana</h4>
                            <?php
                            }else if($this->session->userdata('level') == "Ketua Komisi 3"){
                            ?>
                            <h4>Agenda Kegiatan Komisi 3 Belum Terlaksana</h4>
                            <?php
                            }else if($this->session->userdata('level') == "Ketua Komisi 4"){
                            ?>
                            <h4>Agenda Kegiatan Komisi 4 Belum Terlaksana</h4>
                            <?php
                            } ?>
                        </div>
                        <div class="card-body">
                            <?php if($this->session->userdata('level') == "Ketua Komisi 1"){
                                echo $jadwalKomisi1BelumTerlaksana;
                            }else if($this->session->userdata('level') == "Ketua Komisi 2"){
                                echo $jadwalKomisi2BelumTerlaksana;
                            }else if($this->session->userdata('level') == "Ketua Komisi 3"){
                                echo $jadwalKomisi3BelumTerlaksana;
                            }else if($this->session->userdata('level') == "Ketua Komisi 4"){
                                echo $jadwalKomisi4BelumTerlaksana;
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
            <?php if($this->session->userdata('level') == "Anggota Komisi 1" || $this->session->userdata('level') == "Anggota Komisi 2" || $this->session->userdata('level') == "Anggota Komisi 3" || $this->session->userdata('level') == "Anggota Komisi 4"){?>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="far fa-calendar-check"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Agenda Kegiatan Terlaksana</h4>
                        </div>
                        <div class="card-body">
                            <?php echo $jadwalTerlaksana ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon" style="background-color:#f1c40f;">
                        <i class="far fa-calendar-minus"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Agenda Kegiatan Belum Terlaksana</h4>
                        </div>
                        <div class="card-body">
                            <?php echo $jadwalBelumTerlaksana ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon" style="background-color:#44bd32;">
                        <i class="far fa-calendar"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <?php if($this->session->userdata('level') == "Anggota Komisi 1"){
                            ?>
                            <h4>Agenda Kegiatan Komisi 1</h4>
                            <?php
                            }else if($this->session->userdata('level') == "Anggota Komisi 2"){
                            ?>
                            <h4>Agenda Kegiatan Komisi 2</h4>
                            <?php
                            }else if($this->session->userdata('level') == "Anggota Komisi 3"){
                            ?>
                            <h4>Agenda Kegiatan Komisi 3</h4>
                            <?php
                            }else if($this->session->userdata('level') == "Anggota Komisi 4"){
                            ?>
                            <h4>Agenda Kegiatan Komisi 4</h4>
                            <?php
                            } ?>
                        </div>
                        <div class="card-body">
                            <?php if($this->session->userdata('level') == "Anggota Komisi 1"){
                                echo $jadwalKomisi1;
                            }else if($this->session->userdata('level') == "Anggota Komisi 2"){
                                echo $jadwalKomisi2;
                            }else if($this->session->userdata('level') == "Anggota Komisi 3"){
                                echo $jadwalKomisi3;
                            }else if($this->session->userdata('level') == "Anggota Komisi 4"){
                                echo $jadwalKomisi4;
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
            <?php if($this->session->userdata('level') == "Ketua Senat"){?>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="far fa-file-alt"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Laporan Perlu Disetujui</h4>
                        </div>
                        <div class="card-body">
                            <?php echo $birokrasi ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="far fa-calendar-check"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Agenda Kegiatan Terlaksana</h4>
                        </div>
                        <div class="card-body">
                            <?php echo $jadwalTerlaksana ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon" style="background-color:#f1c40f;">
                        <i class="far fa-calendar-minus"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Agenda Kegiatan Belum Terlaksana</h4>
                        </div>
                        <div class="card-body">
                            <?php echo $jadwalBelumTerlaksana ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon" style="background-color:#55efc4;">
                        <i class="far fa-calendar"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Agenda Kegiatan Komisi 1</h4>
                        </div>
                        <div class="card-body">
                            <?php echo $jadwalKomisi1 ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon" style="background-color:#a29bfe;">
                        <i class="far fa-calendar"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Agenda Kegiatan Komisi 2</h4>
                        </div>
                        <div class="card-body">
                            <?php echo $jadwalKomisi2 ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon" style="background-color:#81ecec;">
                        <i class="far fa-calendar"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Agenda Kegiatan Komisi 3</h4>
                        </div>
                        <div class="card-body">
                            <?php echo $jadwalKomisi3 ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon" style="background-color:#ff7675;">
                        <i class="far fa-calendar"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Agenda Kegiatan Komisi 4</h4>
                        </div>
                        <div class="card-body">
                            <?php echo $jadwalKomisi4 ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
        <?php if($this->session->userdata('level') != "Admin"){?>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4><i class="far fa-calendar-alt"></i> Agenda Sedang Berlangsung</h4>
                    </div>
                    <div class="card-body p-0">
                        <div class="fc-overflow">
                            <div class="table-responsive">
                                <table class="table table-striped mb-0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Agenda</th>
                                            <th>Pembahasan</th>
                                            <th>Detail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=1;
                                        foreach ($agenda as $k) { ?>
                                        <?php if(($k->status == "Rapat Sedang Berlangsung" || $k->status == "Sidang Sedang Berlangsung") && $this->session->userdata('id_user') == $k->user){?>
                                        <tr>
                                            <td><?php echo $no;?></td>
                                            <td><?php echo $k->agenda;?></td>
                                            <td><?php echo $k->pembahasan;?></td>
                                            <td class="td-actions text-center">
                                                <a class="btn btn-primary"
                                                    href="<?php echo base_url('Kegiatan/kegiatan_detail/').$k->id_kegiatan;?>"><i
                                                        class="fas fa-info-circle"></i></a>
                                            </td>
                                        </tr>
                                        <?php $no++; }} ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4><i class="far fa-calendar-alt"></i> Jadwal yang akan datang</h4>
                        <div class="card-header-action">
                            <a href="<?php echo base_url('Penjadwalan') ?>" class="btn btn-primary">Lihat Semua</a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="fc-overflow">
                            <!-- <div id="myEvent"></div> -->
                            <div class="table-responsive">
                                <table class="table table-striped mb-0">
                                    <thead>
                                        <tr>
                                        
                                            <th>Agenda</th>
                                            <th>Pembahasan</th>
                                            <th>Waktu</th>
                                            <th>Tempat</th>
                                            <th>Link Ruang(Daring)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php foreach ($penjadwalan as $k) { ?>
                                        <?php if($this->session->userdata('id_user') == $k->user && $k->status != "Selesai"){?>
                                        <tr>
                                       
                                            <td><?php echo $k->agenda;?></td>
                                            <td><?php echo $k->pembahasan;?></td>
                                            <td><?php echo date('d-m-Y H:i', strtotime($k->waktu_mulai)); ?> -
                                                <?php echo date('H:i', strtotime($k->waktu_selesai)); ?> WIB</td>
                                            <td><?php echo $k->tempat;?></td>
                                            <td><?php echo $k->link;?>(<?php echo $k->password;?>)</td>
                                        </tr>
                                        <?php }}?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
        <div class="row">
            <div class="col-lg-8 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Statistik Usulan</h4>
                        <div class="card-header-action">
                            <form class="form-inline" method="POST" action="<?php echo site_url('Home/');?>">
                                <label class="sr-only" for="inlineFormInputName2">Name</label>
                                <input type="date" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2"
                                    name="startUsulan" value="<?php echo $this->input->post('startUsulan') ?>" required>
                                <label class="sr-only" for="inlineFormInputGroupUsername2">Username</label>
                                <div class="input-group mb-2 mr-sm-2">
                                    <input type="date" class="form-control" id="inlineFormInputGroupUsername2"
                                        name="endUsulan" value="<?php echo $this->input->post('endUsulan') ?>" required>
                                    &nbsp;&nbsp;
                                    <button type="submit" class="btn btn-primary btn-sm"><i
                                            class="glyphicon glyphicon-search"></i>
                                        <i class="fas fa-filter"></i> Filter</button>
                            </form>
                            <a href="<?php echo site_url('Home/');?>" class="btn btn-success btn-sm"><i
                                    class="fas fa-sync-alt"></i></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <?php if($usulanFilter == null && $this->input->post('startUsulan') != null){ 

                            }else if($usulanFilter != null ){
                                foreach ($usulanFilter as $mi){ 
    
                                    $jenis[] = [$mi->jenis];
                                    $jml_jenis[] = $mi->totalUsulan;	
                                    
                                } 
                                echo "<canvas id='chartUsulan'></canvas>";
                            } 
                            else{
                                    foreach ($totalUsulan as $mi){ 
                                    $jenis[] = [$mi->jenis];
                                    $jml_jenis[] = $mi->totalUsulan;	                                
                                    
                                    }
                                    echo "<canvas id='chartUsulan'></canvas>"; 
                            } ?>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12 col-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Aktivitas Terakhir</h4>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled list-unstyled-border">
                        <?php foreach ($notifikasiLimit as $k) { 
                            if ((($this->session->userdata('level') == "Ketua Komisi 1" || $this->session->userdata('level') == "Anggota Komisi 1") && ($k->user == 'Ketua Komisi 1' || $k->user == 'Admin' || $k->user == 'Sekretaris'))) { ?>
                        <li class="media">
                            <div class="media-body">
                                <div class="float-right text-primary"><?php echo $k->time; ?></div>
                                <div class="media-title"><?php echo $k->user; ?></div>
                                <span class="text-small text-muted"><?php echo $k->text; ?></span>
                            </div>
                        </li>
                        <?php } else if ((($this->session->userdata('level') == "Ketua Komisi 2" || $this->session->userdata('level') == "Anggota Komisi 2") && ($k->user == 'Ketua Komisi 2' || $k->user == 'Admin' || $k->user == 'Sekretaris'))) { ?>
                        <li class="media">
                            <div class="media-body">
                                <div class="float-right text-primary"><?php echo $k->time; ?></div>
                                <div class="media-title"><?php echo $k->user; ?></div>
                                <span class="text-small text-muted"><?php echo $k->text; ?></span>
                            </div>
                        </li>
                        <?php } else if ((($this->session->userdata('level') == "Ketua Komisi 3" || $this->session->userdata('level') == "Anggota Komisi 3") && ($k->user == 'Ketua Komisi 3' || $k->user == 'Admin' || $k->user == 'Sekretaris'))) { ?>
                        <li class="media">
                            <div class="media-body">
                                <div class="float-right text-primary"><?php echo $k->time; ?></div>
                                <div class="media-title"><?php echo $k->user; ?></div>
                                <span class="text-small text-muted"><?php echo $k->text; ?></span>
                            </div>
                        </li>
                        <?php } else if ((($this->session->userdata('level') == "Ketua Komisi 4" || $this->session->userdata('level') == "Anggota Komisi 4") && ($k->user == 'Ketua Komisi 4' || $k->user == 'Admin' || $k->user == 'Sekretaris'))) { ?>
                        <li class="media">
                            <div class="media-body">
                                <div class="float-right text-primary"><?php echo $k->time; ?></div>
                                <div class="media-title"><?php echo $k->user; ?></div>
                                <span class="text-small text-muted"><?php echo $k->text; ?></span>
                            </div>
                        </li>
                        <?php } else if ($this->session->userdata('level') == "Sekretaris" || $this->session->userdata('level') == "Admin" || $this->session->userdata('level') == "Ketua Senat") { ?>
                        <li class="media">
                            <div class="media-body">
                                <div class="float-right text-primary"><?php echo $k->time; ?></div>
                                <div class="media-title"><?php echo $k->user; ?></div>
                                <span class="text-small text-muted"><?php echo $k->text; ?></span>
                            </div>
                        </li>
                        <?php } ?>
                        <?php } ?>
                    </ul>
                    <div class="text-center pt-1 pb-1">
                        <a href="<?php echo base_url('Notifikasi') ?>" class="btn btn-primary btn-lg btn-round btn-sm">
                            Lihat Semua
                        </a>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>
</div>
<?php $this->load->view('_partials/footer'); ?>
<script>
var ctx = document.getElementById("chartUsulan").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: <?php echo json_encode($jenis);?>,
        datasets: [{
            label: 'Total',
            data: <?php echo json_encode($jml_jenis);?>,
            borderWidth: 2,
            backgroundColor: '#6777ef',
            borderColor: '#6777ef',
            borderWidth: 2.5,
            pointBackgroundColor: '#ffffff',
            pointRadius: 4
        }]
    },
    options: {
        legend: {
            display: false
        },
        scales: {
            yAxes: [{
                gridLines: {
                    drawBorder: false,
                    color: '#f2f2f2',
                },
                ticks: {
                    beginAtZero: true,
                    stepSize: 50
                }
            }],
            xAxes: [{
                ticks: {
                    display: false
                },
                gridLines: {
                    display: false
                }
            }]
        },
    }
});
</script>
<?php $this->load->view('homepage/_partials/scrolltop'); ?>
<?php $this->load->view('homepage/_partials/loader'); ?>
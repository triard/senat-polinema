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
            <a class="btn btn-warning btn-sm" href="<?php echo base_url('Kegiatan') ?>"><i
                    class="fas fa-arrow-left"></i> </a>&nbsp;&nbsp;
            <h4>Agenda Kegiatan Detail</h4>
        </div>
        <div class="row">
            <div class="col-12">
                <?php if($this->session->flashdata('success') == TRUE){?>
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <?php echo $this->session->flashdata('success') ?>
                </div>
                <?php }else if($this->session->flashdata('failed') == TRUE){ ?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <?php echo $this->session->flashdata('failed') ?>
                </div>
                <?php } ?>
            </div>
        </div>
        <div class="section-body">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                        aria-controls="home" aria-selected="true">Notula</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                        aria-controls="profile" aria-selected="false">Absen</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                        aria-controls="contact" aria-selected="false">Laporan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#dokumentasi" role="tab"
                        aria-controls="contact" aria-selected="false">Dokumentasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#voting" role="tab"
                        aria-controls="contact" aria-selected="false">Voting</a>
                </li>
            </ul>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel"
                                    aria-labelledby="home-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>Notula Rapat / Sidang</h4>

                                            <div class="card-header-action">
                                                <?php if (($hakAkses == "Sekretaris" && $this->session->userdata('id_user') == $kegiatan->id_user) || ($hakAkses == "Ketua Komisi 1" && $this->session->userdata('id_user') == $kegiatan->id_user) || ($hakAkses == "Ketua Komisi 2" && $this->session->userdata('id_user') == $kegiatan->id_user) || ($hakAkses == "Ketua Komisi 3" && $this->session->userdata('id_user') == $kegiatan->id_user) || ($hakAkses == "Ketua Komisi 4" && $this->session->userdata('id_user') == $kegiatan->id_user)){ ?>
                                                <button class="btn btn-primary"
                                                    onclick="ganti(<?php echo $kegiatan->id_kegiatan;?>)"><i
                                                        class="fas fa-pen-square"></i>
                                                    Update</button>
                                                <?php } ?>
                                                <!-- <a class="btn btn-success" target="_blank"
                                                    href="<?php echo base_url('Kegiatan/download_notula/'.$kegiatan->id_kegiatan) ?>"><i class="fas fa-file-export"></i></a> -->
                                                <button class="btn btn-success btn-sm"
                                                    onclick="downloadNotula(<?php echo $kegiatan->id_kegiatan;?>)">
                                                    <i class="fas fa-file-export"></i></button>
                                            </div>


                                        </div>
                                        <div class="card-body">
                                            <center>
                                                <h5><?php echo $kegiatan->agenda ?></h5>
                                                <hr>
                                            </center>
                                            <br><br>
                                            <div class="table-responsive">
                                                <table class="table table-borderless text-dark">
                                                    <tbody>
                                                        <tr class="table-active">
                                                            <td style="width: 200px;">Tanggal</td>
                                                            <td style="width: 30px;">:</td>
                                                            <td>
                                                                <?php $tanggal = date('d-m-Y', strtotime($kegiatan->waktu_mulai));
                                                                $hari = date('l', strtotime($tanggal));
                                                            $hari_indonesia = array(
                                                                'Monday' => 'Senin',
                                                                'Tuesday'  => 'Selasa',
                                                                'Wednesday' => 'Rabu',
                                                                'Thursday' => 'Kamis',
                                                                'Friday' => 'Jumat',
                                                                'Saturday' => 'Sabtu',
                                                                'Sunday' => 'Minggu');
                                                                echo $hari_indonesia[$hari];
                                                        ?>,
                                                                <?php echo date('d-m-Y', strtotime($kegiatan->waktu_mulai)); ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Waktu</td>
                                                            <td>:</td>
                                                            <td><?php echo date('H:i', strtotime($kegiatan->waktu_mulai)); ?>
                                                                -
                                                                <?php echo date('H:i', strtotime($kegiatan->waktu_selesai)); ?>
                                                                WIB</td>

                                                        </tr>
                                                        <tr class="table-active">
                                                            <td>Tempat</td>
                                                            <td>:</td>
                                                            <td><?php echo $kegiatan->tempat ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Tujuan Pembahasan</td>
                                                            <td>:</td>
                                                            <td><?php echo $kegiatan->tujuan ?></td>
                                                        </tr>
                                                        <tr class="table-active">
                                                            <td>Pembahasan</td>
                                                            <td>:</td>
                                                            <td><?php echo $kegiatan->pembahasan ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Hasil Keputusan</td>
                                                            <td>:</td>
                                                            <td><?php echo $kegiatan->notula ?></td>
                                                        </tr>
                                                        <tr class="table-active">
                                                            <td>Notulis</td>
                                                            <td>:</td>
                                                            <td><?php echo $kegiatan->nama ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Link Ruangan Daring (Password)</td>
                                                            <td>:</td>
                                                            <td><?php echo $kegiatan->link ?>(<?php echo $kegiatan->password ?>)
                                                            </td>
                                                        </tr>
                                                        <tr class="table-active">
                                                            <td>Status</td>
                                                            <td>:</td>
                                                            <td>
                                                                <?php if ($kegiatan->status != NULL) { ?>
                                                                <div class="badge badge-success">
                                                                    <?php echo $kegiatan->status;?></div>
                                                                <?php } else { ?>
                                                                <div class="badge badge-danger">Anda Belum Melakukan
                                                                    Konfirmasi Status</div>
                                                                <?php } ?>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <?php date_default_timezone_set('Asia/Jakarta');?>
                                    <h4>Daftar Peserta Rapat</h4>
                                    <div class="float-md-right m-2">
                                        <button class="btn btn-success btn-sm"
                                            onclick="downloadAbsen(<?php echo $kegiatan->id_kegiatan;?>)">
                                            <i class="fas fa-file-export"></i></button>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">

                                            <thead>
                                                <tr>
                                                    <th>Nama</th>
                                                    <th>Keterangan</th>
                                                    <th style="width: 350px;">Absen </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($peserta AS $p ): ?>
                                                <?php if($p->id_penjadwalan == $kegiatan->id_penjadwalan ){ ?>
                                                <tr>
                                                    <td><?php echo $p->nama ?></td>
                                                    <td><?php echo $p->jabatan;?></td>
                                                    <td>
                                                        <center>
                                                            <?php if($p->id_user == $this->session->userdata('id_user') && $p->absen == NULL && (date('Y-m-d H:i:s') >= $kegiatan->waktu_mulai) && date('Y-m-d', strtotime($kegiatan->waktu_mulai)) == date('Y-m-d') ){ ?>
                                                            <?php if(date('H:i:s') <= $kegiatan->waktu_selesai && date('Y-m-d', strtotime($kegiatan->waktu_mulai)) == date('Y-m-d')){?>
                                                            <button class="btn btn-success btn-sm"
                                                                onclick="setAbsen(<?php echo $p->id_peserta;?>)">
                                                                Kirimikan Kehadiran</button>
                                                            <?php }else{ ?>
                                                            <?php if($p->absen != NULL){ ?>
                                                            <img style="width: 40%; margin: 5px;"
                                                                src="<?php echo base_url($p->absen)?>"
                                                                alt="<?php echo $p->absen ?>">
                                                            <?php }else{} ?>
                                                            <?php } ?>
                                                            <?php }else{ ?>
                                                            <?php if($p->absen != NULL){ ?>
                                                            <img style="width: 40%; margin: 5px;"
                                                                src="<?php echo base_url($p->absen)?>"
                                                                alt="<?php echo $p->absen ?>">
                                                            <?php }else{} ?>
                                                            <?php } ?>
                                                        </center>
                                                    </td>
                                                </tr>
                                                <?php } endforeach ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>Laporan Hasil Rapat/Sidang</h4>
                                            <?php if (($hakAkses == "Sekretaris" && $this->session->userdata('id_user') == $kegiatan->id_user) || ($hakAkses == "Ketua Komisi 1" && $this->session->userdata('id_user') == $kegiatan->id_user) || ($hakAkses == "Ketua Komisi 2" && $this->session->userdata('id_user') == $kegiatan->id_user) || ($hakAkses == "Ketua Komisi 3" && $this->session->userdata('id_user') == $kegiatan->id_user) || ($hakAkses == "Ketua Komisi 4" && $this->session->userdata('id_user') == $kegiatan->id_user)){ ?>
                                            <div class="card-header-action">
                                                <button class="btn btn-success"
                                                    onclick="tambahLaporan(<?php echo $kegiatan->id_kegiatan;?>)"><i
                                                        class="fas fa-plus-circle"></i>
                                                    Tambah</button>
                                            </div>
                                            <?php } ?>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>Nama File</th>
                                                            <th>Status</th>
                                                            <th style="width: 300px;">Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                    foreach ($laporan as $l) { ?>
                                                        <?php if($l->id_kegiatan == $kegiatan->id_kegiatan && (($l->status != "Diajukan" && $l->status != "Revisi") || $this->session->userdata('id_user') == $kegiatan->id_user)){ ?>
                                                        <tr>
                                                            <td><?php echo $l->nama_laporan ?></td>
                                                            <td><?php echo $l->status ?></td>
                                                            <td class="text-center">
                                                                <?php echo "<a class='btn btn-icon btn-success' target='_blank' href='".base_url()."Laporan/download_file/$l->file_laporan'><i class='fas fa-download'></i></a>";?>
                                                                <button class="btn btn-warning"
                                                                    onclick="lihatLaporan(<?php echo $l->id_laporan;?>)">
                                                                    <i class="fas fa-eye"></i>
                                                                </button>
                                                                <?php if (($l->status == "Revisi" || $l->status == "Diajukan") && ($hakAkses == "Sekretaris" && $this->session->userdata('id_user') == $kegiatan->id_user) || ($hakAkses == "Ketua Komisi 1" && $this->session->userdata('id_user') == $kegiatan->id_user) || ($hakAkses == "Ketua Komisi 2" && $this->session->userdata('id_user') == $kegiatan->id_user) || ($hakAkses == "Ketua Komisi 3" && $this->session->userdata('id_user') == $kegiatan->id_user) || ($hakAkses == "Ketua Komisi 4" && $this->session->userdata('id_user') == $kegiatan->id_user)){ ?>
                                                                <button class="btn btn-primary"
                                                                    onclick="revisi(<?php echo $l->id_laporan;?>)">
                                                                    <i class="fas fa-pen-square"></i>
                                                                </button>
                                                                <?php } ?>
                                                                <?php if (($hakAkses == "Sekretaris" && $this->session->userdata('id_user') == $kegiatan->id_user) || ($hakAkses == "Ketua Komisi 1" && $this->session->userdata('id_user') == $kegiatan->id_user) || ($hakAkses == "Ketua Komisi 2" && $this->session->userdata('id_user') == $kegiatan->id_user) || ($hakAkses == "Ketua Komisi 3" && $this->session->userdata('id_user') == $kegiatan->id_user) || ($hakAkses == "Ketua Komisi 4" && $this->session->userdata('id_user') == $kegiatan->id_user)){ ?>
                                                                <button class="btn btn-danger"
                                                                    onclick="hapus(<?php echo $l->id_laporan;?>)">
                                                                    <i class="fas fa-times"></i>
                                                                </button>
                                                                <?php } ?>
                                                            </td>
                                                        </tr>
                                                        <?php } } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="dokumentasi" role="tabpanel"
                                    aria-labelledby="contact-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>Dokumentasi Rapat/Sidang</h4>
                                            <?php if ($hakAkses == "Admin" || $hakAkses == "Sekretaris" || $hakAkses == "Ketua Komisi 1" || $hakAkses == "Ketua Komisi 2"|| $hakAkses == "Ketua Komisi 3" || $hakAkses == "Ketua Komisi 4"){ ?>
                                            <div class="card-header-action">
                                                <button class="btn btn-success"
                                                    onclick="tambahGambar(<?php echo $kegiatan->id_kegiatan;?>)"><i
                                                        class="fas fa-plus-circle"></i>
                                                    Tambah</button>
                                            </div>
                                            <?php } ?>
                                        </div>
                                        <div class="card-body">
                                            <div class="gallery">
                                                <?php if (($hakAkses == "Sekretaris" && $this->session->userdata('id_user') == $kegiatan->id_user) || ($hakAkses == "Ketua Komisi 1" && $this->session->userdata('id_user') == $kegiatan->id_user) || ($hakAkses == "Ketua Komisi 2" && $this->session->userdata('id_user') == $kegiatan->id_user) || ($hakAkses == "Ketua Komisi 3" && $this->session->userdata('id_user') == $kegiatan->id_user) || ($hakAkses == "Ketua Komisi 4" && $this->session->userdata('id_user') == $kegiatan->id_user)){ ?>
                                                <div class="row">
                                                    <?php foreach ($dokumentasi as $d) { ?>
                                                    <?php if($d->id_kegiatan == $kegiatan->id_kegiatan){ ?>
                                                    <div class="col-3">
                                                        <div class="card card-secondary">
                                                            <div class="card-header">
                                                                <h4></h4>
                                                                <div class="card-header-action">
                                                                    <button class="btn btn-danger"
                                                                        onclick="hapusDok(<?php echo $d->id_dokumentasi;?>)">
                                                                        <i class="fas fa-times"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <div class="card-body gallery-item"
                                                                data-image="<?php echo base_url('assets/dokumentasiKegiatan/'.$d->nama_dokumentasi); ?>"
                                                                data-title="Image 1">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php } } ?>
                                                </div>
                                                <?php } else { ?>
                                                <div class="row">
                                                    <?php foreach ($dokumentasi as $d) { ?>
                                                    <?php if($d->id_kegiatan == $kegiatan->id_kegiatan){ ?>
                                                    <div class="col-3">
                                                        <div class="card-body gallery-item"
                                                            data-image="<?php echo base_url('assets/dokumentasiKegiatan/'.$d->nama_dokumentasi); ?>"
                                                            data-title="Image 1">
                                                        </div>
                                                    </div>
                                                    <?php } } ?>
                                                </div>
                                                <?php } ?>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                                <div class="tab-pane fade" id="voting" role="tabpanel" aria-labelledby="contact-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>Voting Rapat/Sidang</h4>
                                            <div class="card-header-action">
                                                <?php if (($hakAkses == "Sekretaris" && $this->session->userdata('id_user') == $kegiatan->id_user) || ($hakAkses == "Ketua Komisi 1" && $this->session->userdata('id_user') == $kegiatan->id_user) || ($hakAkses == "Ketua Komisi 2" && $this->session->userdata('id_user') == $kegiatan->id_user) || ($hakAkses == "Ketua Komisi 3" && $this->session->userdata('id_user') == $kegiatan->id_user) || ($hakAkses == "Ketua Komisi 4" && $this->session->userdata('id_user') == $kegiatan->id_user)){ ?>
                                                <?php if($kegiatan->vote_status == "Nonaktif"){ ?>
                                                <button class="btn btn-primary"
                                                    onclick="enableVote(<?php echo $kegiatan->id_kegiatan;?>)">
                                                    <i class="fas fa-poll"></i>
                                                    Aktifkan Fitur Voting</button>
                                                <?php }else if($kegiatan->vote_status == "Aktif"){ ?>
                                                <button class="btn btn-warning"
                                                    onclick="enableVote(<?php echo $kegiatan->id_kegiatan;?>)">
                                                    <i class="fas fa-poll"></i>
                                                    Nonaktifkan Fitur Voting</button>
                                                <?php } ?>
                                                <?php } ?>
                                            </div>
                                        </div>

                                        <div class="card-body">

                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Nama</th>
                                                            <th>Keterangan</th>
                                                            <th>Voting</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach($peserta AS $p ): ?>
                                                        <?php if($p->id_user == $this->session->userdata('id_user') && $p->id_penjadwalan == $kegiatan->id_penjadwalan ){ ?>
                                                        <tr>
                                                            <td><?php echo $p->nama ?></td>
                                                            <td><?php echo $p->jabatan ?></td>
                                                            <td>
                                                                <?php if($p->voting == NULL){ ?>
                                                                <?php if($kegiatan->vote_status == "Aktif"){ ?>
                                                                <button class="btn btn-success btn-sm"
                                                                    onclick="setVoting(<?php echo $p->id_peserta;?>)">
                                                                    <i class="fas fa-vote-yea"></i>
                                                                    Lakukan Voting</button>
                                                                <?php }else{ ?>
                                                                <p>Saat ini Anda Belum dapat melakukan voting</p>
                                                                <?php }}else{ ?>
                                                                <?php echo $p->voting ?>
                                                                <?php } ?>
                                                            </td>
                                                        </tr>
                                                        <?php ?>
                                                        <?php } endforeach ?>
                                                    </tbody>
                                                </table>
                                            </div>

                                            <?php if(($hakAkses == "Sekretaris" && $this->session->userdata('id_user') == $kegiatan->id_user) || ($hakAkses == "Ketua Komisi 1" && $this->session->userdata('id_user') == $kegiatan->id_user) || ($hakAkses == "Ketua Komisi 2" && $this->session->userdata('id_user') == $kegiatan->id_user) || ($hakAkses == "Ketua Komisi 3" && $this->session->userdata('id_user') == $kegiatan->id_user) || ($hakAkses == "Ketua Komisi 4" && $this->session->userdata('id_user') == $kegiatan->id_user)){ ?>
                                            <h6>Daftar Peserta Rapat</h6>
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Nama</th>
                                                            <th>Keterangan</th>
                                                            <th>Voting</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach($peserta AS $p ): ?>
                                                        <?php if($p->id_penjadwalan == $kegiatan->id_penjadwalan){ ?>
                                                        <tr>
                                                            <td><?php echo $p->nama ?></td>
                                                            <td><?php echo $p->jabatan ?></td>
                                                            <td>
                                                                <?php if($p->voting != NULL){
                                                                    echo '<center><i class="fas fa-check-circle text-success" style="font-size:18px;"></i></center>';
                                                                } ?>
                                                            </td>
                                                        </tr>
                                                        <?php ?>
                                                        <?php } endforeach ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <?php } ?>
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Setuju</th>
                                                            <th>Tidak Setuju</th>
                                                            <th>Absent</th>
                                                            <th class="text-success">Jumlah Peserta <br> Voting</th>
                                                            <!-- <th class="text-danger">Jumlah Peserta<br>Tidak Voting</th> -->
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>

                                                            <td><?php echo $setuju->setuju ?> Orang</td>
                                                            <td><?php echo $tidak_setuju->tidak_setuju ?> Orang</td>
                                                            <td><?php echo $absent->absent ?> Orang</td>
                                                            <td class="text-success">
                                                                <?php echo $setuju->setuju + $tidak_setuju->tidak_setuju + $absent->absent ?>
                                                                Orang</td>
                                                            <!-- <td class="text-danger"><?php echo $golput->golput ?> Orang</td> -->
                                                        </tr>
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
                <div class="col-12">
                </div>
            </div>
        </div>
</div>
<?php $this->load->view('homepage/_partials/scrolltop'); ?>
<?php $this->load->view('_partials/loader'); ?>
</section>
</div>
<?php $this->load->view('_partials/footer'); ?>
<script>
$(document).ready(function() {

});
</script>
<script>
var table;
var simpan;
$(document).ready(function() {
    setTimeout(function() {
        $(".xform").on("submit", (function(b) {
            b.preventDefault();
            var a;
            if (simpan == "tambah") {
                a = "<?php echo base_url();?>Kegiatan/add"
            } else if (simpan == "revisi") {
                a = "<?php echo base_url();?>Laporan/update_data"
            } else if (simpan == "tambahGambar") {
                a = "<?php echo base_url();?>Dokumentasi/add"
            } else if (simpan == "tambahLaporan") {
                a = "<?php echo base_url();?>Laporan/add"
            } else if (simpan == "setStatusKegiatan") {
                a = "<?php echo base_url();?>Kegiatan/setStatusKegiatan"
            } else if (simpan == "setAbsen") {
                a = "<?php echo base_url();?>Kegiatan/updateAbsen"
            } else if (simpan == "setVoting") {
                a = "<?php echo base_url();?>Kegiatan/updateVoting"
            } else if (simpan == "enableVote") {
                a = "<?php echo base_url();?>Kegiatan/update_enable_vote"
            } else {
                a = "<?php echo base_url();?>Kegiatan/update"
            }
            $.ajax({
                url: a,
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(c) {
                    $("#myModal").modal("hide");
                    // swal("Sukses!", "", "success");
                    location.reload();
                },
                error: function(c, e, d) {
                    // swal("Error", "", "error")
                    location.reload();
                }
            });
            return false
        }));

    }, 1500)
});

function tambah() {
    simpan = "tambah";
    $(".form")[0].reset();
    $("#myModal").modal("show");
    $("#modalbody").load("<?php echo base_url();?>Kegiatan/modal/", function(a) {
        $("#modalbody").html(a)
        $('#datetimepicker').datetimepicker();
        $("#summernote-simple").summernote({
            dialogsInBody: true,
            minHeight: 150,
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough']],
                ['para', ['paragraph']]
            ]
        });
    })
}

function revisi(a) {
    simpan = "revisi";
    $(".form")[0].reset();
    $("#myModal").modal("show");
    $("#modalbody").load("<?php echo base_url();?>Laporan/edit/" + a, function(b) {
        $("#modalbody").html(b)
    })
}

function tambahGambar(a) {
    simpan = "tambahGambar";
    $(".form")[0].reset();
    $("#myModal").modal("show");
    $("#modalbody").load("<?php echo base_url();?>Dokumentasi/modalDokumentasi/" + a, function(b) {
        $("#modalbody").html(b)
    })
}

function tambahLaporan(a) {
    simpan = "tambahLaporan";
    $(".form")[0].reset();
    $("#myModal").modal("show");
    $("#modalbody").load("<?php echo base_url();?>Laporan/modalLaporan/" + a, function(b) {
        $("#modalbody").html(b)
    })
}

function lihatLaporan(a) {
    $(".form")[0].reset();
    $("#myModalView").modal("show");
    $("#modalbodyView-lg").load("<?php echo base_url();?>Laporan/viewLaporan/" + a, function(b) {
        $("#modalbodyView-lg").html(b)
    })
}

function setStatusKegiatan(a) {
    simpan = "setStatusKegiatan";
    $(".form")[0].reset();
    $("#myModal").modal("show");
    $("#modalbody").load("<?php echo base_url();?>Kegiatan/modalStatusKegiatan/" + a, function(b) {
        $("#modalbody").html(b)
    })
}

function setAbsen(a) {
    simpan = "setAbsen";
    $(".form")[0].reset();
    $("#myModalModal").modal("show");
    $("#modalbodybody").load("<?php echo base_url();?>Kegiatan/modalAbsen/" + a, function(b) {
        $("#modalbodybody").html(b)
    })
}

function enableVote(a) {
    simpan = "enableVote";
    $(".form")[0].reset();
    $("#myModal").modal("show");
    $("#modalbody").load("<?php echo base_url();?>Kegiatan/enable_vote/" + a, function(b) {
        $("#modalbody").html(b)
    })
}

function downloadNotula(a) {
    simpan = "downloadNotula";
    $(".form")[0].reset();
    $("#myModalnot").modal("show");
    $("#modalbodynot").load("<?php echo base_url();?>Kegiatan/modalUnduhNotula/" + a, function(b) {
        $("#modalbodynot").html(b)
    })
}

function downloadAbsen(a) {
    simpan = "downloadAbsen";
    $(".form")[0].reset();
    $("#myModalabsen").modal("show");
    $("#modalbodyabsen").load("<?php echo base_url();?>Kegiatan/modalUnduhAbsen/" + a, function(b) {
        $("#modalbodyabsen").html(b)
    })
}

function setVoting(a) {
    simpan = "setVoting";
    $(".form")[0].reset();
    $("#myModal").modal("show");
    $("#modalbody").load("<?php echo base_url();?>Kegiatan/modalVoting/" + a, function(b) {
        $("#modalbody").html(b)
    })
}

function ganti(a) {
    simpan = "update";
    $(".form")[0].reset();
    $("#myModal").modal("show");
    $("#modalbody").load("<?php echo base_url();?>Kegiatan/edit/" + a, function(b) {
        $("#modalbody").html(b)
        $('#datetimepicker').datetimepicker();
        $("#summernote-simple").summernote({
            dialogsInBody: true,
            minHeight: 50,
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough']],
                ['para', ['paragraph']]
            ]
        });
        $("#summernote-tujuan").summernote({
            dialogsInBody: true,
            minHeight: 50,
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough']],
                ['para', ['paragraph']]
            ]
        });
        $("#summernote-notula").summernote({
            dialogsInBody: true,
            minHeight: 50,
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough']],
                ['para', ['paragraph']]
            ]
        });
    })
}


function hapus(a) {
    swal({
            title: "Apa Anda yakin?",
            text: "Setelah dihapus, Anda tidak akan dapat memulihkan data ini!",
            icon: "warning",
            buttons: {
                cancel: "Batal",
                Hapus: true,
            },
        })
        .then((value) => {
            switch (value) {

                case "Hapus":
                    $.get("<?php echo base_url()?>Laporan/delete/" + a, function(b) {
                        location.reload();
                    })
                    break;
                default:
                    swal("Data Anda aman!");
            }
        });

};

function hapusDok(a) {
    swal({
            title: "Apa Anda yakin?",
            text: "Setelah dihapus, Anda tidak akan dapat memulihkan data ini!",
            icon: "warning",
            buttons: {
                cancel: "Batal",
                Hapus: true,
            },
        })
        .then((value) => {
            switch (value) {

                case "Hapus":
                    $.get("<?php echo base_url()?>Dokumentasi/delete/" + a, function(b) {
                        location.reload();
                    })
                    break;
                default:
                    swal("Data Anda aman!");
            }
        });

};
</script>
<script>
var wrapper = document.getElementById("signature-pad"),
    clearButton = wrapper.querySelector("[data-action=clear]"),
    saveButton = wrapper.querySelector("[data-action=save]"),
    canvas = wrapper.querySelector("canvas"),
    signaturePad;


function resizeCanvas() {

    var ratio = window.devicePixelRatio || 1;
    canvas.width = canvas.offsetWidth * ratio;
    canvas.height = canvas.offsetHeight * ratio;
    canvas.getContext("2d").scale(ratio, ratio);
}
signaturePad = new SignaturePad(canvas);

clearButton.addEventListener("click", function(event) {
    signaturePad.clear();
});
saveButton.addEventListener("click", function(event) {

    if (signaturePad.isEmpty()) {
        $('#myModal').modal('show');
    } else {

        $.ajax({
            type: "POST",
            url: "<?php echo base_url();?>welcome/insert_single_signature",
            data: {
                'image': signaturePad.toDataURL(),
                'rowno': $('#rowno').val()
            },
            success: function(datas1) {
                signaturePad.clear();
                $('.previewsign').html(datas1);
            }
        });
    }
});
</script>
<style type="text/css">
.m-signature-pad-body {
    border: 1px dashed #ccc;
    border-radius: 5px;
    color: #bbbabb;
    height: 253px;
    width: 46%;
    text-align: center;
    vertical-align: middle;

}

.m-signature-pad-footer {
    bottom: 250px;
    left: 218px;
    position: fixed;
}

.img {
    right: 0;
    position: absolute;
}
</style>
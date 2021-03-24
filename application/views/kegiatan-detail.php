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
            <h4>Agenda Kegiatan Detail</h4>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Notula Rapat/Sidang</h4>
                            <div class="card-header-action">
                                <button class="btn btn-primary" onclick="ganti(<?php echo $kegiatan->id_kegiatan;?>)"><i
                                        class="fas fa-pen-square"></i>
                                    Update</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <center>
                                <h5><?php echo $kegiatan->agenda ?></h5>
                                <hr>
                            </center>
                            <br><br>

                            <table class="table table-borderless text-dark">
                                <tbody>
                                    <tr class="table-active">
                                        <td style="width: 200px;">Tanggal</td>
                                        <td style="width: 30px;">:</td>
                                        <td><?php echo date('d-m-Y', strtotime($kegiatan->waktu_mulai)); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Waktu</td>
                                        <td>:</td>
                                        <td><?php echo date('H:i', strtotime($kegiatan->waktu_mulai)); ?> -
                                            <?php echo date('H:i', strtotime($kegiatan->waktu_selesai)); ?> WIB</td>

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
                                        <td class="p-2"><?php echo $kegiatan->pembahasan ?></td>
                                    </tr>
                                    <tr>
                                        <td>Hasil Keputusan</td>
                                        <td>:</td>
                                        <td class="p-2"><?php echo $kegiatan->notula ?></td>
                                    </tr>
                                    <tr class="table-active">
                                        <td>Notulis</td>
                                        <td>:</td>
                                        <td><?php echo $kegiatan->nama ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4>Laporan Hasil Rapat/Sidang</h4>
                            <div class="card-header-action">
                                <button class="btn btn-success"
                                    onclick="tambahLaporan(<?php echo $kegiatan->id_kegiatan;?>)"><i
                                        class="fas fa-plus-circle"></i>
                                    Tambah</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th style="width: 50px;">No.</th>
                                        <th>Nama File</th>
                                        <th style="width: 200px;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1;
                                        foreach ($laporan as $l) { ?>
                                    <?php if($l->id_kegiatan == $kegiatan->id_kegiatan){ ?>
                                    <tr>
                                        <td><?php echo $no;?></td>
                                        <td><?php echo $l->nama_laporan ?></td>
                                        <td class="text-center">
                                            <?php echo "<a class='btn btn-icon btn-success' target='_blank' href='".base_url()."Laporan/download_file/$l->file_laporan'><i class='fas fa-download'></i></a>";?>
                                            <button class="btn btn-warning"
                                                onclick="lihatLaporan(<?php echo $l->id_laporan;?>)">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-danger"
                                                onclick="hapus(<?php echo $l->id_laporan;?>)">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <?php } $no++; } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4>Dokumetasi Rapat/Sidang</h4>
                            <div class="card-header-action">
                                <button class="btn btn-success"
                                    onclick="tambahGambar(<?php echo $kegiatan->id_kegiatan;?>)"><i
                                        class="fas fa-plus-circle"></i>
                                    Tambah</button>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="gallery">
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
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
</div>
<?php $this->load->view('_partials/scrolltop'); ?>
<!-- <?php $this->load->view('_partials/loader'); ?> -->
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

            } else if (simpan == "tambahGambar") {
                a = "<?php echo base_url();?>Dokumentasi/add"
            } else if (simpan == "tambahLaporan") {
                a = "<?php echo base_url();?>Laporan/add"
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
                    swal("Sukses!", "", "success");
                    location.reload();
                },
                error: function(c, e, d) {
                    swal("Error", "", "error")
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
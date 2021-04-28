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
            <h4>Birokrasi - Ketua Umum Senat</h4>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4></h4>
                            <!--                             <div class="card-header-action">
                                <button class="btn btn-success" onclick="tambah()"><i class="fas fa-plus-circle"></i>
                                    Tambah</button>
                            </div> -->
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" style="width: 100%;" id="dataTables-custom">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Kegiatan</th>
                                            <th>Laporan</th>
                                            <th>File</th>
                                            <th>Status</th>
                                            <th class="disabled-sorting text-right">Actions</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Kegiatan</th>
                                            <th>Laporan</th>
                                            <th>File</th>
                                            <th>Status</th>
                                            <th class="disabled-sorting text-right">Actions</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $no=1;
                                 foreach ($laporan as $k) { ?>
                                        <tr>
                                            <td><?php echo $no;?></td>
                                            <td><?php echo $k->agenda;?></td>
                                            <td><?php echo $k->nama_laporan;?></td>
                                            <td><?php echo "<a target='_blank' href='".base_url()."BirokrasiKetuaUmum/download_file/$k->file_laporan'>$k->file_laporan</a>";?>
                                            </td>
                                            <td>
                                                <div class="badge badge-warning"><?php echo $k->status;?></div>
                                            </td>
                                            <td class="td-actions text-right">
                                                <button type="button" onclick="setuju(<?php echo $k->id_laporan;?>)"
                                                    rel="tooltip" class="btn btn-primary" data-original-title=""
                                                    title="">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                                &nbsp;
                                                <button type="button" rel="tooltip" class="btn btn-danger"
                                                    data-original-title="" title=""
                                                    onclick="revisi(<?php echo $k->id_laporan;?>)">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <?php $no++; } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
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
var table;
var simpan;
$(document).ready(function() {
    setTimeout(function() {
        $(".xform").on("submit", (function(b) {
            b.preventDefault();
            var a;
            if (simpan == "tambah") {
                a = "<?php echo base_url();?>usulan/add"
            } else {
                a = "<?php echo base_url();?>usulan/update"
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
    $("#modalbody").load("<?php echo base_url();?>usulan/modal/", function(a) {
        $("#modalbody").html(a)
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

function ganti(a) {
    simpan = "update";
    $(".form")[0].reset();
    $("#myModal").modal("show");
    $("#modalbody").load("<?php echo base_url();?>usulan/edit/" + a, function(b) {
        $("#modalbody").html(b)
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
                    $.get("<?php echo base_url()?>usulan/delete/" + a, function(b) {
                        location.reload();
                    })
                    break;
                default:
                    swal("Data Anda aman!");
            }
        });

};

function setuju(a) {
    swal({
            title: "Apakah Anda Yakin?",
            text: "",
            icon: "success",
            buttons: {
                cancel: "Batal",
                setuju: true,
            },
        })
        .then((value) => {
            switch (value) {

                case "setuju":
                    $.get("<?php echo base_url()?>BirokrasiKetuaUmum/updateStatusSetuju/" + a, function(b) {
                        location.reload();
                    })
                    break;
                default:
                    swal("Actions Dibatalkan");
            }
        });

};

function revisi(a) {
    swal({
            title: "Apakah Perlu Direvisi?",
            text: "",
            icon: "warning",
            buttons: {
                cancel: "Batal",
                revisi: true,
            },
        })
        .then((value) => {
            switch (value) {

                case "revisi":
                    $.get("<?php echo base_url()?>BirokrasiKetuaUmum/updateStatusRevisi/" + a, function(b) {
                        location.reload();
                    })
                    break;
                default:
                    swal("Actions Dibatalkan");
            }
        });

};
</script>
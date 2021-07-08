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
            <h4>Konfirmasi Kehadiran Anda</h4>
        </div>
        <div class="section-body">
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
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4></h4>
                            <div class="card-header-action">
                         
                            </div>
                        </div> 
                        <form action="<?php echo base_url('Penjadwalan/update_kehadiran') ?>" method="POST"
                        enctype="multipart/form-data">

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pilih Konfirmasi Kehadiran</label>
                            <div class="col-sm-12 col-md-7">
                                <select name="konfirmasi_kehadiran" class="form-control selectric">
                                    <option selected value="<?php echo $data_konfirmasi->konfirmasi_kehadiran ?>" selected>
                                    <?php echo $data_konfirmasi->konfirmasi_kehadiran ?></option>
                                    <option  disabled>---- Pilih Konfirmasi Kehadiran ----</option>
                                    <option value="Hadir">Hadir</option>
                                    <option value="Tidak Hadir">Tidak Hadir</option>
                                </select>
                            </div>
                        </div>
                       
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Keterangan</label>
                            <div class="col-sm-12 col-md-7"> 
                                <textarea name="keterangan_kehadiran"  class="form-control"><?php echo $data_konfirmasi->keterangan_kehadiran ?></textarea>
                            </div>
                        </div>
                      <input type="hidden" name="id_peserta" value="<?php echo $data_konfirmasi->id_peserta ?>">
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                            <div class="col-sm-12 col-md-7">
                                <button class="btn btn-primary"><i class="fas fa-paper-plane"></i> Konfirmasi</button>
                            </div>
                        </div>
                    </form>
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
                a = "<?php echo base_url();?>Penjadwalan/add"
            } else if (simpan == "status") {
                a = "<?php echo base_url();?>Penjadwalan/update_status"
            } else {
                a = "<?php echo base_url();?>Penjadwalan/update"
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
    $("#modalbody").load("<?php echo base_url();?>Penjadwalan/modal/", function(a) {
        $("#modalbody").html(a)
        $('#datetimepicker').datetimepicker();
        $('#selectric').selectric();
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
    $("#modalbody").load("<?php echo base_url();?>Penjadwalan/edit/" + a, function(b) {
        $("#modalbody").html(b)
        $('#datetimepicker').datetimepicker();
        $('#selectric').selectric();
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

function status(a) {
    simpan = "status";
    $(".form")[0].reset();
    $("#myModal").modal("show");
    $("#modalbody").load("<?php echo base_url();?>Penjadwalan/edit_status/" + a, function(b) {
        $("#modalbody").html(b)
    })
}

function peserta(a) {
    simpan = "peserta";
    $(".form")[0].reset();
    $("#myModal").modal("show");
    $("#modalbody").load("<?php echo base_url();?>Penjadwalan/detail_peserta/" + a, function(b) {
        $("#modalbody").html(b)
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
                    $.get("<?php echo base_url()?>penjadwalan/delete/" + a, function(b) {
                        location.reload();
                    })
                    break;
                default:
                    swal("Data Anda aman!");
            }
        });

};
</script>
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
            <h4>Penjadwalan</h4>
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
                    <?php if($this->session->flashdata('successemail') == TRUE){?>
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <?php echo $this->session->flashdata('successemail') ?>
                    </div>
                    <?php }else if($this->session->flashdata('failedemail') == TRUE){ ?>
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <?php echo $this->session->flashdata('failedemail') ?>
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
                                <?php if($this->session->userdata('level') == "Ketua Komisi 1" || $this->session->userdata('level') == "Ketua Komisi 2" || $this->session->userdata('level') == "Ketua Komisi 3" || $this->session->userdata('level') == "Ketua Komisi 4" || $this->session->userdata('level') == "Sekretaris"){ ?>
                                <button class="btn btn-success" onclick="tambah()"><i class="fas fa-plus-circle"></i>
                                    Tambah</button>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" style="width: 100%;" id="dataTables-custom">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Agenda</th>
                                            <th>Pembahasan</th>
                                            <th>Waktu</th>
                                            <th>Jenis Rapat</th>
                                            <th>Tempat</th>
                                            <th>Link</th>
                                            <th>Password</th>
                                            <th>Peserta</th>
                                            <th>Status</th>
                                            <th class="disabled-sorting text-right">Actions</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Agenda</th>
                                            <th>Pembahasan</th>
                                            <th>Waktu</th>
                                            <th>Jenis Rapat</th>
                                            <th>Tempat</th>
                                            <th>Link</th>
                                            <th>Password</th>
                                            <th>Peserta</th>
                                            <th>Status</th>
                                            <th class="text-right" style="width: 150px;">Actions</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $no=1;
                                        foreach ($penjadwalan as $k) { ?>
                                        <tr>
                                            <td><?php echo $no;?></td>
                                            <td><?php echo $k->agenda;?></td>
                                            <td><?php echo $k->pembahasan;?></td>
                                            <td><?php echo date('d-m-Y H:i', strtotime($k->waktu_mulai)); ?> -
                                                <?php echo date('H:i', strtotime($k->waktu_selesai)); ?> WIB</td>
                                            <td><?php echo $k->jenis_rapat;?></td>
                                            <td><?php echo $k->tempat;?></td>
                                            <td><?php echo $k->link;?></td>
                                            <td><?php echo $k->password;?></td>
                                            <td><?php echo $k->item_user;?>
                                            </td>
                                            <td><?php echo $k->status;?></td>
                                            <td class="td-actions text-right">
                                                <button type="button"
                                                    onclick="peserta(<?php echo $k->id_penjadwalan;?>)" rel="tooltip"
                                                    class="btn btn-info" data-original-title="" title="">
                                                    <i class="fas fa-users"></i>
                                                </button>

                                                <?php if(($this->session->userdata('level') == "Sekretaris" && $this->session->userdata('id_user') == $k->id_user) || ($this->session->userdata('level') == "Ketua Komisi 1" && $this->session->userdata('id_user') == $k->id_user) || ($this->session->userdata('level') == "Ketua Komisi 2" && $this->session->userdata('id_user') == $k->id_user) || ($this->session->userdata('level') == "Ketua Komisi 3" && $this->session->userdata('id_user') == $k->id_user) || ($this->session->userdata('level') == "Ketua Komisi 4" && $this->session->userdata('id_user') == $k->id_user)){ ?>
                                                <button type="button" onclick="ganti(<?php echo $k->id_penjadwalan;?>)"
                                                    rel="tooltip" class="btn btn-primary" data-original-title=""
                                                    title="">
                                                    <i class="fas fa-pen-square"></i>
                                                </button>

                                                <button type="button" rel="tooltip" class="btn btn-danger"
                                                    data-original-title="" title=""
                                                    onclick="hapus(<?php echo $k->id_penjadwalan;?>)">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                                <?php } ?>
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
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
            <h4>Agenda Kegiatan</h4>
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
                                <?php if($this->session->userdata('level') == "Sekretaris" || $this->session->userdata('level') == "Ketua Komisi 1" || $this->session->userdata('level') == "Ketua Komisi 2" || $this->session->userdata('level') == "Ketua Komisi 3" || $this->session->userdata('level') == "Ketua Komisi 4"){ ?>
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
                                            <th>Waktu</th>
                                            <th>Jenis Rapat</th>
                                            <th>Tempat</th>
                                            <th>Status Kegiatan</th>
                                            <th class="disabled-sorting text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Agenda</th>
                                            <th>Waktu</th>
                                            <th>Jenis Rapat</th>
                                            <th>Tempat</th>
                                            <th>Status Kegiatan</th>
                                            <th class="text-center" style="width: 150px;">Actions</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $no=1;
                                        foreach ($kegiatan as $k) { ?>
                                        <tr>
                                            <td><?php echo $no;?></td>
                                            <td><?php echo $k->agenda;?></td>
                                            <td><?php echo date('d-m-Y H:i', strtotime($k->waktu_mulai)); ?> -
                                                <?php echo date('H:i', strtotime($k->waktu_selesai)); ?> WIB</td>
                                            <td><?php echo $k->jenis_rapat;?></td>
                                            <td><?php echo $k->tempat;?></td>
                                            <td>
                                                <div class="badge badge-success"><?php echo $k->status;?></div>
                                            </td>
                                            <td class="td-actions text-center">
                                                <a class="btn btn-primary"
                                                    href="<?php echo base_url('Kegiatan/kegiatan_detail/').$k->id_kegiatan;?>"><i
                                                        class="fas fa-info-circle"></i></a>
                                                &nbsp;
                                                <!-- <br> -->
                                                <?php if(($this->session->userdata('level') == "Sekretaris" && $this->session->userdata('id_user') == $k->id_user) || ($this->session->userdata('level') == "Ketua Komisi 1" && $this->session->userdata('id_user') == $k->id_user) || ($this->session->userdata('level') == "Ketua Komisi 2" && $this->session->userdata('id_user') == $k->id_user) || ($this->session->userdata('level') == "Ketua Komisi 3" && $this->session->userdata('id_user') == $k->id_user) || ($this->session->userdata('level') == "Ketua Komisi 4" && $this->session->userdata('id_user') == $k->id_user)){ ?>
                                                <button type="button" rel="tooltip" class="btn btn-danger"
                                                    data-original-title="" title=""
                                                    onclick="hapus(<?php echo $k->id_kegiatan;?>)">
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
        <?php $this->load->view('_partials/scrolltop'); ?>
        <!-- <?php $this->load->view('_partials/loader'); ?> -->
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
                a = "<?php echo base_url();?>Kegiatan/add"
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
        $("#summernote-tujuan").summernote({
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

function ganti(a) {
    simpan = "update";
    $(".form")[0].reset();
    $("#myModal").modal("show");
    $("#modalbody").load("<?php echo base_url();?>Kegiatan/edit/" + a, function(b) {
        $("#modalbody").html(b)
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
        $("#summernote-tujuan").summernote({
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
                    $.get("<?php echo base_url()?>Kegiatan/delete/" + a, function(b) {
                        location.reload();
                    })
                    break;
                default:
                    swal("Data Anda aman!");
            }
        });

};
</script>
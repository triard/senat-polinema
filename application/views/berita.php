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
            <h4>Berita</h4>
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
                                <button class="btn btn-success" onclick="tambah()"><i class="fas fa-plus-circle"></i>
                                    Tambah</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" style="width: 100%;" id="dataTables-custom">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Judul</th>
                                            <th style="width: 500px;">Keterangan</th>
                                            <th style="width: 200px;">image</th>
                                            <th>Tanggal</th>
                                            <th>Jumlah View</th>
                                            <th>Nama Editor</th>
                                            <th class="disabled-sorting text-right">Actions</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Judul</th>
                                            <th>Keterangan</th>
                                            <th>image</th>
                                            <th>Tanggal</th>
                                            <th>Jumlah View</th>
                                            <th>Nama Editor</th>
                                            <th class="text-right">Actions</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $no=1;
                                 foreach ($berita as $k) { ?>
                                        <tr>
                                            <td><?php echo $no;?></td>
                                            <td><?php echo $k->judul;?></td>
                                            <td>
                                                <button type="button" class="btn btn-primary btn-sm"
                                                    data-toggle="collapse"
                                                    data-target="#view<?php echo $k->id_berita;?>">Lihat Isi
                                                    Berita</button>
                                                <div id="view<?php echo $k->id_berita;?>" class="collapse">
                                                    <?php echo $k->keterangan;?>
                                                </div>
                                            </td>
                                            <td><img src="<?php echo base_url('assets/berita/').$k->image;?>"
                                                    alt="<?php echo $no;?>" style="width: 100%;" loading="lazy"></td>
                                            <td><?php echo $k->tanggal;?></td>
                                            <td><?php echo $k->jumlah_view;?></td>
                                            <td><?php echo $k->nama;?></td>
                                            <td class="td-actions text-right">
                                                <button type="button" onclick="ganti(<?php echo $k->id_berita;?>)"
                                                    rel="tooltip" class="btn btn-primary m-1" data-original-title=""
                                                    title="">
                                                    <i class="fas fa-pen-square"></i>
                                                </button>
                                                <!-- &nbsp; --><br>
                                                <button type="button" rel="tooltip" class="btn btn-danger m-1"
                                                    data-original-title="" title=""
                                                    onclick="hapus(<?php echo $k->id_berita;?>)">
                                                    <i class="fas fa-trash"></i>
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
                a = "<?php echo base_url();?>berita/add"
            } else {
                a = "<?php echo base_url();?>berita/update"
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
    $("#modalbody").load("<?php echo base_url();?>berita/modal/", function(a) {
        $("#modalbody").html(a)
        $('#content').summernote({
            height: "200px",
            styleWithSpan: false
        });
        $('#datetimepicker').datetimepicker();
    })

}

function ganti(a) {
    simpan = "update";
    $(".form")[0].reset();
    $("#myModal").modal("show");
    $("#modalbody").load("<?php echo base_url();?>berita/edit/" + a, function(b) {
        $("#modalbody").html(b)
        $('#content').summernote({
            height: "200px",
            styleWithSpan: false
        });
        $('#datetimepicker').datetimepicker();
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
                    $.get("<?php echo base_url()?>berita/delete/" + a, function(b) {
                        location.reload();
                    })
                    break;
                default:
                    swal("Data Anda aman!");
            }
        });

};
</script>
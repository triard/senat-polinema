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
            <h4>Usulan</h4>
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
                    <ul class="nav nav-tabs" id="myTab2" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab2" data-toggle="tab" href="#home2" role="tab"
                                aria-controls="home" aria-selected="true">Pengajuan Usulan</a>
                        </li>
                        <?php if($this->session->userdata('level') == "Admin" || $this->session->userdata('level') == "Sekretaris" || $this->session->userdata('level') == "Ketua Komisi 1" || $this->session->userdata('level') == "Ketua Komisi 2" || $this->session->userdata('level') == "Ketua Komisi 3" || $this->session->userdata('level') == "Ketua Komisi 4" || $this->session->userdata('level') == "Ketua Senat"){ ?>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#profile2" role="tab"
                                aria-controls="profile" aria-selected="false">Usulan Masuk</a>
                        </li>
                        <?php } ?>
                    </ul>
                    <div class="tab-content tab-bordered" id="myTab3Content">
                        <div class="tab-pane fade show active" id="home2" role="tabpanel" aria-labelledby="home-tab2">
                            <div class="card">
                                <div class="card-header">
                                    <h4></h4>
                                    <div class="card-header-action">
                                        <button class="btn btn-success" onclick="tambah()"><i
                                                class="fas fa-plus-circle"></i>
                                            Tambah</button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" style="width: 100%;" id="dataTables-custom">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Pengusul</th>
                                                    <th>Email</th>
                                                    <th>Jenis</th>
                                                    <th>Keterangan</th>
                                                    <th>Dokumen Pendukung</th>
                                                    <th>Status</th>
                                                    <th class="disabled-sorting text-right">Actions</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Pengusul</th>
                                                    <th>Email</th>
                                                    <th>Jenis</th>
                                                    <th>Keterangan</th>
                                                    <th>Dokumen Pendukung</th>
                                                    <th>Status</th>
                                                    <th class="text-right" style="width: 150px;">Actions</th>
                                                </tr>
                                            </tfoot>

                                            <tbody>
                                                <?php $no=1;
                                                foreach ($usulan as $k) { ?>
                                                <?php if($this->session->userdata('id_user') == $k->id_user || $this->session->userdata('level') == 'Ketua Senat' || $this->session->userdata('level') == 'Admin'){ ?>
                                                <tr>
                                                    <td><?php echo $no;?></td>
                                                    <td><?php echo $k->nama_pengusul;?></td>
                                                    <td><?php echo $k->email;?></td>
                                                    <td><?php echo $k->jenis;?></td>
                                                    <td><?php echo $k->keterangan;?></td>
                                                    <td><?php echo "<a target='_blank' href='".base_url()."Usulan/download_file/$k->dokumen_pendukung'>$k->dokumen_pendukung</a>";?>
                                                    </td>
                                                    <td>
                                                        <div class="badge badge-success"><?php echo $k->status;?></div>
                                                    </td>
                                                    <?php if($k->status == "Diajukan"){ ?>
                                                    <td class="td-actions text-right">
                                                        <button type="button"
                                                            onclick="ganti(<?php echo $k->id_usulan;?>)" rel="tooltip"
                                                            class="btn btn-primary" data-original-title="" title="">
                                                            <i class="fas fa-pen-square"></i>
                                                        </button>
                                                        &nbsp;
                                                        <button type="button" rel="tooltip" class="btn btn-danger"
                                                            data-original-title="" title=""
                                                            onclick="hapus(<?php echo $k->id_usulan;?>)">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </td>
                                                    <?php } ?>
                                                </tr>
                                                <?php } ?>
                                                <?php $no++; } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile2" role="tabpanel" aria-labelledby="profile-tab2">
                            <div class="card">
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" style="width: 100%;" id="dataTables-custom">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Pengusul</th>
                                                <th>Email</th>
                                                <th>Jenis</th>
                                                <th>Keterangan</th>
                                                <th>Dokumen Pendukung</th>
                                                <th>Status</th>
                                                <th class="disabled-sorting text-right">Actions</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Pengusul</th>
                                                <th>Email</th>
                                                <th>Jenis</th>
                                                <th>Keterangan</th>
                                                <th>Dokumen Pendukung</th>
                                                <th>Status</th>
                                                <th class="text-right" style="width: 150px;">Actions</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php $no=1;
                                                 foreach ($usulan as $k) { ?>
                                            <?php if($this->session->userdata('level') == "Admin" && $k->status == "Diajukan"){ ?>
                                            <tr>
                                                <td><?php echo $no;?></td>
                                                <td><?php echo $k->nama_pengusul;?></td>
                                                <td><?php echo $k->email;?></td>
                                                <td><?php echo $k->jenis;?></td>
                                                <td><?php echo $k->keterangan;?></td>
                                                <td><?php echo "<a target='_blank' href='".base_url()."Usulan/download_file/$k->dokumen_pendukung'>$k->dokumen_pendukung</a>";?>
                                                </td>
                                                <td>
                                                    <div class="badge badge-success"><?php echo $k->status;?></div>
                                                </td>
                                                <td class="td-actions text-right">
                                                    <button type="button" onclick="ganti(<?php echo $k->id_usulan;?>)"
                                                        rel="tooltip" class="btn btn-primary" data-original-title=""
                                                        title="">
                                                        <i class="fas fa-pen-square"></i>
                                                    </button>
                                                    &nbsp;
                                                    <button type="button" rel="tooltip" class="btn btn-danger"
                                                        data-original-title="" title=""
                                                        onclick="hapus(<?php echo $k->id_usulan;?>)">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                            <?php $no++; } ?>
                                        </tbody>
                                        <tbody>
                                            <?php $no=1;
                                                 foreach ($usulan as $k) { ?>
                                            <?php if($this->session->userdata('level') == "Sekretaris" && ($k->status == "Diajukan - Sekretaris" || $k->status == "Perlu Tindak Lanjut - Sidang Pleno" || $k->status == "Perlu Tindak Lanjut - Sidang Paripurna")){ ?>
                                            <tr>
                                                <td><?php echo $no;?></td>
                                                <td><?php echo $k->nama_pengusul;?></td>
                                                <td><?php echo $k->email;?></td>
                                                <td><?php echo $k->jenis;?></td>
                                                <td><?php echo $k->keterangan;?></td>
                                                <td><?php echo "<a target='_blank' href='".base_url()."Usulan/download_file/$k->dokumen_pendukung'>$k->dokumen_pendukung</a>";?>
                                                </td>
                                                <td>
                                                    <div class="badge badge-success"><?php echo $k->status;?></div>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                            <?php $no++; } ?>
                                        </tbody>
                                        <tbody>
                                            <?php $no=1;
                                                 foreach ($usulan as $k) { ?>
                                            <?php if($this->session->userdata('level') == "Ketua Komisi 1" && ($k->status == "Diajukan - Komisi 1")){ ?>
                                            <tr>
                                                <td><?php echo $no;?></td>
                                                <td><?php echo $k->nama_pengusul;?></td>
                                                <td><?php echo $k->email;?></td>
                                                <td><?php echo $k->jenis;?></td>
                                                <td><?php echo $k->keterangan;?></td>
                                                <td><?php echo "<a target='_blank' href='".base_url()."Usulan/download_file/$k->dokumen_pendukung'>$k->dokumen_pendukung</a>";?>
                                                </td>
                                                <td>
                                                    <div class="badge badge-success"><?php echo $k->status;?></div>
                                                </td>
                                                <td class="td-actions text-right">
                                                </td>
                                            </tr>
                                            <?php } ?>
                                            <?php $no++; } ?>
                                        </tbody>
                                        <tbody>
                                            <?php $no=1;
                                                 foreach ($usulan as $k) { ?>
                                            <?php if($this->session->userdata('level') == "Ketua Komisi 2" && ($k->status == "Diajukan - Komisi 2")){ ?>
                                            <tr>
                                                <td><?php echo $no;?></td>
                                                <td><?php echo $k->nama_pengusul;?></td>
                                                <td><?php echo $k->email;?></td>
                                                <td><?php echo $k->jenis;?></td>
                                                <td><?php echo $k->keterangan;?></td>
                                                <td><?php echo "<a target='_blank' href='".base_url()."Usulan/download_file/$k->dokumen_pendukung'>$k->dokumen_pendukung</a>";?>
                                                </td>
                                                <td>
                                                    <div class="badge badge-success"><?php echo $k->status;?></div>
                                                </td>
                                                <td class="td-actions text-right">
                                                </td>
                                            </tr>
                                            <?php } ?>
                                            <?php $no++; } ?>
                                        </tbody>
                                        <tbody>
                                            <?php $no=1;
                                                 foreach ($usulan as $k) { ?>
                                            <?php if($this->session->userdata('level') == "Ketua Komisi 3" && ($k->status == "Diajukan - Komisi 3")){ ?>
                                            <tr>
                                                <td><?php echo $no;?></td>
                                                <td><?php echo $k->nama_pengusul;?></td>
                                                <td><?php echo $k->email;?></td>
                                                <td><?php echo $k->jenis;?></td>
                                                <td><?php echo $k->keterangan;?></td>
                                                <td><?php echo "<a target='_blank' href='".base_url()."Usulan/download_file/$k->dokumen_pendukung'>$k->dokumen_pendukung</a>";?>
                                                </td>
                                                <td>
                                                    <div class="badge badge-success"><?php echo $k->status;?></div>
                                                </td>
                                                <td class="td-actions text-right">
                                                </td>
                                            </tr>
                                            <?php } ?>
                                            <?php $no++; } ?>
                                        </tbody>
                                        <tbody>
                                            <?php $no=1;
                                                 foreach ($usulan as $k) { ?>
                                            <?php if($this->session->userdata('level') == "Ketua Komisi 4" && ($k->status == "Diajukan - Komisi 4")){ ?>
                                            <tr>
                                                <td><?php echo $no;?></td>
                                                <td><?php echo $k->nama_pengusul;?></td>
                                                <td><?php echo $k->email;?></td>
                                                <td><?php echo $k->jenis;?></td>
                                                <td><?php echo $k->keterangan;?></td>
                                                <td><?php echo "<a target='_blank' href='".base_url()."Usulan/download_file/$k->dokumen_pendukung'>$k->dokumen_pendukung</a>";?>
                                                </td>
                                                <td>
                                                    <div class="badge badge-success"><?php echo $k->status;?></div>
                                                </td>
                                                <td class="td-actions text-right">
                                                </td>
                                            </tr>
                                            <?php } ?>
                                            <?php $no++; } ?>
                                        </tbody>
                                        <tbody>
                                            <?php $no=1;
                                                 foreach ($usulan as $k) { ?>
                                            <?php if($this->session->userdata('level') == "Ketua Senat"){ ?>
                                            <tr>
                                                <td><?php echo $no;?></td>
                                                <td><?php echo $k->nama_pengusul;?></td>
                                                <td><?php echo $k->email;?></td>
                                                <td><?php echo $k->jenis;?></td>
                                                <td><?php echo $k->keterangan;?></td>
                                                <td><?php echo "<a target='_blank' href='".base_url()."Usulan/download_file/$k->dokumen_pendukung'>$k->dokumen_pendukung</a>";?>
                                                </td>
                                                <td>
                                                    <div class="badge badge-success"><?php echo $k->status;?></div>
                                                </td>
                                                <td class="td-actions text-right">
                                                </td>
                                            </tr>
                                            <?php } ?>
                                            <?php $no++; } ?>
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

function acceptAdmin(a) {
    swal({
            title: "Pengajuan Usulan Disetujui?",
            text: "",
            icon: "warning",
            buttons: {
                cancel: "Batal",
                Setuju: true,
            },
        })
        .then((value) => {
            switch (value) {

                case "Setuju":
                    $.get("<?php echo base_url()?>usulan/acceptAdmin/" + a, function(b) {
                        location.reload();
                    })
                    break;
                default:
                    swal("Konfirmasi dibatalkan.");
            }
        });

};

function refuseAdmin(a) {
    swal({
            title: "Pengajuan Usulan Ditolak?",
            text: "",
            icon: "warning",
            buttons: {
                cancel: "Batal",
                Tolak: true,
            },
        })
        .then((value) => {
            switch (value) {

                case "Tolak":
                    $.get("<?php echo base_url()?>usulan/refuseAdmin/" + a, function(b) {
                        location.reload();
                    })
                    break;
                default:
                    swal("Konfirmasi dibatalkan.");
            }
        });

};
</script>
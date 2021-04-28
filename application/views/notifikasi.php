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
            <h4>Notifikasi</h4>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4></h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" style="width: 100%;" id="dataTables-custom">
                                    <thead>
                                        <tr>
                                            <th>Subjek</th>
                                            <th>Aktivitas</th>
                                            <th>Waktu</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Subjek</th>
                                            <th>Aktivitas</th>
                                            <th>Waktu</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach ($notifikasiAll as $k) { 
                                        if ((($this->session->userdata('level') == "Ketua Komisi 1" || $this->session->userdata('level') == "Anggota Komisi 1") && ($k->user == 'Ketua Komisi 1' || $k->user == 'Admin' || $k->user == 'Sekretaris'))) { ?>
                                        <tr>
                                            <td><?php echo $k->user;?></td>
                                            <td><?php echo $k->text;?></td>
                                            <td><?php echo date('d-m-Y H:i:s', strtotime($k->time)); ?></td>
                                        </tr>
                                        <?php } else if ((($this->session->userdata('level') == "Ketua Komisi 2" || $this->session->userdata('level') == "Anggota Komisi 2") && ($k->user == 'Ketua Komisi 2' || $k->user == 'Admin' || $k->user == 'Sekretaris'))) { ?>
                                        <tr>
                                            <td><?php echo $k->user;?></td>
                                            <td><?php echo $k->text;?></td>
                                            <td><?php echo date('d-m-Y H:i:s', strtotime($k->time)); ?></td>
                                        </tr>
                                        <?php } else if ((($this->session->userdata('level') == "Ketua Komisi 3" || $this->session->userdata('level') == "Anggota Komisi 3") && ($k->user == 'Ketua Komisi 3' || $k->user == 'Admin' || $k->user == 'Sekretaris'))) { ?>
                                        <tr>
                                            <td><?php echo $k->user;?></td>
                                            <td><?php echo $k->text;?></td>
                                            <td><?php echo date('d-m-Y H:i:s', strtotime($k->time)); ?></td>
                                        </tr>
                                        <?php } else if ((($this->session->userdata('level') == "Ketua Komisi 4" || $this->session->userdata('level') == "Anggota Komisi 4") && ($k->user == 'Ketua Komisi 4' || $k->user == 'Admin' || $k->user == 'Sekretaris'))) { ?>
                                        <tr>
                                            <td><?php echo $k->user;?></td>
                                            <td><?php echo $k->text;?></td>
                                            <td><?php echo date('d-m-Y H:i:s', strtotime($k->time)); ?></td>
                                        </tr>
                                        <?php } else if ($this->session->userdata('level') == "Sekretaris" || $this->session->userdata('level') == "Admin" || $this->session->userdata('level') == "Ketua Senat") { ?>
                                        <tr>
                                            <td><?php echo $k->user;?></td>
                                            <td><?php echo $k->text;?></td>
                                            <td><?php echo date('d-m-Y H:i:s', strtotime($k->time)); ?></td>
                                        </tr>
                                        <?php } ?>
                                        <?php } ?>
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
            // if (simpan == "tambah") {
            //     a = "<?php echo base_url();?>Penjadwalan/add"
            // } else if (simpan == "status") {
            //     a = "<?php echo base_url();?>Penjadwalan/update_status"
            // } else {
            //     a = "<?php echo base_url();?>Penjadwalan/update"
            // }
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

// function tambah() {
//     simpan = "tambah";
//     $(".form")[0].reset();
//     $("#myModal").modal("show");
//     $("#modalbody").load("<?php echo base_url();?>Penjadwalan/modal/", function(a) {
//         $("#modalbody").html(a)
//         $('#datetimepicker').datetimepicker();
//         $('#selectric').selectric();
//         $("#summernote-simple").summernote({
//             dialogsInBody: true,
//             minHeight: 150,
//             toolbar: [
//                 ['style', ['bold', 'italic', 'underline', 'clear']],
//                 ['font', ['strikethrough']],
//                 ['para', ['paragraph']]
//             ]
//         });
//     })
// }

// function ganti(a) {
//     simpan = "update";
//     $(".form")[0].reset();
//     $("#myModal").modal("show");
//     $("#modalbody").load("<?php echo base_url();?>Penjadwalan/edit/" + a, function(b) {
//         $("#modalbody").html(b)
//         $('#datetimepicker').datetimepicker();
//         $('#selectric').selectric();
//         $("#summernote-simple").summernote({
//             dialogsInBody: true,
//             minHeight: 150,
//             toolbar: [
//                 ['style', ['bold', 'italic', 'underline', 'clear']],
//                 ['font', ['strikethrough']],
//                 ['para', ['paragraph']]
//             ]
//         });
//     })
// }

// function status(a) {
//     simpan = "status";
//     $(".form")[0].reset();
//     $("#myModal").modal("show");
//     $("#modalbody").load("<?php echo base_url();?>Penjadwalan/edit_status/" + a, function(b) {
//         $("#modalbody").html(b)
//     })
// }

// function peserta(a) {
//     simpan = "peserta";
//     $(".form")[0].reset();
//     $("#myModal").modal("show");
//     $("#modalbody").load("<?php echo base_url();?>Penjadwalan/detail_peserta/" + a, function(b) {
//         $("#modalbody").html(b)
//     })
// }


// function hapus(a) {
//     swal({
//             title: "Apa Anda yakin?",
//             text: "Setelah dihapus, Anda tidak akan dapat memulihkan data ini!",
//             icon: "warning",
//             buttons: {
//                 cancel: "Batal",
//                 Hapus: true,
//             },
//         })
//         .then((value) => {
//             switch (value) {

//                 case "Hapus":
//                     $.get("<?php echo base_url()?>penjadwalan/delete/" + a, function(b) {
//                         location.reload();
//                     })
//                     break;
//                 default:
//                     swal("Data Anda aman!");
//             }
//         });

// };
</script>
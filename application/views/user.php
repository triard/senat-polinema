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
            <h1>User</h1>
            <div class="actions">
                <button class="btn btn-primary font-btn" onclick="tambah()">Tambah</button>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>user</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" style="width: 100%;" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Level</th>
                                            <th class="disabled-sorting text-right">Actions</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Level</th>
                                            <th class="text-right">Actions</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $no=1;
                                 foreach ($user as $k) { ?>
                                        <tr>
                                            <td><?php echo $no;?></td>
                                            <td><?php echo $k->nama;?></td>
                                            <td><?php echo $k->email;?></td>
                                            <td><?php echo $k->level;?></td>
                                            <td class="td-actions text-right">
                                                <button type="button" onclick="ganti(<?php echo $k->id_user;?>)"
                                                    rel="tooltip" class="btn btn-success btn-round"
                                                    data-original-title="" title="">
                                                    <i class="zmdi zmdi-edit zmdi-hc-fw"></i>
                                                </button>
                                                &nbsp;
                                                <button type="button" rel="tooltip" class="btn btn-danger btn-round"
                                                    data-original-title="" title=""
                                                    onclick="hapus(<?php echo $k->id_user;?>)">
                                                    <i class="zmdi zmdi-close zmdi-hc-fw"></i>
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
    </section>
</div>
<?php $this->load->view('_partials/footer'); ?>
<script>
  $(document).ready(function() {
    $('#myTable').DataTable( {
        buttons: [
            'csv', 'excel', 'pdf', 'print'
        ],
        language: {
          searchPlaceholder: "Search for records..."
        },
        sDom: '<"dataTables__top"lfB>rt<"dataTables__bottom"ip><"clear">',
        initComplete: function (a, b) {
				$(this).closest(".dataTables_wrapper").find(".dataTables__top").prepend('<div class="dataTables_buttons hidden-sm-down actions"><div class="dropdown actions__item"><i data-toggle="dropdown" class="zmdi zmdi-download" /><ul class="dropdown-menu dropdown-menu-right"><a href="" class="dropdown-item" data-table-action="excel">Excel (.xlsx)</a></ul></div></div>')
			}
    } );
} );
</script>
<script>
var table;
var simpan;
$(document).ready(function() {
    setTimeout(function() {

    //     $('#myTable').DataTable({
    //       autoWidth: false,
    //       responsive: true,
    //         lengthMenu: [
    //             [15, 30, 45, -1],
    //             ["15 Rows", "30 Rows", "45 Rows", "Everything"]
    //         ],
    //         language: {
    //             searchPlaceholder: "Search for records..."
    //         },
    //         sDom: '<"dataTables__top"lfB>rt<"dataTables__bottom"ip><"clear">',
    //         buttons: [
    //             'print', 'excel', 'pdf', 'csv'
    //         ],
    //     });

    //     table.buttons().container()
    //         .appendTo($('.col-sm-1:eq(0)', table.table().container()));


        $(".xform").on("submit", (function(b) {
            b.preventDefault();
            var a;
            if (simpan == "tambah") {
                a = "<?php echo base_url();?>user/add"
            } else {
                a = "<?php echo base_url();?>user/update"
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
                    //swal("Sukses!", "", "success");
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
    $("#modalbody").load("<?php echo base_url();?>user/modal/", function(a) {
        $("#modalbody").html(a)
    })
}

function ganti(a) {
    simpan = "update";
    $(".form")[0].reset();
    $("#myModal").modal("show");
    $("#modalbody").load("<?php echo base_url();?>user/edit/" + a, function(b) {
        $("#modalbody").html(b)
    })
}


function hapus(a) {
    Swal.fire({
        title: 'Hapus Data?',
        text: "",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya',
        cancelButtonText: "Batal"
    }).then((result) => {
        if (result.value == true) {
            $.get("<?php echo base_url()?>user/delete/" + a, function(b) {
                location.reload();
            })
        }
    })
};
</script>
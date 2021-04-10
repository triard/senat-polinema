<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<footer class="main-footer">
    <div class="footer">
        <center><span>Copyright © <?php echo SITE_NAME ." ". Date('Y') ?></span></center>
    </div>
    <div class="footer-right">

    </div>
</footer>
</div>
</div>
<div class="modal fade" id="myModal" tabindex="-1" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title pull-left">Form</h5>
            </div>
            <form class="form xform" enctype="multipart/form-data">
                <div class="modal-body" id="modalbody">
                
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-link" data-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-lg" tabindex="-1" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title pull-left">Form</h5>
            </div>
            <form class="form xform-lg" enctype="multipart/form-data">
                <div class="modal-body" id="modalbody-lg">

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-link" data-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="myModalView" tabindex="-1" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title pull-left">Preview Laporan</h5>
            </div>
            <form class="form xform-lg" enctype="multipart/form-data">
                <div class="modal-body" id="modalbodyView-lg">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="myModalModal" tabindex="-1" data-backdrop="static">
<div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title pull-left">Form Absen</h5>
            </div>
            <form class="form xform" enctype="multipart/form-data">
                <div class="modal-body" id="modalbodybody">
                
                </div>
            </form>
        </div>
    </div>
</div>
  <!-- Modal -->
  <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Warning!</h4>
      </div>
      <div class="modal-body">
        <div class="alert alert-danger">
          Sign before you submit!
        </div>
      </div>
    </div>
  </div>
</div>

<?php $this->load->view('_partials/js'); ?>

<script>
$(document).ready(function() {
    $(".preloader").fadeOut();
})
</script>
<script>
$(document).ready(function() {

    //Check to see if the window is top if not then display button
    $(window).scroll(function() {
        // Show button after 100px
        var showAfter = 100;
        if ($(this).scrollTop() > showAfter) {
            $('.back-to-top').fadeIn();
        } else {
            $('.back-to-top').fadeOut();
        }
    });

    //Click event to scroll to top
    $('.back-to-top').click(function() {
        $('html, body').animate({
            scrollTop: 0
        }, 800);
        return false;
    });
});
</script>
<script>
$(document).ready(function() {
    var table = $('#dataTables-custom').DataTable({
        dom: "<'row'<'col-sm-8 mt-2'f><'col-sm-2'l><'col-sm-2 mt-4 float-right'B>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-5'i><'col-sm-7'p>>",
        buttons: [{
                extend: 'excel',
                text: '<i class="far fa-file-excel"></i>',
                exportOptions: {
                    columns: ':visible',
                    rows: ':visible'
                }
            },
            {
                extend: 'print',
                text: '<i class="fas fa-print"></i>',
                exportOptions: {
                    columns: ':visible',
                    rows: ':visible'
                }
            },
            {
                extend: 'pdf',
                text: '<i class="far fa-file-pdf"></i>',
                pageSize: 'A4',
                orientation: 'landscape',
                exportOptions: {
                    columns: ':visible',
                }
            },

        ],
        language: {
            searchPlaceholder: "Search for records..."
        },
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
        ]
    });
});
</script>
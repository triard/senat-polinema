<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
</style>
<footer class="main-footer" style="background-color: #1E3799;">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <img alt="image" class="" width="150" src="<?php echo base_url(); ?>assets/img/logo-polinema-2.png">
            </div>
            <div class="col-4 p-3">
                <span style="color: white;">Copyright © <?php echo SITE_NAME ." ". Date('Y') ?></span>
            </div>
        </div>
    </div>

    </div>

</footer>

</div>
</div>

<?php $this->load->view('homepage/_partials/js'); ?>
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
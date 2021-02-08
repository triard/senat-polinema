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
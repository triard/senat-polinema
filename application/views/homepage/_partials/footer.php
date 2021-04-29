<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<footer class="main-footer" style="background-color: #1E3799;">
    <div class="container">
        <div class="row">
            <div class="col-5">
                <img alt="image" class="" width="100" src="<?php echo base_url(); ?>assets/img/logo-polinema-2.png">
            </div>
            <div class="col-7 p-3" style="text-align: left;">
                <span style="color: white;">Copyright © <?php echo SITE_NAME ." ". Date('Y') ?></span>
            </div>
        </div>
    </div>
    </div>
</footer>
</div>
</div>
<?php $this->load->view('homepage/_partials/js'); ?>
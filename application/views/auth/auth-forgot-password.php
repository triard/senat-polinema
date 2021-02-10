<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('_partials/header');
?>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div
                        class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="login-brand">
                            <img src="<?php echo base_url(); ?>assets/img/logo.png" alt="logo" width="100" class="">
                        </div>

                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Lupa Password</h4>
                            </div>

                            <div class="card-body">
                                <p class="text-muted">Kami Akan Mengirim link reset password ke email anda</p>
                                <form method="POST" action="<?php echo base_url('auth/auth_forgot_password'); ?>">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input id="email" type="email" class="form-control" name="email" tabindex="1"
                                            required autofocus>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            Lupa Password
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="simple-footer">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <?php $this->load->view('_partials/js'); ?>
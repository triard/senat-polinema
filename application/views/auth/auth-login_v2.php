<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('_partials/header');
?>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <?php if($this->session->flashdata('message') == TRUE){?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <?php echo $this->session->flashdata('message') ?>
                </div>
                <?php } ?>
                <div class="row">
                    <div
                        class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="login-brand">
                             <a href="https://www.kinerjasenat.xyz/">
                            <img src="<?php echo base_url(); ?>assets/img/logo.png" alt="logo" width="100" class="">
                             </a>
                        </div>

                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Login</h4>
                            </div>
                            <div class="card-body">
                                <form id="formlogin" name="login" class="needs-validation" novalidate="">
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input id="username" type="text" class="form-control" name="username"
                                            tabindex="1" required autofocus>
                                        <div class="invalid-feedback">
                                            Silahkan isi username Anda
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="d-block">
                                            <label for="password" class="control-label">Password</label>
                                            <div class="float-right">
                                                <a href="<?php echo base_url(); ?>auth/auth_forgot_password"
                                                    class="text-small">
                                                    Lupa Password?
                                                </a>
                                            </div>
                                        </div>
                                        <input id="password" type="password" class="form-control" name="password"
                                            tabindex="2" required>
                                        <div class="invalid-feedback">
                                            Silahkan isi password Anda
                                        </div>
                                        <br>
                                        <p class="text-small"><input type="checkbox" onclick="myFunction()"> Lihat
                                            Password</p>
                                    </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4" style="margin: -10% 5%; width: 90%;">
                                    Login
                                </button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>
    </div>
    <?php $this->load->view('_partials/js'); ?>
    <script type="text/javascript">
    function myFunction() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
    $(document).ready(function() {
        setTimeout(function() {
            // after 1000 ms we add the class animated to the login/register card
            $('.card').removeClass('card-hidden');
        }, 1500)
    });

    $("#formlogin").on("submit", (function(b) {
        $.ajax({
            url: "",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(a) {
                if (a > 0) {
                    location.href = "<?php echo base_url();?>Penjadwalan/konfirmasi_jadwal";
                } else {
                    console.log('Error')
                    swal("Error",
                        "username/password salah",
                        "error")
                }
            },
            error: function(a, e, f) {
                console.log(a);
                swal("Error", "", "error")
            }
        });
        return false
    }));
    </script>
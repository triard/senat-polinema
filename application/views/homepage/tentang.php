<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('homepage/_partials/header');
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <?php $this->load->view('homepage/_partials/breadcrumb'); ?>
        <div class="section-body">
            <div class="card">

                <div class="card-body">
                    <div class="row">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-4">
                                        <ul class="nav nav-pills flex-column" id="myTab4" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="home-tab4" data-toggle="tab"
                                                    href="#home4" role="tab" aria-controls="home"
                                                    aria-selected="true">Senat</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="profile-tab4" data-toggle="tab" href="#profile4"
                                                    role="tab" aria-controls="profile" aria-selected="false">Visi & Misi</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-8">
                                        <div class="tab-content no-padding" id="myTab2Content">
                                            <div class="tab-pane fade show active" id="home4" role="tabpanel"
                                                aria-labelledby="home-tab4">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                                veniam,
                                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                                consequat. Duis aute irure dolor in reprehenderit in voluptate velit
                                                esse
                                                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                                                cupidatat non
                                                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                            </div>
                                            <div class="tab-pane fade" id="profile4" role="tabpanel"
                                                aria-labelledby="profile-tab4">
                                                Sed sed metus vel lacus hendrerit tempus. Sed efficitur velit tortor, ac
                                                efficitur est lobortis quis. Nullam lacinia metus erat, sed fermentum
                                                justo rutrum ultrices. Proin quis iaculis tellus. Etiam ac vehicula
                                                eros, pharetra consectetur dui. Aliquam convallis neque eget tellus
                                                efficitur, eget maximus massa imperdiet. Morbi a mattis velit. Donec
                                                hendrerit venenatis justo, eget scelerisque tellus pharetra a.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>
<?php $this->load->view('homepage/_partials/scrolltop'); ?>
<?php $this->load->view('homepage/_partials/loader'); ?>
</div>
<?php $this->load->view('homepage/_partials/footer'); ?>
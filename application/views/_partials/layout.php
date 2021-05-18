<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i
                                    class="fas fa-bars"></i></a></li>
                    </ul>
                </form>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown dropdown-list-toggle">
                        <?php if ($status_notifikasi == "Read") { ?>
                            <a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg"><i class="far fa-bell"></i></a>
                        <?php } else { ?>
                            <a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
                        <?php } ?>
                        <div class="dropdown-menu dropdown-list dropdown-menu-right">
                            <div class="dropdown-header">Notifikasi
                                <div class="float-right">
                                    <a href="<?php echo base_url('Home/setReadNotifikasi'); ?>">Tandai Sudah Dibaca</a>
                                </div>
                            </div>
                            <div class="dropdown-list-content dropdown-list-icons">
                                <?php foreach ($notifikasi as $k) { 
                                    if ((($this->session->userdata('level') == "Ketua Komisi 1" || $this->session->userdata('level') == "Anggota Komisi 1") && ($k->user == 'Ketua Komisi 1' || $k->user == 'Admin' || $k->user == 'Sekretaris'))) { ?>
                                <a href="#" class="dropdown-item dropdown-item-unread">
                                    <div class="dropdown-item-desc">
                                        <span style="color: black; font-style: bold;text-transform: capitalize; font-family:  sans-serif;">
                                            <b>
                                                <?php echo $k->user; ?>
                                            </b>
                                        </span>
                                        <br>
                                        <?php echo $k->text; ?>
                                        <div class="time text-primary"><?php echo $k->time; ?></div>
                                    </div>
                                </a>
                                <?php } else if ((($this->session->userdata('level') == "Ketua Komisi 2" || $this->session->userdata('level') == "Anggota Komisi 2") && ($k->user == 'Ketua Komisi 2' || $k->user == 'Admin' || $k->user == 'Sekretaris'))) { ?>
                                <a href="#" class="dropdown-item dropdown-item-unread">
                                    <div class="dropdown-item-desc">
                                        <span style="color: black; font-style: bold;text-transform: capitalize; font-family:  sans-serif;">
                                            <b>
                                                <?php echo $k->user; ?>
                                            </b>
                                        </span>
                                        <br>
                                        <?php echo $k->text; ?>
                                        <div class="time text-primary"><?php echo $k->time; ?></div>
                                    </div>
                                </a>
                                <?php } else if ((($this->session->userdata('level') == "Ketua Komisi 3" || $this->session->userdata('level') == "Anggota Komisi 3") && ($k->user == 'Ketua Komisi 3' || $k->user == 'Admin' || $k->user == 'Sekretaris'))) { ?>
                                <a href="#" class="dropdown-item dropdown-item-unread">
                                    <div class="dropdown-item-desc">
                                        <span style="color: black; font-style: bold;text-transform: capitalize; font-family:  sans-serif;">
                                            <b>
                                                <?php echo $k->user; ?>
                                            </b>
                                        </span>
                                        <br>
                                        <?php echo $k->text; ?>
                                        <div class="time text-primary"><?php echo $k->time; ?></div>
                                    </div>
                                </a>
                                <?php } else if ((($this->session->userdata('level') == "Ketua Komisi 4" || $this->session->userdata('level') == "Anggota Komisi 4") && ($k->user == 'Ketua Komisi 4' || $k->user == 'Admin' || $k->user == 'Sekretaris'))) { ?>
                                <a href="#" class="dropdown-item dropdown-item-unread">
                                    <div class="dropdown-item-desc">
                                        <span style="color: black; font-style: bold;text-transform: capitalize; font-family:  sans-serif;">
                                            <b>
                                                <?php echo $k->user; ?>
                                            </b>
                                        </span>
                                        <br>
                                        <?php echo $k->text; ?>
                                        <div class="time text-primary"><?php echo $k->time; ?></div>
                                    </div>
                                </a>
                                <?php } else if ($this->session->userdata('level') == "Sekretaris" || $this->session->userdata('level') == "Admin" || $this->session->userdata('level') == "Ketua Senat") { ?>
                                <a href="#" class="dropdown-item dropdown-item-unread">
                                    <div class="dropdown-item-desc">
                                        <span style="color: black; font-style: bold;text-transform: capitalize; font-family:  sans-serif;">
                                            <b>
                                                <?php echo $k->user; ?>
                                            </b>
                                        </span>
                                        <br>
                                        <?php echo $k->text; ?>
                                        <div class="time text-primary"><?php echo $k->time; ?></div>
                                    </div>
                                </a>
                                <?php } ?>
                                <?php } ?>
                            </div>
                            <div class="dropdown-footer text-center">
                                <a href="<?php echo base_url('Notifikasi') ?>">View All <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown"><a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <div class="d-sm-none d-lg-inline-block"><?php echo $this->session->userdata('username'); ?>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="<?php echo base_url('user/editProfile/'.$this->session->userdata('id_user')); ?>"
                                class="dropdown-item has-icon">
                                <i class="far fa-user"></i> Profile
                            </a>
                            <!-- <a href="<?php echo base_url(); ?>dist/features_activities" class="dropdown-item has-icon">
                                <i class="fas fa-bolt"></i> Activities
                            </a> -->
                            <div class="dropdown-divider"></div>
                            <a href="<?php echo base_url('auth/logout') ?>" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
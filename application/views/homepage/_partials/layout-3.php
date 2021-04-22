<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<body class="layout-3">
    <div id="app">
        <div class="main-wrapper container">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar" style="background-color: #1E3799;">
            <a href="<?php echo base_url(); ?>homepage/Home" class="navbar-brand sidebar-gone-hide">
            <img alt="image" class="" width="270" src="<?php echo base_url(); ?>assets/img/logo-polinema.png">
            </a>
                <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>

                <ul class="navbar-nav mr-auto"></ul>
                <a href="<?php echo base_url('auth/auth_login') ?>" class="btn float-right text-white"
                    style="background-color: #EE5A24;"><i class="fas fa-sign-in-alt"></i> Sign-in</a>
                </ul>
            </nav>
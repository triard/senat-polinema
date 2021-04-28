<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<nav class="navbar navbar-secondary navbar-expand-lg">
    <div class="container">
        <ul class="navbar-nav">
            <?php if($this->uri->segment(2) == ''){ ?>
            <li class="nav-item <?php echo $this->uri->segment(2) == '' ? 'active' : ''; ?>">
                <a href="<?php echo base_url('Homepage/home') ?>" class="nav-link"><i
                        class="fas fa-home"></i><span>Beranda</span></a>
            </li>
            <?php }else if($this->uri->segment(2) == 'home'){ ?>
            <li class="nav-item <?php echo $this->uri->segment(2) == 'home' ? 'active' : ''; ?>">
                <a href="<?php echo base_url('Homepage/home') ?>" class="nav-link"><i
                        class="fas fa-home"></i><span>Beranda</span></a>
            </li>
            <?php }else{ ?>
            <li class="nav-item">
                <a href="<?php echo base_url('Homepage/home') ?>" class="nav-link"><i
                        class="fas fa-home"></i><span>Beranda</span></a>
            </li>
            <?php } ?>
            <li class="nav-item <?php echo $this->uri->segment(2) == 'tentang' ? 'active' : ''; ?>">
                <a href="<?php echo base_url('Homepage/tentang') ?>" class="nav-link"><i
                        class="fas fa-user-graduate"></i><span>Tentang Senat</span></a>
            </li>
            <li class="nav-item <?php echo $this->uri->segment(2) == 'komisi' ? 'active' : ''; ?>">
                <a href="<?php echo base_url('Homepage/komisi') ?>" class="nav-link"><i
                        class="fas fa-users"></i></i><span>Komisi</span></a>
            </li>
            <li class="nav-item <?php echo $this->uri->segment(2) == 'arsip' ? 'active' : ''; ?>">
                <a href="<?php echo base_url('Homepage/arsip')?>" class="nav-link"><i
                        class="fas fa-file-archive"></i><span>Arsip</span></a>
            </li>
            <li class="nav-item <?php echo $this->uri->segment(2) == 'gallery' ? 'active' : ''; ?>">
                <a href="<?php echo base_url('Homepage/gallery')?>" class="nav-link"><i
                        class="fas fa-image"></i></i><span>Galeri</span></a>
            </li>
            <li class="nav-item <?php echo $this->uri->segment(2) == 'berita' ? 'active' : ''; ?>">
                <a href="<?php echo base_url('Berita/berita')?>" class="nav-link"><i
                        class="far fa-newspaper"></i></i><span>Berita</span></a>
            </li>
            <?php if($this->uri->segment(2) == 'usulan'){ ?>
            <li class="nav-item <?php echo $this->uri->segment(2) == 'usulan' ? 'active' : ''; ?>">
                <a href="<?php echo base_url('Homepage/email_usulan')?>" class="nav-link"><i
                        class="fas fa-file-alt"></i><span>Usulan</span></a>
            </li>
            <?php }else if($this->uri->segment(2) == 'email_usulan'){ ?>
            <li class="nav-item <?php echo $this->uri->segment(2) == 'email_usulan' ? 'active' : ''; ?>">
                <a href="<?php echo base_url('Homepage/email_usulan')?>" class="nav-link"><i
                        class="fas fa-file-alt"></i><span>Usulan</span></a>
            </li>
            <?php }else if($this->uri->segment(2) == 'konfirmasi_kode'){ ?>
            <li class="nav-item <?php echo $this->uri->segment(2) == 'konfirmasi_kode' ? 'active' : ''; ?>">
                <a href="<?php echo base_url('Homepage/email_usulan')?>" class="nav-link"><i
                        class="fas fa-file-alt"></i><span>Usulan</span></a>
            </li>
            <?php }else{ ?>
            <li class="nav-item">
                <a href="<?php echo base_url('Homepage/email_usulan')?>" class="nav-link"><i
                        class="fas fa-file-alt"></i><span>Usulan</span></a>
            </li>
            <?php } ?>
        </ul>
    </div>
</nav>
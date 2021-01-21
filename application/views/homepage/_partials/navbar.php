<!-- <?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<nav class="navbar navbar-secondary navbar-expand-lg text-white" style="background-color: #1E3799;">
    <div class="container text-white">
        <ul class="navbar-nav">
            <li class="nav-item <?php echo $this->uri->segment(2) == '' ? 'active' : ''; ?>">
                <a href="#" class="nav-link text-white"><i class="fas fa-home"></i><span>Beranda</span></a>
            </li>
            <li class="nav-item <?php echo $this->uri->segment(2) == 'layout_top_navigation' ? 'active' : ''; ?>">
                <a href="#" class="nav-link text-white"><i class="fas fa-user-graduate"></i><span>Tentang</span></a>
            </li>
            <li class="nav-item <?php echo $this->uri->segment(2) == 'layout_top_navigation' ? 'active' : ''; ?>">
                <a href="#" class="nav-link text-white"><i class="fas fa-users"></i></i><span>Komisi</span></a>
            </li>
            <li class="nav-item <?php echo $this->uri->segment(2) == 'layout_top_navigation' ? 'active' : ''; ?>">
                <a href="#" class="nav-link text-white"><i class="fas fa-file-archive"></i><span>Arsip</span></a>
            </li>
            <li class="nav-item <?php echo $this->uri->segment(2) == 'layout_top_navigation' ? 'active' : ''; ?>">
                <a href="#" class="nav-link text-white"><i class="fas fa-image"></i></i><span>Galeri</span></a>
            </li>
            <li class="nav-item <?php echo $this->uri->segment(2) == 'layout_top_navigation' ? 'active' : ''; ?>">
                <a href="#" class="nav-link text-white"><i class="fas fa-file-alt"></i><span>Usulan</span></a>
            </li>
        </ul>
    </div>
</nav>
 -->
 <?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
      <nav class="navbar navbar-secondary navbar-expand-lg" >
        <div class="container">
          <ul class="navbar-nav">
            <li class="nav-item <?php echo $this->uri->segment(2) == 'home' ? 'active' : ''; ?>">
                <a href="<?php echo base_url('homepage/home') ?>" class="nav-link"><i class="fas fa-home"></i><span>Beranda</span></a>
            </li>
            <li class="nav-item <?php echo $this->uri->segment(2) == 'tentang' ? 'active' : ''; ?>">
                <a href="<?php echo base_url('homepage/tentang') ?>" class="nav-link"><i class="fas fa-user-graduate"></i><span>Tentang Senat</span></a>
            </li>
            <li class="nav-item <?php echo $this->uri->segment(2) == 'komisi' ? 'active' : ''; ?>">
                <a href="<?php echo base_url('homepage/komisi') ?>" class="nav-link"><i class="fas fa-users"></i></i><span>Komisi</span></a>
            </li>
            <li class="nav-item <?php echo $this->uri->segment(2) == 'arsip' ? 'active' : ''; ?>">
                <a href="<?php echo base_url('homepage/arsip')?>" class="nav-link"><i class="fas fa-file-archive"></i><span>Arsip</span></a>
            </li>
            <li class="nav-item <?php echo $this->uri->segment(2) == 'gallery' ? 'active' : ''; ?>">
                <a href="<?php echo base_url('homepage/gallery')?>" class="nav-link"><i class="fas fa-image"></i></i><span>Galeri</span></a>
            </li>
            <li class="nav-item <?php echo $this->uri->segment(2) == 'usulan' ? 'active' : ''; ?>">
                <a href="<?php echo base_url('homepage/usulan')?>" class="nav-link"><i class="fas fa-file-alt"></i><span>Usulan</span></a>
            </li>
          </ul>
        </div>
      </nav>

  <?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  ?>
  <div class="main-sidebar sidebar-style-2">
      <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
              <!-- <a href="<?php echo base_url(); ?>Home">Senat</a> -->
              <img src="<?php echo base_url('assets/img/logo-sidebar.png') ?>" alt="logo polinema">
              <!-- <a style="font-weight: 800; font-family: serif; font-size: 15px;" class="mb-0">kinerja senat</a> -->
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
              <a href="<?php echo base_url(); ?>Home">
              <img src="<?php echo base_url('assets/img/polinema-sidebar.png') ?>" alt="logo polinema">
              </a>
          </div>
          <ul class="sidebar-menu">

              <li class="<?php echo $this->uri->segment(1) == 'Home' ? 'active' : ''; ?>"><a class="nav-link"
                      href="<?php echo base_url(); ?>Home"><i class="fas fa-columns"></i> <span>Dashboard</span></a>
              </li>
              <?php if($this->session->userdata('level') == "Admin"){ ?>
              <li class="<?php echo $this->uri->segment(1) == 'User' ? 'active' : ''; ?>"><a class="nav-link"
                      href="<?php echo base_url(); ?>User"><i class="far fa-user"></i> <span>User</span></a></li>
              <li class="<?php echo $this->uri->segment(1) == 'Berita' ? 'active' : ''; ?>"><a class="nav-link"
                      href="<?php echo base_url(); ?>Berita"><i class="far fa-newspaper"></i> <span>Berita</span></a>
              </li>
              <?php } ?>
              <li class="<?php echo $this->uri->segment(1) == 'Usulan' ? 'active' : ''; ?>"><a class="nav-link"
                      href="<?php echo base_url(); ?>Usulan"><i class="far fa-lightbulb"></i> <span>Usulan</span></a>
              </li>
              <li class="<?php echo $this->uri->segment(1) == 'Penjadwalan' ? 'active' : ''; ?>"><a class="nav-link"
                      href="<?php echo base_url(); ?>Penjadwalan"><i class="far fa-calendar-alt"></i>
                      <span>Penjadwalan</span></a></li>
              <li class="<?php echo $this->uri->segment(1) == 'Kegiatan' ? 'active' : ''; ?>"><a class="nav-link"
                      href="<?php echo base_url(); ?>Kegiatan"><i class="far fa-calendar-check"></i> <span>Agenda
                          Kegiatan</span></a>
              </li>
              <?php if($this->session->userdata('level') == "Ketua Senat" || $this->session->userdata('level') == "Ketua Komisi"){ ?>
              <li class="dropdown <?php echo $this->uri->segment(1) == 'BirokrasiKetuaUmum' ? 'active' : ''; ?>">
                  <a href="#" class="nav-link has-dropdown"><i
                          class="fas fa-file-signature"></i><span>Birokrasi</span></a>
                  <ul class="dropdown-menu">
                      <?php if($this->session->userdata('level') == "Ketua Senat"){ ?>

                      <li><a class="nav-link " style="<?php echo $this->uri->segment(1) == 'BirokrasiKetuaUmum' ? 'color: #0077C0;' : ''; ?>"
                              href="<?php echo base_url(); ?>BirokrasiKetuaUmum">Birokrasi Ketua
                              Umum</a>
                      </li>
                      <?php } else if($this->session->userdata('level') == "Ketua Komisi"){ ?>
                      <li><a class="nav-link" href="<?php echo base_url(); ?>BirokrasiKetua1">Birokrasi Komisi 1</a>
                      </li>
                      <li><a class="nav-link" href="<?php echo base_url(); ?>BirokrasiKetua2">Birokrasi Komisi 2</a>
                      </li>
                      <li><a class="nav-link" href="<?php echo base_url(); ?>BirokrasiKetua3">Birokrasi Komisi 3</a>
                      </li>
                      <li><a class="nav-link" href="<?php echo base_url(); ?>BirokrasiKetua4">Birokrasi Komisi 4</a>
                      </li>
                      <?php } ?>
                  </ul>
              </li>
              <?php } ?>
          </ul>
      </aside>
  </div>
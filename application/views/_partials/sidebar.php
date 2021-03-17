  <?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  ?>
  <div class="main-sidebar sidebar-style-2">
      <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
              <!-- <a href="<?php echo base_url(); ?>dist/index">Senat</a> -->
              <a style="font-weight: 700;" class="mb-0">Senat<span
                      style="font-weight: 500; color: blue;">POLINEMA</span></a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
              <a href="<?php echo base_url(); ?>dist/index">St</a>
          </div>
          <ul class="sidebar-menu">

              <li class="<?php echo $this->uri->segment(1) == 'Home' ? 'active' : ''; ?>"><a class="nav-link"
                      href="<?php echo base_url(); ?>Home"><i class="far fa-square"></i> <span>Dashboard</span></a></li>
              <li class="<?php echo $this->uri->segment(1) == 'User' ? 'active' : ''; ?>"><a class="nav-link"
                      href="<?php echo base_url(); ?>User"><i class="far fa-user"></i> <span>User</span></a></li>
              <li class="<?php echo $this->uri->segment(1) == 'Usulan' ? 'active' : ''; ?>"><a class="nav-link"
                      href="<?php echo base_url(); ?>Usulan"><i class="far fa-calendar"></i> <span>Usulan</span></a>
              </li>
              <li class="<?php echo $this->uri->segment(1) == 'Penjadwalan' ? 'active' : ''; ?>"><a class="nav-link"
                      href="<?php echo base_url(); ?>Penjadwalan"><i class="far fa-calendar"></i>
                      <span>Penjadwalan</span></a></li>
              <li class="<?php echo $this->uri->segment(1) == 'Kegiatan' ? 'active' : ''; ?>"><a class="nav-link"
                      href="<?php echo base_url(); ?>Kegiatan"><i class="far fa-file"></i> <span>Agenda Kegiatan</span></a>
              </li>
              <li class="<?php echo $this->uri->segment(1) == 'Berita' ? 'active' : ''; ?>"><a class="nav-link"
                      href="<?php echo base_url(); ?>Berita"><i class="far fa-file"></i> <span>Berita</span></a>
              </li>
              <li class="<?php echo $this->uri->segment(1) == 'hasil_laporan' ? 'active' : ''; ?>"><a class="nav-link"
                      href="<?php echo base_url(); ?>Home"><i class="far fa-file"></i> <span>Hasil Laporan</span></a>
              </li>
              <li class="<?php echo $this->uri->segment(1) == 'dokumentasi' ? 'active' : ''; ?>"><a class="nav-link"
                      href="<?php echo base_url(); ?>home"><i class="far fa-images"></i> <span>Dokumentasi</span></a>
              </li>
          </ul>
      </aside>
  </div>
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

              <li class="<?php echo $this->uri->segment(1) == 'home' ? 'active' : ''; ?>"><a class="nav-link"
                      href="<?php echo base_url(); ?>home"><i class="far fa-square"></i> <span>Dashboard</span></a></li>
              <li class="<?php echo $this->uri->segment(1) == 'user' ? 'active' : ''; ?>"><a class="nav-link"
                      href="<?php echo base_url(); ?>user"><i class="far fa-user"></i> <span>User</span></a></li>
              <li class="<?php echo $this->uri->segment(1) == 'usulan' ? 'active' : ''; ?>"><a class="nav-link"
                      href="<?php echo base_url(); ?>usulan"><i class="far fa-calendar"></i> <span>Usulan</span></a></li>
              <li class="<?php echo $this->uri->segment(1) == 'jadwal' ? 'active' : ''; ?>"><a class="nav-link"
                      href="<?php echo base_url(); ?>home"><i class="far fa-calendar"></i> <span>Jadwal</span></a></li>
              <li class="<?php echo $this->uri->segment(1) == 'hasil_laporan' ? 'active' : ''; ?>"><a class="nav-link"
                      href="<?php echo base_url(); ?>home"><i class="far fa-file"></i> <span>Hasil Laporan</span></a>
              </li>
              <li class="<?php echo $this->uri->segment(1) == 'dokumentasi' ? 'active' : ''; ?>"><a class="nav-link"
                      href="<?php echo base_url(); ?>home"><i class="far fa-images"></i> <span>Dokumentasi</span></a>
              </li>
          </ul>
      </aside>
  </div>
 <!-- Sidenav -->
 <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
     <div class="scrollbar-inner">
         <!-- Brand -->
         <div class="sidenav-header  align-items-center">
             <a class="navbar-brand" href="javascript:void(0)">
                 <img src="<?= base_url('assets/image/') ?>presensi1.jpg" class="navbar-brand-img">
             </a>
         </div>
         <div class="navbar-inner">
             <!-- Collapse -->
             <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                 <!-- Nav items -->
                 <?php if ($this->ion_auth->in_group('admin')) :  ?>
                     <ul class="navbar-nav">
                         <li class="nav-item">
                             <a class="nav-link <?php if ($folder == 'dashboard') : ?> active <?php endif; ?>" href="<?= base_url('dashboard') ?>">
                                 <i class="ni ni-tv-2 text-primary"></i>
                                 <span class="nav-link-text">Dashboard</span>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link <?php if ($folder == 'input_pegawai') : ?> active <?php endif; ?>" href="<?= base_url('Input_Pegawai') ?>">
                                 <i class="ni ni-planet text-orange"></i>
                                 <span class="nav-link-text">Input Data Pegawai</span>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link <?php if ($folder == 'data_pegawai') : ?> active <?php endif; ?>" href="<?= base_url('Data_pegawai') ?>">
                                 <i class="ni ni-pin-3 text-primary"></i>
                                 <span class="nav-link-text">Data Pegawai</span>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link<?php if ($folder == 'report_absen') : ?> active <?php endif; ?>" href="<?= base_url('Report_absensi') ?>">
                                 <i class="ni ni-single-02 text-yellow"></i>
                                 <span class="nav-link-text">Report Absensi</span>
                             </a>
                         </li>
                         <!-- <li class="nav-item">
                             <a class="nav-link" href="examples/tables.html">
                                 <i class="ni ni-bullet-list-67 text-default"></i>
                                 <span class="nav-link-text">Tunjangan Dan Gaji</span>
                             </a>
                         </li> -->
                     </ul>
                 <?php endif; ?>

                 <hr class="my-3">
                 <!-- Heading -->
                 <h6 class="navbar-heading p-0 text-muted">
                     <span class="docs-normal">Data Master</span>
                 </h6>
                 <!-- Navigation -->
                 <ul class="navbar-nav mb-md-3">
                     <?php if ($this->ion_auth->in_group('admin')) :  ?>
                         <li class="nav-item">
                             <a class="nav-link <?php if ($folder == 'jabatan') : ?> active <?php endif; ?>" href="<?= base_url('master_jabatan'); ?>">
                                 <i class="ni ni-spaceship"></i>
                                 <span class="nav-link-text">Master Jabatan</span>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link <?php if ($folder == 'divisi') : ?> active <?php endif; ?>" href="<?= base_url('master_divisi') ?>">
                                 <i class="ni ni-palette"></i>
                                 <span class="nav-link-text">Master Divisi</span>
                             </a>
                         </li>
                     <?php endif; ?>
                     <?php if ($this->ion_auth->in_group('karyawan')) : ?>
                         <li class="nav-item">
                             <a class="nav-link" href="<?= base_url('qr_code'); ?>">
                                 <i class="ni ni-palette"></i>
                                 <span class="nav-link-text">Qr Code</span>
                             </a>
                         </li>
                     <?php endif; ?>
                 </ul>

             </div>
         </div>
     </div>
 </nav>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $judul ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/fontawesome/css/all.min.css') ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo my_theme() ?>css/adminlte.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo my_theme() ?>plugins/bootstrap-select/css/bootstrap-select.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/dataTables/datatables.min.css') ?>">
  <!-- jQuery -->
  <script src="<?php echo my_theme() ?>plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?php echo my_theme() ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
      <!-- Clock -->
      <div class="form-inline ml-3">
        <i class="far fa-calendar-alt pr-2"></i> <span id="date" class="pr-3"><?php echo date('d-m-Y') ?></span>
        <i class="far fa-clock pr-2"> </i><span id="clock" class="h4 m-0"></span>
      </div>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
          <div class="dropdown open">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-user"></i> <span class="pl-2"><?php echo $this->session->nama ?></span>
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
              <a class="dropdown-item" href="<?php echo base_url('profil') ?>" >Profil</a>
              <a class="dropdown-item" href="#" data-toggle="modal" data-target="#gantiPassword">Ganti Password</a>
              <a class="dropdown-item" href="<?php echo base_url('auth/logout') ?>">Logout</a>
            </div>
          </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
          <i class="fa fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo my_theme() ?>index3.html" class="brand-link">
      <img src="<?php echo my_theme() ?>img/AdminLTELogo.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Sistem Perpustakaan</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="<?php echo base_url('dashboard') ?>" class="nav-link">
              <i class="nav-icon fa fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-header">ADMINISTRASI</li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-user"></i>
              <p>
                ADMINISTRASI
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <?php if ($this->session->level < 2): ?>
                <li class="nav-item">
                  <a href="<?php echo base_url('admin') ?>" class="nav-link">
                    <i class="nav-icon fa fa-user"></i>
                    <p>Data Admin</p>
                  </a>
                </li>
              <?php endif ?>
              <li class="nav-item">
                <a href="<?php echo base_url('anggota') ?>" class="nav-link">
                  <i class="nav-icon fa fa-user"></i>
                  <p>Data Anggota</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">DATA BUKU</li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link <?php echo ($this->uri->segment(1) == 'buku') || ($this->uri->segment(1) == 'kategori')  ? 'active': '' ?>">
              <i class="nav-icon fa fa-book"></i>
              <p>
                DATA BUKU
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('buku') ?>" class="nav-link">
                  <i class="nav-icon fa fa-book"></i>
                  <p>Daftar Buku</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('kategori') ?>" class="nav-link">
                  <i class="nav-icon fa fa-book"></i>
                  <p>Kategori</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">TRANSAKSI</li>
          <li class="nav-item">
            <a href="<?php echo base_url('peminjaman') ?>" class="nav-link <?php echo ($this->uri->segment(1) == 'peminjaman') ? 'active': '' ?>">
              <i class="nav-icon fa fa-book-reader"></i>
              <p>Peminjaman</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistem Perpustakaan</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/fontawesome/css/all.min.css') ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo my_theme() ?>css/adminlte.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo my_theme() ?>plugins/iCheck/square/blue.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <div class="d-inline-block">
      <img class="w-50" src="<?php echo base_url('assets/images/smkii.png') ?>">
    </div>
    <a href="<?php echo base_url('dashboard') ?>"><b>Sistem Perpustakaan</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <?php if($this->session->flashdata('isSuccess')): ?>
      <div class="alert alert-success" role="alert">
         <font class="text-white">Password berhasil diganti, silahkan login kembali.</font>
      </div>
      <?php endif ?>
      <?php if($this->session->flashdata('loginFail')): ?>
      <div class="alert alert-danger" role="alert">
         <font class="text-white">Username/Password yang anda masukkan salah...</font>
      </div>
      <?php endif ?>
      <p align="center">Silahkan login terlebih dahulu</p>
      <div><hr></div>
      <form action="<?php echo base_url('auth/checkLogin') ?>" method="post">
        <div class="form-group has-feedback">
          <div class="input-group">
              <input type="text" autocomplete="off" id="username" name="username" class="form-control" placeholder="Masukkan Username">
              <div class="input-group-append">
                <span class="input-group-text form-control-feedback"><i class="fas fa-user"></i></span>
              </div>
          </div>
        </div>
        <div class="form-group has-feedback">
          <div class="input-group">
              <input type="password" autocomplete="off" id="password" name="password" class="form-control" placeholder="Masukkan Password">
              <div class="input-group-append">
                <span class="input-group-text form-control-feedback"><i class="fas fa-key"></i></span>
              </div>
          </div>
        </div>
        <p><a href="<?php echo base_url('auth/lupa_password') ?>">Lupa Password</a></p>
        <div><hr></div>
        <div class="d-block" align="center">
            <button type="reset" class="btn btn-danger btn-flat">Setel Ulang</button>
            <button type="submit" class="btn btn-primary btn-flat">Login</button>
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?php echo my_theme() ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo my_theme() ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- iCheck -->
<script src="<?php echo my_theme() ?>plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass   : 'iradio_square-blue',
      increaseArea : '20%' // optional
    })
  })
</script>
</body>
</html>

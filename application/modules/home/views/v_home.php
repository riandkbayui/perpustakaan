<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistem Perpustakaan</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1", shrink-to-fit=no">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/fontawesome/css/all.min.css') ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo my_theme() ?>css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/dataTables/datatables.min.css') ?>">
  <!-- jQuery -->
  <script src="<?php echo my_theme() ?>plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?php echo my_theme() ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="d-block p-3 bg-dark" align="center">
  <h1>Sistem Perpustakaan</h1>
  <h2>SMK ISLAM KANIGORO</h2>
</div>
<div class="bg-primary">
  <div class="container d-block">
    <div class="row pt-2">
      <div class="col">
        <ul class="list-inline">
          <li class="list-inline-item"><a href="<?php echo base_url('home') ?>"><b>Beranda</b></a></li>
          <li class="list-inline-item"><a href="http://smkikanigoro.sch.id/"><b>Tentang Sekolah</b></a></li>
        </ul>
      </div>
      <div class="col" align="right">
        <ul class="list-inline">
          <li class="list-inline-item"><a href="<?php echo base_url('auth/login') ?>"><b>Login</b></a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div class="container" align="center">
  <div class="pt-5">
    <h2>DAFTAR BUKU PERPUSTAKAAN</h2>
  </div>
  <div><hr></div>
  <table class="table table-responsive table-inverseta table-hover">
    <thead>
      <tr>
        <th>NO</th>
        <?php foreach($fields as $var): ?>
          <?php if ($var != 'keterangan'): ?>
            <th><?php echo strtoupper(str_replace('_', ' ', $var)) ?></th>
          <?php endif ?>
        <?php endforeach; ?>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($buku as $key => $value): ?>
        <tr>
          <td><?php echo $key + 1; ?></td>
          <?php foreach ($value as $key => $var): ?>
            <td><?php echo $var ?></td>
          <?php endforeach ?>
        </tr>
      <?php endforeach ?>
    </tbody>
    <tfoot>
      <tr>
        <th>NO</th>
        <?php foreach($fields as $var): ?>
          <?php if ($var != 'keterangan'): ?>
            <th><?php echo strtoupper(str_replace('_', ' ', $var)) ?></th>
          <?php endif ?>
        <?php endforeach; ?>
      </tr>
    </tfoot>
  </table>
</div>
<footer class="bg-primary mt-5">
  <div class="container d-block">
    <div class="p-2">
      <strong>&copy; SMK ISLAM KANIGORO | <?php echo date('Y'); ?></strong>
    </div>
  </div>
</footer>
<!-- AdminLTE App -->
<script src="<?php echo my_theme() ?>js/adminlte.min.js"></script>
<!-- Data tables -->
<script src="<?php echo base_url('assets/dataTables/datatables.min.js') ?>"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('table').DataTable();
  });
</script>
</body>
</html>
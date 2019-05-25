<!-- Modal -->
<div class="modal fade" id="gantiPassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <form id="gPassword" onsubmit="gPassword()">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle"><strong>Ganti Password</strong></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Password Lama :</label>
            <div class="input-group">
              <input type="password" id="password" name="password" class="form-control" autocomplete="off">
              <div class="input-group-append">
                <span class="input-group-text"><i class="fa fa-key"></i></span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label>Password Baru :</label>
            <div class="input-group">
              <input type="password" id="new_password" name="new_password" class="form-control" autocomplete="off">
              <div class="input-group-append">
                <span class="input-group-text"><i class="fa fa-key"></i></span>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="button" onclick="gPassword()" class="btn btn-primary">Ganti Password</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Modal -->

<footer class="main-footer">
    <strong>Copyright &copy; 2018-<?php echo date('Y') ?> SMK ISLAM KANIGORO
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- SlimScroll -->
<script src="<?php echo my_theme() ?>plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo my_theme() ?>plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo my_theme() ?>js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo my_theme() ?>js/demo.js"></script>
<!-- Clock -->
<script src="<?php echo my_theme('plugins/clock/clock.js') ?>"></script>
<!-- Bootstrap Select -->
<script src="<?php echo my_theme('plugins/bootstrap-select/js/bootstrap-select.min.js') ?>"></script>
<!-- Data tables -->
<script src="<?php echo base_url('assets/dataTables/datatables.min.js') ?>"></script>

<script type="text/javascript">

  function gPassword(){
    $.post('<?php echo base_url('auth/gantiPassword') ?>', $('#gPassword').serialize(), function(data){
      if (data == '1') {
        alert('password diganti');
        $(location).attr('href', '<?php echo base_url('auth/logout/gantipassword') ?>')
      } else {
        alert('password lama salah');
      }
    });
  }

  $(document).ready(function(){
    startTime();
    $('select').selectpicker();
    $('table').DataTable();
  });
</script>
</body>
</html>

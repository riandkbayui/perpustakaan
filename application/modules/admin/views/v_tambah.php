<div class="container">
	<div id="check_berhasil" class="d-none alert alert-success" role="alert">
		<strong><i class="fa fa-check"></i></strong> id dapat digunakan.
	</div>
	<div id="check_gagal" class="d-none alert alert-danger" role="alert">
		<strong><i class="fa fa-times"></i></strong> id tidak dapat digunakan.
	</div>
	<div id="check_loading" class="d-none alert alert-warning" role="alert">
		<strong class="text-white"><i class="fa fa-spinner fa-spin"></i></strong> <span class="text-white"> loading.</span>
	</div>
	<form method="post" action="<?php echo base_url('admin/crud_tambah') ?>">
		<div class="row">
			<?php foreach ($fields as $var): ?>
				<?php if ($var == 'password'): ?>
					<div class="col-md-6">
						<div class="form-group">
							<label><?php echo strtoupper(str_replace('_', ' ', $var)) ?></label>
							<input type="password" id="<?php echo $var ?>" name="<?php echo $var ?>" class="form-control" autocomplete="off" required="">
						</div>
					</div>
				<?php elseif($var == 'level'): ?>
					<div class="col-md-6">
						<div class="form-group">
							<label><?php echo strtoupper(str_replace('_', ' ', $var)) ?></label>
							<select id="<?php echo $var ?>" name="<?php echo $var ?>" class="form-control" autocomplete="off" required="" data-live-search="true">
								<?php foreach ($level as $var): ?>
									<option value="<?php echo $var['id_level'] ?>"><?php echo $var['nama_level'] ?></option>
								<?php endforeach ?>
							</select>
						</div>
					</div>
				<?php else: ?>
					<div class="col-md-6">
						<div class="form-group">
							<label><?php echo strtoupper(str_replace('_', ' ', $var)) ?></label>
							<input type="text" id="<?php echo $var ?>" name="<?php echo $var ?>" class="form-control" autocomplete="off" required="">
						</div>
					</div>
				<?php endif ?>
			<?php endforeach ?>
		</div>
		<div><hr></div>
		<div class="d-block" align="center">
			<input type="reset" class="btn btn-danger" value="Setel Ulang">
			<button type="submit" class="btn btn-success">Tambah</button>
		</div>
	</form>
</div>
<script type="text/javascript">
	$('#username').on('keyup', function(){
		$('#check_berhasil').addClass('d-none');
		$('#check_gagal').addClass('d-none');
		$('#check_loading').removeClass('d-none');
		$.get(('<?php echo base_url('admin/check/') ?>' + $('#username').val()), function(data){
			if (data > 0) {
				$('#check_berhasil').addClass('d-none');
				$('#check_gagal').removeClass('d-none');
				$('#check_loading').addClass('d-none');
			} else {
				$('#check_berhasil').removeClass('d-none');
				$('#check_gagal').addClass('d-none');
				$('#check_loading').addClass('d-none');
			}
			if ($('#username').val() == '') {
				$('#check_berhasil').addClass('d-none');
				$('#check_gagal').addClass('d-none');
				$('#check_loading').addClass('d-none');
			}
		});
	});
</script>
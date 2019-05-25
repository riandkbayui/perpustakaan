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
	<form method="post" action="<?php echo base_url('buku/crud_tambah') ?>">
		<div class="row">
			<?php foreach ($daftar_buku as $var): ?>
				<?php if ($var == 'stok'): ?>
					<div class="col-8 col-md-6">
						<div class="form-group">
							<label><?php echo strtoupper(str_replace('_', ' ', $var)) ?></label>
							<input type="number" id="<?php echo $var ?>" name="<?php echo $var ?>" class="form-control" autocomplete="off">
						</div>
					</div>
				<?php elseif($var == 'keterangan'): ?>
					<div class="col-8 col-md-12">
						<div class="form-group">
							<label><?php echo strtoupper(str_replace('_', ' ', $var)) ?></label>
							<textarea id="<?php echo $var ?>" name="<?php echo $var ?>" class="form-control"></textarea>
						</div>
					</div>
				<?php elseif($var == 'kategori'): ?>
					<div class="col-8 col-md-6">
						<div class="form-group">
							<label><?php echo strtoupper(str_replace('_', ' ', $var)) ?></label>
							<select class="form-control" id="<?php echo $var ?>" name="<?php echo $var ?>" data-live-search="true">
								<?php foreach ($kategori as $var): ?>
									<option value="<?php echo $var['id_kategori'] ?>"><?php echo $var['nama_kategori'] ?></option>
								<?php endforeach ?>
							</select>
						</div>
					</div>
				<?php else: ?>
					<div class="col-8 col-md-6">
						<div class="form-group">
							<label><?php echo strtoupper(str_replace('_', ' ', $var)) ?></label>
							<input type="text" id="<?php echo $var ?>" name="<?php echo $var ?>" class="form-control" autocomplete="off">
						</div>
					</div>
				<?php endif ?>
			<?php endforeach ?>
		</div>
		<div><hr></div>
		<div class="d-block" align="center">
			<button type="reset" class="btn btn-danger">Setel Ulang</button>
			<button type="submit" class="btn btn-success">Simpan</button>
		</div>
	</form>
</div>
<script type="text/javascript">
	$('#id_buku').on('keyup', function(){
		$('#check_berhasil').addClass('d-none');
		$('#check_gagal').addClass('d-none');
		$('#check_loading').removeClass('d-none');
		$.get(('<?php echo base_url('buku/check/') ?>' + $('#id_buku').val()), function(data){
			if (data > 0) {
				$('#check_berhasil').addClass('d-none');
				$('#check_gagal').removeClass('d-none');
				$('#check_loading').addClass('d-none');
			} else {
				$('#check_berhasil').removeClass('d-none');
				$('#check_gagal').addClass('d-none');
				$('#check_loading').addClass('d-none');
			}
			if ($('#id_buku').val() == '') {
				$('#check_berhasil').addClass('d-none');
				$('#check_gagal').addClass('d-none');
				$('#check_loading').addClass('d-none');
			}
		});
	});
</script>
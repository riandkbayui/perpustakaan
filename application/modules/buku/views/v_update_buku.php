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
	<form method="post" action="<?php echo base_url('buku/crud_update/'.$daftar_buku['id_buku']) ?>">
		<div class="row">
			<?php foreach ($daftar_buku as $key => $var): ?>
				<?php if ($key == 'stok'): ?>
					<div class="col-8 col-md-6">
						<div class="form-group">
							<label><?php echo strtoupper(str_replace('_', ' ', $key)) ?></label>
							<input value="<?php echo $var ?>" type="number" id="<?php echo $key ?>" name="<?php echo $key ?>" class="form-control" autocomplete="off">
						</div>
					</div>
				<?php elseif($key == 'keterangan'): ?>
					<div class="col-8 col-md-12">
						<div class="form-group">
							<label><?php echo strtoupper(str_replace('_', ' ', $key)) ?></label>
							<textarea id="<?php echo $key ?>" name="<?php echo $key ?>" class="form-control"><?php echo $var ?></textarea>
						</div>
					</div>
				<?php elseif($key == 'kategori'): ?>
					<div class="col-8 col-md-6">
						<div class="form-group">
							<label><?php echo strtoupper(str_replace('_', ' ', $key)) ?></label>
							<select class="form-control" id="<?php echo $key ?>" name="<?php echo $key ?>" data-live-search="true">
								<?php foreach ($kategori as $val): ?>
									<?php if ($var == $val['id_kategori']): ?>
										<option value="<?php echo $val['id_kategori'] ?>"><?php echo $val['nama_kategori'] ?></option>
									<?php endif ?>
								<?php endforeach ?>
								<?php foreach ($kategori as $val): ?>
									<option value="<?php echo $val['id_kategori'] ?>"><?php echo $val['nama_kategori'] ?></option>
								<?php endforeach ?>
							</select>
						</div>
					</div>
				<?php else: ?>
					<div class="col-8 col-md-6">
						<div class="form-group">
							<label><?php echo strtoupper(str_replace('_', ' ', $key)) ?></label>
							<input value="<?php echo $var ?>" type="text" id="<?php echo $key ?>" name="<?php echo $key ?>" class="form-control" autocomplete="off">
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
<div class="container">
	<form method="post" action="<?php echo base_url('kategori/crud_update/'.$daftar_kategori['id_kategori']) ?>">
		<div class="row">
			<?php foreach ($daftar_kategori as $key => $var): ?>
				<div class="col-md-8">
					<div class="form-group">
						<label><?php echo strtoupper(str_replace('_', ' ', $key)) ?></label>
						<input autocomplete="off" type="text" id="<?php echo $key ?>" name="<?php echo $key ?>" value="<?php echo $var ?>" class="form-control">
					</div>
				</div>
				<?php if ($key == 'id_kategori'): ?>
					<div class="col-md-4">
						<div id="check_berhasil" class="d-none alert alert-success" role="alert">
							<strong><i class="fa fa-check"></i></strong> id dapat digunakan.
						</div>
						<div id="check_gagal" class="d-none alert alert-danger" role="alert">
							<strong><i class="fa fa-times"></i></strong> id tidak dapat digunakan.
						</div>
						<div id="check_loading" class="d-none alert alert-warning" role="alert">
							<strong class="text-white"><i class="fa fa-spinner fa-spin"></i></strong> <span class="text-white"> loading.</span>
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
	$('#id_kategori').on('keyup', function(){
		$('#check_berhasil').addClass('d-none');
		$('#check_gagal').addClass('d-none');
		$('#check_loading').removeClass('d-none');
		$.get(('<?php echo base_url('kategori/check/') ?>' + $('#id_kategori').val()), function(data){
			if (data > 0) {
				$('#check_berhasil').addClass('d-none');
				$('#check_gagal').removeClass('d-none');
				$('#check_loading').addClass('d-none');
			} else {
				$('#check_berhasil').removeClass('d-none');
				$('#check_gagal').addClass('d-none');
				$('#check_loading').addClass('d-none');
			}
			if ($('#id_kategori').val() == '') {
				$('#check_berhasil').addClass('d-none');
				$('#check_gagal').addClass('d-none');
				$('#check_loading').addClass('d-none');
			}
		});
	});
</script>
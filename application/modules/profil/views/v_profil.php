<div class="continer">
	<form method="post" action="<?php echo base_url('profil/update') ?>">
		<div class="row">
			<?php foreach ($profil as $key => $var): ?>
				<div class="col-md-8">
					<div class="form-group">
						<label><?php echo strtoupper(str_replace('_', ' ', $key)) ?></label>
						<input type="text" id="<?php echo $key ?>" name="<?php echo $key ?>" value="<?php echo $var ?>" class="form-control" autocomplete="off">
					</div>
				</div>
			<?php endforeach ?>
		</div>
	<div><hr></div>
	<div class="d-block" align="center">
		<input type="reset" class="btn btn-danger">
		<button type="submit" class="btn btn-success">Simpan</button>
	</div>
	</form>
</div>
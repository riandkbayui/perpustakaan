<div class="container">
	<form method="post" action="<?php echo base_url('peminjaman/crud_tambah') ?>">
		<div class="row">
			<div class="col-md-7">
				<div class="form-group">
					<label>NAMA ANGGOTA</label>
					<select id="id_anggota" name="id_anggota" class="form-control" required="" data-live-search="true">
						<?php foreach ($anggota as $var): ?>
							<option value="<?php echo $var['id_anggota'] ?>"><?php echo $var['nama'] ?></option>
						<?php endforeach ?>
					</select>
				</div>
			</div>	
			<div class="col-md-7">
				<div class="form-group">
					<label>NAMA BUKU</label>
					<select id="id_buku" name="id_buku" class="form-control" required="" data-live-search="true">
						<?php foreach ($buku as $var): ?>
							<option value="<?php echo $var['id_buku'] ?>"><?php echo $var['judul_buku'] ?></option>
						<?php endforeach ?>
					</select>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label>TANGGAL PINJAM</label>
					<input type="date" name="tanggal_pinjam" id="tanggal_pinjam" value="<?php echo date('Y-m-d') ?>" class="form-control">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label>TANGGAL KEMBALI</label>
					<input type="date" name="tanggal_kembali" id="tanggal_kembali" value="<?php echo date('Y-m-d') ?>" class="form-control">
				</div>
			</div>
		</div>
		<div><hr></div>
		<div class="d-block" align="center">
			<input type="reset" class="btn btn-danger" value="Setel Ulang">
			<button type="submit" class="btn btn-success">Tambah Data</button>
		</div>
	</form>
</div>
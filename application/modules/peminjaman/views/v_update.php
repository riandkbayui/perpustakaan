<div class="container">
	<form method="post" action="<?php echo base_url('peminjaman/crud_update/'.$data_peminjaman->no) ?>">
		<div class="row">
			<div class="col-md-7">
				<div class="form-group">
					<label>NAMA ANGGOTA</label>
					<select id="id_anggota" name="id_anggota" class="form-control" required="" data-live-search="true">
						<option value="<?php echo $data_peminjaman->id_anggota ?>"><?php echo $data_peminjaman->nama ?></option>
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
							<option value="<?php echo $data_peminjaman->id_buku ?>"><?php echo $data_peminjaman->judul_buku ?></option>
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
					<input type="date" name="tanggal_pinjam" id="tanggal_pinjam" value="<?php echo date_format(date_create($data_peminjaman->tanggal_pinjam), 'Y-m-d') ?>" class="form-control">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label>TANGGAL KEMBALI</label>
					<input type="date" name="tanggal_kembali" id="tanggal_kembali" value="<?php echo date_format(date_create($data_peminjaman->tanggal_kembali), 'Y-m-d') ?>" class="form-control">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label>STATU PENGEMBALIAN</label>
					<select id="status" name="status" class="form-control" required="" data-live-search="true">
						<option value="<?php echo $data_peminjaman->id_status ?>"><?php echo $data_peminjaman->status ?></option>
						<option value="1">Dikembalikan</option>
						<option value="2">Dipinjam</option>
					</select>
				</div>
			</div>
		</div>
		<div><hr></div>
		<div class="d-block" align="center">
			<input type="reset" class="btn btn-danger" value="Setel Ulang">
			<button type="submit" class="btn btn-success">Simpan Data</button>
		</div>
	</form>
</div>
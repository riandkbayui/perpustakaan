<div class="container">
	<div class="d-block">
		<a class="btn btn-success" href="<?php echo base_url('peminjaman/tambah') ?>"><i class="fa fa-plus"></i> Tambah Peminjaman</a>
	</div>
	<?php if(!empty($this->session->flashdata('message'))): ?>
		<div class="mt-3">
			<div class="alert alert-success" role="alert">
				<?php echo $this->session->flashdata('message'); ?>
			</div>
		</div>
	<?php endif ?>
	<div class="pt-3"></div>
	<table class="table table-inverse mt-3">
		<thead>
			<tr>
				<?php foreach ($data_peminjaman[0] as $key => $var): ?>
					<th><?php echo strtoupper(str_replace('_', ' ', $key)) ?></th>
				<?php endforeach ?>
				<th>AKSI</th>
			</tr>
		</thead>
		<tbody>
			<?php $i = 1 ?>
			<?php foreach ($data_peminjaman as $key => $value): ?>
				<tr>
					<?php foreach ($value as $keys => $var): ?>
						<?php if (strpos($keys, 'anggal')): ?>
							<td><?php echo date_format(date_create($var), 'd-M-Y') ?></td>
						<?php elseif(strpos($keys, 'o')): ?>
							<td><?php echo $i ?></td>
						<?php elseif ($var == 'Dikembalikan'): ?>
							<td class="text-success"><?php echo $var ?></td>
						<?php elseif ($var == 'Dipinjam'): ?>
							<td class="text-danger"><?php echo $var ?></td>
						<?php else: ?>
							<td><?php echo $var ?></td>
						<?php endif ?>
					<?php endforeach ?>
					<td>
						<a href="<?php echo base_url('peminjaman/update/'.$value['no']) ?>" class="btn btn-success d-none" title="Edit data"><i class="fa fa-edit"></i></a>
						<?php if ($value['status'] != 'Dikembalikan'): ?>
							<button data-toggle="modal" data-target="#pengembalian_<?php echo $value['no'] ?>" class="btn btn-warning" title="Pengembalian buku"><i class="fa fa-check-square text-white"></i></button>
						<?php endif ?>
						<button data-toggle="modal" data-target="#<?php echo $value['no'] ?>" class="btn btn-danger d-none" title="Hapus data"><i class="fa fa-trash"></i></button>
					</td>
				</tr>
			<?php $i++ ?>
			<?php endforeach ?>
		</tbody>
	</table>
</div>
<?php foreach ($data_peminjaman as $var): ?>
	<!-- Modal -->
	<div class="modal fade" id="<?php echo $var['no'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalCenterTitle"><strong>PERINGATAN !</strong></h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <font>Hapus Data Pada Nama Peminjam <?php echo $var['nama'] ?></font>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
	        <a href="<?php echo base_url('peminjaman/crud_delete/'.$var['no']) ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
	      </div>
	    </div>
	  </div>
	</div>
<?php endforeach ?>
<?php foreach ($data_peminjaman as $var): ?>
	<!-- Modal -->
	<div class="modal fade" id="pengembalian_<?php echo $var['no'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalCenterTitle"><strong>PERINGATAN !</strong></h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <font>Buku <?php echo $var['judul_buku'] ?> Telah Dikembalikan oleh : <?php echo $var['nama'] ?> ?</font>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
	        <a href="<?php echo base_url('peminjaman/crud_pengembalian/'.$var['no']) ?>" class="btn btn-warning text-white"><i class="fa fa-usd text-white"></i> Dikembalikan</a>
	      </div>
	    </div>
	  </div>
	</div>
<?php endforeach ?>
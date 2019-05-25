<div class="container">
	<div class="d-block">
		<a class="btn btn-success" href="<?php echo base_url('kategori/tambah') ?>"><i class="fa fa-plus"></i> Tambah Kategori</a>
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
				<?php $i = 1 ?>
				<th>NO</th>
				<?php foreach ($field_kategori as $key): ?>
					<th><?php echo strtoupper(str_replace('_', ' ', $key)) ?></th>
				<?php endforeach ?>
				<th>AKSI</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($daftar_kategori as $val): ?>
				<tr>
					<td><?php echo $i ?></td>
					<?php foreach ($val as $var): ?>
						<td><?php echo $var ?></td>
					<?php endforeach ?>
					<td style="width: 100px">
						<a href="<?php echo base_url('kategori/update/'.$val['id_kategori']) ?>" class="btn btn-success" title="Edit data"><i class="fa fa-edit"></i></a>
						<button data-toggle="modal" data-target="#<?php echo $val['id_kategori'] ?>" class="btn btn-danger" title="Hapus data"><i class="fa fa-trash"></i></button>
					</td>
				</tr>
			<?php $i++ ?>
			<?php endforeach ?>
		</tbody>
	</table>
	<?php foreach ($daftar_kategori as $var): ?>
		<!-- Modal -->
		<div class="modal fade" id="<?php echo $var['id_kategori'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalCenterTitle"><strong>PERINGATAN !</strong></h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <font>Hapus kategori <?php echo $var['nama_kategori'] ?></font>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
		        <a href="<?php echo base_url('kategori/crud_delete/'.$var['id_kategori']) ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
		      </div>
		    </div>
		  </div>
		</div>
	<?php endforeach ?>
</div>
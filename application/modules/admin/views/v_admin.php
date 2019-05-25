<div class="container">
	<div class="d-block">
		<a class="btn btn-success" href="<?php echo base_url('admin/tambah') ?>"><i class="fa fa-plus"></i> Tambah Admin</a>
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
				<th>NO</th>
				<?php $i=1 ?>
				<?php unset($fields[1]) ?>
				<?php foreach ($fields as $key => $var): ?>
					<th><?php echo strtoupper(str_replace('_', ' ', $var)) ?></th>
				<?php endforeach ?>
				<th>AKSI</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($admin as $value): ?>
				<tr>
					<td><?php echo $i ?></td>
					<?php foreach ($value as $key => $var): ?>
						<td><?php echo $var ?></td>
					<?php endforeach ?>
					<td>
						<a href="<?php echo base_url('admin/update/'.$value['username']) ?>" class="btn btn-success" title="Edit data"><i class="fa fa-edit"></i></a>
						<button data-toggle="modal" data-target="#<?php echo $value['username'] ?>" class="btn btn-danger" title="Hapus data"><i class="fa fa-trash"></i></button>
					</td>
				</tr>
			<?php $i++ ?>
			<?php endforeach ?>
		</tbody>
	</table>
</div>
<?php foreach ($admin as $var): ?>
	<!-- Modal -->
	<div class="modal fade" id="<?php echo $var['username'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalCenterTitle"><strong>PERINGATAN !</strong></h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <font>Hapus admin <?php echo $var['nama'] ?></font>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
	        <a href="<?php echo base_url('admin/crud_delete/'.$var['username']) ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
	      </div>
	    </div>
	  </div>
	</div>
<?php endforeach ?>
<div class="container-fluid">
	<div class="alert alert-success" role="alert"><i class="fas fa-table"></i><strong> FORM EDIT JABATAN</strong></div>
<div class="row">
	<div class="col-md-6">
		
		<div class="card">
			<div class="card-body">
				<?php foreach ($jabatan as $key) : ?>
				<form method="POST" action="<?php echo base_url('admin/jabatan/update_jabatan_aksi') ?>">

				<div class="form-group">
					<label>Nama Jabatan</label>
					<input type="hidden" name="id_jabatan" value="<?php echo $key->id_jabatan ?>">
					<input type="text" name="nama_jabatan" value="<?php echo $key->nama_jabatan ?>" class="form-control" readonly>
					<?php echo form_error('nama_jabatan', '<div class="text-small text-danger">', '</div>') ?>
				</div>
				<div class="form-group">
					<label>Gaji Pokok</label>
					<input type="text" name="gaji_pokok" value="<?php echo $key->gaji_pokok ?>" class="form-control">
					<?php echo form_error('gaji_pokok', '<div class="text-small text-danger">', '</div>') ?>
				</div>
				<div class="form-group">
					<label>Uang Transport</label>
					<input type="text" name="uang_transport" value="<?php echo $key->uang_transport ?>" class="form-control">
					<?php echo form_error('uang_transport', '<div class="text-small text-danger">', '</div>') ?>
				</div>
				<div class="form-group">
					<label>Uang Makan</label>
					<input type="text" name="uang_makan" value="<?php echo $key->uang_makan ?>" class="form-control">
					<?php echo form_error('uang_makan', '<div class="text-small text-danger">', '</div>') ?>
				</div>
			</div>
			</div>

				<p class="text-right mt-4">
					<a href="<?php echo base_url('admin/jabatan') ?>" class="btn btn-secondary">Kembali</a>
					<button type="submit" class="btn btn-success">Simpan</button>
				</p>
			</form>
		<?php endforeach ?>
		</div>
	</div>
</div>
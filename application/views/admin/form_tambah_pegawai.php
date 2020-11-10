<div class="container-fluid">
	<div class="alert alert-success" role="alert"><i class="fas fa-users"></i><strong> FORM TAMBAH PEGAWAI</strong></div>
<div class="row">
	<div class="col-md-6">
	<div class="card">
		<div class="card-body">
			<form method="POST" action="<?php echo base_url('admin/pegawai/tambah_pegawai_aksi') ?>" enctype="multipart/form-data">
				<div class="form-group">
					<label>NIK</label>
					<input type="text" name="nik" class="form-control">
					<?php echo form_error('nik', '<div class="text-small text-danger">', '</div>') ?>
				</div>
				<div class="form-group">
					<label>Nama Pegawai</label>
					<input type="text" name="nama_pegawai" class="form-control">
					<?php echo form_error('nama_pegawai', '<div class="text-small text-danger">', '</div>') ?>
				</div>
				<div class="form-group">
					<label>Jenis Kelamin</label>
					<select name="jenis_kelamin" class="form-control">
						<option value="">--Pilih Jenis Kelamin--</option>
						<option value="Laki-laki">Laki-laki</option>
						<option value="Perempuan">Perempuan</option>
					</select>
					<?php echo form_error('jenis_kelamin', '<div class="text-small text-danger">', '</div>') ?>
				</div>
				<div class="form-group">
					<label>Jabatan</label>
					<select name="nama_jabatan" class="form-control">
						<option value="">--Pilih Jabatan--</option>
						<?php foreach ($jabatan as $key): ?>
							<option value="<?php echo $key->nama_jabatan ?>"><?php echo $key->nama_jabatan ?></option>
							
						<?php endforeach ?>
					</select>
					<?php echo form_error('nama_jabatan', '<div class="text-small text-danger">', '</div>') ?>
				</div>
				<div class="form-group">
					<label>Tanggal Masuk</label>
					<input type="date" name="tanggal_masuk" class="form-control">
					<?php echo form_error('tanggal_masuk', '<div class="text-small text-danger">', '</div>') ?>
				</div>
				<div class="form-group">
					<label>Status</label>
					<select name="status" class="form-control">
						<option value="">--Pilih Status--</option>
						<option value="Pegawai Tetap">Pegawai Tetap</option>
						<option value="Pegawai Tidak Tetap">Pegawai Tidak Tetap</option>
					</select>
					<?php echo form_error('status', '<div class="text-small text-danger">', '</div>') ?>
				</div>
				<div class="form-group">
					<label>Foto</label>
					<input type="file" name="foto" id="preview_gambar" class="form-control">
				</div>
				<div class="form-group">
					<img width="100" src="<?php echo base_url('assets/upload/no_foto.png') ?>" id="gambar_load">
				</div>
				<p class="text-right mt-4">
					<a href="<?php echo base_url('admin/pegawai') ?>" class="btn btn-secondary">Kembali</a>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</p>
			</form>
		</div>
	</div>
</div>
</div></div>
<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="alert alert-success" role="alert">
        <i class="fas fa-fw fa-users"></i><b>UPDATE DATA KEHADIRAN</b>

    </div>

<form method="POST" action="<?php echo base_url('admin/kehadiran/update_kehadiran_aksi') ?>">
<div class="card">
            <div class="card-body">
                 <div class="table-responsive">   	
                        <table class="table table-striped table-bordered first">
                            <thead>
                                <tr>
                                    <th class="text-gray-900" width="10px">No</th>
                                    <th class="text-gray-900">NIK</th>
                                    <th class="text-gray-900">Nama Pegawai</th>
                                    <th class="text-gray-900">Jenis Kelamin</th>
                                    <th class="text-gray-900">Nama Jabatan</th>
                                    <th class="text-gray-900" width="10%">Hadir</th>
                                    <th class="text-gray-900" width="10%">Sakit</th>
                                    <th class="text-gray-900" width="10%">Alpha</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($kehadiran as $key) :
                                ?>
                                    <tr>
                                    	<input type="hidden" name="id_kehadiran" value="<?php echo $key->id_kehadiran ?>">
                                    	<input type="hidden" name="bulan" value="<?php echo $key->bulan ?>">
                                    	<input type="hidden" name="nik" value="<?php echo $key->nik ?>">
                                    	<input type="hidden" name="nama_pegawai" value="<?php echo $key->nama_pegawai ?>">
                                    	<input type="hidden" name="jenis_kelamin" value="<?php echo $key->jenis_kelamin ?>">
                                    	<input type="hidden" name="nama_jabatan" value="<?php echo $key->nama_jabatan ?>">
                                        <td class="text-gray-800 small"><?= $no++; ?></td>
                                        <td class="text-gray-800 small"><?php echo $key->nik ?></td>
                                        <td class="text-gray-800 small"><?php echo $key->nama_pegawai ?></td>
                                        <td class="text-gray-800 small"><?php echo $key->jenis_kelamin ?></td>
                                        <td class="text-gray-800 small"><?php echo $key->nama_jabatan ?></td>
                                        <td class="text-gray-800 small"><input type="number" name="hadir" class="form-control" value="<?php echo $key->hadir ?>"></td>
                                        <td class="text-gray-800 small"><input type="number" name="sakit" class="form-control" value="<?php echo $key->sakit ?>"></td>
                                        <td class="text-gray-800 small"><input type="number" name="alpha" class="form-control" value="<?php echo $key->alpha ?>"></td>

                                    </tr>


                                <?php endforeach; ?>
                            </tbody>
                        </table>
			            <p class="text-right"><button type="submit" class="btn btn-primary mb-2">Simpan</button></p>
                    </div>
            </div>
        </div>
    </form>
</div>
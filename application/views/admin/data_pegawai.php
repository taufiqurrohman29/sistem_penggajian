<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="alert alert-success" role="alert">
        <i class="fas fa-fw fa-users"></i><b> DATA PEGAWAI</b>

    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    <div class="row">
                        <div class="col-sm-12">
                            <p class="text-left">
                                <a class="btn btn-sm btn-success" href="<?php echo base_url('admin/pegawai/tambah_pegawai') ?>">
                                    <span class="icon">
                                        <i class="fa fa-plus"></i>
                                    </span>

                                    Tambah Pegawai</a>
                            </p>
                        </div>
                    </div>
                    <?php echo $this->session->flashdata('pesan') ?>

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered first" id="example">
                            <thead>
                                <tr>
                                    <th class="text-gray-900" width="10px">No</th>
                                    <th class="text-gray-900">NIK</th>
                                    <th class="text-gray-900">Nama Pegawai</th>
                                    <th class="text-gray-900">Tanggal Masuk</th>
                                    <th class="text-gray-900">Foto</th>
                                    <th class="text-gray-900" width="80px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($pegawai as $key) :
                                ?>
                                    <tr>
                                        <td class="text-gray-800 small"><?= $no++; ?></td>
                                        <td class="text-gray-800 small"><?php echo $key->nik ?></td>
                                        <td class="text-gray-800 small"><?php echo $key->nama_pegawai ?></td>
                                        <td class="text-gray-800 small"><?php echo $key->tanggal_masuk ?></td>
                                        <td class="text-gray-800 small"><img width="50" src="<?php echo base_url('assets/upload/'.$key->foto) ?>"></td>

                                        <td>

                                            <a href="<?php echo base_url('admin/pegawai/update+pegawai/' . $key->id_pegawai) ?>" class="btn btn-warning btn-sm">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>
                                            <a onclick="return confirm('Yakin Hapus?')" href="<?php echo base_url('admin/pegawai/delete_pegawai/' . $key->id_pegawai) ?>" class="btn btn-danger btn-sm">
                                                <i class="far fa-trash-alt" onclick="return confirm('Yakin Ingin Menghapus?')"></i>
                                            </a>

                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
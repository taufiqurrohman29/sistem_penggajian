<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="alert alert-success" role="alert">
        <i class="fas fa-fw fa-user-circle"></i><b> <?= $title; ?></b>

    </div>
    

    <div class="card col-lg-7">
    <div class="card-header bg-success text-white mt-2">
    My Profile
    </div>
        <div class="card-body">



        <div class="row">
            <div class="col-md-3">
                <img src="<?php echo base_url('assets/upload/'.$pengguna['foto']) ?>" class="card-img">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <table>
                        <tr>
                        <td width="50%" class="text-gray-900">Nama</td>
                        <td width="10%">:</td>
                        <td class="text-gray-900"><?= $pengguna['nama_pegawai']; ?></td>
                    </tr>
                    <tr>
                        <td width="50%" class="text-gray-900">NIK</td>
                        <td width="10%">:</td>
                        <td class="text-gray-900"><?= $pengguna['nik']; ?></td>
                    </tr>
                    <tr>
                        <td class="text-gray-900">Jenis Kelamin</td>
                        <td>:</td>
                        <td class="text-gray-900"><?= $pengguna['jenis_kelamin']; ?></td>
                    </tr>
                    <tr>
                        <td class="text-gray-900">Pegawai Sejak</td>
                        <td>:</td>
                        <td class="text-gray-900"><?= $pengguna['tanggal_masuk']; ?></td>
                    </tr>
                    <tr>
                        <td class="text-gray-900">Status</td>
                        <td>:</td>
                        <td class="text-gray-900"><?= $pengguna['status']; ?></td>
                    </tr>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
    </div>

</div>
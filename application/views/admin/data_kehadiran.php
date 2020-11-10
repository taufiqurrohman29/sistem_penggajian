<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="alert alert-success" role="alert">
        <i class="fas fa-fw fa-users"></i><b> DATA KEHADIRAN</b>

    </div>
            <div class="card mb-3">
                <div class="card-header bg-success text-white">
                    Filter Kehadiran Pegawai
                </div>

                <?php echo $this->session->flashdata('pesan') ?>
                <div class="card-body">
                    <form class="form-inline">
                        <div class="form-group mb-2">
                            <label class="ml-3">Bulan :</label>
                            <select class="form-control mr-2" name="bulan">
                                <option value="">--Pilih Bulan--</option>
                                <option value="01">Januari</option>
                                <option value="02">Februari</option>
                                <option value="03">Maret</option>
                                <option value="04">April</option>
                                <option value="05">Mei</option>
                                <option value="06">Juni</option>
                                <option value="07">Juli</option>
                                <option value="08">Agustus</option>
                                <option value="09">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                        </div>

                        <!-- Menampilkan tahun dari 2020 sampai 5 tahun ke depan -->
                        <div class="form-group mb-2">
                            <label class="ml-3">Tahun :</label>
                            <select class="form-control mr-2" name="tahun">
                                <option value="">--Pilih Tahun--</option>
                                <?php $tahun = date('Y');
                                for($i=2020;$i<$tahun+5;$i++){?>
                                <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-sm btn-primary ml-auto"><i class="fas fa-eye"></i> Tampilkan Data</button>
                        <a href="<?php echo base_url('admin/kehadiran/input_kehadiran') ?>" class="btn btn-sm btn-success ml-2"><i class="fas fa-plus"></i> Input Kehadiran</a>
                         <a href="<?php echo base_url('admin/kehadiran/pdf') ?>" class="btn btn-sm btn-warning ml-2"><i class="fas fa-file"></i> Export PDF</a>
                        
                    </form>  
                </div>       
            </div>

            <!-- Set bulan dan tahun -->

            <?php

            if((isset($_GET['bulan']) && $_GET['bulan']!='') && (isset($_GET['tahun']) && $_GET['tahun']!='')){
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $bulantahun = $bulan.$tahun;
            }else{
                $bulan = date('m');
                $tahun = date('Y');
                $bulantahun = $bulan.$tahun;
            }
            ?>

        
        <!-- Menampilkan jumlah data kehadiran jika 0 maka tampil pesan -->

        <?php 
        if (count($kehadiran) > 0)
        { ?>
        <div class="card">
            <div class="card-body">
                 <div class="table-responsive">
                        <table class="table table-striped table-bordered first" id="example">
                            <thead>
                                <tr>
                                    <th class="text-gray-900" width="10px">No</th>
                                    <th class="text-gray-900">NIK</th>
                                    <th class="text-gray-900">Nama Pegawai</th>
                                    <th class="text-gray-900">Jenis Kelamin</th>
                                    <th class="text-gray-900">Nama Jabatan</th>
                                    <th class="text-gray-900">Hadir</th>
                                    <th class="text-gray-900">Sakit</th>
                                    <th class="text-gray-900">Alpha</th>
                                    <th class="text-gray-900">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($kehadiran as $key) :
                                ?>
                                    <tr>
                                        <td class="text-gray-800 small"><?= $no++; ?></td>
                                        <td class="text-gray-800 small"><?php echo $key->nik ?></td>
                                        <td class="text-gray-800 small"><?php echo $key->nama_pegawai ?></td>
                                        <td class="text-gray-800 small"><?php echo $key->jenis_kelamin ?></td>
                                        <td class="text-gray-800 small"><?php echo $key->nama_jabatan ?></td>
                                        <td class="text-gray-800 small"><?php echo $key->hadir ?></td>
                                        <td class="text-gray-800 small"><?php echo $key->sakit ?></td>
                                        <td class="text-gray-800 small"><?php echo $key->alpha ?></td>
                                        <td>

                                            <a href="<?php echo base_url('admin/kehadiran/update_kehadiran/' . $key->id_kehadiran) ?>" class="btn btn-warning btn-sm">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>
                                            <a onclick="return confirm('Yakin Hapus?')" href="<?php echo base_url('admin/kehadiran/delete_kehadiran/' . $key->id_kehadiran) ?>" class="btn btn-danger btn-sm">
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

    <?php }else{ ?>
        <center>
        <span class="badge badge-danger"><i class="fas fa-info-circle"></i> Data Masih Kosong Silahkan Input Data Kehadiran pada bulan dan tahun yang anda pilih</span></center>
    <?php } ?>
</div>
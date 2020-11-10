<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="alert alert-success" role="alert">
        <i class="fas fa-fw fa-users"></i><b> FORM KEHADIRAN PEGAWAI</b>

    </div>
            <div class="card mb-3">
                <div class="card-header bg-success text-white">
                    Input Kehadiran Pegawai
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

                        <button type="submit" class="btn btn-sm btn-primary ml-auto"><i class="fas fa-eye"></i> Generate</button>
                        
                    </form>  
                </div>       
            </div>

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

        <div class="alert alert-info">Menampilkan Data Kehadiran Bulan : <span class="font-weight-bold"><?php echo $bulan ?></span> Tahun : <span class="font-weight-bold"><?php echo $tahun ?></span>
        </div>

        <form method="POST">

        <div class="card">
            <div class="card-body">
                <p class="text-right">
                <button type="submit" name="submit" class="btn btn-sm btn-success mb-2" value="submit">Simpan</button></p>
                 <div class="table-responsive">
                        <table class="table table-striped table-bordered first" id="table_id">
                            <thead>
                                <tr>
                                    <th class="text-gray-900" width="100px">No</th>
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
                                foreach ($input_kehadiran as $key) :
                                ?>
                                    <tr>
                                        <input type="hidden" class="form-control" name="bulan[]" value="<?php echo $bulantahun ?>">
                                        <input type="hidden" class="form-control" name="nik[]" value="<?php echo $key->nik ?>">
                                        <input type="hidden" class="form-control" name="nama_pegawai[]" value="<?php echo $key->nama_pegawai ?>">
                                        <input type="hidden" class="form-control" name="jenis_kelamin[]" value="<?php echo $key->jenis_kelamin ?>">
                                        <input type="hidden" class="form-control" name="nama_jabatan[]" value="<?php echo $key->nama_jabatan ?>">
                                        <td class="text-gray-800 small"><?= $no++; ?></td>
                                        <td class="text-gray-800 small"><?php echo $key->nik ?></td>
                                        <td class="text-gray-800 small"><?php echo $key->nama_pegawai ?></td>
                                        <td class="text-gray-800 small"><?php echo $key->jenis_kelamin ?></td>
                                        <td class="text-gray-800 small"><?php echo $key->nama_jabatan ?></td>
                                        <td><input type="number" class="form-control" name="hadir[]" value="0"></td>
                                        <td><input type="number" class="form-control" name="sakit[]" value="0"></td>
                                        <td><input type="number" class="form-control" name="alpha[]" value="0"></td>

                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
        </form>
</div>
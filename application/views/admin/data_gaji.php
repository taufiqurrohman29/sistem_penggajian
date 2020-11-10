<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="alert alert-success" role="alert">
        <i class="fas fa-fw fa-users"></i><b> DATA GAJI PEGAWAI</b>

    </div>
            <div class="card mb-3">
                <div class="card-header bg-success text-white">
                    Filter Data Gaji Pegawai
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

                        
                        <button type="submit" class="btn btn-sm btn-primary ml-auto"><i class="fas fa-eye"></i> Tampilkan Data</button>
                        <?php if (count($gaji) > 0){ ?>
                        <a href="<?php echo base_url('admin/gaji/cetak_gaji/?bulan='.$bulan),'&tahun='.$tahun ?>" class="btn btn-sm btn-success ml-2"><i class="fas fa-print"></i> Cetak Daftar Gaji</a>
                        <?php }else{ ?>

                            
                        <?php } ?>
                        
                        
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

        <div class="alert alert-info">Menampilkan Data Kehadiran Bulan : <span class="font-weight-bold"><?php echo $bulan ?></span> Tahun : <span class="font-weight-bold"><?php echo $tahun ?></span>
        </div>

        <!-- Menampilkan jumlah data kehadiran jika 0 maka tampil pesan -->

       <?php 
       if (count($gaji) > 0)
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
                                    <th class="text-gray-900">Gaji Pokok</th>
                                    <th class="text-gray-900">Uang Transport</th>
                                    <th class="text-gray-900">Uang Makan</th>
                                    <th class="text-gray-900">Potongan</th>
                                    <th class="text-gray-900">Total Gaji</th>
                                    <th class="text-gray-900">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach ($potongan as $p) {
                                    $alpha = $p->jumlah_potongan;
                                } ?>

                                <?php
                                $no = 1;
                                foreach ($gaji as $key) :
                                ?>

                                <?php $potongan = $key->alpha * $alpha ?>
                                <?php $uang_makan = $key->uang_makan * $key->hadir ?>
                                    <tr>
                                        <td class="text-gray-800 small"><?= $no++; ?></td>
                                        <td class="text-gray-800 small"><?php echo $key->nik ?></td>
                                        <td class="text-gray-800 small"><?php echo $key->nama_pegawai ?></td>
                                        <td class="text-gray-800 small"><?php echo $key->jenis_kelamin ?></td>
                                        <td class="text-gray-800 small"><?php echo $key->nama_jabatan ?></td>
                                        <td class="text-gray-800 small"><?php echo number_format($key->gaji_pokok) ?></td>
                                        <td class="text-gray-800 small"><?php echo number_format($key->uang_transport) ?></td>
                                        <td class="text-gray-800 small"><?php echo number_format($uang_makan) ?></td>
                                        <td class="text-gray-800 small"><?php echo number_format($potongan) ?></td>
                                        <td class="text-gray-800 small"><?php echo number_format($key->gaji_pokok + $key->uang_transport + $uang_makan - $potongan) ?></td>
                                        <td>
                                            <a href="<?php echo base_url('admin/gaji/cetak_slip/' . $key->id_kehadiran) ?>" class="btn btn-success btn-sm">
                                                <i class="fa fa-print"></i> Slip
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
        <span class="badge badge-danger"><i class="fas fa-info-circle"></i> Data Kehadiran Kosong Silahkan Input Data Kehadiran pada bulan dan tahun yang anda pilih</span></center>
    <?php } ?>
</div>
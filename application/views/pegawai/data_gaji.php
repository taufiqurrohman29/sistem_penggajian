<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="alert alert-success" role="alert">
        <i class="fas fa-fw fa-users"></i><b> DATA GAJI PEGAWAI</b>

    </div>

        <div class="card">
            <div class="card-body">
                 <div class="table-responsive">
                        <table class="table table-striped table-bordered first">
                            <thead>
                                <tr>
                                    <th class="text-gray-900">Bulan/Tahun</th>
                                    <th class="text-gray-900">Gaji Pokok</th>
                                    <th class="text-gray-900">Uang Transport</th>
                                    <th class="text-gray-900">Uang Makan</th>
                                    <th class="text-gray-900">Potongan</th>
                                    <th class="text-gray-900">Total Gaji</th>
                                    <th class="text-gray-900">Cetak Slip</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach ($potongan as $p) {
                                    $alpha = $p->jumlah_potongan;
                                } ?>
                                <?php foreach ($gaji as $key) :
                                ?>

                                <?php $potongan = $key->alpha * $alpha ?>
                                <?php $uang_makan = $key->uang_makan * $key->hadir ?>
                                    <tr>
                                        <td class="text-gray-800 small"><?php echo $key->bulan ?></td>
                                        <td class="text-gray-800 small">Rp.<?php echo number_format($key->gaji_pokok) ?></td>
                                        <td class="text-gray-800 small">Rp.<?php echo number_format($key->uang_transport) ?></td>
                                        <td class="text-gray-800 small">Rp.<?php echo number_format($uang_makan) ?></td>
                                        <td class="text-gray-800 small">Rp.<?php echo number_format($potongan) ?></td>
                                        <td class="text-gray-800 small">Rp.<?php echo number_format($key->gaji_pokok + $key->uang_transport + $uang_makan - $potongan) ?></td>
                                        <td>
                                            <a href="<?php echo base_url('pegawai/gaji/cetak_slip/' . $key->id_kehadiran) ?>" class="btn btn-success btn-sm">
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
</div>
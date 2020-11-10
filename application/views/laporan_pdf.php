<!DOCTYPE html>
<html><head>
	<title></title>
</head><body>

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
	<table>
		<tr>
			<th class="text-gray-900" width="10px">No</th>
            <th class="text-gray-900">NIK</th>
            <th class="text-gray-900">Nama Pegawai</th>
            <th class="text-gray-900">Jenis Kelamin</th>
            <th class="text-gray-900">Nama Jabatan</th>
            <th class="text-gray-900">Hadir</th>
            <th class="text-gray-900">Sakit</th>
            <th class="text-gray-900">Alpha</th>
		</tr>

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
            </tr>
        <?php endforeach; ?>
	</table>

</body></html>
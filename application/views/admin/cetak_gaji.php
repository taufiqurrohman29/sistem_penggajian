<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title ?></title>
	<style type="text/css">
		body{
			font-family: Arial;
			color: black;
		}
	</style>
</head>
<body>

	<center>
		<h1>PT SENEPO TIMUR KUTOARJO</h1>
		<h2>DAFTAR GAJI PEGAWAI</h2>
	</center>

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

        <table>
        	<tr>
                <td>Bulan</td>
                <td>:</td>
                <td><?php if ($bulan == '1') {
                    echo "Januari";
                }elseif ($bulan == '2') {
                    echo "Februari"; 
                }elseif ($bulan == '3') {
                    echo "Maret"; 
                }elseif ($bulan == '4') {
                    echo "April"; 
                }elseif ($bulan == '5') {
                    echo "Mei"; 
                }elseif ($bulan == '6') {
                    echo "Juni"; 
                }elseif ($bulan == '7') {
                    echo "Juli";
                }elseif ($bulan == '8') {
                    echo "Agustus"; 
                }elseif ($bulan == '9') {
                    echo "September"; 
                }elseif ($bulan == '10') {
                    echo "Oktoboer"; 
                }elseif ($bulan == '11') {
                    echo "November"; 
                }elseif ($bulan == '12') {
                    echo "Desember"; 
                }else{ echo "";
                }?></td>
            </tr>
        	<tr>
        		<td>Tahun</td>
        		<td>:</td>
        		<td><?php echo $tahun ?></td>
        	</tr>
        </table>

        <table class="table table-striped table-bordered first mt-3" id="example">
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
                                    <th class="text-gray-900">Potongan</th>
                                    <th class="text-gray-900">Total Gaji</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach ($potongan as $p) {
                                    $alpha = $p->jumlah_potongan;
                                } ?>
                                <?php
                                $no = 1;
                                foreach ($cetak_gaji as $key) :
                                ?>

                                <?php $potongan = $key->alpha * $alpha ?>
                                <?php $uang_makan = $key->hadir * $key->uang_makan ?>
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
                                        

                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <br>
                        <table width="100%">
                        	<tr>
                        		<td></td>
                        		<td width="200px">
                        			<p>Purworejo, <?php echo date("d M Y") ?><br>HRD</p>
                        			<br><br><br>

                        			<p>_____________________</p>
                        		</td>
                        	</tr>
                        </table>

</body>
</html>
<script type="text/javascript">window.print()</script>
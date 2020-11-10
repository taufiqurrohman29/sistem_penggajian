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
        <h2>SLIP GAJI PEGAWAI</h2>
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
        <?php foreach ($potongan as $p) {
            $alpha = $p->jumlah_potongan;
        } ?>
        <?php
            $no = 1;
            foreach ($cetak_slip as $key) :
        ?>

        <?php $potongan = $key->alpha * $alpha ?>

        <table style="width: 100%">
            <tr>
                <td width="20%">Nama Pegawai</td>
                <td width="2%">:</td>
                <td><?php echo $key->nama_pegawai ?></td>
            </tr>
            <tr>
                <td>NIK</td>
                <td>:</td>
                <td><?php echo $key->nik ?></td>
            </tr>
            <tr>
                <td>Jabatan</td>
                <td>:</td>
                <td><?php echo $key->nama_jabatan ?></td>
            </tr>
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
                    echo "Oktober"; 
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

        <table class="table table-striped table-bordered mt-3">

            <tr>
                <th>No</th>
                <th>Keterangan</th>
                <th>Jumlah</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Gaji Pokok</td>
                <td><?php echo number_format($key->gaji_pokok) ?></td>
            </tr>

            <tr>
                <td>2</td>
                <td>Uang Transport</td>
                <td><?php echo number_format($key->uang_transport) ?></td>
            </tr>
            <tr>
                <td>3</td>
                <td>Uang Makan</td>
                <td><?php echo number_format($key->uang_makan) ?></td>
            </tr>
            <tr>
                <td>4</td>
                <td>Potongan</td>
                <td><?php echo number_format($potongan) ?></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center">Total Gaji</td>
                <td><?php echo number_format($key->gaji_pokok + $key->uang_transport + $key->uang_makan - $potongan) ?></td>
            </tr>
        </table>


    <?php endforeach; ?>

        
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
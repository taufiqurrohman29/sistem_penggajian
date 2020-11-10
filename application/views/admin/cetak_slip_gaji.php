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
    <b><hr></b>

        <?php foreach ($potongan as $p) {
            $alpha = $p->jumlah_potongan;
        } ?>
        <?php
            $no = 1;
            foreach ($cetak_slip as $key) :
        ?>

        <?php $potongan = $key->alpha * $alpha ?>
        <?php $uang_makan = $key->hadir * $key->uang_makan ?>

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
                <td><?php echo substr($key->bulan, 0,2)  ?></td>
            </tr>
            <tr>
                <td>Tahun</td>
                <td>:</td>
                <td><?php echo substr($key->bulan, 2,4)  ?></td>
            </tr>
            

        </table>

        <table class="table table-striped table-bordered mt-3">

            <tr>
                <th>No</th>
                <th>Keterangan</th>
                <th>Detail</th>
                <th>Jumlah</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Gaji Pokok</td>
                <td></td>
                <td><?php echo number_format($key->gaji_pokok) ?></td>
            </tr>

            <tr>
                <td>2</td>
                <td>Uang Transport</td>
                <td></td>
                <td><?php echo number_format($key->uang_transport) ?></td>
            </tr>
            <tr>
                <td>3</td>
                <td>Uang Makan</td>
                <td>Total Kehadiran : <?php echo $key->hadir ?><br>
                    Uang Makan/hari :<?php echo number_format($key->uang_makan) ?></td>
                <td><?php echo number_format($uang_makan) ?></td>
            </tr>
            <tr>
                <td>4</td>
                <td>Potongan</td>
                <td>Total Alpha : <?php echo $key->alpha ?><br>
                    Potongan/alpha :<?php echo number_format($p->jumlah_potongan) ?></td>
                <td><?php echo number_format($potongan) ?></td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: center">Total Gaji</td>
                <td><?php echo number_format($key->gaji_pokok + $key->uang_transport + $uang_makan - $potongan) ?></td>
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
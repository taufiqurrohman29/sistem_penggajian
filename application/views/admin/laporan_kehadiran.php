<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow-sm border-bottom-success">
            <div class="card-header bg-white py-3">
                <h4 class="h5 align-middle m-0 font-weight-bold text-success">
                    Form Laporan Kehadiran Pegawai
                </h4>
            </div>

            <form method="post" action="<?php echo base_url('admin/laporan_kehadiran/cetak_kehadiran')?>">
            <div class="card-body">
                <div class="row form-group">
                    <label class="col-lg-3 text-lg-right" for="tanggal">Bulan</label>
                    <div class="col-lg-5">
                        <div class="input-group">
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
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-lg-3 text-lg-right">Tahun</label>
                    <div class="col-lg-5">
                        <div class="input-group">
                            <select class="form-control mr-2" name="tahun">
                                <option value="">--Pilih Tahun--</option>
                                <?php $tahun = date('Y');
                                for($i=2020;$i<$tahun+5;$i++){?>
                                <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>


                <div class="row form-group">
                    <div class="col-lg-9 offset-lg-3">
                        <button type="submit" class="btn btn-sm btn-success"><i class="fas fa-print"></i> Cetak Laporan Kehadiran</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>


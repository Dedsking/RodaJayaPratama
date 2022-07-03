<!-- laporan harian -->
<div class="col-md-4">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Laporan Harian</h3>
        </div>
        <div class="card-body">

            <div class="row">
                <div class="col-sm-7">
                    <?php echo form_open('laporan/filter'); ?>
                    <input type="hidden" name="nilaifilter" value="1">
                    <div class="form-group">
                        <label>Tanggal Awal</label>
                        <input type="date" name="tanggalawal" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Akhir</label>
                        <input type="date" name="tanggalakhir" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-flat btn-primary"><i class="fas fa-print"></i> Print</button>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>

<!-- laporan bulanan -->
<div class="col-md-4">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Laporan Bulanan</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <?php echo form_open('laporan/filter'); ?>
                <input type="hidden" name="nilaifilter" value="2">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Tahun</label>
                        <select name="tahun1" class="form-control">
                            <?php foreach ($tahun as $value) : ?>
                                <option value="">
                                    <--Pilih Tahun-->
                                </option>
                                <option value="<?= $value->tahun ?> "><?= $value->tahun ?> </option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Bulan Awal</label>
                        <select name="bulanawal" class="form-control" required>
                            <!-- menampilkan bulan -->
                            <option value="">
                                <--Pilih Bulan-->
                            </option>
                            <option value="1">Januari</option>
                            <option value="2">Februari</option>
                            <option value="3">Maret</option>
                            <option value="4">April</option>
                            <option value="5">Mei</option>
                            <option value="6">Juni</option>
                            <option value="7">Juli</option>
                            <option value="8">Agustus</option>
                            <option value="9">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Bulan Akhir</label>
                        <select name="bulanakhir" class="form-control">
                            <!-- menampilkan bulan -->
                            <option value="">
                                <--Pilih Bulan-->
                            </option>
                            <option value="1">Januari</option>
                            <option value="2">Februari</option>
                            <option value="3">Maret</option>
                            <option value="4">April</option>
                            <option value="5">Mei</option>
                            <option value="6">Juni</option>
                            <option value="7">Juli</option>
                            <option value="8">Agustus</option>
                            <option value="9">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-flat btn-primary"><i class="fas fa-print"></i> Print</button>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>

<!-- laporan tahunan -->
<div class="col-md-4">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Laporan Tahunan</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <?php echo form_open('laporan/filter'); ?>
                <input type="hidden" name="nilaifilter" value="3">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Tahun</label>
                        <select name="tahun2" class="form-control">
                            <?php foreach ($tahun as $value) : ?>
                                <option value="">
                                    <--Pilih Tahun-->
                                </option>
                                <option value="<?= $value->tahun ?> "><?= $value->tahun ?> </option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-flat btn-primary"><i class="fas fa-print"></i> Print</button>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
<div class="col-md-12">
    <div class="invoice p-3 mb-3">
        <!-- title row -->
        <div class="row">
            <div class="col-12">
                <h4>
                    <i class="fas fa-shopping-cbart"></i> <?= $title ?>
                    <small class="float-right"> Bulan : <?= $bulan ?> Tahun : <?= $tahun ?></small>
                </h4>
            </div>
            <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
        </div>
        <!-- /.row -->
        <!-- Table row -->
        <div class="row">
            <div class="col-12 table-responsive">
                <table class="table  table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>No Order</th>
                            <th>Nama Barang</th>
                            <th>Tanggal</th>
                            <th>Qty</th>
                            <th>Harga Dasar</th>
                            <th>Harga Jual</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $total_dasar = 0;
                        $total_jual = 0;
                        $grand_total = 0;
                        $keuntungan = 0;
                        foreach ($lap_bulanan as $key => $value) {
                            $harga_untung = $value->harga * $value->p_keuntungan / 100;
                            $harga_jual = $value->harga + $harga_untung;
                            $harga_awal = $value->harga * $value->qty;
                            $harga_akhir = $harga_jual * $value->qty;

                            //harga total
                            $total_dasar = $total_dasar + $harga_awal;
                            $total_jual = $total_jual + $harga_akhir;
                            // $grand_total = $grand_total + $value->grand_total;
                            //keuntungan
                            $keuntungan = $total_jual - $total_dasar;
                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $value->no_order ?></td>
                                <td><?= $value->nama_barang ?></td>
                                <td><?= $value->tgl_order ?></td>
                                <td><?= $value->qty ?></td>
                                <td>Rp. <?= number_format($harga_awal) ?></td>
                                <td>Rp. <?= number_format($harga_akhir) ?></td>

                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <div class="float-right">

                    <H4>Total Dasar : Rp. <?= number_format($total_dasar) ?></H4> <br>
                    <H4>Total Jual : Rp. <?= number_format($total_jual) ?></H4><br>
                    <H4>Keuntungan : Rp. <?= number_format($keuntungan) ?></H4>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <!-- this row will not appear when printing -->
        <div class="row no-print">
            <div class="col-12">
                <a href="<?= base_url('laporan') ?>" class="btn btn-success"><i></i> Kembali</a>
                <button class="btn btn-default" onclick="window.print()"><i class="fas fa-print"></i> Print</button>
            </div>
        </div>
    </div>
    <!-- /.invoice -->
    </><!-- /.col -->
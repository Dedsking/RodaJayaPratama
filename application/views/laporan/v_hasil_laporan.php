<div class="col-md-12">
    <!-- title row -->
    <div class="row">
        <div class="col-8">
            <h4> <?= $title; ?> </h4>
        </div>
        <div class="col-4" class="float-right">
            <?= $subtitle ?>
        </div>
        <!-- /.col -->
    </div>
    <!-- Table row -->
    <div class="row">
        <div class="col-12 table-responsive">
            <table class="table table-bordered" id="example1">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>No Order</th>
                        <th>Item</th>
                        <th>Qty</th>
                        <th>Total Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $grand_total = 0;
                    foreach ($datafilter as $key => $value) {
                        // $h = $value->harga * $value->p_keuntungan / 100;
                        // $harga = $value->harga + $h;
                        // $tot_harga = $value->qty * $harga;
                        $grand_total = $grand_total + $value->jml_harga;
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $value->no_order ?></td>
                            <td><?= $value->jml_item ?></td>
                            <td><?= $value->jml_qty ?></td>
                            <td> Rp. <?= number_format($value->jml_harga) ?> <button class="btn btn-sm float-right" data-toggle="modal" data-target="#cek<?= $value->id_transaksi ?>"><i class="fas fa-info-circle"> </i></button></td>
                        </tr>
                    <?php } ?>
                    <tr>
                        <td colspan="4"><b>Grand Total :</b></td>
                        <td>
                            <b> Rp. <?= number_format($grand_total); ?></b></h3>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    <!-- this row will not appear when printing -->
    <div class="row no-print">
        <div class="col-12">
            <a href="<?= base_url('laporan') ?>" class="btn btn-default"><i class="fas fa-backward"></i> Kembali</a>
            <button class="btn btn-default" onclick="window.print()"><i class="fas fa-print"></i> Print</button>
        </div>
    </div>
    <br>
    <br>
    <!-- /.invoice -->
    </><!-- /.col -->
</div>

<!-- modal cek barang -->
<?php foreach ($datafilter as $key => $value) { ?>
    <div class="modal fade" id="cek<?= $value->id_transaksi ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?= $value->no_order ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <tr>
                            <th>Nama</th>
                            <th>:</th>
                            <th><?= $value->nama_penerima ?></th>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <th>:</th>
                            <th><?= $value->alamat ?></th>
                        </tr>
                        <tr>
                            <th>No Tlp</th>
                            <th>:</th>
                            <th><?= $value->hp_penerima ?></th>
                        </tr>
                        <tr>
                            <th>Total Bayar</th>
                            <th>:</th>
                            <th>Rp. <?= number_format($value->grand_total, 0) ?></th>
                        </tr>
                    </table>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Barang</th>
                                <th>Qty</th>
                                <th>Harga</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody id="target">
                            <?php
                            $no = 1;
                            $grand_total = 0;
                            $id_transaksi = $value->id_transaksi;
                            $datacek = $this->m_laporan->cek($id_transaksi);
                            foreach ($datacek as $key) {
                                $subtotal = $key->harga_jual * $key->qty;
                                $grand_total = $grand_total + $value->jml_harga;
                            ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $key->nama_barang ?></td>
                                    <td><?= $key->qty ?></td>
                                    <td>Rp. <?= number_format($key->harga_jual) ?></td>
                                    <td>Rp. <?= number_format($subtotal) ?></td>
                                </tr>
                            <?php } ?>
                            <tr>
                                <td colspan="4"> Total </td>
                                <td>Rp. <?= number_format($value->jml_harga) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php } ?>

<!--  -->
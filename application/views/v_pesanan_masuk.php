<div class="col-sm-12">
    <?php
    if ($this->session->flashdata('pesan')) {
        echo '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i> Alert!</h5>';
        echo $this->session->flashdata('pesan');
        echo '</div>';
    }
    ?>
    <div class="card card-primary card-outline card-outline-tabs">
        <div class="card-header p-0 border-bottom-0">
            <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Pesanan Masuk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Di Proses</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill" href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">Di Kirim</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-settings-tab" data-toggle="pill" href="#custom-tabs-four-settings" role="tab" aria-controls="custom-tabs-four-settings" aria-selected="false">Selesai</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content" id="custom-tabs-four-tabContent">
                <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                    <!-- pesanan masuk -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No Order</th>
                                <th>Nama</th>
                                <th>Tanggal</th>
                                <th>Expedisi</th>
                                <th>Total Bayar</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($pesanan as $key => $value) { ?>
                                <tr>
                                    <td><?= $value->no_order ?></td>
                                    <td><?= $value->nama_penerima ?></td>
                                    <td><?= $value->tgl_order ?></td>
                                    <td><b><?= $value->expedisi ?></b><br>
                                        Paket : <?= $value->paket ?><br>
                                        Ongkir : Rp. <?= number_format($value->ongkir) ?>
                                    </td>
                                    <td><b>Rp. <?= number_format($value->total_bayar, 0) ?></b><br>
                                        <?php if ($value->status_bayar == 0) { ?>
                                            <span class="badge badge-warning">Belum Bayar</span>
                                        <?php } else { ?>
                                            <span class="badge badge-success">Sudah Bayar</span><br>
                                            <span class="badge badge-primary">Menunggu Verifikasi</span>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <?php if ($value->status_bayar == 1) { ?>
                                            <button class="btn btn-sm btn-flat btn-success" data-toggle="modal" data-target="#cek<?= $value->id_transaksi ?>">Cek Bukti Bayar</button>
                                            <a href="<?= base_url('admin/proses/' . $value->id_transaksi) ?>" class="btn btn-sm btn-flat btn-primary">Proses</a>
                                        <?php } ?>

                                    </td>

                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                    <!-- proses/verifikasi -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No Order</th>
                                <th>Nama</th>
                                <th>Tanggal</th>
                                <th>Expedisi</th>
                                <th>Total Bayar</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($pesanan_diproses as $key => $value) { ?>
                                <tr>
                                    <td><?= $value->no_order ?></td>
                                    <td><?= $value->nama_penerima ?></td>
                                    <td><?= $value->tgl_order ?></td>
                                    <td><b><?= $value->expedisi ?></b><br>
                                        Paket : <?= $value->paket ?><br>
                                        Ongkir : Rp. <?= number_format($value->ongkir) ?>
                                    </td>
                                    <td><b>Rp. <?= number_format($value->total_bayar, 0) ?></b><br>
                                        <span class="badge badge-primary">Diproses/Dikemas</span>
                                    </td>
                                    <td>
                                        <a href="<?= base_url('admin/cetak_alamat/' . $value->id_transaksi) ?>" target="_blank" class="btn btn-sm btn-flat btn-info"> <i class="fa fa-home"></i> alamat</a>
                                        <?php if ($value->status_bayar == 1) { ?>
                                            <button class="btn btn-sm btn-flat btn-primary" data-toggle="modal" data-target="#kirim<?= $value->id_transaksi ?>"><i class="fas fa-paper-plane"></i> Kirim</button>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel" aria-labelledby="custom-tabs-four-messages-tab">
                    <!-- dikirim -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No Order</th>
                                <th>Nama</th>
                                <th>Tanggal</th>
                                <th>Expedisi</th>
                                <th>Total Bayar</th>
                                <th>No Resi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($pesanan_dikirim as $key => $value) { ?>
                                <tr>
                                    <td><?= $value->no_order ?></td>
                                    <td><?= $value->nama_penerima ?></td>
                                    <td><?= $value->tgl_order ?></td>
                                    <td><b><?= $value->expedisi ?></b><br>
                                        Paket : <?= $value->paket ?><br>
                                        Ongkir : Rp. <?= number_format($value->ongkir) ?><br>
                                        Estimasi : <?= $value->estimasi ?>
                                    </td>
                                    <td><b>Rp. <?= number_format($value->total_bayar, 0) ?></b><br>
                                        <span class="badge badge-success">Dikirim</span>
                                    </td>
                                    <td><b><?= $value->no_resi ?></b></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="custom-tabs-four-settings" role="tabpanel" aria-labelledby="custom-tabs-four-settings-tab">
                    <!-- pesanan selesai -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No Order</th>
                                <th>Nama</th>
                                <th>Tanggal</th>
                                <th>Expedisi</th>
                                <th>Total Bayar</th>
                                <th>No Resi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($pesanan_selesai as $key => $value) { ?>
                                <tr>
                                    <td><?= $value->no_order ?></td>
                                    <td><?= $value->nama_penerima ?></td>
                                    <td><?= $value->tgl_order ?></td>
                                    <td><b><?= $value->expedisi ?></b><br>
                                        Paket : <?= $value->paket ?><br>
                                        Ongkir : Rp. <?= number_format($value->ongkir) ?>
                                    </td>
                                    <td><b>Rp. <?= number_format($value->total_bayar, 0) ?></b><br>
                                        <span class="badge badge-success">Diterima</span>
                                    </td>
                                    <td><b><?= $value->no_resi ?></b><br>
                                        <button class="btn btn-primary btn-xs btn-flat" data-toggle="modal" data-target="#cek<?= $value->no_order ?>">cek</button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.card -->
    </div>
</div>
</div>

<!-- modal cek bukti pembayaran -->
<?php foreach ($pesanan as $key => $value) { ?>
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
                            <th>Nama Bank</th>
                            <th>:</th>
                            <th><?= $value->nama_bank ?></th>
                        </tr>
                        <tr>
                            <th>No Rekening</th>
                            <th>:</th>
                            <th><?= $value->no_rek ?></th>
                        </tr>
                        <tr>
                            <th>Atas Nama</th>
                            <th>:</th>
                            <th><?= $value->atas_nama ?></th>
                        </tr>
                        <tr>
                            <th>Total Bayar</th>
                            <th>:</th>
                            <th>Rp. <?= number_format($value->total_bayar, 0) ?></th>
                        </tr>
                    </table>
                    <img class="img-fluid pad" src="<?= base_url('assets/bukti_bayar/' . $value->bukti_bayar) ?>" alt="">
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php } ?>
<!-- /.modal -->

<!-- modal kirim pesanan -->
<?php foreach ($pesanan_diproses as $key => $value) { ?>
    <div class="modal fade" id="kirim<?= $value->id_transaksi ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?= $value->no_order ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo form_open('admin/kirim/' . $value->id_transaksi); ?>
                    <table class="table">
                        <tr>
                            <th>Nama Penerima</th>
                            <th>:</th>
                            <th><?= $value->nama_penerima ?></th>
                        </tr>
                        <tr>
                            <th>Expedisi</th>
                            <th>:</th>
                            <th><?= $value->expedisi ?></th>
                        </tr>
                        <tr>
                            <th>Paket</th>
                            <th>:</th>
                            <th><?= $value->paket ?></th>
                        </tr>
                        <tr>
                            <th>Ongkir</th>
                            <th>:</th>
                            <th>Rp. <?= number_format($value->ongkir, 0) ?></th>
                        </tr>
                        <tr>
                            <th>Resi</th>
                            <th>:</th>
                            <th><input name="no_resi" class="form-control" placeholder="No Resi..." required></th>
                        </tr>

                    </table>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
                <?php echo form_close(); ?>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php } ?>

<!-- modal cetak alamat -->
<?php foreach ($pesanan_diproses as $key => $value) { ?>
    <div class="modal fade" id="alamat<?= $value->id_transaksi ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?= $value->no_order ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo form_open('admin/kirim/' . $value->id_transaksi); ?>
                    <table class="table">
                        <tr>
                            <th>Nama Penerima</th>
                            <th>:</th>
                            <th><?= $value->nama_penerima ?></th>
                        </tr>
                        <tr>
                            <th>Alamat </th>
                            <th>:</th>
                            <th><?= $value->alamat; ?><br>
                                <?= $value->provinsi; ?><br>
                                <?= $value->kota; ?>
                            </th>
                        </tr>
                        <tr>
                            <th>Expedisi</th>
                            <th>:</th>
                            <th><?= $value->expedisi ?></th>
                        </tr>
                        <tr>
                            <th>Paket</th>
                            <th>:</th>
                            <th><?= $value->paket ?></th>
                        </tr>
                        <tr>
                            <th>Ongkir</th>
                            <th>:</th>
                            <th>Rp. <?= number_format($value->ongkir, 0) ?></th>
                        </tr>

                    </table>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" onclick="window.print()" class="btn btn-primary">Print</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php } ?>

<!-- cek barang selesai -->

<?php foreach ($pesanan_selesai as $key => $value) { ?>
    <div class="modal fade" id="cek<?= $value->no_order ?>">
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
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($cek_barang_selesai as $key) {
                                if ($key->no_order == $value->no_order) {
                                    // menghitung harga total
                                    $harga_untung = $key->harga * $key->p_keuntungan / 100;
                                    $harga_jual = $key->harga + $harga_untung;
                                    $total = $harga_jual * $key->qty;
                            ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $key->nama_barang ?></td>
                                        <td><?= $key->qty ?></td>
                                        <td><?= number_format($total) ?></td>
                                    </tr>
                            <?php }
                            } ?>
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
<div class="row">
    <div class="col-sm-12 col-sm-6">
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
                        <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Pesanan</a>
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
                        <!-- pesanan saya -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No Order</th>
                                    <th>Tanggal</th>
                                    <th>Expedisi</th>
                                    <th>Total Bayar</th>
                                    <th>Jangka Bayar</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($belum_bayar as $key => $value) {

                                    $tgl_now = date("Y-m-d H:i");
                                    $tgl_mulai = $value->tgl_order;
                                    $jangka_waktu = strtotime('+24 hours', strtotime($tgl_mulai));
                                    $tgl_exp = date("Y-m-d (H:i)", $jangka_waktu);
                                ?>

                                    <tr>
                                        <td><?= $value->no_order ?></td>
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
                                        <td><?php if ($tgl_now >= $tgl_exp) {
                                                $data = array('id_transaksi' => $value->id_transaksi);
                                                $this->m_transaksi->failed($data);
                                            } else {
                                                echo $tgl_exp;
                                            }

                                            ?>
                                        </td>
                                        <td>
                                            <?php if ($value->status_bayar == 0) { ?>
                                                <!-- midtrans -->
                                                <!-- <button id="pay-button" class="btn btn-sm btn-flat btn-primary" data-no_order="<?= $value->no_order ?>" data-grand_total="<?= $value->grand_total ?>">Bayar!</button> -->

                                                <!-- manual -->
                                                <a href="<?= base_url('pesanan_saya/bayar/' . $value->id_transaksi) ?>" class="btn btn-sm btn-flat btn-primary">Bayar</a>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No Order</th>
                                    <th>Tanggal</th>
                                    <th>Expedisi</th>
                                    <th>Total Bayar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($diproses as $key => $value) { ?>
                                    <tr>
                                        <td><?= $value->no_order ?></td>
                                        <td><?= $value->tgl_order ?></td>
                                        <td><b><?= $value->expedisi ?></b><br>
                                            Paket : <?= $value->paket ?><br>
                                            Ongkir : Rp. <?= number_format($value->ongkir) ?>
                                        </td>
                                        <td><b>Rp. <?= number_format($value->total_bayar, 0) ?></b><br>
                                            <span class="badge badge-success">Terverifikasi</span><br>
                                            <span class="badge badge-primary">Diproses/dikemas</span>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel" aria-labelledby="custom-tabs-four-messages-tab">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No Order</th>
                                    <th>Tanggal</th>
                                    <th>Expedisi</th>
                                    <th>Total Bayar</th>
                                    <th>No Resi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($dikirim as $key => $value) { ?>
                                    <tr>
                                        <td><?= $value->no_order ?> </td>
                                        <td><?= $value->tgl_order ?></td>
                                        <td><b><?= $value->expedisi ?></b><br>
                                            Paket : <?= $value->paket ?><br>
                                            Ongkir : Rp. <?= number_format($value->ongkir) ?><br>
                                            Estimasi : <?= $value->estimasi ?>
                                        </td>
                                        <td><b>Rp. <?= number_format($value->total_bayar, 0) ?></b><br>
                                            <span class="badge badge-success">Dikirim</span><br>
                                        </td>
                                        <td><b><?= $value->no_resi ?></b><br>
                                            <button class="btn btn-primary btn-xs btn-flat" data-toggle="modal" data-target="#cek<?= $value->no_order ?>">Cek</button>
                                            <button class="btn btn-info btn-xs btn-flat" data-toggle="modal" data-target="#diterima<?= $value->id_transaksi ?>">Diterima</button>
                                            <button class="btn btn-danger btn-xs btn-flat" data-toggle="modal" data-target="#diterimat<?= $value->id_transaksi ?>">Cacat</button>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-four-settings" role="tabpanel" aria-labelledby="custom-tabs-four-settings-tab">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No Order</th>
                                    <th>Tanggal</th>
                                    <th>Expedisi</th>
                                    <th>Total Bayar</th>
                                    <th>No Resi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($selesai as $key => $value) { ?>
                                    <tr>
                                        <td><?= $value->no_order ?></td>
                                        <td><?= $value->tgl_order ?></td>
                                        <td><b><?= $value->expedisi ?></b><br>
                                            Paket : <?= $value->paket ?><br>
                                            Ongkir : Rp. <?= number_format($value->ongkir) ?><br>

                                        </td>
                                        <td><b>Rp. <?= number_format($value->total_bayar, 0) ?></b><br>
                                            <span class="badge badge-success">Selesai</span><br>
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
</div>

<!-- modal cek barang pesanan -->
<?php foreach ($dikirim as $key => $value) { ?>
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
                            foreach ($cek_barang as $key) {
                                if ($key->no_order == $value->no_order) {
                                    //menghitung harga total
                                    $harga_untung = $key->harga * $key->p_keuntungan / 100;
                                    $harga_jual = $key->harga + $harga_untung;
                                    $total = $harga_jual * $key->qty;
                            ?>
                                    <tr>
                                        <td><?= $no++ ?><br>

                                        </td>
                                        <td><?= $key->nama_barang ?></td>
                                        <td><?= $key->qty ?></td>
                                        <td><?= number_format($total, 0) ?></td>

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

<!-- cek barang selesai kirim -->

<?php foreach ($selesai as $key => $value) { ?>
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
                                    //menghitung harga total
                                    $harga_untung = $key->harga * $key->p_keuntungan / 100;
                                    $harga_jual = $key->harga + $harga_untung;
                                    $total = $harga_jual * $key->qty;
                            ?>
                                    <tr>
                                        <td><?= $no++ ?><br>

                                        </td>
                                        <td><?= $key->nama_barang ?></td>
                                        <td><?= $key->qty ?></td>
                                        <td><?= number_format($total, 0) ?></td>

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


<!-- modal pesanan diterima-->
<?php foreach ($dikirim as $key => $value) { ?>
    <div class="modal fade" id="diterima<?= $value->id_transaksi ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Pesanan Diterima</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah anda yakin pesanan telah diterima ..?
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                    <a href="<?= base_url('pesanan_saya/diterima/' . $value->id_transaksi) ?>" class="btn btn-primary">Ya</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php } ?>
<!-- modal pesanan diterima-->
<?php foreach ($dikirim as $key => $value) { ?>
    <div class="modal fade" id="diterimat<?= $value->id_transaksi ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Pesanan Diterima</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label for="">Keluhan</label>
                    <input type="text" class="form-control">
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                    <a href="<?= base_url('pesanan_saya/diterima/' . $value->id_transaksi) ?>" class="btn btn-primary">Ya</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php } ?>

<!-- midtrans -->

<!-- 
<form id="payment-form" method="post" action="<?= site_url() ?>/snap/finish">
    <input type="hidden" name="result_type" id="result-type" value="">
    <input type="hidden" name="result_data" id="result-data" value="">
</form>
<script type="text/javascript">
    $('#pay-button').click(function(event) {
        var no_order = $(this).data('no_order');
        event.preventDefault();
        $(this).attr("disabled", "disabled");

        $.ajax({
            url: '<?= base_url() ?>snap/token',
            cache: false,
            data: {
                no_order: no_order
            },

            success: function(data) {
                //location = data;

                console.log('token = ' + data);

                var resultType = document.getElementById('result-type');
                var resultData = document.getElementById('result-data');

                function changeResult(type, data) {
                    $("#result-type").val(type);
                    $("#result-data").val(JSON.stringify(data));
                    //resultType.innerHTML = type;
                    //resultData.innerHTML = JSON.stringify(data);
                }

                snap.pay(data, {

                    onSuccess: function(result) {
                        changeResult('success', result);
                        console.log(result.status_message);
                        console.log(result);
                        $("#payment-form").submit();
                    },
                    onPending: function(result) {
                        changeResult('pending', result);
                        console.log(result.status_message);
                        $("#payment-form").submit();
                    },
                    onError: function(result) {
                        changeResult('error', result);
                        console.log(result.status_message);
                        $("#payment-form").submit();
                    }
                });
            }
        });
    });
</script> -->
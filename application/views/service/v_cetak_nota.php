<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url() ?>templates/plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url() ?>templates/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>templates/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?= base_url() ?>templates/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>templates/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>templates/dist/css/adminlte.min.css">
    <!-- select2 -->
    <title><?= $title ?></title>
</head>

<body onload="window.print()">
    <div class="invoice p-3 mb-3">
        <!-- title row -->
        <div class="row">
            <div class="col-12">
                <h2 style="text-align:center">Roda Jaya Pratama</h2>
                <h4>
                    Nota Pembelian
                    <small class="float-right">Tanggal: <?= date('d-M-Y'); ?></small>
                </h4>
            </div>
            <!-- /.col -->
        </div>

        <!-- Table row -->
        <div class="row">
            <div class="col-12 table-responsive">

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Barang</th>
                            <th>Harga</th>
                            <th>Qty</th>
                            <th>Total Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $servis = 50000;
                        $grand_total = 0;
                        foreach ($cetak_nota as $key => $value) {
                            $harga_untung = $value->harga * $value->p_keuntungan / 100;
                            $harga_jual = $value->harga + $harga_untung;
                            $subtotal = $harga_jual * $value->qty;
                            $grand_total = $grand_total + $subtotal;
                            $total_bayar = $grand_total + $servis;
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $value->nama_barang ?> </td>
                                <td>Rp. <?= number_format($harga_jual, 0) ?> </td>
                                <td><?= $value->qty ?> </td>
                                <td>Rp.<?= number_format($subtotal, 0) ?> </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="row">
            <!-- accepted payments column -->
            <div class="col-sm-8 invoice-col">
            </div>
            <!-- /.col -->
            <div class="col-4">
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th style="width:50%">Grand Total:</th>
                            <th>Rp. <?= number_format($grand_total, 0) ?></th>
                        </tr>
                        <tr>
                            <th>Servis:</th>
                            <th>Rp. <?= number_format($servis, 0) ?></th>
                        </tr>
                        <tr>
                            <th>Total Bayar:</th>
                            <th>Rp. <?= number_format($total_bayar, 0) ?></th>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <p>Tangerang Selatan, <?= date('d-M-Y') ?></p>

                                <br>
                                <br><br>
                                <p>Roda Jaya Pratama</p>
                            </td>

                        </tr>
                    </table>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
</body>

</html>
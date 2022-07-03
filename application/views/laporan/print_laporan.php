<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>

    <link rel="stylesheet" href="<?= base_url() ?>templates/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>templates/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?= base_url() ?>templates/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>templates/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>templates/dist/css/adminlte.min.css">
</head>

<body>
    <div class="col-md-12">
        <div>
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
            <!-- info row -->
            <div class="row">
            </div>
            <!-- /.row -->
            <!-- Table row -->
            <div class="row">
                <div class="col-12 table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>No Order</th>
                                <th>Item</th>
                                <th>Qty</th>
                                <th>Total Harga</th>
                                <th>Action</th>
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
                                    <td> Rp. <?= number_format($value->jml_harga) ?></td>
                                    <td><button class="btn btn-xs btn-info" data-toggle="modal" data-target="#cek<?= $value->id_transaksi ?>">Detail</button></td>
                                </tr>

                            <?php } ?>
                            <tr>
                                <td colspan="4"><b>Grand Total :</b></td>
                                <td>
                                    <b> Rp. <?= number_format($grand_total); ?></b></h3>
                                </td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            <!-- this row will not appear when printing -->
        </div>
        <!-- /.invoice -->
        </><!-- /.col -->
    </div>
</body>

</html>
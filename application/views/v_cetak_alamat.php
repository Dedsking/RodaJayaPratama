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
    <div class="row">
        <div class="col-sm-6">
            <div class="modal-content">
                <?php foreach ($cetak_alamat as $key => $value) { ?>
                    <div class="modal-header">
                        <h4 class="modal-title"><?= $value->no_order ?></h4>
                    </div>
                    <div class="modal-body">
                        <table class="table table-bordered">
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
                <?php } ?>
            </div>
        </div>
    </div>
</body>

</html>
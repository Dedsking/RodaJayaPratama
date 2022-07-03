<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Toko Roda Jaya Pratama | <?= $title; ?></title>

    <!-- daterange picker -->
    <!-- <link rel="stylesheet" href="<?= base_url() ?>templates/plugins/daterangepicker/daterangepicker.css"> -->
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
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
    <link rel="stylesheet" href="<?= base_url() ?>templates/plugins/select2/css/select2.min.css">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
    <!-- Select2 -->
    <link rel="stylesheet" href="<?= base_url() ?>templates/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>templates/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" /> -->

    <!-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript">
        var refreshmasuk = setInterval(function() {
            $('#load-pesananmasuk').load('http://localhost:8080/Olshop/admin/data_masuk');
        }, 500);
    </script>
    <script type="text/javascript">
        var refreshbayar = setInterval(function() {
            $('#load-pesananbayar').load('http://localhost:8080/Olshop/admin/data_bayar');
        }, 500);
    </script>

</head>
<!-- Midtrans -->
<!-- <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-AOtJbJjVoxHOwXYX"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> -->
<!-- date-range-picker -->
<!-- <script src="<?= base_url() ?>templates/plugins/daterangepicker/daterangepicker.js"></script> -->

<!-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> -->
<!-- jQuery -->

<!-- select2 -->

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script> -->

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="<?= base_url() ?>templates/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>templates/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?= base_url() ?>templates/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>templates/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>templates/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>templates/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>templates/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url() ?>templates/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>templates/plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url() ?>templates/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url() ?>templates/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url() ?>templates/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url() ?>templates/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url() ?>templates/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>templates/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url() ?>templates/dist/js/demo.js"></script>
<!-- Page specific script -->

<!-- jquery -->
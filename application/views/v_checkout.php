<!-- Main content -->
<div class="invoice p-3 mb-3">
    <!-- title row -->
    <div class="row">
        <div class="col-12">
            <h4>
                <i class="fas fa-shopping-cart"></i> Check Out
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
                        <th>Barang</th>
                        <th>Harga</th>
                        <th>Qty</th>
                        <th>Total Harga</th>
                        <th>Berat</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>

                    <?php
                    $tot_berat = 0;
                    foreach ($this->cart->contents() as $items) {
                        $barang = $this->m_home->detail_barang($items['id']);
                        $berat = $items['qty'] * $barang->berat;
                        $tot_berat = $tot_berat + $berat;
                    ?>

                        <tr>
                            <td> <?php echo $items['name']; ?> </td>
                            <td class="text-center">Rp. <?php echo number_format($items['price'], 0); ?></td>
                            <td> <?php echo $items['qty']; ?> </td>
                            <td class="text-center">Rp. <?php echo number_format($items['subtotal'], 0); ?></td>
                            <td class="text-center"><?= $berat ?> Gr</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    <?php
    echo validation_errors('<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h5><i class="icon fas fa-info"></i>', '</h5></div>');

    echo form_open('belanja/checkout');
    $no_order = date('Ymd') . strtoupper(random_string('alnum', 8));
    ?>
    <div class="row">
        <!-- accepted payments column -->
        <div class="col-sm-8 invoice-col">
            Tujuan :
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Provinsi</label>
                        <select name="provinsi" class="form-control"></select>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Kota/Kabupaten</label>
                        <select name="kota" class="form-control">
                        </select>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Expedisi</label>
                        <select name="expedisi" class="form-control">
                        </select>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Paket</label>
                        <select name="paket" class="form-control">
                        </select>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="form-group">
                        <label>Alamat</label>
                        <input name="alamat" class="form-control" value="<?= $pelanggan->alamat ?>" readonly>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Kode POS</label>
                        <input name="kode_pos" class="form-control">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Nama Penerima</label>
                        <input name="nama_penerima" class="form-control" value="<?= $pelanggan->nama_pelanggan ?>" readonly>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>No Tlp</label>
                        <input name="hp_penerima" class="form-control" value="<?= $pelanggan->no_tlp ?>" readonly>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.col -->
        <div class="col-4">
            <p class="lead"><b>Tanggal : <?= date('d-M-Y'); ?></b> </p>

            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th style="width:50%">Grand Total:</th>
                        <th>Rp. <?php echo number_format($this->cart->total(), 0); ?></th>
                    </tr>
                    <tr>
                        <th>Berat:</th>
                        <th><?= $tot_berat ?> Gr</th>
                    </tr>
                    <tr>
                        <th>Ongkir:</th>
                        <th><label id="ongkir"></label></th>
                    </tr>
                    <tr>
                        <th>Total Bayar:</th>
                        <th><label id="total_bayar"></label></th>
                    </tr>
                </table>
            </div>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- simpan transaksi -->
    <input name="no_order" value="<?= $no_order ?>" hidden>
    <input name="estimasi" hidden>
    <input name="ongkir" hidden>
    <input name="berat" value="<?= $tot_berat ?>" hidden><br>
    <input name="grand_total" value="<?= $this->cart->total() ?>" hidden>
    <input name="total_bayar" hidden>

    <!-- end simpan transaksi -->
    <!--  simpan rinci transaksi -->
    <?php
    $i = 1;
    foreach ($this->cart->contents() as $items) {
        echo form_hidden('qty' . $i++, $items['qty']);
    }
    ?>

    <!-- end simpan rinci transaksi -->

    <div class="row no-print">
        <div class="col-12">
            <a href="<?= base_url('belanja') ?>" rel="noopener" class="btn btn-warning"><i class="fas fa-backward"></i> Kembali</a>
            <button type="submit" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Proses Check Out
            </button>
        </div>
    </div>
    <?php echo form_close(); ?>
</div>

<script>
    //masukkan data ke seelct provinsi
    $(document).ready(function() {
        $.ajax({
            type: "POST",
            url: "<?= base_url('rajaongkir/provinsi') ?>",
            success: function(hasil_provinsi) {
                // console.log(hasil_provinsi);
                $("select[name=provinsi]").html(hasil_provinsi);
            }
        });
        //masukkan ke data keselect kota
        $("select[name=provinsi]").on("change", function() {
            var id_provinsi_terpilih = $("option:selected", this).attr("id_provinsi");
            $.ajax({
                type: "POST",
                url: "<?= base_url('rajaongkir/kota') ?>",
                data: 'id_provinsi=' + id_provinsi_terpilih,
                success: function(hasil_kota) {
                    $("select[name=kota]").html(hasil_kota);
                }
            });
        });
        //masukkkan data expedisi
        $("select[name=kota]").on("change", function() {
            $.ajax({
                type: "POST",
                url: "<?= base_url('rajaongkir/expedisi') ?>",
                success: function(hasil_expedisi) {
                    $("select[name=expedisi]").html(hasil_expedisi);
                }
            });
        });
        //mendapatkan data paket
        $("select[name=expedisi]").on("change", function() {
            //mendapatkan expedisi terpilih
            var expedisi_terpilih = $("select[name=expedisi]").val()
            //mendapatkan id kota tujuan terpilih
            var id_kota_tujuan_terpilih = $("option:selected", "select[name=kota]").attr('id_kota');
            //mengambil data ongkos kirim
            var total_berat = <?= $tot_berat ?>;

            $.ajax({
                type: "POST",
                url: "<?= base_url('rajaongkir/paket') ?>",
                data: 'expedisi=' + expedisi_terpilih + '&id_kota=' + id_kota_tujuan_terpilih + '&berat=' + total_berat,
                success: function(hasil_paket) {
                    $("select[name=paket]").html(hasil_paket);
                }
            });
        });
        //
        $("select[name=paket]").on("change", function() {
            //menampilkan ongkir
            var dataongkir = $("option:selected", this).attr('ongkir');
            var reverse = dataongkir.toString().split('').reverse().join(''),
                ribuan_ongkir = reverse.match(/\d{1,3}/g);
            ribuan_ongkir = ribuan_ongkir.join(',').split('').reverse().join('');

            $("#ongkir").html("Rp. " + ribuan_ongkir);

            //menghitung total bayar
            var data_total_bayar = parseInt(dataongkir) + parseInt(<?= $this->cart->total() ?>);
            var reverse2 = data_total_bayar.toString().split('').reverse().join(''),
                ribuan_total_bayar = reverse2.match(/\d{1,3}/g);
            ribuan_total_bayar = ribuan_total_bayar.join(',').split('').reverse().join('');

            $("#total_bayar").html("Rp. " + ribuan_total_bayar);

            //estimasi dan ongkir
            var estimasi = $("option:selected", this).attr('estimasi');
            $("input[name=estimasi]").val(estimasi);
            $("input[name=ongkir]").val(dataongkir);
            $("input[name=total_bayar]").val(data_total_bayar);

        });


    });
</script>
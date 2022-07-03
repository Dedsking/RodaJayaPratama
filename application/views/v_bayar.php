<div class="row">
    <!-- left column -->
    <div class="col-sm-6">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">No Rekening Toko</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <p>Silahkan Transfer Ke no Rekening Di bawah ini sebesar :</p>

                    <H1 class="text-primary">Rp. <?= number_format($pesanan->total_bayar, 0) ?>.-</H1><br>
                    <table class="table">
                        <tr>
                            <th>Bank</th>
                            <th>No Rekening</th>
                            <th>Atas Nama</th>
                        </tr>
                        <tr>
                            <td>BCA</td>
                            <td>0120134489</td>
                            <td>Dedy Ruspandi</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Upload Bukti Pembayaran</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <?php echo form_open_multipart('pesanan_saya/bayar/' . $pesanan->id_transaksi) ?>
            <div class="card-body">
                <div class="form-group">
                    <label>Atas Nama</label>
                    <input name="atas_nama" class="form-control" placeholder="Atas Nama" required>
                </div>
                <div class="form-group">
                    <label>Nama Bank</label>
                    <input name="nama_bank" class="form-control" placeholder="Nama Bank" required>
                </div>
                <div class="form-group">
                    <label>No Rekening</label>
                    <input name="no_rek" class="form-control" placeholder="No Rek" required>
                </div>
                <div class="form-group">
                    <label>Bukti Bayar</label>
                    <div class="input-group">
                        <input name="bukti_bayar" type="file" class="form-control" required>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Upload</button>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>
</div>
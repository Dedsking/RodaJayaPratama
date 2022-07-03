<div class="col-12">
    <div class="card card-solid">
        <div class="card-body pb-0">
            <div class="row">
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
                </div>
                <div class="col-lg-12">
                    <?php foreach ($proses as $key => $value) {
                        # code...
                    } ?>
                    <?php echo form_open('service/ubah/' . $value->id_transaksi); ?>

                    <table class="table" cellpadding="6" cellspacing="1" style="width:100%">

                        <tr>
                            <th width="100px">QTY</th>
                            <th>Nama Barang</th>
                            <th style="text-align:right">Harga</th>
                            <th style="text-align:right">Sub-Total</th>
                        </tr>
                        <?php
                        $grand_total = 0;
                        $servis = 50000;
                        foreach ($proses as $value) {
                            $harga_untung = $value->harga * $value->p_keuntungan / 100;
                            $harga_jual = $value->harga + $harga_untung;
                            $subtotal = $value->qty * $harga_jual;
                            $grand_total = $grand_total + $subtotal;
                            $total_bayar = $grand_total + $servis;
                        ?>

                            <tr>
                                <td><input name="qty[]" type="number" min="1" max="<?= $value->stok ?>"" size=" 5" " class=" form-control" value="<?= $value->qty  ?>">
                                </td>
                                <td><?= $value->nama_barang ?></td>
                                <td style="text-align:right">Rp. <?= number_format($harga_jual, 0) ?> </td>
                                <td style="text-align:right">Rp. <?= number_format($subtotal, 0) ?> </td>
                                <td style="text-align:center"></td>
                                <td style="text-align:center">
                                    <a href="<?= base_url('service/hapus/' . $value->id_transaksi . '/' . $value->id_rinci) ?>" class=" btn btn-danger "><i class=" fas fa-trash"></i></a>
                                </td>
                            </tr>
                            <input type="hidden" name="id_rinci[]" value="<?= $value->id_rinci ?>">

                        <?php } ?>

                        <tr>
                            <td colspan="2"> </td>
                            <td style="text-align:right"><strong>Grand Total</strong></td>
                            <td style="text-align:right"><strong>Rp.<?= number_format($grand_total, 0) ?></strong>
                                <h4><strong> </strong></h4>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"> </td>
                            <td style="text-align:right"><strong>Servis</strong></td>
                            <td style="text-align:right"><strong>Rp. <?= number_format($servis) ?></strong>
                                <h4><strong> </strong></h4>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"> </td>
                            <td style="text-align:right"><strong>Total Bayar</strong></td>
                            <td style="text-align:right"><strong>Rp. <?= number_format($total_bayar) ?></strong>
                                <h4><strong> </strong></h4>
                            </td>
                        </tr>
                    </table>
                    <input type="hidden" name="grand_total" value="<?= $grand_total ?>">
                    <input type="hidden" name="total_bayar" value="<?= $total_bayar ?>">

                    <div class=" col-sm-6 mb-md-5">
                        <a href="<?= base_url('service/add/' . $value->id_transaksi) ?>" target="_blank" class="btn btn-secondary btn-flat btn-sm"><i class="fas fa-plus"></i> Tambah Barang</a>
                        <br><br>
                        <button class="btn btn-primary btn-flat btn-sm" type="submit" name="update"><i class="fas fa-save"></i> Update Cart </button>
                        <button class="btn btn-success btn-flat btn-sm" type="submit" name="simpan"><i class="fas fa-check "></i> Simpan</button>
                        <a href="<?= base_url('service/cetak_nota/' . $value->id_transaksi) ?>" target="_blank" class="btn btn-info btn-flat btn-sm"><i class="fas fa-print"></i> Cetak</a>


                    </div>
                </div>
                <?php form_close() ?>
            </div>
        </div>
    </div>
</div>
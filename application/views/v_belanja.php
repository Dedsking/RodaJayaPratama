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
            <div class="col-sm-12">
                <?php echo form_open('belanja/update'); ?>

                <table class="table" cellpadding="6" cellspacing="1" style="width:100%">

                    <tr>
                        <th width="100px">QTY</th>
                        <th>Nama Barang</th>
                        <th style="text-align:right">Harga</th>
                        <th style="text-align:right">Sub-Total</th>
                        <th style="text-align:right">Berat</th>
                        <th class="text-center">Action</th>
                    </tr>

                    <?php $i = 1; ?>

                    <?php
                    $total_berat = 0;
                    foreach ($this->cart->contents() as $items) {
                        $barang = $this->m_home->detail_barang($items['id']);
                        $berat = $items['qty'] * $barang->berat;
                        $total_berat = $total_berat + $berat;
                    ?>

                        <tr>
                            <td><?php echo form_input(
                                    array(
                                        'name' => $i . '[qty]',
                                        'value' => $items['qty'],
                                        'maxlength' => '3',
                                        'min' => '0',
                                        'max' => $barang->stok,
                                        'size' => '5',
                                        'type' => 'number',
                                        'class' => 'form-control'
                                    )
                                ); ?>
                            </td>
                            <td> <?php echo $items['name']; ?> </td>
                            <td style="text-align:right">Rp. <?php echo number_format($items['price'], 0); ?></td>
                            <td style="text-align:right">Rp. <?php echo number_format($items['subtotal'], 0); ?></td>
                            <td style="text-align:center"><?= $berat ?> Gr</td>
                            <td style="text-align:center">
                                <a href="<?= base_url('belanja/delete/' . $items['rowid']) ?>" class=" btn btn-danger "><i class=" fas fa-trash"></i></a>
                            </td>
                        </tr>

                        <?php $i++; ?>

                    <?php } ?>

                    <tr>
                        <td colspan="2"> </td>
                        <td class="right"><strong>Total</strong></td>
                        <td class="right"><strong>
                                <h4>Rp. <?php echo number_format($this->cart->total(), 0); ?>
                            </strong></h4>
                        </td>
                        <th colspan="2">Total Berat : <?= $total_berat ?> Gr</th>

                    </tr>

                </table>

                <div class="col-sm-6 mb-md-5">
                    <button class="btn btn-primary btn-flat btn-sm" type="submit"><i class="fas fa-save"></i> Update Cart</button>
                    <a href="<?= base_url('belanja/clear') ?>" class="btn btn-danger btn-flat btn-sm"><i class="fas fa-recycle"></i> Clear Cart</a>
                    <a href="<?= base_url('belanja/checkout/' . $barang->id_barang) ?>" class="btn btn-success btn-flat btn-sm"><i class="fas fa-check"></i> Check Out</a>
                </div>

                <?php form_close() ?>

                <div class="col-sm-6 mb-md-4">
                    <a href="<?= base_url('home') ?>" class="btn btn-warning btn-flat btn-sm"><i class="fas fa-backward"></i> Tambah barang</a>
                </div>

            </div>
        </div>
    </div>
</div>
</div>
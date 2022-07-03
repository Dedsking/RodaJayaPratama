<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Data Foto Barang</h3>

            <div class="card-tools">
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <?php
            if ($this->session->flashdata('pesan')) {
                echo '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i> Alert!</h5>';
                echo $this->session->flashdata('pesan');
                echo '</div>';
            }
            ?>
            <table class="table table-bordered" id="example1">
                <thead class="text-center">
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Cover</th>
                        <th>Jumlah</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($fotobarang as $key => $value) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $value->nama_barang ?></td>
                            <td class="text-center"><img src="<?= base_url('assets/gambar/' . $value->gambar) ?>" alt="" width="100px"></td>
                            <td class="text-center">
                                <h4><span class="badge bg-primary">
                                        <?= $value->total_gambar ?>
                                    </span></h4>
                            </td>

                            <td class="text-center">
                                <a href="<?= base_url('fotobarang/add/' . $value->id_barang) ?>" class="btn btn-success btn-sm"><i class="fas fa-plus">Add Gambar</i></a>

                                <button data-toggle="modal" data-target="#detail<?= $value->id_barang; ?>" class="btn btn-primary btn-sm"><i class="fas fa-tag"></i></button>
                            </td>

                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>


<!-- modal detail -->
<?php foreach ($fotobarang as $key => $value) { ?>
    <div class="modal fade" id="detail<?= $value->id_barang ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Detail Barang</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="form-group col-md-12">
                        <tr>
                            <td>ID Barang</td>
                            <td>:</td>
                            <td><?= $value->id_barang; ?></td>
                        </tr>
                        <tr>
                            <td>Nama Barang</td>
                            <td>:</td>
                            <td><?= $value->nama_barang; ?></td>
                        </tr>
                        <tr>
                            <td>Harga</td>
                            <td>:</td>
                            <td>Rp.<?= number_format($value->harga); ?></td>
                        </tr>
                        <tr>
                            <td>stok</td>
                            <td>:</td>
                            <td><?= $value->stok; ?></td>
                        </tr>
                        <tr>
                            <td>Gambar</td>
                            <td>:</td>
                            <td><img src="<?= base_url('assets/gambar/' . $value->gambar) ?>" alt="" width="150px"></td>
                        </tr>
                        <tr>
                            <td>Deskripsi</td>
                            <td>:</td>
                            <td><?= $value->deskripsi; ?></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Kembali</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php } ?>
<!-- /.modal -->
<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Data Barang</h3>

            <div class="card-tools">
                <a href="<?= base_url('barang/add'); ?>" type="button" class="btn btn-primary btn-xs">
                    <i class="fas fa-plus"></i>
                    Add</a>
                <a href="<?= base_url('barang/tambah_stok'); ?>" type="button" class="btn btn-primary btn-xs">
                    <i class="fas fa-plus"></i>
                    Tambah Stok</a>
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
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Gambar</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($barang as $key => $value) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $value->nama_barang ?>
                                <br>
                                Berat : <?= $value->berat ?> Gr
                            </td>
                            <td class="text-center"><?= $value->nama_kategori ?></td>
                            <td class="text-center">Rp.<?= number_format($value->harga)  ?></td>
                            <td class="text-center"><?= $value->stok ?></td>
                            <td class="text-center"><img src="<?= base_url('assets/gambar/' . $value->gambar) ?>" alt="" width="150px"></td>
                            <td class="text-center">
                                <button data-toggle="modal" data-target="#detail<?= $value->id_barang; ?>" class="btn btn-primary btn-sm"><i class="fas fa-tag"></i></button>
                                <a href="<?= base_url('barang/edit/' . $value->id_barang) ?>" class="btn btn-warning btn-sm "><i class="fas fa-edit"></i></a>
                                <button data-toggle="modal" data-target="#delete<?= $value->id_barang; ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
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
<?php foreach ($barang as $key => $value) { ?>
    <div class="modal fade" id="detail<?= $value->id_barang; ?>">
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
                            <td>Kategori</td>
                            <td>:</td>
                            <td><?= $value->nama_kategori; ?></td>
                        </tr>
                        <tr>
                            <td>Suplier</td>
                            <td>:</td>
                            <td><?= $value->nama_suplier; ?></td>
                        </tr>
                        <tr>
                            <td>Harga</td>
                            <td>:</td>
                            <td>Rp.<?= number_format($value->harga); ?></td>
                        </tr>
                        <tr>
                            <td>Stok</td>
                            <td>:</td>
                            <td><?= $value->stok; ?></td>
                        </tr>
                        <tr>
                            <td>Berat Barang</td>
                            <td>:</td>
                            <td><?= $value->berat; ?></td>
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

<!-- modal hapus -->
<?php foreach ($barang as $key => $value) { ?>
    <div class="modal fade" id="delete<?= $value->id_barang; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete <?= $value->nama_barang; ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5>Apakah anda yakin ingin menghapus data ini ?</h5>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <a href="<?= base_url('barang/delete/' . $value->id_barang); ?>" class="btn btn-danger">Delete</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php } ?>


<!-- modal tamabah stok-->
<div class="modal fade" id="tambahstok">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Stok Barang</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                echo form_open('barang/tambah_stok');
                ?>

                <!-- text input -->
                <div class="form-group">
                    <label>Nama Barang</label>
                    <select name="id_barang" class="form-control">
                        <option value="">
                            <--Pilih Nama Barang-->
                        </option>
                        <?php foreach ($barang as $key => $value) { ?>
                            <option value="<?= $value->id_barang ?>"><?= $value->nama_barang; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <input type="text" name="stok_awal" value="<? $value->stok ?>">
                <div class="form-group">
                    <label>Stok Masuk</label>
                    <input type="text" name="stok" class="form-control" placeholder="Stok masuk" required>
                </div>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            <?php

            echo form_close();
            ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
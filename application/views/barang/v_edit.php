<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Form Edit Barang</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <?php

            //notifikasi form kosong
            if ($error_upload) {
                echo '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-info"></i>' . $error_upload . '</h5></div>';
            }
            echo validation_errors('<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-info"></i>', '</h5></div>');

            if ($this->session->flashdata('pesan')) {
                echo '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i> Alert!</h5>';
                echo $this->session->flashdata('pesan');
                echo '</div>';
            }

            //gagal upload gambar


            echo form_open_multipart('barang/edit/' . $barang->id_barang);

            ?>
            <div class="form-group">
                <label>Nama Barang</label>
                <input name="nama_barang" type="text" class="form-control" placeholder="Nama Barang" value="<?= $barang->nama_barang ?>">
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Kategori</label>
                        <select name="id_kategori" class="form-control">
                            <option value="<?= $barang->id_kategori ?>">
                                <?= $barang->nama_kategori ?>
                            </option>
                            <?php foreach ($kategori as $key => $value) { ?>
                                <option value="<?= $value->id_kategori; ?>"><?= $value->nama_kategori; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Suplier</label>
                        <select name="id_suplier" class="form-control">
                            <option value="<?= $barang->id_suplier ?>">
                                <?= $barang->nama_suplier ?>
                            </option>
                            <?php foreach ($suplier as $key => $value) { ?>
                                <option value="<?= $value->id_suplier; ?>"><?= $value->nama_suplier; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Stok</label>
                        <input name="stok" type="number" class="form-control" placeholder="Stok" value="<?= $barang->stok ?>">
                    </div>
                </div>

                <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Berat (Gr)</label>
                        <input name="berat" type="number" class="form-control" placeholder="Berat dalam satuan gram" value="<?= $barang->berat ?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Harga Beli</label>
                        <input name="harga" type="text" class="form-control" placeholder="Harga" value="<?= $barang->harga ?>">
                    </div>
                </div>
                <div class="col-sm-2">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Keuntungan (%)</label>
                        <input name="p_keuntungan" type="number" min="0" class="form-control" placeholder="Keuntungan" value="<?= $barang->p_keuntungan ?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Deskripsi Barang</label>
                <textarea name="deskripsi" class="form-control" rows="3" placeholder="Deskripsi Barang"><?= $barang->deskripsi ?></textarea>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Ganti Gambar</label>
                        <input name="gambar" type="file" class="form-control" id="preview_gambar">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <img src="<?= base_url('assets/gambar/' . $barang->gambar) ?>" id="gambar_load" width="300px">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="<?= base_url('barang') ?>" class="btn btn-success">Kembali</a>
                    </div>
                </div>
            </div>
            <?php echo form_close() ?>
            <hr>

            <!-- fotofambar -->

        </div>
    </div>
</div>
<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Data Foto Barang : <?= $barang->nama_barang ?></h3>

            <div class="card-tools">
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <?php

            ?>
            <?php
            echo form_open_multipart('fotobarang/add/' . $barang->id_barang);

            ?>

            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Keterangan Gambar</label>
                        <input name="keterangan" type="text" class="form-control" placeholder="Keterangan Gambar" value="<?= set_value('nama_barang') ?>">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Gambar</label>
                        <input name="foto" type="file" class="form-control" id="preview" required>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <img src="<?= base_url('assets/gambar/default.jpg') ?>" id="gambar" width="200px">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="<?= base_url('barang') ?>" class="btn btn-success">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php echo form_close(); ?>
            <hr>

            <div class="row">
                <?php foreach ($fotobarang as $key => $value) { ?>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <img class="center-text" src="<?= base_url('assets/fotobarang/' . $value->foto) ?>" id="gambar" width="220px" height="150px">
                            <p for="">Ket : <?= $value->keterangan ?></p>
                        </div>
                        <div class="form-group">
                            <button data-toggle="modal" data-target="#delete<?= $value->id_foto; ?>" class="btn btn-danger btn-sm btn-block"><i class="fas fa-trash"></i>Hapus</button>
                        </div>
                    </div>
                <?php } ?>
            </div>

        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

<!-- modal hapus -->
<?php foreach ($fotobarang as $key => $value) { ?>
    <div class="modal fade" id="delete<?= $value->id_foto; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete <?= $value->keterangan; ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body text-center">
                    <div class="form-group ">
                        <img class="center-text" src="<?= base_url('assets/fotobarang/' . $value->foto) ?>" id="gambar_load" width="310px" height="200px">

                    </div>
                    <h5>Apakah anda yakin ingin menghapus foto ini ?</h5>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <a href="<?= base_url('fotobarang/delete/' . $value->id_barang . '/' . $value->id_foto); ?>" class="btn btn-danger">Delete</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php } ?>
<script>
    function bacaGambar(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#gambar_load').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $('#preview_gambar').change(function() {
        bacaGambar(this);
    });
</script>



<script>
    function baca(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#gambar').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $('#preview').change(function() {
        baca(this);
    });
</script>
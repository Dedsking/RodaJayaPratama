<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Form Add Barang</h3>
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

            //gagal upload gambar


            echo form_open_multipart('barang/add');

            ?>
            <div class="form-group">
                <label>Nama Barang</label>
                <input name="nama_barang" type="text" class="form-control" placeholder="Nama Barang" value="<?= set_value('nama_barang') ?>">
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Kategori</label>
                        <select name="id_kategori" class="form-control">
                            <option value="">
                                <--Pilih Kategori-->
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
                            <option value="">
                                <--Pilih Suplier-->
                            </option>
                            <?php foreach ($suplier as $key => $value) { ?>
                                <option value="<?= $value->id_suplier ?>"><?= $value->nama_suplier; ?></option>
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
                        <input name="stok" type="number" min="0" class="form-control" placeholder="Stok" value="<?= set_value('stok') ?>">
                    </div>
                </div>
                <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Berat (Gr)</label>
                        <input type="number" min="0" name="berat" type="text" class="form-control" placeholder="Berat dalam satuan gram" value="<?= set_value('berat') ?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Harga Beli</label>
                        <input name="harga" type="text" class="form-control" placeholder="Harga" value="<?= set_value('harga') ?>">
                    </div>
                </div>
                <div class="col-sm-2">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Keuntungan (%)</label>
                        <input name="p_keuntungan" type="number" min="0" class="form-control" placeholder="Keuntungan" value="<?= set_value('p_keuntungan') ?>">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>Deskripsi Barang</label>
                <textarea name="deskripsi" class="form-control" rows="3" placeholder="Deskripsi Barang" value="<?= set_value('deskripsi') ?>"></textarea>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Gambar</label>
                        <input name="gambar" type="file" class="form-control" id="preview_gambar">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <img src="<?= base_url('assets/gambar/default.jpg') ?>" id="gambar_load" width="300px">
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
        </div>
        <?php echo form_close() ?>
    </div>
</div>
</div>

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
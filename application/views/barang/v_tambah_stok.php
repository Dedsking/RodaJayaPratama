<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Form Tambah Stok Barang</h3>
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

            ?>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 col-md-offset-6">
                    <form action="<?= base_url('barang/tambah_stok') ?>" method="post">
                        <!-- text input -->
                        <div>
                            <label>ID Barang</label>
                        </div>
                        <div class="form-group input-group">
                            <input name="id_barang" id="id_barang" type="text" class="form-control" placeholder="-" readonly>
                            <span class="input-group-btn">
                                <button type="button" data-toggle="modal" data-target="#pilih_barang" class="btn btn-primary btn-sm btn-flat"><i class="fas fa-search"></i></button>
                            </span>
                        </div>
                        <div class=" form-group">
                            <label>Nama Barang</label>
                            <input name="nama_barang" id="nama_barang" type="text" class="form-control" placeholder="-" readonly>
                        </div>

                        <div class="form-group">
                            <label>Kategori</label>
                            <input type="text" id="kategori" class="form-control" placeholder="-" readonly>

                        </div>
                        <div class="form-group">
                            <label>Stok Awal</label>
                            <input name="stok_awal" id="stok" type="text" class="form-control" placeholder="-" readonly>
                        </div>
                        <div class="form-group">
                            <label>Qty</label>
                            <input name="stok_in" type="text" class="form-control" placeholder="Qty" required>
                        </div>
                        <div class="form-group">
                            <a href="<?= base_url('barang') ?>" class="btn btn-success">Kembali</a>
                            <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>


<div class="modal fade" id="pilih_barang">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Daftar Barang</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ">
                <div class="col-12">
                    <table class="table table-bordered table-striped" id="example1">
                        <thead>
                            <tr>
                                <th>ID Barang</th>
                                <th>Nama Barang</th>
                                <th>Kategori</th>
                                <th>Stok</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($barang as $key => $value) { ?>
                                <tr>
                                    <td><?= $value->id_barang ?></td>
                                    <td><?= $value->nama_barang ?>
                                    </td>
                                    <td class="text-center"><?= $value->nama_kategori ?></td>
                                    <td class="text-center"><?= $value->stok ?></td>
                                    <td class="text-center"><button class="btn-xs btn-info" id="select" data-id="<?= $value->id_barang ?>" data-nama="<?= $value->nama_barang ?>" data-kategori="<?= $value->nama_kategori ?>" data-stok="<?= $value->stok ?>"> Select </button></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $(document).on('click', '#select', function() {
            var id_barang = $(this).data('id');
            var nama_barang = $(this).data('nama');
            var kategori = $(this).data('kategori');
            var stok = $(this).data('stok');
            $('#id_barang').val(id_barang);
            $('#nama_barang').val(nama_barang);
            $('#kategori').val(kategori);
            $('#stok').val(stok);
            $('#pilih_barang').modal('hide');
        })
    })
</script>
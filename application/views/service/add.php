<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Form Proses</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <?php

            //notifikasi form kosong
            echo validation_errors('<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-info"></i>', '</h5></div>');

            //gagal upload gambar

            echo form_open_multipart('service/add/' . $pendaftar->id_transaksi);

            ?>
            <div class="row">
                <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                        <div class="form-group">
                            <label>Nama Pelanggan</label>
                            <input type="text" class="form-control" value="<?= $pendaftar->nama_penerima ?>" readonly>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                        <label>No Order</label>
                        <input type="text" name="no_order" class="form-control" value="<?= $pendaftar->no_order ?>" readonly>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Tgl Daftar</label>
                        <input name="tgl_order" type="text" class="form-control" value="<?= $pendaftar->tgl_daftar ?>" readonly>
                    </div>
                </div>
                <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Tgl Service</label>
                        <input type="text" class="form-control" value="<?= $pendaftar->tgl_order ?>" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Alamat</label>
                        <input name="alamat" type="text" class="form-control" value="<?= $pendaftar->alamat ?>" readonly>
                    </div>
                </div>
                <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                        <label>No_tlp</label>
                        <input name="hp_penerima" type="text" class="form-control" value="<?= $pendaftar->hp_penerima ?>" readonly>
                    </div>
                </div>
            </div>
            <div class="row form-tambah">
                <div class="col-sm-10">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Pilih Barang</label>
                        <select name="id_barang[]" class="select2bs4" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                            <?php foreach ($barang as $key => $value) {
                                $harga_untung = $value->harga * $value->p_keuntungan / 100;
                                $harga_jual = $value->harga + $harga_untung;
                            ?>
                                <option value="<?= $value->id_barang ?>"><?= $value->nama_barang ?> | Rp.<?= $harga_jual ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="<?= base_url('service') ?>" class="btn btn-success">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
        <?php echo form_close() ?>
    </div>
</div>
</div>


<script>
    $(document).ready(function() {

        $(".barang").select2({

            placeholder: "Silahkan Pilih Barang"

        });

    });
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({})
    })
</script>
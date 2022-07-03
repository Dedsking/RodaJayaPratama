<div class="row">
    <div class="col-md-2">
    </div>
    <div class="col-md-8">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Daftar Service</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <?php

                //notifikasi form kosong
                // if ($error_upload) {
                //     echo '<div class="alert alert-danger alert-dismissible">
                //     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                //     <h5><i class="icon fas fa-info"></i>' . $error_upload . '</h5></div>';
                // }
                echo validation_errors('<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-info"></i>', '</h5></div>');

                //gagal upload gambar

                foreach ($data_pelanggan as $key => $value) {
                    # code...
                }
                echo form_open_multipart('service/daftar');
                $no_order = date('Ymd') . strtoupper(random_string('alnum', 8));
                ?>
                <input type="hidden" name="no_order" value="<?= $no_order ?>">
                <div class="form-group">
                    <label>Nama Lengkap:</label>
                    <input name="nama_penerima" type="text" class="form-control" placeholder="Nama Lengkap" value="<?= set_value('nama_penerima') ?>">
                </div>
                <div class="form-group">
                    <label>Alamat:</label>
                    <textarea name="alamat" class="form-control" rows="3" placeholder="Alamat Anda" value="<?= set_value('alamat') ?>"></textarea>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Tanggal Boooking:</label>
                            <input name="tgl_order" type="date" class="form-control" placeholder="Tanggal Booking" value="<?= set_value('tgl_order') ?>">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>No Telp</label>
                            <input name="hp_penerima" type="text" class="form-control" placeholder="No Telp" value="<?= set_value('hp_penerima') ?>">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <!-- text input -->

                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <!-- text input -->

                    </div>
                    <div class="col-sm-2">
                        <!-- text input -->

                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <a href="<?= base_url('home') ?>" class="btn btn-success">Kembali</a>
                            <button type="submit" class="btn btn-primary">Daftar</button>
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
<script>
    $(function() {
        //Date picker
        $('#reservationdate').datetimepicker({
            format: 'L'
        });
    })
</script>
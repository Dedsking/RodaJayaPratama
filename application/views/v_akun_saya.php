<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <div class="card card-primary card-outline">
            <?php
            if ($this->session->flashdata('pesan')) {
                echo '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fas fa-check"></i>';
                echo $this->session->flashdata('pesan');
                echo '</div>';
            }
            ?>
            <div class="card-body box-profile">
                <?php foreach ($get_data_pelanggan as $key => $value) { ?>
                    <div class="text-center">
                        <img class="img-fluid img-circle" src="<?= base_url('assets/foto/' . $value->foto) ?>" alt="User profile picture">
                    </div>

                    <h3 class="profile-username text-center"><?= $value->nama_pelanggan ?></h3>

                    <p class="text-muted text-center"></p>

                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Username/Email</b> : <a class="float-right"><?= $value->email ?></a>
                        </li>
                        <li class="list-group-item">
                            <b>Password</b> : <a class="float-right"><?= $value->password ?></a>
                        </li>
                        <li class="list-group-item">
                            <b>Alamat</b> : <a class="float-right"><?= $value->alamat ?></a>
                        </li>
                        <li class="list-group-item">
                            <b>No Tlp</b> : <a class="float-right"><?= $value->no_tlp ?></a>
                        </li>
                    </ul>

                <?php } ?>

                <button data-toggle="modal" data-target="#edit<?= $value->id_pelanggan; ?>" class="btn btn-primary btn-block"><b>Edit</b></button>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </div>
</div>
</div>

<!-- modal edit -->
<?php foreach ($get_data_pelanggan as $key => $value) { ?>
    <div class="modal fade" id="edit<?= $value->id_pelanggan; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Akun Saya</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php
                    echo form_open_multipart('pelanggan/update/' . $value->id_pelanggan);
                    ?>

                    <div class="form-group">
                        <label>Nama </label>
                        <input type="text" value="<?= $value->nama_pelanggan; ?>" name="nama_pelanggan" class="form-control" placeholder="Nama Pelanggan" required>
                    </div>
                    <div class="form-group">
                        <label>Email </label>
                        <input type="text" value="<?= $value->email; ?>" name="email" class="form-control" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <label>Password </label>
                        <input type="text" value="<?= $value->password; ?>" name="password" class="form-control" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat </label>
                        <input type="text" value="<?= $value->alamat; ?>" name="alamat" class="form-control" placeholder="Alamat" required>
                    </div>
                    <div class="form-group">
                        <label>No Tlp </label>
                        <input type="text" value="<?= $value->no_tlp; ?>" name="no_tlp" class="form-control" placeholder="No Tlp" required>
                    </div>
                    <div class="form-group">
                        <label>Ganti Gambar</label>
                        <input name="foto" type="file" class="form-control">
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
<?php } ?>
<!-- /.modal -->
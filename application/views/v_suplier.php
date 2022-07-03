<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Data suplier</h3>

            <div class="card-tools">
                <button data-toggle="modal" data-target="#add" type="button" class="btn btn-primary btn-xs">
                    <i class="fas fa-plus"></i>
                    Add</button>
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
                        <th>Nama suplier</th>
                        <th>Alamat suplier</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($suplier as $key => $value) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $value->nama_suplier ?></td>
                            <td><?= $value->alamat_suplier ?></td>
                            <td class="text-center">
                                <button data-toggle="modal" data-target="#detail<?= $value->id_suplier; ?>" class="btn btn-primary btn-sm"><i class="fas fa-tag"></i></button>
                                <button data-toggle="modal" data-target="#edit<?= $value->id_suplier; ?>" class="btn btn-warning btn-sm "><i class="fas fa-edit"></i></button>
                                <button data-toggle="modal" data-target="#delete<?= $value->id_suplier; ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
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
<!-- modal Add -->
<div class="modal fade" id="add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add suplier</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                echo form_open('suplier/add');
                ?>

                <div class="form-group">
                    <label>Nama suplier</label>
                    <input type="text" name="nama_suplier" class="form-control" placeholder="Nama suplier" required>
                </div>
                <div class="form-group">
                    <label>Alamat suplier</label>
                    <input type="text" name="alamat_suplier" class="form-control" placeholder="Alamat suplier" required>
                </div>
                <!-- <div class="form-group"> 
                    <label>Level User</label>
                    <select name="level_user" class="form-control">
                        <option value="1" selected>Admin</option>
                        <option value="2">User</option>
                    </select>
                </div> -->

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

<!-- modal edit -->
<?php foreach ($suplier as $key => $value) { ?>
    <div class="modal fade" id="edit<?= $value->id_suplier; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit suplier</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php
                    echo form_open('suplier/update/' . $value->id_suplier);
                    ?>

                    <div class="form-group">
                        <label>Nama suplier</label>
                        <input type="text" value="<?= $value->nama_suplier; ?>" name="nama_suplier" class="form-control" placeholder="Nama suplier" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat suplier</label>
                        <input type="text" value="<?= $value->alamat_suplier; ?>" name="alamat_suplier" class="form-control" placeholder="Alamat suplier" required>
                    </div>
                    <!-- <div class="form-group">
                    <label>Level User</label>
                    <select name="level_user" class="form-control">
                        <option value="1" selected>Admin</option>
                        <option value="2">User</option>
                    </select>
                    </div> -->

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

<!-- modal hapus -->
<?php foreach ($suplier as $key => $value) { ?>
    <div class="modal fade" id="delete<?= $value->id_suplier; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete <?= $value->nama_suplier; ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5>Apakah anda yakin ingin menghapus data ini ?</h5>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <a href="<?= base_url('suplier/delete/' . $value->id_suplier); ?>" class="btn btn-danger">Delete</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php } ?>


<!-- modal detail -->
<?php foreach ($suplier as $key => $value) { ?>
    <div class="modal fade" id="detail<?= $value->id_suplier; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Detail suplier</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="form-group col-md-8">
                        <tr>
                            <td>Id</td>
                            <td>:</td>
                            <td><?= $value->id_suplier; ?></td>
                        </tr>
                        <tr>
                            <td>Nama suplier</td>
                            <td>:</td>
                            <td><?= $value->nama_suplier; ?></td>
                        </tr>
                        <tr>
                            <td>Alamat suplier</td>
                            <td>:</td>
                            <td><?= $value->alamat_suplier; ?></td>
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
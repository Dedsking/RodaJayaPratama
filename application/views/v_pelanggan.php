    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Data Pelanggan</h3>

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
                            <th>Nama Pelanggan</th>
                            <th>Username</th>
                            <th>Password</th>

                            <th>Alamat</th>
                            <th>No Telp</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($pelanggan as $key => $value) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $value->nama_pelanggan ?></td>
                                <td class="text-center"><?= $value->email ?></td>
                                <td class="text-center"><?= $value->password ?></td>
                                <td><?= $value->alamat ?></td>
                                <td><?= $value->no_tlp ?></td>
                                <td class="text-center">
                                    <button data-toggle="modal" data-target="#delete<?= $value->id_pelanggan; ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
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
    <!-- modal hapus -->
    <?php foreach ($pelanggan as $key => $value) { ?>
        <div class="modal fade" id="delete<?= $value->id_pelanggan; ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Delete <?= $value->nama_pelanggan; ?></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h5>Apakah anda yakin ingin menghapus data ini ?</h5>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        <a href="<?= base_url('admin/delete/' . $value->id_pelanggan); ?>" class="btn btn-danger">Delete</a>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    <?php } ?>
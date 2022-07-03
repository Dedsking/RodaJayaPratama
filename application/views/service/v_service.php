<div class="col-sm-12">
    <?php
    if ($this->session->flashdata('pesan')) {
        echo '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i> Alert!</h5>';
        echo $this->session->flashdata('pesan');
        echo '</div>';
    }
    ?>
    <div class="card card-primary card-outline card-outline-tabs">
        <div class="card-header p-0 border-bottom-0">
            <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Daftar servis</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Proses Servis</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-settings-tab" data-toggle="pill" href="#custom-tabs-four-settings" role="tab" aria-controls="custom-tabs-four-settings" aria-selected="false">Selesai</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content" id="custom-tabs-four-tabContent">
                <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                    <!-- daftar service -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No Order</th>
                                <th>Nama</th>
                                <th>Tanggal Daftar</th>
                                <th>Tanggal Datang</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($daftar_service as $key => $value) { ?>
                                <tr>
                                    <td><?= $value->no_order ?></td>
                                    <td><?= $value->nama_penerima ?></td>
                                    <td><?= $value->tgl_daftar ?></td>
                                    <td><?= $value->tgl_order ?></td>
                                    <td>
                                        <a href="<?= base_url('service/add/' . $value->id_transaksi) ?>" class="btn btn-sm btn-flat btn-primary">Proses</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                    <!-- proses servis -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No Order</th>
                                <th>Nama</th>
                                <th>Tanggal</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($proses_service as $key => $value) { ?>
                                <tr>
                                    <td><?= $value->no_order ?></td>
                                    <td><?= $value->nama_penerima ?></td>
                                    <td><?= date('Y-m-d') ?></td>

                                    <td>
                                        <a href="<?= base_url('service/bayar/' . $value->id_transaksi) ?>" class="btn btn-sm btn-flat btn-primary">Bayar</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="custom-tabs-four-settings" role="tabpanel" aria-labelledby="custom-tabs-four-settings-tab">
                    <!-- pesanan selesai -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No Order</th>
                                <th>Nama</th>
                                <th>Tanggal Selesai</th>
                                <th>Total Bayar</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($selesai_service as $key => $value) { ?>
                                <tr>
                                    <td><?= $value->no_order ?></td>
                                    <td><?= $value->nama_penerima ?></td>
                                    <td><?= $value->tgl_order ?></td>
                                    <td>Rp. <?= number_format($value->grand_total, 0) ?></td>

                                    <td>
                                        <span class="badge badge-success">Selesai</span>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.card -->
    </div>
</div>
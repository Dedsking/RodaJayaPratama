<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
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
                                    <th>Tanggal Booking</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($daftar_service_saya as $key => $value) { ?>
                                    <tr>
                                        <td><?= $value->no_order ?></td>
                                        <td><?= $value->nama_penerima ?></td>
                                        <td><?= $value->tgl_daftar ?></td>
                                        <td><?= $value->tgl_order ?></td>
                                        <td>
                                            <span class="badge badge-primary">Tersimpan</span>
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
                                    <th>Tanggal Proses</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($proses_service_saya as $key => $value) { ?>
                                    <tr>
                                        <td><?= $value->no_order ?></td>
                                        <td><?= $value->nama_penerima ?></td>
                                        <td><?= $value->tgl_order ?></td>

                                        <td>
                                            <span class="badge badge-info">Sedang Proses</span>
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
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($selesai_service_saya as $key => $value) { ?>
                                    <tr>
                                        <td><?= $value->no_order ?></td>
                                        <td><?= $value->nama_penerima ?></td>
                                        <td><?= $value->tgl_order ?></td>

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
</div>
</div>
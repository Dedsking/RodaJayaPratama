<div class="col-12"></div>
<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-primary">
        <div class="inner">
            <h3 id="load-pesananmasuk"></h3>
            <p>Last update : <?= date('H:i') ?></p>
            <p>Pesanan Masuk</p>
        </div>
        <div class="icon">
            <i class="fas fa-shopping-cart"></i>
        </div>
        <a href="<?= base_url('admin/pesanan_masuk') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>

<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-info">
        <div class="inner">
            <h3 id="load-pesananbayar"></h3>
            <p>Last update : <?= date('H:i') ?></p>
            <p>Pesanan Terbayar</p>
        </div>
        <div class="icon">
            <i class="fas fa-dollar-sign"></i>
        </div>
        <a href="<?= base_url('admin/pesanan_masuk') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>


<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-success">
        <div class=" inner">
            <h3><?= $total_barang; ?></h3>

            <p>Barang</p>
        </div>
        <div class="icon">
            <i class="fas fa-cubes"></i>
        </div>
        <a href="<?= base_url('barang'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>


<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-secondary">
        <div class="inner">
            <h3><?= $total_pelanggan; ?></h3>

            <p>Pelanggan</p>
        </div>
        <div class="icon">
            <i class="fas fa-users"></i>
        </div>
        <a href="<?= base_url('admin/pelanggan') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>

<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-danger">
        <div class="inner">
            <h3><?= $total_kategori; ?></h3>

            <p>Kategori</p>
        </div>
        <div class="icon">
            <i class="fas fa-list"></i>
        </div>
        <a href="<?= base_url('kategori'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
</div>
<div class="col-lg-6">
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title"><b> Barang Hampir Habis </b></h3>
            <div class="card-tools">
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">
                <thead class="text-center">
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Stok</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($peringatan_stok as $key => $value) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $value->nama_barang ?>
                            </td>
                            <td class="text-center"><?= $value->stok ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
</div>

<!-- /.content-wrapper -->
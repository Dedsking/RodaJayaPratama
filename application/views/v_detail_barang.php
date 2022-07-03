<!-- Default box -->
<div class="card card-solid">
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-sm-6">
                <h3 class="d-inline-block d-sm-none"><?= $barang->nama_barang; ?></h3>
                <div class="col-12">
                    <img src="<?= base_url('assets/gambar/' . $barang->gambar); ?>" class="product-image" alt="Product Image">
                </div>
                <div class="col-12 product-image-thumbs">
                    <div class="product-image-thumb active"><img src="<?= base_url('assets/gambar/' . $barang->gambar); ?>" alt="Product Image"></div>
                    <?php foreach ($foto as $key => $value) { ?>
                        <div class="product-image-thumb"><img src="<?= base_url('assets/fotobarang/' . $value->foto); ?>" alt="Product Image"></div>
                    <?php } ?>
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <h3 class="my-3"><?= $barang->nama_barang; ?></h3>
                <hr>
                <h5>Kategori : <?= $barang->nama_kategori; ?></h5>
                <hr>
                <p>Deskripsi : <?= $barang->deskripsi; ?></p>
                <hr>
                <p>Stok : <?= $barang->stok; ?></p>
                <hr>
                <div class="bg-gray py-2 px-3 mt-4">
                    <h2 class="mb-0">
                        Rp. <?= number_format($barang->harga_jual); ?>
                    </h2>
                </div>
                <hr>
                <?php
                echo form_open('belanja/add');
                echo form_hidden('id', $barang->id_barang);
                echo form_hidden('price', $barang->harga_jual);
                echo form_hidden('name', $barang->nama_barang);
                echo form_hidden('redirect_page', str_replace('index.php/', '', current_url()));
                ?>

                <div class="mt-4">
                    <div class="row">
                        <!-- jika barang habis -->
                        <?php if ($barang->stok == 0) {
                            echo "Stok sedang kosong !!";
                        } else { ?>
                            <div class="col-sm-2">
                                <input type="number" name="qty" class="form-control" value="1" min="1" max="<?= $barang->stok ?>">
                            </div>
                            <div class="col-sm-8">
                                <button type="submit" class="btn btn-primary btn-flat swalDefaultSuccess">
                                    <i class="fas fa-cart-plus fa-lg mr-2"></i>
                                    Add to Cart
                                </button>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <?php echo form_close() ?>
                <div class="mt-4 product-share">
                    <a href="#" class="text-gray">
                        <i class="fab fa-facebook-square fa-2x"></i>
                    </a>
                    <a href="#" class="text-gray">
                        <i class="fab fa-twitter-square fa-2x"></i>
                    </a>
                    <a href="#" class="text-gray">
                        <i class="fas fa-envelope-square fa-2x"></i>
                    </a>
                    <a href="#" class="text-gray">
                        <i class="fas fa-rss-square fa-2x"></i>
                    </a>
                </div>


            </div>
        </div>
    </div>
</div>
<!-- /.card-body -->
</div>
<!-- /.card -->

<!-- jQuery -->

<!-- AdminLTE for demo purposes -->
<script src="<?= base_url() ?>templates/dist/js/demo.js"></script>
<script src="<?= base_url() ?>templates/plugins/sweetalert2/sweetalert2.min.js"></script>



<script>
    $(document).ready(function() {
        $('.product-image-thumb').on('click', function() {
            var $image_element = $(this).find('img')
            $('.product-image').prop('src', $image_element.attr('src'))
            $('.product-image-thumb.active').removeClass('active')
            $(this).addClass('active')
        })
    })
</script>

<script>
    $(function() {
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });

        $('.swalDefaultSuccess').click(function() {
            Toast.fire({
                icon: 'success',
                title: 'Barang berhasil ditambahkan ke keranjang !!!.'
            })
        });
    });
</script>
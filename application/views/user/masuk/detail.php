<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-5 ftco-animate">
                <a href="images/menu-2.jpg" class="image-popup"><img src="<?= base_url() . 'uploads/produk/' . $produk['img'] ?>" class="img-fluid" alt="Colorlib Template"></a>
            </div>
            <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                <h3><?= $produk['nama'] ?></h3>
                <p class="price"><span>Rp. <?= number_format($produk['harga']) ?></span></p>
                <p><?= $produk['deskripsi'] ?></p>
                <?= form_open('user/home/addToCart') ?>
                <form action="" method="post">
                    <input type="hidden" name="id_produk" value="<?= $produk['id_produk'] ?>">
                    <button class="btn btn-primary btn-outline-primary" onclick="return confirm('Added to Cart~')">
                        <span>Add to Cart</span>
                    </button>
                </form>
                <?php form_close() ?>
            </div>
        </div>
    </div>
</section>
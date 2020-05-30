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
                <?php if (empty($this->session->userdata('username'))) : ?>
                    <p><a href="cart.html" class="btn btn-primary py-3 px-5">Add to Cart</a></p>
                <?php endif ?>
            </div>
        </div>
    </div>
</section>
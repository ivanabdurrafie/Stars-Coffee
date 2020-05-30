<section class="ftco-section ftco-cart">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ftco-animate">
                <div class="cart-list">
                    <table class="table">
                        <thead class="thead-primary">
                            <tr class="text-center">
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $grandtotal = 0; ?>
                            <?php if (empty($keranjang)) { ?>
                                <tr class="text-center">
                                    <td>Keranjang masih Kosong <br> Silahkan pilih produk terlebih dahulu</td>
                                </tr>
                            <?php } else { ?>
                                <?php foreach ($keranjang as $k) : ?>
                                    <tr class="text-center">
                                        <td class="product-remove">
                                            <?= form_open('user/home/delProduct') ?>
                                            <form action="" method="post">
                                                <input type="hidden" name="id_produk" value="<?= $k->id_produk ?>">
                                                <button class="btn btn-primary btn-outline-primary"><i class="icon-close"></i></button>
                                            </form>
                                            <?php form_close(); ?>
                                        </td>
                                        <td class="image-prod">
                                            <div class="img" style="background-image:url(<?= base_url() . 'uploads/produk/' . $k->img ?>);"></div>
                                        </td>

                                        <td class="product-name">
                                            <h3><?= $k->nama ?></h3>
                                        </td>

                                        <td class="price">Rp. <?= number_format($k->harga) ?></td>

                                        <td class="quantity">
                                            <div class="input-group mb-3">
                                                <?= form_open('user/home/plusQuantity') ?>
                                                <form method="post">
                                                    <input type="hidden" name="id_produk" value="<?= $k->id_produk ?>">
                                                    <button class="btn btn-primary btn-outline-primary">&nbsp; <i class="icon-plus">&nbsp;</i>&nbsp; </button>
                                                </form>
                                                <?php form_close(); ?>
                                                <input type="disabled" name="quantity" class="quantity form-control input-number" value="<?= $k->qty ?>" min="1" max="100">
                                                <?php if ($k->qty > 1) : ?>
                                                    <?= form_open('user/home/minusQuantity') ?>
                                                    <form action="" method="post">
                                                        <input type="hidden" name="id_produk" value="<?= $k->id_produk ?>">
                                                        <button class="btn btn-primary btn-outline-primary"><i class="icon-minus"></i></button>
                                                    </form>
                                                    <?php form_close(); ?>
                                                <?php endif; ?>
                                                <?php if ($k->qty <= 1) : ?>
                                                    <?= form_open('user/home/delProduct') ?>
                                                    <form action="" method="post">
                                                        <input type="hidden" name="id_produk" value="<?= $k->id_produk ?>">
                                                        <button class="btn btn-primary btn-outline-primary"><i class="icon-minus"></i></button>
                                                    </form>
                                                    <?php form_close(); ?>
                                                <?php endif; ?>
                                            </div>
                                        </td>

                                        <td class="total"><?php $total = $k->harga * $k->qty ?>
                                            Rp. <?= number_format($total) ?></td>
                                    </tr><!-- END TR-->
                                    <?php $grandtotal = $grandtotal + $total ?>
                                <?php endforeach; ?>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row justify-content-end">
            <div class="col col-lg-3 col-md-6 mt-5 cart-wrap ftco-animate">
                <div class="cart-total mb-3">
                    <h3>Cart Totals</h3>
                    <hr>
                    <p class="d-flex total-price">
                        <span>Total</span>
                        <span>Rp. <?= number_format($grandtotal) ?></span>
                    </p>
                </div>
                <p class="text-center"><a href="<?= base_url() . 'user/home/confirm' ?>" class="btn btn-primary py-3 px-4">Proceed to Checkout</a></p>
            </div>
        </div>
    </div>
</section>
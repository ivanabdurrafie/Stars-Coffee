<section class="ftco-menu mb-5 pb-5">
    <div class="container">
        <div class="row d-md-flex">
            <div class="col-lg-12 ftco-animate p-md-5">
                <div class="row">
                    <div class="col-md-12 nav-link-wrap mb-5">
                        <div class="nav ftco-animate nav-pills justify-content-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link" id="v-pills-0-tab" data-toggle="pill" href="#v-pills-0" role="tab" aria-controls="v-pills-0" aria-selected="true">Coffee</a>

                            <a class="nav-link" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="false">Tools</a>
                        </div>
                    </div>
                    <div class="col-md-12 d-flex align-items-center">

                        <div class="tab-content ftco-animate" id="v-pills-tabContent">

                            <div class="tab-pane fade show active" id="v-pills-0" role="tabpanel" aria-labelledby="v-pills-0-tab">
                                <div class="row">
                                    <?php foreach ($produkkopi as $kopi) : ?>
                                        <div class="col-md-3">
                                            <div class="menu-entry">
                                                <a href="<?= base_url(); ?>user/home/detail/<?= $kopi['id_produk'] ?>" class="img" style="background-image: url(<?= base_url() . 'uploads/produk/' . $kopi['img'] ?>);"></a>
                                                <div class="text text-center pt-4">
                                                    <h3><a href="<?= base_url(); ?>user/home/detail/<?= $kopi['id_produk'] ?>"><?= $kopi['nama'] ?></a></h3>
                                                    <p class="price"><span>Rp. <?= number_format($kopi['harga']) ?></span></p>
                                                    <?= form_open('user/home/addToCart') ?>
                                                    <form action="" method="post">
                                                        <input type="hidden" name="id_produk" value="<?= $kopi['id_produk'] ?>">
                                                        <button class="btn btn-primary btn-outline-primary" onclick="return confirm('Added to Cart~')">
                                                            <span>Add to Cart</span>
                                                        </button>
                                                    </form>
                                                    <?php form_close() ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-1-tab">
                                <div class="row">
                                    <?php foreach ($produktools as $kopi) : ?>
                                        <div class="col-md-3">
                                            <div class="menu-entry">
                                                <a href="<?= base_url(); ?>user/home/detail/<?= $kopi['id_produk'] ?>" class="img" style="background-image: url(<?= base_url() . 'uploads/produk/' . $kopi['img'] ?>);"></a>
                                                <div class="text text-center pt-4">
                                                    <h3><a href="<?= base_url(); ?>user/home/detail/<?= $kopi['id_produk'] ?>"><?= $kopi['nama'] ?></a></h3>
                                                    <p class="price"><span>Rp. <?= number_format($kopi['harga']) ?></span></p>
                                                    <?= form_open('user/home/addToCart') ?>
                                                    <form action="" method="post">
                                                        <input type="hidden" name="id_produk" value="<?= $kopi['id_produk'] ?>">
                                                        <button class="btn btn-primary btn-outline-primary" onclick="return confirm('Added to Cart~')">
                                                            <span>Add to Cart</span>
                                                        </button>
                                                    </form>
                                                    <?php form_close() ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
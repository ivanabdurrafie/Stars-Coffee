<div class="content-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-12 align-center">
                <div class="card mt-3">
                    <div class="card-header text-right">
                        <h3 class="card-title"><b><?= $produk['nama'] ?></b></h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5">
                                <img src="<?= base_url() . 'uploads/produk/' . $produk['img'] ?>" width="100%" alt="...">
                            </div>
                            <div class="col-7">
                                <h3>Harga : Rp. <?= number_format($produk['harga']) ?></h3>
                                <h3>Stok : <?= $produk['stok'] ?></h3>
                                <span class='text-justify'><?= $produk['deskripsi'] ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <a href="<?= base_url(); ?>admin/produk/index" class="btn btn-danger">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
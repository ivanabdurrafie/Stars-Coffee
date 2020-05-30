<div class="content-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-12">
                <div class="card mt-3">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="card-header">
                            <h3 class="card-title">Update Produk</h3>
                        </div>
                        <div class="card-body">

                            <div class="form-group">
                                <label for="id_produk">Id Produk</label>
                                <input type="hidden" name="id_produk" class="form-control" value="<?= $produk['id_produk'] ?>">
                                <input type="text" disabled class="form-control" value="<?= $produk['id_produk'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" class="form-control" value="<?= $produk['nama'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="kategori">Kategori</label>
                                <select name="id_kategori" class="form-control" required>
                                    <option value="<?= $produk['id_kategori'] ?>" selected> Kategori Sebelumnya : <?= $produk['id_kategori']?></option>
                                    <?php foreach ($kategori as $kat) : ?>
                                        <option value="<?= $kat['id_kategori'] ?>"><?= $kat['id_kategori'].' '.$kat['kategori'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <input type="number" name="harga" class="form-control" value="<?= $produk['harga'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="stok">Stok</label>
                                <input type="number" name="stok" class="form-control" value="<?= $produk['stok'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea name="deskripsi" id="" cols="30" rows="10" class="form-control" ><?= $produk['deskripsi'] ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="img">Gambar</label>
                                <input type="file" name="img" class="form-control">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
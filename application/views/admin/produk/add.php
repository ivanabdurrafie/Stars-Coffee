<div class="content-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-12">
                <div class="card mt-3">
                    <?php
                    if (validation_errors()) {
                        echo '<div class="alert alert-danger" role="alert">' . validation_errors() . '</div>';
                    }
                    ?>
                    <?= form_open_multipart('admin/produk/add') ?>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="card-header">
                            <h3 class="card-title">Add Produk</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" class="form-control" placeholder="Enter Nama">
                            </div>
                            <div class="form-group">
                                <label for="kategori">Kategori</label>
                                <select name="id_kategori" class="form-control" required>
                                    <option selected>Pilih Kategori</option>
                                    <?php foreach ($kategori as $kat) : ?>
                                        <option value="<?= $kat['id_kategori'] ?>"><?= $kat['kategori'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <input type="number" name="harga" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="stok">Stok</label>
                                <input type="number" name="stok" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea name="deskripsi" id="" cols="30" rows="10" class="form-control"></textarea>
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
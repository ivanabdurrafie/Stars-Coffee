<div class="content-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-12">
                <div class="card mt-3">
                    <form action="" method="post">
                        <div class="card-header">
                            <h3 class="card-title">Update Kategori</h3>
                        </div>
                        <div class="card-body">

                            <div class="form-group">
                                <label for="id_kategori">Id Kategori</label>
                                <input type="hidden" name="id_kategori" class="form-control" value="<?= $kategori['id_kategori'] ?>">
                                <input type="text" disabled class="form-control" value="<?= $kategori['id_kategori'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="kategori">Kategori</label>
                                <input type="text" name="kategori" class="form-control" value="<?= $kategori['kategori'] ?>">
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
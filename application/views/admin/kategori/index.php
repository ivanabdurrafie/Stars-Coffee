<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-12">
                <?php if ($this->session->flashdata('flash-data')) : ?>
                    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                        Kategori <strong> Berhasil </strong> <?= $this->session->flashdata('flash-data'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                <?php endif; ?>
                <div class="card mt-3">
                    <div class="card-header">
                        <h3 class="card-title">Kategori</h3>&nbsp;&nbsp;
                        <a href="<?= base_url(); ?>admin/kategori/add" class="btn btn-primary align-content-end"><i class="nav-icon fas fa-plus"></i>Tambah</a>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Id Kategori</th>
                                    <th>Kategori</th>
                                    <th>Proses</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($kategori as $kat) : ?>
                                    <tr>
                                        <td><?= $kat['id_kategori'] ?></td>
                                        <td><?= $kat['kategori'] ?></td>
                                        <td>
                                            <a href="<?= base_url(); ?>admin/kategori/delete/<?= $kat['id_kategori']; ?>" class="btn btn-danger">Delete</a>
                                            <a href="<?= base_url(); ?>admin/kategori/update/<?= $kat['id_kategori']; ?>" class="btn btn-warning">Update</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-12">
                <?php if ($this->session->flashdata('flash-data')) : ?>
                    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                        User <strong> Berhasil </strong> <?= $this->session->flashdata('flash-data'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                <?php endif; ?>
                <div class="card mt-3">
                    <div class="card-header">
                        <h3 class="card-title">User</h3>&nbsp;&nbsp;
                        <a href="<?= base_url(); ?>admin/user/add" class="btn btn-primary align-content-end"><i class="nav-icon fas fa-plus"></i>Tambah</a>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>Email</th>
                                    <th>Nama</th>
                                    <th>Level</th>
                                    <th>Proses</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($user as $usr) : ?>
                                    <tr>
                                        <td><?= $usr['username'] ?></td>
                                        <td><?= $usr['password'] ?></td>
                                        <td><?= $usr['email'] ?></td>
                                        <td><?= $usr['nama'] ?></td>
                                        <td><?= $usr['level'] ?></td>
                                        <td>
                                            <a href="<?= base_url(); ?>admin/user/delete/<?= $usr['username']; ?>" class="btn btn-danger">Delete</a>
                                            <a href="<?= base_url(); ?>admin/user/update/<?= $usr['username']; ?>" class="btn btn-warning">Update</a>
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
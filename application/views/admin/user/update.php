<div class="content-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-12">
                <div class="card mt-3">
                    <form action="" method="post">
                        <div class="card-header">
                            <h3 class="card-title">Update User</h3>
                        </div>
                        <div class="card-body">

                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="hidden" name="username" class="form-control" value="<?= $user['username'] ?>">
                                <input type="text" disabled class="form-control" value="<?= $user['username'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" value="<?= $user['password'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" value="<?= $user['email'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" class="form-control" value="<?= $user['nama'] ?>">
                            </div>
                            <div class="form-group">
                                <label>Level</label>
                                <!-- <?= $user['level'];?> -->
                                <select class="form-control select2" style="width: 100%;" name='level'>
                                <?php foreach ($level as $key) : ?>
                                    <?php if ($key == $user['level']) : ?>
                                        <option value="<?= $key ?>" selected><?= $key ?></option>
                                    <?php else : ?>
                                        <option value="<?= $key ?>"><?= $key ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                </select>
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
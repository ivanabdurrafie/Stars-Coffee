<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <b>Stars</b>Coffee
        </div>
        <?php if ($this->session->flashdata('pesan') == TRUE) : ?>
            <div class="alert alert-info alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <?php echo $this->session->flashdata('pesan'); ?>
            </div>
        <?php endif; ?>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <?= form_open('login/auth') ?>
                <form action="" method="post">
                    <div class="input-group mb-3">
                        <input type="text" name='username' class="form-control" placeholder="Username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name='password' class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-8">
                            <p class="mb-0">
                                <a href="<?= base_url(); ?>login/register" class="text-center">Sign Up</a>
                            </p>
                        </div>
                        <div class="col-4">
                            <button type="submit" name='submit' class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <?php form_close(); ?>

            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
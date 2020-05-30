<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 ftco-animate">
                <?= form_open_multipart('user/home/pay') ?>
                <form action="" class="billing-form ftco-bg-dark p-3 p-md-5" method="post" enctype="multipart/form-data">
                    <h3 class="mb-4 billing-heading">Checkout</h3>
                    <div class="row align-items-end">
                        <div class="w-100"></div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nama">Nama Lengkap</label>
                                <input type="text" class="form-control"  name="nama">
                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nama">Alamat</label>
                                <textarea name="alamat" id="" cols="30" rows="5" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nomor">Telepon</label>
                                <input type="tel" class="form-control" name="nomor" >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="bukti">Bukti</label>
                                <input type="file" class="form-control" name="receipt">
                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-12">
                            <div class="form-group mt-4">
                                <button class="btn btn-primary py-3 px-4">Konfirmasi</button>
                            </div>
                        </div>
                    </div>
                </form><!-- END -->
                <?= form_close(); ?>
            </div> <!-- .col-md-8 -->
        </div>
</section> <!-- .section -->
<div class="content-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-12 align-center">
                <div class="card mt-3">
                    <div class="card-header">
                        <i class="fas fa-user"></i>
                        <?php foreach ($user as $usr) : ?>
                            <span><b>Transaksi <?= $usr['username'] ?> pada <?= $usr['tanggal'] ?></b></span>
                        <?php endforeach; ?>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered">
                            <tr>
                                <th>Penerima</th>
                                <th>Alamat</th>
                                <th>Bukti Pembayaran</th>
                            </tr>
                            <?php $no = 1;
                            foreach ($transaksi as $tr) : ?>
                                <tr>
                                    <td><?= $tr['nama'] . ' - ( ' . $tr['nomor'] . ' )' ?></td>
                                    <td><?= $tr['alamat'] ?></td>
                                    <td><img src="<?= base_url() . 'uploads/bukti/' . $tr['struk'] ?>" alt="bukti" width="400px"></td>
                                </tr>

                        </table>
                    </div>
                    <div class="card-footer">
                        <?php echo form_open('admin/transaksi/confirm/' . $tr['id_transaksi']) ?>
                        <form action="" method="post">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-check"></i>
                                <span>Konfirmasi Pesanan</span>
                            </button>
                        </form>
                        <?php form_close() ?>
                    </div>
                <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
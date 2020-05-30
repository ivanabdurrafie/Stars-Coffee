<section class="ftco-section ftco-cart">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ftco-animate">
                <?php foreach ($user as $u) : ?>
                    <h4>Riwayat Transaksi : <span><?= $u->nama ?></span></h4>
                <?php endforeach; ?>
                <div class="cart-list">
                    <table class="table">
                        <thead class="thead-primary">
                            <tr class="text-center">
                                <th>Tanggal</th>
                                <th>Grand Total</th>
                                <th>Status</th>
                                <th>Proses</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($kumpulanTransaksi as $tr) : ?>
                                <tr class="text-center">
                                    <td><?= date('d F Y', strtotime($tr->tanggal)) ?></td>
                                    <td>Rp. <?= number_format($tr->grandtotal) ?></td>
                                    <td>
                                        <?php
                                        if ($tr->status == 1) {
                                            echo "Waiting for payment";
                                        } else if ($tr->status == 0) {
                                            echo "Shipped :)";
                                        } else {
                                            echo "Wait for confirm";
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        if ($tr->status != 1) {
                                            echo "none";
                                        } else {
                                        ?>
                                            <a href="<?= base_url() . 'user/home/receipt' ?>" class="btn btn-primary btn-outline-primary">
                                                <i class="fas fa-money-bill-wave-alt"></i>
                                                <span>Upload Bukti</span>
                                            </a>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            <!-- END TR-->

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
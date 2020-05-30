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
                            <?php $no = 1;
                            foreach ($transaksi as $tr) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $tr['nama'] ?></td>
                                    <td>Rp. <?= number_format($tr['subtotal']) ?></td>
                                    <td>X <?= $tr['qty'] ?></td>
                                    <td>Rp. <?= number_format($tr['qty'] * $tr['subtotal']) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                    <div class="card-footer">
                        <h1>
                            <span style="float:left; font-size:15pt;">
                                Total :
                            </span>

                            <span style="float:right; font-size:15pt;">
                                Rp. <?= number_format($tr['grandtotal']) ?>
                            </span>


                        </h1>
                        <br><br>
                        <h3>
                            <i class="fas fa-map-marker-alt    "></i>
                            <span><b>Shipped to :</b></span>
                        </h3>
                        <br>
                        <?php foreach ($pengiriman as $pr) : ?>
                            <p>
                                <?= $pr['nama'] . ' - ( ' . $pr['nomor'] . ' )' ?>
                            </p>
                            <p>
                                Alamat <?= $pr['alamat'] ?>
                            </p>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
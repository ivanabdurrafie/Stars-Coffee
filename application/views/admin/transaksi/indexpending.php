<div class="content-wrapper">
  <section class="content">
    <div class="row">
      <div class="col-12">
        <div class="card mt-3">
          <div class="card-header">
            <h3 class="card-title">Transaksi Pending</h3>
          </div>
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Tanggal</th>
                  <th>Username</th>
                  <th>GrandTotal</th>
                  <th>Proses</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1 ?>
                <?php foreach ($transaksipending as $tr) : ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $tr['tanggal'] ?></td>
                    <td><?= $tr['username'] ?></td>
                    <td>Rp. <?= number_format($tr['grandtotal']) ?></td>
                    <td>
                      <a href="<?= base_url(); ?>admin/transaksi/detailpending/<?= $tr['id_transaksi']; ?>" class="fa fa-eye"> Detail</a>
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
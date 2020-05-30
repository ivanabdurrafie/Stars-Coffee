<div class="content-wrapper">
  <section class="content">
    <div class="row">
      <div class="col-12">
        <?php if ($this->session->flashdata('flash-data')) : ?>
          <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            Produk <strong> Berhasil </strong> <?= $this->session->flashdata('flash-data'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

        <?php endif; ?>
        <div class="card mt-3">
          <div class="card-header">
            <h3 class="card-title">Produk</h3>&nbsp;&nbsp;
            <a href="<?= base_url(); ?>admin/produk/add" class="btn btn-primary align-content-end"><i class="nav-icon fas fa-plus"></i>Tambah</a>
          </div>
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID Produk</th>
                  <th>Kategori</th>
                  <th>Nama Produk</th>
                  <th>Harga</th>
                  <th>Gambar</th>
                  <th>Proses</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($produk as $prd) : ?>
                  <tr>
                    <td><?= $prd['id_produk'] ?></td>
                    <td><?= $prd['kategori'] ?></td>
                    <td><?= $prd['nama'] ?></td>
                    <td>Rp. <?= number_format($prd['harga']) ?></td>
                    <td><img src="<?= base_url().'uploads/produk/'.$prd['img'] ?>" width="100px"  alt="product-img"></td>
                    <td>
                      <a href="<?= base_url(); ?>admin/produk/detail/<?= $prd['id_produk']; ?>" class="btn btn-primary"><i class='fa fa-eye'></i></a>
                      <a href="<?= base_url(); ?>admin/produk/delete/<?= $prd['id_produk']; ?>" class="btn btn-danger"><i class='fa fa-trash'></i></a>
                      <a href="<?= base_url(); ?>admin/produk/update/<?= $prd['id_produk']; ?>" class="btn btn-warning"><i class='fa fa-edit'></i></a>
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
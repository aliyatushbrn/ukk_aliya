<div class="mt-1 mb-3">
  <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
    Tambah Produk
  </button>

  <?= $this->session->flashdata('notifikasi') ?>

  <!-- Modal -->
  <div class="modal fade" id="basicModal" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel1">Tambah Produk</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="<?= base_url('produk/simpan') ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="row">
              <div class="col mb-3">
                <label class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama" placeholder="Nama Produk" required>
              </div>
            </div>
            <div class="row">
              <div class="col mb-3">
                <label for="emailBasic" class="form-label">Harga</label>
                <input type="number" class="form-control" name="harga" placeholder="Harga Produk" required>
              </div>
              <div class="col mb-3">
                <label for="emailBasic" class="form-label">Stok</label>
                <input type="number" class="form-control" name="stok" placeholder="Stok" required>
              </div>
            </div>
            <div class="col mb-3">
              <label class="form-label">Kode Produk</label>
              <input type="text" name="kode_produk" class="form-control" placeholder="Kode Produk" required>
            </div>
            <div class="col mb-3">
              <label class="form-label">Gambar</label>
              <input type="file" name="gambar" class="form-control" placeholder="Gambar Produk" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="card">
  <h5 class="card-header">Tabel Produk</h5>
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Kode Produk</th>
          <th>Stok</th>
          <th>Harga</th>
          <th>Gambar</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        <?php $no = 1;
        foreach ($user as $row) { ?>
          <tr>
            <td>
              <?= $no; ?>
            </td>
            <td>
              <?= $row['nama'] ?>
            </td>
            <td>
              <?= $row['kode_produk'] ?>
            </td>
            <td>
              <?= $row['stok'] ?>
            </td>
            <td>Rp.
              <?= number_format($row['harga']) ?>
            </td>
            <td><img src="<?= $row['gambar'] ?>" alt="Gambar Produk" style="max-width: 100px;"></td>
            <td>
              <a onClick="return confirm('Yakin Hapus Data?')" href="<?= base_url('produk/hapus/' . $row['id_produk']) ?>"
                class="btn btn-sm btn-danger">Hapus</a>
              <a href="<?= base_url('produk/edit/' . $row['id_produk']) ?>" class="btn btn-sm btn-warning">Edit</a>
            </td>
          </tr>
          <?php $no++;
        } ?>
      </tbody>
    </table>
  </div>
</div>
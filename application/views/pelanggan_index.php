<div class="mt-1 mb-3" >
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
            Tambah Pelanggan
          </button>

        <?= $this->session->flashdata('notifikasi') ?>

            <!-- Modal -->
            <div class="modal fade" id="basicModal" tabindex="-1" style="display: none;" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Tambah Pelanggan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="<?= base_url('pelanggan/simpan')?>" method="post">
                    <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama" placeholder="Nama Pelanggan" required>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="emailBasic" class="form-label">Alamat</label>
                            <input type="text" class="form-control" name="alamat" placeholder="Alamat" required>
                        </div>
                        <div class="col mb-0">
                            <label for="emailBasic" class="form-label">No Telp (WA)</label>
                            <input type="text" class="form-control" name="telp" placeholder="telp" required>
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
    <div class="mt-3"></div>
<div class="card">
  <h5 class="card-header">Tabel Pelanggan</h5>
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Alamat</th>
          <th>No Telp</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        <?php $no=1; foreach($user as $row) { ?>
        <tr>
          <td><?= $no; ?></td>
          <td><?= $row['nama'] ?></td>
          <td><?= $row['alamat'] ?></td>
          <td><?= $row['telp'] ?></td>
          <td>
          <a onClick="return confirm('Yakin Hapus Data?')" 
          href="<?= base_url('pelanggan/hapus/'.$row['id_pelanggan']) ?>" class="btn btn-sm btn-danger">Hapus</a>
            <a href="<?= base_url('pelanggan/edit/'.$row['id_pelanggan']) ?>"class="btn btn-sm btn-warning">Edit</a>
        </td>
        </tr>
       <?php $no++; 
    } ?>
      </tbody>
    </table>
  </div>
</div>
</div>
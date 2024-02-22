<!-- <form action="<?= base_url('laporan') ?>" method="get">
    <div class="modal-body">
        <div class="row">
            <div class="col">
                <label for="bulan" class="form-label">Pilih Bulan</label>
                <input type="month" class="form-control" id="bulan" name="bulan">
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Cari</button>
    </div>
</form> -->

<div class="card">
    <h5 class="card-header">Laporan Penjualan</h5>
    <div class="row">
        <div class="col-xs-12 table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Pelanggan</th>
                        <th>Total Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $total = 0; // Inisialisasi total harga
                    foreach ($penjualan as $data) {
                        ?>
                        <tr>
                            <td>
                                <?= $no++; ?>
                            </td>
                            <td>
                                <?= $data['tanggal'] ?>
                            </td>
                            <td>
                                <?= $data['nama_pelanggan'] ?>
                            </td>
                            <td>Rp.
                                <?= number_format($data['total_harga']) ?>
                            </td>
                        </tr>
                        <?php
                        // Tambahkan total harga dari data penjualan saat ini ke total harga keseluruhan
                        $total += $data['total_harga'];
                    } ?>
                    <!-- <tr>
                        <td colspan="3">Total Harga</td>
                        <td>Rp.
                            <?= number_format($total); ?>
                        </td>
                    </tr> -->
                </tbody>
            </table>

        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

</div>
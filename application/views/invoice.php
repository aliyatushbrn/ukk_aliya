<div class="card">
    <div class="card-body">
        <!-- title row -->
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header">
                    <i class="fa fa-opencart"></i> Zerina
                </h2>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- info row -->
        <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
                <strong>From</strong>
                <address>
                    <strong>Charming Beauty</strong><br>
                    Jakarta, Indonesia<br>
                    Phone: +62 896-8555-8518<br>
                    Email: Aliyatushbrn@gmail.com
                </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
                <strong>To</strong>
                <address>
                    <strong>
                        <?= $penjualan->nama; ?>
                    </strong><br>
                    <?= $penjualan->alamat; ?><br>
                    Contact Person:
                    <?= $penjualan->telp; ?>
                </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
                <b>Nomor Nota: #24
                    <?= $nota ?>
                </b>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Table row -->
        <div class="row">
            <div class="col-xs-12 table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Produk</th>
                            <th>Produk</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $total = 0;
                        $no = 1;
                        foreach ($detail as $row) { ?>
                            <tr>
                                <td>
                                    <?= $no; ?>
                                </td>
                                <td>
                                    <?= $row['kode_produk'] ?>
                                </td>
                                <td>
                                    <?= $row['nama'] ?>
                                </td>
                                <td>
                                    <?= $row['jumlah'] ?>
                                </td>
                                <td>Rp.
                                    <?= number_format($row['harga']) ?>
                                </td>
                                <td>Rp.
                                    <?= number_format($row['jumlah'] * $row['harga']) ?>
                                </td>
                            </tr>
                            <?php
                            $total += $row['jumlah'] * $row['harga'];
                            $no++;
                        } ?>
                        <tr>
                            <td colspan="5">Total Harga</td>
                            <td>Rp.
                                <?= number_format($total); ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- This row will not appear when printing -->
        <div class="row no-print">
            <div class="col-xs-12">
                <button onclick="window.print()" class="btn btn-danger shadow float-right">Cetak Nota PDF <i
                        class="fa fa-print"></i></button>
            </div>
        </div>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
<div class="container-fluid">
    <div class="row mr-4">
        <div class="col-9 pt-5 pl-5">
            <h3>Data Transaksi</h3>
        </div>
        <?= $this->session->flashdata('pesan');
        ?>
    </div>
    <div class="row">
        <div class="col-12 py-3 px-5">
            <?php if ($tr) { ?>
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Nama Pembeli</th>
                            <th>Total Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        foreach ($tr as $row) { ?>
                            <tr>
                                <th><?= $i + 1 ?></th>
                                <td><?= $row['tgl'] ?></td>
                                <td><?= $row['nama_pembeli'] ?></td>
                                <td>Rp. <?= $total[$i] ?></td>
                            </tr>
                        <?php $i++;
                        } ?>

                    </tbody>
                </table>
            <?php } else {
                echo "<h4>Data transaksi kosong</h4>";
            } ?>
        </div>
    </div>
</div>
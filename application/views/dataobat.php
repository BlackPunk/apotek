<div class="container-fluid">
    <div class="row mr-4">
        <div class="col-9 pt-5 pl-5">
            <h3>Data Obat</h3>
        </div>
        <?= $this->session->flashdata('pesan');
        ?>
    </div>
    <div class="row">
        <div class="col-12 py-3 px-5">
            <?php if ($obat) { ?>
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Obat</th>
                            <th>Suplier</th>
                            <th>produsen</th>
                            <th>harga</th>
                            <th>Jumlah Stok</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($obat as $row) { ?>
                            <tr>
                                <th><?= $i ?></th>
                                <td><?= $row['nama'] ?></td>
                                <td><?= $row['nama_suplier'] ?></td>
                                <td><?= $row['produsen'] ?></td>
                                <td><?= $row['harga'] ?></td>
                                <td><?= $row['qty'] ?></td>
                                <td>
                                    <a href="<?= base_url('main/editobat/') . $row['kode'] ?>"><button type="button" class="btn btn-sm btn-outline-success"><i class="far fa-user-cog"></i></button></a>
                                    <a href="<?= base_url('main/hapusobat/') . $row['kode'] ?>"><button type="button" class="btn btn-sm btn-outline-success"><i class="far fa-trash"></i></button></a>
                                </td>
                            </tr>
                        <?php $i++;
                        } ?>

                    </tbody>
                </table>
            <?php } else {
                echo "<h4>Data obat kosong</h4>";
            } ?>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row mr-4">
        <div class="col-9 pt-5 pl-5">
            <h3>Data Admin</h3>
        </div>
        <?= $this->session->flashdata('pesan');
        ?>
    </div>
    <div class="row">
        <div class="col-12 py-3 px-5">
            <?php if ($user) { ?>
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Admin</th>
                            <th>Nama Admin</th>
                            <th>Username</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($user as $row) { ?>
                            <tr>
                                <th><?= $i ?></th>
                                <td><?= $row['nama'] ?></td>
                                <td><?= $row['username'] ?></td>
                                <td><?= $row['password'] ?></td>
                                <td>
                                    <a href="<?= base_url('main/editsuplier/') . $row['id'] ?>"><button type="button" class="btn btn-sm btn-outline-success"><i class="far fa-user-cog"></i></button></a>
                                    <a href="<?= base_url('main/hapussuplier/') . $row['id'] ?>"><button type="button" class="btn btn-sm btn-outline-success"><i class="far fa-trash"></i></button></a>
                                </td>
                            </tr>
                        <?php $i++;
                        } ?>

                    </tbody>
                </table>
            <?php } else {
                echo "<h4>Data Admin kosong</h4>";
            } ?>
        </div>
    </div>
</div>
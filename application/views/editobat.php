<div class='container'>
    <div class="row">
        <div class="col-12 py-5">
            <?= $this->session->flashdata('pesan');
            ?>
            <form method="post" action="<?= base_url('main/editobat/') . $obat['kode_obat'] ?>">
                <input type="hidden" class="form-control" name="id" value="<?= $obat['kode_obat'] ?>" required>
                <div class="form-group">
                    <label for="suplier">Suplier</label>
                    <select class="form-control" name="suplier" required>
                        <option>Pilih</option>
                        <?php foreach ($suplier as $row) { ?>
                            <option value="<?= $row['id_suplier'] ?>" <?php if ($row['id_suplier'] == $obat['id_suplier']) echo 'selected' ?>><?= $row['nama_suplier'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="nama">nama obat</label>
                    <input type="text" class="form-control" name="nama_obat" value="<?= $obat['nama'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="produsen">produsen</label>
                    <input type="text" class="form-control" name='produsen' value="<?= $obat['produsen'] ?>" required>
                </div>

                <div class="form-group">
                    <label for="harga">harga</label>
                    <input type="text" class="form-control" name="harga" value="<?= $obat['harga'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="jumlahstok">jumlah stok</label>
                    <input type="text" class="form-control" name="qty" value="<?= $obat['qty'] ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
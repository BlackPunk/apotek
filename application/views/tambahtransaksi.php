<div class='container'>
    <div class="row">
        <div class="col-12 py-5">
            <form method="POST" action="<?= base_url('main/tambahtransaksi') ?>">
                <div class="form-group">
                    <label for="nama">Nama Pembeli</label>
                    <input type="nama" class="form-control" id="nama1" name="name">
                </div>

                <div class="form-group">
                    <label for="suplier">Obat</label>
                    <select class="form-control" name="obat">
                        <option>disini ntar pilihan obatnya</option>
                        <?php foreach ($obat as $row) { ?>
                            <option value="<?= $row['kode_obat'] ?>"><?= $row['nama'] ?></option>
                        <?php } ?>
                    </select>
                    <button class="btn btn-primary">Tambah</button>
                </div>

                <table class="table table-hover table-dark">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Obat</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Total Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>1</th>
                            <td>.</td>
                            <td>.</td>
                            <td>.</td>
                            <td>.</td>
                            <td>.</td>
                        </tr>
                    </tbody>
                </table>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
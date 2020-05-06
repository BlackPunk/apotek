<div class='container'>
    <div class="row">
        <div class="col-12 py-5">
            <?= $this->session->flashdata('pesan');
            ?>
            <form method="post" action="<?= base_url('main/editsuplier/') . $sup['id_suplier'] ?>">
                <input type="hidden" name="id" value="<?= $sup['id_suplier'] ?>">
                <div class="form-group">
                    <label for="nama1">Nama Suplier</label>
                    <input type="text" class="form-control" name="name" value="<?= $sup['nama_suplier'] ?>">
                </div>
                <div class="form-group">
                    <label for="alamat1">alamat</label>
                    <input type="text" class="form-control" name="alamat" value="<?= $sup['alamat'] ?>">
                </div>
                <div class="form-group">
                    <label for="kota1">kota</label>
                    <input type="text" class="form-control" name="kota" value="<?= $sup['kota'] ?>">
                </div>

                <div class="form-group">
                    <label for="telepon1">telepon</label>
                    <input type="text" class="form-control" name="nohp" value="<?= $sup['nohp'] ?>">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
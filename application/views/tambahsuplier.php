<div class='container'>
    <div class="row">
        <div class="col-12 py-5">
            <form method="post" action="<?= base_url('main/tambahsuplier') ?>">
                <div class="form-group">
                    <label for="nama1">Nama Suplier</label>
                    <input type="text" class="form-control" name="name">
                    <?php echo form_error('name'); ?>
                </div>
                <div class="form-group">
                    <label for="alamat1">alamat</label>
                    <input type="text" class="form-control" name="alamat">
                    <?php echo form_error('alamat'); ?>
                </div>
                <div class="form-group">
                    <label for="kota1">kota</label>
                    <input type="text" class="form-control" name="kota">
                    <?php echo form_error('kota'); ?>
                </div>

                <div class="form-group">
                    <label for="telepon1">telepon</label>
                    <input type="text" class="form-control" name="nohp">
                    <?php echo form_error('nohp'); ?>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
<div class='container'>
    <div class="row">
        <div class="col-12 py-5">
            <form method="post" action="<?= base_url('main/tambahAdmin') ?>">
                <div class="form-group">
                    <label for="nama1">Nama Admin</label>
                    <input type="text" class="form-control" name="name">
                    <?php echo form_error('name'); ?>
                </div>
                <div class="form-group">
                    <label for="username1">Username</label>
                    <input type="text" class="form-control" name="username">
                    <?php echo form_error('alamat'); ?>
                </div>
                <div class="form-group">
                    <label for="pass1">Password</label>
                    <input type="text" class="form-control" name="password">
                    <?php echo form_error('kota'); ?>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
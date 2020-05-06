<div class='container'>
    <div class="row">
        <div class="col-12 py-5">
            <form method="post" action="<?= base_url('main/editadmin/') . $admin['id'] ?>">
                <input type="hidden" name="id" value="<?= $admin['id'] ?>">
                <div class="form-group">
                    <label for="nama1">Nama Admin</label>
                    <input type="text" class="form-control" name="name" value="<?= $admin['nama'] ?>">
                    <?php echo form_error('name'); ?>
                </div>
                <div class="form-group">
                    <label for="username1">Username</label>
                    <input type="text" class="form-control" name="username" value="<?= $admin['username'] ?>">
                    <?php echo form_error('username'); ?>
                </div>
                <div class="form-group">
                    <label for="pass1">Password</label>
                    <input type="text" class="form-control" name="password" value="<?= $admin['password'] ?>">
                    <?php echo form_error('password'); ?>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
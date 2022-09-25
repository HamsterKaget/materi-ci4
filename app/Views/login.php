<?= $this->extend("layouts/template"); ?>

<?= $this->section("content"); ?>
    <div class="container my-5 col-4">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Form Login</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col mx-auto">
                        <form action="<?= base_url('registrasi/simpan'); ?>" method="post">
                            <?= csrf_field() ?>
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" required>
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" required>
                            <br>
                            <input type="submit" class="btn btn-success" value="Login">
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>

<?= $this->endSection(); ?>
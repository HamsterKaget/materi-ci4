<?= $this->extend("layouts/template"); ?>

<?= $this->section("content"); ?>
    <div class="container my-5 col-4">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Form Login</h3>
            </div>
            <div class="card-body">
                <?php if(session()->getFlashdata('login_failed')) : ?>
                    <div class="row">
                        <div role="alert" class="alert alert-danger col-lg-4 mx-auto">
                            <?= session()->getFlashdata('login_failed'); ?>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="row">
                    <div class="col mx-auto">
                        <form action="<?= base_url('login/proses-login'); ?>" method="post">
                            <?= csrf_field() ?>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" <?php if($validation->hasError('email')) echo "is-invalid" ?> value="<?= old('email') ?>" name="email" required>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('email'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" <?php if($validation->hasError('password')) echo "is-invalid" ?> value="<?= old('password') ?>" name="password" required>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('password'); ?>
                                </div>
                            </div>
                            
                            
                            <input type="submit" class="btn btn-primary" value="Login">
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>

<?= $this->endSection(); ?>
<?= $this->extend("layouts/template"); ?>

<?= $this->section("content"); ?>
    <div class="container my-5 col-4">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Form Registrasi</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                    <?php if(session()->getFlashdata('gagal')) : ?>
                        <div class="alert alert-danger" role="alert">
                            <ul>
                                <?php $ab = session()->getFlashdata(); ?>
                                <?php foreach($ab['gagal'] as $error) :?>
                                    <li><?= $error; ?></li>
                                <?php endforeach ?>
                                
                                
                                
                            </ul>
                        </div>
                        <?php endif; ?>
                        <?php if(session()->getFlashdata('sukses')) : ?>
                        <div class="alert alert-success" role="alert">
                            <p><?= session()->getFlashdata('sukses') ?></p>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col mx-auto">
                        <form action="<?= base_url('registrasi/simpan'); ?>" method="post">
                            <?= csrf_field() ?>
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" name="nama" required>
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" required>
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" required>
                            <label for="confirm_pass">Konfirmasi Password</label>
                            <input type="password" class="form-control" name="confirm_pass" required>
                            <br>
                            <input type="submit" class="btn btn-success" value="Register">
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>

<?= $this->endSection(); ?>
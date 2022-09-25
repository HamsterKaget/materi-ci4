<?= $this->extend("./layouts/template"); ?>

<?= $this->section("content"); ?>
    <div class="container my-3 w-50">
        <div class="card">
            <div class="card-header">
                <h3>Edit Data Siswa</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                    <?php if(session()->getFlashdata('gagal')) : ?>
                        <div class="alert alert-danger" role="alert">
                            <ul>
                                <?php $error = session()->getFlashdata(); ?>
                                <?php foreach($error['gagal'] as $error) :?>
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
                        <form action="<?= base_url('siswa/'.$siswa['id']); ?>" method="post">
                            <?php csrf_field(); ?>
                            <input type="hidden" name="_method" value="PUT">
                            <ul class="list-group">
                                Nama <input type="text" name="name" value="<?= $siswa['name']; ?>" required>
                                NIS <input type="text" name="nis" value="<?= $siswa['nis']; ?>" required>
                                Email <input type="email" name="email" value="<?= $siswa['email']; ?>" required>
                            </ul>
                            <hr>
                            <a href="<?= base_url('siswa'); ?>" class="btn btn-primary">Kembali</a>
                            <input type="submit" value="Ubah Data" class="btn btn-success">
                        </form>
                    </div> 
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection(); ?>
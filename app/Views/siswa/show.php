<?= $this->extend("./layouts/template"); ?>

<?= $this->section("content"); ?>
    <div class="container d-flex justify-content-center">
        <div class="card my-3 w-50">
            <div class="card-header">
                <h3>Profil Siswa</h3>
            </div>
            <div class="card-body">
                <div class="row ml-2">
                    <h4 class="col-4">Nama</h4>
                    <h4>: <?= $siswa['name']; ?></h4>
                </div>
                <div class="row ml-2">
                    <h4 class="col-4">NIS</h4>
                    <h4>: <?= $siswa['nis']; ?></h4>
                </div>
                <div class="row ml-2">
                    <h4 class="col-4">Email</h4>
                    <h4>: <?= $siswa['email']; ?></h4>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection(); ?>
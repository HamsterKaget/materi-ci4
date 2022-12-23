<?= $this->extend("./layouts/template"); ?>

<?= $this->section("content"); ?>

    <?php if(session()->get('role') === 'admin') : ?>
    <div class="container">
        <div class="card my-3">
            <div class="card-header">
                <h3>Data Siswa</h3>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <a href="<?= base_url('siswa/new') ?>" class="btn btn-success mb-4">Tambah Data Siswa</a>
                    <a href="<?= base_url('pdf/generate'); ?>" target="_blank" rel="noopener noreferrer" class="btn btn-secondary mb-4">Eksport</a>
                </div>
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>Nama</th>
                        <th>NIS</th>
                        <th>Email</th>
                        <th>AKSI</th>
                    </tr>
                    <?php foreach($siswa as $s) :?>
                    <tr>
                        <td><?= $s['name']; ?></td>
                        <td><?= $s['nis']; ?></td>
                        <td><?= $s['email']; ?></td>
                        <td>
                            <ul>
                                <a href="<?= base_url('siswa/'.$s['id']); ?>" class="btn btn-success mr-1">Show</a>
                                <a href="<?= base_url('siswa/'.$s['id'].'/edit'); ?>" class="btn btn-secondary mr-1">Edit</a>
                                <form action="<?= base_url('siswa/'.$s['id']); ?>" method="post">
                                    <input type="hidden" name="_method" value="delete">
                                    <button type="submit" class="btn btn-danger mr-1 mt-1 " onclick="return confirm('Hapus Data ?')" >
                                        Delete
                                    </button>
                                    
                                </form> 
                            </ul>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
    <?php else : ?>
        <div class="alert alert-danger" role="admin">
            Anda tidak memiliki akses untuk melihat data
        </div>
    <?php endif; ?>
<?= $this->endSection(); ?>


<table class="table table-bordered table-striped" border='1' width="100%" style="border: collapse" align="center">
    <tr bgcolor="#6EE7B7">
        <th>Nama</th>
        <th>NIS</th>
        <th>Email</th>
        <!-- <th>AKSI</th> -->
    </tr>
    <?php foreach($siswa as $s) :?>
    <tr>
        <td><?= $s['name']; ?></td>
        <td><?= $s['nis']; ?></td>
        <td><?= $s['email']; ?></td>
    </tr>
    <?php endforeach; ?>
</table>

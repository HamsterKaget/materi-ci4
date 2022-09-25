<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Beranda</title>
  </head>
  <body>
    <nav class="navbar navbar-expand bg-dark">
        <ul class="nav">
            <li><a href="<?= base_url('home') ?>" class="nav-link">Home</a></li>
            <li><a href="<?= base_url('infokegiatan') ?>" class="nav-link">Info Kegiatan</a></li>
            <li><a href="<?= base_url('datasiswa') ?>" class="nav-link">Data Siswa</a></li>
        </ul>

        <ul class="navbar-nav ml-auto">
          <li class="nav-link">
            <a href="<?= base_url('login') ?>" class="btn btn-outline-primary">Login</a>
          </li>
          <li class="nav-link">
            <a href="<?= base_url('registrasi') ?>" class="btn btn-outline-success">Registrasi</a>
          </li>
        </ul>
    </nav>

    <?= $this->renderSection("content"); ?>
    
    <footer class="fixed-bottom bg-dark text-white">
        <div class="text-center">
            SMA 404
        </div>
    </footer>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

  </body>
</html>
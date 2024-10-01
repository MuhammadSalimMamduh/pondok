<?php
require_once '../database/config.php';
?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ribath Al Musyarraf</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../assets_adminlte/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets_adminlte/dist/css/adminlte.min.css">
  <link rel="shortcut icon" href="../assets_adminlte/img/pondok.png">
</head>

<body class="hold-transition layout-top-nav">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand-md navbar-light navbar-white" style="background-color: #b5ab70;">
      <div class="container">
        <a href="../assets_adminlte/index3.html" class="navbar-brand">
          <img src="../assets_adminlte/img/pondok.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">
            <font color="#ffffff"><b>Formulir Pendaftaran</b></font>
          </span>
        </a>

        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse order-3" id="navbarCollapse">

        </div>
    </nav>
    <!-- /.navbar -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container">
          <div class="row mb-2">

          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header" style="background-color: #b5ab70;">
                  <h3 class="card-title"><font color="#ffffff"><i class="nav-icon fas fa-money-bill"></i> Pembelian Formulir Pendaftaran</font></h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="prosestambah.php" method="post" enctype="multipart/form-data">
                  <div class="card-body">

                    <div class="form-group">
                      <label for="nama">NISN</label>
                      <input type="text" class="form-control" name="nisn" id="nisn" placeholder="Masukkan NISN" autofocus required>
                    </div>
                    <div class="form-group">
                      <label for="nama">Nama Lengkap</label>
                      <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan nama lengkap" required>
                    </div>
                    <div class="form-group">
                      <label for="nomer">Nomor WA</label>
                      <input type="text" class="form-control" name="nomer" id="nomer" placeholder="Masukkan nomor WA" required>
                    </div>
                    <div class="form-group">
                      <label for="bayar">Bukti bayar</label>
                      <input type="file" class="form-control" name="bayar" id="bayar" accept="image/*" placeholder="Bukti bayar formulir" required>
                    </div>
                    <?php
                    
                    $ambilrek = mysqli_query($koneksi,"SELECT * FROM tbl_rekening WHERE id=1") or die (mysqli_error($koneksi));
                    $arrambil = mysqli_fetch_assoc($ambilrek);
                    $nama = $arrambil['nama'];
                    $rekening = $arrambil['rekening'];
                    $tujuan = $arrambil['tujuan'];

                    $ambilrek1 = mysqli_query($koneksi,"SELECT * FROM tbl_rekening WHERE id=2") or die (mysqli_error($koneksi));
                    $arrambil1 = mysqli_fetch_assoc($ambilrek1);
                    $nama1 = $arrambil1['nama'];
                    $rekening1 = $arrambil1['rekening'];
                    $tujuan1 = $arrambil1['tujuan'];

                    $ambilrek2 = mysqli_query($koneksi,"SELECT * FROM tbl_rekening WHERE id=3") or die (mysqli_error($koneksi));
                    $arrambil2 = mysqli_fetch_assoc($ambilrek2);
                    $nama2 = $arrambil2['nama'];
                    $rekening2 = $arrambil2['rekening'];
                    $tujuan2 = $arrambil2['tujuan'];
                    ?>
                    <div class="row">
                    <div class="col-lg-3 col-6">
                      <!-- small box -->
                      <div class="small-box" style="background-color: #0d56c7;">
                        <div class="inner">
                        <font color="#ffffff">
                          <h3><?=$nama;?></h3>
                          <p id="rekening1"><?=$rekening;?></p>
                          <p><?=$tujuan;?></p>
                          </font>
                        </div>
                        <div class="icon">
                       <i class="ion ion-stats-bars"></i>
                      </div>
                       <button type="button" class="btn btn-sm btn-block " onclick="copyRekening('rekening1')"> 
                       <font color="#ffffff"><i class="fas fa-copy"></i>&nbsp; Salin Rekening</font>
                        </button>
                      </div>
                    </div>

                    <div class="col-lg-3 col-6">
                      <!-- small box -->
                      <div class="small-box" style="background-color: #FFA500;">
                        <div class="inner">
                          <h3><?=$nama1;?></h3>

                          <p id="rekening2"><?=$rekening1;?></p>
                          <p><?=$tujuan1;?></p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-bag"></i>
                        </div>
                        <button type="button" class="btn btn-sm btn-block " onclick="copyRekening('rekening2')"> 
                        <font color="#ffffff">   <i class="fas fa-copy"></i>&nbsp; Salin Rekening</font>                        </button>
                      </div>
                    </div>
                    <!-- Toast Notification -->

                    <div class="col-lg-3 col-6">
                      <!-- small box -->
                      <div class="small-box bg-info">
                        <div class="inner">
                          <h3><?=$nama2;?></h3>
                          <p id="rekening3"><?=$rekening2;?></p>
                          <p><?=$tujuan2;?></p>
                        </div>
                        <div class="icon">
                       <i class="ion ion-stats-bars"></i>
                      </div>
                       <button type="button" class="btn btn-sm btn-block " onclick="copyRekening('rekening3')"> 
                       <font color="#ffffff">   <i class="fas fa-copy"></i>&nbsp; Salin Rekening</font>
                        </button>
                      </div>
                    </div>

                    
                    </div>
                    
                    <div class="card-footer">
                      <button type="submit" name="beli" class="btn btn-secondary btn-block"><i class="nav-icon fas fa-upload"> </i> Konfirmasi Pembayaran Formulir</button>

                    </div>
                </form>
              </div>
              <!-- /.card -->
            </div>

          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="../assets_adminlte/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../assets_adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../assets_adminlte/dist/js/adminlte.min.js"></script>

  <script>
    const inputField = document.getElementById('nisn');

    inputField.addEventListener('input', function() {
      // Menghapus semua karakter selain angka
      this.value = this.value.replace(/\D/g, '');

      // Jika panjang input lebih dari 10, potong menjadi 10
      if (this.value.length > 10) {
        this.value = this.value.slice(0, 10);
      }
    });

    inputField.addEventListener('blur', function() {
      // Validasi panjang input saat kehilangan fokus
      if (this.value.length !== 10) {
        this.setCustomValidity('Input harus berisi tepat 10 angka.');
      } else {
        this.setCustomValidity(''); // Tidak ada error jika valid
      }

      // Memicu validasi ulang
      this.reportValidity();
    });
  </script>

  <script>
    const inputNama = document.getElementById('nama');

    inputNama.addEventListener('input', function(e) {
      // Mengizinkan hanya huruf, apostrof ('), titik (.), dan koma (,)
      this.value = this.value.replace(/[^a-zA-Z',. ]/g, '');
    });
  </script>

  <script>
    const inputkontak = document.getElementById('nomer');

    inputkontak.addEventListener('input', function(e) {

      // Menghapus semua karakter selain angka
      this.value = this.value.replace(/\D/g, '');

      // Menghapus pesan error ketika user sedang mengetik
      if (this.value.length >= 11 && this.value.length <= 13) {
        this.setCustomValidity(''); // Validasi kosong jika sudah valid
      }
    });

    inputkontak.addEventListener('blur', function() {
      // Validasi panjang input saat kehilangan fokus
      if (this.value.length < 11) {
        this.setCustomValidity('Minimal harus berisi 11 angka.');
      } else if (this.value.length > 13) {
        this.setCustomValidity('Maksimal hanya 13 angka yang diperbolehkan.');
      } else {
        this.setCustomValidity(''); // Tidak ada error jika valid
      }

      // Memicu validasi ulang (agar pesan error muncul di UI jika tidak valid)
      this.reportValidity();
    });
  </script>
<script>
  function copyRekening(id) {
    // Get the text from the <p> tag by its dynamic ID
    var rekeningText = document.getElementById(id).textContent;

    // Copy the text using Clipboard API
    navigator.clipboard.writeText(rekeningText)
       alert("Nomer Rekening berhasil di copy");
}
</script>

</body>

</html>
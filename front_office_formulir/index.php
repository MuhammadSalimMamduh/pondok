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
        <span class="brand-text font-weight-light"><font color="#ffffff"><b>Pendaftaran</b></font></span>
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

      <?php
      require_once '../database/config.php';
      $pglaktif = mysqli_query($koneksi,"SELECT * FROM tbl_aktivasi WHERE id=1") or die (mysqli_error($koneksi));
      $arraktif = mysqli_fetch_assoc($pglaktif);
      $tglbuka      = $arraktif['tgl_buka'];
      $tgl_tutup    = $arraktif['tgl_tutup'];
      $tgl_sekarang = date('Y-m-d');

      if ($tgl_sekarang>=$tglbuka && $tgl_sekarang<=$tgl_tutup){
        ?>
        <div class="row">
        <div class="col-lg-6">
        <div class="card card-secondary" >
            <div class="card-header" style="background-color: #b5ab70;">
              <h3 class="card-title"><i class= "nav-icon fas fa-file-pdf"></i> 1. Beli Formulir & Dapatkan kode Pendaftaran</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="proseskode.php" method="post">
              <div class="card-body">
              <div class="form-group">
                       Setelah anda memasukkan data pembelian, silahkan tunggu beberapa saat, Admin kami akan menghubungi anda melalui <b>nomor WA</b> yang anda masukkan untuk memberikan <b>kode formulir</b>, pastikan nomor WA anda <b>Valid</b>
                </div>
              <div class="card-footer">
              <a href="beli-formulir.php" class="btn btn-warning btn-block"><i class="nav-icon fas fa-hand-holding-usd"> </i>  Beli Formulir</a>
            
              </div>
            </form>
          </div>
          <!-- /.card -->
        </div>
      </div>

      <div class="col-lg-6">
        <div class="card card-secondary">
            <div class="card-header" style="background-color: #b5ab70;">
              <h3 class="card-title"><i class= "nav-icon fas fa-file-pdf"></i> 2. Isi Formulir Pendaftaran</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="proseskode.php" method="post">
              <div class="card-body">
              
                <div class="form-group">
                  <label for="nama">Kode Formulir</label>
                  <input type="nama" class="form-control" name="kode" id="kodeformulir" placeholder="Masukkan Kode Formulir yang ada dapatkan dari admin ketika melakukan pembayaran formulir" required>
                </div>
              <div class="card-footer">
              <button type="submit" name="cek" class="btn btn-secondary btn-block"><i class="nav-icon fas fa-upload"> </i> Cek Kode Pembayaran</button>
              </div>
            </form>
          </div>
      </div>
        </div>
      </div>
      <div class="row">
      <div class="col-lg-12">
        <div class="card card-secondary">
            <div class="card-header" style="background-color: #b5ab70;">
              <h3 class="card-title"><i class= "nav-icon fas fa-file-pdf"></i> 3. Upload Berkas Pendukung Daftar Ulang</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="prosesnik.php" method="post">
              <div class="card-body">
              <div class="form-group">
                       Setelah anda melakukan pengisian formulir, silahkan lakukan Daftar Ulang dan Melengkapi Berkas
                </div>
                <div class="form-group">
                  <label for="nik">NIK</label>
                  <input type="nik" class="form-control" name="nik" id="nik" placeholder="Silakan Masukan NIK yang sudah didaftarkan" required>
                </div>
              <div class="card-footer">
              <button type="submit" name="cek" class="btn btn-primary btn-block"><i class="nav-icon fas fa-upload"> </i> Lengkapi Berkas Berkas</button>
              
            
              </div>
            </form>
          </div>
          <!-- /.card -->
        </div>
      </div>
      </div>
      <?php
      }
      else
      {
        ?>

<div class="row">
      <div class="col-lg-12">
        <div class="card card-secondary">
            <div class="card-header" style="background-color: #b5ab70;">
              <h3 class="card-title"><i class= "nav-icon fas fa-exclamation"></i> PENGUMUMAN PENTING</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="prosesnik.php" method="post">
              <div class="card-body">
              <h4>
              <p><b>Penerimaan Santri Baru Belum Dibuka</b></p>
              Kami informasikan bahwa pendaftaran santri baru untuk tahun ajaran ini <b>belum dibuka.</b> Silakan pantau terus website ini atau hubungi kami untuk mendapatkan informasi lebih lanjut terkait jadwal pendaftaran.
              <p>Terima kasih atas pengertiannya.</p>
              </h4>
              </div>
            </form>
          </div>
          <!-- /.card -->
        </div>
      </div>
</div>
      <?php

      }
      ?>

        
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

</body>
</html>

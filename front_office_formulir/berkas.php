<?php
require_once '../database/config.php';
$nik = @$_GET['nik'];
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
        <div class="row">
          <div class="col-lg-12">
          <div class="card">
              <div class="card-header" style="background-color: #b5ab70;">
                <h3 class="card-title"><font color="#ffffff"><i class= "nav-icon fas fa-folder"></i> Unggah Berkas Pendaftaran</font></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="prosesberkas.php" method="post" enctype="multipart/form-data" id=modal-foto>
                <div class="card-body">
                <div class="form-group">
                  <?php
                  $nomertogel = @$_GET['nik'];
                  $qweri = mysqli_query($koneksi, "SELECT nama_lengkap FROM tbl_pendaftaran WHERE nik='$nomertogel'") or die(mysqli_error($koneksi));
                  $arrqweri = mysqli_fetch_assoc($qweri);
                  $nama = $arrqweri['nama_lengkap'];

                  $qrlihat = mysqli_query($koneksi, "SELECT * FROM tbl_berkas WHERE nik='$nomertogel'") or die(mysqli_error($koneksi));
                  if(mysqli_num_rows($qrlihat)>0){
                    $arrlihat = mysqli_fetch_assoc($qrlihat);
                    $foto = $arrlihat['foto'];
                    $akte = $arrlihat['fc_akte'];
                    $kk = $arrlihat['fc_kk'];
                    $kk = $arrlihat['fc_kk'];
                    $ijazah = $arrlihat['fc_ijazah'];


                  }else{
                    $foto = "../img/user.png";
                    $akte = "../img/kosong.png";
                    $kk = "../img/kosong.png";
                    $kk = "../img/kosong.png";
                    $ijazah = "../img/kosong.png";
                  }
                  ?>
                    <label for="nik">NIK</label>
                    <input type="number"  inputmode="numeric"  maxlength="3" pattern="[0-9]{1} - [0-9]{2} - [0-9]{3}" class="form-control" id="nik2" name="nik2" placeholder=" Masukkan NIK" value="<?=$nomertogel;?>" disabled>
                    <input type="number"  inputmode="numeric"  maxlength="3" pattern="[0-9]{1} - [0-9]{2} - [0-9]{3}" class="form-control" id="nik" name="nik" placeholder=" Masukkan NIK" value="<?=$nomertogel;?>" hidden>
                  </div>

                  <div class="form-group">
                  <label for="nik">Nama</label>
                  <input type="text" class="form-control" id="nik2" name="nama2" value="<?=$nama;?>" disabled>
                  <input type="text" class="form-control" id="nik" name="nama" value="<?=$nama;?>" hidden>
                  </div>

                  <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-primary">
                            <div class="card-header">
                            <h3 class="card-title"><i class= "nav-icon fas fa-file-pdf"></i> Dokumen yang perlu diunggah </h3>
                            </div>
                            <div class="card-body">
                                <table class="table table-sm table-striped table-bordered">
                                    <thead>
                                        <th width="5%">No.</th>
                                        <th>Berkas</th>
                                        <th>File Terunggah</th>
                                        <th>Aksi</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                1
                                            </td>
                                            <td>
                                               Foto (Background Merah)
                                            </td>
                                            <td>
                                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-lihatfoto"> <i class="nav-icon fas fa-eye"></i> Lihat Berkas</button>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-uploadfoto"> Unggah Berkas</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                2
                                            </td>
                                            <td>
                                               Akta Kelahiran
                                            </td>
                                            <td>
                                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-lihatakte"> <i class="nav-icon fas fa-eye"></i> Lihat Berkas</button>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-uploadakte"> Unggah Berkas</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                3
                                            </td>
                                            <td>
                                               Kartu Keluarga
                                            </td>
                                            <td>
                                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-lihatkk"> <i class="nav-icon fas fa-eye"></i> Lihat Berkas</button>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-uploadkk"> Unggah Berkas</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                4
                                            </td>
                                            <td>
                                               Ijazah Terakhir
                                            </td>
                                            <td>
                                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-lihatijazah"> <i class="nav-icon fas fa-eye"></i> Lihat Berkas</button>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-uploadijazah"> Unggah Berkas</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>

                        </div>
                    </div>
                   
                  </div>
                </div>      
                <!-- /.card-body -->
                <div class="card-footer">
                  <!-- <button type="submit" name="daftar" class="btn btn-secondary btn-block"><i class="nav-icon fas fa-check"> </i> Selesai</button> -->
                  <a href="../index.php" class="btn btn-success btn-block"><i class="nav-icon fas fa-check"></i> Selesai</a>
                </div>
              </form>
            </div>
            <!-- /.card -->


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

<!-- /.modal foto -->
<div class="modal fade" id="modal-uploadfoto">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header" style="background-color: #b5ab70">
            <h4 class="modal-title">
              <font color="#ffffff">Upload Foto</font>
            </h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form class="form-horizontal" method="POST" id="bukti" action="prosesuploadfoto.php" enctype="multipart/form-data">
            <div class="modal-body">
              <table>
                <thead>
                <tbody>
                <div class="form-group">
                      <label for="bayar">Upload Foto</label>
                      <input type="text" class="form-control" name="nik" id="nik" value="<?=$nomertogel;?>" hidden >
                      <input type="text" class="form-control" name="nama" id="nama" value="<?=$nama;?>" hidden >
                      <input type="file" class="form-control" name="foto" id="foto" accept="image/*" required>
                    </div>
                </tbody>
                </thead>
              </table>

            </div>
            <div class="modal-footer">
            <button type="submit" class="btn btn-sm btn-info" name="uploadfoto">
              Upload
            </button>
          </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal foto -->

    <!-- /.modal Lihat Foto -->
<div class="modal fade" id="modal-lihatfoto">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header" style="background-color: #b5ab70">
            <h4 class="modal-title">
              <font color="#ffffff">Foto</font>
            </h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form class="form-horizontal" method="POST" id="bukti" action="prosesuploadfoto.php" enctype="multipart/form-data">
            <div class="modal-body">
              <div class="form-group">
              <img  src="<?=$foto;?>" width="100%" >
              </div>
            </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal Lihat Foto -->

    <!-- /.modal Akte -->
<div class="modal fade" id="modal-uploadakte">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header" style="background-color: #b5ab70">
            <h4 class="modal-title">
              <font color="#ffffff">Upload Akte</font>
            </h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form class="form-horizontal" method="POST" id="akte" action="prosesuploadakte.php" enctype="multipart/form-data">
            <div class="modal-body">
              <table>
                <thead>
                <tbody>
                <div class="form-group">
                      <label for="bayar">Upload Akte</label>
                      <input type="text" class="form-control" name="nik" id="nik" value="<?=$nomertogel;?>" hidden >
                      <input type="text" class="form-control" name="nama" id="nama" value="<?=$nama;?>" hidden >
                      <input type="file" class="form-control" name="akte" id="akte" accept="image/*" required>
                    </div>
                </tbody>
                </thead>
              </table>

            </div>
            <div class="modal-footer">
            <button type="submit" class="btn btn-sm btn-info" name="uploadakte">
              Upload
            </button>
          </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal Akte -->

    <!-- /.modal Lihat Akta -->
<div class="modal fade" id="modal-lihatakte">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header" style="background-color: #b5ab70">
            <h4 class="modal-title">
              <font color="#ffffff">Akta</font>
            </h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form class="form-horizontal" method="POST" id="akta">
            <div class="modal-body">
              <div class="form-group">
              <img  src="<?=$akte;?>" width="100%" >
              </div>
            </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal Lihat Akta -->

    <!-- /.modal KK -->
<div class="modal fade" id="modal-uploadkk">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header" style="background-color: #b5ab70">
            <h4 class="modal-title">
              <font color="#ffffff">Upload Kartu Keluarga</font>
            </h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form class="form-horizontal" method="POST" id="kk" action="prosesuploadkk.php" enctype="multipart/form-data">
            <div class="modal-body">
              <table>
                <thead>
                <tbody>
                <div class="form-group">
                      <label for="bayar">Upload Kartu Keluarga</label>
                      <input type="text" class="form-control" name="nik" id="nik" value="<?=$nomertogel;?>" hidden >
                      <input type="text" class="form-control" name="nama" id="nama" value="<?=$nama;?>" hidden >
                      <input type="file" class="form-control" name="kk" id="kk" accept="image/*" required>
                    </div>
                </tbody>
                </thead>
              </table>

            </div>
            <div class="modal-footer">
            <button type="submit" class="btn btn-sm btn-info" name="uploadkk">
              Upload
            </button>
          </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal KK -->

    <!-- /.modal Lihat KK -->
<div class="modal fade" id="modal-lihatkk">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header" style="background-color: #b5ab70">
            <h4 class="modal-title">
              <font color="#ffffff">Kartu Keluarga</font>
            </h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form class="form-horizontal" method="POST" id="akta">
            <div class="modal-body">
              <div class="form-group">
              <img  src="<?=$kk;?>" width="100%" >
              </div>
            </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal Lihat KK -->

    <!-- /.modal Ijazah -->
<div class="modal fade" id="modal-uploadijazah">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header" style="background-color: #b5ab70">
            <h4 class="modal-title">
              <font color="#ffffff">Upload Ijazah Terakhir</font>
            </h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form class="form-horizontal" method="POST" id="ijazah" action="prosesuploadijazah.php" enctype="multipart/form-data">
            <div class="modal-body">
              <table>
                <thead>
                <tbody>
                <div class="form-group">
                      <label for="bayar">Upload Ijazah</label>
                      <input type="text" class="form-control" name="nik" id="nik" value="<?=$nomertogel;?>" hidden >
                      <input type="text" class="form-control" name="nama" id="nama" value="<?=$nama;?>" hidden >
                      <input type="file" class="form-control" name="ijazah" id="ijazah" accept="image/*" required>
                    </div>
                </tbody>
                </thead>
              </table>

            </div>
            <div class="modal-footer">
            <button type="submit" class="btn btn-sm btn-info" name="uploadijazah">
              Upload
            </button>
          </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal KK -->

    <!-- /.modal Lihat Ijazah -->
<div class="modal fade" id="modal-lihatijazah">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header" style="background-color: #b5ab70">
            <h4 class="modal-title">
              <font color="#ffffff">Ijazah Terakhir</font>
            </h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form class="form-horizontal" method="POST" id="ijazah">
            <div class="modal-body">
              <div class="form-group">
              <img  src="<?=$ijazah;?>" width="100%" >
              </div>
            </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal Lihat Ijazah -->

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

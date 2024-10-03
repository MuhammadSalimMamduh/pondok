<?php
session_start();
$konstruktor = "data_berkas";
require_once '../database/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ribath Al Musyarraf</title>
<?php 
include '../listlink.php';
?>
</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->
<body class="hold-transition sidebar-mini">
<div class="wrapper">
<?php
include '../preloader.php';
?>
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background-color: #b5ab70;">
    <!-- Left navbar links -->
   <?php
   include '../navbar.php';
   ?>

    <!-- Right navbar links -->
   
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-secondary elevation-4" style="background-color: #ffffff;">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="../assets_adminlte/img/pondok.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"><font color="#000000"><b>Ribath Al-Musyarraf</b></font></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
     
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
 <?php
 include '../sidebar.php';
 ?>
        
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
      
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

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
                                  <a href="../backoffice_data_berkas" class="btn btn-secondary btn-sm"><i class="nav-icon fas fa-chevron-left"></i> Kembali</a>
                                  <br>
                                  <br>

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
                            <h3 class="card-title"><i class= "nav-icon fas fa-file-pdf"></i> Dokumen yang perlu diedit </h3>
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
                                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-uploadfoto"> Edit Berkas</button>
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
                                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-uploadakte"> Edit Berkas</button>
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
                                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-uploadkk"> Edit Berkas</button>
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
                                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-uploadijazah"> Edit Berkas</button>
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
                  <a href="../backoffice_data_berkas" class="btn btn-success btn-block"><i class="nav-icon fas fa-check"></i> Selesai</a>
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
<?php
include '../footer.php';
?>
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
<?php
include '../script.php';
?>



</body>
</html>

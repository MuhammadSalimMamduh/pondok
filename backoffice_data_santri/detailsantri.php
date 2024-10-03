<?php
session_start();
$konstruktor = "data_pendaftaran";
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

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
        <div class="card">
              <div class="card-header" style="background-color: #b5ab70;">
                <h3 class="card-title"><font color="#ffffff"><i class="nav-icon fas fa-file"></i> Detail Pendaftaran</font></h3>

              </div>
              <!-- /.card-header -->
              <div class="card-body">
                
              <a href="../backoffice_data_pendaftaran" class="btn btn-secondary btn-sm"><i class="nav-icon fas fa-chevron-left"></i> Kembali</a>
                  <font color="#000000">
                      <div class="row">
                          <div class="col-lg-3">
                              <img src="../img/pondok.png" height="100px" width="100px">
                          </div>
                          <div class="col-lg-6">
                              <center>
                              <h4><b>RIBATH AL MUSYARRAF</b></h4>
                              <h4><b>PENGGARUTAN-BUMIAYU-BREBES 52273</b></h4>
                              <h6><b>Email : r.almusyarraf@gmail.com No.Telp : 087716836831</b></h6>
                              </center>
                              </div>
              <br>
              <br>
              <?php
                    $nik = @$_GET['nik'];
                    $qrambil = mysqli_query($koneksi, "SELECT * FROM tbl_santri WHERE nik='$nik'") or die (mysqli_error($koneksi));
                    $arrambil = mysqli_fetch_assoc($qrambil);
                    $nis = $arrambil['nis'];
                    $nik = $arrambil['nik'];
                    $nama_lengkap = $arrambil['nama_santri'];
                    $tmp_lahir = $arrambil['tempat_lahir'];
                    $tgl_lahir = $arrambil['tanggal_lahir'];
                    $alamat = $arrambil['alamat'];
                    $asal_sekolah = $arrambil['asal_sekolah'];
                    $ayah = $arrambil['nama_ayah'];
                    $ibu = $arrambil['nama_ibu'];
                    $nama_wali = $arrambil['wali'];
                    $kontak = $arrambil['kontak'];
                    $tgl_daftar = $arrambil['tgl_daftar'];
                    $penyakit = $arrambil['riwayat_penyakit'];
                    $kelamin = $arrambil['kelamin'];
                    $jurusan = $arrambil['jurusan'];

                    $sqljurusan = mysqli_query($koneksi,"SELECT nama_jurusan FROM tbl_jurusan WHERE id_jurusan='$jurusan'") or die (mysqli_error($koneksi));
                    $dt_jurusan = mysqli_fetch_assoc($sqljurusan);
                    $namajurusan = $dt_jurusan ['nama_jurusan'];

              ?>
                <div class="row">
                    <div class="col-lg-12">
                    <table class="table table-sm table-borderless ">
                    <tr>
                        <td width="35%">No Induk Santri</td>
                        <td width="2%">:</td>
                        <td><b><?=$nis;?></b></td>
                    </tr>
                    <tr>
                        <td width="35%">NIK</td>
                        <td width="2%">:</td>
                        <td><?=$nik;?></td>
                    </tr>
                    <tr>
                        <td width="35%">Nama Lengkap</td>
                        <td width="2%">:</td>
                        <td><?=$nama_lengkap;?></td>
                    </tr>
                    <tr>
                        <td width="35%">Kelamin</td>
                        <td width="2%">:</td>
                        <td><?=$kelamin;?></td>
                    </tr>
                    <tr> 
                        <td width="35%">Tempat, Tgl Lahir</td>
                        <td width="2%">:</td>
                        <td><?=$tmp_lahir;?>, <?=$tgl_lahir;?></td>
                    </tr>
                   
                    <tr> 
                        <td width="35%">Alamat Lengkap</td>
                        <td width="2%">:</td>
                        <td><?=$alamat;?></td>
                    </tr>
                    <tr> 
                        <td width="35%">jurusan</td>
                        <td width="2%">:</td>
                        <td><?=$namajurusan;?></td>
                    </tr>
                    <tr> 
                        <td width="35%">Asal Sekolah Formal</td>
                        <td width="2%">:</td>
                        <td><?=$asal_sekolah;?></td>
                    </tr>
                    <tr>
                        <td width="35%">Nama Ayah</td>
                        <td width="2%">:</td>
                        <td><?=$ayah;?></td>
                    </tr>
                    <tr>
                        <td width="35%">Nama Ibu</td>
                        <td width="2%">:</td>
                        <td><?=$ibu;?></td>
                    </tr>
                    <tr>
                        <td width="35%">Nama Wali</td>
                        <td width="2%">:</td>
                        <td><?=$nama_wali;?></td>
                    </tr>
                    <tr> 
                        <td width="35%">Tlp Orang Tua</td>
                        <td width="2%">:</td>
                        <td><?=$kontak;?></td>
                    </tr>
                    <tr> 
                        <td width="35%">Tgl Daftar</td>
                        <td width="2%">:</td>
                        <td><?=$tgl_daftar;?></td>
                    </tr>
                    <tr> 
                        <td width="35%">Riwayat Penyakit</td>
                        <td width="2%">:</td>
                        <td><?=$penyakit;?></td>
                    </tr>
                    <tr> 
                        <td width="35%">Foto Santri</td>
                        <td width="2%">:</td>
                        <td>.....</td>
                    </tr>
                </table>
                <div class="row end" >
                <a href="formulir.php?nik=<?=$arrambil['nik'];?>" target="_blank" class="btn btn-sm btn-info"><i class="nav-icon fas fa-download"></i> Unduh PDF</a>
                </div>
             
                </div>
                </div>
               
              
                </div>
               
              
              </div>
             
              <!-- /.card-body -->
            </div>
        </div>
          </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
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



</div>
<?php
include '../script.php';
?>






</body>
</html>

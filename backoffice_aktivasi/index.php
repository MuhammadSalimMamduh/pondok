<?php
session_start();
$konstruktor = "aktivasi";
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
body tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->
<body class="hold-transition sidebar-mini">
<div class="wrapper">
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
            <div class="col-lg-6">
        <div class="card">
              <div class="card-header" style="background-color: #b5ab70;">
                <h3 class="card-title"><font color="#ffffff"><i class="nav-icon fas fa-check"></i> &nbsp Aktivasi Gelombang Pendaftaran</font></h3>
              </div>
              <!-- /.card-header -->
              <form action="prosesupdate.php" method="post">
              <div class="card-body">
              <div class="form-group">
                <?php
                $pgltglbukatutup = mysqli_query($koneksi, "SELECT * FROM tbl_aktivasi") or die (mysqli_error($koneksi));
                $arraktivasi = mysqli_fetch_assoc($pgltglbukatutup);
                $tglbuka = $arraktivasi['tgl_buka'];
                $tgltutup = $arraktivasi['tgl_tutup'];
                ?>
                    <label for="nik">Tanggal Buka</label>
                    <input type="date" class="form-control" id="tb" name="tb" value="<?=$tglbuka;?>">
                  </div>
                  <div class="form-group">
                    <label for="nik">Tanggal Tutup</label>
                    <input type="date" class="form-control" id="tp" name="tp" value="<?=$tgltutup;?>">
                  </div>

                  <button type="submit" name="aktivasi" class="btn btn-secondary btn-block"><i class="nav-icon fas fa-upload"></i> UPDATE </button>
             
              </div>
              </form>
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

<?php
include '../script.php';
?>
</body>
</html>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Monev Skripsi | Dashboard Administrator</title>
  <?php
  session_start();
  $konstruktor = 'admin_gantipw';
  require_once '../database/config.php';

  include '../listlink.php';
  ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
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
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-light-secondary elevation-4" style="background-color: #ffffff;">
      <a href="index3.html" class="brand-link">
        <img src="../assets_adminlte/img/pondok.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">
          <font color="#000000"><b>Ribath Al-Musyarraf</b></font>
        </span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <?php
            include '../sidebar.php';
            ?>
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
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Ganti Password</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">admin_dashboard</a></li>
                <li class="breadcrumb-item active">Ganti Password</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-6">
              <div class="card card-secondary">
                <div class="card-header">
                  <h3 class="card-title"><i class="nav-icon fas fa-lock"></i> Ganti Password</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="proses.php" method="post">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="username">Username</label>
                      <input type="text" class="form-control" name="username" value="<?= $_SESSION['user']; ?>" disabled>
                      <input type="text" class="form-control" name="username" value="<?= $_SESSION['user']; ?>" hidden>
                    </div>
                    <div class="form-group">
                      <label for="nama">Nama Pengguna</label>
                      <input type="text" class="form-control" name="nama" value="<?= $_SESSION['nama']; ?>" disabled>
                    </div>
                    <div class="form-group">
                      <label for="pass_lama">Password Lama</label>
                      <input type="password" class="form-control" name="pass_lama" placeholder=" Masukan Password Lama" name="pwlama" required>
                    </div>
                    <div class="form-group">
                      <label for="pass_baru">Password Baru</label>
                      <input type="password" class="form-control" name="pass_Baru" placeholder=" Masukan Password Baru" name="pwbaru" required>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                      <button type="submit" class="btn btn-secondary btn-block" name="gantipw"><i class="nav-icon fas fa-sync"></i> Ganti Password</button>
                    </div>
                </form>
              </div>
            </div>
            <!-- right col -->
          </div>
          <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php
    include '../footer.php';
    ?>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <?php
  include '../script.php';

  ?>
</body>

</html>
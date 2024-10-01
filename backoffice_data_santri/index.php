<?php
session_start();
$konstruktor = "santri";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ribath Al Musyarraf</title>
  <?php
  require_once '../database/config.php';
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
        <span class="brand-text font-weight-light">
          <font color="#000000"><b>Ribath Al-Musyarraf</b></font>
        </span>
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
              <div class="card card-secondary">
                <div class="card-header">
                  <h3 class="card-title"><i class="nav-icon fas fa-users"></i> Data Santri</h3>
                </div>
                <div class="card-body">
                <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-import"><i class="nav-icon fas fa-file-excel"></i> Import Data</button>
                <br>
                <br>
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="card card-primary">
                      <div class="card-header" style="background-color: #490206;">
                      <div class="card-title">
                      <center>DATA SANTRI PUTRA</center>
                      </div>
                      </div>
                      <div class="card-body">
                      <table id="example1" class="table table-bordered table-striped table-sm">
                    <thead>
                      <tr>
                        <th width="5%">No</th>
                        <th >NIS</th>
                        <th>
                          <center>NIK dan Nama Lengkap
                        </th>
                        </center>
                        <th>
                          <center>Kelamin
                        </th>
                        </center>

                        <th>
                          <center>Asal Sekolah
                        </th>
                        </center>

                        <th>
                          <center>Ayah
                        </th>
                        </center>
                        
                        </center>
                        <th>
                          <center>Tgl Mendaftar
                        </th>
                        </center>

                        <th>
                          <center>Aksi
                        </th>
                        </center>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no = 1;
                      $qrpendaftaran = mysqli_query($koneksi, "SELECT * FROM tbl_santri ORDER BY nis ASC") or die(mysqli_error($koneksi));

                      if (mysqli_num_rows($qrpendaftaran)) {
                        while ($dt_santri = mysqli_fetch_array($qrpendaftaran)) {
                      ?>
                          <tr>
                            <td><?= $no++ ;?></td>
                            <td><?= $dt_santri['nis'];;?></td>


                            <td>
                              <b><?= $dt_santri['nik']; ?> -</b>
                              <br><?= $dt_santri['nama_santri']; ?>
                            </td>

                            <td><?= $dt_santri['kelamin']; ?></td>


                            <td><?= $dt_santri['asal_sekolah']; ?></td>

                            <td><?= $dt_santri['nama_ayah']; ?>
                             <br> 
                              <a href="https://api.whatsapp.com/send?phone=<?= $dt_santri['kontak']; ?>&text=Assalamualaikum <?= $dt_santri['nama_ayah']; ?>" class="btn btn-sm btn-success" target="_blank">
                                  <img src="../img/wa.png" height="18px" width="18px"> <?= $dt_santri['kontak']; ?>
                                </a>
                            </td>
                          

                            <td><?= $dt_santri['tgl_daftar']; ?></td>

                            <td>
                             aksi
                            </td>
                          </tr>
                      <?php
                        }
                      }
                      ?>
                  </table>

                      </div>

                      </div>
                      
                         
                   
                     
                  
                    </div>
                   

                  </div>
                </div>
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

  <!-- modal import -->
      <div class="modal fade" id="modal-import">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"><i class="nav-icon fas fa-download"></i> Import</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="prosesimport.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="import"> Ambil File Excel</label>
                  <input type="file" class="form-control" id="import" name="file" placeholder="Ambil file Excel" accept="application/vnd.ms-excel" required>
                </div>
            </div>

            <div class="modal-footer pull-right">
              <button type="submit" class="btn btn-success" name="importsantri"><i class="nav-icon fas fa-upload"></i> Import Data</button>
            </div>
                </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

  <?php
  include '../script.php';
  ?>
</body>

</html>
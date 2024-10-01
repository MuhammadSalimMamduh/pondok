<?php
session_start();
$konstruktor = "angkatan";
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
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header" style="background-color: #b5ab70;">
                                    <h3 class="card-title">
                                        <font color="#ffffff"><i class="nav-icon fas fa-archway"></i> &nbsp Data Angkatan</font>
                                    </h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                <a href="tambahangkatan.php" class="btn btn-primary btn-sm"><i class="nav-icon fas fa-download"></i> Tambah Data</a>

                                    <br>
                                    <br>
                                    <table id="example1" class="table table-bordered table-striped table-sm">
                                        <thead>
                                            <tr>
                                                <th width="5%">No</th>
                                                <th><center>Angkatan</center></th>
                                                <th><center>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            $qrbank = mysqli_query($koneksi, "SELECT * FROM tbl_angkatan") or die(mysqli_error($koneksi));

                                            if (mysqli_num_rows($qrbank)) {
                                                while ($dt_rekening = mysqli_fetch_array($qrbank)) {
                                            ?>
                                                    <tr>
                                                        <td><?= $no++ ?></td>

                                                        <td>
                                                            <?= $dt_rekening['angkatan']; ?>
                                                        </td>
                                                        <td>
                                                            <center>
                                                                <button type="button" class="btn btn-sm btn-primary"
                                                                    data-toggle="modal"
                                                                    data-target="#modal-edit"
                                                                    data-id="<?= $dt_rekening['id']; ?>"
                                                                    data-angkatan="<?= $dt_rekening['angkatan']; ?>">
                                                                    
                                                                    <i class="nav-icon fas fa-edit"></i>
                                                                    Edit
                                                                </button>
                                                                <a href="proseshapus.php?angkatan=<?=$dt_rekening['id']; ?>&hapus=hapus" class="btn btn-sm btn-danger" onclick="return confirm('Anda akan menghapus data angkatan [<?= $dt_rekening['id']; ?>] -  : <?= $dt_rekening['angkatan']; ?>]')"><i class="nav-icon fas fa-trash"></i></a>

                                                              
                                                            </center>
                                                        </td>
                                                    </tr>
                                            <?php
                                                }
                                            }
                                            ?>
                                            
                                        </tbody>
                                    </table>
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
        <div class="modal fade" id="modal-edit">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #b5ab70">
                        <h4 class="modal-title">
                            <font color="#ffffff">Edit</font>
                        </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form class="form-horizontal" action="prosesedit.php" method="POST" id="edit">
                        <div class="modal-body">
                            <table>
                                <thead>
                                <tbody>
                                    <tr>
                                        <td>
                                        <input type="text" name="ed_idterpilih" class="form-control" hidden>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="30%">Angkatan</td>
                                        <td width="5%">:</td>
                                        <td>
                                            <input type="text" name="ed_namaterpilih" class="form-control">
                                        </td>
                                    </tr>
                                  
                                </tbody>
                                </thead>
                            </table>

                        </div>
                        <div class="modal-footer pull-right">
                            <button type="submit" name="edit" class="btn btn-secondary"> <i class="nav-icon fas fa-edit"></i>Ya, Edit Data</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
      

    </div>
    <?php
    include '../script.php';
    ?>

    <script type="text/javascript">
    $('#modal-edit').on('show.bs.modal', function(e) {

      var id = $(e.relatedTarget).data('id');
      var angkatan = $(e.relatedTarget).data('angkatan');

      

      $(e.currentTarget).find('input[name="ed_idterpilih"]').val(id);
      $(e.currentTarget).find('input[name="ed_namaterpilih"]').val(angkatan);
     
     

    });
  </script>

  
</body>

</html>
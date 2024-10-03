<?php
session_start();
$konstruktor = "data_pembayaran";
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
    <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background-color: #490206;">
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
        <img src="../assets_adminlte/img/pondok.png" alt="" class="brand-image img-circle elevation-3" style="opacity: .8">
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
              <div class="card">
                <div class="card-header" style="background-color: #490206;">
                  <h3 class="card-title">
                    <font color="#ffffff"><i class="nav-icon fas fa-file"></i> &nbsp Pendaftaran</font>
                  </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                  <a href="formtambah.php" class="btn btn-sm btn-secondary"><i class="nav-icon fas fa-download"></i>Tambah Data</a>
                  <br>
                  <br>
                  <table id="example1" class="table table-bordered table-striped table-sm">
                    <thead>
                      <tr>
                        <th width="5%">No</th>


                        <th>
                          <center>Kode Formulir
                        </th>
                        </center>
                        <th>
                          <center>NISN
                        </th>
                        </center>


                        <th>
                          <center>Nama Calon Santri
                        </th>
                        </center>
                        <th>
                          <center>No Whastapp
                        </th>
                        </center>


                        <th>
                          <center>Status
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
                      $qrpembayaran = mysqli_query($koneksi, "SELECT * FROM tbl_pembayaran") or die(mysqli_error($koneksi));

                      if (mysqli_num_rows($qrpembayaran)) {
                        while ($dt_pembayaran = mysqli_fetch_array($qrpembayaran)) {
                      ?>
                          <tr>
                            <td><?= $no++ ?></td>

                            <td>
                              <b><?= $dt_pembayaran['kode_formulir']; ?></b>

                            </td>
                            <td>
                              <?= $dt_pembayaran['nisn']; ?>
                            </td>
                            <td><?= $dt_pembayaran['nama_casis']; ?></td>
                            <td>
                              <center>
                                <a href="https://api.whatsapp.com/send?phone=<?= $dt_pembayaran['no_wa']; ?>&text=Assalamualaikum Calon Santri <?= $dt_pembayaran['nama_casis']; ?>" class="btn btn-sm btn-success" target="_blank">
                                  <img src="../img/wa.png" height="18px" width="18px"> <?= $dt_pembayaran['no_wa']; ?>
                                </a>
                              </center>
                            </td>

                            <td>
                              <?php
                              $kode_stt = $dt_pembayaran['status'];
                              if ($kode_stt > 0) {
                              ?>
                                <center>
                                  <button class="btn btn-sm btn-success"> sudah dipakai </button>
                                </center>
                              <?php

                              } else {
                              ?>
                                <center>
                                  <button class="btn btn-sm btn-danger"> Belum dipakai </button>
                                </center>
                              <?php
                              }
                              ?>
                            </td>

                            <td>
                              <center>
                                <button type="button" class="btn btn-sm btn-info"
                                  data-toggle="modal"
                                  data-target="#modal-bukti"
                                  data-bukti="<?= $dt_pembayaran['bukti']; ?>"
                                  data-nisn="<?= $dt_pembayaran['nisn']; ?>">
                                  <i class="nav-icon fas fa-eye"></i>
                                  Bukti
                                </button>
                                <button type="button" class="btn btn-sm btn-primary"
                                  data-toggle="modal"
                                  data-target="#modal-edit"
                                  data-id="<?= $dt_pembayaran['id']; ?>"
                                  data-kodeformulir="<?= $dt_pembayaran['kode_formulir']; ?>"
                                  data-nisn="<?= $dt_pembayaran['nisn']; ?>"
                                  data-nama_casis="<?= $dt_pembayaran['nama_casis']; ?>">
                                  <i class="nav-icon fas fa-edit"></i>
                                  Edit
                                </button>

                                <a href="proseshapus.php?kd_pembayaran=<?=$dt_pembayaran['nisn']; ?>&hapus=hapus" class="btn btn-sm btn-danger" onclick="return confirm('Anda akan menghapus data Kode formulir [<?= $dt_pembayaran['nisn']; ?>] - Nama Santri : <?= $dt_pembayaran['nama_casis']; ?>]')"><i class="nav-icon fas fa-trash"></i></a>

                              </center>
                            </td>
                          </tr>
                      <?php
                        }
                      }
                      ?>
                     
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
                    <td width="30%">Kode Formulir</td>
                    <td width="5%">:</td>
                    <td>
                      <input type="text" name="ed_kodeterpilih" class="form-control">
                    </td>
                  </tr>

                  <tr>
                    <td width="30%">NISN</td>
                    <td width="5%">:</td>
                    <td>
                      <input type="text" name="ed_nisnterpilih" class="form-control" hidden>
                      <input type="text" name="ed_nisnterpilih2" class="form-control" disabled>
                    </td>
                  </tr>

                  <tr>
                    <td width="30%">Nama Calon Santri</td>
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

  <!-- /.modal Bukti -->
  <div class="modal fade" id="modal-bukti">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header" style="background-color: #b5ab70">
            <h4 class="modal-title">
              <font color="#ffffff">Bukti Pembayaran</font>
            </h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form class="form-horizontal" method="POST" id="bukti">
            <div class="modal-body">
              <table>
                <thead>
                <tbody>
                <center>
                <img src="" id="fotobukti" height="450px">
                </center>        
                </tbody>
                </thead>
              </table>

            </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal bukti -->

    <!-- /.modal -->
    <div class="modal fade" id="modal-default">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header" style="background-color: #b5ab70">
            <h4 class="modal-title">
              <font color="#ffffff">Hapus Data</font>
            </h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form class="form-horizontal" action="hapus.php" method="POST" id="hapusdata">
            <div class="modal-body">
              <table>
                <thead>
                <tbody>
                  <tr>
                    <td width="30%">NIK</td>
                    <td width="5%">:</td>
                    <td>
                      <input type="text" name="nikuserterpilih" class="form-control" hidden>
                      <input type="text" name="nikuserterpilih2" class="form-control" disabled>
                    </td>
                  </tr>
                  <tr>
                    <td width="30%">Nama Pengguna</td>
                    <td width="5%">:</td>
                    <td>
                      <input type="text" name="namaterpilih" class="form-control" disabled>
                    </td>
                  </tr>
                  <tr>
                    <td width="30%">Username</td>
                    <td width="5%">:</td>
                    <td>
                      <input type="text" name="userterpilih" class="form-control" disabled>
                    </td>
                  </tr>
                </tbody>
                </thead>
              </table>

            </div>
            <div class="modal-footer pull-right">
              <button type="submit" name="hapus" class="btn btn-secondary">Ya, Hapus Data</button>
            </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <div class="modal fade" id="modal-tambahdata">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header" style="background-color: #b5ab70">
            <h4 class="modal-title">
              <font color="#ffffff">Tambah Data</font>
            </h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form class="form-horizontal" action="tambahdata.php" method="POST" id="tambahdata">
            <div class="modal-body">
              <div class="card-body">
                <div class="form-group">
                  <label for="nik">NIK</label>
                  <input type="text" class="form-control" id="nik" name="nik" placeholder="Input NIK">
                </div>
                <div class="form-group">
                  <label for="nama">Nama Pengguna</label>
                  <input type="text" class="form-control" id="nama" name="nama" placeholder="Input Nama Pengguna">
                </div>
                <div class="form-group">
                  <label for="username">Username</label>
                  <input type="text" class="form-control" id="username" name="username" placeholder="Input Username">
                </div>
                <div class="form-grup">
                  <label for="agama">Agama</label>
                  <select class="form-control" id="agama" name="agama">
                    <option value="">-- Pilih Agama --</option>
                    <?php
                    $panggilagama = mysqli_query($koneksi, "SELECT * FROM tbl_agama") or die(mysqli_error($koneksi));
                    while ($dt_agama = mysqli_fetch_array($panggilagama)) {
                      echo " <option value='$dt_agama[id]'>$dt_agama[agama]</option>";
                    }
                    ?>
                  </select>
                </div>
              </div>
              <div class="modal-footer pull-right">
                <button type="submit" name="tambahdata" class="btn btn-secondary"> <i class="nav-icon fas fa-download"></i>Tambah Data</button>
              </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

  </div>
  <?php
  include '../script.php';
  ?>
  
  <script type="text/javascript">
    $('#modal-edit').on('show.bs.modal', function(e) {

      var id = $(e.relatedTarget).data('id');
      var kode = $(e.relatedTarget).data('kodeformulir');
      var nisn = $(e.relatedTarget).data('nisn');
      var nama_casis = $(e.relatedTarget).data('nama_casis');

      $(e.currentTarget).find('input[name="ed_idterpilih"]').val(id);
      $(e.currentTarget).find('input[name="ed_kodeterpilih"]').val(kode);
      $(e.currentTarget).find('input[name="ed_nisnterpilih"]').val(nisn);
      $(e.currentTarget).find('input[name="ed_nisnterpilih2"]').val(nisn);
      $(e.currentTarget).find('input[name="ed_namaterpilih"]').val(nama_casis);

    });
  </script>

<script type="text/javascript">
    $('#modal-bukti').on('show.bs.modal', function(e) {

      var nisn = $(e.relatedTarget).data('nisn');
      var bukti = $(e.relatedTarget).data('bukti');
      var path = "../img/bukti/"+bukti;

      $(e.currentTarget).find('input[name="nisn"]').val(nisn);
      document.getElementById('fotobukti').src= path;
    });
  </script>
</body>

</html>
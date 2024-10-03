<?php
session_start();
$konstruktor = "kelas";
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
            <div class="col-lg-6">
        <div class="card">
              <div class="card-header" style="background-color: #b5ab70;">
                <h3 class="card-title"><font color="#ffffff"><i class="nav-icon fas fa-file"></i> &nbsp Tambah Data Kelas</font></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <form action="prosestambah.php" method="post">
                                        <a href="../backoffice_kelas" class="btn btn-secondary btn-sm"><i class="nav-icon fas fa-chevron-left"></i> Kembali</a>
                                        <br>
                                        <br>
                                        <div class="form-group">
                                            <label for="kelas">Nama Kelas</label>
                                            <input type="text" class="form-control" id="kelas" name="kelas"  placeholder="Masukan Nama Kelas " autofocus required>
                                        </div>
                                        <div class="form-group">
                                            <label for="angkatan">Angkatan</label>
                                            <select class="form-control" name="angkatan" required>
                                            <option value="">-- Pilih Angkatan --</option>
                                            <?php

                                            // pangiil data pada tabel prodi
                                            $pglprodi = mysqli_query($koneksi, "SELECT * FROM tbl_angkatan") or die(mysqli_error($koneksi));

                                            // buat variabel untuk menampung return value dari query $pglprodi
                                            $rvprodi = mysqli_num_rows($pglprodi);

                                            // kondisi jika tabel prodi memiliki <= 1 data
                                            if ($rvprodi > 0) {

                                            // melakukan perulangan 
                                            while ($dt_prodi = mysqli_fetch_array($pglprodi)) {

                                            // tampilkan data pada option di elemen select
                                            ?>
                                            <option value="<?= $dt_prodi['id']; ?>"><?= $dt_prodi['angkatan']; ?></option>
                                            <?php

                                            }
                                            }
                                            // kondisi jika tabel prodi kosong 
                                            else {
                                            }

                                            ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="wali">Wali Kelas</label>
                                            <input type="text" class="form-control" id="wali" name="wali"  placeholder="Masukan Wali Kelas " autofocus required>
                                        </div>
                                        <div class="form-group">
                                            <label for="angkatan">Ketegori</label>
                                            <select class="form-control" name="jurusan" required>
                                            <option value="">-- Pilih Ketegori --</option>
                                            <?php

                                            // pangiil data pada tabel prodi
                                            $pgljurusan = mysqli_query($koneksi, "SELECT * FROM tbl_jurusan") or die(mysqli_error($koneksi));

                                            // buat variabel untuk menampung return value dari query $pglprodi
                                            $rvjurusan = mysqli_num_rows($pgljurusan);

                                            // kondisi jika tabel prodi memiliki <= 1 data
                                            if ($rvjurusan > 0) {

                                            // melakukan perulangan 
                                            while ($dt_jurusan = mysqli_fetch_array($pgljurusan)) {

                                            // tampilkan data pada option di elemen select
                                            ?>
                                            <option value="<?= $dt_jurusan['id_jurusan']; ?>"><?= $dt_jurusan['nama_jurusan']; ?></option>
                                            <?php

                                            }
                                            }
                                            // kondisi jika tabel prodi kosong 
                                            else {
                                            }

                                            ?>
                                            </select>
                                        </div>
                                      
                                        
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-warning btn-block" name="tambahmhs"><i class="nav-icon fas fa-plus"></i> Tambah Data Mahasiswa</button>
                                        </div>
              </form>
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
              <h4 class="modal-title"><font color="#ffffff">Edit</font></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form class="form-horizontal" action="edit.php" method="POST" id="edit">
            <div class="modal-body">
              <table>
                <thead>
                  <tbody>
                    <tr>
                      <td width="30%">NIK</td>
                      <td width="5%">:</td>
                      <td>
                        <input type="text" name="ed_nikuserterpilih" class="form-control" hidden>
                        <input type="text" name="ed_nikuserterpilih2" class="form-control" disabled></td>
                    </tr>
                    <tr>
                      <td width="30%">Username</td>
                      <td width="5%">:</td>
                      <td>
                        <input type="text" name="ed_userterpilih" class="form-control" disabled></td>
                    </tr>
                    <tr>
                      <td width="30%">Nama Pengguna</td>
                      <td width="5%">:</td>
                      <td>
                        <input type="text" name="ed_namaterpilih" class="form-control" ></td>
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
      <!-- /.modal -->

<div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header" style="background-color: #b5ab70">
              <h4 class="modal-title"><font color="#ffffff">Hapus Data</font></h4>
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
                        <input type="text" name="nikuserterpilih2" class="form-control" disabled></td>
                    </tr>
                    <tr>
                      <td width="30%">Nama Pengguna</td>
                      <td width="5%">:</td>
                      <td>
                        <input type="text" name="namaterpilih" class="form-control" disabled></td>
                    </tr>
                    <tr>
                      <td width="30%">Username</td>
                      <td width="5%">:</td>
                      <td>
                        <input type="text" name="userterpilih" class="form-control" disabled></td>
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
              <h4 class="modal-title"><font color="#ffffff">Tambah Data</font></h4>
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
                  $panggilagama = mysqli_query($koneksi, "SELECT * FROM tbl_agama") or die (mysqli_error($koneksi));
                  while($dt_agama=mysqli_fetch_array($panggilagama)){
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
$('#modal-default').on('show.bs.modal', function(e){

  var nik  = $(e.relatedTarget).data('nik');
  var user = $(e.relatedTarget).data('user');
  var nama = $(e.relatedTarget).data('nama');

  $(e.currentTarget).find('input[name="nikuserterpilih"]').val(nik);
  $(e.currentTarget).find('input[name="nikuserterpilih2"]').val(nik);
  $(e.currentTarget).find('input[name="userterpilih"]').val(user);
  $(e.currentTarget).find('input[name="namaterpilih"]').val(nama);
});
</script>
<script type="text/javascript">
$('#modal-edit').on('show.bs.modal', function(e){

  var ed_nik  = $(e.relatedTarget).data('nik');
  var ed_user = $(e.relatedTarget).data('user');
  var ed_nama = $(e.relatedTarget).data('nama');

  $(e.currentTarget).find('input[name="ed_nikuserterpilih"]').val(ed_nik);
  $(e.currentTarget).find('input[name="ed_nikuserterpilih2"]').val(ed_nik);
  $(e.currentTarget).find('input[name="ed_userterpilih"]').val(ed_user);
  $(e.currentTarget).find('input[name="ed_namaterpilih"]').val(ed_nama);
});
</script>


</body>
</html>

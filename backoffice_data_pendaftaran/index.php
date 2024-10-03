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
                <div class="card-header" style="background-color: #b5ab70;">
                  <h3 class="card-title">
                    <font color="#ffffff"><i class="nav-icon fas fa-file"></i> &nbsp Pendaftaran</font>
                  </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                  <a href="formtambah.php" class="btn btn-sm btn-secondary"><i class="nav-icon fas fa-download"></i>Tambah Data</a>
                  <a href="exportexcel.php" class="btn btn-success btn-sm" target="_blank"><i class="nav-icon fas fa-file"></i> Ekspor Data</a>
                  <br>
                  <br>
                  <table id="example1" class="table table-bordered table-striped table-sm">
                    <thead>
                      <tr>
                        <th width="5%">No</th>
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
                        <th>
                          <center>Daftar Ulang
                        </th>
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
                      $qrpendaftaran = mysqli_query($koneksi, "SELECT * FROM tbl_pendaftaran ORDER BY tgl_daftar ASC") or die(mysqli_error($koneksi));

                      if (mysqli_num_rows($qrpendaftaran)) {
                        while ($dt_pendaftaran = mysqli_fetch_array($qrpendaftaran)) {
                      ?>
                          <tr>
                            <td><?= $no++ ?></td>


                            <td>
                              <b><?= $dt_pendaftaran['nik']; ?> -</b>
                              <br><?= $dt_pendaftaran['nama_lengkap']; ?>
                            </td>

                            <td><?= $dt_pendaftaran['kelamin']; ?></td>


                            <td><?= $dt_pendaftaran['asal_sekolah']; ?></td>

                            <td><?= $dt_pendaftaran['ayah']; ?>
                             <br> 
                              <a href="https://api.whatsapp.com/send?phone=<?= $dt_pendaftaran['no_orangtua']; ?>&text=Assalamualaikum <?= $dt_pendaftaran['ayah']; ?>" class="btn btn-sm btn-success" target="_blank">
                                  <img src="../img/wa.png" height="18px" width="18px"> <?= $dt_pendaftaran['no_orangtua']; ?>
                                </a>
                            </td>
                            <td>
                             
                            </td>


                            <td><?= $dt_pendaftaran['tgl_daftar']; ?></td>

                            <td>
                              <center>
                                <button type="button" class="btn btn-sm btn-primary"
                                  data-toggle="modal"
                                  data-target="#modal-edit"
                     
                                  data-nik="<?= $dt_pendaftaran['nik']; ?>"
                                  data-nama_lengkap="<?= $dt_pendaftaran['nama_lengkap']; ?>"

                                  data-tmplahir="<?= $dt_pendaftaran['tempat_lahir']; ?>"
                                  data-tgllahir="<?= $dt_pendaftaran['tgl_lahir']; ?>"
                                  data-alamat="<?= $dt_pendaftaran['alamat']; ?>"
                                  data-asalsekolah="<?= $dt_pendaftaran['asal_sekolah']; ?>"
                                  data-ayah="<?= $dt_pendaftaran['ayah']; ?>"
                                  data-ibu="<?= $dt_pendaftaran['ibu']; ?>"
                                  data-wali="<?= $dt_pendaftaran['wali']; ?>"
                                  data-kontak="<?= $dt_pendaftaran['no_orangtua']; ?>"
                                  data-tgldaftar="<?= $dt_pendaftaran['tgl_daftar']; ?>"
                                  data-riwayatpenyakit="<?= $dt_pendaftaran['riwayat_penyakit']; ?>">
                                  <i class="nav-icon fas fa-edit"></i>
                                </button>
                                <a href="detailpendaftaran.php?nik=<?=$dt_pendaftaran['nik'];?>" class="btn btn-sm btn-info"><i class="nav-icon fas fa-receipt"></i></a>
                                <a href="formulir.php?nik=<?=$dt_pendaftaran['nik'];?>" target="_blank" class="btn btn-sm btn-warning"><i class="nav-icon fas fa-file"></i></a>
                                <a href="proseshapus.php?kd_pembayaran=<?= $dt_pendaftaran['nik']; ?>&hapus=hapus" class="btn btn-sm btn-danger" onclick="return confirm('Anda akan menghapus data NIK [<?= $dt_pendaftaran['nik']; ?>] - Nama Santri : [<?= $dt_pendaftaran['nama_lengkap']; ?>]')"><i class="nav-icon fas fa-trash"></i></a>
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
                  <tr>
                    <td width="30%">NIK</td>
                    <td width="5%">:</td>
                    <td>
                      <input type="text" name="ed_nikuserterpilih" class="form-control" hidden>
                      <input type="text" name="ed_nikuserterpilih2" class="form-control" disabled>
                    </td>
                  </tr>
                  <tr>
                    <td width="30%">Nama Lengkap Santri</td>
                    <td width="5%">:</td>
                    <td>
                      <input type="text" name="ed_namaterpilih" class="form-control">
                    </td>
                  </tr>
                  <tr>
                    <td width="30%">Tempat Lahir</td>
                    <td width="5%">:</td>
                    <td>
                      <input type="text" name="ed_tmplahirterpilih" class="form-control">
                    </td>
                  </tr>
                  <tr>
                    <td width="30%">Tgl Lahir</td>
                    <td width="5%">:</td>
                    <td>
                      <input type="date" name="ed_tgllahirterpilih" class="form-control">
                    </td>
                  </tr>
                  <tr>
                    <td width="30%">Alamat Lengkap</td>
                    <td width="5%">:</td>
                    <td>
                      <input type="text" name="ed_alamatterpilih" class="form-control">
                    </td>
                  </tr>
                  <tr>
                    <td width="30%">Asal Sekolah</td>
                    <td width="5%">:</td>
                    <td>
                      <input type="text" name="ed_sekolahterpilih" class="form-control">
                    </td>
                  </tr>
                  <tr>
                    <td width="30%">Nama Ayah</td>
                    <td width="5%">:</td>
                    <td>
                      <input type="text" name="ed_ayahterpilih" class="form-control">
                    </td>
                  </tr>
                  <tr>
                    <td width="30%">Nama Ibu</td>
                    <td width="5%">:</td>
                    <td>
                      <input type="text" name="ed_ibuterpilih" class="form-control">
                    </td>
                  </tr>
                  <tr>
                    <td width="30%">Nama Wali</td>
                    <td width="5%">:</td>
                    <td>
                      <input type="text" name="ed_waliterpilih" class="form-control">
                    </td>
                  </tr>
                  <tr>
                    <td width="30%">kontak</td>
                    <td width="5%">:</td>
                    <td>
                      <input type="text" name="ed_kontakterpilih" class="form-control">
                    </td>
                  </tr>
                  <tr>
                    <td width="30%">Riwayat Penyakit</td>
                    <td width="5%">:</td>
                    <td>
                      <input type="text" name="ed_penyakitterpilih" class="form-control">
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
  <!-- <script type="text/javascript">
$('#modal-default').on('show.bs.modal', function(e){

  var nik  = $(e.relatedTarget).data('nik');
  var user = $(e.relatedTarget).data('user');
  var nama = $(e.relatedTarget).data('nama');

  $(e.currentTarget).find('input[name="nikuserterpilih"]').val(nik);
  $(e.currentTarget).find('input[name="nikuserterpilih2"]').val(nik);
  $(e.currentTarget).find('input[name="userterpilih"]').val(user);
  $(e.currentTarget).find('input[name="namaterpilih"]').val(nama);
});
</script> -->
  <script type="text/javascript">
    $('#modal-edit').on('show.bs.modal', function(e) {


      var nik = $(e.relatedTarget).data('nik');
      var namalengkap = $(e.relatedTarget).data('nama_lengkap');
      var tmplahir = $(e.relatedTarget).data('tmplahir');
      var tgllahir = $(e.relatedTarget).data('tgllahir');
      var alamat = $(e.relatedTarget).data('alamat');
      var asalsekolah = $(e.relatedTarget).data('asalsekolah');
      var ayah = $(e.relatedTarget).data('ayah');
      var ibu = $(e.relatedTarget).data('ibu');
      var wali = $(e.relatedTarget).data('wali');
      var kontak = $(e.relatedTarget).data('kontak');
      var tgldaftar = $(e.relatedTarget).data('tgl_daftar');
      var riwayatpenyakit = $(e.relatedTarget).data('riwayatpenyakit');

    
      $(e.currentTarget).find('input[name="ed_nikuserterpilih"]').val(nik);
      $(e.currentTarget).find('input[name="ed_nikuserterpilih2"]').val(nik);
      $(e.currentTarget).find('input[name="ed_namaterpilih"]').val(namalengkap);
      $(e.currentTarget).find('input[name="ed_tmplahirterpilih"]').val(tmplahir);
      $(e.currentTarget).find('input[name="ed_tgllahirterpilih"]').val(tgllahir);
      $(e.currentTarget).find('input[name="ed_alamatterpilih"]').val(alamat);
      $(e.currentTarget).find('input[name="ed_sekolahterpilih"]').val(asalsekolah);
      $(e.currentTarget).find('input[name="ed_ayahterpilih"]').val(ayah);
      $(e.currentTarget).find('input[name="ed_ibuterpilih"]').val(ibu);
      $(e.currentTarget).find('input[name="ed_waliterpilih"]').val(wali);
      $(e.currentTarget).find('input[name="ed_kontakterpilih"]').val(kontak);
      $(e.currentTarget).find('input[name="ed_penyakitterpilih"]').val(riwayatpenyakit);
    });
  </script>


</body>

</html>
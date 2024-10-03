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
              <div class="card card-secondary">
                <div class="card-header">
                  <h3 class="card-title"><i class="nav-icon fas fa-users"></i> Data Santri</h3>
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
                            <button type="button" class="btn btn-sm btn-primary"
                                  data-toggle="modal"
                                  data-target="#modal-edit"
                                  data-nis="<?= $dt_santri['nis']; ?>"
                                  data-nik="<?= $dt_santri['nik']; ?>"
                                  data-nama_lengkap="<?= $dt_santri['nama_santri']; ?>"

                                  data-tmplahir="<?= $dt_santri['tempat_lahir']; ?>"
                                  data-tgllahir="<?= $dt_santri['tanggal_lahir']; ?>"
                                  data-alamat="<?= $dt_santri['alamat']; ?>"
                                  data-asalsekolah="<?= $dt_santri['asal_sekolah']; ?>"
                                  data-ayah="<?= $dt_santri['nama_ayah']; ?>"
                                  data-ibu="<?= $dt_santri['nama_ibu']; ?>"
                                  data-wali="<?= $dt_santri['wali']; ?>"
                                  data-kontak="<?= $dt_santri['kontak']; ?>"
                                  data-tgldaftar="<?= $dt_santri['tgl_daftar']; ?>"
                                  data-riwayatpenyakit="<?= $dt_santri['riwayat_penyakit']; ?>">
                                  <i class="nav-icon fas fa-edit"></i>
                                </button>
                            <a href="detailsantri.php?nik=<?=$dt_santri['nik'];?>" class="btn btn-sm btn-info"><i class="nav-icon fas fa-receipt"></i></a>
                            <a href="proseshapus.php?nik=<?= $dt_santri['nik']; ?>&hapus=hapus" class="btn btn-sm btn-danger" onclick="return confirm('Anda akan menghapus data NIK [<?= $dt_santri['nik']; ?>] - Nama Santri : [<?= $dt_santri['nama_santri']; ?>]')"><i class="nav-icon fas fa-trash"></i></a>

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
                    <td width="30%">NIS</td>
                    <td width="5%">:</td>
                    <td>
                      <input type="text" name="ed_nisuserterpilih" class="form-control" hidden>
                      <input type="text" name="ed_nisuserterpilih2" class="form-control" disabled>
                    </td>
                  </tr>
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
  <script type="text/javascript">
    $('#modal-edit').on('show.bs.modal', function(e) {

      var nis = $(e.relatedTarget).data('nis');
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

      $(e.currentTarget).find('input[name="ed_nisuserterpilih"]').val(nis);
      $(e.currentTarget).find('input[name="ed_nisuserterpilih2"]').val(nis);
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
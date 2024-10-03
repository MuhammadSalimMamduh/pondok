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

            <section class="content">
      <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-12">
              <div class="card card-secondary">
                <div class="card-header">
                <h3 class="card-title"><i class="nav-icon fas fa-chalkboard-teacher"></i> Kelas / Presensi</h3>

                </div>
             
                      <div class="card-body">
                      
                        <div class="row">
                          <div class="col-lg-2">
                            <form action="" method="post">
                            <label for="periode">Periode Akademik</label>
                           
                          </div>
                          <div class="col-lg-3">
                        
                                            <select name="angkatan" class="form-control" required>
                                            <option value="">-- Pilih Periode Akademik --</option>
                                            <?php
                                        $pglperiode = mysqli_query($koneksi, "SELECT * FROM tbl_angkatan") or die (mysqli_error($koneksi));
                                        $rvperiode = mysqli_num_rows($pglperiode);

                                        if($rvperiode>0){
                                            while($dt_periode = mysqli_fetch_array($pglperiode)){
                                                ?>
                                            <option value="<?=$dt_periode['id']; ?>"><?=$dt_periode['angkatan'];?></option>
                                                <?php
                                            }
                                        }else{
                                                //data kosong
                                        }
                                            ?>      
                                            </select>
                          </div>
                          <div class="col-lg-7">
                          <button type="submit" class="btn btn-danger" name="cari"><i class="nav-icon fas fa-search"></i> Cari Data</button>

                          </form> 
                 
                          <a href="tambah.php" class="btn btn-secondary"><i class="nav-icon fas fa-download"></i>Tambah Data</a>

                        


            
                          
                          
                          </div>
                     
                     
          </div>
          <?php
        if(isset($koneksi, $_POST['cari'])){
            $periodeterpilih = trim(mysqli_real_escape_string($koneksi, $_POST['angkatan']));

            $pgl_kelas_bimbingan = mysqli_query($koneksi, "SELECT * FROM tbl_kelas WHERE angkatan='$periodeterpilih' ") or die (mysqli_error($koneksi));
            ?>
             <table id="example1" class="table table-bordered table-striped table-sm">
                                        <thead>
                                            <tr>
                                                <th width="5%">No</th>
                                                <th><center>Nama Kelas</center></th>
                                                <th><center>Wali Kelas</center></th>
                                                <th><center>Angkatan</center></th>
                                                <th><center>Kategori</center></th>
                                                <th><center>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            $qrbank = mysqli_query($koneksi, "SELECT * FROM tbl_kelas WHERE angkatan='$periodeterpilih'") or die(mysqli_error($koneksi));
                                            $tmpung = mysqli_num_rows($qrbank);
                                            if($tmpung>0) {
                                                while ($dt_rekening = mysqli_fetch_array($qrbank)) {
                                            ?>
                                                    <tr>
                                                        <td><?= $no++ ?></td>

                                                        <td>
                                                            <?= $dt_rekening['nama_kelas']; ?>
                                                        </td>
                                                        <td>
                                                            <?= $dt_rekening['wali_kelas']; ?>
                                                        </td>
                                                        <td>
                                                        <?php
                                                        $ambil = $dt_rekening['angkatan'];
                                                        $qrambil = mysqli_query($koneksi,"SELECT angkatan FROM tbl_angkatan WHERE id='$ambil'") or die (mysqli_error($koneksi));
                                                        $rvambil = mysqli_fetch_assoc($qrambil);
                                                        $angkatan = $rvambil['angkatan'];



                                                        ?>
                                                            <?=$angkatan;?>
                                                        </td>
                                                        <td>
                                                        <?php
                                                        $ambiljr = $dt_rekening['id_jurusan'];
                                                        $qrambiljr = mysqli_query($koneksi,"SELECT nama_jurusan FROM tbl_jurusan WHERE id_jurusan='$ambiljr'") or die (mysqli_error($koneksi));
                                                        $rvambiljr = mysqli_fetch_assoc($qrambiljr);
                                                        $jurusan = $rvambiljr['nama_jurusan'];



                                                        ?>
                                                            <?=$jurusan;?>
                                                        </td>
                                                       
                                                        <td>
                                                            <center>
                                                            <button type="button" class="btn btn-sm btn-info"
                                                                    data-toggle="modal"
                                                                    data-target="#modal-edit"
                                                                    >
                                                                    <i class="nav-icon fas fa-receipt"></i>
                                                                    Presensi
                                                                </button>
                                                                <button type="button" class="btn btn-sm btn-primary"
                                                                    data-toggle="modal"
                                                                    data-target="#modal-edit"
                                                                    data-nama="<?=$dt_rekening['nama_kelas'];?>"
                                                                    data-wali="<?=$dt_rekening['wali_kelas'];?>"
                                                                    data-jurusan="<?=$dt_rekening['id_jurusan'];?>"
                                                                    >
                                                                    <i class="nav-icon fas fa-edit"></i>
                                                                </button>
                                                                
                                                            </center>
                                                        </td>
                                                    </tr>
                                            <?php
                                                }
                                            } else
                                            {
                                              ?>
                                              <tr>
                                                  <td colspan="8"> Tidak ditemukan data mahasiswa pada database</td>
                                              </tr>
                                              <?php
                                            }
                                            ?>
                                            
                                            <tr>
                                            </tr>
                                    </table>
                <?php
        }
        ?>
         
        </div>
                </div>
              </div>
            </div>
          </div>
        </div>


    </section>

           
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
                                        <td width="30%">Nama Kelas</td>
                                        <td width="5%">:</td>
                                        <td>
                                            <input type="text" name="ed_namaterpilih" class="form-control">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="30%">Wali Kelas</td>
                                        <td width="5%">:</td>
                                        <td>
                                            <input type="text" name="ed_waliterpilih" class="form-control">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="30%">Kategori</td>
                                        <td width="5%">:</td>
                                        <td>
                                            <select name="ed_kategoriterpilih" id="ed_kategoriterpilih" class="form-control">
                                                <option value="">--pilih Kategori--</option>
                                                <?php
                                                $qrambil = mysqli_query($koneksi,"SELECT * FROM tbl_jurusan") or die (mysqli_error($koneksi));
                                                $tmpung = mysqli_fetch_assoc($qrambil);
                                                $ktegori = $tmpung['nama_jurusan'];
                                                $id = $tmpung['id_jurusan'];

                                    

                                                ?>
                                            </select>
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

      var nama = $(e.relatedTarget).data('nama');
      var wali = $(e.relatedTarget).data('wali');
      var jurusan = $(e.relatedTarget).data('jurusan');
      


      $(e.currentTarget).find('input[name="ed_namaterpilih"]').val(nama);
      $(e.currentTarget).find('input[name="ed_waliterpilih"]').val(wali);
      $(e.currentTarget).find('input[name="ed_kategoriterpilih"]').val(jurusan);
     

    });
  </script>
</body>

</html>
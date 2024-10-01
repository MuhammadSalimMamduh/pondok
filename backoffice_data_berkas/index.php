<?php
session_start();
$konstruktor = "data_berkas";
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
              <div class="card-header" style="background-color: #490206;">
                <h3 class="card-title"><font color="#ffffff"><i class="nav-icon fas fa-book"></i> &nbsp Berkas</font></h3>
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
                    <th><center>NIK & Nama</center></th>
                    <th><center>Foto</center></th>
                    <th><center>Akte</th></center>
                    <th><center>Kartu Keluarga</th></center>
                    <th><center>Ijazah</th></center>
                    <th><center>Aksi</th></center>
            
                  </tr>
                  </thead>
                  <tbody>
                    
                    <?php
                    $no = 1;
                    $sqlpanggilberkas = mysqli_query($koneksi, "SELECT * FROM tbl_berkas") or die (mysqli_error($koneksi));

                    if (mysqli_num_rows($sqlpanggilberkas)>0){
                        //jika ada data pada database
                        while($data = mysqli_fetch_array($sqlpanggilberkas)){
                            ?>

                            
                            <tr>
                               <td><?=$no++?></td>
                               
                               <td>
                               <?php
                               $nomertogel = $data['nik'];
                               $qweri = mysqli_query($koneksi, "SELECT nama_lengkap FROM tbl_pendaftaran WHERE nik='$nomertogel'") or die(mysqli_error($koneksi));
                               $arrqweri = mysqli_fetch_assoc($qweri);
                               $nama = $arrqweri['nama_lengkap'];
                               ?>
                               <b><?=$data['nik'];?></b>
                               <br>
                               <?=$nama;?>
                              </td>
                              <td>
                          <?php
                          if($data['foto']==null){
                            ?>
                            <center>
                            <button type="button" class="btn btn-sm btn-primary" style="background-color: transparent;"
                                  data-toggle="modal"
                                  data-target="#modal-foto" 
                                  data-nim="<?=$data['nik'];?>"
                                  data-foto="../img/user.png">
                                  <img src="../img/user.png" height="50px" width="50px">
                                  </button>
                          </center>
                            <?php
                          }else{
                            ?>
                            <center>
                            <button type="button" class="btn btn-sm btn-primary" style="background-color: transparent;"
                                  data-toggle="modal"
                                  data-target="#modal-foto" 
                                  data-nim="<?=$data['nik'];?>"
                                  data-foto="<?=$data['foto'];?>">
                                  <img src="<?=$data['foto'];?>" height="50px" width="50px">
                                  </button>
                          </center>
                            <?php
                          }
                          ?>
                          
                        </td>
                        <td>
                          <?php
                          if($data['fc_akte']==null){
                            ?>
                            <center>
                            <button type="button" class="btn btn-sm btn-primary" style="background-color: transparent;"
                                  data-toggle="modal"
                                  data-target="#modal-akte" 
                                  data-nim="<?=$data['nik'];?>"
                                  data-akte="../img/kosong.png">
                                  <img src="../img/kosong.png" height="50px" width="50px">
                                  </button>
                          </center>
                            <?php
                          }else{
                            ?>
                            <center>
                            <button type="button" class="btn btn-sm btn-primary" style="background-color: transparent;"
                                  data-toggle="modal"
                                  data-target="#modal-akte" 
                                  data-nim="<?=$data['nik'];?>"
                                  data-akte="<?=$data['fc_akte'];?>">
                                  <img src="<?=$data['fc_akte'];?>" height="50px" width="50px">
                                  </button>
                          </center>
                            <?php
                          }
                          ?>
                          
                        </td>
                        <td>
                          <?php
                          if($data['fc_kk']==null){
                            ?>
                            <center>
                            <button type="button" class="btn btn-sm btn-primary" style="background-color: transparent;"
                                  data-toggle="modal"
                                  data-target="#modal-kk" 
                                  data-nim="<?=$data['nik'];?>"
                                  data-kk="../img/kosong.png">
                                  <img src="../img/kosong.png" height="50px" width="50px">
                                  </button>
                          </center>
                            <?php
                          }else{
                            ?>
                            <center>
                            <button type="button" class="btn btn-sm btn-primary" style="background-color: transparent;"
                                  data-toggle="modal"
                                  data-target="#modal-kk" 
                                  data-nim="<?=$data['nik'];?>"
                                  data-kk="<?=$data['fc_kk'];?>">
                                  <img src="<?=$data['fc_kk'];?>" height="50px">
                                  </button>
                          </center>
                            <?php
                          }
                          ?>
                          
                        </td>
                        </td>
                        <td>
                          <?php
                          if($data['fc_ijazah']==null){
                            ?>
                            <center>
                            <button type="button" class="btn btn-sm btn-primary" style="background-color: transparent;"
                                  data-toggle="modal"
                                  data-target="#modal-ijazah" 
                                  data-nim="<?=$data['nik'];?>"
                                  data-ijazah="../img/kosong.png">
                                  <img src="../img/kosong.png" height="50px" width="50px">
                                  </button>
                          </center>
                            <?php
                          }else{
                            ?>
                            <center>
                            <button type="button" class="btn btn-sm btn-primary" style="background-color: transparent;"
                                  data-toggle="modal"
                                  data-target="#modal-ijazah" 
                                  data-nim="<?=$data['nik'];?>"
                                  data-ijazah="<?=$data['fc_ijazah'];?>">
                                  <img src="<?=$data['fc_ijazah'];?>" height="50px" width="50px">
                                  </button>
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
                                  data-bukti="<?=$data['bukti_du']; ?>"
                                  data-nik="<?=$data['nik']; ?>">
                                  <i class="nav-icon fas fa-eye"></i>
                                  Bukti
                                </button>

                                <a href="formedit.php?nik=<?=$data['nik'];?>" class="btn btn-sm btn-secondary"><i class="nav-icon fas fa-edit"></i>Edit</a>

                         
                                 <a href="proseshapus.php?berkas=<?=$data['nik']; ?>&hapus=hapus" class="btn btn-sm btn-danger" onclick="return confirm('Anda akan menghapus data Berkas [<?= $data['nik']; ?>] - Nama Santri : <?= $data['nama']; ?>]')"><i class="nav-icon fas fa-trash"></i></a>

                               
                                 <!-- <a href="hapus2.php?unique=<?=$data['nik'];?>&jeneng=<?=$data['nama'];?>" class="btn btn-sm btn-info">
                                 <i class="nav-icon fas fa-trash">
                                  
                                 </i>

                                 </a> -->
                                </center>
                              </td>
                            </tr>
                            <?php
                        }
                    }
                    else{
                        //jika tidak ada data pada database
                        echo "<tr><td colspan=\"4\" align=\"center\"><h5>DATANE KOSONG SON ! </h5></td></tr>";
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
          <form action="terima.php" class="form-horizontal" method="POST" id="bukti">
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

              <input type="number" name="nik" id="nik" hidden>
            </div>
            <div class="modal-footer pull-right">
              <button type="submit" name="terima" class="btn btn-secondary"> <i class="nav-icon fas fa-edit"></i> Terima Santri</button>
            </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal bukti -->

<!-- modal foto -->
<div class="modal fade" id="modal-foto">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header" style="background-color: #b5ab70;">
          <h4 class="modal-title">
            <font color="#ffffff"><i class="nav-icon fas fa-edit"></i>Foto Santri</font>
          </h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

          <div class="modal-body">
          <center>
          <img src="" id="fotomhs" height="450px" width="450px">
          
            <div class="modal-footer pull-right">
            <button id="downloadfoto" class="btn btn-block btn-sm btn-danger"><i class="nav-icon fas fa-download"></i> Download</button>
            </div>
          </div>
             </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- end modal foto -->

   <!-- modal akte -->
<div class="modal fade" id="modal-akte">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header" style="background-color: #b5ab70;">
          <h4 class="modal-title">
            <font color="#ffffff"><i class="nav-icon fas fa-edit"></i>Akte</font>
          </h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

          <div class="modal-body">
          <center>
          <img src="" id="akte" height="450px" width="450px">
          
            <div class="modal-footer pull-right">
              <button type="button" id="downloadakte" name="editfoto" class="btn btn-block btn-sm btn-secondary"><i class="nav-icon fas fa-download"></i> Download</button>
            </div>
          </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- end modal akte -->
     <!--  modal kartu keluarga -->
  <div class="modal fade" id="modal-kk">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header" style="background-color: #b5ab70;">
          <h4 class="modal-title">
            <font color="#ffffff"><i class="nav-icon fas fa-edit"></i>Kartu Keluarga</font>
          </h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

          <div class="modal-body">
          <center>
          <img src="" id="kk" height="450px" width="450px">
          
            <div class="modal-footer pull-right">
              <button type="button" id="downloadkk" name="editfoto" class="btn btn-block btn-sm btn-secondary"><i class="nav-icon fas fa-download"></i> Download</button>
            </div>
          </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- end modal kartu keluarga-->
    <!--  modal ijazah -->
  <div class="modal fade" id="modal-ijazah">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header" style="background-color: #b5ab70;">
          <h4 class="modal-title">
            <font color="#ffffff"><i class="nav-icon fas fa-edit"></i>ijazah</font>
          </h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

          <div class="modal-body">
          <center>
          <img src="" id="ijazah" height="450px" width="450px">
          
            <div class="modal-footer pull-right">
              <button type="button" id="downloadijazah" name="editfoto" class="btn btn-block btn-sm btn-secondary"><i class="nav-icon fas fa-download"></i> Download</button>
            </div>
          </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- end modal ijazah-->


<div class="modal fade" id="modal-edit">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header" style="background-color: #b5ab70">
              <h4 class="modal-title"><font color="#ffffff">Edit</font></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="prosesberkas.php" method="post" enctype="multipart/form-data" id=modal-foto>
                <div class="card-body">
                <div class="form-group">
                  <?php
                  $nomertogel = @$_GET['nik'];
               
                  $qrlihat = mysqli_query($koneksi, "SELECT * FROM tbl_berkas WHERE nik='$nomertogel'") or die(mysqli_error($koneksi));
                  if(mysqli_num_rows($qrlihat)>0){
                    $arrlihat = mysqli_fetch_assoc($qrlihat);
                    $foto = $arrlihat['foto'];
                    $akte = $arrlihat['fc_akte'];
                    $kk = $arrlihat['fc_kk'];
                    $kk = $arrlihat['fc_kk'];
                    $ijazah = $arrlihat['fc_ijazah'];


                  }else{
                    $foto = "../img/user.png";
                    $akte = "../img/kosong.png";
                    $kk = "../img/kosong.png";
                    $kk = "../img/kosong.png";
                    $ijazah = "../img/kosong.png";
                  }
                  ?>
                    
                  </div>

                
                  <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-primary">
                            <div class="card-header">
                            <h3 class="card-title"><i class= "nav-icon fas fa-file-pdf"></i> Dokumen yang Mau diedit </h3>
                            </div>
                            <div class="card-body">
                                <table class="table table-sm table-striped table-bordered">
                                    <thead>
                                        <th width="5%">No.</th>
                                        <th>Berkas</th>
                                        <th>File Terunggah</th>
                                        <th>Aksi</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                1
                                            </td>
                                            <td>
                                               Foto (Background Merah)
                                            </td>
                                            <td>
                                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-lihatfoto"> <i class="nav-icon fas fa-eye"></i> Lihat Berkas</button>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-uploadfoto"> Unggah Berkas</button>
                                                <button type="submit" name="edit" class="btn btn-secondary"><i class="nav-icon fas fa-edit">Ya, Edit Berkas</i></button>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                2
                                            </td>
                                            <td>
                                               Akta Kelahiran
                                            </td>
                                            <td>
                                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-lihatakte"> <i class="nav-icon fas fa-eye"></i> Lihat Berkas</button>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-uploadakte"> Unggah Berkas</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                3
                                            </td>
                                            <td>
                                               Kartu Keluarga
                                            </td>
                                            <td>
                                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-lihatkk"> <i class="nav-icon fas fa-eye"></i> Lihat Berkas</button>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-uploadkk"> Unggah Berkas</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                4
                                            </td>
                                            <td>
                                               Ijazah Terakhir
                                            </td>
                                            <td>
                                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-lihatijazah"> <i class="nav-icon fas fa-eye"></i> Lihat Berkas</button>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-uploadijazah"> Unggah Berkas</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>

                        </div>
                    </div>
                   
                  </div>
                </div>      
                <!-- /.card-body -->
                <div class="card-footer">
                  <!-- <button type="submit" name="daftar" class="btn btn-secondary btn-block"><i class="nav-icon fas fa-check"> </i> Selesai</button> -->
                  <a href="../index.php" class="btn btn-success btn-block"><i class="nav-icon fas fa-check"></i> Selesai</a>
                </div>
              </form>
            </div>
            <!-- /.card -->


          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
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
<script type="text/javascript">
    $('#modal-foto').on('show.bs.modal', function(e) {

      var nim = $(e.relatedTarget).data('nik');
      var foto = $(e.relatedTarget).data('foto');

      
      document.getElementById('fotomhs').src= foto;
      document.getElementById('downloadfoto').download = foto;
    });
  </script>
  <script type="text/javascript">
    $('#modal-akte').on('show.bs.modal', function(e) {

      var nim = $(e.relatedTarget).data('nik');
      var akte = $(e.relatedTarget).data('akte');

      
      document.getElementById('akte').src= akte;
    });
  </script>
    <script type="text/javascript">
    $('#modal-kk').on('show.bs.modal', function(e) {

      var nim = $(e.relatedTarget).data('nik');
      var kk = $(e.relatedTarget).data('kk');

      
      document.getElementById('kk').src= kk;
    });
  </script>

    <script type="text/javascript">
    $('#modal-ijazah').on('show.bs.modal', function(e) {

      var nim = $(e.relatedTarget).data('nik');
      var ijazah = $(e.relatedTarget).data('ijazah');

      
      document.getElementById('ijazah').src= ijazah;
    });
  </script>

<script>
        // Fungsi untuk mengubah link menjadi link unduhan gambar foto
        document.getElementById('downloadfoto').addEventListener('click', function () {
            const imageUrl = document.getElementById('fotomhs').src;

            // Mengambil gambar dengan fetch
            fetch(imageUrl, { mode: 'cors' })  // Menambahkan mode cors
                .then(response => {
                    if (!response.ok) {
                        throw new Error("Network response was not ok.");
                    }
                    return response.blob();
                })
                .then(blob => {
                    // Periksa jenis MIME dari blob
                    const blobType = blob.type;
                    console.log("Blob type:", blobType);  // Untuk debugging
                    
                    // Membuat URL objek dan mendownloadnya
                    const url = window.URL.createObjectURL(blob);
                    const a = document.createElement('a');
                    a.style.display = 'none';
                    a.href = url;
                    a.download = 'image.jpg';  // Nama file unduhan
                    document.body.appendChild(a);
                    a.click();
                    window.URL.revokeObjectURL(url);  // Membersihkan URL objek setelah pengunduhan
                })
                .catch(err => {
                    console.error('Gagal mengunduh gambar:', err);
                    alert('Gagal mengunduh gambar. Periksa URL dan format gambar.');
                });
        });

        // Fungsi untuk mengubah link menjadi link unduhan gambar kk
        document.getElementById('downloadkk').addEventListener('click', function () {
            const imageUrl = document.getElementById('kk').src;

            // Mengambil gambar dengan fetch
            fetch(imageUrl, { mode: 'cors' })  // Menambahkan mode cors
                .then(response => {
                    if (!response.ok) {
                        throw new Error("Network response was not ok.");
                    }
                    return response.blob();
                })
                .then(blob => {
                    // Periksa jenis MIME dari blob
                    const blobType = blob.type;
                    console.log("Blob type:", blobType);  // Untuk debugging
                    
                    // Membuat URL objek dan mendownloadnya
                    const url = window.URL.createObjectURL(blob);
                    const a = document.createElement('a');
                    a.style.display = 'none';
                    a.href = url;
                    a.download = 'image.jpg';  // Nama file unduhan
                    document.body.appendChild(a);
                    a.click();
                    window.URL.revokeObjectURL(url);  // Membersihkan URL objek setelah pengunduhan
                })
                .catch(err => {
                    console.error('Gagal mengunduh gambar:', err);
                    alert('Gagal mengunduh gambar. Periksa URL dan format gambar.');
                });
        });

        // Fungsi untuk mengubah link menjadi link unduhan gambar akte
        document.getElementById('downloadakte').addEventListener('click', function () {
            const imageUrl = document.getElementById('akte').src;

            // Mengambil gambar dengan fetch
            fetch(imageUrl, { mode: 'cors' })  // Menambahkan mode cors
                .then(response => {
                    if (!response.ok) {
                        throw new Error("Network response was not ok.");
                    }
                    return response.blob();
                })
                .then(blob => {
                    // Periksa jenis MIME dari blob
                    const blobType = blob.type;
                    console.log("Blob type:", blobType);  // Untuk debugging
                    
                    // Membuat URL objek dan mendownloadnya
                    const url = window.URL.createObjectURL(blob);
                    const a = document.createElement('a');
                    a.style.display = 'none';
                    a.href = url;
                    a.download = 'image.jpg';  // Nama file unduhan
                    document.body.appendChild(a);
                    a.click();
                    window.URL.revokeObjectURL(url);  // Membersihkan URL objek setelah pengunduhan
                })
                .catch(err => {
                    console.error('Gagal mengunduh gambar:', err);
                    alert('Gagal mengunduh gambar. Periksa URL dan format gambar.');
                });
        });

        // Fungsi untuk mengubah link menjadi link unduhan gambar ijazah
        document.getElementById('downloadijazah').addEventListener('click', function () {
            const imageUrl = document.getElementById('ijazah').src;

            // Mengambil gambar dengan fetch
            fetch(imageUrl, { mode: 'cors' })  // Menambahkan mode cors
                .then(response => {
                    if (!response.ok) {
                        throw new Error("Network response was not ok.");
                    }
                    return response.blob();
                })
                .then(blob => {
                    // Periksa jenis MIME dari blob
                    const blobType = blob.type;
                    console.log("Blob type:", blobType);  // Untuk debugging
                    
                    // Membuat URL objek dan mendownloadnya
                    const url = window.URL.createObjectURL(blob);
                    const a = document.createElement('a');
                    a.style.display = 'none';
                    a.href = url;
                    a.download = 'image.jpg';  // Nama file unduhan
                    document.body.appendChild(a);
                    a.click();
                    window.URL.revokeObjectURL(url);  // Membersihkan URL objek setelah pengunduhan
                })
                .catch(err => {
                    console.error('Gagal mengunduh gambar:', err);
                    alert('Gagal mengunduh gambar. Periksa URL dan format gambar.');
                });
        });
    </script>

    <script type="text/javascript">
    $('#modal-bukti').on('show.bs.modal', function(e) {


      var bukti = $(e.relatedTarget).data('bukti');
      var nik = $(e.relatedTarget).data('nik');
   
      var path = "../img/bukti_du/"+bukti;

      $(e.currentTarget).find('input[name="nik"]').val(nik);
      document.getElementById('fotobukti').src= path;
    });
  </script>


</body>
</html>

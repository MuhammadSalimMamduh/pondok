<?php
require_once '../database/config.php';
$kode = @$_GET['kode'];
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ribath Al Musyarraf</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../assets_adminlte/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets_adminlte/dist/css/adminlte.min.css">
  <link rel="shortcut icon" href="../assets_adminlte/img/pondok.png">
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">
<?php
include '../preloader.php';
?>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white" style="background-color: #b5ab70;">
    <div class="container">
      <a href="../assets_adminlte/index3.html" class="navbar-brand">
        <img src="../assets_adminlte/img/pondok.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><font color="#ffffff"><b>Formulir Pendaftaran</b></font></span>
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
       
    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
         
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
          <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title"><i class= "nav-icon fas fa-file-pdf"></i> Formulir Pendaftaran</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="prosesformulir.php" method="post">
                <div class="card-body">
                <input type="nama" class="form-control" name="kode" id="kode" placeholder="Masukkan Nama Lengkapmu" value="<?=$kode;?>" hidden>
                <div class="form-group">
                    <label for="nik">NIK</label>
                    <input type="number"  inputmode="numeric"  maxlength="3" pattern="[0-9]{1} - [0-9]{2} - [0-9]{3}" class="form-control" id="nik" name="nik" placeholder=" Masukkan NIK" required>
                  </div>
                  <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="nama" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama Lengkapmu" required>
                  </div>
                  <div class="form-group">
                    <label for="tempat">Tempat Lahir</label>
                    <input type="text" class="form-control" name="tempat" id="tempat" placeholder="Masukkan Tempat Lahir" required>
                  </div>
                  <div class="form-group">
                    <label for="tempat">Tanggal Lahir</label>
                    <input type="date" class="form-control" name="tgl_lahir" id="tempat" placeholder="Masukkan Tempat Lahir" required>
                  </div>
                  <div class="form-group">
                      <label for="kelamin">Kelamin</label>
                      <select name="kelamin" class="form-control" required>
                      <option value="">-- Pilih Kelamin --</option>
                      <option value="Laki-Laki"> Laki-Laki </option>
                      <option value="Perempuan"> Perempuan </option>
                      </select>
                  </div>
               
                  <div class="form-group">
                    <label for="asalsekolah">Asal Sekolah</label>
                    <input type="text" name="sekolah" class="form-control" id="asalsekolah" placeholder=" Masukkan Asal Sekolah" required>
                  </div>
                  <div class="form-group">
                  <label for="kelamin">Jurusan</label>
                      <select name="jurusan" class="form-control" required>
                      <option value="">-- Pilih Jurusan --</option>
                      <?php
                      $qrambil = mysqli_query($koneksi,"SELECT * FROM tbl_jurusan") or die(mysqli_error($koneksi));
                      if(mysqli_num_rows($qrambil)>0){
                        while($dt_jurusan=mysqli_fetch_array($qrambil)){
                          $idjurusan = $dt_jurusan['id_jurusan'];
                          $namajurusan = $dt_jurusan['nama_jurusan'];
                          ?>
                           <option value="<?=$idjurusan;?>"> <?=$namajurusan;?></option>
                          <?php
                        }
                      }
                      ?>
                      </select>
                  </div>
                  <div class="form-group">
                    <label for="ayah">Nama Ayah</label>
                    <input type="text" name="ayah" class="form-control" id="ayah" placeholder=" Masukkan Nama Ayah" required>
                  </div>
                  <div class="form-group">
                    <label for="ibu">Nama Ibu</label>
                    <input type="text" name="ibu" class="form-control" id="ibu" placeholder=" Masukkan Nama ibu" required>
                  </div>
                  <div class="form-group">
                    <label for="wali">Nama Wali (*opsional)</label>
                    <input type="text" name="wali" class="form-control" id="wali" placeholder=" Masukkan Nama Wali">
                  </div>
                  <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" name="alamat" class="form-control" id="alamat" placeholder=" Masukkan Alamat " required>
                  </div>
                  
                  <div class="form-group">
                    <label for="kontak">No. Whatsapp</label>
                    <input type="text" name="kontak" class="form-control" id="kontak" placeholder=" Masukkan no telp " required>
                  </div>
                  <div class="form-group">
                    <label for="riwayat">Riwayat Penyakit</label>
                    <input type="text" class="form-control" id="riwayat" name="riwayat" placeholder="Masukan Riwayat Penyakit jika ada" >
                  </div>  
                   
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" name="daftar" class="btn btn-secondary btn-block"><i class="nav-icon fas fa-edit"> </i> Ya ,Daftarkan</button>
                </div>
              </form>
            </div>
            <!-- /.card -->


          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="../assets_adminlte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../assets_adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets_adminlte/dist/js/adminlte.min.js"></script>

<script>
    const inputField = document.getElementById('nik');

    inputField.addEventListener('input', function() {
      // Menghapus semua karakter selain angka
      this.value = this.value.replace(/\D/g, '');

      // Jika panjang input lebih dari 10, potong menjadi 10
      if (this.value.length > 16) {
        this.value = this.value.slice(0, 16);
      }
    });

    inputField.addEventListener('blur', function() {
      // Validasi panjang input saat kehilangan fokus
      if (this.value.length !== 16) {
        this.setCustomValidity('NIK harus berisi tepat 16 angka.');
      } else {
        this.setCustomValidity(''); // Tidak ada error jika valid
      }

      // Memicu validasi ulang
      this.reportValidity();
    });
  </script>

<script>
    const inputNama = document.getElementById('nama');

    inputNama.addEventListener('input', function(e) {
      // Mengizinkan hanya huruf, apostrof ('), titik (.), dan koma (,)
      this.value = this.value.replace(/[^a-zA-Z',. ]/g, '');
    });
  </script>

<script>
    const inputTempat = document.getElementById('tempat');

    inputTempat.addEventListener('input', function(e) {
      // Mengizinkan hanya huruf, apostrof ('), titik (.), dan koma (,)
      this.value = this.value.replace(/[^a-zA-Z',. ]/g, '');
    });
  </script>

<script>
    const inputAyah = document.getElementById('ayah');

    inputAyah.addEventListener('input', function(e) {
      // Mengizinkan hanya huruf, apostrof ('), titik (.), dan koma (,)
      this.value = this.value.replace(/[^a-zA-Z',. ]/g, '');
    });
  </script>

<script>
    const inputIbu = document.getElementById('ibu');

    inputIbu.addEventListener('input', function(e) {
      // Mengizinkan hanya huruf, apostrof ('), titik (.), dan koma (,)
      this.value = this.value.replace(/[^a-zA-Z',. ]/g, '');
    });
  </script>

<script>
    const inputWali = document.getElementById('wali');

    inputWali.addEventListener('input', function(e) {
      // Mengizinkan hanya huruf, apostrof ('), titik (.), dan koma (,)
      this.value = this.value.replace(/[^a-zA-Z',. ]/g, '');
    });
  </script>

<script>
    const inputkontak = document.getElementById('kontak');

    inputkontak.addEventListener('input', function(e) {

      // Menghapus semua karakter selain angka
      this.value = this.value.replace(/\D/g, '');

      // Menghapus pesan error ketika user sedang mengetik
      if (this.value.length >= 11 && this.value.length <= 13) {
        this.setCustomValidity(''); // Validasi kosong jika sudah valid
      }
    });

    inputkontak.addEventListener('blur', function() {
      // Validasi panjang input saat kehilangan fokus
      if (this.value.length < 11) {
        this.setCustomValidity('Minimal harus berisi 11 angka.');
      } else if (this.value.length > 13) {
        this.setCustomValidity('Maksimal hanya 13 angka yang diperbolehkan.');
      } else {
        this.setCustomValidity(''); // Tidak ada error jika valid
      }

      // Memicu validasi ulang (agar pesan error muncul di UI jika tidak valid)
      this.reportValidity();
    });
  </script>

</body>
</html>

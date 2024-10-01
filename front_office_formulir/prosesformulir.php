<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ribath Al Musyarraf</title>
</head>
<body>

<?php
require_once '../database/config.php';
session_start();

if(isset($_POST['daftar'])) {

    $kode = trim(mysqli_real_escape_string($koneksi, $_POST['kode']));;
   
    $nik = trim(mysqli_real_escape_string($koneksi, $_POST['nik']));
    $nama_lengkap = trim(mysqli_real_escape_string($koneksi, $_POST['nama']));
    $alamat = trim(mysqli_real_escape_string($koneksi, $_POST['alamat']));
    $asal_sekolah = trim(mysqli_real_escape_string($koneksi, $_POST['sekolah']));
    $ayah = trim(mysqli_real_escape_string($koneksi, $_POST['ayah']));
    $ibu = trim(mysqli_real_escape_string($koneksi, $_POST['ibu']));
    $wali = trim(mysqli_real_escape_string($koneksi, $_POST['wali']));
    $tgl_lahir = trim(mysqli_real_escape_string($koneksi, $_POST['tgl_lahir']));
    $tmp_lahir = trim(mysqli_real_escape_string($koneksi, $_POST['tempat']));
    $kontak = trim(mysqli_real_escape_string($koneksi, $_POST['kontak']));
    $tgl_daftar = date('Y-m-d');;
    $riwayat_penyakit = trim(mysqli_real_escape_string($koneksi, $_POST['riwayat']));
    $kelamin = trim(mysqli_real_escape_string($koneksi, $_POST['kelamin']));
    // $wali = '';
    $id_jurusan = trim(mysqli_real_escape_string($koneksi, $_POST['jurusan'])); 
    $nis = '';
   

    $querycek = mysqli_query($koneksi, "SELECT nik FROM tbl_pendaftaran WHERE nik=$nik" ) or die(mysqli_error($koneksi));

    $rvpendaftaran = mysqli_num_rows($querycek);
 
    if($rvpendaftaran>0){
    
    ?>
    <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        swal("Token Sudah diGunakan", "Silakan Masukan Kode Formulir Yg Valid", "error");
        setTimeout(function(){window.location.href = "front_office_formulir";}, 100);
    </script> -->
    <?php
    }
    else {
        $tambahsantri = mysqli_query($koneksi, "INSERT INTO tbl_pendaftaran VALUES ('$nis', '$nik', '$nama_lengkap', '$tmp_lahir', '$tgl_lahir', '$alamat', '$asal_sekolah','$ayah', '$ibu', '$wali','$kontak','$tgl_daftar','$riwayat_penyakit','$kelamin', '$id_jurusan')") or die(mysqli_error($koneksi));
     
        
        $qrupdate = mysqli_query($koneksi,"UPDATE tbl_pembayaran SET status='1' WHERE kode_formulir='$kode'") or die(mysqli_error($koneksi));



    ?>
    <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        swal("Pendaftaran Berhasil", "Selamat anda menjadi santri", "success");
        setTimeout(function(){window.location.href = "prosesformulir.php";}, 1500);
    </script> -->
    <?php

    }

   
}

?>  
</body>
</html>
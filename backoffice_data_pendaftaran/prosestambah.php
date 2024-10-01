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

if (isset($_POST['tambahmhs'])) {
    $nis = trim(mysqli_real_escape_string($koneksi, $_POST['nis']));
    $nik = trim(mysqli_real_escape_string($koneksi, $_POST['nik']));
    $nama_lengkap = trim(mysqli_real_escape_string($koneksi, $_POST['nama']));
    $alamat = trim(mysqli_real_escape_string($koneksi, $_POST['alamat']));
    $asal_sekolah = trim(mysqli_real_escape_string($koneksi, $_POST['sekolah']));
    $ortu = trim(mysqli_real_escape_string($koneksi, $_POST['ortu']));
    $tgl_lahir = trim(mysqli_real_escape_string($koneksi, $_POST['tgl_lahir']));
    $tmp_lahir = trim(mysqli_real_escape_string($koneksi, $_POST['tmp_lahir']));
    $kontak = trim(mysqli_real_escape_string($koneksi, $_POST['kontak']));
    $tgl_daftar = trim(mysqli_real_escape_string($koneksi, $_POST['tgl_daftar']));
    $riwayat_penyakit = trim(mysqli_real_escape_string($koneksi, $_POST['riwayat']));
    $kelamin = trim(mysqli_real_escape_string($koneksi, $_POST['kelamin']));
    $wali = trim(mysqli_real_escape_string($koneksi, $_POST['wali']));
   

    $querycek = mysqli_query($koneksi, "SELECT nis FROM tbl_pendaftaran WHERE nis='$nis'" ) or die(mysqli_error($koneksi,));

    $rvpendaftaran = mysqli_num_rows($querycek);

    if($rvpendaftaran>0){
    ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
    <script>
        swal("Duplikat Data", "Data dengan NIS : <?=$nis;?> ", "error");
        setTimeout(function(){window.location.href = "../backoffice_data_pendaftaran";}, 1500);
    </script>'
    <?php
    }
    else {

    $tambahsantri = mysqli_query($koneksi, "INSERT INTO tbl_pendaftaran VALUES ('$nis', '$nik', '$nama_lengkap', '$tmp_lahir', '$tgl_lahir', '$alamat', '$asal_sekolah','$ortu','$wali','$kontak','$tgl_daftar','$riwayat_penyakit','$kelamin')") or die(mysqli_error($koneksi,));


    ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
    <script>
        swal("Berhasil", "Data Santri dengan NIS : <?=$nis;?> berhasil ditambahkan", "success");
        setTimeout(function(){window.location.href = "../backend_data_pendafataran";}, 1500);
    </script>
    <?php

    }
}

?>  
</body>
</html>
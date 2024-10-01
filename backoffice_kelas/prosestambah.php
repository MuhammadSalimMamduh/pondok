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
    $id = '';
    $nama_kelas = trim(mysqli_real_escape_string($koneksi, $_POST['kelas']));
    $angkatan = trim(mysqli_real_escape_string($koneksi, $_POST['angkatan']));
    $wali_kelas = trim(mysqli_real_escape_string($koneksi, $_POST['wali']));
    $jurusan = trim(mysqli_real_escape_string($koneksi, $_POST['jurusan']));

   

    $querycek = mysqli_query($koneksi, "SELECT nama_kelas FROM tbl_kelas WHERE id='$id'" ) or die(mysqli_error($koneksi,));

    $rvpendaftaran = mysqli_num_rows($querycek);

    if($rvpendaftaran>0){
    ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
    <script>
        swal("Duplikat Data", "Data dengan Id : <?=$id;?> ", "error");
        setTimeout(function(){window.location.href = "../backoffice_kelas";}, 1500);
    </script>'
    <?php
    }
    else {

    $tambahsantri = mysqli_query($koneksi, "INSERT INTO tbl_kelas VALUES ('$id','$nama_kelas','$angkatan','$wali_kelas','$jurusan')") or die(mysqli_error($koneksi));


    ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
    <script>
        swal("Berhasil", "Data Santri dengan NIS : <?=$id;?> berhasil ditambahkan", "success");
        setTimeout(function(){window.location.href = "../backoffice_kelas";}, 1500);
    </script>
    <?php

    }
}

?>  
</body>
</html>
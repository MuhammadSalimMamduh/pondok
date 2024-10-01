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
    $id = NULL;
    $kode = trim(mysqli_real_escape_string($koneksi, $_POST['kode']));
    $nisn = trim(mysqli_real_escape_string($koneksi, $_POST['nisn']));
    $nama_santri = trim(mysqli_real_escape_string($koneksi, $_POST['nama']));
    $status = trim(mysqli_real_escape_string($koneksi, $_POST['status']));
    $nomer = trim(mysqli_real_escape_string($koneksi, $_POST['nomer']));
    $bukti = '';
   

    $querycek = mysqli_query($koneksi, "SELECT id FROM tbl_pembayaran WHERE kode_formulir='$kode'" ) or die(mysqli_error($koneksi,));

    $rvpendaftaran = mysqli_num_rows($querycek);

    if($rvpendaftaran>0){
    ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
    <script>
        swal("Duplikat Data", "Data dengan Kode Formulir : <?=$kode;?> ", "error");
        setTimeout(function(){window.location.href = "../backoffice_data_pembayaran";}, 1500);
    </script>'
    <?php
    }
    else {

    $tambahsantri = mysqli_query($koneksi, "INSERT INTO tbl_pembayaran VALUES (null, '$kode', '$nisn', '$nama_santri', '$status', '$nomer','$bukti')") or die(mysqli_error($koneksi,));


    ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
    <script>
        swal("Berhasil", "Data Santri dengan Kode Formulir : <?=$kode;?> berhasil ditambahkan", "success");
        setTimeout(function(){window.location.href = "../backoffice_data_pembayaran";}, 1500);
    </script>
    <?php

    }
}

?>  
</body>
</html>
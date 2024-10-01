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

if (isset($_POST['uploadakte'])) {
    $id = trim(mysqli_real_escape_string($koneksi, $_POST['nik']));
    $nama = trim(mysqli_real_escape_string($koneksi, $_POST['nama']));

    $file = $_FILES['akte']['name'];
    $ekstensi = explode(".", $file);
    $file_name = "berkas".$file;
    $temp_file = $_FILES['akte']['tmp_name'];
    $targetdir = "../img/berkas/";
    $file_upload = $targetdir.$file_name;

    $aksi_upload = move_uploaded_file($temp_file, $file_upload);

    $querycek = mysqli_query($koneksi, "SELECT nik FROM tbl_berkas WHERE nik='$id'" ) or die(mysqli_error($koneksi,));

    $rvpendaftaran = mysqli_num_rows($querycek);

    if($rvpendaftaran>0){
    $qrupdate = mysqli_query($koneksi, "UPDATE tbl_berkas SET fc_akte='$file_upload' WHERE nik='$id'") or die(mysqli_error($koneksi));
    }
    else {

    $qrtambah = mysqli_query($koneksi, "INSERT INTO tbl_berkas VALUES (null, null, '$file_upload', null, null,'$id', '$nama')") or die(mysqli_error($koneksi));


    ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
    <script>
        swal("Berhasil", "Berkas dengan NIK : <?=$id;?> berhasil ditambahkan", "success");
        setTimeout(function(){window.location.href = "../front_office_formulir/berkas.php";}, 1500);
    </script>
    <?php

    }
}

?>  
</body>
</html>
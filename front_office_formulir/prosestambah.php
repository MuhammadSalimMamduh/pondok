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

if (isset($_POST['beli'])) {
    $id = null;

    $nisn= trim(mysqli_real_escape_string($koneksi, $_POST['nisn']));
    $nama = trim(mysqli_real_escape_string($koneksi, $_POST['nama']));
    $nomer = trim(mysqli_real_escape_string($koneksi, $_POST['nomer']));
 
    $file = $_FILES['bayar']['name'];
    $ekstensi = explode(".", $file);
    $file_name = "bukti".$file;
    $temp_file = $_FILES['bayar']['tmp_name'];
    $targetdir = "../img/bukti/";
    $file_upload = $targetdir.$file_name;

    $aksi_upload = move_uploaded_file($temp_file, $file_upload);

    $querycek = mysqli_query($koneksi, "SELECT id FROM tbl_pembayaran WHERE nisn='$nisn'" ) or die(mysqli_error($koneksi,));

    $rvpendaftaran = mysqli_num_rows($querycek);

    if($rvpendaftaran>0){
    ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>;
    <script>
        swal("Duplikat Data", "Data dengan NISN : <?=$nisn;?> ", "error");
        setTimeout(function(){window.location.href = "../front_office_formulir";}, 1500);
    </script>'
    <?php
    }
    else {

    $tambahsantri = mysqli_query($koneksi, "INSERT INTO tbl_pembayaran (id, kode_formulir, nisn, nama_casis, no_wa, bukti,status) VALUES (null, null, '$nisn', '$nama', '$nomer','$file_name','0')") or die(mysqli_error($koneksi));


    ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
    <script>
        swal("Berhasil", "Data Santri dengan NISN : <?=$nisn;?> berhasil ditambahkan", "success");
        setTimeout(function(){window.location.href = "../front_office_formulir";}, 1500);
    </script>
    <?php

    }
}

?>  
</body>
</html>
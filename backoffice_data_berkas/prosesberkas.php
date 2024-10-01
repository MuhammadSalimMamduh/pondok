<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Proses Master Data Mahasiswa</title>
</head>
<body>

<?php
require_once '../database/config.php';
session_start();

$nik = @$_GET['nik'];

if (isset($_POST['daftar'])) {
    $id = '';
    $nama_lengkap = "";
    


    $nik = trim(mysqli_real_escape_string($koneksi, $_POST['nik']));

    $file = $_FILES['foto']['name'];
    $ekstensi = explode(".",$file);
    $file_name ="foto-santri".$file;
    $temp_file = $_FILES['foto']['tmp_name'];
    $target_dir ="../img/foto_santri/";
    $file_upload = $target_dir.$file_name;
    $aksi_upload = move_uploaded_file($temp_file, $file_upload);

    $file1 = $_FILES['kk']['name'];
    $ekstensi1 = explode(".",$file1);
    $file_name1 ="kartu_keluarga".$file1;
    $temp_file1 = $_FILES['kk']['tmp_name'];
    $target_dir1 ="../img/foto_santri/";
    $file_upload1 = $target_dir1.$file_name1;
    $aksi_upload1 = move_uploaded_file($temp_file1, $file_upload1);

    $file2 = $_FILES['akte']['name'];
    $ekstensi2 = explode(".",$file2);
    $file_name2 ="akte".$file2;
    $temp_file2 = $_FILES['akte']['tmp_name'];
    $target_dir2 ="../img/foto_santri/";
    $file_upload2 = $target_dir2.$file_name2;
    $aksi_upload2 = move_uploaded_file($temp_file2, $file_upload2);

    $file3 = $_FILES['ijazah']['name'];
    $ekstensi3 = explode(".",$file3);
    $file_name3 ="ijazah".$file3;
    $temp_file3 = $_FILES['ijazah']['tmp_name'];
    $target_dir3 ="../img/foto_santri/";
    $file_upload3 = $target_dir3.$file_name3;
    $aksi_upload3 = move_uploaded_file($temp_file3, $file_upload3);

    $file4 = $_FILES['bukti']['name'];
    $ekstensi4 = explode(".",$file4);
    $file_name4 ="bukti".$file4;
    $temp_file4 = $_FILES['bukti']['tmp_name'];
    $target_dir4 ="../img/bukti_du/";
    $file_upload4 = $target_dir4.$file_name4;
    $aksi_upload4 = move_uploaded_file($temp_file4, $file_upload4);
  
 
    
 
   

    $querycek = mysqli_query($koneksi, "SELECT id_berkas FROM tbl_berkas WHERE nik='$nik'" ) or die(mysqli_error($koneksi,));

    $rvpendaftaran = mysqli_num_rows($querycek);

    if($rvpendaftaran>0){
    ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>;
    <script>
        swal("Duplikat Data", "Data dengan NIK : <?=$nik;?> Sudah Terisi ", "error");
        setTimeout(function(){window.location.href = "formtambah.php";}, 1500);
    </script>'
    <?php
    }
    else {

    $tambahsantri = mysqli_query($koneksi, "INSERT INTO tbl_berkas VALUES('$id', '$file_upload', '$file_upload2', '$file_upload1','$file_upload3','$nik','$nama_lengkap', '$file_upload4')") or die(mysqli_error($koneksi));


    ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
    <script>
        swal("Berhasil", "Berkas Santri dengan NIK : <?=$nik;?> berhasil ditambahkan", "success");
        setTimeout(function(){window.location.href = "../backoffice_data_berkas";}, 1500);
    </script>
    <?php

    }
}

?>  
</body>
</html>
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

if(isset($_POST['cek'])){
    $nik = trim(mysqli_real_escape_string($koneksi, $_POST['nik']));

    $qrcek = mysqli_query($koneksi, "SELECT * FROM tbl_pendaftaran WHERE nik='$nik'") or die (mysqli_error($koneksi));
    if(mysqli_num_rows($qrcek)>0){

        ?>
        <script>        window.location.href = "berkas.php?nik=<?=$nik;?>";
        </script>
        <?php
    
    }else{
        ?>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>;
        <script>
            swal("NIK tidak terdaftar", "Anda Harus Mengisi Formulir Pendaftaran Terlebih Dahulu", "error");
            setTimeout(function(){window.location.href = "../front_office_formulir";}, 1500);
        </script>'
        <?php
    }


}

?>  
</body>
</html>
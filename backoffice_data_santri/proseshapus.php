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
    $nim = @$_GET['nik'];

    $queryhapusmhs = mysqli_query($koneksi, "DELETE FROM tbl_santri WHERE nik='$nim'") or die(mysqli_error($koneksi));
    $queryhapusmhs = mysqli_query($koneksi, "DELETE FROM tbl_berkas WHERE nik='$nim'") or die(mysqli_error($koneksi));
    
    
    ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
    <script>
        swal("Berhasil", "Data Santri dengan NIK  : <?=$nik;?> berhasil dihapus", "success");
        setTimeout(function(){window.location.href = "../backoffice_data_santri";}, 1500);
    </script>
    <?php

?>
</body>
</html>
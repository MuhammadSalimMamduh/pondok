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
    $nik = @$_GET['berkas'];

    $queryhapusmhs = mysqli_query($koneksi, "DELETE FROM tbl_berkas WHERE nik='$nik'") or die(mysqli_error($koneksi));
    
    
    ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
    <script>
        swal("Berhasil", "Data Santri dengan kode_formulir  : <?=$nik;?> berhasil dihapus", "success");
        setTimeout(function(){window.location.href = "../backoffice_data_berkas";}, 1500);
    </script>
    <?php

?>
</body>
</html>
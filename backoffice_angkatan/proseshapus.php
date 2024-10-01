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
    $angkatan = @$_GET['angkatan'];

    $queryhapusmhs = mysqli_query($koneksi, "DELETE FROM tbl_angkatan WHERE id='$angkatan'") or die(mysqli_error($koneksi));
    
    
    ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
    <script>
        swal("Berhasil", "Data Santri dengan kode_formulir  : <?=$id;?> berhasil dihapus", "success");
        setTimeout(function(){window.location.href = "../backoffice_data_angkatan";}, 1500);
    </script>
    <?php

?>
</body>
</html>
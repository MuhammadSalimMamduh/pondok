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
    if (isset($koneksi, $_POST['aktivasi'])) {


        $id = 1;
        $tgl_buka = trim(mysqli_real_escape_string($koneksi, $_POST['tb']));
        $tgl_tutup = trim(mysqli_real_escape_string($koneksi, $_POST['tp']));
       
       
        $queryupdate = mysqli_query($koneksi, "UPDATE tbl_aktivasi SET tgl_buka='$tgl_buka', tgl_tutup='$tgl_tutup' WHERE id='$id'") or die(mysqli_error($koneksi));


    ?>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>
            swal("Berhasil", "Tanggal Pendaftaran Telah diUpdate", "success");
            setTimeout(function() {
                window.location.href = "../backoffice_aktivasi";
            }, 2000);
        </script>
    <?php
    }
    ?>
    
</body>
</html>
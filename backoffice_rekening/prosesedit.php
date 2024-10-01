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
    if (isset($koneksi, $_POST['edit'])) {

        
        $id = trim(mysqli_real_escape_string($koneksi, $_POST['ed_idterpilih']));
        $tujuan = trim(mysqli_real_escape_string($koneksi, $_POST['ed_namaterpilih']));
        $rekening = trim(mysqli_real_escape_string($koneksi, $_POST['ed_rekeningterpilih']));
        $nama = trim(mysqli_real_escape_string($koneksi, $_POST['ed_bankterpilih']));
       
        $queryupdate = mysqli_query($koneksi, "UPDATE tbl_rekening SET nama='$nama', rekening='$rekening', tujuan='$tujuan' WHERE id='$id'") or die(mysqli_error($koneksi));


    ?>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>
            swal("Berhasil", "Data Rekening berhasil di edit", "success");
            setTimeout(function() {
                window.location.href = "../backoffice_rekening";
            }, 2000);
        </script>
    <?php
    }
    ?>
    
</body>
</html>
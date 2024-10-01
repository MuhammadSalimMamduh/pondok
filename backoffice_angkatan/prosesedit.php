<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proses Edit Mahasiswa</title>
</head>
<body>
    <?php
    require_once '../database/config.php';
    session_start();
    if (isset($koneksi, $_POST['edit'])) {


        $id = trim(mysqli_real_escape_string($koneksi, $_POST['ed_idterpilih']));
        $angkatan = trim(mysqli_real_escape_string($koneksi, $_POST['ed_namaterpilih']));
       
       
        $queryupdate = mysqli_query($koneksi, "UPDATE tbl_angkatan SET angkatan='$angkatan' WHERE id='$id'") or die(mysqli_error($koneksi));


    ?>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>
            swal("Berhasil", "Data Angkatan berhasil di edit", "success");
            setTimeout(function() {
                window.location.href = "../backoffice_angkatan";
            }, 2000);
        </script>
    <?php
    }
    ?>
    
</body>
</html>
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
    $kode = trim(mysqli_real_escape_string($koneksi, $_POST['kode']));

    $qrcek = mysqli_query($koneksi, "SELECT * FROM tbl_pembayaran WHERE kode_formulir='$kode' AND status='0'") or die (mysqli_error($koneksi));
    if(mysqli_num_rows($qrcek)>0){

        ?>
        <script>        window.location.href = "formulir.php?kode=<?=$kode;?>";
        </script>
        <?php
    
    }else{
        ?>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>;
        <script>
            swal("Kode Tidak valid", "Anda Harus Beli Dulu", "error");
            setTimeout(function(){window.location.href = "beli-formulir.php";}, 1500);
        </script>'
        <?php
    }


}

?>  
</body>
</html>
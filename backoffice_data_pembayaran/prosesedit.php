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
        $kode = trim(mysqli_real_escape_string($koneksi, $_POST['ed_kodeterpilih']));
        $nisn = trim(mysqli_real_escape_string($koneksi, $_POST['ed_nisnterpilih']));
        $nama_casis = trim(mysqli_real_escape_string($koneksi, $_POST['ed_namaterpilih']));
 
        $qr = mysqli_query($koneksi,"SELECT * FROM tbl_pembayaran WHERE kode_formulir='$kode'") or die (mysqli_error($koneksi));
       
      
        $tmpung = mysqli_num_rows($qr);
        if($tmpung>0){
            ?>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>
            swal("Duplikat", "Data Kode Formulir Sudah Ada", "error");
            setTimeout(function() {
                window.location.href = "../backoffice_data_pembayaran";
            }, 2000);
        </script>
    <?php

        }else{
            $queryupdate = mysqli_query($koneksi, "UPDATE tbl_pembayaran SET kode_formulir='$kode', nisn='$nisn', nama_casis='$nama_casis' WHERE id='$id'") or die(mysqli_error($koneksi));

        

    ?>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>
            swal("Berhasil", "Data Kode Formulir berhasil di edit", "success");
            setTimeout(function() {
                window.location.href = "../backoffice_data_pembayaran";
            }, 2000);
        </script>
    <?php
        }
    }
    ?>
    
</body>
</html>
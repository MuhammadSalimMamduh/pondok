<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    session_start();
    require_once '../database/config.php';
    if(isset($_POST['tambah'])){
       $kode_angkatan = trim(mysqli_real_escape_string($koneksi, $_POST['kodeangkatan']));
       $keterangan = trim(mysqli_real_escape_string($koneksi, $_POST['keterangan']));

       $querycek = mysqli_query($koneksi, "SELECT * FROM tbl_angkatan WHERE id='$kode_angkatan' OR angkatan='$keterangan'") or die (mysqli_error($koneksi));
       
       $returnvalue = mysqli_num_rows($querycek);
       
       if($returnvalue==0){
        mysqli_query($koneksi, "INSERT INTO tbl_angkatan VALUES ('$kode_angkatan','$keterangan')") or die (mysqli_error($koneksi));
        echo '<script>alert("Tambah data angkatan telah berhasil")</script>';
        echo '<script>window.location="../backoffice_angkatan"</script>';
       }else{
            echo '<script>alert("kode angkatan sudah ada")</script>';
            echo '<script>window.location="../admin_master_angkatan/tambahangkatan.php"</script>';
       }
    }
    else{
        $kd_angkatan = @$_GET['kd_angkatan'];
        if($kd_angkatan!=null){
            $qrdelangkatan = mysqli_query($koneksi, "DELETE FROM tbl_angkatan WHERE kode_angkatan='$kd_angkatan'") or die (mysqli_error($koneksi));
            echo '<script>alert("data angkatan dengan kode angkatan ['.$kd_angkatan.'] berhasil dihapus")</script>';
            echo '<script>window.location="../backoffice_angkatan"</script>';
        }
      
    }
    ?>
</body>
</html>
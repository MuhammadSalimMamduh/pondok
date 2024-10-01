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

if(isset($_POST['terima'])){
    $nik = trim(mysqli_real_escape_string($koneksi, $_POST['nik']));
    $qrambil = mysqli_query($koneksi, "SELECT * FROM tbl_pendaftaran WHERE nik='$nik'") or die (mysqli_error($koneksi));
    $arrambil = mysqli_fetch_assoc($qrambil);
    
    $nama_lengkap = $arrambil['nama_lengkap'];
    $tmp_lahir = $arrambil['tempat_lahir'];
    $tgl_lahir = $arrambil['tgl_lahir'];
    $alamat = $arrambil['alamat'];
    $asal_sekolah = $arrambil['asal_sekolah'];
    $ayah = $arrambil['ayah'];
    $ibu = $arrambil['ibu'];
    $nama_wali = $arrambil['wali'];
    $kontak = $arrambil['no_orangtua'];
    $tgl_daftar = $arrambil['tgl_daftar'];
    $penyakit = $arrambil['riwayat_penyakit'];
    $kelamin = $arrambil['kelamin'];
    $jurusan = $arrambil['jurusan'];
    
    $qrambilnis = mysqli_query($koneksi, "SELECT max(nis) AS nis FROM tbl_santri") or die (mysqli_error($koneksi));
    $kode   = "NIS-0000";
    $nis_baru   = $kode.'1';
    if (mysqli_num_rows($qrambilnis) > 0) {
        $dt_nis = mysqli_fetch_assoc($qrambilnis);
        $nis    = $dt_nis['nis'];
        
        $nis_edit = explode('-', $nis);
        $nis = intval($nis_edit[1]) + 1;
        $nis_baru = $kode.$nis;
       
    }

   

    $querycek = mysqli_query($koneksi, "SELECT nis FROM tbl_santri WHERE nis='$nis_baru' OR nik='$nik'" ) or die(mysqli_error($koneksi,));

    $rvpendaftaran = mysqli_num_rows($querycek);

    if($rvpendaftaran>0){
    ?>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
    <script>
        swal("Duplikat Data", "Data dengan NIS : <?=$nis_baru;?> ATAU nik : <?=$nik;?> ", "error");
        setTimeout(function(){window.location.href = "../backoffice_data_berkas";}, 1500);
    </script>
    <?php
    }
    else {

    $tambahsantri = mysqli_query($koneksi, "INSERT INTO tbl_santri VALUES ('$nis_baru', '$nik', '$nama_lengkap','$kelamin','$tmp_lahir', '$tgl_lahir', '$alamat','$ayah','$ibu','$nama_wali','$jurusan','$kontak','$asal_sekolah','$penyakit','$tgl_daftar')") or die(mysqli_error($koneksi,));


    ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
    <script>
        swal("Berhasil", "Data Santri dengan NIS : <?=$nis_baru;?> berhasil ditambahkan", "success");
        setTimeout(function(){window.location.href = "../backoffice_data_santri";}, 1500);
    </script>
    <?php

    }
}


?>  
</body>
</html>
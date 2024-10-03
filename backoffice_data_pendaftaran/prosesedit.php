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


        $nik = trim(mysqli_real_escape_string($koneksi, $_POST['ed_nikuserterpilih']));
        $nama = trim(mysqli_real_escape_string($koneksi, $_POST['ed_namaterpilih']));
        $tempat = trim(mysqli_real_escape_string($koneksi, $_POST['ed_tmplahirterpilih']));
        $tanggal = trim(mysqli_real_escape_string($koneksi, $_POST['ed_tgllahirterpilih']));
        $alamat = trim(mysqli_real_escape_string($koneksi, $_POST['ed_alamatterpilih']));
        $sekolah = trim(mysqli_real_escape_string($koneksi, $_POST['ed_sekolahterpilih']));
        $ayah = trim(mysqli_real_escape_string($koneksi, $_POST['ed_ayahterpilih']));
        $ibu = trim(mysqli_real_escape_string($koneksi, $_POST['ed_ibuterpilih']));
        $wali = trim(mysqli_real_escape_string($koneksi, $_POST['ed_waliterpilih']));

        $kontak = trim(mysqli_real_escape_string($koneksi, $_POST['ed_kontakterpilih']));
        $penyakit = trim(mysqli_real_escape_string($koneksi, $_POST['ed_penyakitterpilih']));



       
        $queryupdate = mysqli_query($koneksi, "UPDATE tbl_pendaftaran SET nik='$nik', nama_lengkap='$nama', tempat_lahir='$tempat', tgl_lahir='$tanggal', alamat='$alamat', asal_sekolah='$sekolah', ayah='$ayah',ibu='$ibu',wali='$wali',no_orangtua='$kontak',riwayat_penyakit='$penyakit' WHERE nik='$nik'") or die(mysqli_error($koneksi));


    ?>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>
            swal("Berhasil", "Data Mahasiswa berhasil di edit", "success");
            setTimeout(function() {
                window.location.href = "../backoffice_data_pendaftaran";
            }, 2000);
        </script>
    <?php
    }
    ?>
    
</body>
</html>
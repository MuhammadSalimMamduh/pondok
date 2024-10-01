<?php
require_once '../database/config.php';
$ambilfoto = mysqli_query($koneksi,"SELECT foto FROM tbl_berkas") or die (mysqli_error($koneksi));
$arrambil = mysqli_fetch_assoc($ambilfoto);
$foto = $arrambil['foto'];
// Memastikan bahwa ada parameter 'file' dalam URL
if(isset($_GET['nik'])) {
    $file = $_GET['nik'];
    $filepath = '../img/foto_santri/'.$file; // Ganti 'path_ke_foto/' dengan direktori sebenarnya tempat foto disimpan

    // Memastikan file ada
    if(file_exists($filepath)) {
        // Set header untuk memulai proses download
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filepath));
        flush(); // Flush sistem output buffer
        readfile($filepath); // Membaca file ke output
        exit;
    } else {
        echo "File tidak ditemukan.";
    }
} else {
    echo "Parameter file tidak ada.";
}
?>

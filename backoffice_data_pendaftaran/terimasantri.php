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
$pglambiltglpendaf = mysqli_query($koneksi, "SELECT * FROM tbl_aktivasi")or die(mysqli_error($koneksi));
$pgldatapendaftaran = mysqli_query($koneksi, "SELECT * FROM tbl_pendaftaran") or die(mysqli_error($koneksi));
?>  
</body>
</html>
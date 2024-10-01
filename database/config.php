<?php
date_default_timezone_set('Asia/Jakarta');
$koneksi = mysqli_connect('localhost','root','','pondok');

if(!$koneksi){
    "koneksi ke database bermasalah - periksa service dbms anda";
}
?>
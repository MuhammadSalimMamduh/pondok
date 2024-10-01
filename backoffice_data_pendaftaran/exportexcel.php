<?php
$tglekspor = date('Y-m-d H:i:s');
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=\"Pendaftaran-$tglekspor.xls\"");
header("Pragma: no-cache");
header("Expires: 0");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ribath Al Musyarraf</title>
</head>
<body>
    <table border="1">
                    <thead>
                        <tr>
                        <th width="3%">No</th>
                        <th>NIS</th> 
                        <th>NIK</th> 
                        <th>Nama Lengkap</th>
                        <th>tempat lahir</th> 
                        <th>tanggal lahir</th> 
                        <th>Alamat</th>
                        <th>Asal Sekolah</th>
                        <th>Ayah</th>
                        <th>Ibu</th> 
                        <th>Wali</th>
                        <th>Kontak</th>
                        <th>Tgl Mendaftar</th>
                        <th>riwayat Penyakit</th>              
                        <th>Kelamin</th>
                        <th>Jurusan</th>     
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    require_once '../database/config.php';
                   $no=1;
                   $qrpendaftaran = mysqli_query($koneksi, "SELECT * FROM tbl_pendaftaran") or die (mysqli_error($koneksi));
                   if(mysqli_num_rows($qrpendaftaran)){
                    while($dt_pendaftaran = mysqli_fetch_array($qrpendaftaran)){
                      ?>
                      <tr>
                        <td><?=$no++?></td>
                        <td><?=$dt_pendaftaran['nis'];?></td>
                        <td><b><?=$dt_pendaftaran['nik'];?></b></td>
                        <td><?=$dt_pendaftaran['nama_lengkap'];?></td>
                        <td><?=$dt_pendaftaran['tempat_lahir'];?></td>
                        <td><?=$dt_pendaftaran['tgl_lahir'];?></td>
                        <td><?=$dt_pendaftaran['alamat'];?></td>
                        <td><?=$dt_pendaftaran['asal_sekolah'];?></td>
                        <td><?=$dt_pendaftaran['ayah'];?></td>
                        <td><?=$dt_pendaftaran['ibu'];?></td>
                        <td><?=$dt_pendaftaran['wali'];?></td>
                        <td><?=$dt_pendaftaran['no_orangtua'];?></td>  
                        <td><?=$dt_pendaftaran['tgl_daftar'];?></td>
                        <td><?=$dt_pendaftaran['riwayat_penyakit'];?></td>
                        <td><?=$dt_pendaftaran['kelamin'];?></td>
                        <td><?=$dt_pendaftaran['jurusan'];?></td>
                      </tr>
                      <?php
                    }
                   }
                   ?>
        </tbody>
    </table>
</body>
</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ribath AL Musyarraf</title>
</head>

<body>
    <?php
    require_once '../database/config.php';
    require '../lib/phpexcel-xls-library/vendor/phpoffice/phpexcel/Classes/PHPExcel.php';
    session_start();
    // error_reporting(1);

    // ambil triger tombol import dosen
    if(isset($koneksi, $_POST['importsantri'])){
        

        // buat vRIbel untuk menMPUNG value nama file dRI elemen file pada index (elemen pada modal import)
        $file = $_FILES['file']['name'];

        //buat variabel untuk memisahkan extensi file dengan nama filenya
        $ekstensi = explode(".", $file);

        //buat variabel untuk merename file dengan nama baru
        $file_name = "file".round(microtime(true)).".".end($ekstensi);

        // buat variabel untuk menampung file temporary dari file yang diupload
        $sumber = $_FILES['file']['tmp_name'];

        // deklarasikan variabel direktori untuk mengupload filenya
        $target_dir = "file-import/";

        // buat variabel untuk mengarahkan file ke target direktori
        $target_file = $target_dir.$file_name;

        // buat variabel yang berisikan perintah untuk mengupload file ke target direktori
        $upload = move_uploaded_file($sumber,$target_file);

        // identifikasi file exel yang akan digunakan sebagai referensi import
        $file_excel = PHPExcel_IOFactory::load($target_file);

        // buat variabel untuk mengidentifikasi sheet pada excel yang sedang aktif
        $data_excel = $file_excel->getActiveSheet()->toArray(null, true,true,true);

        for ($i=2; $i<= count($data_excel); $i++){

            // deklarasi perulangan
            $nis = $data_excel[$i]['B'];
            $nik = $data_excel[$i]['C'];
            $nama = addslashes($data_excel[$i]['D']);
            $tmp_lahir = addslashes($data_excel[$i]['E']);
            $tgl_lahir = addslashes($data_excel[$i]['F']);
            $alamat = addslashes($data_excel[$i]['G']);
            $asal_sekolah = addslashes($data_excel[$i]['H']);
            $ayah = addslashes($data_excel[$i]['I']);
            $ibu =  $data_excel[$i]['J'];;
            $kontak = $data_excel[$i]['L'];
            $riwayat_penyakit = $data_excel[$i]['M'];
            $tgl_daftar = addslashes($data_excel[$i]['N']);
            $kelamin = $data_excel[$i]['O'];
            $jurusan ="";
             $tgl_lahir = date('Y-m-d',$tgl_lahir);
           $tgl_daftar = date('Y-m-d',$tgl_daftar);
           

            $ceksantri = mysqli_query($koneksi, "SELECT nis FROM tbl_santri WHERE nis='$nis'") or die (mysqli_error($koneksi));

            $rvs = mysqli_num_rows($ceksantri);

            if($rvs>0){
               
            }
            else
            {
               
                $tambahsantri = mysqli_query($koneksi, "INSERT INTO tbl_santri VALUES (null,'$nis','$nik','$nama','$kelamin','$tmp_lahir','$tgl_lahir','$alamat','$ayah','$ibu',null,'$jurusan','$kontak','$asal_sekolah','$riwayat_penyakit','$tgl_daftar')") or die (mysqli_error($koneksi));

            }
        }
     

        ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
     <script>
        swal("Berhasil", "Semua Data Santri berhasil diinput", "success");
        setTimeout(function(){window.location.href = "../backoffice_data_santri";}, 1500);
     </script>

    <?php
    
    }else {
        echo 'pp';
    }
    ?>
   
    </body>

</html>
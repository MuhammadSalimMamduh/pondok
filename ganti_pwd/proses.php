<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=ddevice-width,initial-scale=1">
        <title></title>
    </head>
    <body>
        <?php
        session_start();
        require_once '../database/config.php';

        //triger button gantipw
        if(isset($koneksi,$_POST['gantipw'])){

            // variabel untuk menampung elemen yang di post sesuai dengan atribut "name" nya
            $user = trim(mysqli_real_escape_string($koneksi,$_POST['username']));
            $pwlama = md5(trim(mysqli_real_escape_string($koneksi,$_POST['pass_lama'])));
            $pwbaru = md5(trim(mysqli_real_escape_string($koneksi,$_POST['pass_Baru'])));


            // cek dari tabel pengguna berdasarkan value elemen $user
            $querycekpw = mysqli_query($koneksi, "SELECT * FROM tbl_pengguna WHERE user='$user'") or die (mysqli_error($koneksi));
            
            // simpan array hasil query diatas pada variabel $arr
            $arr = mysqli_fetch_assoc($querycekpw);

            // jika value dari array pada kolom password tidak sama dengan $pwlama
            if($arr['pass']!=$pwlama){

                echo '<script>alert("Password lama tidak sesuai")</script>';
                echo '<script>window.location="../ganti_pwd"</script>';
            }
            else{
                $queryupdatepw = mysqli_query($koneksi, "UPDATE tbl_pengguna SET pass='$pwbaru' WHERE user ='$user'") or die (mysqli_error($koneksi));
                
                //jika password lama tidak sesuai dengan inputan
                echo '<script>alert("Password telah diubah, silahkan login menggunakan password baru anda")</script>';
                echo '<script>window.location="../login/logout.php"</script>';
            }
        }
        ?>
    </body>
</html>
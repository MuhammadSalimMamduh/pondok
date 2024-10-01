<?php
session_start();
require_once '../database/config.php';
 ?>
<!DOCTYPE html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <title>PONDOK RIBATH AL-MUSYAROF</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">
  <link rel="stylesheet" href="styles/app.min.css"/>
  <link rel="shortcut icon" href="assets/img/pondok.png">

</head>

<body class="page-loading">
  <!-- page loading spinner -->
  <div class="pageload">
    <div class="pageload-inner">
      <div class="sk-rotating-plane"></div>
    </div>
  </div>
  <!-- /page loading spinner -->
  <div class="app signin v2 usersession">
    <div class="session-wrapper">
      <div class="session-carousel slide" data-ride="carousel" data-interval="3000">
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
          <div class="item active" style="background-image:url(assets/img/1.png);background-size:cover;background-repeat: no-repeat;background-position: 50% 50%;">
          </div>
           <div class="item" style="background-image:url(assets/img/2.png);background-size:cover;background-repeat: no-repeat;background-position: 50% 50%;">
          </div>
          <div class="item" style="background-image:url(assets/img/3.png);background-size:cover;background-repeat: no-repeat;background-position: 50% 50%;">
          </div>
        </div>
      </div>
      <div class="card bg-white  blue no-border" style="background-color:#ffffff;">
        <div class="card-block">
          <form role="form" class="form-layout" action="" method="post">
            <div class="text-center m-b">    

              <img src="assets/img/pondok.png" style='width:300px; height:300px;'/> 
              <h4 class="text-uppercase"><b><font color="#000000">PONDOK</font></b></h4>
              <h4 class="text-uppercase"><font color="#000000">RIBATH AL-MUSYARRAF</font></h4>
            </div>
            <div class="form-inputs p-b">
              <label class="text-uppercase"><font color="#000000">Username</font></label>
              <input type="username" class="form-control input-lg" name="username" id="username" placeholder="input username" required>
              <label class="text-uppercase"><font color="#000000">Password</font></label>
              <input type="password" class="form-control input-lg" name="password" id="password"  placeholder="input password" required>
              <!-- <a href="lupapassword.php"><font color="#ffffff">Lupa Password?</font></a>
             --></div>
              
               <button class="btn btn-warning btn-block btn-lg" type="submit" name= "masuk" style="background-color:#D6B70A;"><font color="#ffffff"><img src="assets/img/personkey-white.png">&nbsp<b>Login</b></font></button>

          <br>
          <center><font color="#000000"><small><em> Copyright &copy; PT. Tanjung Mulia Informatika </a></em></</small></font>
          <br/>  
           <font color="#000000"><?php echo date("Y"); ?></</small></font>
            </center>
          </form>
          <?php
          if(isset($koneksi, $_POST['masuk'])){
            $isianusername = trim(mysqli_escape_string($koneksi, $_POST['username']));
            $isianpw = md5(trim(mysqli_escape_string($koneksi, $_POST['password'])));

            $cekdatabase = mysqli_query($koneksi,"SELECT * FROM tbl_pengguna WHERE user='$isianusername' AND pass='$isianpw'") or die (mysqli_error($koneksi));

            $returnvalue = mysqli_num_rows($cekdatabase);

            //echo $returnvalue;
            if($returnvalue>0){
            //jika ada penggunanya
            $tampungarray = mysqli_fetch_assoc($cekdatabase);
            $_SESSION['user'] = $isianusername;
            $_SESSION['nama'] = $tampungarray['nama'];
            echo '<script>window.location="../backend"</script>';
            }
            else{
              //jika tidak ada penggunnanya
              echo '<script>window.location="../gagal"</script>';
            }
          } 
          ?>
          
        </div>
      </div>
    </div>
  </div>
  
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header" style="background-color:#bb0a1e;">
          <h4 class="modal-title"><font color="#ffffff">GAGAL LOGIN</font></h4>
        </div>
        <div class="modal-body">
          <h5><p><b>mohon maaf tampaknya terjadi kesalahan....</b></p>
          <p>Username / email atau Password yang anda masukkan salah / tidak terdaftar pada sistem
           Silahkan dicoba kembali, atau hubungi administrator</p></h5>
           <p></p>
           <h5><p> Terimakasih.. </p></h5>

        
        </div>
        <div class="modal-footer" style="background-color:#fefdfd;">
          <button type="button" class="btn btn-danger" data-dismiss="modal" style="background-color:#bb0a1e;"><font color="#ffffff"><b> TUTUP </b></font></button>
        </div>
      </div>
    </div>
  </div>
  
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="scripts/app.min.js"></script>
  <script type="text/javascript">
    $(window).on('load',function(){
        $('#myModal').modal('show');
    });
</script>
</body>

</html>

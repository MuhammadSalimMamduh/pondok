<li class="nav-header">-- BACKOFFICE --</li>
<li class="nav-item">
            <a href="../back_office" class="nav-link <?php if (@$konstruktor=='dasbor') {echo 'active';}?>"> 
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
         
        
          <li class="nav-item">
            <a href="../backoffice_data_pembayaran" class="nav-link <?php if (@$konstruktor=='data_pembayaran') {echo 'active';}?>">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Pesanan Formulir
                <?php
                $kode_kosong = NULL;
                $pglformulir = mysqli_query($koneksi,"SELECT * FROM tbl_pembayaran WHERE kode_formulir IS NULL") or die (mysqli_error($koneksi));
                $jumlah_kosong = mysqli_num_rows($pglformulir);
                if ($jumlah_kosong==0){

                }
                else
                {
                ?>
                <span class="badge badge-success right"><?=$jumlah_kosong;?></span>
                <?php
                }
                ?>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../backoffice_data_pendaftaran" class="nav-link <?php if (@$konstruktor=='data_pendaftaran') {echo 'active';}?>">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Data Pendaftaran
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../backoffice_data_berkas" class="nav-link <?php if (@$konstruktor=='data_berkas') {echo 'active';}?>">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Data Berkas
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../backoffice_data_santri" class="nav-link <?php if (@$konstruktor=='santri') {echo 'active';}?>">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Data Santri
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../backoffice_angkatan" class="nav-link <?php if (@$konstruktor=='angkatan') {echo 'active';}?>">
              <i class="nav-icon fas fa-archway"></i>
              <p>
               Data Angkatan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../backoffice_kelas" class="nav-link <?php if (@$konstruktor=='kelas') {echo 'active';}?>">
              <i class="nav-icon fas fa-folder"></i>
              <p>
               Kelas / Presensi
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="../backoffice_aktivasi" class="nav-link <?php if (@$konstruktor=='aktivasi') {echo 'active';}?>">
              <i class="nav-icon fas fa-check"></i>
              <p>
                Aktivasi
                <?php
                $date = date('Y-m-d');
                $pgldate = mysqli_query($koneksi,"SELECT * FROM tbl_aktivasi") or die (mysqli_error($koneksi));
                $dt_date = mysqli_fetch_assoc($pgldate);
                $tgl_buka = $dt_date['tgl_buka'];
                $tgl_tutup = $dt_date['tgl_tutup'];

                if ($date >= $tgl_buka && $date <= $tgl_tutup){
                  ?>
                  <span class="badge badge-success right">Buka</span>
                  <?php
                }
                else
                {
                ?>
                <span class="badge badge-danger right">Tutup</span>
                <?php
                }
                ?>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../backoffice_rekening" class="nav-link <?php if (@$konstruktor=='rekening') {echo 'active';}?>">
              <i class="nav-icon fab fa-cc-mastercard"></i>
              <p>
                Rekening
              </p>
            </a>
          </li>
        
          <li class="nav-header">-- FRONTOFFICE --</li>

          <li class="nav-item">
            <a href="../front_office_home" class="nav-link <?php if (@$konstruktor=='home') {echo 'active';}?>">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../front_office_tentang" class="nav-link <?php if (@$konstruktor=='tentang') {echo 'active';}?>">
              <i class="nav-icon fas fa-info-circle"></i>
              <p>
                Tentang
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../front_office_profil" class="nav-link <?php if (@$konstruktor=='profil') {echo 'active';}?>">
              <i class="nav-icon fas fa-user-circle"></i>
              <p>
                Profil
              </p>
            </a>
          </li>

          <li class="nav-header">-- USER PROFIL --</li>

          <li class="nav-item">
            <a href="../ganti_pwd" class="nav-link <?php if (@$konstruktor=='password') {echo 'active';}?>">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Ganti password
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="../login/logout.php" class="nav-link ">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Log Out
              </p>
            </a>
          </li>
         
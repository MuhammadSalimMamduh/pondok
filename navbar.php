<ul class="navbar-nav">
  <li class="nav-item">
    <a class="nav-link" data-widget="pushmenu" href="#" role="button">
      <font color="ffffff"><i class="fas fa-bars"></i></font>
    </a>
  </li>
</ul>
<ul class="navbar-nav ml-auto">
  <!-- Navbar Search -->
  <!-- Notifications Dropdown Menu -->
  <li class="nav-item dropdown">

    <a class="nav-link" data-toggle="dropdown" href="#">
      <font color="ffffff">
        Assalamualaikum &nbsp<?= $_SESSION['nama']; ?>
        <i class="far fa-user"></i>
      </font>
    </a>
    </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
      <div class="dropdown-divider"></div>

      <div class="dropdown-divider"></div>
      <a href="#" class="dropdown-item">
        <i class="fas fa-lock mr-2"></i> Ganti Password
      </a>
      <div class="dropdown-divider"></div>
      <a href="../login/logout.php" class="dropdown-item">
        <i class="fas fa-sign-out-alt mr-2"></i> Keluar
      </a>

  </li>

</ul>
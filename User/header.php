<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="img/logo1.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>User</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no" name="viewport" />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <!-- CSS Files -->
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="./assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
  </head>

  <body class="">
    <div class="wrapper">
      <div class="sidebar" data-color="white" data-active-color="danger">
        <div class="logo">
          <a href="admin.html">
            <center><img src="img/logo1.png" alt="" /></center>
          </a>
        </div>
        <div class="sidebar-wrapper">
          <ul class="nav">
            <li class="">
              <a href="produkkantin.php">
                <i class="nc-icon nc-bank"></i>
                <p>Produk Kantin</p>
              </a>
            </li>
            <li>
              <a href="koperasi.php">
                <i class="nc-icon nc-diamond"></i>
                <p>Produk Koperasi</p>
              </a>
            </li>
            <li>
              <a href="pulsa.php">
                <i class="nc-icon nc-diamond"></i>
                <p>Pulsa</p>
              </a>
            </li>
            <li>
              <a href="tempatduduk.php">
                <i class="nc-icon nc-diamond"></i>
                <p>Tempat Duduk</p>
              </a>
            </li>
            <li>
              <a href="ruangan.php">
                <i class="nc-icon nc-diamond"></i>
                <p>Ruangan</p>
              </a>
            </li>
            <li>
              <a href="paket.php">
                <i class="nc-icon nc-diamond"></i>
                <p>Jasa Pengiriman</p>
              </a>
            </li>
            <li class="">
              <a href="listpemesanankantin.php">
                <i class="nc-icon nc-diamond"></i>
                <p>List Pemesanan Kantin</p>
              </a>
            </li>
            <li>
              <a href="listpemesanankoperasi.php">
                <i class="nc-icon nc-diamond"></i>
                <p>List Pemesanan Koperasi</p>
              </a>
            </li>
            <li>
            <li class="">
              <a href="listpemesanantempatduduk.php">
                <i class="nc-icon nc-diamond"></i>
                <p>List Pemesanan Tempat Duduk</p>
              </a>
            </li>
            <li>
              <a href="listpemesananruangan.php">
                <i class="nc-icon nc-diamond"></i>
                <p>List Pemesanan Ruangan</p>
              </a>
            </li>
            <li>
              <a href="listpemesananpulsa.php">
                <i class="nc-icon nc-diamond"></i>
                <p>List Pemesanan Pulsa</p>
              </a>
            </li>
            <li>
              <a href="../logout.php">
                <i class="nc-icon nc-pin-3"></i>
                <p>Logout(<?php echo $nama_lengkap;?>)</p>
              </a>
            </li>
          </ul>
        </div>
      </div>
      <div class="main-panel" style="height: 100vh">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
          <div class="container-fluid">
            <div class="navbar-wrapper">
              <div class="navbar-toggle">
                <button type="button" class="navbar-toggler">
                  <span class="navbar-toggler-bar bar1"></span>
                  <span class="navbar-toggler-bar bar2"></span>
                  <span class="navbar-toggler-bar bar3"></span>
                </button>
              </div>
              
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-bar navbar-kebab"></span>
              <span class="navbar-toggler-bar navbar-kebab"></span>
              <span class="navbar-toggler-bar navbar-kebab"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navigation">
              <form>
                <div class="input-group no-border">
                  <input type="text" value="" class="form-control" placeholder="Search..." />
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <i class="nc-icon nc-zoom-split"></i>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </nav>
        <!-- End Navbar -->
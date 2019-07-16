<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>PT MPF</title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url() ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="<?php echo base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url() ?>assets/css/sb-admin.css" rel="stylesheet">



</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="index.html">PT. Mega Pratama Ferindo</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i><span><?php echo $this->session->userdata('nama') ?></span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="<?php echo base_url() ?>login/password">Ganti Password</a>
          <!-- <a class="dropdown-item" href="#">Activity Log</a> -->
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?php echo base_url() ?>login/logout" onClick="return confirm('yakin logout?')">Logout</a>
        </div>
      </li>
    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->

    <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url() ?>dashboard">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <?php if($this->session->userdata('level')=='Super Admin'){ ?>
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-database"></i>
          <span>Master Data</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Master Data:</h6>
          <a class="dropdown-item" href="<?php echo base_url() ?>user"><i class="fas fa-users"></i>User</a>
          <a class="dropdown-item" href="<?php echo base_url() ?>suplier"><i class="fas fa-users"></i>Suplier</a>
          <a class="dropdown-item" href="<?php echo base_url() ?>pelanggan"><i class="fas fa-users"></i>Pelanggan</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-cash-register"></i>
          <span>Transaksi</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Wirerod:</h6>
          <a class="dropdown-item" href="<?php echo base_url() ?>wirerod">Incoming</a>
          <a class="dropdown-item" href="<?php echo base_url() ?>wirerod/produksi">Produksi</a>
          <a class="dropdown-item" href="<?php echo base_url() ?>wirerod/warehouse">Warehouse</a>
          <div class="dropdown-divider"></div>
          <h6 class="dropdown-header">Transaksi:</h6>
          <a class="dropdown-item" href="<?php echo base_url() ?>PO">PO</a>
          <a class="dropdown-item" href="<?php echo base_url() ?>spk">SPK</a>
          <!-- <a class="dropdown-item" href="<?php echo base_url() ?>produksi">Produksi</a> -->
          <a class="dropdown-item" href="<?php echo base_url() ?>scan">Transfer</a>
          <a class="dropdown-item" href="<?php echo base_url() ?>spb">SPB</a>
          <!-- <a class="dropdown-item" href="<?php echo base_url() ?>spb/input_warehouse">Warehouse</a>
        </div> -->
      </li>
      <?php } 
      if($this->session->userdata('departemen')=='marketing'){ ?>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-cash-register"></i>
          <span>Transaksi</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <!-- <h6 class="dropdown-header">Wirerod:</h6>
          <a class="dropdown-item" href="<?php echo base_url() ?>wirerod">Incoming</a>
          <a class="dropdown-item" href="<?php echo base_url() ?>wirerod/produksi">Produksi</a>
          <a class="dropdown-item" href="<?php echo base_url() ?>wirerod/warehouse">Warehouse</a>
          <div class="dropdown-divider"></div> -->
          <h6 class="dropdown-header">Transaksi:</h6>
          <a class="dropdown-item" href="<?php echo base_url() ?>PO">PO</a>
          <!-- <a class="dropdown-item" href="<?php echo base_url() ?>spk">SPK</a> -->
          <!-- <a class="dropdown-item" href="<?php echo base_url() ?>produksi">Produksi</a> -->
          <!-- <a class="dropdown-item" href="<?php echo base_url() ?>scan">Transfer</a> -->
          <a class="dropdown-item" href="<?php echo base_url() ?>spb">SPB</a>
          <!-- <a class="dropdown-item" href="<?php echo base_url() ?>spb/input_warehouse">Warehouse</a> -->
        </div>
      </li>
      
      <?php }elseif($this->session->userdata('departemen')=='PPIC'){ ?>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-cash-register"></i>
          <span>Transaksi</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Wirerod:</h6>
          <a class="dropdown-item" href="<?php echo base_url() ?>wirerod">Incoming</a>
          <!-- <a class="dropdown-item" href="<?php echo base_url() ?>wirerod/produksi">Produksi</a> -->
          <!-- <a class="dropdown-item" href="<?php echo base_url() ?>wirerod/warehouse">Warehouse</a> -->
          <div class="dropdown-divider"></div>
          <h6 class="dropdown-header">Transaksi:</h6>
          <a class="dropdown-item" href="<?php echo base_url() ?>PO">PO</a>
          <a class="dropdown-item" href="<?php echo base_url() ?>spk">SPK</a>
          <!-- <a class="dropdown-item" href="<?php echo base_url() ?>produksi">Produksi</a> -->
          <!-- <a class="dropdown-item" href="<?php echo base_url() ?>scan">Transfer</a> -->
          <!-- <a class="dropdown-item" href="<?php echo base_url() ?>spb">SPB</a> -->
          <!-- <a class="dropdown-item" href="<?php echo base_url() ?>spb/input_warehouse">Warehouse</a> -->
        </div>
      </li>

<?php }elseif($this->session->userdata('departemen')=='Produksi'){ ?>

<li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  <i class="fas fa-cash-register"></i>
    <span>Transaksi</span>
  </a>
  <div class="dropdown-menu" aria-labelledby="pagesDropdown">
    <h6 class="dropdown-header">Wirerod:</h6>
    <a class="dropdown-item" href="<?php echo base_url() ?>wirerod">Incoming</a>
    <a class="dropdown-item" href="<?php echo base_url() ?>wirerod/produksi">Produksi</a>
    <!-- <a class="dropdown-item" href="<?php echo base_url() ?>wirerod/warehouse">Warehouse</a> -->
    <div class="dropdown-divider"></div>
    <h6 class="dropdown-header">Transaksi:</h6>
    <!-- <a class="dropdown-item" href="<?php echo base_url() ?>PO">PO</a> -->
    <a class="dropdown-item" href="<?php echo base_url() ?>spk">SPK</a>
    <!-- <a class="dropdown-item" href="<?php echo base_url() ?>produksi">Produksi</a> -->
    <!-- <a class="dropdown-item" href="<?php echo base_url() ?>scan">Transfer</a> -->
    <!-- <a class="dropdown-item" href="<?php echo base_url() ?>spb">SPB</a> -->
    <!-- <a class="dropdown-item" href="<?php echo base_url() ?>spb/input_warehouse">Warehouse</a> -->
  </div>
</li>

<?php }elseif($this->session->userdata('departemen')=='FGWH'){ ?>

<li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  <i class="fas fa-cash-register"></i>
    <span>Transaksi</span>
  </a>
  <div class="dropdown-menu" aria-labelledby="pagesDropdown">
    <h6 class="dropdown-header">Wirerod:</h6>
    <a class="dropdown-item" href="<?php echo base_url() ?>wirerod">Incoming</a>
    <a class="dropdown-item" href="<?php echo base_url() ?>wirerod/produksi">Produksi</a>
    <!-- <a class="dropdown-item" href="<?php echo base_url() ?>wirerod/warehouse">Warehouse</a> -->
    <div class="dropdown-divider"></div>
    <h6 class="dropdown-header">Transaksi:</h6>
    <!-- <a class="dropdown-item" href="<?php echo base_url() ?>PO">PO</a> -->
    <!-- <a class="dropdown-item" href="<?php echo base_url() ?>spk">SPK</a> -->
    <!-- <a class="dropdown-item" href="<?php echo base_url() ?>produksi">Produksi</a> -->
    <a class="dropdown-item" href="<?php echo base_url() ?>scan">Transfer</a>
    <a class="dropdown-item" href="<?php echo base_url() ?>spb">SPB</a>
    <!-- <a class="dropdown-item" href="<?php echo base_url() ?>spb/input_warehouse">Warehouse</a> -->
  </div>
</li>

<?php } ?>
 
       
     
    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">


        <!-- Icon Cards-->
      

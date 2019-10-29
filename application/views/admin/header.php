<!DOCTYPE html>
<html>
<head>
    <title><?= $title?></title>
    <!-- Custom fonts for this template-->
    <link href="<?= base_url() ?>assets/font-awesome/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Page level plugin CSS-->
    <link href="<?= base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="<?= base_url() ?>assets/css/sb-admin.css" rel="stylesheet">
</head>
<body id="page-top">
    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
        <a class="navbar-brand mr-1" href="<?= base_url("admin/dashboard")?>">TA-45</a>
        <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
            <i class="fas fa-bars"></i>
        </button>
        <!-- Navbar -->
        <ul class="navbar-nav ml-auto mr-md-0">
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user-circle fa-fw"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="<?= base_url("admin/settings")?>">Settings</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" data-toggle="modal" data-target="#logoutModal">Logout</a>
                </div>
            </li>
        </ul>
    </nav>

    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="sidebar navbar-nav">
            <li class="nav-item <?php if($title == "Dashboard") echo "active"?>">
                <a class="nav-link" href="<?= base_url() ?>admin/dashboard">
                    <!-- <i class="fas fa-fw fa-tachometer-alt"></i> -->
                    <i class="fa fa-home" aria-hidden="true"></i>
                    <span>Dashboard</span>
                    <!-- biar bisa lihat secara overview/ -->
                </a>
            </li>
<?php
if($this->session->userdata("level") == "admin"){?>
            <li class="nav-item <?php if($title == "Kategori") echo "active"?>">
                <a class="nav-link" href="<?= base_url("admin/kategori") ?>">
                    <i class="fa fa-tag" aria-hidden="true"></i>
                    <span>Kategori</span></a>
            </li>
            <li class="nav-item <?php if($title == "Sub Kategori") echo "active"?>">
                <a class="nav-link" href="<?= base_url("admin/sub_kategori")?>">
                    <i class="fa fa-tags" aria-hidden="true"></i>
                    <span>Sub Kategori</span></a>
            </li>
<?php }?>
            <li class="nav-item <?php if($title == "Produk") echo "active"?>">
                <a class="nav-link" href="<?= base_url() ?>admin/produk">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    <span>Produk</span></a>
            </li>
<?php
if($this->session->userdata("level") == "manajer"){?>
            <li class="nav-item <?php if($title == "Rekap Produk") echo "active"?>">
                <a class="nav-link" href="<?= base_url() ?>admin/rekap_produk">
                    <i class="fa fa-table" aria-hidden="true"></i>
                    <span>Rekap Produk</span></a>
            </li>
<?php }?>
            <li class="nav-item <?php if($title == "Pegawai") echo "active"?>">
                <a class="nav-link" href="<?= base_url("admin/pegawai") ?>">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <span>Pegawai</span></a>
            </li>
        </ul>
        <div id="content-wrapper">
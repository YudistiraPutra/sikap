<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>  <?= $title ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- <link rel="apple-touch-icon" href="apple-touch-icon.png"> -->
        <!-- Place favicon.ico in the root directory -->
        <!-- <link rel="stylesheet" href="css/vendor.css"> -->
        <link rel="icon" href="<?php echo base_url()?>assets/assetshome/img/core-img/icon.png">
        <link rel="stylesheet" href="<?php echo base_url()?>assets/css/vendor.css">
        <link rel="stylesheet" href="<?php echo base_url()?>assets/css/app.css">
       <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/b-1.5.6/b-colvis-1.5.6/fc-3.2.5/fh-3.1.4/r-2.2.2/datatables.min.css"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/b-1.5.6/b-colvis-1.5.6/fc-3.2.5/fh-3.1.4/r-2.2.2/datatables.min.css"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
        <!-- Theme initialization -->
        <script>
            var themeSettings = (localStorage.getItem('themeSettings')) ? JSON.parse(localStorage.getItem('themeSettings')) :
            {};
            var themeName = themeSettings.themeName || '';
            if (themeName)
            {
                document.write('<link rel="stylesheet" id="theme-style" href="<?php echo base_url()?>assets/css/app-' + themeName + '.css">');
            }
            else
            {
                document.write('<link rel="stylesheet" id="theme-style" href="<?php echo base_url()?>assets/css/app.css">');
            }
        </script>
    </head>
    <body>

        <!--Untuk sweet alert-->
        <div class="flash-data" data-flashdata="<?=$this->session->flashdata('flash'); ?>"></div>
        <?php if ($this->session->flashdata('flash')) : ?>


        <?php endif;?>
        <!-- end of sweetalert -->

        <div class="main-wrapper">
            <div class="app" id="app">
            <header class="header">
                    <div class="header-block header-block-collapse d-lg-none d-xl-none">
                        <button class="collapse-btn" id="sidebar-collapse-btn">
                            <i class="fa fa-bars"></i>
                        </button>
                    </div>
                    
                    <div class="header-block header-block-nav">
                        <ul class="nav-profile">
                            <li class="profile dropdown">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                    <span class="name">Selamat Datang, <?=$this->session->userdata('username');?></span>
                                </a>
                                <div class="dropdown-menu profile-dropdown-menu" aria-labelledby="dropdownMenu1">
                                    <a class="dropdown-item" href="<?php echo base_url()?>Diskehan/Logout">
                                        <i class="fa fa-power-off icon"></i> Logout </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </header>
                <aside class="sidebar">
                    <div class="sidebar-container">
                        <div class="sidebar-header">
                            <div class="brand">
                                <!-- <div class="logo"> -->
                                    <img src="<?php echo base_url()?>assets/assetshome/img/core-img/logo5.png">
                                </div>
                        </div>
                        <nav class="menu">
                            <ul class="sidebar-menu metismenu" id="sidebar-menu">
                                <li class="<?= $menu == 'dashboard' ? 'active' : '' ?>">
                                    <a href="<?php echo site_url()?>Diskehan/index">
                                        <i class="fa fa-home"></i> Dashboard </a>
                                </li>
                                <li class="<?= $menu == 'Data Penduduk' ? 'active' : '' ?>">
                                    <a href="#">
                                        <i class="fa fa-book"></i> Data Penduduk
                                        <i class="fa arrow"></i> 
                                    </a>
                                        
                                    <ul class="sidebar-nav">
                                        <li class="<?= $title == 'Data kecamatan' ? 'active' : '' ?>">
                                            <a href="<?php echo site_url()?>Diskehan/kecamatan"> Data Kecamatan </a>
                                        </li>
                                        <li class="<?= $title == 'Data jumlah penduduk' ? 'active' : '' ?>">
                                            <a href="<?php echo site_url()?>Diskehan/penduduk"> Data Jumlah Penduduk </a>
                                        </li>
                                    </ul>
                                </li>
                                <li  class="<?= $menu == 'Data Pertanian' ? 'active' : '' ?>" >
                                    <a href="#">
                                        <i class="fa fa-book"></i> Data Pertanian
                                        <i class="fa arrow"></i> 
                                    </a>
                                        
                                    <ul class="sidebar-nav">
                                        <li class="<?= $title == 'komoditas pertanian' ? 'active' : '' ?>">
                                            <a href="<?php echo site_url()?>Diskehan/komoditas_pertanian"> Komoditas Pertanian </a>
                                        </li>
                                        <li class="<?= $title == 'konsumsi pertanian' ? 'active' : '' ?>">
                                            <a href="<?php echo site_url()?>Diskehan/konsumsi_pertanian"> Data Konsumsi Pertanian </a>
                                        </li>
                                        <li class="<?= $title == 'Data komoditas Pertanian' ? 'active' : '' ?>">
                                            <a href="<?php echo site_url()?>Diskehan/data_komoditas_pertanian"> Data Komoditas Pertanian </a> 
                                        </li>
                                        <li>
                                            <a href="<?php echo site_url()?>Diskehan/rekap_pertanian"> Rekap Kebutuhan Pangan Pertanian </a> 
                                        </li>
                                        <li>
                                            <a href="<?php echo site_url()?>Diskehan/grafik_pertanian"> Grafik Surplus Pertanian </a> 
                                        </li>
                                    </ul>
                                </li>
                                <li >
                                    <a href="kebutuhan-pangan.php">
                                        <i class="fa fa-book"></i> Data Peternakan
                                        <i class="fa arrow"></i> 
                                    </a>
                                        
                                    <ul class="sidebar-nav">
                                        <li>
                                            <a href="<?php echo site_url()?>Admin/komoditas_peternakan"> Komoditas Peternakan </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo site_url()?>Admin/konsumsi_peternakan"> Data Konsumsi Peternakan </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo site_url()?>Diskehan/data_komoditas_peternakan"> Data Komoditas Peternakan </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo site_url()?>Diskehan/rekap_peternakan"> Rekap Kebutuhan Pangan Peternakan </a> 
                                        </li>
                                    </ul>
                                </li>
                                <li >
                                    <a href="kebutuhan-pangan.php">
                                        <i class="fa fa-book"></i> Data Perikanan
                                        <i class="fa arrow"></i> 
                                    </a>
                                        
                                    <ul class="sidebar-nav">
                                        <li>
                                            <a href="<?php echo site_url()?>Diskehan/komoditas_pertanian"> Komoditas Perikanan </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo site_url()?>Diskehan/konsumsi_pertanian"> Data Konsumsi Perikanan </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo site_url()?>Diskehan/konsumsi_pertanian"> Data Komoditas Perikanan </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo site_url()?>Diskehan/data_komoditas_pertanian"> Rekap Kebutuhan Pangan Perikanan </a> 
                                        </li>
                                    </ul>
                                </li>
                                
                               
                            </ul>
                        </nav>
                    </div>
                </aside>
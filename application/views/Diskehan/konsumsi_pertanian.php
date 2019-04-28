<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Konsumsi Pertanian</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- <link rel="apple-touch-icon" href="apple-touch-icon.png"> -->
        <!-- Place favicon.ico in the root directory -->
        <!-- <link rel="stylesheet" href="css/vendor.css"> -->
        <link rel="stylesheet" href="<?php echo base_url()?>assets/css/vendor.css">
        <link rel="stylesheet" href="<?php echo base_url()?>assets/css/app.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/b-1.5.6/b-colvis-1.5.6/fc-3.2.5/fh-3.1.4/r-2.2.2/datatables.min.css"/>
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
                    <div class="header-block header-block-search">
                        <form role="search">
                            <div class="input-container">
                                <i class="fa fa-search"></i>
                                <input type="search" placeholder="Search">
                                <div class="underline"></div>
                            </div>
                        </form>
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
                                <li class="active">
                                    <a href="<?php echo site_url()?>Diskehan/index">
                                        <i class="fa fa-home"></i> Dashboard </a>
                                </li>
                                <li >
                                    <a href="kebutuhan-pangan.php">
                                        <i class="fa fa-book"></i> Data Penduduk
                                        <i class="fa arrow"></i> 
                                    </a>
                                        
                                    <ul class="sidebar-nav">
                                        <li>
                                            <a href="<?php echo site_url()?>Diskehan/kecamatan"> Data Kecamatan </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo site_url()?>Diskehan/penduduk"> Data Jumlah Penduduk </a>
                                        </li>
                                    </ul>
                                </li>
                                <li >
                                    <a href="kebutuhan-pangan.php">
                                        <i class="fa fa-book"></i> Data Pertanian
                                        <i class="fa arrow"></i> 
                                    </a>
                                        
                                    <ul class="sidebar-nav">
                                        <li>
                                            <a href="<?php echo site_url()?>Diskehan/komoditas_pertanian"> Komoditas Pertanian </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo site_url()?>Diskehan/konsumsi_pertanian"> Data Konsumsi Pertanian </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo site_url()?>Diskehan/data_komoditas_pertanian"> Data Komoditas Pertanian </a> 
                                        </li>
                                        <li>
                                            <a href="<?php echo site_url()?>Diskehan/rekap_pertanian"> Rekap Kebutuhan Pangan Pertanian </a> 
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
                 <div class="sidebar-overlay" id="sidebar-overlay"></div>
                <div class="sidebar-mobile-menu-handle" id="sidebar-mobile-menu-handle"></div>
                <div class="mobile-menu-handle"></div>

                <article class="content charts-flot-page">
                    <div class="title-block">
                        <h3 class="title"> Data Konsumsi Pertanian </h3>

                        <!-- <p class="title-description"> List of sample charts with custom colors </p> -->
                    </div>
                    <section class="section">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-block">
                                        <div class="card-title-block">
                                            <h3 class="title"> Tabel Data Konsumsi Pertanian</h3>
                                        </div>
                                        <div class="col-12">
                                            <a href="<?php base_url()?>tambah_konsumsi_pertanian"><button type="button" class="btn btn-info">Tambah Data Konsumsi</button></a>

                                          <table id="table_id" class="display">
                                                    <thead>
                                                        <tr>
                                                            <th>No.</th>
                                                            <th>Nama Kecamatan</th>
                                                            <th>Nama Komoditi</th>
                                                            <th>Bulan</th>
                                                            <th>Tahun</th>
                                                            <th>Jumlah Konsumsi</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <?php $i = 1 ?>
                                                    <tbody>
                                                       <?php foreach ($konsumsi as $key) { 
                                                                ?>
                                                            <tr>
                                                                <td><?php echo $i?></td>
                                                                <td><?php echo $key->kec_nama ?></td>
                                                                <td><?php echo $key->det_kmd_nama ?></td>
                                                                <td><?php echo $key->kons_bulan ?></td>
                                                                <td><?php echo $key->kons_thn ?></td>
                                                                <td><?php echo $key->kons_jml ?></td>
                                                                <td><a href="<?php echo base_url()?>Diskehan/edit_konsumsi_pertanian/<?php echo $key->kons_id ?>" class="btn btn-warning" role="button">Update</a>
                                                                <a href="<?php echo base_url()?>Diskehan/hapus_konsumsi_pertanian/<?php echo $key->kons_id ?>" class="btn btn-danger tombol-hapus" role="button">Hapus</a></td>
                                                            </tr>
                                                            <?php $i=$i+1; } ?>
                                                    </tbody>
                                                </table>
                                </div>
                            </div>
                        </div>
                    </section>
                </article>
                    
                    <!-- <section class="section map-tasks">
                        <div class="row sameheight-container">
                            <div class="col-md-8">
                                <div class="card sameheight-item" data-exclude="xs,sm">
                                    <div class="card-header">
                                        <div class="header-block">
                                            <h3 class="title"> Sales by countries </h3>
                                        </div>
                                    </div>
                                    <div class="card-block">
                                        <div id="dashboard-sales-map" style="width: 100%; height: 400px;"></div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </section> -->
                </article>
                
        <!-- Reference block for JS -->
        <div class="ref" id="ref">
            <div class="color-primary"></div>
            <div class="chart">
                <div class="color-primary"></div>
                <div class="color-secondary"></div>
            </div>
        </div>

        <script>
            (function(i, s, o, g, r, a, m)
            {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function()
                {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                    m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');
            ga('create', 'UA-80463319-4', 'auto');
            ga('send', 'pageview');
        </script>

        <script>
  $(document).ready( function () {
    $('#table_id').DataTable();
} );
        </script>

        <script src="<?php echo base_url()?>assets/js/vendor.js"></script>
        <script src="<?php echo base_url()?>assets/js/app.js"></script>
        <script src=<?= base_url()?>/assets/js/sweetalert2.all.min.js></script>
        <script src=<?= base_url()?>/assets/js/scriptjs/konsumsi_pertanian.js></script>
         <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/b-1.5.6/b-colvis-1.5.6/fc-3.2.5/fh-3.1.4/r-2.2.2/datatables.min.js"></script>
        <!-- <script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script> -->
        
    </body>
</html>
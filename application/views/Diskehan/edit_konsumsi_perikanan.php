<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title> Data Kecamatan</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- <link rel="apple-touch-icon" href="apple-touch-icon.png"> -->
        <!-- Place favicon.ico in the root directory -->
        <!-- <link rel="stylesheet" href="css/vendor.css"> -->
        <link rel="stylesheet" href="<?php echo base_url()?>assets/css/vendor.css">
        <link rel="stylesheet" href="<?php echo base_url()?>assets/css/app.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.css"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
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
                        <h3 class="title"> Konsumsi Perikanan </h3>
                        <!-- <p class="title-description"> List of sample charts with custom colors </p> -->
                    </div>
                      <section class="section">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-block">
                                        <?php echo form_open('Diskehan/edit_konsumsi_perikanan/'.$this->uri->segment(3)); ?>
                                        <div class="card-title-block">
                                            <h3 class="title"> Edit Konsumsi Perikanan </h3>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 form-control-label text-xs-right">Jenis Komoditas: </label>
                                            <div class="col-sm-10">
                                                 <select class="form-control" name="kons_det_kmd_id" id="kons_komoditas">
                                                  <option value=''>--Pilih--</option>
                                                  <?php foreach ($komoditas as $key) { ;?>
                                                         <option value="<?php echo $key->det_kmd_id; ?>"><?php echo $key->det_kmd_nama ?></option>
                                                   <?php } ?>
                                                </select>
                                                <br><?php echo form_error('kons_det_kmd_id'); ?></div>  
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 form-control-label text-xs-right">Bulan: </label>
                                            <div class="col-sm-10">
                                                <select class="form-control" name="kons_bulan" id="kons_bulan">
                                                  <option value='JANUARI'>Januari</option>
                                                  <option value='FEBRUARI'>Februari</option>
                                                  <option value='MARET'>Maret</option>
                                                  <option value='APRIL'>April</option>
                                                  <option value='MEI'>Mei</option>
                                                  <option value='JUNI'>Juni</option>
                                                  <option value='JULI'>Juli</option>
                                                  <option value='AGUSTUS'>Agustus</option>
                                                  <option value='SEPTEMBER'>September</option>
                                                  <option value='OKTOBER'>Oktober</option>
                                                  <option value='NOVEMBER'>November</option>
                                                  <option value='DESEMBER'>Desember</option>
                                                </select>
                                            </div>
                                            <br><?php echo form_error('kons_bulan'); ?></div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 form-control-label text-xs-right"> Tahun Data: </label>
                                        </div>
                                        <input class="date-own form-control" style="width: 300px;" type="text" name="kons_thn" value="<?php echo $konsumsi[0]->kons_thn; ?>">
                                         <?php echo form_error("kons_thn"); ?>

                                        <div class="form-group row">
                                            <label class="col-sm-2 form-control-label text-xs-right"> Jumlah Konsumsi: </label>
                                            <div class="col-sm-10">
                                            <input type="number" class="form-control boxed" name="kons_jml" placeholder="" value="<?php echo $konsumsi[0]->kons_jml ?>"> </div>
                                            <br><?php echo form_error("kons_thn"); ?>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-10 col-sm-offset-2">
                                                <button type="submit" class="btn btn-primary"> Simpan </button>
                                            </div>
                                        </div>
                                        <?php echo form_close(); ?>
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
        <script type="text/javascript">
        $(document).ready(function() {
        $('#item-list').DataTable({
            "ajax": {
            url : "datatabelkecamatan",
            type : 'GET'
            },
        });
        });
        </script>
        <script type="text/javascript">
                $('.date-own').datepicker({
                minViewMode: 2,
                format: 'yyyy'
                });
        </script>
        <script type = "text/javascript">
            //javascript set option selected
            let selectedbulan = <?php echo json_encode($konsumsi[0]->kons_bulan); ?>;
            let selectedkomoditas = <?php echo json_encode($konsumsi[0]->kons_det_kmd_id); ?>
            
            //cari element by id
            const varkonsumsi = document.getElementById('kons_bulan');
            const varkomoditas = document.getElementById('kons_komoditas');

            //set value dari option
            varkonsumsi.value = selectedbulan;
            varkomoditas.value = selectedkomoditas;
        </script>
        <script src="<?php echo base_url()?>assets/js/vendor.js"></script>
        <script src="<?php echo base_url()?>assets/js/app.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
    </body>
</html>
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
                                    <div class="img" style="background-image: url('https://avatars3.githubusercontent.com/u/3959008?v=3&s=40')"> </div>
                                    <span class="name"> John Doe </span>
                                </a>
                                <div class="dropdown-menu profile-dropdown-menu" aria-labelledby="dropdownMenu1">
                                    <a class="dropdown-item" href="#">
                                        <i class="fa fa-user icon"></i> Profile </a>
                                    <a class="dropdown-item" href="login.html">
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
                                <li >
                                    <a href="<?php echo site_url()?>Admin/index">
                                        <i class="fa fa-home"></i> Dashboard </a>
                                </li>
                                <li class="active" >
                                    <a href="kebutuhan-pangan.php">
                                        <i class="fa fa-book"></i> Kebutuhan Pangan
                                        <i class="fa arrow"></i> 
                                    </a>
                                        
                                    <ul class="sidebar-nav">
                                        <li class="active">
                                            <a href="<?php echo site_url()?>Admin/kecamatan"> Data Kecamatan </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo site_url()?>Admin/penduduk"> Data Jumlah Penduduk </a>
                                        </li>
                                        <li>
                                            <a href="item-editor.html"> Data Kebutuhan Pangan </a>
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
                                            <a href="<?php echo site_url()?>Admin/komoditas_pertanian"> Komoditas Pertanian </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo site_url()?>Admin/konsumsi_pertanian"> Data Konsumsi Pertanian </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo site_url()?>Admin/data_komoditas_pertanian"> Data Komoditas Pertanian </a> 
                                        </li>
                                    </ul>
                                </li>
                                <li >
                                    <a href="Data-peternakan.php">
                                        <i class="fa fa-book"></i> Data Peternakan </a>
                                </li>
                                <li >
                                    <a href="Data-perikanan.php">
                                        <i class="fa fa-book"></i> Data Perikanan </a>
                                </li>
                                
                                <!-- <li>
                                    <a href="">
                                        <i class="fa fa-th-large"></i> Items Manager
                                        <i class="fa arrow"></i>
                                    </a>
                                    <ul class="sidebar-nav">
                                        <li>
                                            <a href="items-list.html"> Items List </a>
                                        </li>
                                        <li>
                                            <a href="item-editor.html"> Item Editor </a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="">
                                        <i class="fa fa-area-chart"></i> Charts
                                        <i class="fa arrow"></i>
                                    </a>
                                    <ul class="sidebar-nav">
                                        <li>
                                            <a href="charts-flot.html"> Flot Charts </a>
                                        </li>
                                        <li>
                                            <a href="charts-morris.html"> Morris Charts </a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="">
                                        <i class="fa fa-table"></i> Tables
                                        <i class="fa arrow"></i>
                                    </a>
                                    <ul class="sidebar-nav">
                                        <li>
                                            <a href="static-tables.html"> Static Tables </a>
                                        </li>
                                        <li>
                                            <a href="responsive-tables.html"> Responsive Tables </a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="forms.html">
                                        <i class="fa fa-pencil-square-o"></i> Forms </a>
                                </li>
                                <li>
                                    <a href="">
                                        <i class="fa fa-desktop"></i> UI Elements
                                        <i class="fa arrow"></i>
                                    </a>
                                    <ul class="sidebar-nav">
                                        <li>
                                            <a href="buttons.html"> Buttons </a>
                                        </li>
                                        <li>
                                            <a href="cards.html"> Cards </a>
                                        </li>
                                        <li>
                                            <a href="typography.html"> Typography </a>
                                        </li>
                                        <li>
                                            <a href="icons.html"> Icons </a>
                                        </li>
                                        <li>
                                            <a href="grid.html"> Grid </a>
                                        </li>
                                    </ul>
                                </li> -->
                            </ul>
                        </nav>
                    </div>
                </aside>
                 <div class="sidebar-overlay" id="sidebar-overlay"></div>
                <div class="sidebar-mobile-menu-handle" id="sidebar-mobile-menu-handle"></div>
                <div class="mobile-menu-handle"></div>

                <article class="content charts-flot-page">
                    <div class="title-block">
                        <h3 class="title"> Data Kecamatan </h3>

                        <!-- <p class="title-description"> List of sample charts with custom colors </p> -->
                    </div>
                    <section class="section">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-block">
                                        <div class="card-title-block">
                                            <h3 class="title"> Tabel Kecamatan </h3>
                                        </div>
                                        <div class="col-12">
                                        
                                        <select class="form-control" name="pend_kec_id" id="pend_thn">
                                                  <option value=''>--Pilih--</option>
                                                  <?php foreach ($tahun as $key) { ;?>
                                                         <option value="<?php echo $key->pend_thn; ?>"><?php echo $key->pend_thn ?></option>
                                                   <?php } ?>
                                        </select>

                                        <div class="form-group">
                                                <label class="control-label col-md-3">Sub Kategori</label>
                                                <div class="col-md-8">
                                                    <select name="subkategori" class="subkategori form-control">
                                                        <option value="0">-PILIH-</option>
                                                    </select>
                                                </div>
                                                
                                            </div>
                                        
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

<script type="text/javascript">
    $(document).ready(function(){
        $('#kategori').change(function(){
            var id=$(this).val();
            $.ajax({
                url : "<?php echo base_url();?>Admin/get_jumlahpenduduk",
                method : "POST",
                data : {id: id},
                async : false,
                dataType : 'json',
                success: function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<option>'+data[i].JumlahPenduduk+'</option>';
                    }
                    $('.subkategori').html(html);
                     
                }
            });
        });
    });
</script>

        <script src="<?php echo base_url()?>assets/js/vendor.js"></script>
        <script src="<?php echo base_url()?>assets/js/app.js"></script>
        <script src=<?= base_url()?>/assets/js/sweetalert2.all.min.js></script>
        <script src=<?= base_url()?>/assets/js/myscript.js></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/b-1.5.6/b-colvis-1.5.6/fc-3.2.5/fh-3.1.4/r-2.2.2/datatables.min.js"></script>
        <!-- <script type="text/javascript" src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
         -->
    </body>
</html>
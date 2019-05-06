<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title> Data Pertanian</title>
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
                 <div class="sidebar-overlay" id="sidebar-overlay"></div>
                <div class="sidebar-mobile-menu-handle" id="sidebar-mobile-menu-handle"></div>
                <div class="mobile-menu-handle"></div>

                <article class="content charts-flot-page">
                    <div class="title-block">
                        <h3 class="title"> Rekap Komoditas Pertanian </h3>

                        <!-- <p class="title-description"> List of sample charts with custom colors </p> -->
                    </div>
                    <section class="section">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-block">
                                        <div class="card-title-block">
                                        <p>Pilih Tahun Data :</p>
                                            <select name="kategori" id="kategori" class="form-control">
                                                <option value="0">-PILIH-</option>
                                                    <?php $year = $listtahun - 1; ?>
                                                    <?php for ($i=$year; $i<=($year + 5) ; $i++) { ?>
                                                        <option><?php echo $i; ?></option>
                                                    <?php } ?>
                                            </select>
                                        </div>
                                        <div class="card-title-block">
                                        <p id="headerawal">Silahkan Pilih data terlebih dahulu</p>
                                        <h5 id= "title1" style="display: none">Tabel Kebutuhan Pangan</h5>
                                        <table id="kebutuhanpangan" class="table table-striped table-bordered table-hover" style="display: none">
                                                <thead>
                                                        <tr>
                                                            <th>Nama Komoditi</th>
                                                            <th>Jumlah Penduduk</th>
                                                            <th>Konsumsi</th>
                                                            <th>Kebutuhan</th>
                                                        </tr>
                                                </thead>
                                                <tbody id="tbody1">
                                                        <tr>
                                                            <th> </th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                        </tr>
                                                        <tr>
                                                            <th> </th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                        </tr>
                                                        <tr>
                                                            <th> </th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                        </tr>
                                                        <tr>
                                                            <th> </th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                        </tr>
                                                        <tr>
                                                            <th> </th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                        </tr>
                                                        <tr>
                                                            <th> </th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                        </tr>
                                                        <tr>
                                                            <th> </th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                        </tr>
                                                        <tr>
                                                            <th> </th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                        </tr>
                                                        <tr>
                                                            <th> </th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                        </tr>
                                                        <tr>
                                                            <th> </th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                        </tr>
                                                        <tr>
                                                            <th> </th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                        </tr>
                                                </tbody>
                                        </table>
                                        
                                        <h5 id= "title2" style="display: none">Tabel Ketersediaan Pangan</h5>
                                        <table id="ketersediaanpangan" class="table table-striped table-bordered table-hover" style="display: none">
                                                <thead>
                                                        <tr>
                                                            <th>Nama Komoditi</th>
                                                            <th>Luas Panen</th>
                                                            <th>Produkstivitas</th>
                                                            <th>Produksi</th>
                                                            <th>Ketersediaan</th>
                                                        </tr>
                                                </thead>
                                                <tbody id="tbody2">
                                                        <tr>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                        </tr>
                                                        <tr>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                        </tr>
                                                        <tr>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                        </tr>
                                                        <tr>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                        </tr>
                                                        <tr>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                        </tr>
                                                        <tr>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                        </tr>
                                                        <tr>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                        </tr>
                                                        <tr>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                        </tr>
                                                        <tr>
                                                            <th> </th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                        </tr>
                                                        <tr>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                        </tr>
                                                        <tr>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                        </tr>
                                                </tbody>
                                        </table>

                                        <h5 id="title3" style="display: none">Tabel Suplus/Minus</h5>
                                        <table id="surplusminus" class="table table-striped table-bordered table-hover" style="display: none">
                                                <thead>
                                                        <tr>
                                                            <th>Nama Komoditi</th>
                                                            <th>Jumlah</th>
                                                            <th>Status</th>
                                                            <th>PSB</th>
                                                        </tr>
                                                </thead>
                                                <tbody id="tbody3">
                                                        <tr>
                                                            <th> </th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                        </tr>
                                                        <tr>
                                                            <th> </th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                        </tr>
                                                        <tr>
                                                            <th> </th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                        </tr>
                                                        <tr>
                                                            <th> </th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                        </tr>
                                                        <tr>
                                                            <th> </th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                        </tr>
                                                        <tr>
                                                            <th> </th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                        </tr>
                                                        <tr>
                                                            <th> </th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                        </tr>
                                                        <tr>
                                                            <th> </th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                        </tr>
                                                        <tr>
                                                            <th> </th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                        </tr>
                                                        <tr>
                                                            <th> </th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                        </tr>
                                                        <tr>
                                                            <th> </th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                        </tr>
                                                </tbody>
                                        </table>
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
        <script type="text/javascript">
            $(document).ready(function(){
                //deklarasi object awal
                const headerawal =  document.getElementById('headerawal');

                const titletabel1 = document.getElementById('title1');
                const tabelkebutuhanpangan = document.getElementById('kebutuhanpangan');

                const titletabel2 = document.getElementById('title2');
                const tabelketersediaanpangan = document.getElementById('ketersediaanpangan');
                
                const titletabel3 = document.getElementById('title3');
                const tabelsurplusminus = document.getElementById('surplusminus');
                var kolom1 = '';
                var kolom2 = '';
                var kolom3 = '';
                var kolom4 = '';
                var kolom5 = '';
                var status = '';

                // var indexy = 1;
                // indexy = 2;
                // var rowbaru = document.querySelector("#tbody1 tr th:nth-child("+indexy+")");
                // var rowbaru = document.querySelector('#tbody1 tr:nth-child(2) th:nth-child(1)');
                // rowbaru.innerHTML = 'BIsaaaa';

                // thbaru.innerHTML = "Putra";
                // thbaru.style.display = "none";

                $('#kategori').change(function(){
                    var tahun=$(this).val();
                    $.ajax({
                        url : "<?php echo base_url();?>Diskehan/get_rekap_pertanian",
                        method : "POST",
                        data : {tahun: tahun},
                        async : false,
                        dataType : 'json',
                        success: function(data){
                            var len = data.length;
                                if(len > 0){
                                
                                headerawal.style.display = "none";

                                title1.style.display = "block";    
                                tabelkebutuhanpangan.style.display = "block";

                                title2.style.display = "block";    
                                tabelketersediaanpangan.style.display = "block";
                                
                                title3.style.display = "block";    
                                tabelsurplusminus.style.display = "block";

                                for (let baris = 1; baris <= 11; baris++) {
                                    kolom1 = document.querySelector("#tbody1 tr:nth-child("+baris+") th:nth-child(1)");
                                    kolom1.innerHTML = data[baris-1].det_kmd_nama;
                                    // kolom1.style.color = 'red';
                                    // kolom2 = document.querySelector("#tbody1 tr:nth-child("+baris+") th:nth-child(2)");
                                    // kolom2.innerHTML = data[baris-1].jumlah_penduduk;
                                    // kolom3 = document.querySelector("#tbody1 tr:nth-child("+baris+") th:nth-child(3)");
                                    // kolom3.innerHTML = data[baris-1].konsumsi;
                                    // kolom4 = document.querySelector("#tbody1 tr:nth-child("+baris+") th:nth-child(4)");
                                    // kolom4.innerHTML = data[baris-1].kebutuhan;
                                }

                                
                                for (let baris = 1; baris <= 11; baris++) {
                                    kolom1 = document.querySelector("#tbody2 tr:nth-child("+baris+") th:nth-child(1)");
                                    kolom1.innerHTML = data[baris-1].det_kmd_nama;
                                    kolom2 = document.querySelector("#tbody2 tr:nth-child("+baris+") th:nth-child(2)");
                                    kolom2.innerHTML = data[baris-1].panen;
                                    kolom3 = document.querySelector("#tbody2 tr:nth-child("+baris+") th:nth-child(3)");
                                    kolom3.innerHTML = data[baris-1].provitas;
                                    kolom4 = document.querySelector("#tbody2 tr:nth-child("+baris+") th:nth-child(4)");
                                    kolom4.innerHTML = data[baris-1].produksi;
                                    kolom5 = document.querySelector("#tbody2 tr:nth-child("+baris+") th:nth-child(5)");
                                    kolom5.innerHTML = data[baris-1].ketersediaan;
                                }

                                for (let baris = 1; baris <= 11; baris++) {
                                    kolom1 = document.querySelector("#tbody3 tr:nth-child("+baris+") th:nth-child(1)");
                                    kolom1.innerHTML = data[baris-1].det_kmd_nama;
                                    kolom2 = document.querySelector("#tbody3 tr:nth-child("+baris+") th:nth-child(2)");
                                    kolom2.innerHTML = data[baris-1].surplus;
                                    if (data[baris-1].surplus > 0) {
                                        status = "Surplus";
                                    }
                                    else
                                    {
                                        status = "Minus";
                                    }
                                    kolom3 = document.querySelector("#tbody3 tr:nth-child("+baris+") th:nth-child(3)");
                                    kolom3.innerHTML = status;
                                    kolom4 = document.querySelector("#tbody3 tr:nth-child("+baris+") th:nth-child(4)");
                                    kolom4.innerHTML = data[baris-1].psb;
                                }
                                
                                //set isi dari tabel
                                // const kmd1 = document.createTextNode(data[0].det_kmd_nama);

                               
                                // const trbaru = document.createElement('tr');
                                // const thbaru = document.createElement('th');
                                
                                }else{
                                
                                    headerawal.style.display = "block";
                                    headerawal.innerHTML = "Tidak Ada Data";

                                    title1.style.display = "none";    
                                    tabelkebutuhanpangan.style.display = "none";

                                    title2.style.display = "none";    
                                    tabelketersediaanpangan.style.display = "none";

                                    title3.style.display = "none";    
                                    tabelsurplusminus.style.display = "none";

                                }

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
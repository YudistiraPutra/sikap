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
                        <h3 class="title"> Komoditas Peternakan </h3>
                        <!-- <p class="title-description"> List of sample charts with custom colors </p> -->
                    </div>
                      <section class="section">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-block">
                                        <?php echo form_open('Diskehan/tambah_komoditas_peternakan'); ?>
                                        <div class="card-title-block">
                                            <h3 class="title"> Form Tambah Komoditas Peternakan </h3>
                                        </div>
                                          
                                        <div class="form-group row">
                                            <label class="col-sm-2 form-control-label text-xs-right">Jenis Komoditas: </label>
                                            <div class="col-sm-10">
                                                 <select  name="kategori" id="kategori" class="form-control">
                                                  <option value=''>--Pilih--</option>
                                                  <?php foreach ($kategori as $key) { ;?>
                                                         <option value="<?php echo $key->kmd_id; ?>"><?php echo $key->kmd_nama ?></option>
                                                   <?php } ?>
                                                </select>
                                                </div>  
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 form-control-label text-xs-right">Nama Komoditas: </label>
                                            <div class="col-sm-10">
                                                 <select id="kons_det_kmd_id" class="form-control" name="kons_det_kmd_id">
                                                  <option value=''>--Pilih--</option>
                                                </select>
                                                <br><?php echo form_error('det_kmd_id'); ?></div>  
                                        </div>


                                        <div class="form-group row">
                                            <label class="col-sm-2 form-control-label text-xs-right"> Jumlah Produksi (Ton): </label>
                                            <div class="col-sm-10">
                                            <input type="number" class="form-control boxed" name="produksi" placeholder="" id="produksi" step="any"> 
                                            <br><p>Silahkan gunakan titik (.) untuk bilangan desimal</p><?php echo form_error('produksi'); ?> </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 form-control-label text-xs-right"> Ketersediaan (Ton): </label>
                                            <div class="col-sm-10">
                                            <input type="number" class="form-control boxed" name="ketersediaan" placeholder="" id="ketersediaan" value="" step="any" readonly>
                                            <br><?php echo form_error('ketersediaan'); ?>  </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 form-control-label text-xs-right"> PSB: </label>
                                            <div class="col-sm-10">
                                            <input type="number" class="form-control boxed" name="psb" placeholder="" id="psb" value="" step="any" readonly>
                                            <br><?php echo form_error('psb'); ?>  </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 form-control-label text-xs-right">Bulan: </label>
                                            <div class="col-sm-10">
                                                 <select class="form-control" name="bulan">
                                                  <option value=''>--Pilih--</option>
                                                  <option value='Januari'>Januari</option>
                                                  <option value='Februari'>Februari</option>
                                                  <option value='Maret'>Maret</option>
                                                  <option value='April'>April</option>
                                                  <option value='Mei'>Mei</option>
                                                  <option value='Juni'>Juni</option>
                                                  <option value='Juli'>Juli</option>
                                                  <option value='Agustus'>Agustus</option>
                                                  <option value='September'>September</option>
                                                  <option value='Oktober'>Oktober</option>
                                                  <option value='November'>November</option>
                                                  <option value='Desember'>Desember</option>
                                                </select>
                                           
                                            <br> <?php echo form_error('bulan'); ?>  </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 form-control-label text-xs-right"> Tahun Data: </label>
                                            <input class="date-own form-control" style="width: 300px;" type="text" name="tahun">
                                         <?php echo form_error("tahun"); ?>
                                        </div>
                                       

                                         <p id="demo"></p>

                                        <div class="form-group row">
                                            <div class="col-sm-10 col-sm-offset-2">
                                                <button type="submit" class="btn btn-primary"> Simpan </button>
                                            </div>
                                        </div>
                                        <br><?php echo form_close(); ?>
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
        <script type="text/javascript">
        $(document).ready(function(){

            $('#kategori').change(function(){
			var id=$(this).val();
            $('#kons_det_kmd_id').empty().append('<option selected="selected" value="">--Pilih--</option>')

            $.ajax({
				url : "<?php echo base_url();?>Diskehan/get_subkategori_peternakan",
				method : "POST",
				data : {id: id},
				async : false,
		        dataType : 'json',
				success: function(data){
					// console.log(data);
                    for (let index = 0; index < data.length; index++) {
                        $("#kons_det_kmd_id").append("<option value="+data[index].det_kmd_id+">"+data[index].det_kmd_nama+"</option>");
                    }

                    var jumlahproduksi = $('#produksi').val();

                    if(id == 11){
                        var psb = jumlahproduksi*35700000/8000000;
                    }
                    else if(id == 12){
                        var psb = jumlahproduksi*3200000/8000000;
                    }
                    else if(id == 13){
                        var psb = jumlahproduksi*12000000/800000;
                    }

                    document.getElementById('ketersediaan').value = jumlahproduksi;
                    document.getElementById('psb').value = psb; 
				}
			});
		});

        $('#produksi').change(function(){ 
            var jumlahproduksi = $(this).val();
            var tipekategori = $('#kategori').val();

           if(tipekategori == 11){
               var psb = jumlahproduksi*35700000/8000000;
           }
           else if(tipekategori == 12){
            var psb = jumlahproduksi*3200000/8000000;
           }
           else if(tipekategori == 13){
            var psb = jumlahproduksi*12000000/800000;
           }

           document.getElementById('ketersediaan').value = jumlahproduksi;
           document.getElementById('psb').value = psb; 
        });
        });
        </script>
        <script src="<?php echo base_url()?>assets/js/vendor.js"></script>
        <script src="<?php echo base_url()?>assets/js/app.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
    </body>
</html>
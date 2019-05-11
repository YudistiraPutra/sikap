                 <div class="sidebar-overlay" id="sidebar-overlay"></div>
                <div class="sidebar-mobile-menu-handle" id="sidebar-mobile-menu-handle"></div>
                <div class="mobile-menu-handle"></div>

                <article class="content charts-flot-page">
                    <div class="title-block">
                        <h3 class="title"> Komoditas Perikanan </h3>
                        <!-- <p class="title-description"> List of sample charts with custom colors </p> -->
                    </div>
                      <section class="section">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-block">
                                        <?php echo form_open('Diskehan/tambah_komoditas_perikanan'); ?>
                                        <div class="card-title-block">
                                            <h3 class="title"> Form Tambah Komoditas Perikanan </h3>
                                        </div>
                                          
                                        <div class="form-group row">
                                            <label class="col-sm-2 form-control-label text-xs-right">Jenis Komoditas: </label>
                                            <div class="col-sm-10">
                                                 <select class="form-control" name="det_kmd_id" id="komoditas" onchange="gantikomoditas()">
                                                  <option value=''>--Pilih--</option>
                                                  <?php foreach ($komoditas as $key) { ;?>
                                                         <option value="<?php echo $key->det_kmd_id; ?>"><?php echo $key->det_kmd_nama ?></option>
                                                   <?php } ?>
                                                </select>
                                                <?php echo form_error('det_kmd_id'); ?></div>
                                        </div>


                                        <div class="form-group row">
                                            <label class="col-sm-2 form-control-label text-xs-right"> Jumlah Produksi (Ton): </label>
                                            <div class="col-sm-10">
                                            <input type="number" class="form-control boxed" name="produksi" placeholder="" id="produksi" onchange="fungsihitung()" step="any"> 
                                            <p>Silahkan gunakan titik (.) untuk bilangan desimal</p><?php echo form_error('produksi'); ?> </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 form-control-label text-xs-right"> Ketersediaan (Ton): </label>
                                            <div class="col-sm-10">
                                            <input type="number" class="form-control boxed" name="ketersediaan" placeholder="" id="ketersediaan" value="" step="any" readonly>
                                            <?php echo form_error('ketersediaan'); ?>  </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 form-control-label text-xs-right"> PSB: </label>
                                            <div class="col-sm-10">
                                            <input type="number" class="form-control boxed" name="psb" placeholder="" id="psb" value="" step="any" readonly>
                                            <?php echo form_error('psb'); ?>  </div>
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
                                           
                                             <?php echo form_error('bulan'); ?>  </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 form-control-label text-xs-right"> Tahun Data: </label>
                                            <div class="col-sm-10">
                                            <input class="date-own form-control" style="width: 300px;" type="text" name="tahun">
                                         <?php echo form_error("tahun"); ?>
                                     </div>
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

             //script menghitung ketersediaan secara otomatis
            function fungsihitung() {
                var jumlahproduksi = document.getElementById("produksi").value;

                document.getElementById("ketersediaan").value = jumlahproduksi;
                jumlahproduksi = jumlahproduksi*9000000/8000000;
                document.getElementById("psb").value = jumlahproduksi;
            }
        </script>
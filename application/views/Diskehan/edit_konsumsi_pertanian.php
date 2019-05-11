                 <div class="sidebar-overlay" id="sidebar-overlay"></div>
                <div class="sidebar-mobile-menu-handle" id="sidebar-mobile-menu-handle"></div>
                <div class="mobile-menu-handle"></div>

                <article class="content charts-flot-page">
                    <div class="title-block">
                        <h3 class="title"> Data Penduduk </h3>
                        <!-- <p class="title-description"> List of sample charts with custom colors </p> -->
                    </div>
                      <section class="section">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-block">
                                        <?php echo form_open('Diskehan/edit_konsumsi_pertanian/'.$this->uri->segment(3)); ?>
                                        <div class="card-title-block">
                                            <h3 class="title"> Edit Konsumsi Pertanian </h3>
                                        </div>

                                          <div class="form-group row">
                                            <label class="col-sm-2 form-control-label text-xs-right">Nama Kecamatan: </label>
                                            <div class="col-sm-10">
                                                 <select class="form-control" name="kons_kec_id" id="kons_kecamatan">
                                                  <option value=''>--Pilih--</option>
                                                  <?php foreach ($kecamatan as $key) { ;?>
                                                         <option value="<?php echo $key->kec_id; ?>"><?php echo $key->kec_nama ?></option>
                                                   <?php } ?>
                                                </select>
                                                <?php echo form_error('kons_kec_id'); ?></div>
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
                                                <?php echo form_error('kons_det_kmd_id'); ?></div>  
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 form-control-label text-xs-right">Bulan: </label>
                                            <div class="col-sm-10">
                                                <select class="form-control" name="kons_bulan" id="kons_bulan">
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
                                            </div>
                                            <?php echo form_error('kons_bulan'); ?>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 form-control-label text-xs-right"> Tahun Data: </label>
                                            <div class="col-sm-10">
                                                <input class="date-own form-control" style="width: 300px;" type="text" name="kons_thn" value="<?php echo $konsumsi[0]->kons_thn; ?>">
                                            </div>
                                        </div>
                                        
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
            let selectedkonsumsi = <?php echo json_encode($konsumsi[0]->kons_bulan); ?>;
            let selectedkecamatan = <?php echo json_encode($konsumsi[0]->kons_kec_id); ?>;
            let selectedkomoditas = <?php echo json_encode($konsumsi[0]->kons_det_kmd_id); ?>
            
            //cari element by id
            const varkonsumsi = document.getElementById('kons_bulan');
            const varkecamatan = document.getElementById('kons_kecamatan');
            const varkomoditas = document.getElementById('kons_komoditas');

            //set value dari option
            varkonsumsi.value = selectedkonsumsi;
            varkecamatan.value = selectedkecamatan;
            varkomoditas.value = selectedkomoditas;
        </script>
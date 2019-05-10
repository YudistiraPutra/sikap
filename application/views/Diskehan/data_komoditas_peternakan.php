                 <div class="sidebar-overlay" id="sidebar-overlay"></div>
                <div class="sidebar-mobile-menu-handle" id="sidebar-mobile-menu-handle"></div>
                <div class="mobile-menu-handle"></div>

                <article class="content charts-flot-page">
                    <div class="title-block">
                        <h3 class="title"> Data Komoditas Peternakan </h3>

                        <!-- <p class="title-description"> List of sample charts with custom colors </p> -->
                    </div>
                    <section class="section">
                            <div class="col-md-24">
                                <div class="card">
                                    <div class="card-block">
                                        <div class="card-title-block">
                                            <h3 class="title"> Tabel Data Komoditas Peternakan </h3>
                                        </div>
                                        <div class="col-12">
                                            <a href="<?php base_url()?>tambah_komoditas_peternakan"><button type="button" class="btn btn-primary">Tambah Data</button></a>
                                        
                                          <table id="table_id" class="table table-striped table-bordered table-hover">
                                            
                                                    <thead>
                                                        <tr>
                                                            <th>No.</th>
                                                            <th>Nama Komoditi</th>
                                                            <th>Produksi (Ton)</th>
                                                            <th>Ketersediaan (Ton)</th>
                                                            <th>PSB</th>
                                                            <th>Bulan</th>
                                                            <th>Tahun</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>

                                                    <?php $i = 1 ?>
                                                    <tbody>
                                                       <?php foreach ($data_komoditas as $key) { 
                                                                ?>
                                                            <tr>
                                                                <td><?php echo $i?></td>
                                                                <td><?php echo $key->det_kmd_nama ?></td>
                                                                <td><?php echo $key->produksi?></td>
                                                                <td><?php echo $key->ketersediaan?></td>
                                                                <td><?php echo $key->psb?></td>
                                                                <td><?php echo $key->bulan?></td>
                                                                <td><?php echo $key->tahun?></td>
                                                                <td><a href="<?php echo base_url()?>Diskehan/edit_komoditas_peternakan/<?php echo $key->id ?>" class="btn btn-danger" role="button">Update</a>
                                                                <a href="#" class="btn btn-danger tombol-hapus" role="button">Hapus</a></td>
                                                            </tr>
                                                            <?php  $i=$i+1; } ?>
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

      
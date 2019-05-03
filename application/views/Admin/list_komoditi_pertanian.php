                 <div class="sidebar-overlay" id="sidebar-overlay"></div>
                <div class="sidebar-mobile-menu-handle" id="sidebar-mobile-menu-handle"></div>
                <div class="mobile-menu-handle"></div>

                <article class="content charts-flot-page">
                    <div class="title-block">
                        <h3 class="title"> Data Komoditas Pertanian </h3>

                        <!-- <p class="title-description"> List of sample charts with custom colors </p> -->
                    </div>
                    <section class="section">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-block">
                                        <div class="card-title-block">
                                            <h3 class="title"> Tabel Data Komoditas Pertanian </h3>
                                        </div>
                                        <div class="col-12">
                                            <!-- jika dibutuhkan ditambahkan -->
                                            <!-- <a href="<?php base_url()?>tambahpenduduk"><button type="button" class="btn btn-info">Tambah Data Penduduk</button></a> -->

                                          <table id="table_id" class="display">
                                                    <thead>
                                                        <tr>
                                                            <th>No.</th>
                                                            <th>Nama Komoditas</th>
                                                        </tr>
                                                    </thead>
                                                    <?php $i = 1 ?>
                                                    <tbody>
                                                       <?php foreach ($komoditi as $key) { 
                                                                ?>
                                                            <tr>
                                                                <td><?php echo $i?></td>
                                                                <td><?php echo $key->det_kmd_nama ?></td>
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

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
                                        <div class="col-4">
                                            <a href="<?php base_url()?>tambah_komoditas_pertanian"><button type="button" class="btn btn-primary">Tambah Data</button></a>
                                        
                                          <table id="table_id" class="table table-striped table-bordered table-hover">
                                            
                                                    <thead>
                                                        <tr>
                                                            <th>No.</th>
                                                            <th>Nama Komoditi</th>
                                                            <th>Nama Kecamatan</th>
                                                            <th>Tanam (Ha)</th>
                                                            <th>Panen (Ha)</th>
                                                            <th>Provitas (Kw/Ha)</th>
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
                                                       <?php foreach ($komoditas as $key) { 
                                                                ?>
                                                            <tr>
                                                                <td><?php echo $i?></td>
                                                                <td><?php echo $key->det_kmd_nama ?></td>
                                                                <td><?php echo $key->kec_nama?></td>
                                                                <td><?php echo $key->tanam?></td>
                                                                <td><?php echo $key->panen?></td>
                                                                <td><?php echo $key->provitas?></td>
                                                                <td><?php echo $key->produksi?></td>
                                                                <td><?php echo $key->ketersediaan?></td>
                                                                <td><?php echo $key->psb?></td>
                                                                <td><?php echo $key->bulan?></td>
                                                                <td><?php echo $key->tahun?></td>
                                                                <td><a href="#" class="btn btn-danger tombol-hapus" role="button">Hapus</a></td>
                                                               
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
                
 
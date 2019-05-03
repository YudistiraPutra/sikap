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
                                        <div class="card-title-block">
                                            <h3 class="title"> Tabel Data Penduduk </h3>
                                        </div>
                                        <div class=".col-12 .col-sm-6 .col-md-8">
                                            <a href="<?php base_url()?>tambahpenduduk"><button type="button" class="btn btn-primary">Tambah Data Penduduk</button></a>

                                          <table id="table_id" class="table table-striped table-bordered table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>No.</th>
                                                            <th>Nama Kecamatan</th>
                                                            <th>Tahun</th>
                                                            <th>Jumlah Penduduk</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <?php $i = 1 ?>
                                                    <tbody>
                                                       <?php foreach ($penduduk as $key) { 
                                                                ?>
                                                            <tr>
                                                                <td><?php echo $i?></td>
                                                                <td><?php echo $key->kec_nama ?></td>
                                                                <td><?php echo $key->pend_thn ?></td>
                                                                <td><?php echo $key->pend_jml ?></td>
                                                                <td><a href="<?php echo base_url()?>Admin/editdatapenduduk/<?php echo $key->pend_id ?>" class="btn btn-warning" role="button">Update</a>
                                                                <a href="<?php echo base_url()?>Admin/hapusdatapenduduk/<?php echo $key->pend_id ?>" class="btn btn-danger tombol-hapus" role="button">Hapus</a></td>
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
                

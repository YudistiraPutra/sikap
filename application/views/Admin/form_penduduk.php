
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
                                        <?php echo form_open('Admin/tambahpenduduk'); ?>
                                        <div class="card-title-block">
                                            <h3 class="title"> Form Tambah Penduduk </h3>
                                        </div>

                                          <div class="form-group row">
                                            <label class="col-sm-2 form-control-label text-xs-right">Nama Kecamatan: </label>
                                            <div class="col-sm-10">
                                                 <select class="form-control" name="pend_kec_id">
                                                  <option value=''>--Pilih--</option>
                                                  <?php foreach ($kecamatan as $key) { ;?>
                                                         <option value="<?php echo $key->kec_id; ?>"><?php echo $key->kec_nama ?></option>
                                                   <?php } ?>
                                                </select>
                                            </div>
                                             <?php echo form_error('pend_kec_id'); ?>
                                         </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 form-control-label text-xs-right"> Tahun Data: </label>
                                            <div class="col-sm-10">
                                                <input class="date-own form-control" style="width: 300px;" type="text" name='pend_thn'>
                                            </div>
                                         <?php echo form_error('pend_thn'); ?>
                                     </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 form-control-label text-xs-right"> Jumlah Penduduk: </label>
                                            <div class="col-sm-10">
                                            <input type="number" class="form-control boxed" id="pend_jml" name="pend_jml" placeholder=""> </div>
                                            <?php echo form_error('pend_jml'); ?>
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

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
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
                                            <h3 class="title"> Cari Data Penduduk </h3>
                                        </div>
                                        <div class=".col-12 .col-sm-6 .col-md-8">
                                            
                                        <select class="form-control" name="kec_id" id="kec_id">
                                                  <option value=''>--Pilih--</option>
                                                  <?php foreach ($kecamatan as $key) { ;?>
                                                         <option value="<?php echo $key->kec_id; ?>"><?php echo $key->kec_nama ?></option>
                                                   <?php } ?>
                                        </select>
                                        <br>

                                        <p id="headerawal">Silahkan Pilih data terlebih dahulu</p>
                                        
                                        <table class="table table-striped table-bordered table-hover" style="display: none" id="table1">
                                            <!-- here goes our data! -->
                                            <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama</th>
                                                            <th>Tahun</th>
                                                            <th>Jumlah Penduduk</th>
                                                        </tr>
                                            </thead>
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
    $(document).ready(function() {

    let table = document.getElementById("table1");
    $('#kec_id').change(function(){

    $("#table1").find("tr:gt(0)").remove();
    var kec=$(this).val();

    headerawal.style.display = "none";

    $.ajax({
    url : "<?php echo base_url();?>Diskehan/get_search_penduduk",
    method : "POST",
    data : {kec: kec},
    async : false,
    dataType : 'json',
    success: function(data){


    if(data.length > 0){
    let i = 1;
    let mountains = data ;

    table.style.display = "block"; 

    function generateTable(table, data) {
      for (let element of data) {
        let row = table.insertRow();
          let cell = row.insertCell();
          let text = document.createTextNode(i);
          cell.appendChild(text);
          i = i + 1;
        for (key in element) {
          cell = row.insertCell();
          text = document.createTextNode(element[key]);
          cell.appendChild(text);
        }
      }
    }

generateTable(table, mountains);
    } 
    else{
        headerawal.style.display = "block";
        headerawal.innerHTML = "Tidak ada data";
    }}
    });
} );
    });
        </script>
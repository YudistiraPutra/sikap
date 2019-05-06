<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="<?php echo base_url().'assets/css/morris.css'?>">
  <title>Document</title>
</head>
<body>

<h2>Chart</h2>

<p>Pilih Nama Kecamatan :</p>
    <div>
        <select name="kategori" id="kategori" class="form-control">
          <option value="">-PILIH-</option>
            <?php foreach ($namakecamatan as $key) { ?>
                <option value="<?php echo $key->kec_id ?>"><?php echo $key->kec_nama ?></option>
            <?php } ?>
        </select>
  </div>

  <p>Pilih Bulan Data :</p>
    <div>
        <select name="kategori" id="kategori" class="form-control">
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
  </div>         


<p>Pilih Tahun Data :</p>
    <div>
        <select name="kategori" id="kategori" class="form-control">
          <option value="0">-PILIH-</option>
            <?php $year = $listtahun - 1; ?>
            <?php for ($i=$year; $i<=($year + 5) ; $i++) { ?>
                <option><?php echo $i; ?></option>
            <?php } ?>
        </select>
  </div>                            
 
 <div id="graph"></div>

 <script src="<?php echo base_url().'assets/js/jquery.min.js'?>"></script>
 <script src="<?php echo base_url().'assets/js/raphael-min.js'?>"></script>
 <script src="<?php echo base_url().'assets/js/morris.min.js'?>"></script>
 <script type="text/javascript">
        $(document).ready(function(){ 
        var kuncix = 'det_kmd_nama';
        
        Morris.Bar({
          element: 'graph',
          data: <?php echo $datasurplus;?>,
          xkey: kuncix,
          ykeys: ['surplus'],
          labels: ['surplus'],
          barColors: ["#4ef442"]
        });
      });
    </script>
</body>
</html>
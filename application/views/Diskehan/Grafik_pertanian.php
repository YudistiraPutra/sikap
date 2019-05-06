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

<h2>Chart using Codeigniter and Morris.js</h2>
 
 <div id="graph"></div>

 <script src="<?php echo base_url().'assets/js/jquery.min.js'?>"></script>
 <script src="<?php echo base_url().'assets/js/raphael-min.js'?>"></script>
 <script src="<?php echo base_url().'assets/js/morris.min.js'?>"></script>
 <script type="text/javascript">
        $(document).ready(function(){ 
          var kuncix = 'det_kmd_nama';
        


        Morris.Bar({
          element: 'graph',
          data: <?php echo $data;?>,
          xkey: kuncix,
          ykeys: ['surplus'],
          labels: ['surplus']
        });
      });
    </script>
</body>
</html>
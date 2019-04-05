<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Title Page</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
    	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
    	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<?php echo form_open('Admin/inputpenduduk'); ?>
			<legend>Tambah Penduduk</legend>
		
			<div class="form-group">
				<label for="">Nama Kecamatan</label>
				<!--Ambil data nama kecamatan dari database-->
				<select class="c-select form-control boxed" name="namakecamatan" id="namakecamatan">
					<?php foreach ($kecamatan as $key) { ?>
                        <option value="<?php echo $key->kec_id?>"><?php echo $key->kec_nama?></option>
                    <?php } ?>
                </select>
			</div>

			<div class="form-group">
				<label for="">Tahun</label>
				<input class="date-own form-control" style="width: 300px;" type="text" name="tahunpenduduk" id='tahunpenduduk'>
			</div>

			<script type="text/javascript">
      			$('.date-own').datepicker({
         		minViewMode: 2,
         		format: 'yyyy'
       			});
  			</script>

  			<div class="form-group">
				<label for="">Jumlah Penduduk</label>
				<input type="number" class="form-control" id="jumlahpenduduk" name="jumlahpenduduk" placeholder="Masukkan Jumlah Penduduk">
			</div>
		
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
		<?php echo form_close(); ?>

		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		<script src="Hello World"></script>

	</body>
</html>
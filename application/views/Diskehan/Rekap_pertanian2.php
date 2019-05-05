<!DOCTYPE html>
<html>
<head>
	<title>Select berhubungan dengan codeigniter dan ajax</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.css'?>">
</head>
<body>
	<br/>
	<div class="col-md-6 col-md-offset-3">
		<div class="thumbnail">
			<h4><center>Membuat Select berhubungan dengan codeigiter</center></h4><hr/>
			<form class="form-horizontal">
				<div class="form-group">
	                <label class="control-label col-md-3">Kategori</label>
	                <div class="col-md-8">
	                    <select name="kategori" id="kategori" class="form-control">
	                    	<option value="0">-PILIH-</option>
	                    		<?php $year = $listtahun - 1; ?>
								<?php for ($i=$year; $i<=($year + 5) ; $i++) { ?>
									<option><?php echo $i; ?></option>
								<?php } ?>
	                    </select>
	                </div>
	            </div>
			</form>
			<hr/>
		</div>
        <div >
            Username : <span id='suname'></span><br/>
            Name : <span id='sname'></span><br/>
            Email : <span id='semail'></span><br/>
            </div>
	</div>
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-3.3.1.min.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
<script type="text/javascript">
	$(document).ready(function(){
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
                        // Read values
                        var kmd1 = data[0].det_kmd_nama;
                        var kmd2 = data[1].det_kmd_nama;

                        $('#suname').text(kmd1);
                        $('#sname').text(kmd2);

                        }else{
                        $('#suname').text('');
                        }

                        }
			});
		});
	});
</script>
</body>
</html>
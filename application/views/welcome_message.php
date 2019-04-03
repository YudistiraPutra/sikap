<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Title Page</title>

		<!-- Bootstrap CSS -->
		<link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<nav class="navbar navbar-default" role="navigation">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Web Framework</a>
			</div>
	
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-nav">
					<li class="active"><a href="<?php echo site_url('welcome/index') ?>">Beranda</a></li>
					<li><a href="<?php echo site_url('welcome/about') ?>">Tentang Saya</a></li>
					<li><a href="<?php echo site_url('pegawai/index') ?>">Data Pegawai</a></li>
				</ul>
				<ul class="nav navbar-nav">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Menu <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="#">Action</a></li>
							<li><a href="#">Another action</a></li>
							<li><a href="#">Something else here</a></li>
							<li><a href="#">Separated link</a></li>
						</ul>
					</li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div>
	</nav>

	<div class="container">
  <div class="jumbotron">
    <h1>Hello CodeIgniter + Bootstrap</h1>
    <p>
      Consectetur unde eius ducimus esse obcaecati perferendis, ad
      veritatis quo, nostrum! Dolor consequuntur assumenda quisquam eos
      repellat Magni voluptates sed neque odio officiis? Laborum aliquid
      obcaecati eaque sint error Nam.
    </p>
    <p>
      <a class="btn btn-lg btn-primary"
        href="http://getbootstrap.com/docs/3.3/" role="button">
        Lihat Dokumentasi Bootstrap 3 &raquo;
      </a>
    </p>
  </div>
</div>

		<!-- jQuery -->
		<script src="<?php echo base_url('assets/js/jquery-3.3.1.min.js') ?>"></script>
		<!-- Bootstrap JavaScript -->
		<script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		<script src="Hello World"></script>
	</body>
</html>
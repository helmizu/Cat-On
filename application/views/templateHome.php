<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $judul ?></title>
	<link rel="shortcut icon" href="<?= base_url();?>assets/img/logo2.png" type="image/x-icon" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/style.css">
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50">
	<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="<?= base_url(); ?>"><img src="<?= base_url();?>assets/img/logo.png" width="85"></a>
			</div>
	
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-nav navbar-right">
					<?php if ($this->uri->segment(2)=='stepone') { ?>
						<li><a href="#" class="active">First</a></li>
						<li><a href="#">Second</a></li>
					<?php } elseif ($this->uri->segment(2)=='steptwo') { ?>
						<li><a href="#">First</a></li>
						<li><a href="#"  class="active">Second</a></li>
					<?php } else { ?>
					<?php if ($this->session->userdata('user')==TRUE){
						$no = 0;
  						foreach($getCart as $gc){$no++;}
						echo "
					<li>
                  		<a href='".base_url()."transaksi/cart' class='info-number'>
                    		<i class='fa fa-shopping-cart fa-2x'></i>
                    		<span class='badge bg-green'>".$no."</span>
                  		</a>
                	</li>";} else {}?>
					<li><a href="#about">About</a></li>
					<li><a href="#partner">Partners</a></li>
					<?php if ($this->session->userdata('user')==TRUE){
						echo "<li>
                  <a href='javascript:;' class='user-profile dropdown-toggle' data-toggle='dropdown' aria-expanded='false'>
                    ".$this->session->userdata('nama')."
                    <span class=' fa fa-angle-down'></span>
                  </a>
                  <ul class='dropdown-menu dropdown-usermenu pull-right'>
                    <li><a href='".base_url()."login/logout'><i class='fa fa-sign-out pull-right'></i> Log Out</a></li>
                  </ul>
                </li>";
					}
					else {
						echo "<li><a href='".base_url()."login'>Login</a></li>";
						}
					} ?>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div>
	</nav>



	<?php $this->load->view($content); ?>


	<img src="<?= base_url(); ?>assets/img/brush-bawah.png" class="img img-responsive brush">
	<div id="contact" class="container-fluid contact">
		<div class="container">
			<div class="row">
			<h2 class="text-center">Contact Us</h2>
			<div class="col-xs-12 col-sm-6 col-md-6">
				<h5><i class="fa fa-phone"></i> +62 82257575067  &thinsp;&thinsp;&thinsp;Muhammad Ilham Fajar</h5>
				<h5><i class="fa fa-phone"></i> +62 82139593342  &thinsp;&thinsp;&thinsp;Helmi Zulfikar Suprayitno</h5>
				<h5><i class="fa fa-phone"></i> +62 81249261162  &thinsp;&thinsp;&thinsp;Muhammad Amar Khabiir A</h5>
				
			</p>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-6 text-right">
				<h5>muhammad_fajar_25rpl@student.smktelkom-mlg.sch.id <i class="fa fa-envelope"></i></h5>
				<h5>helmi_supraiytno_25rpl@student.smktelkom-mlg.sch.id <i class="fa fa-envelope"></i></h5>
				<h5>muhammad_agevi_25rpl@student.smktelkom-mlg.sch.id <i class="fa fa-envelope"></i></h5>
			</p>
			</div>
			</div>

			<div class="row">
			<h2 class="text-center">Support By</h2>
			<div class="col-md-12 col-xs-12">
				<img src="<?= base_url(); ?>assets/img/ts.png" class="img-responsive center-block">
			</div>
			</div>
		</div>
	</div>
</body>
</html>
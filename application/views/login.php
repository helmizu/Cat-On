<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?= $judul ?></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/stylesign.css">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>


<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-8 kiri col-md-12 col-xs-12">
				<div class="container">
					<div class="row">
						<div class="col-lg-12" style="margin-top : 10px;">
							<a href="<?php echo base_url() ?>" class="img img-responsive logologin"><img src="<?php echo base_url()?>assets/img/logo.png" width="85px"></a>
						</div>
					</div>

						<div class="row salam">
							<div class="col-lg-8">
								<h2 class="headline">Selamat Datang</h2>
								<p class="paragraph">Catering Online untuk kemudahan bagi masyarakat. Kami menyediakan sebuah wadah untuk pengusaha catering agar lebih memperluas jangkauan usaha mereka. Kami juga memudahkan bagi pembeli agar efisiensi waktu untuk memesan catering yang diinginkan. 
							</div>
						</div>
				</div>
			</div>

			<div class="col-lg-4 kanan">
				<div class="container">
					<div class="row formSign">
						<div class="col-lg-10">
							<h2 class="signIn">Sign In</h2><br>
							<form method="post" action="<?= base_url();?>login/act_login">
							<p><input type="text" name="username" placeholder="Username"></p>
							<p><input type="password" name="password" placeholder="Password"></p>
							<p><input type="submit" name="login" class="btn btn-success float-right hijau" value="Login"></p>
							</form>
							<p><a href="<?= base_url(); ?>signup"><button class="btn btn-successku">Sign Up</button></a> </p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
</body>
</html>
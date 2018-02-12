<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>/assets/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>/assets/css/stylesign.css">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<body class="body">
	<div class="container-fluid">
			<h3 class="judul">Register</h3>
		<div class="row">
			<div class="col-md-8 offset-md-2">
				<div class="row box-form">
					<div class="col-md-2 navigator">
						<a href="javascript:SwapDivsWithClick('form1','form2')"><i class="fa fa-arrow-circle-o-up fa-3x up" aria-hidden="true"></i></a>
						<a href="javascript:SwapDivsWithClick('form1','form2')"><i class="fa fa-arrow-circle-o-down fa-3x down" aria-hidden="true"></i></a>

						<a href="javascript:SwapDivsWithClick('form1','form2')"><i class="fa fa-arrow-circle-o-right fa-3x right" aria-hidden="true"></i></a>
						<a href="javascript:SwapDivsWithClick('form1','form2')"><i class="fa fa-arrow-circle-o-left fa-3x left" aria-hidden="true"></i></a>
					</div>


					
					<div class="col-md-10 form1" id="form1">
						<h3>Customer</h3>
						<form method="post" action="<?= base_url();?>data/daftarCustomer">
						<div class="row isianForm">
							<div class="col-md-6 col-sm-6">
								<p>Nama</p>
								<p><input type="text" name="input_nama"></p>
							</div>
							<div class="col-md-6 col-sm-6">
								<p>Username</p>
								<p><input type="text" name="input_username"></p>
							</div>

							<div class="col-md-6 col-sm-6">
								<p>Password</p>
								<p><input type="password" name="input_password"></p>
							</div>
							<div class="col-md-6 col-sm-6">
								<p>Email</p>
								<p><input type="text" name="input_email"></p>
							</div>

							<div class="col-md-6 col-sm-6">
								<p>Kota</p>
								<p><input type="text" name="input_kota"></p>
							</div>
							<div class="col-md-6 col-sm-6">
								<p>Alamat</p>
								<p><input type="text" name="input_alamat"></p>
							</div>

							<div class="col-md-6 col-sm-6">
								<p>No. Telepon</p>
								<p><input type="text" name="input_nomer"></p>
							</div>

							<div class="col-md-12">
								<button type="submit" class="btn btn-success float-right ijo">Register</button>
							</div>
						
						</div>
						</form>
					</div>
					<div class="col-md-10 form2" id="form2">
						<h3>Seller</h3>
						<form method="post" action="<?= base_url();?>data/sseller">
						<div class="row isianForm">
						
							<div class="col-md-6 col-sm-6">
								<p>Nama</p>
								<p><input type="text" name="nama_seller"></p>
							</div>
							<!--<div class="col-md-6 col-sm-6">
								<p>Nama Catering</p>
								<p><input type="text" name="nama_catering"></p>
							</div>-->
							<div class="col-md-6 col-sm-6">
								<p>Username</p>
								<p><input type="text" name="username"></p>
							</div>

							<div class="col-md-6 col-sm-6">
								<p>Password</p>
								<p><input type="password" name="password"></p>
							</div>

							<div class="col-md-6 col-sm-6">
								<p>No. Telepon</p>
								<p><input type="text" name="no_telepon"></p>
							</div>
							<div class="col-md-6 col-sm-6">
								<p>Email</p>
								<p><input type="text" name="email"></p>
							</div>

							<div class="col-md-6 col-sm-6">
								<p>Kota</p>
								<p><input type="text" name="kota"></p>
							</div>
							<div class="col-md-6 col-sm-6">
								<p>Alamat</p>
								<p><input type="text" name="alamat"></p>
							</div>

							<div class="col-md-12">
								<input type="submit" type="button" class="btn btn-success float-right ijo" name="
								register" value="Register">
							</div>
						
						</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>

<script type="text/javascript">
function SwapDivsWithClick(form1,form2)
{
   d1 = document.getElementById(form1);
   d2 = document.getElementById(form2);
   if( d2.style.display == "none" )
   {
      d1.style.display = "none";
      d2.style.display = "block";
   }
   else
   {
      d1.style.display = "block";
      d2.style.display = "none";
   }
}
</script>


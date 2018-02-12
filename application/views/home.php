
	<div class="bg-view text-center">
		<h1>Catering Online</h1>
		<h2>Food & Lifestyle</h2>
	</div>
	<div class="top">
		<img src="<?php echo base_url() ?>assets/img/top.png" class="img img-responsive brushAtas">
	</div>
	<div id="about" class="container about">
		<h2>What's Cat-On?</h2>
		<div class="col-sm-6 col-md-6 col-lg-6">
			<h3>ORDER, DELIVERY, SATISFY</h3>
			<p class="p1">Cat-On atau kependekan dari Catering Online adalah sebuah layanan yang bermitra dengan banyak pemilik catering. Cat-On ini dapat mempermudah bagi pemilik catering dan pembeli. Hal ini dibuktikan dengan efisien waktu bagi pembeli untuk memesan makanan. Cat-On ini juga dapat memperkenalkan produk catering , memperluas pangsa pasar, menurunkan biaya operasioanal, dan meningkatkan customer loyality.</p>
			<p class="p2">Aplikasi ini dapat menampilkan beberapa profile dari catering yang terdaftar. Di dalam Aplikasi ini penjual dan pemilik catering dapat berinteraksi melalui email dan catatan-catatan saat memesan makanan. Pelanggan juga dapat mendapat laporan pesanan yang dikirim lewat email.</p>
			<a href="javascript:void(0)" class="btn-block text-center btnseemore slideDown">Read more</a>
		</div>
		<div class="col-sm-6 col-md-6 col-lg-6 embed-responsive embed-responsive-4by3">
			<img src="<?= base_url(); ?>assets/img/thumbnail.png" class="img img-responsive iklan" id="1">
		</div>
	</div>
	<div class="container-fluid partner" id="partner">
		<div class="container">
			<h2>Our Partners</h2>
			<div class="row restolist text-center">
				<?php 
                foreach($getToko as $gt){
                        echo "
				<div class='col-xs-6 col-sm-6 col-md-3 col-lg-3'>
				<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12' style='height:330px;'>
				<img src='".base_url()."assets/uploads/".$gt->foto_toko."' class='img-responsive center-block' style='height:200px;'>
				<h4>".$gt->nama_toko."</h4>
				<p>".$gt->alamat_toko."</p>
				<a href='".base_url()."catering/detailcat/".md5($gt->id_toko)."' class='center-block text-center btnseemore'>Open</a>
				</div>
			</div>";}?>
			</div>

			<a href="<?php echo base_url()?>catering" class="center-block text-center btnseemore">see more</a>
		</div>
	</div>
	

	<script type="text/javascript">
		$(document).ready(function() {
			$(".iklan").click(function(event) {
				var videoId = $(this).attr('id');
				$(this).replaceWith(embed(videoId));
			});
			$('.slideDown').click(function(){
				$('.p2').slideDown();
				$('.slideDown').css("opacity","0");
				$('.slideDown').css("transition","all 0.2s");
			});	
		});

		function embed(id) {
			embedCode = '<video autoplay controls class="embed-responsive-item" id="2"><source src=<?php echo base_url() ?>assets/video/FInal_1.MP4 type=video/mp4></video>';
			return embedCode;
		}
	</script>
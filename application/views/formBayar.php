<div class="bgstep">
<form method="post"	action="<?= base_url(); ?>transaksi/proses">
<div class="container-fluid payment">
		<h2 class="text-center">Pilih Metode Pembayaran</h2>
	<div class="col-md-6 col-md-offset-1">
		<div class="row">
			<div class="col-md-12 col-sm-6 wrapper ">
				<div class="row">
					<div class="col-md-6 col-sm-6 formPembayaran active" id="transfer1">
						<a href="javascript:void(0)" id="transfer"><h4 id="transfer2" class="active">Bank Transfer</h4></a>
					</div>
					<div class="col-md-6 col-sm-6 formPembayaran" id="bayar1">
						<a href="javascript:void(0)" id="bayar"><h4 id="bayar2">Bayar Di Tempat</h4></a>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 col-sm-6 isiForm">
				<input type="hidden" name="bayar" value="Bank Transfer" id="inputbayar">
				<input type="hidden" name="status" value="Pending" id="statusbayar">
				<div class="dropdown text-center center-block">
					<button class="btn btn-primary1 dropdown-toggle" type="button" data-toggle="dropdown">Pilih ATM
				    <span class="caret"></span></button>
				    <ul class="dropdown-menu dropdown-menuatm">
					    <li><a href="javascript:void(0)" id="bca">BCA</a></li>
						<li><a href="javascript:void(0)" id="mandiri">MANDIRI</a></li>
						<li><a href="javascript:void(0)" id="bni">BNI</a></li>
					</ul>
				</div>
						<input type="text" class="formAtm" id="bcaTampil" value="676 030 3133" disabled>
						<input type="text" class="formAtm" id="mandiriTampil" value="101 000 6475 733 " disabled>
						<input type="text" class="formAtm" id="bniTampil" value="4 222 5 333 9" disabled>
						<button type="submit" class="btn btn-success btn-block formProses">Proses</button>					
			</div>
		</div>

		<div class="row">
			<div class="col-md-12 col-sm-6 isiForm1">
				<input type="hidden" name="bayar" value="Bayar di Tempat" id="inputbayar1" disabled="disabled">
				<input type="hidden" name="status" value="Lunas" id="statusbayar1" disabled="disabled">
				<button type="submit" class="btn btn-primary1 center-block">Bayar Di Tempat</button>
			</div>
		</div>
		</div>
		<div class="col-md-3 col-md-pull-1 pull-right">
				<table class="table table-bordered1 table-responsive">
					<thead>
						<tr>
							<td colspan="3"><h3>Detail Transaksi</h3></td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><h4>ID Pesanan</h4></td>
							<td colspan="2"><h4><?php echo $this->session->userdata('id_pesan'); ?></h4></td>
						</tr>
						<tr>
							<td><h4>Catering</h4></td>
							<td colspan="2"><h4><?php $rincianpesan=json_decode($getPesan->rincian_pesan);
							print_r($rincianpesan[0]->nama_toko);?></h4>
							<input type="hidden" name="idseller" value="<?php print_r($rincianpesan[0]->id_seller); ?>">
							</td>

						</tr>
						<tr>
							<td><h4>Pembeli</h4></td>
							<td colspan="2"><h4><?= $getPesan->nama_pesan; ?></h4></td>
						</tr>
						<tr style="border-bottom: 2px solid #c3c3c3">
							<td><h4>Total</h4></td>
							<td colspan="2"><h4>Rp <?= $this->data->rp($getPesan->total_harga_pesan); ?></h4></td>
						</tr>
					</tbody>
				</table>
			</div>
	</div>
	</form>
</div>
	<script type="text/javascript">

	$(document).ready(function() {
		$("#bca").click(function(event) {
			$("#bcaTampil").show();
			$(".formProses").show();
			$("#mandiriTampil").hide();
			$("#bniTampil").hide();
		});

		$("#mandiri").click(function(event) {
			$("#bcaTampil").hide();
			$("#mandiriTampil").show();
			$(".formProses").show();
			$("#bniTampil").hide();
		});

		$("#bni").click(function(event) {
			$("#bcaTampil").hide();
			$("#mandiriTampil").hide();
			$(".formProses").show();
			$("#bniTampil").show();
		});

		$("#bayar").click(function(event) {
			$(".isiForm1").show();
			$("#bayar1").addClass("active");
			$("#bayar2").addClass("active");
			$("#transfer1").removeClass("active");
			$("#transfer2").removeClass("active");
			$('#inputbayar1').removeAttr('disabled', true);
			$("#inputbayar").attr('disabled', true);
			$('#statusbayar1').removeAttr('disabled', true);
			$("#statusbayar").attr('disabled', true);
			$(".isiForm").hide();
		});

		$("#transfer").click(function(event) {
			$(".isiForm").show();
			$("#transfer1").addClass("active");
			$("#transfer2").addClass("active");
			$("#bayar1").removeClass("active");
			$("#bayar2").removeClass("active");
			$("#inputbayar").removeAttr('disabled', true);
			$('#inputbayar1').attr('disabled', true);
			$("#statusbayar").removeAttr('disabled', true);
			$('#statusbayar1').attr('disabled', true);
			$(".isiForm1").hide();
		});
	});
</script>
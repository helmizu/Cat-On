<div class="bgstep">
	<div class="container cart">
		<form method="post" action="<?= base_url(); ?>data/addPesan">
		<div class="row">
			<div class="col-md-7">
				<div class="row">
					<table class="table table-responsive table-bordered1">
						<thead>
							<tr><td colspan="2"><h3>Transaksi</h3></td></tr>	
						</thead>
						<tbody>
							<tr class="form-group">
								<td>
									<label>Nama:</label>
								</td>
								<td>
									<input type="text" name="nama_pesan" class="form-control" placeholder="Masukkan Nama" value="<?= $this->session->userdata('nama'); ?>">
								</td>
    						</tr>

    						<tr class="form-group">
								<td>
									<label>Email:</label>
								</td>
								<td>
									<input type="email" name="email_pesan" class="form-control" placeholder="Masukkan email" value="<?= $this->session->userdata('email'); ?>">
								</td>
    						</tr>

    						<tr class="form-group">
								<td>
									<label>Alamat:</label>
								</td>
								<td>
									<input type="text" name="alamat_pesan" class="form-control" placeholder="Masukkan Nama" value="<?= $this->session->userdata('alamat').', '.$this->session->userdata('kota'); ?>">
								</td>
    						</tr>

    						<tr class="form-group">
								<td>
									<label>No. Telepon:</label>
								</td>
								<td>
									<input type="text" name="telepon_pesan" class="form-control" placeholder="Masukkan No.Telepon" value="<?= $this->session->userdata('no_telp'); ?>">
								</td>
    						</tr>

    						<tr class="form-group">
								<td>
									<label>Tanggal Pengiriman:</label>
								</td>
								<td>
									<input type="hidden" name="tgl_pesan" class="form-control" placeholder="Masukkan Tanggal Pemesanan" value="<?= date("Y-m-d"); ?>">
									<input type="date" name="tgl_kirim" class="form-control" placeholder="Masukkan Tanggal Pengiriman">
								</td>
    						</tr>
    						<tr>
    							<td>
                        <label for="textarea">Catatan Khusus <span class="required">*</span></label>
    							</td>
    							<td>
    								<textarea id="textarea" required="required" name="catatan" class="form-control col-md-7 col-xs-12"></textarea>
    							</td>
    						</tr>
						</tbody>
						
					</table>
				</div>
			</div>
			<div class="col-md-5">
				<table class="table table-bordered1 table-responsive">
					<thead>
						<tr>
							<td colspan="3"><h3>Rincian Pesanan</h3></td>
						</tr>
					</thead>
					<tbody>
						<?php
						$query = $getTotalCart;
  						$row = $query->row();
  						?>
						<tr style="border-bottom: 2px solid #c3c3c3">
							<td colspan="2"><h4>Total</h4></td>
							<td><h4>Rp <?= $this->data->rp($row->total); ?></h4></td>
							<input type="hidden" name="jumlah_pesan" value="<?= $row->totalqty; ?>">
							<input type="hidden" name="total_harga_pesan" value="<?= $row->total; ?>">
						</tr>
						<tr>
							<td><h4>Makanan</h4></td>
							<td><h4>Kuantitas</h4></td>
							<td><h4>Harga</h4></td>
						</tr>
						<?php 
  						foreach($getCart as $gc){ ?>
						<tr>
							<td><?= $gc->nama_menu; ?></td>
							<td><?= $gc->qty;?></td>
							<td>Rp <?= $this->data->rp($gc->harga_menu); ?></td>
						</tr>
						<?php }
						$rincianpesanan = json_encode($getCart); ?>
						<input type="hidden" name="rincian_pesan" value='<?php print_r($rincianpesanan) ?>'>
						
					</tbody>
				</table>
				<input type="submit" value="Bayar" class="btn btn-success btn-block" width="100%">
			</div>
		</div>
		</form>
	</div>
</div>
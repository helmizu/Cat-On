<div class="container-fluid cart bgstep">
    <div class="col-md-10 col-md-offset-1">
		<div class="row pc">
			<?php
			$query = $getTotalCart;
  			$row = $query->row();
  			?>
			<div class="col-md-2">
				<h4><?=$row->nama_toko?></h4>
			</div>
			<div class="col-md-8">
				<table class="table table-stripped table-responsive">
					<thead>
						<tr>
							<th>Nama Paket</th>
							<th>@Harga</th>
							<th>Qty</th>
							<th>Sub Total</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
					<?php 
  						$no = 1;
  						foreach($getCart as $gc){ ?>
						<tr>
							<td><?= $gc->nama_menu ?></td>
							<td>Rp <?= $this->data->rp($gc->harga_menu) ?></td>
							<td>
							<form id='form_cart<?=$gc->id_cart?>' action='<?= base_url()."data/ucart/".$gc->id_cart;?>' method='post'>
								<input type='hidden' name='toko' value="<?= $gc->id_toko ?>">
								<input type='hidden' name='menu' value="<?= $gc->id_menu ?>">
								<input type='hidden' name='user' value="<?= $this->session->userdata('id') ?>">
								<input type='hidden' name='sub_total' value="<?= $gc->harga_menu ?>">
								 <div class="input-group input-group-cart">
                                    <span class="input-group-btn">
                                        <button type="button" class="quantity-left-minus btn btn-danger btn-number" id="quantity-left-minus<?=$gc->id_cart?>"  data-type="minus" data-field="">
                                          <span class="glyphicon glyphicon-minus"></span>
                                        </button>
                                    </span>
                                    <input type="number" id="quantity<?=$gc->id_cart?>" name="jumlah" class="form-control input-number" value="<?= $gc->qty;?>" min="1" max="100" readonly>
                                    <span class="input-group-btn">
                                        <button type="button" class="quantity-right-plus btn btn-success btn-number" id="quantity-right-plus<?=$gc->id_cart?>" data-type="plus" data-field="">
                                            <span class="glyphicon glyphicon-plus"></span>
                                        </button>
                                    </span>
                                </div>
                            </form>
                                <script type="text/javascript">
	$(document).ready(function(){

	var quantitiy=0;
   $('#quantity-right-plus<?=$gc->id_cart?>').click(function(e){
        
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var quantity = parseInt($('#quantity<?=$gc->id_cart?>').val());
        var harga = parseInt('<?= $gc->harga_menu; ?>');
        var subTotal = parseInt('<?= $gc->sub_total; ?>');
        var changeSubTotal = harga*(quantity+1);
        var totalQty = parseInt($('#totqty').html());
        var totalHarga = parseInt($('#totharga').html());
        // If is not undefined
            
            $('#quantity<?=$gc->id_cart?>').val(quantity + 1);
            $.ajax({  
            		url:"<?= base_url();?>data/ucart/<?= $gc->id_cart?>",
            		type:"POST",
            		data:$('#form_cart<?=$gc->id_cart?>').serialize(),
            		cache: false,
					beforeSend:function(){
            		 
           			},
            		success:function(data)  
            		{  
            		}  
       			});
            // Increment

            $("#sub_total<?=$gc->id_cart?>").html("Rp " + changeSubTotal);
			$("#totqty").html(totalQty + 1);
			$("#totharga").html(totalHarga + harga);
        
    });

     $('#quantity-left-minus<?=$gc->id_cart?>').click(function(e){
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var quantity = parseInt($('#quantity<?=$gc->id_cart?>').val());
        var harga = parseInt('<?= $gc->harga_menu; ?>');
        var subTotal = parseInt('<?= $gc->sub_total; ?>');
        var changeSubTotal = harga*(quantity-1);
        var totalQty = parseInt($('#totqty').html());
        var totalHarga = parseInt($('#totharga').html());	
        // If is not undefined
      
            // Increment
            if(quantity>0){
            $('#quantity<?=$gc->id_cart?>').val(quantity - 1);
            $("#sub_total<?=$gc->id_cart?>").html("Rp " + changeSubTotal)
			$("#totqty").html(totalQty - 1);
			$("#totharga").html(totalHarga - harga);
            }
            $.ajax({  
            		url:"<?= base_url();?>data/ucart/<?= $gc->id_cart?>",
            		type:"POST",
            		data:$('#form_cart<?=$gc->id_cart?>').serialize(),
            		cache: false,
					beforeSend:function(){
            		 
           			},
            		success:function(data)  
            		{  
            		}  
       			});

            

    		});
		});
				</script>
							</td>
							<td id="sub_total<?=$gc->id_cart?>">Rp <?= $this->data->rp($gc->sub_total) ?></td>
							<td><a href="<?= base_url(); ?>data/dcart/<?= md5($gc->id_cart); ?>"><i class="fa fa-trash fa-2x" aria-hidden="true"></i></a></td>
						</tr>
						<?php } ?>
					</tbody>
				</table>

			</div>

			<div class="col-md-2">
				<h4>Rincian Pembelian</h4>
				<table class="table table-responsive">
					<tr>
						<td>Total Qty</td>
						<td id="totqty"><?= $row->totalqty; ?></td>
					</tr>
					<tr>
						<td>Total Harga</td>
						<td id="totharga"><?= $row->total; ?></td>
					</tr>
					<tr>
						<td colspan="2"><a href="<?= base_url(); ?>transaksi/stepone/" class="btn btn-success btn-block">Lanjutkan</button></td>
					</tr>
				</table>
			</div>
		</div>
		<a href="javascript:history.back()" style="width: 100px;" class="btn btn-info center-block">Go Back</a>
	</div>
</div>
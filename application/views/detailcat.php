	<?php 
      	$no = 1;
      	foreach($getToko as $gt){
      	  echo "<div class='detailresto text-center text-capitalize' id='partner'>
		<h1>".$gt->nama_toko."</h1>
		<h4 class='space'>".$gt->alamat_toko."</h4>
		<h4>".$gt->no_telepon."</h4>
	</div>";
      	}
    ?>
	
	<div class="text-center detailcat" id="partner">
		<div class="row center-block text-center">
    	<div class="container">
    		<div class="row isi">
    		<?php 
                      foreach($getMenu as $gm){
                      	$querycart = $this->db->select('*')
                          ->where('id_menu', $gm->id_menu)
                          ->where('id_toko', $gm->id_toko)
                          ->where('id_user', $this->session->userdata('id'))
                          ->limit(1)
                          ->get('cart');
                          $row = $querycart->row();
                        echo "
			<div class='col-md-3' id='".md5($gm->id_menu)."'>
    					<div class='col-md-12 menu'>
    						<div class='row'>
				    			<div class='col-md-10 col-md-offset-1'>
				    				<img src='".base_url()."assets/uploads/".$gm->foto_menu."' style='height:200px;' class='img img-responsive center-block' >
				    			</div>
				    		</div>
				    		<h4>".$gm->nama_menu."</h4>
				    		<h5> Rp ".$this->data->rp($gm->harga_menu)."</h5>";
                if (!$this->session->userdata('user') == TRUE)
                { 
                    echo "<a href='".base_url()."login'class='btn btn-success1 center-block text-center'>Add to Cart</a>";
                }
                else{
				    		if ($querycart->num_rows() == 1)
							{
								echo "<form id='form_cart".$row->id_cart."' action='".base_url()."data/ucart/".$row->id_cart."' method='post'>";
							} else 
							{
								echo "<form action='".base_url()."data/acart' method='post'>";
							}
							echo "<input type='hidden' name='toko' value=".$gm->id_toko.">
							<input type='hidden' name='menu' value=".$gm->id_menu.">
							<input type='hidden' name='user' value=".$this->session->userdata('id').">
							<input type='hidden' name='sub_total' value=".$gm->harga_menu.">
							";	
			                 if ($querycart->num_rows() == 1)
								{
									echo "<label for='qty'>QTY : </label>";?>
  									<div class="input-group input-group-cart buttonGrup">
                    			           	    <span class="input-group-btn">
                                        <button type="button" class="quantity-left-minus btn btn-danger1 btn-number" id="quantity-left-minus<?=$row->id_cart?>"  data-type="minus" data-field="">
                    			                      <span class="glyphicon glyphicon-minus"></span>
                    			                    </button>
                    			                </span>
                    			                <input type="number" id="quantity<?=$row->id_cart?>" name="jumlah" class="form-control input-number" value="<?= $row->qty;?>" min="1" max="100" readonly>
                                    			<span class="input-group-btn">
                    			                    <button type="button" class="quantity-right-plus btn btn-success1 btn-number" id="quantity-right-plus<?=$row->id_cart?>" data-type="plus" data-field="">
                                            	<span class="glyphicon glyphicon-plus"></span>
                    			                    </button>
                    			                </span>
                    			            </div>
                    			            <?php 
								} else 
								{
									echo "<input type='hidden' name='jumlah' value='1'>
									<input type='submit' value='Add to Cart' class='btn btn-success1 center-block text-center'>";
								}
					echo "</form><br>"; }
				echo "</div>
			</div>";
			?>
			<script type="text/javascript">
	$(document).ready(function(){

	var quantitiy=0;
   $('#quantity-right-plus<?=$row->id_cart?>').click(function(e){
        
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var quantity = parseInt($('#quantity<?=$row->id_cart?>').val());
        
        // If is not undefined
            
            $('#quantity<?=$row->id_cart?>').val(quantity + 1);
            $.ajax({  
            		url:"<?= base_url();?>data/ucart/<?= $row->id_cart?>",
            		type:"POST",
            		data:$('#form_cart<?=$row->id_cart?>').serialize(),
            		cache: false,
					beforeSend:function(){
            		 $(".loading").html("Please wait....");
           			},
            		success:function(data)  
            		{  
					 
            		}  
       			});
            // Increment
        
    });

     $('#quantity-left-minus<?=$row->id_cart?>').click(function(e){
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var quantity = parseInt($('#quantity<?=$row->id_cart?>').val());
        
        // If is not undefined
      
            // Increment
            if(quantity>0){
            $('#quantity<?=$row->id_cart?>').val(quantity - 1);
            }
            $.ajax({  
            		url:"<?= base_url();?>data/ucart/<?= $row->id_cart?>",
            		type:"POST",
            		data:$('#form_cart<?=$row->id_cart?>').serialize(),
            		cache: false,
					beforeSend:function(){
            		 $(".loading").html("Please wait....");
           			},
            		success:function(data)  
            		{  
					 
            		}  
       			});
            
    		});
		});
				</script>

			<?php }?>
		</div>
    <a href="<?= base_url();?>transaksi/cart" class="btn btn-success2">Order</a>
	</div>
	</div>
	
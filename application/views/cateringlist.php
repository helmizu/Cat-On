	<div class="restaurant text-center" id="partner">
    	<div class="container-fluid restolist">
    		<?php 
                      foreach($getToko as $gt){
                        echo "
			<div class='col-xs-6 col-sm-6 col-md-3 col-lg-3'>
				<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12' style='height: 400px;'>
				<img src='".base_url()."assets/uploads/".$gt->foto_toko."' class='img-responsive center-block' style='height:250px;'>
				<h4>".$gt->nama_toko."</h4>
				<p>".$gt->alamat_toko."</p>
				<a href='".base_url()."catering/detailcat/".md5($gt->id_toko)."' class='center-block text-center btnseemore'>OPEN </a>
				</div>
			</div>";}?>
		</div>
	</div>
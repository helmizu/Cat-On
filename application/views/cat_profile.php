<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Catering <small>Information About Your Catering</small></h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  
                </div>
              </div>
            </div>

            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2> Profil Toko <small>Information</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  
                  <div class="x_content">
                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                      <div class="profile_img">
                        <div id="crop-avatar">
                          <!-- Current avatar -->
                          <img class="img-responsive avatar-view" src="<?= base_url();?>assets/uploads/<?= $this->session->userdata('foto_toko');?>" alt="Avatar" title="Change the avatar">
                        </div>
                      </div> 
                      <br />
                    </div>
                    <?php 
                      $no = 1;
                      foreach($getToko as $gt){
                        echo '
                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                      <h3> '.$gt->nama_toko.' </h3>

                      <ul class="list-unstyled user_data text-capitalize">
                        <li><i class="fa fa-map-marker user-profile-icon"></i> '.$gt->alamat_toko.'
                        </li>

                        <li>
                          <i class="fa fa-briefcase user-profile-icon"></i> '.$gt->status_toko.'
                        </li>

                        <li class="m-top-xs">
                          <i class="fa fa-file user-profile-icon"></i> '.$gt->deskripsi_toko.'
                          </li>
                      </ul>
                    </div>'; } ?>
                    <div class="col-md-4 col-sm-4 col-xs-12 profile_left">
                      <h3>Owner</h3>

                      <ul class="list-unstyled user_data text-capitalize">
                        <li><h4><i class="fa fa-user user-profile-icon"></i> <?= $this->session->userdata('nama');?></h4>
                        </li>
                        <li><i class="fa fa-map-marker user-profile-icon"></i> <?= $this->session->userdata('alamat').", ".$this->session->userdata('kota');?>
                        </li>
                        <li">
                          <i class="fa fa-briefcase user-profile-icon"> </i> <?= $this->session->userdata('role');?>
                        </li>

                        <li class="m-top-xs">
                          <i class="fa fa-envelope user-profile-icon"></i>
                          <a href="http://www.kimlabs.com/profile/" target="_blank" class="text-lowercase"> <?= $this->session->userdata('email');?></a>
                        </li>
                        <li class="m-top-xs">
                          <i class="fa fa-phone user-profile-icon"></i>
                          <a href="http://www.kimlabs.com/profile/" target="_blank"> <?= $this->session->userdata('no_telp');?></a>
                        </li>
                      </ul>

                    </div>
                    <div class="col-md-2 col-sm-2 col-xs-12 profile_left">
                      <a class="btn btn-success center-block text-center"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a>
                      </div> 
                      <br />
                    </div>
                  </div>

              
            </div>
          </div>
        </div>
        <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Daftar Menu Makanan<small>Foodlist</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a href="<?= base_url() ?>seller/addMenu" style="color: #2a3f54;">Tambahkan</a></li>
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
          
  <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
  <thead>
  <tr>
        <th>No</th>
        <th>Food name</th>
        <th>Image</th>
        <th>Harga</th>
        <th>Status</th>
        <th>Action</th>
  </tr>
  </thead>
  <tbody class="">
  <?php 
  $no = 1;
  foreach($getMenu as $gm){
    echo '
  <tr>
    <td>'.$no++.'</td>
    <td>'.$gm->nama_menu.'</td>
    <td>'.$gm->foto_menu .'</td>
    <td>'.$gm->harga_menu.'</td>
    <td>'.$gm->status_menu .'</td>
    <td> <a href="'.base_url().'data/dmenu/'.md5($gm->id_menu).'"><i class="fa fa-trash"></i> Delete </a></td>
  </tr>';}
  ?>
                      </tbody>
                    </table>
          
          
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
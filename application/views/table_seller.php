<!-- page content -->
        <div class="" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Sellers</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  
                </div>
              </div>
            </div>
            
            <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Seller</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                      Seller with Catering data filled
                    </p>
          
                   <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Kota</th>
                          <th>Alamat</th>
                          <th>Email</th>
                          <th>No. Telepon</th>
                          <th>Username</th>
                          <th>Passowrd</th>
                          <th>Action</th>

                          
                        </tr>
                      </thead>

                      <tbody>
                      <?php  
                        foreach ($isi as $isiSeller) { 
                      ?>                  
                          <tr>
                            <td><?php echo $isiSeller->nama_seller ?></td>
                            <td><?php echo $isiSeller->kota ?></td>
                            <td><?php echo $isiSeller->alamat ?></td>
                            <td><?php echo $isiSeller->email ?></td>
                            <td><?php echo $isiSeller->no_telepon ?></td>
                            <td><?php echo $isiSeller->username ?></td>
                            <td><?php echo $isiSeller->password ?></td>
                            <td>
                              <a href="<?php echo base_url("admin/hapus/");echo $isiSeller->id_seller?>"><i class="fa fa-trash"></i></a> &nbsp;
                            <?php if ($isiSeller->status_toko == 'aktif') {
                              # code...
                            } else { ?>
                              | &nbsp; <a href="<?= base_url();?>admin/validasi/<?= md5($isiSeller->id_toko);?>" title=""><i class="fa fa-check"></i></a>
                            <?php } ?>
                            </td>
                            
                          </tr>
                      <?php } ?>

                        
                      </tbody>
                    </table>
          
          
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>All Seller</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                      All Seller Registered
                    </p>
          
                   <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Kota</th>
                          <th>Alamat</th>
                          <th>Email</th>
                          <th>No. Telepon</th>
                          <th>Username</th>
                          <th>Passowrd</th>
                          <th>Action</th>

                          
                        </tr>
                      </thead>

                      <tbody>
                      <?php  
                        foreach ($isi1 as $isiSeller) { 
                      ?>                  
                          <tr>
                            <td><?php echo $isiSeller->nama_seller ?></td>
                            <td><?php echo $isiSeller->kota ?></td>
                            <td><?php echo $isiSeller->alamat ?></td>
                            <td><?php echo $isiSeller->email ?></td>
                            <td><?php echo $isiSeller->no_telepon ?></td>
                            <td><?php echo $isiSeller->username ?></td>
                            <td><?php echo $isiSeller->password ?></td>
                            <td>
                              <a href="<?php echo base_url("admin/hapus/");echo $isiSeller->id_seller?>"><i class="fa fa-trash"></i></a>
                            </td>
                            
                          </tr>
                      <?php } ?>

                        
                      </tbody>
                    </table>
          
          
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
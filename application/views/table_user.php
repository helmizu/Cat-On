<!-- page content -->
        <div class="" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Users</h3>
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
                    <h2>Costumers</h2>
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
                      Costumer registered
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
                        foreach ($isi as $isiUser) { 
                      ?>                  
                          <tr>
                            <td><?php echo $isiUser->nama_user ?></td>
                            <td><?php echo $isiUser->kota ?></td>
                            <td><?php echo $isiUser->alamat ?></td>
                            <td><?php echo $isiUser->email ?></td>
                            <td><?php echo $isiUser->no_telepon ?></td>
                            <td><?php echo $isiUser->username ?></td>
                            <td><?php echo $isiUser->password ?></td>
                            <td><a href="<?php echo base_url("admin/hapus/");echo $isiUser->id_user?>"><i class="fa fa-trash"></a></td>
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
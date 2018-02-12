<!-- page content -->
        <div class="right_col" role="main">
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
                      Responsive is an extension for DataTables that resolves that problem by optimising the table's layout for different screen sizes through the dynamic insertion and removal of columns from the table.
                    </p>
          
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Address</th>
                          <th>Id Pesan</th>
                          <th>Order Date</th>
                          <th>Send Date</th>
                          <th>Quantity</th>
                          <th>Total</th>
                          <th>Action</th>
                          <th>E-mail</th>
                          <th>Phone Number</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($getCustomer as $gCus) { ?>
                        <tr>
                          <td><?= $gCus->nama_pesan; ?></td>
                          <td><?= $gCus->alamat_pesan; ?></td>
                          <td><?= $gCus->id_pesan; ?></td>
                          <td><?= $gCus->tgl_pesan; ?></td>
                          <td><?= $gCus->tgl_kirim; ?></td>
                          <td><?= $gCus->jumlah_pesan; ?></td>
                          <td><?= $gCus->total_harga_pesan; ?></td>
                          <td>
                              
                            <?php if ($gCus->status_transaksi == 'Lunas' || $gCus->status_transaksi == 'Terkonfirmasi' || $gCus->status_transaksi == 'Tertolak') { ?>
                              <a href="<?php echo base_url("seller/delete/");echo $gCus->id_pesan?>"><i class="fa fa-trash"></i></a>
                            <?php } else { ?>
                              <a href="<?= base_url();?>seller/cancel/<?= $gCus->id_pesan;?>"><i class="fa fa-times"></i></a> &nbsp; | &nbsp; 
                              <a href="<?= base_url();?>seller/konfirmasi/<?= $gCus->id_pesan;?>"><i class="fa fa-check"></i></a>
                            <?php } ?>
                            </td>
                          <td><?= $gCus->email_pesan; ?></td>
                          <td><?= $gCus->telepon_pesan; ?></td>
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
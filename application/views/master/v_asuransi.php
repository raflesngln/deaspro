<section class="main-content">
    <div class="container">
        <div class="page-content">
            <div class="header">
                <h2><strong>List</strong>Asuransi</h2>
                <div class="breadcrumb-wrapper">
                  <ol class="breadcrumb">
                    <li><a href="#">Home</a>
                    </li>
                    <li class="active"> List Asuransi</li>
                  </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 portlets ui-sortable">
                    <div class="panel">
                        <!--<div class="panel-header"></div>-->
                        
                                    <div class="form-group">
                                        <div class="table-responsive">
                                        <table class="table table-striped">
                                              <thead>
                                                <tr>
                                                  <th colspan="2"> <div align="left"><a class="btn-addnew" href="#modaladd" data-toggle="modal" title="Add"><i class="icon-plus icons"></i>Add New</a></div></th>
                                                  <th>&nbsp;</th>
                                                  <th>&nbsp;</th>
                                                  <th class="text-center">&nbsp;</th>
                                                </tr>
                                                <tr>
                                                  <th>No.</th>
                                                  <th>Company Name</th>
                                                  <th>Email</th>
                                                  <th>Phone</th>
                                                  <th class="text-center">Action</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                      <?php
  $no=1;
  foreach($data_asuransi as $row){
  ?>
                                                <tr class="gradeX">
                                                    <th scope="row"><?php echo $no;?></th>
                                                    <td><?php echo $row->nm_asuransi;?></td>
                                                    <td><?php echo $row->username;?></td>
                                                    <td><?php echo $row->telp_asuransi;?></td>
                                                    <td class="text-center">
                                                    <a class="btn-action" href="#modaledit<?php echo $row->id_asuransi?>" data-toggle="modal" title="Edit"><i class="icon-note icons"></i></a>
                                                    <a class="btn-action" href="<?php echo base_url();?>c_master/hapus_asuransi/<?php echo $row->id_asuransi;?>" onclick="return confirm('Yakin Hapus  Akun ?');" title="Delete"><i class="icon-trash icons"></i></a>          
                                                    </td>
                                                </tr>                                
                                                <?php $no++; } ;?>
                                              </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </form>
              </div>
          </div>
      </div>
  </div>
            </div>
        </div>
    </div>
</section>
<!-----edit data------->
<?php

    foreach($det_asuransi as $row){
        ?>
<div id="modaledit<?php echo $row->id_asuransi;?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Edit Data Asuransi</h3>
            </div>
            <div class="smart-form">
                <form method="post" action="<?php echo base_url()?>c_master/update_asuransi">
                    <div class="modal-body">
                      <div class="form-group">
                        <label class="col-sm-3 control-label"> Name</label>
                        <div class="col-sm-9">
                            <input name="nama" type="text" placeholder="account name" class="form-control" id="nama" value="<?php echo $row->nm_asuransi;?>" />
                          <input type="hidden" name="idasuransi" id="idasuransi" value="<?php echo $row->id_asuransi;?>" />
                        </div>
                        <div class="clearfix"></div>
                      </div>
                      
  <div class="form-group">
                        <label class="col-sm-3 control-label">Username</label>
    <div class="col-sm-9">
                            <input name="usernm" type="text" placeholder="account name" class="form-control" id="usernm" value="<?php echo $row->username;?>" />
              </div>
                        <div class="clearfix"></div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Phone</label>
                        <div class="col-sm-9">
                            <input name="telp" type="text" placeholder="account name" class="form-control" id="telp" value="<?php echo $row->telp_asuransi;?>" />
                        </div>
                        <div class="clearfix"></div>
                      </div>
  <div class="form-group">
                        <label class="col-sm-3 control-label">Address</label>
    <div class="col-sm-9">
                            <input name="alamat" type="text" placeholder="account name" class="form-control" id="alamat" value="<?php echo $row->almt_asuransi;?>" />
              </div>
                        <div class="clearfix"></div>
                      </div>                    
                      <div class="modal-footer">
                        <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true"><i class="icon-close icons">&nbsp;</i> Close</button>
                        <button class="btn btn-primary"><i class="icon-check icons">&nbsp;</i> Save</button>
                    </div>
                    </div>
            
                </form>
            </div>
        </div>
    </div>
    </div>
<?php } ?>

<div id="modaladd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Tambah  Asuransi</h3>
            </div>
            <?php echo isset($message)? $message:'';?>
            <div class="smart-form">
                <form method="post" action="<?php echo base_url()?>c_master/simpan_asuransi">
                    <div class="modal-body">
                      <div class="form-group">
                        <label class="col-sm-3 control-label">  Name</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="nama" type="text" class="form-control" placeholder="Company name" id="nama" />
                        </span></div>
                        <div class="clearfix"></div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Username</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="usernm" type="text" class="form-control" placeholder="Email" id="usernm" />
                        </span></div>
                        <div class="clearfix"></div>
                      </div>
       <div class="form-group">
                        <label class="col-sm-3 control-label">Password</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="pass" type="text" class="form-control" placeholder="Phone" id="pass" />
              </span></div>
                        <div class="clearfix"></div>
                      </div>
  <div class="form-group">
                        <label class="col-sm-3 control-label">Telp</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="telp" type="text" class="form-control" placeholder="Phone" id="telp" />
              </span></div>
                        <div class="clearfix"></div>
                      </div>
    <div class="form-group">
                        <label class="col-sm-3 control-label">Alamat</label>
                        <div class="col-sm-9"><span class="controls">
                          <textarea name="alamat" class="form-control" id="alamat" placeholder="Address"></textarea>
              </span></div>
                        <div class="clearfix"></div>
                      </div>
                      <div class="modal-footer">
                        <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true"><i class="icon-close icons">&nbsp;</i> Close</button>
                        <button class="btn btn-primary"><i class="icon-check icons">&nbsp;</i> Save</button>
                    </div>
                    </div>
            
                </form>
            </div>
        </div>
    </div>
    </div>
<section class="main-content">
    <div class="container">
        <div class="page-content">
            <div class="header">
                <h2><strong>List</strong>Pegawai</h2>
                <div class="breadcrumb-wrapper">
                  <ol class="breadcrumb">
                    <li><a href="#">Home</a>
                    </li>
                    <li class="active"> List Pegawai</li>
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
                                                  <th>&nbsp;</th>
                                                  <th class="text-center">&nbsp;</th>
                                                </tr>
                                                <tr>
                                                  <th>No.</th>
                                                  <th> Nama</th>
                                                  <th>Telp</th>
                                                  <th>Email</th>
                                                  <th>Level</th>
                                                  <th class="text-center">Action</th>
                                                </tr>
                                              </thead>
                                              <tbody>
  <?php
  $no=1;
  foreach($pegawai as $row){
  ?>
                                                <tr class="gradeX">
                                                    <th scope="row"><?php echo $no;?></th>
                                                    <td><?php echo $row->nm_pegawai;?></td>
                                                    <td><?php echo $row->telp_pegawai;?></td>
                                                    <td><?php echo $row->email_pegawai;?></td>
                                                    <td><?php echo $row->level;?></td>
                                                    <td class="text-center">
                                                    <a class="btn-action" href="#modaledit<?php echo $row->id_pegawai?>" data-toggle="modal" title="Edit"><i class="icon-note icons"></i></a>
                                                    <a class="btn-action" href="<?php echo base_url();?>c_master/hapus_pegawai/<?php echo $row->id_pegawai;?>" onclick="return confirm('Yakin Hapus  Akun ?');" title="Delete"><i class="icon-trash icons"></i></a>          
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

    foreach($pegawai as $row){
        ?>
<div id="modaledit<?php echo $row->id_pegawai;?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Edit Data Pegawai</h3>
            </div>
            <div class="smart-form">
                <form method="post" action="<?php echo base_url()?>c_master/update_pegawai">
                    <div class="modal-body">
                      <div class="form-group">
                        
                        <div class="col-sm-9">
                            
                          <input type="hidden" name="idpegawai" id="idpegawai" value="<?php echo $row->id_pegawai;?>" />
                        </div>
                        <div class="clearfix"></div>
                      </div>
                      
  <div class="form-group">
                        <label class="col-sm-3 control-label">Name</label>
    <div class="col-sm-9">
                            <input name="nama" type="text" class="form-control" id="nama" value="<?php echo $row->nm_pegawai;?>" />
              </div>
                        <div class="clearfix"></div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Username</label>
                        <div class="col-sm-9">
                            <input name="usernm" type="text" class="form-control" id="usernm" value="<?php echo $row->username;?>" />
                        </div>
                        <div class="clearfix"></div>
                      </div>

 <div class="form-group">
                        <label class="col-sm-3 control-label">Telp</label>
                        <div class="col-sm-9">
                            <input name="telp" type="text"  class="form-control" id="telp" value="<?php echo $row->telp_pegawai;?>" />
                        </div>
                        <div class="clearfix"></div>
                      </div>
<div class="form-group">
                        <label class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-9">
                            <input name="email" type="text" placeholder="account name" class="form-control" id="email" value="<?php echo $row->email_pegawai;?>" />
                        </div>
                        <div class="clearfix"></div>
                      </div>
<div class="form-group">
                        <label class="col-sm-3 control-label">Alamat</label>
                        <div class="col-sm-9">
                          <textarea name="alamat" class="form-control" id="alamat"><?php echo $row->almt_pegawai;?></textarea>
                        </div>
                        <div class="clearfix"></div>
                      </div>
<div class="form-group">
                        <label class="col-sm-3 control-label">Level</label>
    <div class="col-sm-9">
      <select name="level" id="level" required="required" class="form-control">
        <option>Pilih Level</option>
      <option value="manager">Manager</option>
      <option value="surveyor">Surveyor</option>
      <option value="admin">Admin</option>

    </select></div>
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
                <h3 id="myModalLabel">Tambah Data Pegawai</h3>
            </div>
            <div class="smart-form">
                <form method="post" action="<?php echo base_url()?>c_master/simpan_pegawai">
                    <div class="modal-body">
                      <div class="form-group">
                        <label class="col-sm-3 control-label"> ID</label>
                        <div class="col-sm-9">
                            <input name="id" type="text" class="form-control" id="id" value="<?php echo $kodepg;?>" />
                        </div>
                        <div class="clearfix"></div>
                      </div>
                      
  <div class="form-group">
                        <label class="col-sm-3 control-label">Name</label>
    <div class="col-sm-9">
                            <input name="nama" type="text" placeholder="account name" class="form-control" id="nama" value="<?php echo $this->input->post('nama');?>" />
              </div>
                        <div class="clearfix"></div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Username</label>
                        <div class="col-sm-9">
                            <input name="usernm" type="text" placeholder="username" class="form-control" id="usernm" value="<?php echo $this->input->post('usernm');?>" />
                        </div>
                        <div class="clearfix"></div>
                      </div>
  <div class="form-group">
                        <label class="col-sm-3 control-label">Password</label>
                        <div class="col-sm-9">
                            <input name="pass" type="text" placeholder="password" class="form-control" id="pass" value="<?php echo $this->input->post('pass');?>" />
                        </div>
                        <div class="clearfix"></div>
                      </div>
 <div class="form-group">
                        <label class="col-sm-3 control-label">Telp</label>
                        <div class="col-sm-9">
                            <input name="telp" type="text" placeholder="Telp" class="form-control" id="telp" value="<?php echo $this->input->post('telp');?>" />
                        </div>
                        <div class="clearfix"></div>
                      </div>
<div class="form-group">
                        <label class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-9">
                            <input name="email" type="text" placeholder="email" class="form-control" id="email" value="<?php echo $this->input->post('email');?>" />
                        </div>
                        <div class="clearfix"></div>
                      </div>
<div class="form-group">
                        <label class="col-sm-3 control-label">Alamat</label>
                        <div class="col-sm-9">
                          <textarea name="alamat" class="form-control" id="alamat" placeholder="alamat"></textarea>
                        </div>
                        <div class="clearfix"></div>
                      </div>
<div class="form-group">
                        <label class="col-sm-3 control-label">Level</label>
    <div class="col-sm-9">
      <select name="level" id="level" required="required" class="form-control">
        <option>Pilih Level</option>
      <option value="manager">Manager</option>
      <option value="surveyor">Surveyor</option>
      <option value="admin">Admin</option>

    </select></div>
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
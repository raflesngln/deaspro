<section class="main-content">
    <div class="container">
        <div class="page-content">
            <div class="header">
                <h2><strong>List</strong>Akun</h2>
                <div class="breadcrumb-wrapper">
                  <ol class="breadcrumb">
                    <li><a href="#">Home</a>
                    </li>
                    <li class="active"> List Akun</li>
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
                                                  <th class="text-center">&nbsp;</th>
                                                </tr>
                                                <tr>
                                                  <th>No.</th>
                                                  <th> Nama Akun</th>
                                                  <th>Detail</th>
                                                  <th class="text-center">Action</th>
                                                </tr>
                                              </thead>
                                              <tbody>
             <?php 
$no=1;
			foreach($akun as $data){
				
			?>
                                                <tr class="gradeX">
                                                    <th scope="row"><?php echo $no;?></th>
                                                    <td><?php echo $data->nm_akun?></td>
                                                    <td><?php echo $data->detail?></td>
                                                    <td class="text-center">
                                                    <a class="btn-action" href="#modaledit<?php echo $data->id_parent?>" data-toggle="modal" title="Edit"><i class="icon-note icons"></i></a>
                                                    <a class="btn-action" href="<?php echo base_url();?>jurnal/delete_account/<?php echo $data->id_parent?>" onclick="return confirm('Yakin Hapus  Akun ?');" title="Delete"><i class="icon-trash icons"></i></a>          
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

    foreach($akun as $row){
        ?>
<div id="modaledit<?php echo $row->id_parent;?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Edit Data Akun</h3>
            </div>
            <div class="smart-form">
                <form method="post" action="<?php echo site_url('jurnal/update_akun')?>">
                    <div class="modal-body">
                      <div class="form-group">
                        <label class="col-sm-3 control-label"> Tipe Akun</label>                       
<div class="col-sm-9"><span class="controls">
<select id="id_parent2" tabindex="5" class="form-control" chzn" name="id_parent2" data-placeholder="Account type" required="required">
                            <option></option>
                            <?php
                            if(isset($dt)){
                                foreach($dt as $dta){
                                    ?>
                            <option value="<?php echo $dta->id_parent?>"><?php echo $dta->nm_akun?></option>
                            <?php
                                }
                            }
                            ?>
                          </select>
                        </span><span class="controls">
                        <input type="hidden" name="idsubparent" id="idsubparent" value="<?php echo $row->id_parent;?>" />
                        </span></div>
                        <div class="clearfix"></div>
                      </div>
                      
  <div class="form-group">
                        <label class="col-sm-3 control-label">Nama Akun</label>
    <div class="col-sm-9"><span class="controls">
      <input name="nm_akun" type="text" placeholder="account name" id="nm_akun" value="<?php echo $row->nm_akun;?>" class="form-control">
    </span></div>
                        <div class="clearfix"></div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Detail</label>
                        <div class="col-sm-9"><span class="controls">
                        <textarea name="detail2"  id="detail2" class="form-control"><?php echo $row->detail;?></textarea>
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
<?php } ?>

<div id="modaladd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Tambah Akun </h3>
            </div>
            <?php echo isset($message)? $message:'';?>
            <div class="smart-form">
                <form method="post" action="<?php echo site_url('jurnal/tambah_akun')?>">
                    <div class="modal-body">
                      <div class="form-group">
                        <label class="col-sm-3 control-label"> Tipe Akun</label>
                        <div class="col-sm-9"><span class="controls">
                        <select id="id_parent2" tabindex="5" class="form-control" chzn-select" name="id_parent2" data-placeholder="Account type">
                            <option value=""></option>
                            <?php
                            if(isset($dt)){
                                foreach($dt as $row){
                                    ?>
                            <option value="<?php echo $row->id_parent?>"><?php echo $row->nm_akun?></option>
                            <?php
                                }
                            }
                            ?>
                          </select>
                        </span><span class="controls">
                        <input type="hidden" name="kodejurnal" id="kodejurnal" value="<?php echo $kodejurnal?>" />
                        </span></div>
                        <div class="clearfix"></div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Nama akun</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="nm_akun" type="text" placeholder="account name" id="nm_akun" class="form-control"/>
                        </span></div>
                        <div class="clearfix"></div>
                      </div>
       <div class="form-group">
                        <label class="col-sm-3 control-label">Detail</label>
                        <div class="col-sm-9"><span class="controls">
                          <textarea name="detail2" placeholder="details..." id="detail2" class="form-control"></textarea>
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
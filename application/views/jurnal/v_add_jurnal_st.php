<script src="<?php echo base_url();?>asset/js/jquery.js" type="text/javascript"></script>
<section class="main-content">
    <div class="container">
        <div class="page-content">
            <div class="header">
                <h2><strong>Tambah</strong> Jurnal Surat Tugas</h2>
                <div class="breadcrumb-wrapper">
                  <ol class="breadcrumb">
                    <li><a href="#">Home</a>
                    </li>
                    <li class="active"> Tambah Jurnal ST</li>
                  </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 portlets ui-sortable">
                    <div class="panel">
                        <!--<div class="panel-header"></div>-->
                        
                                    <div class="form-group">
                                        <div class="table-responsive">
  <form action="<?php echo site_url('jurnal/simpan_jurnal_st')?>" method="post">
                                        <table class="table table-striped">
                                              <thead>
                                                <tr>
                                                  <th colspan="2"> <div align="left"><a class="btn-addnew" href="#modaladd" data-toggle="modal" title="Add"><i class="icon-plus icons"></i>Add New</a></div></th>
                                                  <th>&nbsp;</th>
                                                  <th class="text-center">&nbsp;</th>
                                                </tr>
                                                <tr>
                                                  <th>No.</th>
                                                  <th>ST</th>
                                                  <th>Detail</th>
                                                  <th class="text-center">Action</th>
                                                </tr>
                                              </thead>
                                              <tbody>
          <?php  $no=1;?>
          <?php 
			foreach($temp as $tmp)
			{
			?>
                                                <tr class="gradeX">
                                                    <th scope="row"><?php echo $no; ?></th>
                                                    <td><?php echo $tmp->id_surat_tugas; ?></td>
                                                    <td><?php echo $tmp->detail; ?>
                                                  <input type="hidden" name="t_detail[]" id="t_detail[]" value="<?php echo $tmp->detail; ?>" />
                                                  <input type="hidden" name="t_st[]" id="t_st[]" value="<?php echo $tmp->id_surat_tugas; ?>" />
                                                  <input type="hidden" name="t_parent[]" id="t_parent[]" value="<?php echo $tmp->id_parent; ?>" />
                                                  <input type="hidden" name="t_sub[]" id="t_sub[]" value="<?php echo $tmp->id_sub_parent; ?>" /></td>
                                                    <td class="text-center">
                               
                                                    <a class="btn-action" href="<?php echo base_url();?>jurnal/hapus_item_temp/<?php echo $tmp->id_temp;?>" onclick="return confirm('Yakin Hapus  Akun ?');" title="Delete"><i class="icon-trash icons"></i></a>          
                                                    </td>
                                                </tr>                                
                                                <?php  $no++; }?>
                                              </tbody>
                                            </table>
 <div class="span8"><hr /></div>
 
 <div class="row-fluid" style="padding-left:10px">
            <div class="span8">
              <label class="control-label">No. Jurnal</label>
        <div class="controls">
            <input name="kodejurnal" type="text" class="form-control" id="kodejurnal" value="<?php echo $kodetrans; ?>" readonly></div>
             <div class="clearfix"></div>
  
                <div class="control-group">
                    <label class="control-label"> <strong><em>Account Type</em></strong></label>
                  <div class="controls">
                      <select id="id_parent" tabindex="5" class="chzn-select form-control" name="id_parent" data-placeholder="Pilih account" required="required">
                            <option value=""></option>
                            <?php
                            if(isset($data)){
                                foreach($data as $row){
                                    ?>
                                    <option value="<?php echo $row->id_parent?>"><?php echo $row->nm_akun?></option>
                                <?php
                                }
                            }
                            ?>
                </select>
                        
                        
                        
                    
            
                      <input type="hidden" name="kdtrans" id="kdtrans" value="<?php echo $kodetrans?>" />
                  </div>
                </div>
          <div class="clearfix"></div>      
          <div class="control-group">
           <label class="contrid_subol-label"> <strong><em>Transaksi type</em></strong></label>
<select id="id_sub" tabindex="5" class="form-control" name="id_sub" required="required">
            <option></option>
            </select>
          </div>
          
          <div class="control-group">
           <label class="control-label"> <strong><em>Ket :</em></strong></label>
          <textarea name="t_ket" cols="55" rows="4" style="width:55%" id="t_ket" class="form-control"></textarea>           
          </div>
   
                             
              <div class="control-group">
           <label class="control-label"> <strong>Jumlah Rp</strong></label>
           <input name="t_jumlah" type="text" class="input-xlarge form-control" id="t_jumlah" value="<?php echo $this->input->post('t_ket'); ?>">
              </div>
          
                <div id="detail_pelanggan"></div>
      </div>
            
            
   
   
   
            <div class="span4 pull-right">
                <div class="control-group">
                    <label class="control-label" style="text-align: center"><h4>&nbsp;</h4></label>
                    <div class="controls"></div>
                </div>
            </div>
            
    <div class="form-actions">
     <button type="submit" class="btn btn-primary btn-large"><i class="icon-ok-sign icon-white"></i> Save &nbsp;</button>      
         
      </div> 
    </div>
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


<div id="modaladd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Tambah Trans </h3>
            </div>
            <?php echo isset($message)? $message:'';?>
            <div class="smart-form">
                <form method="post" action="<?php echo site_url('jurnal/add_item')?>">
                    <div class="modal-body">
                      <div class="form-group">
                        <label class="col-sm-3 control-label"> No ST</label>
                        <div class="col-sm-9"><span class="controls">
<select id="no_st" tabindex="5" class="chzn-select form-control" name="no_st" data-placeholder="Pilih ST">
                            <option value=""></option>
                            <?php
                            if(isset($surat_tugas)){
                                foreach($surat_tugas as $st){
                                    ?>
                            <option value="<?php echo $st->id_surat_tugas;?>"><?php echo $st->id_surat_tugas;?></option>
                            <?php }} ?>
                          </select>
                        </span><span class="controls">
                        <input type="hidden" name="kdtrans2" id="kdtrans2" value="<?php echo $kodetrans?>" />
                        </span></div>
                        <div class="clearfix"></div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Detail</label>
                        <div class="col-sm-9"><span class="control-group">
                          <textarea name="det2" cols="45" rows="4" class="form-control"></textarea>
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
    
<script type="text/javascript">
    $(document).ready(function() {
        $("#id_parent").change(function(){
            var id_parent = $("#id_parent").val();
            $.ajax({
                type: "POST",
                url : "<?php echo base_url('jurnal/get_sub_st'); ?>",
                data: "id_parent="+id_parent,
                cache:false,
                success: function(data){
                    $('#id_sub').html(data);
                    document.frm.add.disabled=false;
                }
            });
        });


    })
</script>
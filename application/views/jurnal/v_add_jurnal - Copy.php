<script src="<?php echo base_url();?>asset/js/jquery.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>asset/jquery_ui/jquery-1.9.1.js"></script>

<script src="<?php echo base_url();?>asset/jquery_ui/ui/jquery.ui.core.js"></script>
<script src="<?php echo base_url();?>asset/jquery_ui/ui/jquery.ui.widget.js"></script>
<script src="<?php echo base_url();?>asset/jquery_ui/ui/jquery.ui.datepicker.js"></script>

<link rel="stylesheet" href="<?php echo base_url();?>asset/jquery_ui/themes/base/jquery.ui.all.css">
<link rel="stylesheet" href="<?php echo base_url();?>asset/jquery_ui/themes/base/jquery.ui.all.css">
<section class="main-content">
    <div class="container">
        <div class="page-content">
            <div class="header">
              <h2><strong>List</strong>Jurnal</h2>
              <div class="breadcrumb-wrapper">
                  <ol class="breadcrumb">
                    <li><a href="#">Home</a>
                    </li>
                    <li class="active"> List Jurnal</li>
                </ol>
              </div>
            </div>
<div class="page" align="right">

<form action="<?php echo base_url();?>jurnal/periode_jurnal" method="post">
  <table width="40%" height="58" border="0" id="top-cari">
    <tr>
      <td width="855" height="21"><div align="center">Status</div></td>
      <td width="113"><span class="controls">Bulan</span></td>
      <td width="41"><span class="controls">Tahun</span></td>
      <td width="41">&nbsp;</td>
      <td width="41">&nbsp;</td>
      <td width="41">&nbsp;</td>
      <td width="41">&nbsp;</td>
    </tr>
    <tr>
      <td height="24"><div align="right"><span class="controls">
        <select name="status" id="status" required="required">
          <option value="semua">Semua</option>
 			
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
      </span></div></td>
      <td><span class="controls">
        <select name="bln" id="bln">
          <?php 
					for($i=1;$i<=12;$i++){
						if($i<10)
						{
						$i='0'.$i;	
						}
					?>
          <option value="<?php echo $i;?>"><?php echo $i;?></option>
          <?php } ?>
        </select>
      </span></td>
      <td><span class="controls">
        <select name="thn" id="thn">
          <?php 
					for($i=2015;$i<=2050;$i++){
					?>
          <option value="<?php echo $i;?>"><?php echo $i;?></option>
          <?php } ?>
        </select>
      </span></td>
      <td><input type="submit" name="btncari" id="btncari2" class="btn btn-primary btn-" value="Tampil" /></td>
      <td></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>
</div><div class="row">
                <div class="col-lg-12 portlets ui-sortable">
                    <div class="panel">
                        <!--<div class="panel-header"></div>-->
                        
                                    <div class="form-group">
                                        <div class="table-responsive">
                            <table class="table table-striped">
                                              <thead>
                                                <tr>
                                                  <th colspan="2"><?php echo isset($paginator)?$paginator:''; ?> </th>
                                                  <th>&nbsp;</th>
                                                  <th> <a class="btn-addnew" href="#modaladd" data-toggle="modal" title="Add"><i class="icon-plus icons"></i>Add New</a></th>
                                                  <th><a href="<?php echo base_url();?>jurnal/add_jurnal_st" class="btn-addnew">
                <i class="fa fa-plus"></i> Add Jurnal S.T
              </a></th>
                                                  <th>&nbsp;</th>
                                                  <th class="text-center">&nbsp;</th>
                                                </tr>
                                                <tr>
                                                  <th colspan="4">PENGELUARAN</th>
                                                  <th>&nbsp;</th>
                                                  <th>&nbsp;</th>
                                                  <th class="text-center">&nbsp;</th>
                                                </tr>
                                                <tr>
                                                  <th>No.</th>
                                                  <th>Kode</th>
                                                  <th>Tgl</th>
                                                  <th>Nama tr</th>
                                                  <th>detail</th>
                                                  <th>total</th>
                                                  <th class="text-center">Action</th>
                                                </tr>
                                              </thead>
                                              <tbody>
      <?php 
			error_reporting(0);
$no=1;
			foreach($trans as $tr){
			$total+=$tr->jumlah_jurnal;	
			?>
                                                <tr class="gradeX">
                                                    <th scope="row"><?php echo $no?></th>
                                                    <td><?php echo $tr->id_jurnal?></td>
                                                    <td><?php echo date("d-m-Y",strtotime($tr->tgl_jurnal)); ?></td>
                                                    <td><?php echo $tr->nm_akun?></td>
                                                    <td><em><?php echo substr($tr->det_jurnal,0,100);?></em></td>
                                                    <td><div align="right"><?php echo number_format($tr->jumlah_jurnal,0,'.','.');?></div></td>
                                                    <td class="text-center">
                                                    <a class="btn-action" href="#modaledit<?php echo $tr->id_jurnal?>" data-toggle="modal" title="Edit"><i class="icon-note icons"></i></a>
                                                    <a class="btn-action" href="<?php echo base_url();?>jurnal/delete_transaksi/<?php echo $tr->id_jurnal;?>" onclick="return confirm('Yakin Hapus  Akun ?');" title="Delete"><i class="icon-trash icons"></i></a>          
                                                    </td>
                                                </tr>
                                                <?php $no++; } ;?>
                                                
                                                <tr class="gradeX">
                                                  <th scope="row">&nbsp;</th>
                                                  <td colspan="3">Sub total</td>
                                                  <td colspan="2"><div align="right"><strong>Rp <?php echo number_format($total,0,'.','.');?></strong></div></td>
                                                  <td class="text-center">&nbsp;</td>
                                                </tr>
                                                <tr class="gradeX">
                                                  <th colspan="4" scope="row"><strong>PEMASUKAN</strong></th>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <td class="text-center">&nbsp;</td>
                                                </tr>
                                                <tr class="gradeX">
                                                
                                               <?php 
			error_reporting(0);
$si=1;
			foreach($trans2 as $tr2){
			$total2+=$tr2->jumlah_jurnal;	
			?>
                                                  <th scope="row"><?php echo $si?></th>
                                                  <td><?php echo $tr2->id_jurnal?></td>
                                                  <td><?php echo date("d-m-Y",strtotime($tr->tgl_jurnal)); ?></td>
                                                  <td><?php echo $tr2->nm_akun?></td>
                                                  <td><em><?php echo substr($tr2->det_jurnal,0,100);?></em></td>
                                                  <td><div align="right"><?php echo number_format($tr2->jumlah_jurnal,0,'.','.');?></div></td>
                                                  <td class="text-center">
                                                    <a class="btn-action" href="#modaledit<?php echo $tr2->id_jurnal?>" data-toggle="modal" title="Edit"><i class="icon-note icons"></i></a>
                                                    <a class="btn-action" href="<?php echo base_url();?>jurnal/delete_transaksi/<?php echo $tr2->id_jurnal;?>" onclick="return confirm('Yakin Hapus  Akun ?');" title="Delete"><i class="icon-trash icons"></i></a>          
                                                    </td>
                                                </tr>
                                                <?php $si++; } ;?>
                                                <tr class="gradeX">
                                                  <th scope="row">&nbsp;</th>
                                                  <td colspan="3">sub total</td>
                                                  <td><div align="right"><strong>Rp. <?php echo number_format($total2,0,'.','.');?></strong></div></td>
                                                  <td>&nbsp;</td>
                                                  <td class="text-center">&nbsp;</td>
                                                </tr>
                                                <tr class="gradeX">
                                                  <th scope="row">&nbsp;</th>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <td class="text-center">&nbsp;</td>
                                                </tr>                                
                                                
                                              </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </form>
              <div class="page" align="center"><?php echo isset($paginator)?$paginator:''; ?></div>
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
                <h3 id="myModalLabel">Tambah Data Trans</h3>
            </div>
            <div class="smart-form">
  <form method="post" action="<?php echo site_url('jurnal/simpan_jurnal2')?>">
                    <div class="modal-body">
                      <div class="form-group">
                        <label class="col-sm-3 control-label"> Tipe Akun</label>
                        <div class="col-sm-9"><span class="controls">
<select id="id_parent3" tabindex="5" class="chzn-select form-control" name="id_parent3" data-placeholder="Pilih account" required="required">
                    <option value="">Pilih AKun</option>
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
                        </span><span class="controls">
                        <input type="hidden" name="kdtrans2" id="kdtrans2" value="<?php echo $kodetrans?>" />
                        </span></div>
                        <div class="clearfix"></div>
                      </div>
                      
  <div class="form-group">
                        <label class="col-sm-3 control-label">Akun</label>
    <div class="col-sm-9"><span class="controls">
      <select id="id_sub2" tabindex="5" class="form-control" name="id_sub2" data-placeholder="Pilih ">
                    <option>Pilih akun</option>
                  </select>
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
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Jumlah Rp</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="jumlah2" type="text"  class="form-control" value="" size="55" id="jumlah2" required="required"  />
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
    
  
<?php

    foreach($trans as $row){
        ?>  
  <div id="modaledit<?php echo $row->id_jurnal;?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Edit Data </h3>
            </div>
            <div class="smart-form">
                <form method="post" action="<?php echo site_url('jurnal/update_transaksi')?>">
                    <div class="modal-body">
                      <div class="form-group">
                        
                        <div class="col-sm-9">
                            
                          <input type="hidden" name="idpegawai" id="idpegawai" value="<?php echo $row->id_pegawai;?>" />
                        </div>
                        <div class="clearfix"></div>
                      </div>
                      
  <div class="form-group">
                        <label class="col-sm-3 control-label">Nama Akun</label>
    <div class="col-sm-9">
                            <input name="nm_akun" type="text" placeholder="account name" id="nm_akun" value="<?php echo $row->nm_akun;?>" readonly="readonly" class="form-control"/>
                <span class="controls">
                <input type="hidden" name="id_trans" id="id_trans" value="<?php echo $row->id_jurnal;?>" />
    </span></div>
                        <div class="clearfix"></div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Nama Trans</label>
                        <div class="col-sm-9">
                            <input name="nm_trans" type="text" placeholder="account name" id="nm_trans" value="<?php echo $row->nm_jurnal;?>" class="form-control"/>
                        </div>
                        <div class="clearfix"></div>
                      </div>

 
<div class="form-group">
                        <label class="col-sm-3 control-label">Jumlah</label>
                        <div class="col-sm-9">
                            <input name="jml_trans" type="text" placeholder="account name" id="jml_trans" value="<?php echo $row->jumlah_jurnal;?>" required="required" class="form-control">
                        </div>
                        <div class="clearfix"></div>
                      </div>
<div class="form-group">
                        <label class="col-sm-3 control-label">Details</label>
                        <div class="col-sm-9">
                          <textarea name="det_trans"  id="det_trans" class="form-control"><?php echo $row->det_jurnal;?></textarea>
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
    

    <script type="text/javascript">
    $(document).ready(function() {
        $("#id_parent").change(function(){
            var id_parent = $("#id_parent").val();
            $.ajax({
                type: "POST",
                url : "<?php echo base_url('jurnal/get_sub_parent'); ?>",
                data: "id_parent="+id_parent,
                cache:false,
                success: function(data){
                    $('#id_sub').html(data);
                    document.frm.add.disabled=false;
                }
            });
        });

$("#add").click(function(){
            var add = $("#add").val();
		
              $.ajax({
                type: "POST",
                url : "<?php echo base_url('penjualan/add'); ?>",
                data: "idakun="+kd_pelanggan,
                cache:false,
                success: function(data){
                    $('#detail_pelanggan').html(data);
                }
            });
			});
			
                $("#id_parent3").change(function(){
            var id_parent3 = $("#id_parent3").val();
            $.ajax({
                type: "POST",
                url : "<?php echo base_url('jurnal/get_sub_parent'); ?>",
                data: "id_parent="+id_parent3,
                cache:false,
                success: function(data){
                    $('#id_sub2').html(data);
                    document.frm.add.disabled=false;
                }
            });
        });


    })
</script>
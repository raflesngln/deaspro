<style type="text/css">
.main-content{background-color:#F0F0F0}
#bln, #thn,#nost,#nost{ height: 35px; width: 90px}
</style>
<section class="main-content">
    <div class="container">
        <div class="page-content">
            <div class="header">
              <h2><strong>List</strong>Surat Tugas</h2>
                <div class="breadcrumb-wrapper">
                  <ol class="breadcrumb">
                    <li><a href="#">Home</a>
                    </li>
                    <li class="active"> List ST</li>
                  </ol>
                </div>
            </div>
<div class="page" align="right">
<form action="<?php echo base_url();?>surat_tugas/cari_surat_tugas" method="post">
  Nomor ST 
  <input name="nost" type="text" id="nost" />
<input name="" type="submit" value="Cari ST"  class="btn btn-info btn-large" />
</form>
<br />
<form action="<?php echo base_url();?>surat_tugas/surat_tugas_periode" method="post">
<table width="100%" height="58" border="0" class="top-cari">
    <tr>
      <td width="855" height="21">&nbsp;</td>
      <td width="113"> Asuransi</td>
      <td width="41"><span class="controls">Bulan</span></td>
      <td width="41"><span class="controls">Tahun</span></td>
      <td width="41">&nbsp;</td>
      <td width="41">&nbsp;</td>
    </tr>
    <tr>
      <td height="24">&nbsp;</td>
      <td><span class="controls">
        <select name="asuransi" id="asuransi" required="required" class="form-control">
        <option value="semua">Semua</option>
        <option></option>
        <?php
	foreach($asuransi as $cust){
	    ?>
          <option value="<?php echo $cust->id_asuransi;?>"><?php echo substr($cust->nm_asuransi,3);?></option>
		<?php } ?>
        </select>
      </span></td>
      <td><label for="asuransi"><span class="controls">
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
      </span></label></td>
      <td><span class="controls">
        <select name="thn" id="thn">
          <?php 
					for($i=2015;$i<=2050;$i++){
					?>
          <option value="<?php echo $i;?>"><?php echo $i;?></option>
          <?php } ?>
        </select>
      </span></td>
      <td><input type="submit" name="btncari" id="btncari" value="Tampil" class="btn btn-primary btn-" />  </td>
      <td><input type="submit" name="btncetak" id="btncetak" value="Cetak" class="btn btn-primary btn-" /></td>
    </tr>
  </table>
</form>
&nbsp;</div>
            <div class="row">
                <div class="col-lg-12 portlets ui-sortable">
                    <div class="panel">
                        <!--<div class="panel-header"></div>-->
                        
                                    <div class="form-group">
                                        <div class="table-responsive">
                                        <table class="table table-striped">
                                              <thead>
                                                <tr>
                                                  <th colspan="2"><div align="left"><a class="btn-addnew" href="<?php echo base_url();?>surat_tugas/add_surat_tugas" data-toggle="modal" title="Add"><i class="icon-plus icons"></i>Add New</a></div></th>
                                                  <th>&nbsp;</th>
                                                  <th>&nbsp;</th>
                                                  <th>&nbsp;</th>
                                                  <th>&nbsp;</th>
                                                  <th class="text-center">&nbsp;</th>
                                                </tr>
                                                <tr>
                                                  <th colspan="2"><?php echo isset($paginator)?$paginator:''; ?> </th>
                                                  <th>&nbsp;</th>
                                                  <th>&nbsp;</th>
                                                  <th>&nbsp;</th>
                                                  <th>&nbsp;</th>
                                                  <th class="text-center">&nbsp;</th>
                                                </tr>
                                                <tr>
                                                  <th>No.</th>
                                                  <th> No ST</th>
                                                  <th>Tgl</th>
                                                  <th>Asuransi</th>
                                                  <th>Tertanggung</th>
                                                  <th>Surveyor</th>
                                                  <th class="text-center">Action</th>
                                                </tr>
                                              </thead>
                                              <tbody>
    <?php
	$no=1;
        foreach($list as $row){
			
            ?>
                                                <tr class="gradeX">
                                                    <th scope="row"><?php echo $no;?></th>
                                                    <td><?php echo $row->id_surat_tugas; ?></td>
                                                    <td><?php echo date("d-M-Y",strtotime($row->tgl_surat_tugas)); ?></td>
                                                    <td><?php echo $row->nm_asuransi; ?></td>
                                                    <td><?php echo $row->nm_tertanggung; ?></td>
                                                    <td><?php echo $row->nm_surveyor; ?></td>
                                                    <td class="text-center">
                                                    
                                                    <a class="btn-action" href="<?php echo base_url();?>surat_tugas/hapus_surat_tugas/<?php echo $row->id_surat_tugas;?>" onclick="return confirm('Yakin Hapus  Akun ?');" title="Delete"><i class="icon-trash icons"></i></a> 
     <a class="btn-action" href="<?php echo base_url();?>surat_tugas/edit_surat_tugas/<?php echo $row->id_surat_tugas;?>" title="edit"><i class="icon-note icons"></i></a>
      <a class="btn-action" href="<?php echo base_url();?>surat_tugas/jurnal_surat_tugas/<?php echo $row->id_surat_tugas;?>" title="jurnal"><i class="icon-calendar icons"></i></a>
       <a class="btn-action" href="<?php echo base_url();?>surat_tugas/cetak_surat_tugas/<?php echo $row->id_surat_tugas;?>" title="Cetak"><i class="icon-eye icons"></i></a>          
                                                    </td>
                                                </tr>                                
                                                <?php $no++; } ?>
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
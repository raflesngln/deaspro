<section class="main-content">
    <div class="container">
        <div class="page-content">
            <div class="header">
              <h2><strong>Lap Jurnal</strong></h2>
        <div class="breadcrumb-wrapper">
                  <ol class="breadcrumb">
                    <li><a href="#">Home</a>
                    </li>
                    <li class="active"> Lap Jurnal</li>
                  </ol>
                </div>
            </div>
<div class="page" align="right">

<form action="<?php echo base_url();?>asuransi/surat_kuasa_periode2" method="post">
<table width="100%" height="58" border="0" class="top-cari">
    <tr>
      <td width="354" rowspan="2">&nbsp;</td>
      <td width="154" height="21"><span class="controls">Bulan</span></td>
      <td width="138"><span class="controls">Tahun</span></td>
      <td width="122">&nbsp;</td>
      </tr>
    <tr>
      <td height="24"><label for="asuransi"><span class="controls">
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
      <td><input type="submit" name="btncari" id="btncari" value="Tampilkan" class="btn-success btn-large" style="width:120px; height:30px" /></td>
      </tr>
  </table>
</form>
&nbsp;
<?php //echo $paginator; ?></div>
            <div class="row">
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
                                                  <th>&nbsp;</th>
                                                  <th>&nbsp;</th>
                                                  <th class="text-center">&nbsp;</th>
                                                </tr>
                                                <tr>
                                                  <th>No.</th>
                                                  <th> Tgl Trans</th>
                                                  <th>Detail</th>
                                                  <th>Jumlah</th>
                                                  <th>Total</th>
                                                  <th class="text-center">Action</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                  
		       <?php
	$no=1;
        foreach($list as $row){
			$level=$this->session->userdata('level');
			if($level=='asuransi')
			{
			$link='<a href="<?php echo base_url();?>asuransi/edit_surat_kuasa/<?php echo $row->id_upload;?>"><i class="fa fa-trash-o"></i> Edit</a>';
			}
			else
			{
			$link='';	
			}
            ?>
                                                <tr class="gradeX">
                                                
                                                    <th scope="row"><?php echo $no;?></th>
                                                    <td><?php echo $row->id_upload;?></td>
                                                    <td><?php echo $row->insertime;?></td>
                                                    <td><?php echo $row->nm_asuransi;?><?php echo $row->nm_asuransi;?></td>
                                                    <td><?php echo substr($row->keterangan,0,200);?></td>
                                                    <td class="text-center"><a href="<?php echo base_url();?>asuransi/hapus_surat_kuasa/<?php echo $row->id_upload;?>" onclick="return confirm('Yakin hapus data ?')"><i class="fa fa-trash-o" title="Delete data"></i></a>
                                                    
     <a href="<?php echo base_url();?>asuransi/edit_surat_kuasa/<?php echo $row->id_upload;?>" title="Edit data"><i class="icon-note icons"></i></a>
     
     <a href="<?php echo base_url();?>asuransi/detail_surat_kuasa/<?php echo $row->id_upload;?>" title="Detail"><i class="fa fa-list-ol"></i></a>                                               </td>
                                                </tr>
                                                <?php $no++; }  ?>
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
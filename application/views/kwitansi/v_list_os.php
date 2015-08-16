<style type="text/css">

.main-content{background-color:#F0F0F0}
#bln, #thn,#nost,#nost,#status{ height: 35px; width: 90px}
</style>
<section class="main-content">
    <div class="container">
        <div class="page-content">
            <div class="header">
              <h2><strong>List</strong>Oustanding </h2>
                <div class="breadcrumb-wrapper">
                  <ol class="breadcrumb">
                    <li><a href="<?php echo base_url();?>">Home</a>
                    </li>
                    <li class="active">List Oustanding</li>
                  </ol>
                </div>
            </div>
<div class="page" align="right">

<form action="<?php echo base_url();?>kwitansi/cari_list_os" method="post">
<input name="st" type="text" placeholder="Search ST" id="nost" />
<input name="" type="submit" value="Cari ST"  class="btn btn-info btn-large" />
</form>

<form action="<?php echo base_url();?>kwitansi/list_os_periode" method="post">
<table width="55%" height="58" border="0" class="top-cari">
    <tr>
      <td width="855" height="21"><div align="center">Asuransi</div></td>
      <td width="113">Status</td>
      <td width="41"><span class="controls">Bulan</span></td>
      <td width="41"><span class="controls">Tahun</span></td>
      <td width="41">&nbsp;</td>
      <td width="41">&nbsp;</td>
      <td width="41">&nbsp;</td>
    </tr>
    <tr>
      <td height="24"><div align="right"><span class="controls">
        <select name="asuransi" id="asuransi" required="required" class="form-control">
          <option value="semua">Semua</option>
          <option></option>
          <?php
	foreach($asuransi as $cust){
	    ?>
          <option value="<?php echo $cust->id_asuransi;?>"><?php echo substr($cust->nm_asuransi,3);?></option>
          <?php } ?>
        </select>
      </span></div></td>
      <td><span class="controls">
        <select name="status" id="status" required="required" class="form-control">
        <option value="semua">Semua</option>
          <option value="utang">Utang</option>
          <option value="lunas">Lunas</option>
        </select>
      </span></td>
      <td><label for="customer"><span class="controls">
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
      <td><input type="submit" name="btncari" id="btncari" value="Tampil" class="btn btn-primary btn-" /></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>
&nbsp;


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
                                                  <th colspan="13"><?php isset($judul)?$judul:'';?></th>
                                                </tr>
                                                <tr>
                                                  <th colspan="3"><?php echo isset($paginator)?$paginator:''; ?></th>
                                                  <th>&nbsp;</th>
                                                  <th>&nbsp;</th>
                                                  <th>&nbsp;</th>
                                                  <th>&nbsp;</th>
                                                  <th>&nbsp;</th>
                                                  <th>&nbsp;</th>
                                                  <th>&nbsp;</th>
                                                  <th>&nbsp;</th>
                                                  <th>&nbsp;</th>
                                                  <th class="text-center">&nbsp;</th>
                                                </tr>
                                              </thead>
                                              <tbody>
   
                                
                                                <tr class="gradeX">
                                                  <th scope="row">No.</th>
                                                  <td> No ST</td>
                                                  <td>Tgl KW</td>
                                                  <td>Asuransi</td>
                                                  <td>Pelanggan</td>
                                                  <td>Detail</td>
                                                  <td>B.survey</td>
                                                  <td>B.Oprs</td>
                                                  <td>B.Klaim</td>
                                                  <td>Sub Total</td>
                                                  <td>Sisa</td>
                                                  <td>Status</td>
                                                  <td class="text-center">&nbsp;</td>
                                                </tr>
                  <?php
	error_reporting(0);
	$no=1;
        foreach($list as $row){
			
$survey=$row->status_survey;
$operasional=$row->status_operasional;
$klaim=$row->status_klaim;

if($survey=='0'){$harga1=$row->survey; $isurvey='<i class="fa fa-times"></i> <?php';} else{$harga1=0;$isurvey='<font color="#00A854"><i class="fa fa-check"></i></font><?php';}
if($klaim=='0'){$harga2=$row->klaim; $klaim='<i class="fa fa-times"></i> <?php';} else{$harga2=0;$klaim='<font color="#00A854"><i class="fa fa-check"></i></font><?php';}
if($operasional=='0'){$harga3=$row->operasional;$operasional='<i class="fa fa-times"></i> <?php';} else{$harga3=0;$operasional='<font color="#00A854"><i class="fa fa-check"></i></font><?php';}


$total=$row->total;
$b_sur=$row->uang_surveyor;
$b_opr=$row->uang_operasional;
$b_klm=$row->uang_klaim;
$t_bayar=$b_sur+$b_opr+$b_klm;

$sisa=$total-$t_bayar;

$grand+=$total;
$grands+=$sisa;
$totsurvey+=$row->survey;
$totoperasional+=$row->operasional;
$totklaim+=$row->klaim;

$pajak_survey=$row->uang_survey-$row->uang_surveyor;
$pajak_opr=$row->b_operasional-$row->uang_operasional;
$pajak_klm=$row->gagal_klaim-$row->uang_klaim;

if($b_sur <=0){
	$pajak_survey='0';;
}
else{
	$pajak_survey=$row->uang_survey-$row->uang_surveyor;
}
if($b_opr <=0){
	$pajak_opr='0';;
}
else{
	$pajak_opr=$row->b_operasional-$row->uang_operasional;
}
if($b_klm <=0){
	$pajak_klm='0';;
}
else{
	$pajak_klm=$row->gagal_klaim-$row->uang_klaim;
}	

$sub_pajak=$pajak_klm+$pajak_opr+$pajak_survey;
$sub_koran=$b_sur+$b_opr+$b_klm;

$sub_koran_survey+=$b_sur;
$sub_koran_oper+=$b_opr;
$sub_koran_klaim+=$b_klm;	

$sub_pajak_survey+=$pajak_survey;
$sub_pajak_oper+=$pajak_opr;
$sub_pajak_klaim+=$pajak_klm;	

$total_koran+=$sub_koran;
$total_pajak+=$sub_pajak;
            ?>             
                                                               
                                                
                                                <tr class="gradeX">
                                                    <th scope="row"><?php echo $no;?></th>
                                                    <td><?php echo $row->id_surat_tugas; ?></td>
                                                    <td><?php echo $row->tgl_kwitansi; ?></td>
                                                    <td><?php echo $row->username; ?></td>
                                                    <td><?php echo $row->nm_tertanggung; ?></td>
                                                    <td><p>Tagihan</p>
              <p>Rek.Koran</p>
              <p>Pajak</p></td>
                                                    <td><p align="right"><?php echo number_format($row->survey,0,'.','.'); ?>&nbsp;<?php echo $isurvey?>
                </p>
                <p align="right"><?php echo number_format($b_sur,0,'.','.'); ?></p>
              <p align="right"><?php echo number_format($pajak_survey,0,'.','.'); ?></p></td>
                                                    <td><p align="right"><?php echo number_format($row->operasional,0,'.','.'); ?>&nbsp;<?php echo $operasional?>
              </p>
                <p align="right"><?php echo number_format($b_opr,0,'.','.'); ?></p>
              <p align="right"><?php echo number_format($pajak_opr,0,'.','.'); ?></td>
                                                    <td><p align="right"><?php echo number_format($row->klaim,0,'.','.'); ?>&nbsp;<?php echo $klaim?>
              </p>
                <p align="right"><?php echo number_format($b_klm,0,'.','.'); ?></p>
              <p align="right"><?php echo number_format($pajak_klm,0,'.','.'); ?></p></td>
                                                    <td></p>
                <p align="right"><?php echo number_format($total,0,'.','.'); ?></p>
                <p align="right"><?php echo number_format($sub_koran,0,'.','.'); ?></p>
              <p align="right"><?php echo number_format($sub_pajak,0,'.','.'); ?></p></td>
                                                    <td><div align="right"><?php echo number_format($sisa,0,'.','.'); ?></div></td>
                                                    <td><div align="center"><?php echo $row->status_kwitansi; ?> </div></td>
                                                    <td class="text-center">
   
       <p><a class="btn-action" href="#modaledit<?php echo $row->id_surat_tugas;?>" data-toggle="modal" title="Edit"><i class="icon-note icons"></i>&nbsp;Edit&nbsp;</a></p>
       
       <p><a class="btn-action" href="#modaledit2<?php echo $row->id_surat_tugas;?>" data-toggle="modal" title="Bayar Kwitansi"><i class="icon-note icons"></i>Bayar</a></p>
       
      <p> <a class="btn-action" href="<?php echo base_url();?>kwitansi/lunas_kwitansi/<?php echo $row->id_surat_tugas;?>" title="Lunas" onclick="return confirm('Yakin ST ini sudah Lunas ?');"><i class="icon-note icons"></i>Lunas</a></p>
       
 
                                                      
                                                    </td>
                                                </tr>
                                                
                                       <?php $no++; } ?>
                                                
                                                
                                                <tr class="gradeX">
                                                  <th colspan="13" scope="row">&nbsp;</th>
                                                </tr>
                                                <tr class="gradeX">
                                                  <th scope="row">&nbsp;</th>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <td><p><strong>Tagihan</strong></p>
              <p><strong>Rek.Koran</strong></p>
              <p><strong>Pajak</strong></p></td>
              
              <?php
		    foreach($sub as $dt)
			{
				$jumlah3=$dt->jumlah3;
				?> 
                                                  <td><div align="right" style="border:1px #CCC solid; border-bottom:2px #000 solid; border-top:2px #000 solid"><strong><?php echo number_format($dt->jumlah1,0,'.','.'); ?></strong></div>
              <div align="right" style="border:1px #CCC solid; border-bottom:2px #000 solid; border-top:2px #000 solid"><strong><?php echo number_format($sub_koran_survey,0,'.','.'); ?></strong></div>
              <div align="right" style="border:1px #CCC solid; border-bottom:2px #000 solid; border-top:2px #000 solid"><strong><?php echo number_format($sub_pajak_survey,0,'.','.'); ?></strong></div></td>
                                                  <td><div align="right" style="border:1px #CCC solid; border-bottom:2px #000 solid; border-top:2px #000 solid"><strong><?php echo number_format($dt->jumlah2,0,'.','.'); ?></strong></div>
              
              <div align="right" style="border:1px #CCC solid; border-bottom:2px #000 solid; border-top:2px #000 solid"><strong><?php echo number_format($sub_koran_oper,0,'.','.'); ?></strong></div>
              
              <div align="right" style="border:1px #CCC solid; border-bottom:2px #000 solid; border-top:2px #000 solid"><strong><strong><?php echo number_format($sub_pajak_oper,0,'.','.'); ?></strong></strong></div></td>
                                                  <td><div align="right" style="border:1px #CCC solid; border-bottom:2px #000 solid; border-top:2px #000 solid"><strong><?php echo number_format($dt->jumlah3,0,'.','.'); ?></strong></div>
              <div align="right" style="border:1px #CCC solid; border-bottom:2px #000 solid; border-top:2px #000 solid"><strong><?php echo number_format($sub_koran_klaim,0,'.','.'); ?></strong></div>
              
              <div align="right" style="border:1px #CCC solid; border-bottom:2px #000 solid; border-top:2px #000 solid"><strong><?php echo number_format($sub_pajak_klaim,0,'.','.'); ?></strong></div></td>
                                                  <td><div align="right" style="border:1px #CCC solid; border-bottom:2px #000 solid; border-top:2px #000 solid"><strong><?php echo number_format($grand,0,'.','.'); ?></strong></div>
           <div align="right" style="border:1px #CCC solid; border-bottom:2px #000 solid; border-top:2px #000 solid"><strong><?php echo number_format($total_koran,0,'.','.'); ?></strong></div>
         <div align="right" style="border:1px #CCC solid; border-bottom:2px #000 solid; border-top:2px #000 solid"><strong><?php echo number_format($total_pajak,0,'.','.'); ?></strong></div> </td>
          <?php } ?>
                                                  <td><div align="right" style="border:1px #CCC solid; border-bottom:2px #000 solid; border-top:2px #000 solid"><strong><?php echo number_format($grands,0,'.','.'); ?></strong></div></td>
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


<?php
    foreach($det_kw as $row){
        ?>
<div id="modaledit<?php echo $row->id_surat_tugas;?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Edit Kwitansi</h3>
            </div>
            <div class="smart-form">
                <form method="post" action="<?php echo site_url('kwitansi/edit_kwitansi')?>">
                    <div class="modal-body">
                      <div class="form-group">
                        <label class="col-sm-3 control-label"> Tertanggung</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="id5" type="text" id="id5" value="<?php echo $row->nm_tertanggung;?>" readonly="readonly" class="form-control"/>
                        </span><span class="controls">
                        <input type="hidden" name="idkw" id="idkw" value="<?php echo $row->id_kwitansi;?>" />
                        </span><span class="controls">
                        <input type="hidden" name="nm_tertanggung" id="nm_tertanggung" value="<?php echo $row->nm_tertanggung;?>" />
                        </span></div>
                        <div class="clearfix"></div>
                      </div>
                      
  <div class="form-group">
                        <label class="col-sm-3 control-label">No ST</label>
    <div class="col-sm-9"><span class="controls">
      <input name="id2" type="text" id="id2" value="<?php echo $row->id_surat_tugas;?>" readonly="readonly" class="form-control"/>
</span></div>
                        <div class="clearfix"></div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">B.Suvey</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="survey" type="text" id="survey" value="<?php echo $row->uang_survey;?>" class="form-control" />
                        </span></div>
                        <div class="clearfix"></div>
                      </div>
  <div class="form-group">
                        <label class="col-sm-3 control-label">B.Operasional</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="operasional" type="text" id="operasional" value="<?php echo $row->b_operasional;?>" class="form-control" />
              </span></div>
                        <div class="clearfix"></div>
                      </div>
 <div class="form-group">
                        <label class="col-sm-3 control-label">B.Klaim</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="klaim" type="text" id="klaim" value="<?php echo $row->gagal_klaim;?>" class="form-control"/>
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

<?php
    foreach($det_kw as $row){
        ?>
<div id="modaledit2<?php echo $row->id_surat_tugas;?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Bayar Kwitansi</h3>
            </div>
            <div class="smart-form">
                <form method="post" action="<?php echo site_url('kwitansi/bayar_kwitansi')?>">
                    <div class="modal-body">
                      <div class="form-group">
                        <label class="col-sm-3 control-label"> Tertanggung</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="id4" type="text" id="id4" value="<?php echo $row->nm_tertanggung;?>" readonly="readonly" class="form-control"/>
                        </span><span class="controls">
                        <input type="hidden" name="nm_tertanggung2" id="nm_tertanggung2" value="<?php echo $row->nm_tertanggung;?>" />
                        <input type="hidden" name="idkw" id="idkw" value="<?php echo $row->id_kwitansi;?>" />
                        </span></div>
                        <div class="clearfix"></div>
                      </div>
                      
  <div class="form-group">
                        <label class="col-sm-3 control-label">No ST</label>
    <div class="col-sm-9"><span class="controls">
      <input name="id3" type="text" id="id3" value="<?php echo $row->id_surat_tugas;?>" readonly="readonly" class="form-control"/>
</span></div>
                        <div class="clearfix"></div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">B.Suvey</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="survey" type="text" id="survey" value="<?php echo $row->uang_surveyor;?>"  style="width:55%"/>
                        </span>	(<span class="controls"><?php echo number_format($row->uang_survey,0,'.','.');?></span>)</div>
                        <div class="clearfix"></div>
                      </div>
  <div class="form-group">
                        <label class="col-sm-3 control-label">B.Operasional</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="operasional" type="text" id="operasional" value="<?php echo $row->uang_operasional;?>" style="width:55%"/>
                          
    </span><span class="controls">(<?php echo number_format($row->b_operasional,0,'.','.');?>)</span></div>
                        <div class="clearfix"></div>
                      </div>
 <div class="form-group">
                        <label class="col-sm-3 control-label">B.Klaim</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="klaim" type="text" id="klaim" value="<?php echo $row->uang_klaim;?>"  style="width:55%"/>
    </span>(<span class="controls"><?php echo number_format($row->gagal_klaim,0,'.','.');?>)</span></div>
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
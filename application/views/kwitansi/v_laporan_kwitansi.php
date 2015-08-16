<style type="text/css">

.main-content{background-color:#F0F0F0}
#asuransi,#nost,#nost,#status{ height: 35px; width: 100px}
#bln,#thn{ height: 35px; width: 60px}
</style>
<section class="main-content">
    <div class="container">
        <div class="page-content">
            <div class="header">
              <h2>Laporan<strong> Kwitansi</strong> </h2>
                <div class="breadcrumb-wrapper">
                  <ol class="breadcrumb">
                    <li><a href="#">Home</a>
                    </li>
                    <li class="active">Laporan Kwitansi</li>
                  </ol>
                </div>
            </div>
<div class="page" align="right">
<form action="<?php echo base_url();?>kwitansi/cari_lap_st" method="post">
  <input name="st" type="text" id="nost" placeholder="Search ST" />
<input name="" type="submit" value="Cari ST"  class="btn btn-info btn-large" />
</form>

<form action="<?php echo base_url();?>kwitansi/lap_kwitansi_periode" method="post">
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
      <td><input type="submit" name="btncetak" id="btncetak" value="Cetak" class="btn btn-primary btn-" /></td>
    </tr>
  </table>
</form>


</div>
<div class="col-lg-10"> <?php isset($judul)?$judul:'';?></div>

                                                </tr>
            <div class="row">
                <div class="col-lg-12 portlets ui-sortable">
                    <div class="panel">
                        <!--<div class="panel-header"></div>-->
                        
                                    <div class="form-group">
                                        <div class="table-responsive">
                                        <table class="table table-striped">
                                              <thead>
                                                <tr>
                                                  <th colspan="3"><?php echo isset($paginator)?$paginator:''; ?></th>
                                                  <th>&nbsp;</th>
                                                  <th>&nbsp;</th>
                                                  <th>&nbsp;</th>
                                                  <th>&nbsp;</th>
                                                  <th>&nbsp;</th>
                                                  <th>&nbsp;</th>
                                                </tr>
                                              </thead>
                                              <tbody>
   
                                
                                                <tr class="gradeX">
                                                  <th scope="row"><strong>No.</strong></th>
                                                  <td><strong> No ST</strong></td>
                                                  <td><strong>No KW</strong></td>
                                                  <td><strong>Tgl KW</strong></td>
                                                  <td><strong>Asuransi</strong></td>
                                                  <td><strong>Detail</strong></td>
                                                  <td><strong>Byarar tagihan</strong></td>
                                                  <td><strong>Sisa</strong></td>
                                                  <td><strong>Total</strong></td>
                                                </tr>
    <?php
	$no=1;
	error_reporting(0);
        foreach($list as $row){
			
$survey=$row->status_survey;
$operasional=$row->status_operasional;
$klaim=$row->status_klaim;

if($survey=='0'){$harga1=$row->survey; $survey='<i class="fa fa-times"></i> <?php';} else{$harga1=0;$survey='<font color="#00A854"><i class="fa fa-check"></i></font><?php';}
if($klaim=='0'){$harga2=$row->klaim; $klaim='<i class="fa fa-times"></i> <?php';} else{$harga2=0;$klaim='<font color="#00A854"><i class="fa fa-check"></i></font><?php';}
if($operasional=='0'){$harga3=$row->operasional;$operasional='<i class="fa fa-times"></i> <?php';} else{$harga3=0;$operasional='<font color="#00A854"><i class="fa fa-check"></i></font><?php';}

$total=$row->total;
$b_sur=$row->uang_surveyor;
$b_opr=$row->uang_operasional;
$b_klm=$row->uang_klaim;
$t_bayar=$b_sur+$b_opr+$b_klm;

$sisa=$total-$t_bayar;

$uang_surveyor=$row->uang_surveyor;
$uang_operasional=$row->uang_operasional;
$uang_klaim=$row->uang_klaim;


$sisa=$total-$t_bayar;

$grand+=$total;
$grands+=$sisa;
            ?>                                                
                                                
                                                <tr class="gradeX">
                                                    <th scope="row"><?php echo $no;?></th>
                                                    <td><?php echo $row->id_surat_tugas; ?></td>
                                                    <td><?php echo $row->no_kwitansi_sr; ?></td>
                                                    <td><?php echo $row->tgl_kwitansi; ?></td>
                                                    <td><?php echo $row->username; ?></td>
                                                    <td><p>Survey</p>
              <p>Opers</p>
              <p>Klaim</p></td>
                                                    <td><p align="right"><?php echo number_format($row->uang_surveyor,0,'.','.'); ?> / <?php echo number_format($row->survey,0,'.','.'); ?> &nbsp;<?php echo $survey?></p>
                                                      
  <p align="right"><?php echo number_format($row->uang_operasional,0,'.','.'); ?> / <?php echo number_format($row->operasional,0,'.','.'); ?> &nbsp;<?php echo $operasional?></p>
  <p align="right"><?php echo number_format($row->uang_klaim,0,'.','.'); ?> / <?php echo number_format($row->klaim,0,'.','.'); ?> &nbsp;<?php echo $klaim?></p>
                                                      
                                                  </td>
                                                    <td><div align="center"><?php echo number_format($sisa,0,'.','.'); ?></div></td>
                                                    <td><div align="center"><?php echo number_format($total,0,'.','.'); ?></div></td>
                                                </tr>
                                                
                                       <?php $no++; } ?>
                                                
                                                
                                                <tr class="gradeX">
                                                  <th colspan="9" scope="row">&nbsp;</th>
                                                </tr>
                                                <tr class="gradeX">
                                                  <th scope="row">&nbsp;</th>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <td><p><strong>Tagihan</strong></p>
           

                                             <td>&nbsp;</td>
                                               
                                                  <td><div align="right" style="border-bottom:2px #000 solid; border-top:2px #000 solid"><strong>Rp.  <?php echo number_format($grands,0,'.','.'); ?></strong></div></td>
                                                  <td><div align="right" style="border-bottom:2px #000 solid; border-top:2px #000 solid"><strong>Rp.  <?php echo number_format($grand,0,'.','.'); ?></strong></div></td>
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
<div id="modaledit<?php echo $row->id_kwitansi;?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Edit Kwitansi</h3>
            </div>
            <div class="smart-form">
             
                    <div class="modal-body">
                      <div class="form-group">
                        <label class="col-sm-3 control-label"> Tertanggung</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="id5" type="text" id="id5" value="<?php echo $row->id_surat_tugas;?>" readonly="readonly" class="form-control"/>
                        </span></div>
                        <div class="clearfix"></div>
                      </div>
                      
  <div class="form-group">
                        <label class="col-sm-3 control-label">No ST</label>
    <div class="col-sm-9"><span class="controls">
      <input name="id2" type="text" id="id2" value="<?php echo $row->status_kwitansi;?>" readonly="readonly" class="form-control"/>
</span></div>
                        <div class="clearfix"></div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">B.Suvey</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="survey" type="text" id="survey" value="<?php echo $row->uang_surveyor;?>" class="form-control" />
                        </span><span class="controls"><?php echo number_format($dt->uang_survey,0,'.','.');?></span></div>
                        <div class="clearfix"></div>
                      </div>
  <div class="form-group">
                        <label class="col-sm-3 control-label">B.Operasional</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="operasional" type="text" id="operasional" value="<?php echo $row->uang_operasional;?>" class="form-control" />
              </span><span class="controls"><?php echo number_format($dt->b_operasional,0,'.','.');?></span></div>
                        <div class="clearfix"></div>
                      </div>
 <div class="form-group">
                        <label class="col-sm-3 control-label">B.Klaim</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="klaim" type="text" id="klaim" value="<?php echo $row->uang_klaim;?>" class="form-control"/>
              </span><span class="controls"><?php echo number_format($dt->gagal_klaim,0,'.','.');?></span></div>
                        <div class="clearfix"></div>
                      </div>
 <div class="modal-footer">
<button class="btn btn-primary" data-dismiss="modal" aria-hidden="true"><i class="icon-close icons">&nbsp;</i> Close</button>
                       
                </div>
                    </div>
            
              
            </div>
        </div>
    </div>
    </div>
<?php } ?>


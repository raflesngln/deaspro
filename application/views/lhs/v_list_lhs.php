<style type="text/css">

.main-content{background-color:#F0F0F0}
#bln, #thn,#nost,#nost{ height: 35px; width: 90px}
</style>

<section class="main-content">
    <div class="container">
        <div class="page-content">
            <div class="header">
              <h2><strong>List</strong>LHS </h2>
                <div class="breadcrumb-wrapper">
                  <ol class="breadcrumb">
                    <li><a href="#">Home</a>
                    </li>
                    <li class="active">List LHS</li>
                  </ol>
                </div>
            </div>
<div class="page" align="right">
<form action="<?php echo base_url();?>lhs/cari_lhs" method="post">
  <input name="nost" type="text" id="nost" placeholder=" Search ST"/>

<input name="" type="submit" value="Cari ST"  class="btn btn-info btn-large" />
</form>
<br />
<form action="<?php echo base_url();?>lhs/lhs_periode" method="post">
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
      <td><label for="customer"><span class="controls">
        <select name="bln" id="bln" required="required">
       
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
        <select name="thn" id="thn" required="required">
           
          <?php 
					for($i=2015;$i<=2050;$i++){
					?>
          <option value="<?php echo $i;?>"><?php echo $i;?></option>
          <?php } ?>
        </select>
      </span></td>
      <td><input type="submit" name="btncari" id="btncari" value="Tampilkan" class="btn-primary btn-large"  /></td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>
&nbsp;
<?php echo isset($paginator)?$paginator:''; ?>

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
                                                  <th colspan="3"><?php isset($judul)?$judul:'';?></th>
                                                  <th>&nbsp;</th>
                                                  <th>&nbsp;</th>
                                                  <th>&nbsp;</th>
                                                  <th>&nbsp;</th>
                                                  <th>&nbsp;</th>
                                                  <th>&nbsp;</th>
                                                  <th>&nbsp;</th>
                                                  <th class="text-center">&nbsp;</th>
                                                </tr>
                                                <tr>
                                                  <th>No.</th>
                                                  <th> No ST</th>
                                                  <th>Tertanggung</th>
                                                  <th>Surveyor</th>
                                                  <th colspan="2">Manager</th>
                                                  <th colspan="2">Surveyor</th>
                                                  <th>&nbsp;</th>
                                                  <th>Status</th>
                                                  <th class="text-center">Action</th>
                                                </tr>
                                              </thead>
                                              <tbody>
   
                                                <tr class="gradeX">
                                                  <th scope="row">&nbsp;</th>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <td>App</td>
                                                  <td>Tgl Apv</td>
                                                  <td>App</td>
                                                  <td>Tgl Apv</td>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <td class="text-center">&nbsp;</td>
                                                </tr>
                                 <?php
	$no=1;
        foreach($list as $row){
	
	$surveyor=$row->surveyor_app;
	$manager=$row->manager_app;
	
$tgl_manager_app=$row->tgl_manager_app;
if($tgl_manager_app==''){ $tglmng='';} else { $tglmng=date("d-M-Y",strtotime($row->tgl_manager_app));}
	
if($surveyor=='1'){ $surv_status='YA';} else { $surv_status='BELUM';}
if($manager=='1'){ $mng_status='YA';} else { $mng_status='BELUM';}
	
if($surveyor=='1' AND $manager=='1'){
$status='Terkirim';
}
else{
	$status='Belum Terkirim';
}

$acc=$row->tgl_acc;
$tglacc=$row->tgl_acc;
$tgl2='';
if($acc=='')
{
$tgl2=date('Y-m-d'); //klo blm acc bandingin tgl sekarang(tgl selisih berjalan)
}
else
{
$tgl2=date("Y-m-d",strtotime($row->tgl_acc));//banding tgl acc/tgl selisih berhenti
}
			
$terbitkuasa=date("Y-m-d",strtotime($row->terbit_kuasa));

$tgl1=date("Y-m-d",strtotime($terbitkuasa));  //tgl di db

$pecah1=explode("-",$tgl1);
$date1=$pecah1[2];
$month1=$pecah1[1];
$year1=$pecah1[0];

$pecah2=explode("-",$tgl2);
$date2=$pecah2[2];
$month2=$pecah2[1];
$year2=$pecah2[0];

$jd1=gregoriantojd($month1,$date1,$year1);
$jd2=gregoriantojd($month2,$date2,$year2);
$total_hari=$jd2-$jd1;
if($total_hari <=14)
{

$tenggang='<i class="fa fa-check-square-o"> '.$total_hari;	
}
elseif($total_hari >=14)
{
$hasil=$total_hari-14;
$tenggang='<i class="fa fa-times"> '.$hasil;
//$tenggang=1;	
}
//$selisih=$total_hari;
//if($selisih<=0)
//$selisih=0;


            ?>               
                                                
                                                <tr class="gradeX">
                                                    <th scope="row"><?php echo $no;?></th>
                                                    <td><?php echo $row->id_surat_tugas; ?></td>
                                                    <td><?php echo $row->nm_tertanggung; ?></td>
                                                    <td><?php echo $row->nm_surveyor; ?></td>
                                                    <td><?php echo $mng_status;?></td>
                                                    <td><?php echo $tglmng; ?></td>
                                                    <td><?php echo $surv_status;?></td>
                                                    <td><?php echo date("d-M-Y",strtotime($row->tgl_surveyor_app)); ?></td>
                                                    <td><div align="center"><?php echo $tenggang; ?></div></td>
                                                    <td><div align="center"><?php echo $status; ?>&nbsp; </div></td>
                                                    <td class="text-center">
                                                      
                                                      
      <a class="btn-action" href="<?php echo base_url();?>lhs/edit_lhs/<?php echo $row->id_lhs;?>" title="Edit LHS"><i class="icon-note icons"></i></a>
      <a class="btn-action" href="<?php echo base_url();?>lhs/cetak_lhs/<?php echo $row->id_lhs ;?>" title="Cetak"><i class="icon-eye icons"></i></a>
                                                      
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
<style type="text/css">
a{text-decoration:none}
.page {	width:99%;
	padding-bottom:10px;
}

.top-cari{border:1px #2D9FAC solid;border-radius:5px; padding-top:3px; padding-bottom:3px; width:60%}
.top-cari #bln,#thn{ width:120px; height:30px}

.page a{
	border:2px #CCC solid;
	width:auto;
	padding:0px 10px 0px 10px;
	color:#C60;
}
#asuransi{ height:30px; width:190px}

.table{border:1px #CCC solid; width:99%; padding-bottom:20px}
.table tr td{ border-right:1px #CCC solid; border-bottom:1px #CCC solid;padding-left:2px; width:auto}
#btncari,#btncetak{background-color:#2D2D2D; color:#FFF; border:none; cursor:pointer; border-radius:4px}
.fa-times{ color:#F00}
.fa-check-square-o{color:#00A854;}

</style>
 
<h2 align="center">
   <i class="fa fa-list"></i>&nbsp;DATA LIST LHS
</h2>
<!--================ ===========================================-->
<div class="page" align="right">
<form action="<?php echo base_url();?>manager/cari_lhs" method="post">
  Nomor LHS 
  <input name="lhs" type="text" />
<input name="" type="submit" value="Cari LHS" style="background-color:#00A854; height:25px; width:90px; border:none; color:#FFF; border-radius:5px" />
</form>
<br />
<form action="<?php echo base_url();?>manager/lhs_periode" method="post">
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
        <select name="asuransi" id="asuransi" required="required">
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
      <td><input type="submit" name="btncetak" id="btncetak" value="Cetak" style="width:120px; height:30px" class="btn btn-success" /></td>
    </tr>
  </table>
</form>
&nbsp;
<?php echo isset($paginator)?$paginator:''; ?>

</div>

<h3 align="center"><?php isset($judul)?$judul:'';?></h3>
<table width="99%" class="table table-striped table-bordered table-hover">
      <thead>
        <tr bgcolor="lavender">
          <th width="2%" rowspan="2">No</th>
          <th width="9%" rowspan="2">Nomor LHS</th>
          <th width="15%" rowspan="2">Nama Tertanggung</th>
          <th width="21%" rowspan="2"><div align="center">Nama Surveyor</div></th>
          <th height="21" colspan="2"><div align="center">Manager</div></th>
          <th colspan="2"><div align="center">Surveyor</div></th>
          <th width="7%" rowspan="2"><div align="center">Tenggang</div></th>
          <th width="9%" rowspan="2"><div align="center">Status</div></th>
          <th colspan="2" rowspan="2"><div align="center">Action</div></th>
        </tr>
        <tr bgcolor="lavender">
          <th width="6%" height="26"><div align="center">App</div></th>
          <th width="7%"><div align="center">Tgl App</div></th>
          <th width="6%"><div align="center">App</div></th>
          <th width="7%"><div align="center">Tgl App</div></th>
          </tr>
        </thead>
      <tbody>
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
			
$terbitkuasa=date("Y-m-d",strtotime($row->terbit_kuasa));

$tgl2=date('Y-m-d'); //tgl sekarang
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
if($total_hari <=10)
{

$tenggang='<i class="fa fa-check-square-o"> '.$total_hari;	
}
elseif($total_hari >=10)
{
$hasil=$total_hari-10;
$tenggang='<i class="fa fa-times"> '.$hasil;
//$tenggang=1;	
}
//$selisih=$total_hari;
//if($selisih<=0)
//$selisih=0;


            ?>
        <tr class="gradeX">
          <td height="22"><?php echo $no; ?></td>
          <td><?php echo $row->id_lhs; ?></td>
          <td><?php echo $row->nm_tertanggung; ?></td>
          <td><?php echo $row->nm_surveyor; ?></td>
          <td><?php echo $mng_status;?></td>
          <td><?php echo $tglmng; ?></td>
          <td><?php echo $surv_status;?></td>
          <td><?php echo date("d-M-Y",strtotime($row->tgl_surveyor_app)); ?></td>
          <td><div align="center"><?php echo $tenggang; ?> &nbsp;</div></td>
          <td><div align="center"><?php echo $status; ?>&nbsp; </div></td>
          <td width="5%"><a href="<?php echo base_url();?>manager/edit_lhs/<?php echo $row->id_lhs;?>"><i class="fa fa-pencil"></i> &nbsp;Edit </a></td>
          <td width="5%"><a href="<?php echo base_url();?>manager/app_lhs/<?php echo $row->id_lhs;?>" onclick="return confirm('Yakin Approve LHS ini ?')"><i class="fa fa-check"></i> App</a></td>
          </tr>
        <?php $no++; } ?>
      </tbody>
    </table> 
<div class="page" align="center"><?php echo isset($paginator)?$paginator:''; ?></div>

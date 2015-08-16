<?php
///*
header("Cache-Control:no-cache,no-store,must-revalidate");
header("Content-Type:application/vnd.ms-word");
header("Content-Disposition:attachment;filename=Data LHS.doc");
//*/
?>
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
#customer{ height:30px; width:190px}

.table{border:2px #CCC solid; width:99%; padding-bottom:20px}
.table tr td{ border-right:1px #CCC solid; border-bottom:1px #CCC solid;padding-left:2px; width:auto}
#btncari,#btncetak{background-color:#2D2D2D; color:#FFF; border:none; cursor:pointer; border-radius:4px}
</style>
 
<h2 align="center">
   <i class="fa fa-list"></i>&nbsp;DATA LIST LHS
</h2>
<!--================ ===========================================-->

<h3 align="center"><?php isset($judul)?$judul:'';?></h3>
<table width="99%" class="table table-striped table-bordered table-hover">
<tbody>
  <tr class="gradeX">
    <td width="7%"><table width="99%" class="table table-striped table-bordered table-hover">
      <thead>
        <tr bgcolor="lavender">
          <th width="2%" rowspan="2">No</th>
          <th width="9%" rowspan="2">Nomor S.Tugas</th>
          <th width="15%" rowspan="2">Nama Tertanggung</th>
          <th width="21%" rowspan="2"><div align="center">Nama Surveyor</div></th>
          <th height="21" colspan="2"><div align="center">Manager</div></th>
          <th colspan="3"><div align="center">Surveyor</div></th>
          <th width="7%" rowspan="2"><div align="center">Tenggang</div></th>
          <th width="9%" rowspan="2"><div align="center">Status</div></th>
          </tr>
        <tr bgcolor="lavender">
          <th width="6%" height="26"><div align="center">App</div></th>
          <th width="7%"><div align="center">Tgl App</div></th>
          <th width="1%">&nbsp;</th>
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
if($surveyor=='1'){ $surv_status='YA';} else { $surv_status='BELUM';}
if($manager=='1'){ $mng_status='YA';} else { $mng_status='BELUM';}
	
if($surveyor=='1' AND $manager=='1'){
$status='Terkirim';
}
else{
	$status='Belum Terkirim';
}
			
$tgl_surat_tugas=date("Y-m-d",strtotime($row->tgl_surat_tugas));

$tgl2=date('Y-m-d'); //tgl sekarang
$tgl1=date("Y-m-d",strtotime($tgl_surat_tugas));  //tgl di db

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
$selisih=$total_hari;
if($selisih<=0)
$selisih=0;


            ?>
        <tr class="gradeX">
          <td height="40"><?php echo $no; ?></td>
          <td><?php echo $row->id_surat_tugas; ?></td>
          <td><?php echo $row->nm_tertanggung; ?></td>
          <td><?php echo $row->nm_surveyor; ?></td>
          <td><?php echo $mng_status;?></td>
          <td><?php echo $row->tgl_manager_app; ?></td>
          <td>&nbsp;</td>
          <td><?php echo $surv_status;?></td>
          <td><?php echo date("d-M-Y",strtotime($row->tgl_surveyor_app)); ?></td>
          <td><div align="center"><?php echo $selisih; ?> &nbsp;days</div></td>
          <td><div align="center"><?php echo $status; ?>&nbsp; </div></td>
          </tr>
        <?php $no++; } ?>
      </tbody>
    </table> </td>
  </tr>
</tbody>
</table>

<?php exit();?>

<link href="<?php echo base_url()?>asset/fontawesome/style/fontawesome.css" type="text/css" rel="stylesheet" />
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo base_url('asset/css/bootstrap.css')?>"/>
    <link rel="stylesheet" href="<?php echo base_url('asset/css/bootstrap-responsive.css')?>"/>
    <link rel="stylesheet" href="<?php echo base_url('asset/css/chosen.css')?>"/>
    <link rel="stylesheet" href="<?php echo base_url('asset/css/style.css')?>"/>
    <style type="text/css">
        .chzn-container-single .chzn-search input{
            width: 100%;
        }
    </style>

    <!-- Fav icon -->
    <link rel="shortcut icon" href="<?php echo base_url('asset/images/favicon.ico')?>">

    <!-- JS -->
    <script type="text/javascript" src="<?php echo base_url('asset/js/jquery.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('asset/js/bootstrap.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('asset/js/chosen.jquery.js');?>"></script>
    <script type="text/javascript">
        $(function(){
            $('.chzn-select').chosen();
            $('.chzn-select-deselect').chosen({allow_single_deselect:true});
        });

    </script>
    
    
<style type="text/css">
a{text-decoration:none}
.page {	width:99%;
	padding-bottom:10px;
	border:1px #CCC dotted;
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

.table{border:2px #CCC solid; width:99%; padding-bottom:20px;margin-left:-5px;}
.table tr td{ border-right:1px #CCC solid; border-bottom:1px #CCC solid;padding-left:2px; width:auto}
#btncari,#btncetak{background-color:#008282; color:#FFF; border:none; cursor:pointer; border-radius:4px}
#asuransi {height:30px; width:190px}
</style>
 

<!--================ ===========================================-->
<p><?php echo isset($periode)?$periode:'';?></p>
<h2 align="">Laporan Kwitansi</h2>
<table width="99%" class="table table-striped table-bordered table-hover">
    <thead>
    <tr bgcolor="lavender">
        <th width="2%" height="37">No</th>
        <th width="5%">N0. ST</th>
        <th width="3%">Tgl kw</th>
        <th width="5%">Asuransi</th>
        <th width="9%">Nama Pelanggan</th>
        <th width="8%">&nbsp;</th>
        <th width="11%"><div align="center">B.Survey</div></th>
        <th width="9%"><div align="center">B.Opers</div></th>
        <th width="9%"><div align="center">B.Klaim</div></th>
        <th width="11%"><div align="center">Sub Total</div></th>
        <th width="9%"><div align="center">Sisa</div></th>
        <th width="4%">Status</th>
      </tr>
    </thead>
    <tbody>
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
              <td height="40"><?php echo $no; ?></td>
              <td><?php echo $row->id_surat_tugas; ?></td>
              <td><?php echo $row->tgl_kwitansi; ?></td>
              <td><?php echo $row->username; ?></td>
              <td><?php echo $row->nm_tertanggung; ?></td>
              <td width="8%"><p>Tagihan</p>
              <p>Rek.Koran</p>
              <p>Pajak</p></td>
              <td width="11%"><p align="right"><?php echo number_format($row->survey,0,'.','.'); ?>&nbsp;<?php echo $isurvey?>
                </p>
                <p align="right"><?php echo number_format($b_sur,0,'.','.'); ?></p>
              <p align="right"><?php echo number_format($pajak_survey,0,'.','.'); ?></p></td>
              <td><p align="right"><?php echo number_format($row->operasional,0,'.','.'); ?>&nbsp;<?php echo $operasional?>
              </p>
                <p align="right"><?php echo number_format($b_opr,0,'.','.'); ?></p>
              <p align="right"><?php echo number_format($pajak_opr,0,'.','.'); ?></p></td>
              <td><p align="right"><?php echo number_format($row->klaim,0,'.','.'); ?>&nbsp;<?php echo $klaim?>
              </p>
                <p align="right"><?php echo number_format($b_klm,0,'.','.'); ?></p>
              <p align="right"><?php echo number_format($pajak_klm,0,'.','.'); ?></p></td>
              <td><p align="right"><?php echo number_format($total,0,'.','.'); ?>
              </p>
                <p align="right"><?php echo number_format($sub_koran,0,'.','.'); ?></p>
              <p align="right"><?php echo number_format($sub_pajak,0,'.','.'); ?></p></td>
              <td><p align="right">&nbsp;</p>
              <p align="right"><?php echo number_format($sisa,0,'.','.'); ?></p>
              <p align="right">&nbsp;</p></td>
              <td><p align="right">&nbsp;</p><?php echo $row->status_kwitansi; ?></td>
            </tr><?php $no++; } ?>
            <tr class="gradeX">
              <td height="98">&nbsp;</td>
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
              <td><div align="right" style="border:1px #CCC solid; border-bottom:2px #000 solid; border-top:2px #000 solid"><strong>Rp.  <?php echo number_format($dt->jumlah1,0,'.','.'); ?></strong></div>
              <div align="right" style="border:1px #CCC solid; border-bottom:2px #000 solid; border-top:2px #000 solid"><strong>Rp.  <?php echo number_format($sub_koran_survey,0,'.','.'); ?></strong></div>
              <div align="right" style="border:1px #CCC solid; border-bottom:2px #000 solid; border-top:2px #000 solid"><strong>Rp.  <?php echo number_format($sub_pajak_survey,0,'.','.'); ?></strong></div>
              </td>
              <td><div align="right" style="border:1px #CCC solid; border-bottom:2px #000 solid; border-top:2px #000 solid"><strong>Rp.  <?php echo number_format($dt->jumlah2,0,'.','.'); ?></strong></div>
              
              <div align="right" style="border:1px #CCC solid; border-bottom:2px #000 solid; border-top:2px #000 solid"><strong>Rp.  <?php echo number_format($sub_koran_oper,0,'.','.'); ?></strong></div>
              
              <div align="right" style="border:1px #CCC solid; border-bottom:2px #000 solid; border-top:2px #000 solid"><strong>Rp.  <?php echo number_format($sub_pajak_oper,0,'.','.'); ?></strong></div>
              </td>
              <td><div align="right" style="border:1px #CCC solid; border-bottom:2px #000 solid; border-top:2px #000 solid"><strong>Rp.  <?php echo number_format($dt->jumlah3,0,'.','.'); ?></strong></div>
              <div align="right" style="border:1px #CCC solid; border-bottom:2px #000 solid; border-top:2px #000 solid"><strong>Rp.  <?php echo number_format($sub_koran_klaim,0,'.','.'); ?></strong></div>
              
              <div align="right" style="border:1px #CCC solid; border-bottom:2px #000 solid; border-top:2px #000 solid"><strong>Rp.  <?php echo number_format($sub_pajak_klaim,0,'.','.'); ?></strong></div>
              </td>
              
              <?php } ?>
              <td>
              <div align="right" style="border:1px #CCC solid; border-bottom:2px #000 solid; border-top:2px #000 solid"><strong>Rp. <?php echo number_format($grand,0,'.','.'); ?></strong></div>
           <div align="right" style="border:1px #CCC solid; border-bottom:2px #000 solid; border-top:2px #000 solid"><strong>Rp. <?php echo number_format($total_koran,0,'.','.'); ?></strong></div>
         <div align="right" style="border:1px #CCC solid; border-bottom:2px #000 solid; border-top:2px #000 solid"><strong>Rp. <?php echo number_format($total_pajak,0,'.','.'); ?></strong></div> 
              
              </td>
              <td> <p align="right">&nbsp;</p> <div align="right" style="border:1px #CCC solid; border-bottom:2px #000 solid; border-top:2px #000 solid"><strong>Rp.  <?php echo number_format($grands,0,'.','.'); ?></strong></div>
              </td>
              <td></td>
            </tr>
            
    </tbody>
</table>



<div class="paginator" align="center"><?php echo isset($paginator)?$paginator:''; ?></div>

<!-- ============ MODAL EDIT DATA =============== -->
<?php
if (isset($list)){
    foreach($det_kw as $row){
        ?>
<?php }
}
?>

<!-- ============ MODAL EDIT DATA =============== -->
<?php
if (isset($list)){
    foreach($det_kw as $row){
        ?>
<?php }
}
?>

<!-- ============ MODAL EDIT DATA =============== -->

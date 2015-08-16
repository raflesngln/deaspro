<?php
///*
header("Cache-Control:no-cache,no-store,must-revalidate");
header("Content-Type:application/vnd.ms-word");
header("Content-Disposition:attachment;filename=Laporan Kwitansi.doc");
//*/
?>
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

.table{border:2px #CCC solid; width:99%; padding-bottom:20px}
.table tr td{ border-right:1px #CCC solid; border-bottom:1px #CCC solid;padding-left:2px; width:auto}
#btncari,#btncetak{background-color:#2D2D2D; color:#FFF; border:none; cursor:pointer; border-radius:4px}
#asuransi {height:30px; width:190px}
</style>
 

<!--=================================================-->
<div class="page" align="right"><br />
<h3 align="center">LAPORAN   KWITANSI </h3>
&nbsp;</div>


<table width="99%" class="table table-striped table-bordered table-hover">
    <thead>
    <tr bgcolor="lavender">
        <th width="2%" height="37">No</th>
        <th width="9%">Nomor kw</th>
        <th width="6%">Tgl kw</th>
        <th width="12%">Cust</th>
        <th width="21%">Nama Pelanggan</th>
        <th><div align="center">B.Survey</div></th>
        <th width="5%"><div align="center">B.Opers</div></th>
        <th width="8%"><div align="center">B.Klaim</div></th>
        <th width="8%"><div align="center">Sisa</div></th>
        <th width="11%"><div align="center">Total</div></th>
      </tr>
    </thead>
    <tbody>
    <?php
	$no=1;
        foreach($list as $row){
			
$survey=$row->status_survey;
$operasional=$row->status_operasional;
$klaim=$row->status_klaim;

if($survey=='0'){$harga1=$row->survey; $survey='X';} else{$harga1=0;$survey='v';}
if($klaim=='0'){$harga2=$row->klaim; $klaim='X';} else{$harga2=0;$klaim='v';}
if($operasional=='0'){$harga3=$row->operasional;$operasional='X';} else{$harga3=0;$operasional='v';}

$sisa=$harga1+$harga2+$harga3;
            ?>
            <tr class="gradeX">
              <td height="40"><?php echo $no; ?></td>
              <td><?php echo $row->id_kwitansi; ?></td>
              <td><?php echo $row->tgl_kwitansi; ?></td>
              <td><?php echo $row->username; ?></td>
              <td><?php echo $row->nm_tertanggung; ?></td>
              <td width="8%"><div align="right"><?php echo number_format($row->survey,0,'.','.'); ?><a href="<?php echo base_url();?>kwitansi/lunas_klaim/<?php echo $row->id_kwitansi;?>" onclick="return confirm('Sudah Yakin Bayar ?');"> &nbsp;<?php echo $survey;?></a>&nbsp;</div></td>
              <td><div align="right"><?php echo number_format($row->operasional,0,'.','.'); ?><a href="<?php echo base_url();?>kwitansi/lunas_klaim/<?php echo $row->id_kwitansi;?>" onclick="return confirm('Sudah Yakin Bayar ?');"> &nbsp;<?php echo $operasional?></a>&nbsp;</div></td>
              <td><div align="right"><?php echo number_format($row->klaim,0,'.','.'); ?>&nbsp;<a href="<?php echo base_url();?>kwitansi/lunas_klaim/<?php echo $row->id_kwitansi;?>" onclick="return confirm('Sudah Yakin Bayar ?');"><?php echo $klaim?></a></div></td>
              <td><div align="center"><?php echo number_format($sisa,0,'.','.'); ?></div></td>
              <td><div align="center"><?php echo number_format($row->total,0,'.','.'); ?></div></td>
            </tr>
            <?php $no++; } ?>
    </tbody>
</table>




<!-- ============ MODAL EDIT DATA =============== -->
<?php
if (isset($list)){
    foreach($list as $row){
        ?>
<?php }
}
?>
<?php exit(); ?>
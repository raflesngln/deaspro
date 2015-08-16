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
.halaman {	width:99%;
padding-left:10px;
margin-bottom:10px;
	margin-bottom:3px;
}
.halaman a{
	border:1px #CCC solid;
	width:auto;
	padding:0px 10px 0px 10px;
	color:#C60;
	
}
.top-cari{border:1px #2D9FAC solid;border-radius:5px; padding-top:3px; padding-bottom:3px; width:60%}
.top-cari #bln,#thn{ width:120px; height:30px; margin-left:2px; margin-top:5px}

#customer{ height:30px; width:190px}

.table{border:2px #CCC solid; width:99%; padding-bottom:20px;margin-left:-6px;}
.table tr td{ border-right:0px #CCC solid; border-bottom:0px #CCC solid;padding-left:2px; width:auto}
#btncari,#btncetak{background-color:#008282; color:#FFF; border:none; cursor:pointer; border-radius:4px}
#asuransi {height:30px; width:190px}
.tbl{width:60%; margin-left:9%; height:40px}
</style>
 

<!--===========================================================-->
<div class="page" align="right">
<h3 align="center">
  <i class="fa fa-bar-chart"></i>Laporan Kwitansi</h3>
<form action="<?php echo base_url();?>kwitansi/cari_lap_st" method="post">
  <input name="st" type="text" id="st" placeholder="Search ST" />
<input name="" type="submit" value="Cari ST"  id="btncari" style="width:100px; height:30px"/>
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
        <select name="asuransi" id="asuransi" required="required">
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
        <select name="status" id="status" required="required">
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
      <td><input type="submit" name="btncari" id="btncari" value="Tampil" style="width:100px; height:30px" /></td>
      <td>&nbsp;</td>
      <td><input type="submit" name="btncetak" id="btncetak" value="Cetak" style="width:100px; height:30px" /></td>
    </tr>
  </table>
</form>


</div>
<p><?php echo isset($periode)?$periode:'';?></p>
<div class="halaman"><?php echo isset($paginator)?$paginator:''; ?></div>
<table width="99%" class="table table-striped table-bordered table-hover">
    <thead>
    <tr bgcolor="lavender">
        <th width="2%" height="37">No</th>
        <th width="8%">Asuransi</th>
        <th width="11%">No ST</th>
        <th width="13%">Tgl kw</th>
        <th>No KW</th>
        <th>Ket.Biaya</th>
        <th width="14%"><div align="center">Bayar / Tagihan</div></th>
        <th width="8%"><div align="center">Sisa Rp</div></th>
        <th width="9%"><div align="center">Total  Rp</div></th>
        <th width="6%">Action</th>
      </tr>
    </thead>
    <tbody>
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
              <td height="22"><?php echo $no; ?></td>
              <td><?php echo $row->username; ?></td>
              <td><?php echo $row->id_surat_tugas; ?></td>
              <td><?php echo date("d/m/Y",strtotime($row->tgl_kwitansi)); ?></td>
              <td width="20%"><?php echo $row->no_kwitansi_sr; ?></td>
              <td width="6%"><div align="left"><strong>B.Survey</strong></div></td>
              <td><div align="right"><?php echo number_format($row->uang_surveyor,0,'.','.'); ?> / <?php echo number_format($row->survey,0,'.','.'); ?>&nbsp;<?php echo $survey?></div></td>
              <td rowspan="3" style="border-bottom:1px #000 dashed"><div align="right"><?php echo number_format($sisa,0,'.','.'); ?></div></td>
              <td rowspan="3" style="border-bottom:1px #000 dashed"><div align="right"><?php echo number_format($total,0,'.','.'); ?></div></td>
              <td rowspan="3"><span style="border-bottom:1px #000 dashed"><a class="tbl btn btn-mini btn-primary" href="#modalEditBarang3<?php echo $row->id_kwitansi?>" data-toggle="modal"><i class="fa fa-eye fa-2x"></i> view</a></span></td>
            </tr>
            <tr class="gradeX">
              <td height="22">&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td><?php echo $row->no_kwitansi_op; ?></td>
              <td><div align="left"><strong>B.Opers</strong></div></td>
              <td><div align="right"><?php echo number_format($row->uang_operasional,0,'.','.'); ?> / <?php echo number_format($row->operasional,0,'.','.'); ?>&nbsp;<?php echo $operasional?></div></td>
            </tr>                 
            <tr class="gradeX">
              <td height="22" style="border-bottom:1px #000 dashed">&nbsp;</td>
              <td style="border-bottom:1px #000 dashed">&nbsp;</td>
              <td style="border-bottom:1px #000 dashed">&nbsp;</td>
              <td style="border-bottom:1px #000 dashed">&nbsp;</td>
              <td style="border-bottom:1px #000 dashed"><?php echo $row->no_kwitansi_kl; ?></td>
              <td style="border-bottom:1px #000 dashed"><div align="left"><strong>B.Klaim</strong></div></td>
              <td style="border-bottom:1px #000 dashed"><div align="right"><?php echo number_format($row->uang_klaim,0,'.','.'); ?> / <?php echo number_format($row->klaim,0,'.','.'); ?>&nbsp;<?php echo $klaim?></div></td>
            </tr><?php $no++; } ?>
            <tr class="gradeX">
              <td height="22" style="border-bottom:1px #000 dashed">&nbsp;</td>
              <td style="border-bottom:1px #000 dashed">&nbsp;</td>
              <td style="border-bottom:1px #000 dashed">&nbsp;</td>
              <td style="border-bottom:1px #000 dashed">&nbsp;</td>
              <td style="border-bottom:1px #000 dashed">&nbsp;</td>
              <td style="border-bottom:1px #000 dashed">&nbsp;</td>
              <td style="border-bottom:1px #000 dashed">&nbsp;</td>
              <td style="border-bottom:1px #000 dashed"><div align="right" style="border-bottom:2px #000 solid; border-top:2px #000 solid"><strong>Rp.  <?php echo number_format($grands,0,'.','.'); ?></strong></div></td>
              <td style="border-bottom:1px #000 dashed"><div align="right" style="border-bottom:2px #000 solid; border-top:2px #000 solid"><strong>Rp.  <?php echo number_format($grand,0,'.','.'); ?></strong></div></td>
              <td style="border-bottom:1px #000 dashed">&nbsp;</td>
            </tr>
            
    </tbody>
</table>



<div class="halaman" align="center"><?php echo isset($paginator)?$paginator:''; ?></div>

<!-- ============ MODAL EDIT DATA =============== -->
<?php
if (isset($det_kw)){
    foreach($det_kw as $dt){
        ?>
<div id="modalEditBarang3<?php echo $dt->id_kwitansi;?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Detail Pembayaran Kwitansi</h3>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo site_url('kwitansi/edit_kwitansi')?>">
                <div class="modal-body">
                    <div class="control-group">
                        <label class="control-label">
                          <div align="left">Nomor ST</div>
                        </label>
                    <div class="controls">
                      <input name="id" type="text" id="id" value="<?php echo $dt->id_surat_tugas;?>" />
                    </div>
                    </div>
    <div class="control-group">
                        <label class="control-label">
                          <div align="left">Status Kwitansi</div>
                        </label>
                    <div class="controls">
                      <input name="id" type="text" id="id" value="<?php echo $dt->status_kwitansi;?>" />
                    </div>
                    </div>
      <hr style="border:1px solid #CCC"/>
                  <div class="control-group">
                      <label class="control-label" >
                        <div align="left">Uang Survey</div>
                    </label>
                  <div class="controls">
                    <input name="operasional2" type="text" id="operasional2" value="<?php echo $dt->uang_surveyor;?>" readonly="readonly" /> 
                    / <?php echo number_format($dt->uang_survey,0,'.','.');?>
                  </div>
                    </div>
<div class="control-group">
                        <label class="control-label" >
                          <div align="left">Uang Operasional</div>
                        </label>
                  <div class="controls">
             <input name="operasional" type="text" id="operasional" value="<?php echo $dt->uang_operasional;?>" readonly="readonly">
                  / <?php echo number_format($dt->b_operasional,0,'.','.');?></div>
                  </div>
                    <div class="control-group">
                        <label class="control-label" >
                          <div align="left">Uang Klaim</div>
                        </label>
                  <div class="controls">
             <input name="klaim" type="text" id="klaim" value="<?php echo $dt->uang_klaim;?>" readonly="readonly">
/                        <?php echo number_format($dt->gagal_klaim,0,'.','.');?></div>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                </div>
            </form>
</div>
    <?php }
}
?>

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
.table{margin-left:-6px;}
</style>
 
<h3 align="center">
  <i class="fa fa-list"></i>  DATA KWITANSI PIUTANG
</h3>
<!--===========================================================-->
<div class="page" align="right">
<form action="<?php echo base_url();?>kwitansi/cari_kwitansi" method="post">
Nomor Kwitansi
<input name="kw" type="text" />
<input name="" type="submit" value="Cari KW" style="background-color:#00A854; height:25px; width:90px; border:none; color:#FFF; border-radius:5px" />
</form>

<form action="<?php echo base_url();?>kwitansi/kwitansi_periode" method="post">
<table width="100%" height="58" border="0" class="top-cari">
    <tr>
      <td width="855" height="21">&nbsp;</td>
      <td width="113"> Asuransi</td>
      <td width="41"><span class="controls">Bulan</span></td>
      <td width="41"><span class="controls">Tahun</span></td>
      <td width="41">&nbsp;</td>
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
      <td><input type="submit" name="btncari" id="btncari" value="Tampil" style="width:100px; height:30px" /></td>
      <td>&nbsp;</td>
      <td><input type="submit" name="btncetak" id="btncetak" value="Cetak" style="width:100px; height:30px" /></td>
    </tr>
  </table>
</form>
&nbsp;
<?php echo isset($paginator)?$paginator:'';; ?>

</div>


<table width="99%" class="table table-striped table-bordered table-hover">
    <thead>
    <tr bgcolor="lavender">
        <th width="2%" height="37">No</th>
        <th width="8%">Asuransi</th>
        <th width="4%">No ST</th>
        <th width="5%">Tgl kw</th>
        <th width="16%">Nama Pelanggan</th>
        <th><div align="center">B.Survey</div></th>
        <th width="7%"><div align="center">B.Opers</div></th>
        <th width="7%"><div align="center">B.Klaim</div></th>
        <th width="7%"><div align="center">Sisa</div></th>
        <th width="7%"><div align="center">Total</div></th>
        <th colspan="4">Action</th>
      </tr>
    </thead>
    <tbody>
    <?php
	$no=1;
        foreach($list as $row){
			
$survey=$row->status_survey;
$operasional=$row->status_operasional;
$klaim=$row->status_klaim;

if($survey=='0'){$harga1=$row->survey; $survey='<i class="fa fa-times-circle"></i> <?php';} else{$harga1=0;$survey='<i class="fa fa-check-circle-o"></i><?php';}
if($klaim=='0'){$harga2=$row->klaim; $klaim='<i class="fa fa-times-circle"></i> <?php';} else{$harga2=0;$klaim='<i class="fa fa-check-circle-o"></i><?php';}
if($operasional=='0'){$harga3=$row->operasional;$operasional='<i class="fa fa-times-circle"></i> <?php';} else{$harga3=0;$operasional='<i class="fa fa-check-circle-o"></i><?php';}

$sisa=$harga1+$harga2+$harga3;
            ?>
            <tr class="gradeX">
              <td height="40"><?php echo $no; ?></td>
              <td><?php echo $row->username; ?></td>
              <td><?php echo $row->id_kwitansi; ?></td>
              <td><?php echo $row->tgl_kwitansi; ?></td>
              <td><?php echo $row->nm_tertanggung; ?></td>
              <td width="8%"><div align="right"><?php echo number_format($row->survey,0,'.','.'); ?>&nbsp;<?php echo $survey?></div></td>
              <td><div align="right"><?php echo number_format($row->operasional,0,'.','.'); ?>&nbsp;<?php echo $operasional?></div></td>
              <td><div align="right"><?php echo number_format($row->klaim,0,'.','.'); ?>&nbsp;<?php echo $klaim?></div></td>
              <td><div align="center"><?php echo number_format($sisa,0,'.','.'); ?></div></td>
              <td><div align="center"><?php echo number_format($row->total,0,'.','.'); ?></div></td>
              <td width="3%"><a class="btn btn-mini" href="#modalEditBarang3<?php echo $row->id_kwitansi?>" data-toggle="modal"><i class="fa fa-eye fa-2x"></i> view</a></td>
              <td width="3%"><a class="btn btn-mini" href="#modalEditBarang2<?php echo $row->id_surat_tugas?>" data-toggle="modal"><i class="fa fa-edit fa-2x"></i> Edit</a></td>
              <td width="4%"><a class="btn btn-mini" href="#modalEditBarang<?php echo $row->id_surat_tugas?>" data-toggle="modal"><i class="fa fa-dollar fa-2x"></i> Bayar</a></td>
              <td width="19%"><a href="<?php echo base_url();?>kwitansi/lunas_kwitansi/<?php echo $row->id_surat_tugas;?>" onclick="return confirm('Yakin kwitansi ini sudah bayar ?')"><i class="fa fa-check-square-o fa-2x"></i> Lunas</a></td>
            </tr>
            <?php $no++; } ?>
    </tbody>
</table>


<div class="page" align="center"><?php echo isset($paginator)?$paginator:''; ?></div>


<!-- ============ MODAL EDIT DATA =============== -->
<?php
if (isset($list)){
    foreach($list as $row){
        ?>
<div id="modalEditBarang<?php echo $row->id_surat_tugas?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Pembayaran Kwitansi</h3>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo site_url('kwitansi/bayar_kwitansi')?>">
                <div class="modal-body">
                    <div class="control-group">
                        <label class="control-label">Nomor ST</label>
                    <div class="controls">
                      <input type="hidden" name="idst" id="idst" value="<?php echo $row->id_kwitansi;?>" />
                      <input type="hidden" name="nm_tertanggung" id="nm_tertanggung" value="<?php echo $row->nm_tertanggung;?>" />
                      <input name="id" type="text" id="id" value="<?php echo $row->id_kwitansi;?>" />
                    </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" >Tertanggung</label>
                    <div class="controls"><?php echo $row->nm_tertanggung;?></div>
                    </div>
<div class="control-group">
  <label class="control-label"><hr style="width:100%" /></label>
  <div class="controls"><hr /></div>
 </div>

                    <div class="control-group">
                        <label class="control-label" >Uang Survey</label>
                  <div class="controls">
             <input name="survey" type="text" id="survey">
                        / <?php echo number_format($row->uang_survey,0,'.','.');?></div>
                    </div>
<div class="control-group">
                        <label class="control-label" >Uang Operasional</label>
                  <div class="controls">
             <input name="operasional" type="text" id="operasional">
              /<?php echo number_format($row->operasional,0,'.','.');?></div>
                  </div>
                    <div class="control-group">
                        <label class="control-label" >Uang Klaim</label>
                  <div class="controls">
             <input name="klaim" type="text" id="klaim">
                        / <?php echo number_format($row->gagal_klaim,0,'.','.');?></div>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    <?php }
}
?>

<!-- ============ MODAL EDIT DATA =============== -->
<?php
if (isset($list)){
    foreach($list as $row){
        ?>
<div id="modalEditBarang2<?php echo $row->id_surat_tugas?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Edit Kwitansi</h3>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo site_url('kwitansi/edit_kwitansi')?>">
                <div class="modal-body">
                    <div class="control-group">
                        <label class="control-label">Nomor ST</label>
                    <div class="controls">
                      <input type="hidden" name="idst" id="idst" value="<?php echo $row->id_kwitansi;?>" />
                      <input type="hidden" name="nm_tertanggung" id="nm_tertanggung" value="<?php echo $row->nm_tertanggung;?>" />
                      <input name="id" type="text" id="id" value="<?php echo $row->id_kwitansi;?>" />
                    </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" >Tertanggung</label>
                    <div class="controls"><?php echo $row->nm_tertanggung;?></div>
                    </div>
<hr />

      <div class="control-group">
                        <label class="control-label" >Uang Survey</label>
                  <div class="controls">
             <input name="survey" type="text" id="survey" value="<?php echo $row->uang_survey;?>">
                        </div>
                    </div>
<div class="control-group">
                        <label class="control-label" >Uang Operasional</label>
                  <div class="controls">
             <input name="operasional" type="text" id="operasional" value="<?php echo $row->operasional;?>">
                        </div>
                  </div>
                    <div class="control-group">
                        <label class="control-label" >Uang Klaim</label>
                  <div class="controls">
             <input name="klaim" type="text" id="klaim" value="<?php echo $row->gagal_klaim;?>">
                        </div>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    <?php }
}
?>

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
                        <label class="control-label">Nomor ST</label>
                    <div class="controls">
                      <input name="id" type="text" id="id" value="<?php echo $dt->id_kwitansi;?>" />
                    </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label" >Uang Survey</label>
                  <div class="controls">
                    <input name="operasional2" type="text" id="operasional2" value="<?php echo $dt->uang_surveyor;?>" readonly="readonly" /> 
                    / <?php echo number_format($dt->uang_survey,0,'.','.');?>
                  </div>
                    </div>
<div class="control-group">
                        <label class="control-label" >Uang Operasional</label>
                  <div class="controls">
             <input name="operasional" type="text" id="operasional" value="<?php echo $dt->uang_operasional;?>" readonly="readonly">
                  / <?php echo number_format($dt->operasional,0,'.','.');?></div>
                  </div>
                    <div class="control-group">
                        <label class="control-label" >Uang Klaim</label>
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

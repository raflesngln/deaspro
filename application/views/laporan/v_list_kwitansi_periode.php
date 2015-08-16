<style type="text/css">
a{text-decoration:none}
.page {	width:99%;
	padding-bottom:10px;
	border:1px #CCC dotted;
}

.top-cari{border:1px #CCC solid;border-radius:5px; padding-top:3px; padding-bottom:3px;}
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
</style>
 
<h2>
    DATA KWITANSI PIUTANG
</h2>
<!--================ ===========================================-->
<div class="page" align="right">
<form action="" method="post">
<input name="" type="text" />
<input name="" type="submit" value="Cari Fak." style="background-color:#00A854; height:25px; width:90px; border:none; color:#FFF; border-radius:5px" />
</form>
<br />
<form action="<?php echo base_url();?>kwitansi/lap_kwitansi_periode" method="post">
<table width="100%" height="77" border="0" class="top-cari">
    <tr>
      <td width="855" height="21">&nbsp;</td>
      <td width="113"> Customer</td>
      <td width="41"><span class="controls">Bulan</span></td>
      <td width="41"><span class="controls">Tahun</span></td>
      <td width="41">&nbsp;</td>
      <td width="41">&nbsp;</td>
    </tr>
    <tr>
      <td height="24">&nbsp;</td>
      <td><span class="controls">
        <select name="customer" id="customer" required="required">
        <option value="semua">Semua Customer</option>
        <option></option>
        <?php
	foreach($customer as $cust){
	    ?>
          <option value="<?php echo $cust->insuranceid;?>"><?php echo substr($cust->insurancename,3);?></option>
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
      <td><input type="submit" name="btncari" id="btncari" value="Sortir" class="btn-success btn-large" style="width:120px; height:30px" /></td>
      <td><input type="submit" name="btncetak" id="btncetak" value="Cetak" style="width:120px; height:30px" class="btn btn-success" /></td>
    </tr>
    <tr>
      <td height="24">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>
&nbsp;
<?php echo $paginator; ?>

</div>


<table width="99%" class="table table-striped table-bordered table-hover">
    <thead>
    <tr bgcolor="lavender">
      <th height="37">&nbsp;</th>
      <th>&nbsp;</th>
      <th>&nbsp;</th>
      <th>&nbsp;</th>
      <th>&nbsp;</th>
      <th>&nbsp;</th>
      <th>&nbsp;</th>
      <th>&nbsp;</th>
      <th>&nbsp;</th>
      <th>&nbsp;</th>
      <th colspan="2">&nbsp;</th>
    </tr>
    <tr bgcolor="lavender">
        <th width="2%" height="37">No</th>
        <th width="8%">Nomor kw</th>
        <th width="7%">Tgl kw</th>
        <th width="13%">Cust</th>
        <th width="21%">Nama Pelanggan</th>
        <th><div align="center">B.Survey</div></th>
        <th width="5%"><div align="center">B.Opers</div></th>
        <th width="8%"><div align="center">B.Klaim</div></th>
        <th width="8%"><div align="center">Sisa</div></th>
        <th width="11%"><div align="center">Total</div></th>
        <th colspan="2">Action</th>
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
              <td><?php echo $row->no_kwitansi; ?></td>
              <td><?php echo $row->tgl_kwitansi; ?></td>
              <td><?php echo $row->insurancename; ?></td>
              <td><?php echo $row->custname; ?></td>
              <td width="8%"><div align="right"><?php echo number_format($row->survey,0,'.','.'); ?>&nbsp;<a href="<?php echo base_url();?>kwitansi/lunas_survey/<?php echo $row->no_kwitansi;?>" onclick="return confirm('Sudah Yakin Bayar ?');"><?php echo $survey?></a></div></td>
              <td><div align="right"><?php echo number_format($row->operasional,0,'.','.'); ?>&nbsp;<a href="<?php echo base_url();?>kwitansi/lunas_operasional/<?php echo $row->no_kwitansi;?>" onclick="return confirm('Sudah Yakin Bayar ?');"><?php echo $operasional?></a></div></td>
              <td><div align="right"><?php echo number_format($row->klaim,0,'.','.'); ?>&nbsp;<a href="<?php echo base_url();?>kwitansi/lunas_klaim/<?php echo $row->no_kwitansi;?>" onclick="return confirm('Sudah Yakin Bayar ?');"><?php echo $klaim?></a></div></td>
              <td><div align="center"><?php echo number_format($sisa,0,'.','.'); ?></div></td>
              <td><div align="center"><?php echo number_format($row->total,0,'.','.'); ?></div></td>
              <td width="5%"><a href="#"><i class="fa fa-edit"></i>&nbsp;Edit</a></td>
              <td width="4%"><a href="#"><i class="fa fa-thumbs-o-up"></i>&nbsp;Lunas</a></td>
            </tr>
            <?php $no++; } ?>
    </tbody>
</table>


<div class="page" align="center"><?php echo $paginator; ?></div>

<!-- silakan desain dengan menggunakan CSS -->
<style type="text/css">
*{ font-size:10px}
#table{
	width:600px;
	margin-left:-30px;
	}
#table tr td{
	border-bottom:1px dotted #666;
	border-left:1px  dotted #666;
	border-right:0px solid #666;
	padding-left:5px;
	padding-right:5px;

	}
#table tr .kode{width:80px}
#table tr .harga{width:90px;}
#table tr .sub{width:110px;}
#table tr .tot{width:100px;}
#table tr .jumlah{width:220px;}
#table tr .grandtotal{
	padding-left:10px;
	font-size:large;
	}
h6{ margin-top:-10px}

</style>

<h1 align="center"><u>PENGELUARAN</u></h1>
<h6 align="center">Detail Pengeluaran Kas periode <?php echo $periode;?></h6>
<h6 align="center">......................................................................................</h6>

<table width="650" id="table">
  <tr bgcolor="lavender" id="judul"><td width="26" height="24">No</td>
<td width="78" class="kode">Tgl</td>
<td width="218" class="jumlah">Detail</td>
  <td width="108" class="sub">Jumlah</td>
  <td width="98" class="tot">Total</td>
  <td width="98" class="TT">&nbsp;</td>
  </tr>


	<tr>
	  <td colspan="3"><strong>Biaya Survey</strong></td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
  </tr>
                   <?php 
				  ob_start(); 
			error_reporting(0);
$no=1;
			foreach($b_survey as $tr){
			$total+=$tr->jumlah_jurnal;	
			?>
	<tr><td><?php echo $no?></td><td><?php echo date("d/m/Y",strtotime($tr->tgl_jurnal)); ?></td><td><em><?php echo substr($tr->det_jurnal,0,100);?></em></td>
	  <td><?php echo number_format($tr->jumlah_jurnal,0,'.','.');?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
	</tr>
    <?php $no++; } ;?>
	<tr>
	  <td colspan="4">&nbsp;</td>
	  <td><?php echo number_format($total,0,'.','.');?>
      <div align="right"></div></td>
	  <td>&nbsp;</td>
  </tr>
	<tr>
	  <td colspan="3"><strong>Biaya Operasional</strong></td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
  </tr>              
                   <?php 

			error_reporting(0);
$no=1;
			foreach($b_operasional as $tr){
			$total2+=$tr->jumlah_jurnal;	
			?>
	<tr>
	  <td><?php echo $no?></td>
	  <td><?php echo date("d/m/Y",strtotime($tr->tgl_jurnal)); ?></td>
	  <td><em><?php echo substr($tr->det_jurnal,0,100);?></em></td>
	  <td><?php echo number_format($tr->jumlah_jurnal,0,'.','.');?></td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
  </tr> 
  <?php $no++; } ;?>
	<tr>
	  <td colspan="4">&nbsp;</td>
	  <td><strong><?php echo number_format($total2,0,'.','.');?></strong></td>
	  <td>&nbsp;</td>
  </tr>
	<tr>
	  <td colspan="3"><strong>Biaya Lain-lain</strong></td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
  </tr>
                   <?php 
			error_reporting(0);
$no=1;
			foreach($b_lain as $tr){
			$total3+=$tr->jumlah_jurnal;	
			?>
	<tr>
	  <td><?php echo $no?></td>
	  <td><?php echo date("d/m/Y",strtotime($tr->tgl_jurnal)); ?></td>
	  <td><em><?php echo substr($tr->det_jurnal,0,100);?></em></td>
	  <td><?php echo number_format($tr->jumlah_jurnal,0,'.','.');?></td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
  </tr>
  <?php $no++; } ;?>
	<tr>
	  <td colspan="4">&nbsp;</td>
	  <td><strong><?php echo number_format($total3,0,'.','.');?></strong></td>
	  <td>&nbsp;</td>
  </tr>
	<tr>
	  <td colspan="3"><strong>ATK</strong></td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
  </tr>
                   <?php 
			error_reporting(0);
$no=1;
			foreach($b_atk as $tr){
			$total4+=$tr->jumlah_jurnal;	
			?>
	<tr>
	  <td><?php echo $no?></td>
	  <td><?php echo date("d/m/Y",strtotime($tr->tgl_jurnal)); ?></td>
	  <td><em><?php echo substr($tr->det_jurnal,0,100);?></em></td>
	  <td><?php echo number_format($tr->jumlah_jurnal,0,'.','.');?></td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
  </tr>
  <?php $no++; } ;?>
	<tr>
	  <td colspan="4">&nbsp;</td>
	  <td><strong><?php echo number_format($total4,0,'.','.');?></strong></td>
	  <td>&nbsp;</td>
  </tr>
	<tr>
	  <td colspan="3"><strong>Biaya Listrik</strong></td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
  </tr>
                   <?php 
			error_reporting(0);
$no=1;
			foreach($b_listrik as $tr){
			$total5+=$tr->jumlah_jurnal;	
			?>
	<tr>
	  <td><?php echo $no?></td>
	  <td><?php echo date("d/m/Y",strtotime($tr->tgl_jurnal)); ?></td>
	  <td><em><?php echo substr($tr->det_jurnal,0,100);?></em></td>
	  <td><?php echo number_format($tr->jumlah_jurnal,0,'.','.');?></td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
  </tr>
    <?php $no++; } ;?>
	<tr>
	  <td colspan="4">&nbsp;</td>
	  <td><strong><?php echo number_format($total5,0,'.','.');?></strong></td>
	  <td>&nbsp;</td>
  </tr>
	<tr>
	  <td colspan="3"><strong>Biaya Telkom</strong></td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
  </tr>
                   <?php 
$no=1;
			foreach($b_telkom as $tr){
			$total6+=$tr->jumlah_jurnal;	
			?>
	<tr>
	  <td><?php echo $no?></td>
	  <td><?php echo date("d/m/Y",strtotime($tr->tgl_jurnal)); ?></td>
	  <td><em><?php echo substr($tr->det_jurnal,0,100);?></em></td>
	  <td><?php echo number_format($tr->jumlah_jurnal,0,'.','.');?></td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
  </tr>
    <?php $no++; } ;?>
	<tr>
	  <td colspan="4">&nbsp;</td>
	  <td><strong><?php echo number_format($total6,0,'.','.');?></strong></td>
	  <td>&nbsp;</td>
  </tr>
	<tr>
	  <td colspan="3"><strong>TRUST</strong></td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
  </tr>
                   <?php 
$no=1;
			foreach($b_trust as $tr){
			$total7+=$tr->jumlah_jurnal;	
			?>
	<tr>
	  <td><?php echo $no?></td>
	  <td><?php echo date("d/m/Y",strtotime($tr->tgl_jurnal)); ?></td>
	  <td><em><?php echo substr($tr->det_jurnal,0,100);?></em></td>
	  <td><?php echo number_format($tr->jumlah_jurnal,0,'.','.');?></td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
  </tr>
  <?php $no++; } ;?>
	<tr>
	  <td colspan="4">&nbsp;</td>
	  <td><strong><?php echo number_format($total7,0,'.','.');?></strong></td>
	  <td>&nbsp;</td>
  </tr>
	<tr>
	  <td colspan="3"><strong>Biaya Kebutuhan Dapur</strong></td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
  </tr>
                   <?php 
$no=1;
			foreach($b_dapur as $tr){
			$total8+=$tr->jumlah_jurnal;	
			?>
	<tr>
	  <td><?php echo $no?></td>
	  <td><?php echo date("d/m/Y",strtotime($tr->tgl_jurnal)); ?></td>
	  <td><em><?php echo substr($tr->det_jurnal,0,100);?></em></td>
	  <td><?php echo number_format($tr->jumlah_jurnal,0,'.','.');?></td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
  </tr>
   <?php $no++; } ;?>
	<tr>
	  <td colspan="4">&nbsp;</td>
	  <td><strong><?php echo number_format($total8,0,'.','.');?></strong></td>
	  <td>&nbsp;</td>
  </tr>
	<tr>
	  <td colspan="3"><strong>Biaya Gaji</strong></td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
  </tr>
       <?php 
			error_reporting(0);
$no=1;
			foreach($b_gaji as $tr){
			$total9+=$tr->jumlah_jurnal;	
			?>
	<tr>
	  <td><?php echo $no?></td>
	  <td><?php echo date("d/m/Y",strtotime($tr->tgl_jurnal)); ?></td>
	  <td><em><?php echo substr($tr->det_jurnal,0,100);?></em></td>
	  <td><?php echo number_format($tr->jumlah_jurnal,0,'.','.');?></td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
  </tr>
  <?php $no++; } ;?>
	<tr>
	  <td colspan="4">&nbsp;</td>
	  <td><strong><?php echo number_format($total9,0,'.','.');?></strong></td>
	  <td>&nbsp;</td>
  </tr>
	<tr>
	  <td colspan="3"><strong>Pajak &amp; Jamsostek</strong></td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
  </tr>
                   <?php 
			error_reporting(0);
$no=1;
			foreach($b_pajak as $tr){
			$total10+=$tr->jumlah_jurnal;	
			?>
	<tr>
	  <td><?php echo $no?></td>
	  <td><?php echo date("d/m/Y",strtotime($tr->tgl_jurnal)); ?></td>
	  <td><em><?php echo substr($tr->det_jurnal,0,100);?></em></td>
	  <td><?php echo number_format($tr->jumlah_jurnal,0,'.','.');?></td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
  </tr>
  <?php $no++; } ;?>
	<tr>
	  <td colspan="4">&nbsp;</td>
	  <td><strong><?php echo number_format($total10,0,'.','.');?></strong></td>
	  <td>&nbsp;</td>
  </tr>
	<tr>
	  <td colspan="6">&nbsp;</td>
  </tr>
      <?php
	$grand=$total+$total2+$total3+$total4+$total5+$total6+$total7+$total8+$total9+$total10
	?>
	<tr>
	  <td colspan="4"><div align="center">GRAND TOTAL</div></td>
	  <td><strong><?php echo number_format($grand,0,'.','.');?></strong></td>
	  <td>&nbsp;</td>
  </tr>
</table>
<br />
<table width="366" border="0">
  <tr>
    <td width="168" height="29"><div align="left">Dibuat &amp; dilaporkan</div></td>
    <td width="344"><div align="right">Mengetahui</div></td>
  </tr>
  <tr>
    <td height="46">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><div align="left"><u>(..................................)</u></div></td>
    <td><div align="right"><u>(.................................)</u></div></td>
  </tr>
</table>

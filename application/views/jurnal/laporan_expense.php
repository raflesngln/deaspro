<style type="text/css">
*{font-size:10px;}
table{ border:1px #CCC solid; width:100%}
table tr td{ border-top:1px #CCC solid; border-right:1px #CCC solid; padding-right:5px}
table tr .no{width:2%; padding-left:2px}
table tr .invoice{width:10%;}
table tr .tgl{width:15%;}
table tr .nama{width:15%;}
table tr .total{width:15%;}
table tr .biaya{width:8%;}
table tr .sisa{width:11%;}
table tr .status{width:15%;}
h3,h4{margin-top:-9px;}
.grand{margin-top:10px;width:100%; padding-right:60px}
</style>
<br />
<h3 align="center">Laporan Pengeluaran</h3>
<h4 align="center">Laporan <?php echo isset($periode)?$periode:'';?></h4>
<table width="1000mm" id="table">
  <tr bgcolor="lavender" id="judul"><td width="26" height="24">No</td>
<td width="78" class="kode"><div align="center">Tgl</div></td>
<td width="218" class="jumlah"><div align="center">Detail</div></td>
  <td width="108" class="sub"><div align="center">Jumlah</div></td>
  <td width="98" class="tot"><div align="center"></div></td>
  <td width="98" class="TT"><div align="center"><span class="tot">Total</span></div></td>
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
	  <td><div align="right"><?php echo number_format($tr->jumlah_jurnal,0,'.','.');?></div></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
	</tr>
    <?php $no++; } ;?>
	<tr>
	  <td colspan="5">&nbsp;</td>
	  <td><div align="right"><?php echo number_format($total,0,'.','.');?></div></td>
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
	  <td><div align="right"><?php echo number_format($tr->jumlah_jurnal,0,'.','.');?></div></td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
  </tr> 
  <?php $no++; } ;?>
	<tr>
	  <td colspan="5">&nbsp;</td>
	  <td><div align="right"><?php echo number_format($total2,0,'.','.');?></div></td>
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
	  <td><div align="right"><?php echo number_format($tr->jumlah_jurnal,0,'.','.');?></div></td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
  </tr>
  <?php $no++; } ;?>
	<tr>
	  <td colspan="5">&nbsp;</td>
	  <td><div align="right"><?php echo number_format($total3,0,'.','.');?></div></td>
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
	  <td><div align="right"><?php echo number_format($tr->jumlah_jurnal,0,'.','.');?></div></td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
  </tr>
  <?php $no++; } ;?>
	<tr>
	  <td colspan="5">&nbsp;</td>
	  <td><div align="right"><?php echo number_format($total4,0,'.','.');?></div></td>
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
	  <td><div align="right"><?php echo number_format($tr->jumlah_jurnal,0,'.','.');?></div></td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
  </tr>
    <?php $no++; } ;?>
	<tr>
	  <td colspan="5">&nbsp;</td>
	  <td><div align="right"><?php echo number_format($total5,0,'.','.');?></div></td>
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
	  <td><div align="right"><?php echo number_format($tr->jumlah_jurnal,0,'.','.');?></div></td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
  </tr>
    <?php $no++; } ;?>
	<tr>
	  <td colspan="5">&nbsp;</td>
	  <td><div align="right"><?php echo number_format($total6,0,'.','.');?></div></td>
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
	  <td><div align="right"><?php echo number_format($tr->jumlah_jurnal,0,'.','.');?></div></td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
  </tr>
  <?php $no++; } ;?>
	<tr>
	  <td colspan="5">&nbsp;</td>
	  <td><div align="right"><?php echo number_format($total7,0,'.','.');?></div></td>
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
	  <td><div align="right"><?php echo number_format($tr->jumlah_jurnal,0,'.','.');?></div></td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
  </tr>
   <?php $no++; } ;?>
	<tr>
	  <td colspan="5">&nbsp;</td>
	  <td><div align="right"><?php echo number_format($total8,0,'.','.');?></div></td>
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
	  <td><div align="right"><?php echo number_format($tr->jumlah_jurnal,0,'.','.');?></div></td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
  </tr>
  <?php $no++; } ;?>
	<tr>
	  <td colspan="5">&nbsp;</td>
	  <td><div align="right"><?php echo number_format($total9,0,'.','.');?></div></td>
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
	  <td><div align="right"><?php echo number_format($tr->jumlah_jurnal,0,'.','.');?></div></td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
  </tr>
  <?php $no++; } ;?>
	<tr>
	  <td colspan="5">&nbsp;</td>
	  <td><div align="right"><?php echo number_format($total10,0,'.','.');?></div></td>
  </tr>
	<tr>
	  <td colspan="6">&nbsp;</td>
  </tr>
      <?php
	$grand=$total+$total2+$total3+$total4+$total5+$total6+$total7+$total8+$total9+$total10
	?>
	<tr>
	  <td colspan="5"><div align="center"><strong>GRAND TOTAL</strong></div></td>
	  <td><div align="right"><strong><?php echo number_format($grand,0,'.','.');?></strong></div></td>
  </tr>
</table>
<br />

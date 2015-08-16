<style>
.tabel tr td{ border:0px #CCC solid;}
</style>
<table width="100%" class="tabel">
  <tr>
    <td colspan="5">PENGELUARAN</td>
  </tr>
  <tr bgcolor="#E9E9E9">
    <td width="12%" height="43">No</td>
    <td width="12%">Kode Jurnal</td>
    <td width="14%">nama kun</td>
    <td width="15%">Detail</td>
    <td width="16%">Sub Total &nbsp;&nbspc; </td>
  </tr>
  
              <?php 
			ob_start();
			error_reporting(0);
$no=1;
			foreach($trans as $tr){
			$total+=$tr->jumlah_jurnal;	
			?>
  <tr>
    <td><?php echo $tr->id_jurnal?></td>
    <td><?php echo $tr->id_jurnal?></td>
    <td><?php echo $tr->nm_akun?></td>
    <td><em><?php echo substr($tr->det_jurnal,0,80);?></em></td>
    <td width="20%"><div align="right"><?php echo number_format($tr->jumlah_jurnal,0,'.','.');?></div></td>
  </tr>
   <?php } ?>
  <tr>
    <td colspan="4">&nbsp;</td>
    <td><div align="center"><strong><?php echo number_format($total,0,'.','.');?></strong></div></td>
  </tr>
  <tr>
    <td colspan="5">PEMASUKAN</td>
  </tr>
                              <?php 
			error_reporting(0);
$si=1;
			foreach($trans2 as $tr2){
			$total2+=$tr2->jumlah_jurnal;	
			?>
  <tr>
                                <td><?php echo $si?></td>
                                <td><?php echo $tr2->id_jurnal?></td>
                                <td><?php echo $tr2->nm_akun?></td>
                                <td><em><?php echo substr($tr2->det_jurnal,0,80);?></em></td>
                                <td><div align="right"><?php echo number_format($tr2->jumlah_jurnal,0,'.','.');?></div></td>
  </tr><?php } ?>
  <tr>
    <td colspan="4">&nbsp;</td>
    <td><div align="center"><strong><?php echo number_format($total2,0,'.','.');?></strong></div></td>
  </tr>
  
  <tr>
    <td colspan="5">&nbsp;</td>
  </tr>
      
    <?php
	$selisih=$total2-$total;
	?>
  <tr>
    <td colspan="4">&nbsp;</td>
    <td><div align="center"><em><strong><?php echo number_format($selisih,0,'.','.');?></strong></em></div></td>
  </tr>
</table>
           

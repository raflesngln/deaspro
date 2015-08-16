<style>
*{ font-size:11px;}
.total{ width:59%;}
table tr td{ border-bottom:1px #CCC solid; padding-right:5px}
</style>

<table class="tabel">
            <thead>
            <tr>
              <th colspan="5"> </th>
              </tr>
            <tr class="gradeX">
                  <td colspan="5"><div align="center"><strong><h1><?php echo $status;?></h1></strong></div></td>
              </tr>
            <tr  bgcolor="#CDF3F3">
                <th width="5%" class="no" height="39">No</th>
                <th width="20%" class="kd">Kd. Jurnal</th>
                <th width="47%" class="det">Detail</th>
                <th width="9%" class="jum">&nbsp;&nbsp;Jummmmlah &nbsp;&nbsp;</th>
                <th width="16%" class="total">&nbsp;&nbsp; Toooossotal &nbsp;&nbsp;</th>
              </tr>
            </thead>
            <tbody>

                <tr class="gradeX">
                  <td colspan="2"><strong>Biaya Survey</strong></td>
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
                <tr class="gradeX">
                  <td><?php echo $no?></td>
                  <td><?php echo $tr->id_jurnal?></td>
                  <td><em><?php echo substr($tr->det_jurnal,0,100);?></em></td>
                  <td><div align="right"><?php echo number_format($tr->jumlah_jurnal,0,'.','.');?></div></td>
                  <td>&nbsp;</td>
                </tr>
                <?php $no++; } ;?>
                <tr class="gradeX">
                  <td colspan="4"><div align="center"><em><strong>Sub Total</strong></em></div></td>
                  <td><div align="right"><strong><?php echo number_format($total,0,'.','.');?></strong></div></td>
                </tr>
                    <tr class="gradeX">
                  <td colspan="2"><strong>Biaya Operasional</strong></td>
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
                <tr class="gradeX">
                  <td><?php echo $no?></td>
                  <td><?php echo $tr->id_jurnal?></td>
                  <td><em><?php echo substr($tr->det_jurnal,0,100);?></em></td>
                  <td><div align="right"><?php echo number_format($tr->jumlah_jurnal,0,'.','.');?></div></td>
                  <td>&nbsp;</td>
                </tr>
                <?php $no++; } ;?>
                <tr class="gradeX">
                  <td colspan="4"><div align="center"><em><strong>Sub Total</strong></em></div></td>
                  <td><div align="right"><strong><?php echo number_format($total2,0,'.','.');?></strong></div></td>
                </tr>

<tr class="gradeX">
            <td colspan="2"><strong>Biaya Lain-lain</strong></td>
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
                <tr class="gradeX">
                  <td><?php echo $no?></td>
                  <td><?php echo $tr->id_jurnal?></td>
                  <td><em><?php echo substr($tr->det_jurnal,0,100);?><?php echo substr($tr->det_jurnal,0,100);?></em></td>
                  <td><div align="right"><?php echo number_format($tr->jumlah_jurnal,0,'.','.');?></div></td>
                  <td>&nbsp;</td>
                </tr>
                <?php $no++; } ;?>
                <tr class="gradeX">
                  <td colspan="4"><div align="center"><em><strong>Sub Total</strong></em></div></td>
                  <td><div align="right"><strong><?php echo number_format($total3,0,'.','.');?></strong></div></td>
                </tr>
                <tr class="gradeX">
                  <td colspan="2"> <strong>ATK</strong></td>
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
                <tr class="gradeX">
                  <td><?php echo $no?></td>
                  <td><?php echo $tr->id_jurnal?></td>
                  <td><em><?php echo substr($tr->det_jurnal,0,100);?><?php echo substr($tr->det_jurnal,0,100);?></em></td>
                  <td><div align="right"><?php echo number_format($tr->jumlah_jurnal,0,'.','.');?></div></td>
                  <td>&nbsp;</td>
                </tr>
                <?php $no++; } ;?>
                <tr class="gradeX">
                  <td colspan="4"><div align="center"><em><strong>Sub Total</strong></em></div></td>
                  <td><div align="right"><strong><?php echo number_format($total4,0,'.','.');?></strong></div></td>
                </tr>
                <tr class="gradeX">
                  <td colspan="2"><strong>Biaya Listrik</strong></td>
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
                <tr class="gradeX">
                  <td><?php echo $no?></td>
                  <td><?php echo $tr->id_jurnal?></td>
                  <td><em><?php echo substr($tr->det_jurnal,0,100);?><?php echo substr($tr->det_jurnal,0,100);?></em></td>
                  <td><div align="right"><?php echo number_format($tr->jumlah_jurnal,0,'.','.');?></div></td>
                  <td>&nbsp;</td>
                </tr>
                <?php $no++; } ;?>
                <tr class="gradeX">
                  <td colspan="4"><div align="center"><em><strong>Sub Total</strong></em></div></td>
                  <td><div align="right"><strong><?php echo number_format($total5,0,'.','.');?></strong></div></td>
                </tr>
                <tr class="gradeX">
                  <td colspan="2"><strong>Biaya Telkom</strong></td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                 <?php 
$no=1;
			foreach($b_telkom as $tr){
			$total6+=$tr->jumlah_jurnal;	
			?>
                <tr class="gradeX">
                  <td><?php echo $no?></td>
                  <td><?php echo $tr->id_jurnal?></td>
                  <td><em><?php echo substr($tr->det_jurnal,0,100);?><?php echo substr($tr->det_jurnal,0,100);?></em></td>
                  <td><div align="right"><?php echo number_format($tr->jumlah_jurnal,0,'.','.');?></div></td>
                  <td>&nbsp;</td>
                </tr>
                <?php $no++; } ;?>
                <tr class="gradeX">
                  <td colspan="4"><div align="center"><em><strong>Sub Total</strong></em></div></td>
                  <td><div align="right"><strong><?php echo number_format($total6,0,'.','.');?></strong></div></td>
                </tr>
                <tr class="gradeX">
                  <td colspan="2"><strong> TRUST</strong></td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                 <?php 
$no=1;
			foreach($b_trust as $tr){
			$total7+=$tr->jumlah_jurnal;	
			?>
                <tr class="gradeX">
                  <td><?php echo $no?></td>
                  <td><?php echo $tr->id_jurnal?></td>
                  <td><em><?php echo substr($tr->det_jurnal,0,100);?><?php echo substr($tr->det_jurnal,0,100);?></em></td>
                  <td><div align="right"><?php echo number_format($tr->jumlah_jurnal,0,'.','.');?></div></td>
                  <td>&nbsp;</td>
                </tr>
                <?php $no++; } ;?>
                <tr class="gradeX">
                  <td colspan="4"><div align="center"><em><strong>Sub Total</strong></em></div></td>
                  <td><div align="right"><strong>. <?php echo number_format($total7,0,'.','.');?></strong></div></td>
                </tr>
                <tr class="gradeX">
                  <td colspan="2"><strong>Biaya Kebutuhan Dapur</strong></td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                 <?php 
$no=1;
			foreach($b_dapur as $tr){
			$total8+=$tr->jumlah_jurnal;	
			?>
                <tr class="gradeX">
                  <td><?php echo $no?></td>
                  <td><?php echo $tr->id_jurnal?></td>
                  <td><em><?php echo substr($tr->det_jurnal,0,100);?><?php echo substr($tr->det_jurnal,0,100);?></em></td>
                  <td><div align="right"><?php echo number_format($tr->jumlah_jurnal,0,'.','.');?></div></td>
                  <td>&nbsp;</td>
                </tr>
                <?php $no++; } ;?>
                <tr class="gradeX">
                  <td colspan="4"><div align="center"><em><strong>Sub Total</strong></em></div></td>
                  <td><div align="right"><strong>. <?php echo number_format($total8,0,'.','.');?></strong></div></td>
                </tr>
                <tr class="gradeX">
                  <td colspan="2"><strong>Biaya Gaji</strong></td>
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
                <tr class="gradeX">
                  <td><?php echo $no?></td>
                  <td><?php echo $tr->id_jurnal?></td>
                  <td><em><?php echo substr($tr->det_jurnal,0,100);?><?php echo substr($tr->det_jurnal,0,100);?></em></td>
                  <td><div align="right"><?php echo number_format($tr->jumlah_jurnal,0,'.','.');?></div></td>
                  <td>&nbsp;</td>
                </tr>
                <?php $no++; } ;?>
                <tr class="gradeX">
                  <td colspan="4"><div align="center"><em><strong>Sub Total</strong></em></div></td>
                  <td><div align="right"><strong><?php echo number_format($total9,0,'.','.');?></strong></div></td>
                </tr>
                   <tr class="gradeX">
                  <td colspan="2"><strong>Pajak &amp; Jamsostek</strong></td>
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
                <tr class="gradeX">
                  <td><?php echo $no?></td>
                  <td><?php echo $tr->id_jurnal?></td>
                  <td><em><?php echo substr($tr->det_jurnal,0,100);?><?php echo substr($tr->det_jurnal,0,100);?></em></td>
                  <td><div align="right"><?php echo number_format($tr->jumlah_jurnal,0,'.','.');?></div></td>
                  <td>&nbsp;</td>
                </tr>
                <?php $no++; } ;?>
                <tr class="gradeX">
                  <td colspan="4"><div align="center"><em><strong>Sub Total</strong></em></div></td>
                  <td><div align="right"><strong><?php echo number_format($total10,0,'.','.');?></strong></div></td>
                </tr> 
                
              <tr class="gradeX">
                  <td colspan="5">&nbsp;</td>
              </tr>
              <tr class="gradeX">
    
    <?php
	$grand=$total+$total2+$total3+$total4+$total5+$total6+$total7+$total8+$total9+$total10
	?>
                  <td colspan="3"><div align="center"><em><strong>TOTAL</strong></em></div></td>
                  <td>&nbsp;</td>
                  <td><div align="center"><strong>Rp. <?php echo number_format($grand,0,'.','.');?></strong></div></td>
                </tr>
                
          
            </tbody>
        </table>
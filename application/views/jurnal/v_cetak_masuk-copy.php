<style>
*{ font-size:11px;}
.total{ width:29%;}
table tr td{ border-bottom:1px #CCC solid; padding-right:5px}
</style>

<!--================ Content Wrapper===========================================-->
<div class="col-md-8 text-center table-list" >
  <div class="col-md-4 text-center">
<div class="controls"></div>
        <table class="tabel">
            <thead>
            <tr>
              <th colspan="5"> </th>
              </tr>
            <tr class="gradeX">
                  <td colspan="5"><div align="center"><strong><h4><?php echo $status;?></h4></strong></div></td>
              </tr>
            <tr bgcolor="#CDF3F3">
              <th width="8%" height="35">No</th>
              <th width="13%">Kd. Jurnal</th>
              <th width="31%">Detail</th>
              <th>&nbsp;&nbsp;..Jumlah.</th>
              <th><div align="center" class="total">&nbsp;&nbsp;Total</div></th>
            </tr>
            <tr>
                <th height="22" colspan="3"><strong>Pend Operasional</strong></th>
              <th width="14%">&nbsp;</th>
                <th width="27%">&nbsp;</th>
              </tr>
            </thead>
            <tbody>

                <?php 
				   ob_start(); 
			error_reporting(0);
$no=1;
			foreach($p_operasional as $tr){
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
                  <td><div align="right"><strong>  <?php echo number_format($total,0,'.','.');?></strong></div></td>
                </tr>
                    <tr class="gradeX">
                  <td colspan="2"><strong>Pend Survey</strong></td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                 <?php 
			error_reporting(0);
$no=1;
			foreach($p_survey as $tr){
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
                  <td><div align="right"><strong>  <?php echo number_format($total2,0,'.','.');?></strong></div></td>
                </tr>

<tr class="gradeX">
            <td colspan="2"><strong>Pend Klaim</strong></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            </tr>
                 <?php 
			error_reporting(0);
$no=1;
			foreach($p_klaim as $tr){
			$total3+=$tr->jumlah_jurnal;	
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
                  <td><div align="right"><strong>  <?php echo number_format($total3,0,'.','.');?></strong></div></td>
                </tr>
        <tr class="gradeX">
            <td colspan="2"><strong>Pend lain2</strong></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            </tr>
                 <?php 
			error_reporting(0);
$no=1;
			foreach($p_lain as $tr){
			$total4+=$tr->jumlah_jurnal;	
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
                  <td><div align="right"><strong>  <?php echo number_format($total4,0,'.','.');?></strong></div></td>
                </tr>
                   <tr class="gradeX">
                  <td colspan="2"><strong>Penambahan Modal</strong></td>
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
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td><div align="right"></div></td>
                  <td>&nbsp;</td>
                </tr>
                <?php $no++; } ;?>
                <tr class="gradeX">
                  <td colspan="4"><div align="center"><em><strong>Sub Total</strong></em></div></td>
                  <td><div align="right"><strong>  </strong></div></td>
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

  

</div>

    

    
</div>


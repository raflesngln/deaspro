<style>
.table-list{ width:85%; margin:0px auto}

#top-cari input[type=submit]
{
	width:40%;

}
</style>

<div class="page" align="right">
<h3 align="center">
  <i class="fa fa-list"></i>  Laporan Jurnal
</h3>
<form action="<?php echo base_url();?>jurnal/lap_periode_jurnal" method="post">
  <table width="40%" height="58" border="0" id="top-cari">
    <tr>
      <td width="855" height="21"><div align="center">Status</div></td>
      <td width="113"><span class="controls">Bulan</span></td>
      <td width="41"><span class="controls">Tahun</span></td>
      <td width="41">&nbsp;</td>
      <td width="41">&nbsp;</td>
      <td width="41">&nbsp;</td>
      <td width="41">&nbsp;</td>
    </tr>
    <tr>
      <td height="24"><div align="right"><span class="controls">
        <select name="status" id="status" required="required">
          <option value="">Pilih status</option>
 		<option value="expense">Expense</option>
         <option value="income">Income</option>
   
        </select>
      </span></div></td>
      <td><span class="controls">
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
      </span></td>
      <td><span class="controls">
        <select name="thn" id="thn">
          <?php 
					for($i=2015;$i<=2050;$i++){
					?>
          <option value="<?php echo $i;?>"><?php echo $i;?></option>
          <?php } ?>
        </select>
      </span></td>
      <td><input type="submit" name="btncari" id="btncari2" class="btn btn-inverse" value="Tampil" style="width:100px; height:30px" /></td>
      <td><input type="submit" name="btncetak" id="btncari" class="btn btn-inverse" value="Prnt" style="width:100px; height:30px" /></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>

<?php echo isset($paginator)?$paginator:''; ?>

</div>
<!--================ Content Wrapper===========================================-->
<div class="col-md-8 text-center table-list" >

      <div class="controls">
      
      
      </div>
      
      
      
  <div class="col-md-4 text-center">
  <div class="controls"></div>
        <table class="table table-bordered table-striped" width="100%" style="margin-left:-0.5%">
            <thead>
            <tr>
              <th colspan="5"> </th>
              </tr>
            <tr class="gradeX">
                  <td colspan="5"><div align="LEFT"><strong><h4><?php echo $status;?></h4></strong></div></td>
              </tr>
            <tr>
                <th width="8%">No</th>
                <th width="20%">Kd. Jurnal</th>
                <th width="31%">Detail</th>
                <th width="14%">Jumlah</th>
                <th width="27%"><div align="center">Total</div></th>
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
			error_reporting(0);
$no=1;
			foreach($b_survey as $tr){
			$total+=$tr->jumlah_jurnal;	
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
                  <td><div align="right"><strong>Rp. <?php echo number_format($total,0,'.','.');?></strong></div></td>
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
                  <td><em><?php echo substr($tr->det_jurnal,0,100);?><?php echo substr($tr->det_jurnal,0,100);?></em></td>
                  <td><div align="right"><?php echo number_format($tr->jumlah_jurnal,0,'.','.');?></div></td>
                  <td>&nbsp;</td>
                </tr>
                <?php $no++; } ;?>
                <tr class="gradeX">
                  <td colspan="4"><div align="center"><em><strong>Sub Total</strong></em></div></td>
                  <td><div align="right"><strong>Rp. <?php echo number_format($total2,0,'.','.');?></strong></div></td>
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
                  <td><div align="right"><strong>Rp. <?php echo number_format($total3,0,'.','.');?></strong></div></td>
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
                  <td><div align="right"><strong>Rp. <?php echo number_format($total4,0,'.','.');?></strong></div></td>
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
                  <td><div align="right"><strong>Rp. <?php echo number_format($total5,0,'.','.');?></strong></div></td>
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
                  <td><div align="right"><strong>Rp. <?php echo number_format($total6,0,'.','.');?></strong></div></td>
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
                  <td><div align="right"><strong>Rp. <?php echo number_format($total7,0,'.','.');?></strong></div></td>
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
                  <td><div align="right"><strong>Rp. <?php echo number_format($total8,0,'.','.');?></strong></div></td>
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
                  <td><div align="right"><strong>Rp. <?php echo number_format($total9,0,'.','.');?></strong></div></td>
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
                  <td><div align="right"><strong>Rp. <?php echo number_format($total10,0,'.','.');?></strong></div></td>
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
                  <td><div align="right"><strong>Rp. <?php echo number_format($grand,0,'.','.');?></strong></div></td>
                </tr>
                
          
            </tbody>
        </table>

  

</div>

    

    
</div>


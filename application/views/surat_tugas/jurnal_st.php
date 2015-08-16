<style>
.gradeX2 td{ border:1px #999 solid;}
</style>

<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
  <h4 align="center">Detail Jurnal Surat Tugas</h4>
        <p align="center">No:  <?php echo $nost;?></p>
</div>
<table class="table table-bordered table-striped" style="margin-left:-1%">
        <thead>
          <tr>
            <th colspan="5"><div align="left">PEMASUKAN</div></th>
          </tr>
          <tr bgcolor="#E9E9E9">
              <th>No</th>
              <th>&nbsp;</th>
              <th>No ST</th>
              <th>Detail</th>
              <th class="span3">Jumlah</th>
          </tr>
        </thead>
        <tbody>
          <?php  
		  error_reporting(0);
		  $no=1;?>
          <?php 
			foreach($detail_jurnal as $row)
			{
				$total+=$row->jumlah_jurnal/2;
			?>

            <tr class="gradeX">
                <td height="22"><?php echo $no; ?></td>
                <td>&nbsp;<?php echo $row->id_jurnal; ?></td>
              <td>
                <label><?php echo $row->id_surat_tugas; ?></label></td>
                <td>
                  <label><?php echo $row->det_transaksi; ?></label></td>
              <td><div align="right"><?php echo number_format($row->jumlah_jurnal,0,'.','.'); ?></div></td>
                <?php  $no++; }?>
            </tr>
            <tr class="gradeX2">
              <td height="22" colspan="4"><div align="center"><strong>Subtotal</strong></div></td>
              <td><div align="right"><strong>Rp &nbsp; <?php echo number_format($total,0,'.','.'); ?></strong></div></td>
            </tr>
            <tr class="gradeX">
              <td height="22" colspan="5"><div align="left"><strong>PENGELUARAN</strong></div></td>
            </tr>
                      <?php  $no2=1;?>
          <?php 
			foreach($detail_jurnal2 as $row2)
			{
				$total2+=$row2->jumlah_jurnal/2;
				
			?>
            <tr class="gradeX">
              <td height="22"><?php echo $no2; ?></td>
              <td>&nbsp;<?php echo $row2->id_jurnal; ?></td>
              <td><?php echo $row2->id_surat_tugas; ?></td>
              <td><?php echo $row2->det_transaksi; ?></td>
              <td><div align="right"><?php echo number_format($row2->jumlah_jurnal,0,'.','.'); ?></div></td>
            </tr><?php  $no2++; }?>
            <tr class="gradeX2">
              <td height="22" colspan="4"><div align="center"><strong>Subtotal</strong></div></td>
              <td><div align="right"><strong>Rp &nbsp; <?php echo number_format($total2,0,'.','.'); ?></strong></div></td>
            </tr>
          <tr class="gradeX">
              <td height="22" colspan="5">&nbsp;</td>
          </tr>
          <tr class="gradeX2">
              <td height="22" colspan="4"><div align="center"><strong>SELISIH</strong></div></td>
              <?php
			  $selisih=$total-$total2;
			  ?>
              <td><div align="right"><strong>Rp &nbsp; <?php echo number_format($selisih,0,'.','.'); ?></strong></div></td>
            </tr>
           
            
      </tbody>
    </table>
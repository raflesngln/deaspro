<style type="text/css">
*{font-size:12px;}
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
<h3 align="center">Laporan Oustranding</h3>
<h4 align="center">Laporan <?php echo isset($periode)?$periode:'';?></h4>
<table width="100%">
    <thead>
    <tr bgcolor="lavender">
        <th width="5%" height="52" style="width:5%">No</th>
        <th width="7%"  >&nbsp; No ST</th>
        <th width="11%"> &nbsp; Tgl ST</th>
        <th width="10%"  >&nbsp; No Kontrak</th>
        <th width="12%"  >No Polisi</th>
        <th width="12%"  >&nbsp; Asuransi</th>
        <th width="14%"  >&nbsp; Tertanggung</th>
        <th width="11%"  >&nbsp; Surveyor &nbsp;</th>
        <th width="10%"  >&nbsp; B.survey &nbsp;</th>
        <th width="10%"  > &nbsp; B.Oprsional &nbsp;</th>
        <th width="10%"  >&nbsp; B.Klaim &nbsp;</th>
        <th width="10%"  >&nbsp; Sisa &nbsp;</th>
        <th width="17%"  >&nbsp; Total &nbsp;</th>
      </tr>
    </thead>
    <tbody>
    <?php
	error_reporting(0);
	ob_start();
    $no=1;
        foreach($list as $row){
			
	$survey=$row->status_survey;
$operasional=$row->status_operasional;
$klaim=$row->status_klaim;

$total=$row->total;
$b_sur=$row->uang_surveyor;
$b_opr=$row->uang_operasional;
$b_klm=$row->uang_klaim;
$t_bayar=$b_sur+$b_opr+$b_klm;
$sisa=$total-$t_bayar;
$grand+=$total;
$grands+=$sisa;
$koran=$grand-$grands;


$totsurvey+=$row->survey;
$totoperasional+=$row->operasional;
$totklaim+=$row->klaim;
$persen=$grands/$grand;

            ?>
<tr>
              <td height="21" class="no"><?php echo $no; ?></td>
              <td class=""><?php echo $row->id_surat_tugas; ?></td>
              <td class=""><?php echo date("d-m-Y",strtotime($row->tgl_kwitansi)); ?></td>
              <td class=""><?php echo $row->no_kontrak; ?></td>
              <td class=""><?php echo $row->no_polisi; ?></td>
              <td class=""><?php echo substr($row->nm_asuransi,0,20); ?></td>
              <td class=""><?php echo $row->nm_tertanggung; ?></td>
              <td class=""><?php echo $row->nm_tertanggung; ?></td>
              <td class=""><div align="right"><?php echo number_format($row->survey,0,'.','.');?></div></td>
              <td class=""><div align="right"><?php echo number_format($row->operasional,0,'.','.');?></div></td>
              <td class=""><div align="right"><?php echo number_format($row->klaim,0,'.','.');?></div></td>
              <td class=""><div align="right"><?php echo number_format($sisa,0,'.','.');?></div></td>
              <td class="total"><?php echo number_format($row->total,0,'.','.');?></td>

      </tr>
      <?php $no++; }  ?>
<tr>
  <td height="57" class="no">&nbsp;</td>
  <td colspan="7" class="invoice">&nbsp;</td>
  <td class="biaya"><div align="right"><strong><?php echo number_format($totsurvey,0,'.','.');?></strong></div></td>
  <td class="biaya"><div align="right"><strong><?php echo number_format($totoperasional,0,'.','.');?></strong></div></td>
  <td class="biaya"><div align="right"><strong><?php echo number_format($totklaim,0,'.','.');?></strong></div></td>
  <td class="biaya">&nbsp;</td>
  <td class="total"><div align="right"><strong><?php echo number_format($grand,0,'.','.');?></strong></div></td>
</tr>
</tbody>
</table>
<br />
<table width="200" border="0">
  <tr>
    <td width="20%">prod</td>
    <td width="80%" bgcolor="#999999"><div align="center"><?php echo number_format($grand,0,'.','.');?></div></td>
  </tr>
  <tr>
    <td>Rek Koran</td>
    <td bgcolor="#999999"><div align="center"><?php echo number_format($koran,0,'.','.');?></div>
    <div align="right"></div></td>
  </tr>
  <tr>
    <td>OS</td>
    <td bgcolor="#CCCCCC"><div align="center"><?php echo number_format($grands,0,'.','.');?></div></td>
  </tr>
  <tr>
    <td>%</td>
    <td><div align="center">R:Px100%=<?php echo number_format($koran,0,'.','.');?> x <?php echo number_format($grand,0,'.','.');?> x 100%= <?php echo substr($persen,0,5);?> %</div></td>
  </tr>
</table>

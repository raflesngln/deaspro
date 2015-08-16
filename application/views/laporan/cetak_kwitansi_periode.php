<?php
///*
header("Cache-Control:no-cache,no-store,must-revalidate");
header("Content-Type:application/vnd.ms-word");
header("Content-Disposition:attachment;filename=laporan.doc");
//*/
?>
<style type="text/css">
body{width:100%; margin-right:1px;}
*{ font-size:9px;}
table th{border-right:1px #999 solid;border-bottom:1px #999 solid}
.judul{ border-bottom:1px #CCC solid;}
table{ border:1px #999 solid; margin-left:0px; width:auto}
table tr td{width:auto; border-right:1PX #999 solid; border-top:1px #999 solid;} 
h3,h4{margin-top:-9px;}
.grand{margin-top:10px;width:100%; padding-right:68px}

.jdl{margin-top:2px #999 solid; border-right:1px #999 solid;}
</style>
<h3 style="text-align: center">
    Laporan  PIUTANG</h3>

<!--================ ===========================================-->
<table width="100%" class="table">
    <thead style="border-bottom:1px #999 solid">
    <tr bgcolor="#D9F1F4" style="border-right:1px #999 solid">
      <th width="3%" rowspan="2" >No</th>
      <th width="6%" rowspan="2">Tanggal</th>
      <th width="10%" rowspan="2">Nomoe KWT</th>
      <th width="10%" rowspan="2">Customers/(Asuransi)</th>
      <th width="11%" rowspan="2">Nama Tertanggung</th>
      <th width="9%" rowspan="2">No. Polis</th>
      <th width="9%" rowspan="2">No SK</th>
      <th height="39" colspan="2">Kendaraan</th>
      <th colspan="3">Kwitansi</th>
      <th width="6%" rowspan="2">MKT/SRV</th>
      <th width="6%" rowspan="2">Kota</th>
    </tr>
    <tr bgcolor="#D9F1F4">
        <th width="8%" height="15">Merk</th>
    <th width="7%">No.Pol</th>
        <th width="5%">survey</th>
        <th width="5%">oper</th>
        <th width="5%">klaim</th>
      </tr>
    </thead>
    <tbody>
    <?php
	error_reporting(0);
    $no=1;
    if(isset($kwitansi)){
        foreach($kwitansi as $row){
		//$grantotal+=$row->total_harga;	
//hitung lama hari denda
$tgl2=date('Y-m-d'); //tgl sekarang
$tgl1=date("Y-m-d",strtotime($row->jatuh_tempo));  //tgl di db

$pecah1=explode("-",$tgl1);
$date1=$pecah1[2];
$month1=$pecah1[1];
$year1=$pecah1[0];

$pecah2=explode("-",$tgl2);
$date2=$pecah2[2];
$month2=$pecah2[1];
$year2=$pecah2[0];

$jd1=gregoriantojd($month1,$date1,$year1);
$jd2=gregoriantojd($month2,$date2,$year2);
$total_hari=$jd2-$jd1;
$selisih=$total_hari;
if($selisih<=0)
$selisih=0;
            ?>
            <tr style="border-top:2px #999 solid; border-right:1px #999 solid; border-bottom:1px #999 solid">
                <td height="23" class="jdl"><?php echo $no;?></td>
                <td class="jdl"><?php echo $row->tgl_kwitansi;?></td>
                <td class="jdl"><?php echo $row->no_kwitansi;?></td>
                <td class="jdl"><?php echo $row->insurancename;?></td>
                <td class="jdl"><?php echo $row->custname;?></td>
                <td class="jdl"><?php echo $row->nopolis;?></td>
                <td class="jdl"><?php echo $row->nokuasa;?></td>
                <td class="jdl"><?php echo $row->merk;?></td>
                <td class="jdl"><?php echo $row->nopolisi;?></td>
                <td class="jdl"><div align="right"><?php echo number_format($row->uang_survey,0,'.','.');?></div></td>
                <td class="jdl"><div align="right"><?php echo number_format($row->operasional,0,'.','.');?></div></td>
                <td class="jdl"><div align="right"><?php echo number_format($row->gagal_klaim,0,'.','.');?></div></td>
                <td class="jdl"><?php echo $row->surveyorid;?></td>
                <td class="jdl"><?php echo substr($row->custaddress,0,20);?></td>
            </tr>
        <?php $no++;} }
    ?>

    </tbody>
</table>
<?php //exit()?>
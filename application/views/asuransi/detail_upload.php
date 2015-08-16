<style>
a{text-decoration:none;}
.tabel{border:2px #CCC solid; margin:0px auto; width:75%;}
.tabel tr td{padding-left:5px; margin-bottom:8px; line-height:25px;}
.tabel{border:2px #CCC solid;}
.tabel #isi td{ border-bottom:2px #CCC solid;border-right:2px #CCC solid;}
</style>
<?php
foreach($dt as $row){

?>
<table width="" border="0" class="tabel">
  <tr>
    <td colspan="6"><div align="center"><h3>Detail Surat Kuasa</h3></div></td>
  </tr>
  <tr>
    <td width="25%">Nama Asuransi</td>
    <td colspan="5">: <?php echo $row->nm_asuransi;?></td>
  </tr>
  <tr>
    <td>Nomor Kuasa</td>
    <td colspan="5">: <?php echo $row->id_upload;?></td>
  </tr>
  <tr>
    <td>Waktu Upload</td>
    <td colspan="5">: <?php echo $row->insertime;?></td>
  </tr>
  <tr>
    <td>Keterangan</td>
    <td colspan="5">: <?php echo $row->keterangan;?></td>
  </tr>
  <tr>
    <td colspan="6">&nbsp;</td>
  </tr>
  <tr bgcolor="lavender">
    <td height="36" colspan="2">&nbsp;</td>
    <td width="48%">Nama File</td>
    <td width="11%">&nbsp;</td>
    <td width="15%">Action</td>
  </tr>
    <?php }
	$i=1;
  foreach($list as $data){
   ?>
  <tr id="isi">
    <td colspan="2">File <?php echo $i;?></td>
    <td><?php echo $data->nm_file;?></td>
    <td><a href="<?php echo base_url();?>asuransi/hapus_file/<?php echo $data->id;?>/<?php echo $data->id;?>" onclick="return confirm('Yakin hapus data ?')"><i class="fa fa-trash-o"></i> Delete</a></td>
    <td><a href="<?php echo base_url();?>asset/uploads/<?php echo $data->file;?>"><i class="fa fa-trash-o"></i> Download</a></td>
  </tr>
<?php $i++;} ?>
</table>

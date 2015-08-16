<style type="text/css">

.txt{border:none; margin-bottom:10px}
</style>

<?php
foreach($detail as $row)
{
?>

<table width="52%" border="0" align="center">
  <tr>
    <td width="16%" height="37"><strong>Nopol</strong></td>
    <td width="19%"><strong>Tertanggung</strong></td>
    <td width="17%"><strong>Surveyor</strong></td>
    <td width="48%"><strong>Jenis</strong></td>
  </tr>
  <tr>
    <td><input type="text" name="det1" id="det1" value="<?php echo $row->no_polisi ;?>" readonly="readonly" class="txt"/></td>
    <td><input type="text" name="det2" id="det2" value="<?php echo $row->nm_tertanggung ;?>" readonly="readonly"  class="txt" /></td>
    <td><input type="text" name="det3" id="det3" value="<?php echo $row->nm_surveyor ;?>" readonly="readonly"  class="txt"/></td>
    <td><input type="text" name="det4" id="det4" value="<?php echo $row->model_kendaraan ;?>"  readonly="readonly"  class="txt"/></td>
  </tr>
  <tr>
    <td height="21">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

<?php }?>

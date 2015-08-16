<style>
table{border:2px #CCC solid; padding-left:10px; width:60%; padding-bottom:10px; margin:0px auto;}
input[type=text]{
height:30px; width:65%; border:2px #CCC solid;	}

input[type=file]{
	height:30px; width:65%; margin-top:5px;	
}
input[type=submit]{
	height:35px; width:170px; margin-left:40%; margin-top:5px;;background-color:#3A3A3A; color:#FFF; border-radius:10px; cursor:pointer; border:none;
}
#textarea{
	height:200px; width:90%; margin-bottom:5px; margin-top:5px; border:2px #CCC solid;	
}
input:focus{border:2px #0CF solid; border-radius:4px;}
#textarea:focus{border:2px #0CF solid; border-radius:4px;}
#tambah{ height:30px; width:140px; cursor:pointer;border:none; background-color:#009349; border-radius:5px;color:#FFF}
</style>
<script src="<?php echo base_url();?>asset/js/jquery.js" type="text/javascript"></script>
<script type="text/javascript">
function tambah_baris()
{
    html='<tr>'
    + '<td>Nama File</td>'
    + '<td>:</td>'
    + '<td><input type="text" name="namafile[]"></td>'
    + '</tr>'
	+'<tr>'
    + '<td>File</td>'
    + '<td>:</td>'
    + '<td><input type="file" name="myfile[]"></td>'
    + '</tr>'
	+'<tr>'
    +'<td colspan="3"><hr style="border:1px #CCC dashed" /></td>'
    + '<td>:</td>'
  	+ '</tr>';
    $('#tabelinput').append(html);
}
</script>
<form action="<?php echo base_url();?>asuransi/update_kuasa" method="post" enctype="multipart/form-data">
  <table width="" border="0" id="tabelinput">
    <tr>
     <?php
	foreach($list as $row)
	{
	?>
    <td height="47" colspan="4"><div align="center">
      <h3>Edit  Surat Kuasa</h3></div></td>
    </tr>
    <tr>
      <td width="16%">Nomor Surat</td>
      <td width="1%">:</td>
      <td width="57%"><input type="text" name="no" id="no" readonly="readonly" value="<?php echo $row->id_upload;?>">
      <input type="hidden" name="id" id="id" value="<?php echo $row->id_asuransi;?>" /></td>
      <td width="26%">&nbsp;</td>
    </tr>
    <tr>
      <td>Keterangan</td>
      <td>:</td>
      <td><label for="textarea"></label>
      <textarea name="ket" id="textarea" cols="45" rows="5"><?php echo $row->keterangan;?></textarea></td>
      <td>&nbsp;</td>
    </tr>
  <tr>
    <td colspan="3"><hr style="border:2px #CCC medium" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Nama File</td>
    <td>:</td>
    <td><input type="text" name="namafile[]" id="nama2" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td> File</td>
    <td>&nbsp;</td>
    <td><input type="file" name="myfile[]" id="fileField" /><label for="fileField"></label>&nbsp;<button id="tambah" type="button" onclick="tambah_baris();"><i class="fa fa-plus-square"></i>Tambah Input File</button></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3"><hr style="border:1px #CCC dashed" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Nama File</td>
    <td>:</td>
    <td><input type="text" name="namafile[]" id="nama2" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td> File</td>
    <td>&nbsp;</td>
    <td><input type="file" name="myfile[]" id="fileField2" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3"><hr style="border:1px #CCC dashed" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Nama File</td>
    <td>:</td>
    <td><input type="text" name="namafile[]" id="nama2" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td> File</td>
    <td>&nbsp;</td>
    <td><input type="file" name="myfile[]" id="fileField3" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3"><hr style="border:1px #CCC dashed" /></td>
    <td>&nbsp;</td>
  </tr>
  <?php } ?>
  </table>
<input type="submit" name="button" id="button" value="Kirim">
</form>

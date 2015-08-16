<style>
.tbl-view{
	margin:2px auto;
	border:2px #CCC solid;
	padding-left:2px;
	margin-bottom:50px;
	}
.tbl-view tr td{border:0px #CCC solid;}
.tbl-view input[type=submit]{
	border:none; cursor:pointer; border-radius:4px;
	height:30px;
	width:130px; background-color:#2D2D2D;
	color:#FFF;
}

.tbl-view input[type=text],input[type=password]
{
	border:2px #CCC solid;
	height:30px;
	width:80%;
	}

.btn{background-color:#2D2D2D; color:#FFF; border:none; border-radius:4px; height:30px; width:140px; cursor:pointer}
</style>
<?php 

if($this->session->userdata('login_status')==TRUE)
{ 
foreach($pegawai as $row){
?>
<form action="<?php echo base_url()?>c_master/update_pegawai" method="post" enctype="multipart/form-data">
<table width="70%" class="tbl-view">
  <tr bordercolor="#663300">
    <td height="46" colspan="4"><div align="center"><i class="fa  fa-pencil-square-o fa-2x"></i> &nbsp;EDIT DATA pegawai</div></td>
    </tr>
  <tr>
    <td width="33">&nbsp;</td>
    <td width="135">&nbsp;</td>
    <td width="111">&nbsp;</td>
    <td width="462"><label for="nama"></label>
      <label for="nama"><?php echo isset($message)? $message:'';?>
        <input type="hidden" name="level" id="level" value="<?php echo $row->level;?>" />
      </label></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Nama pegawai</td>
    <td>&nbsp;</td>
    <td><label for="jk">
      <input name="nama" type="text" id="nama" value="<?php echo $row->nm_pegawai;?>" size="33" />
    <?php echo form_error('nama');?>
    <input type="hidden" name="idpegawai" id="idpegawai" value="<?php echo $row->id_pegawai;?>" />
    </label></td>
    </tr>
  <tr>
    <td height="40">&nbsp;</td>
    <td>Username</td>
    <td>&nbsp;</td>
    <td><input name="usernm" type="text" id="usernm" value="<?php echo $row->username;?>"/>
      <?php echo form_error('usernm');?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Telp</td>
    <td>&nbsp;</td>
    <td><label for="gambar">
      <input name="telp" type="text" id="telp" value="<?php echo $row->telp_pegawai;?>"/>
      <?php echo form_error('telp');?></label></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Email</td>
    <td>&nbsp;</td>
    <td><input name="email" type="text" id="email" value="<?php echo $row->email_pegawai;?>"/>
      <?php echo form_error('email');?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Alamat</td>
    <td>&nbsp;</td>
    <td><textarea name="alamat" cols="33" rows="4" id="alamat"><?php echo $row->almt_pegawai;?></textarea></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><button type="submit" class="btn btn-primary btn-lg">Simpan</button></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>

<?php } }
else
{
echo'<a href="login">Login User</a>';	
}
?>
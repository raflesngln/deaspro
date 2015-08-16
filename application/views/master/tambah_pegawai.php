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

.tbl-view input[type=text],#level,input[type=password]
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

?>
<form action="<?php echo base_url()?>c_master/simpan_pegawai" method="post" enctype="multipart/form-data">
<table width="763" class="tbl-view">
  <tr bordercolor="#663300">
    <td height="46" colspan="4"><div align="center"><i class="fa fa-plus-square fa-2x"></i> &nbsp;TAMBAH DATA PEGAWAI</div></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2"><?php echo isset($message)? $message:'';?></td>
    </tr>
  <tr>
    <td width="68">&nbsp;</td>
    <td width="187">ID</td>
    <td width="24">&nbsp;</td>
    <td width="462"><label for="nama"></label>
      <label for="id"></label>
      <input type="text" name="id" id="id" value="<?php echo $kodepg;?>" readonly="readonly" /></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Nama Surveyor</td>
    <td>&nbsp;</td>
    <td><label for="jk">
      <input name="nama" type="text" id="nama" value="<?php echo $this->input->post('nama');?>" size="33" />
    <?php echo form_error('nama');?></label></td>
    </tr>
  <tr>
    <td height="40">&nbsp;</td>
    <td>Username</td>
    <td>&nbsp;</td>
    <td><input name="usernm" type="text" id="usernm" value="<?php echo $this->input->post('usernm');?>"/>
      <?php echo form_error('usernm');?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td height="33">Password</td>
    <td>&nbsp;</td>
    <td><input name="pass" type="text" id="pass" value="<?php echo $this->input->post('pass');?>"/>      <?php echo form_error('pass');?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Telp</td>
    <td>&nbsp;</td>
    <td><label for="gambar">
      <input name="telp" type="text" id="telp" value="<?php echo $this->input->post('telp');?>"/>
      <?php echo form_error('telp');?></label></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Email</td>
    <td>&nbsp;</td>
    <td><input name="email" type="text" id="email" value="<?php echo $this->input->post('email');?>"/>
      <?php echo form_error('email');?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Alamat</td>
    <td>&nbsp;</td>
    <td><textarea name="alamat" cols="33" rows="4" id="alamat"><?php echo $this->input->post('alamat');?></textarea></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Level</td>
    <td>&nbsp;</td>
    <td><label for="level"></label>
      <select name="level" id="level" required="required">
      <option>Pilih Level</option>
      <option value="manager">Manager</option>
      <option value="surveyor">Surveyor</option>
      <option value="admin">Admin</option>

      </select></td>
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

<?php } 
else
{
echo'<a href="login">Login User</a>';	
}
?>
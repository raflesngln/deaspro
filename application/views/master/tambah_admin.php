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
<form action="<?php echo base_url();?>c_master/simpan_admin" method="post">

<table width="50%" border="0" class="tbl-view">
  <tr>
    <td height="34" colspan="3"><i class="fa fa-plus-square fa-2x"></i> &nbsp;TAMBAH DATA ADMIN</td>
    </tr>
  <tr>
    <td height="56" colspan="3"><div align="center"><?PHP echo isset($message)?$message:'';?></div></td>
    </tr>
  <tr>
    <td>Nama</td>
    <td>&nbsp;</td>
    <td><label for="nama"></label>
      <input type="text" name="nama" id="nama" /></td>
  </tr>
  <tr>
    <td>Username</td>
    <td>&nbsp;</td>
    <td><input type="text" name="usernm" id="usernm" /></td>
  </tr>
  <tr>
    <td>Password</td>
    <td>&nbsp;</td>
    <td><input type="password" name="pass" id="pass" /></td>
  </tr>
  <tr>
    <td>Telpon/Hp</td>
    <td>&nbsp;</td>
    <td><input type="text" name="telp" id="telp" /></td>
  </tr>
  <tr>
    <td height="72" colspan="3"><div align="center">
      <input type="submit" name="button" id="button" value="Simpan" />
    </div></td>
    </tr>
</table>


</form>
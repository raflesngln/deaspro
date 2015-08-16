
<style>
.tbl-view{
	margin:2px auto;
	border:2px #CCC solid;
	padding-left:2px;
	margin-bottom:50px;
	}
.tbl-view tr td{border:1px #CCC solid;}
.btn{background-color:#2D2D2D; color:#FFF; border:none; border-radius:4px; height:30px; width:140px; cursor:pointer}
</style>
  <table width="80%" border="0" class="tbl-view">
  <tr bordercolor="#663300">
    <td height="64" colspan="4"><div align="center"><h2><u><i class="fa fa-user"></i>&nbsp; DATA ADMINISTRATOR</u></h2></div></td>
  </tr>
  <tr>
    <td height="32">&nbsp;</td>
    <td></td>
    <td colspan="2"><div align="right"><a href="<?php echo base_url();?>c_master/tambah_admin">
      <button class="btn">Tambah Admin</button>
    </a></div></td>
    </tr>
  <tr>
    <td width="100" height="32"><div align="center">No</div></td>
    <td width="557"><div align="center">Nama Admin</div></td>
    <td width="228"><div align="center">Username</div></td>
    <td width="162"><div align="center">Action</div></td>
  </tr>
  <?php
  $no=1;
  foreach($data_admin as $row){
  ?>
  <tr>
    <td height="32"><div align="center"><?php echo $no;?></div></td>
    <td><?php echo $row->nm_admin;?></td>
    <td><?php echo $row->username;?></td>
    <td><div align="center"><a href="<?php echo base_url();?>c_master/hapus_admin/<?php echo $row->id_admin;?>" onclick="return confirm('Yakin hapus data ?')"><i class="fa fa-trash-o"></i> Delete</a></div></td>
  </tr>
  <?php $no++; } ?>
  </table>

<style type="text/css">
a{text-decoration:none}
.page {	width:99%;
	padding-bottom:10px;
}

.top-cari{border:1px #2D9FAC solid;border-radius:5px; padding-top:3px; padding-bottom:3px; width:60%}
.top-cari #bln,#thn{ width:120px; height:30px}

.page a{
	border:2px #CCC solid;
	width:auto;
	padding:0px 10px 0px 10px;
	color:#C60;
}
#customer{ height:30px; width:190px}

.table{border:2px #CCC solid; width:99%; padding-bottom:20px}
.table tr td{ border-right:1px #CCC solid; border-bottom:1px #CCC solid;padding-left:2px; width:auto}
#btncari,#btncetak{background-color:#2D2D2D; color:#FFF; border:none; cursor:pointer; border-radius:4px}
</style>
 
<h2 align="center">
   <i class="fa fa-list"></i>&nbsp;DATA LHS BARU
</h2>
<!--================ ===========================================-->
<div class="page" align="right">
<form action="" method="post">
<input name="" type="text" />
<input name="" type="submit" value="Cari Fak." style="background-color:#00A854; height:25px; width:90px; border:none; color:#FFF; border-radius:5px" />
</form>
<br />
<form action="<?php echo base_url();?>kwitansi/lap_kwitansi_periode" method="post">
<table width="100%" height="58" border="0" class="top-cari">
    <tr>
      <td width="855" height="21">&nbsp;</td>
      <td width="113"> Customer</td>
      <td width="41"><span class="controls">Bulan</span></td>
      <td width="41"><span class="controls">Tahun</span></td>
      <td width="41">&nbsp;</td>
      <td width="41">&nbsp;</td>
    </tr>
    <tr>
      <td height="24">&nbsp;</td>
      <td><span class="controls">
        <select name="customer" id="customer" required="required">
        <option value="<?php echo $this->input->post('customer');?>">Pilih konsumen</option>
        <option value="semua">Semua</option>
        <option></option>
        <?php
	foreach($customer as $cust){
	    ?>
          <option value="<?php echo $cust->insuranceid;?>"><?php echo substr($cust->insurancename,3);?></option>
		<?php } ?>
        </select>
      </span></td>
      <td><label for="customer"><span class="controls">
        <select name="bln" id="bln">
       
          <?php 
					for($i=1;$i<=12;$i++){
						if($i<10)
						{
						$i='0'.$i;	
						}
					?>
          <option value="<?php echo $i;?>"><?php echo $i;?></option>
          <?php } ?>
        </select>
      </span></label></td>
      <td><span class="controls">
        <select name="thn" id="thn">
          <?php 
					for($i=2015;$i<=2050;$i++){
					?>
          <option value="<?php echo $i;?>"><?php echo $i;?></option>
          <?php } ?>
        </select>
      </span></td>
      <td><input type="submit" name="btncari" id="btncari" value="Tampilkan" class="btn-success btn-large" style="width:120px; height:30px" /></td>
      <td><input type="submit" name="btncetak" id="btncetak" value="Cetak" style="width:120px; height:30px" class="btn btn-success" /></td>
    </tr>
  </table>
</form>
&nbsp;
<?php echo $paginator; ?>

</div>

<h3 align="center"><?php isset($judul)?$judul:'';?></h3>
<table width="99%" class="table table-striped table-bordered table-hover">
<tbody>
  <tr class="gradeX">
    <td width="7%"><table width="99%" class="table table-striped table-bordered table-hover">
      <thead>
        <tr bgcolor="lavender">
          <th width="4%" rowspan="2">No</th>
          <th width="17%" rowspan="2">Nomor S.Tugas</th>
          <th width="27%" rowspan="2">Nama Tertanggung</th>
          <th width="23%" rowspan="2">Nama Surveyor</th>
          <th width="21%" rowspan="2">Asuransi</th>
          <th height="27">&nbsp;</th>
        </tr>
        <tr bgcolor="lavender">
          <th height="23">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
	$no=1;
        foreach($list as $row){
			
            ?>
        <tr class="gradeX">
          <td height="41"><?php echo $no; ?></td>
          <td><?php echo $row->id_surat_tugas; ?></td>
          <td><?php echo $row->nm_tertanggung; ?></td>
          <td><?php echo $row->nm_surveyor; ?></td>
          <td><?php echo $row->nm_asuransi; ?></td>
          <td width="8%"><a href="<?php echo base_url();?>lhs/buat_lhs/<?php echo $row->id_lhs;?>"><i class="fa fa-pencil"></i> &nbsp;Buat LHS </a></td>
          </tr>
        <?php $no++; } ?>
      </tbody>
    </table></td>
  </tr>
</tbody>
</table>
<div class="page" align="center"><?php echo $paginator; ?></div>

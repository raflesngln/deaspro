<style type="text/css">
a{text-decoration:none}
.page {	width:99%;
	padding-bottom:10px;
	border:1px #CCC dotted;
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

.table{border:2px #CCC solid; width:98%; padding-bottom:20px}
.table tr td{ border-right:1px #CCC solid; border-bottom:1px #CCC solid;padding-left:2px; width:auto}
#btncari,#btncetak{background-color:#2D2D2D; color:#FFF; border:none; cursor:pointer; border-radius:4px}
</style>
 
<h2 align="center">
   <i class="fa fa-calendar"></i>&nbsp;DATA LIST SURAT TUGAS
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

<h3 align="center">
  <?php isset($judul)?$judul:'';?>
</h3>
<table width="95%" class="table table-striped table-bordered table-hover">
    <thead>
    <tr bgcolor="lavender">
        <th width="3%" height="37">No</th>
        <th width="12%">Nomor Surat</th>
        <th width="9%">Tgl kw</th>
        <th width="22%">Nama Asuransi</th>
        <th width="22%">Nama Tertanggung</th>
        <th width="21%">Nama Surveyor</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>
    <?php
	$no=1;
        foreach($list as $row){
			
            ?>
            <tr class="gradeX">
              <td height="40"><?php echo $no; ?></td>
              <td><?php echo $row->id_surat_tugas; ?></td>
              <td><?php echo $row->tgl_surat_tugas; ?></td>
              <td><?php echo $row->nm_asuransi; ?></td>
              <td><?php echo $row->nm_tertanggung; ?></td>
              <td><?php echo $row->nm_surveyor; ?></td>
              <td width="6%"><a href="#"><i class="fa fa-pencil"></i>&nbsp;Edit</a></td>
              <td width="5%"><a href="#"><i class="fa fa-trash-o"></i>&nbsp;Delete</a></td>
            </tr>
            <?php $no++; } ?>
    </tbody>
</table>


<div class="page" align="center"><?php echo $paginator; ?></div>

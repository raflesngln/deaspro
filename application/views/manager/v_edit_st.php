<script src="<?php echo base_url();?>asset/js/jquery.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>asset/jquery_ui/jquery-1.9.1.js"></script>

<script src="<?php echo base_url();?>asset/jquery_ui/ui/jquery.ui.core.js"></script>
<script src="<?php echo base_url();?>asset/jquery_ui/ui/jquery.ui.widget.js"></script>
<script src="<?php echo base_url();?>asset/jquery_ui/ui/jquery.ui.datepicker.js"></script>
<script>
	$("document").ready(function(){
		$("#tgl").datepicker();
		$("#tgl2").datepicker();
		$("#tgl3").datepicker();
		$("#tgl4").datepicker();
		$("#tgl5").datepicker();
	});
	</script>
<link rel="stylesheet" href="<?php echo base_url();?>asset/jquery_ui/themes/base/jquery.ui.all.css">

<style type="text/css">
.input{
	width:80%;
	background-color:#FFF;
	padding-left:15%;
	padding-top:20px;
	padding-bottom:20px;
}

.input table tr td{
	height:25px;
}

.input input[type=text]{
	height:25px;
	width:50%;
	margin-top:3px;
	padding-left:5px;
	border:2px #CCC solid;
	border-radius:2px;
}

input table .tgl{ width:120px;}
.btn{ width:150px; height:35px; background-color:#2D2D2D; color:#FFF; cursor:pointer; border:none; border-radius:5px}
.btn:hover{ background-color:#666; color:#CC3}

.btn1 {width:150px; height:35px; background-color:#2D2D2D; color:#FFF; cursor:pointer; border:none; border-radius:5px}
</style>
<div class="input">
<form action="<?php echo base_url();?>manager/update_surat_tugas" method="post">
<h2><i class="fa fa-edit fa-2x"></i> &nbsp;<u>EDIT SURAT TUGAS </u></h2>
<br />
<table width="80%" border="0">
<?php
foreach($st as $row){
?>
  <tr>
    <td width="21%">&nbsp;</td>
    <td width="2%">:</td>
    <td width="77%"><label for="notugas"></label></td>
  </tr>
  <tr>
    <td>No Surat Tugas</td>
    <td>&nbsp;</td>
    <td><input type="text" name="notugas" id="notugas"  class="tgl" value="<?php echo $row->id_surat_tugas;?>" readonly="readonly"/>
      <input type="hidden" name="id" id="id"  value="<?php echo $row->id_surat_tugas;?>"/></td>
  </tr>
  <tr>
    <td>Tgl Buat Surat Tugas</td>
    <td>:</td>
    <td><input type="text" name="tglsurat" id="tgl" style="width:20%" value="<?php echo $row->tgl_surat_tugas;?>"/></td>
  </tr>
  <tr>
    <td>Nomor Surat Kuasa</td>
    <td>:</td>
    <td><label for="sk"></label>
      <input type="text" name="sk" id="sk"  class="tgl" value="<?php echo $row->no_kuasa;?>"/><?php echo form_error('no_kuasa');?></td>
  </tr>
  <tr>
    <td>Tgl Terima Surat Kuasa</td>
    <td>:</td>
    <td><input type="text" name="terimask" id="tgl2" style="width:20%" value="<?php echo $row->terima_kuasa;?>"/>
      <?php echo form_error('terimask');?></td>
  </tr>
  <tr>
    <td>Tgl Terbit Surat Kuasa</td>
    <td>:</td>
    <td><input type="text" name="terbitsk" id="tgl3" style="width:20%" value="<?php echo $row->terbit_kuasa;?>" />
      <?php echo form_error('terbitsk');?></td>
  </tr>
  <tr>
    <td>Pilih Asuransi</td>
    <td>:</td>
    <td><span class="controls">
      <select name="asuransi" id="asuransi" required="required" style="height:30px">
      <option value="<?php echo $row->id_asuransi;?>"><?php echo $row->nm_asuransi;?></option>
        <?php
	foreach($asuransi as $cust){
	    ?>
        <option value="<?php echo $cust->id_asuransi;?>"><?php echo substr($cust->nm_asuransi,3);?></option>
        <?php } ?>
      </select>
    </span></td>
  </tr>
  <tr>
    <td>Jenis kendaraan</td>
    <td>:</td>
    <td><input type="text" name="jenis" id="jenis" value="<?php echo $row->type_kendaraan;?>" /></td>
  </tr>
  <tr>
    <td>Type kendaraan</td>
    <td>:</td>
    <td><input type="text" name="tipe" id="tipe" value="<?php echo $row->model_kendaraan;?>" /></td>
  </tr>
  <tr>
    <td>Tahun pembuatan</td>
    <td>:</td>
    <td><input type="text" name="thnbuat" id="thnbuat" class="tgl" value="<?php echo $row->thn_buat;?>"/></td>
  </tr>
  <tr>
    <td>Warna</td>
    <td>:</td>
    <td><input type="text" name="warna" id="warna" value="<?php echo $row->warna;?>"/></td>
  </tr>
  <tr>
    <td>Nomor Polisi</td>
    <td>:</td>
    <td><input type="text" name="nopol" id="nopol" value="<?php echo $row->no_polisi;?>" /></td>
  </tr>
  <tr>
    <td>Nomor rangka</td>
    <td>:</td>
    <td><input type="text" name="rangka" id="rangka" value="<?php echo $row->no_rangka;?>" /></td>
  </tr>
  <tr>
    <td>Nomor Mesin</td>
    <td>:</td>
    <td><input type="text" name="nomesin" id="nomesin" value="<?php echo $row->no_mesin;?>" /></td>
  </tr>
  <tr>
    <td>Nama STNK</td>
    <td>:</td>
    <td><input type="text" name="namastnk" id="namastnk" value="<?php echo $row->nm_stnk;?>" /></td>
  </tr>
  <tr>
    <td>Alamat STNK</td>
    <td>:</td>
    <td><label for="alamatstnk"></label>
      <textarea name="alamatstnk" id="alamatstnk" cols="50" rows="5"><?php echo $row->almt_stnk;?></textarea></td>
  </tr>
  <tr>
    <td>Nama Tertanggung</td>
    <td>:</td>
    <td><input type="text" name="tertanggung" id="tertanggung" value="<?php echo $row->nm_tertanggung;?>"></td>
  </tr>
  <tr>
    <td>Alamat Tertanggung</td>
    <td>:</td>
    <td><textarea name="alamattertanggung" id="alamattertanggung" cols="50" rows="5"><?php echo $row->almt_tertanggung;?></textarea></td>
  </tr>
  <tr>
    <td>Telpon</td>
    <td>:</td>
    <td><input type="text" name="telp" id="tgl7" style="width:20%" value="<?php echo $row->telp_tertanggung;?>"/> 
      HP      <input type="text" name="hp" id="tgl6" style="width:20%" value="<?php echo $this->input->post('hp');?>"/></td>
  </tr>
  <tr>
    <td>Nomor POLIS</td>
    <td>:</td>
    <td><input type="text" name="polis" id="polis" value="<?php echo $row->no_polis;?>" /></td>
  </tr>
  <tr>
    <td height="54">Tgl Berlaku Polis Mulai</td>
    <td>:</td>
    <td><input type="text" name="tglmulai" id="tgl4" style="width:20%" value="<?php echo $row->tgl_berlaku;?>"/>
      S/D 
        <input type="text" name="tglakhir" id="tgl5" style="width:20%" value="<?php echo $row->tgl_kedaluwarsa;?>"/></td>
  </tr>
  <tr>
    <td height="33">Surveyor</td>
    <td>&nbsp;</td>
    <td><span class="controls">
      <select name="surveyor" id="surveyor" required="required" style="height:32px; width:56%; margin-top:3px">
        <option value="<?php echo $row->id_pegawai;?>"><?php echo $row->nm_surveyor;?></option>
        <?php
	foreach($surveyor as $sv){
	    ?>
        <option value="<?php echo $sv->id_pegawai;?>"><?php echo $sv->nm_surveyor;?></option>
        <?php } ?>
      </select>
    </span></td>
  </tr>
  <tr>
    <td height="44">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="button" id="button" value="SIMPAN" class="btn" />
      <input type="submit" name="button2" id="button2" value="SIMPAN &amp; CETAK" class="btn1" /></td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <?php } ?>
</table>

</form>
</div>
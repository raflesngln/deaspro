
<script src="<?php echo base_url();?>asset/js/jquery.js" type="text/javascript"></script>

<style type="text/css">
.input{
	width:100%;
	background-color:#FFF;
	padding-left:15%;
	padding-top:20px;
	border:2px #CCC solid;
}
.input table{
	border:2px #CCC solid;
	padding-left:9px;
}
.input table tr td{
	height:30px;
}

.input input[type=text]{
	height:30px;
	width:220px;
	margin-top:3px;
	padding-left:5px;
	border:2px #CCC solid;
}
#button{ height:35px; width:150px; margin:5px; background-color:#35BBCA; border:none; border-radius:4px; cursor:pointer;color:#FFF}
#ambildata{background-color:#00A854; width:110px; height:30px; color:#FFF; border:none; border-radius:5px; cursor:pointer}
#button:hover{ background-color:#008080}

</style>
<div class="input">
<h3><u>Pembayaran Biaya</u></h3>
<h4 align="center"><?php echo isset($message)?$message:'';?></h4>
<br />
<form action="<?php echo base_url();?>kwitansi/save_kwitansi" method="post">
<?php
foreach($list as $data){
?>
<p>NO. Kwitansi</p>
<input name="nokwitansi" type="text" id="nokwitansi" value="<?php echo $data->id_kwitansi;?>" readonly="readonly" /><br />
<p>Asuransi</p>
<p>
  <input name="nokwitansi2" type="text" id="nokwitansi2" value="<?php echo $data->id_surat_tugas;?>" readonly="readonly" />
</p>
<p>
  <input name="nokwitansi3" type="text" id="nokwitansi3" value="<?php echo $data->no_kuasa;?>" readonly="readonly" />
  <br />
</p>
<?php } ?>
<div id="detail"></div>

<br />
<table width="55%" border="0">
  <tr>
    <td width="34%" height="38">Keterangan</td>
    <td width="2%">&nbsp;</td>
    <td width="64%"><div align="center">Jumlah </div></td>
  </tr>
  <tr>
    <td colspan="3"><hr /></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Uang Survey</td>
    <td>:</td>
    <td>Rp &nbsp;<input name="survey" type="text" id="survey" onchange="hitung()" /></td>
  </tr>
  <tr>
    <td>Uang Operasional</td>
    <td>:</td>
    <td>Rp &nbsp;<input name="operasional" type="text" id="operasional" /></td>
  </tr>
  <tr>
    <td>Gagal Klaim</td>
    <td>:</td>
    <td>Rp &nbsp;<input name="klaim" type="text" id="klaim" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3"><div align="center">
      <input type="submit" name="button" id="button" value="Simpan" />
      </div></td>
  </tr>
</table>


</form>
<script type="text/javascript">		
		 $("#id_asuransi").change(function(){
			  $('#detail').html('');
            var id_asuransi = $("#id_asuransi").val();
          $.ajax({
                type: "POST",
                url : "<?php echo base_url('kwitansi/get_lhs'); ?>",
                data: "id_asuransi="+id_asuransi,
                success: function(data){
                    $('#no_kuasa').html(data);
                }
            });
        });
		
$("#no_kuasa").change(function(){
            var no_kuasa = $("#no_kuasa").val();
          $.ajax({
                type: "POST",
                url : "<?php echo base_url('kwitansi/get_detail_lhs'); ?>",
                data: "no_kuasa="+no_kuasa,
                success: function(data){
                    $('#detail').html(data);
                }
            });
        });

			
       
</script>
</div>
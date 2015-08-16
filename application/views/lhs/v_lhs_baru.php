<script src="<?php echo base_url();?>asset/js/jquery.js" type="text/javascript"></script>

<script src="<?php echo base_url();?>asset/jquery_ui/ui/jquery.ui.core.js"></script>
<script src="<?php echo base_url();?>asset/jquery_ui/ui/jquery.ui.widget.js"></script>
<script src="<?php echo base_url();?>asset/jquery_ui/ui/jquery.ui.datepicker.js"></script>
<link rel="stylesheet" href="<?php echo base_url();?>asset/jquery_ui/themes/base/jquery.ui.all.css">
	<script src="<?php echo base_url();?>asset/jquery_ui/ui/jquery.ui.tabs.js"></script>
	<script>
	$(function() {
		$( "#tabs" ).tabs({
			collapsible: true
		});
	});
	</script>
<script>
	$("document").ready(function(){
		$("#tgl").datepicker();
		$("#tgl2").datepicker();
		$("#tgl3").datepicker();
		$("#tgl4").datepicker();
		$("#tgl9").datepicker();
	});
	</script>

<style type="text/css">
.input{
	width:85%;
	background-color:#FFF;
	padding-left:2%;
	padding-top:20px;
	padding-bottom:20px;
}
#tgl,#tgl2,#tgl9{ width:30%;}
.input table tr td{
	height:25px;
}
.input table h3{
	border-radius:5px;
	margin-right:37%;
	text-align:center;
}
.input input[type=text]{
	height:35px;

}

input table .tgl{ width:120px;}

</style>

<section class="main-content">
    <div class="container">
        <div class="page-content">
            <div class="header">
                <h2><i class="fa fa-plus-square"></i>&nbsp;Buat <strong>LHS</strong></h2>
                <div class="breadcrumb-wrapper">
                  <ol class="breadcrumb">
                    <li><a href="<?php echo base_url();?>">Home</a>
                    </li>
                    <li><a href="<?php echo base_url();?>lhs/list_lhs">list_lhs</a>
                    </li>
                    <li class="active">Buat LHS</li>
                  </ol>
                </div>
            </div>
            <div class="row">
               <div class="input">
<form action="<?php echo base_url();?>lhs/update_lhs" method="post">

<table width="95%" border="0">
<?php
foreach($lhs as $row){
	
$status=$row->surveyor_app;
if($status=='0'){$status='Dalam proses';}
else
{  $status='Approve ';}
?>
  <tr>
    <td width="23%">&nbsp;</td>
    <td width="2%">&nbsp;</td>
    <td width="75%"><label for="notugas"><h3><font color="#00CC00"><?php echo isset($message)?$message:'';?></font></h3></label></td>
  </tr>
  <tr>
    <td>No Surat Tugas</td>
    <td>&nbsp;</td>
    <td><input type="text" name="notugas" id="notugas"  class="tgl form-control" value="<?php echo $row->id_surat_tugas;?>" readonly="readonly"/>
      <input type="hidden" name="id" id="id"  value="<?php echo $row->id_lhs;?>"/></td>
  </tr>
  <tr>
    <td>Tgl LHS</td>
    <td>&nbsp;</td>
    <td><input type="text" name="tgllhs" id="tgl" class="tgllhs form-control"  value="<?php echo $row->tgl_lhs ;?>" readonly="readonly"/></td>
  </tr>
  <tr>
    <td>Awal Polis</td>
    <td>&nbsp;</td>
    <td><input type="text" name="awalpolis" class="" id="tgl2" value="<?php echo $row->awal_polis;?>" readonly="readonly"/> 
      SD
      <input type="text" name="akhirpolis" id="tgl9" class="" value="<?php echo $row->akhir_polis;?>" readonly="readonly"/></td>
  </tr>
  <tr>
    <td>Uraian Singkat</td>
    <td>&nbsp;</td>
    <td rowspan="2"><label for="uraian"></label>
      <textarea name="uraian" id="uraian" cols="45" rows="10" class="txt ckeditor form-control"><?php echo $row->uraian_singkat;?></textarea></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>:</td>
  </tr>
  <tr>
    <td colspan="3"><h3>&nbsp;</h3></td>
  </tr>
  
</table>


<div id="tabs" style="border:">
	<ul>
    	<li><a href="#tabs-1">Saksi2</a></li>
        <li><a href="#tabs-8">Penyidik</a></li>
		<li><a href="#tabs-2">TKP</a></li>
        <li><a href="#tabs-3">Analisa Saksi2</a></li>
		<li><a href="#tabs-4">Tertanggung</a></li>
        <li><a href="#tabs-5">Bukti lain</a></li>
        <li><a href="#tabs-7">Tindakan Lain </a></li>
        <li><a href="#tabs-6">Kesimpulan </a></li>
    
	</ul>
    <div id="tabs-8">
	  <p>&nbsp;</p>
	  <p>Nama</p>
	  <p>
	    <input type="text" name="penyidik" id="penyidik"  class="tgl" value="<?php echo $row->penyidik;?>"/>
	  </p>
	  <p>Pangkat / Jabatan</p>
	  <p>
	    <input type="text" name="pangkat" id="pangkat"  class="pangkat" value="<?php echo $row->pangkat_penyidik;?>"/>
	  </p>
	  <p>Alamat</p>
	  <p>
	    <input type="text" name="alamatpenyidik" id="alamatpenyidik"  class="tgl" value="<?php echo $row->almt_penyidik;?>"/>
	  </p>
	  <p>Keterangan</p>
	  <p>
	    <textarea name="ketpenyidik" class="txt ckeditor form-control" id="ketpenyidik" cols="45" rows="5"><?php echo $row->ket_penyidik;?></textarea>
      </p>
    </div>
<div id="tabs-1">
		<p align="center"><strong>SAKSI 1</strong></p>
		<div class="form-group">
		  <div class="col-sm-10">
         <label> Nama</label>
               <input type="text" name="saksi1" value="<?php echo $row->saksi1;?>" class="form-control" />
          </div>
                                                    <div class="clearfix"></div>
        </div>
 <div class="form-group">
   <div class="col-sm-10">
         <label> Alamat </label>
<input name="alamatsaksi1" type="text" class="form-control" id="alamatsaksi1" value="<?php echo $row->almt_saksi1;?>" required="required />
                                            </div>
                                                    <div class="clearfix"></div>
 </div>
 <div class="form-group">
   <div class="col-sm-10">
         <label> Keterangan </label>
         <textarea name="ketsaksi1" class="form-control" id="ketsaksi1" required="required /&gt;
                                            &lt;/div&gt;
                                                    &lt;div class=" clearfix="clearfix"><?php echo $row->ket_saksi1;?></textarea>
   </div>
 </div>
 <div class="clearfix"></div>
 <p align="center"><strong>SAKSI 2</strong>		</p>
		<div class="form-group">
		  <div class="col-sm-10">
         <label> Nama</label>
               <input type="text" name="saksi2" value="<?php echo $row->saksi2;?>" class="form-control" />
          </div>
                                                    <div class="clearfix"></div>
        </div>
 <div class="form-group">
   <div class="col-sm-10">
         <label> Alamat </label>
<input name="alamatsaksi2" type="text" class="form-control" id="alamatsaksi2" value="<?php echo $row->almt_saksi2;?>" required="required />
                                            </div>
                                                    <div class="clearfix"></div>
 </div>
 <div class="form-group">
   <div class="col-sm-10">
         <label> Keterangan </label>
         <textarea name="ketsaksi2" class="form-control" id="ketsaksi2" required="required /&gt;
                                            &lt;/div&gt;
                                                    &lt;div class=" clearfix="clearfix"><?php echo $row->ket_saksi2;?></textarea>
   </div>
 </div>
 <div class="clearfix"></div>
 <p align="center"><strong>SAKSI 3</strong>		</p>
		<div class="form-group">
		  <div class="col-sm-10">
         <label> Nama</label>
               <input type="text" name="saksi3" value="<?php echo $row->saksi3;?>" class="form-control" />
          </div>
                                                    <div class="clearfix"></div>
        </div>
 <div class="form-group">
   <div class="col-sm-10">
         <label> Alamat </label>
<input name="alamatsaksi3" type="text" class="form-control" id="alamatsaksi3" value="<?php echo $row->almt_saksi3;?>" required="required />
                                            </div>
                                                    <div class="clearfix"></div>
 </div>
 <div class="form-group">
   <div class="col-sm-10">
         <label> Keterangan </label>
         <textarea name="ketsaksi3" class="form-control" id="ketsaksi3" required="required /&gt;
                                            &lt;/div&gt;
                                                    &lt;div class=" clearfix="clearfix"><?php echo $row->ket_saksi3;?></textarea>
   </div>
 </div>
<div class="clearfix"></div>
 <p align="center"><strong>SAKSI 4</strong>		</p>
		<div class="form-group">
		  <div class="col-sm-10">
         <label> Nama</label>
               <input type="text" name="saksi4" value="<?php echo $row->saksi4;?>" class="form-control" />
          </div>
                                                    <div class="clearfix"></div>
        </div>
 <div class="form-group">
   <div class="col-sm-10">
         <label> Alamat </label>
<input name="alamatsaksi4" type="text" class="form-control" id="alamatsaksi4" value="<?php echo $row->almt_saksi4;?>" required="required />
                                            </div>
                                                    <div class="clearfix"></div>
 </div>
 <div class="form-group">
   <div class="col-sm-10">
         <label> Keterangan </label>
         <textarea name="ketsaksi4" class="form-control" id="ketsaksi4" required="required /&gt;
                                            &lt;/div&gt;
                                                    &lt;div class=" clearfix="clearfix"><?php echo $row->ket_saksi4;?></textarea>
   </div>
 </div>
<div class="clearfix"></div>
 <p align="center"><strong>SAKSI 5</strong>		</p>
		<div class="form-group">
		  <div class="col-sm-10">
         <label> Nama</label>
               <input type="text" name="saksi5" value="<?php echo $row->saksi5;?>" class="form-control" />
          </div>
                                                    <div class="clearfix"></div>
        </div>
 <div class="form-group">
   <div class="col-sm-10">
         <label> Alamat </label>
<input name="alamatsaksi5" type="text" class="form-control" id="alamatsaksi5" value="<?php echo $row->almt_saksi5;?>" required="required />
                                            </div>
                                                    <div class="clearfix"></div>
 </div>
 <div class="form-group">
   <div class="col-sm-10">
         <label> Keterangan </label>
         <textarea name="ketsaksi5" class="form-control" id="ketsaksi5" required="required /&gt;
                                            &lt;/div&gt;
                                                    &lt;div class=" clearfix="clearfix"><?php echo $row->ket_saksi5;?></textarea>
   </div>
 </div>
<div class="clearfix"></div>
 <p align="center"><strong>SAKSI 6</strong>		</p>
		<div class="form-group">
		  <div class="col-sm-10">
         <label> Nama</label>
               <input type="text" name="saksi6" value="<?php echo $row->saksi6;?>" class="form-control" />
          </div>
                                                    <div class="clearfix"></div>
        </div>
 <div class="form-group">
   <div class="col-sm-10">
         <label> Alamat </label>
<input name="alamatsaksi6" type="text" class="form-control" id="alamatsaksi6" value="<?php echo $row->almt_saksi6;?>" required="required />
                                            </div>
                                                    <div class="clearfix"></div>
 </div>
 <div class="form-group">
   <div class="col-sm-10">
         <label> Keterangan </label>
         <textarea name="ketsaksi6" class="form-control" id="ketsaksi6" required="required /&gt;
                                            &lt;/div&gt;
                                                    &lt;div class=" clearfix="clearfix"><?php echo $row->ket_saksi6;?></textarea>
   </div>
 </div>

 <p>&nbsp;</p>
		<p>&nbsp;</p>
</div>
<div class="clearfix"></div>
	<div id="tabs-2">
		<p><strong>ANALISA A</strong></p>
        <p>
          <textarea name="tkpa" id="tkpa" cols="45" rows="5" class="txt ckeditor"><?php echo $row->analisa_tkp_a;?></textarea>
        </p>
        <p><strong>ANALIS B</strong></p>
        <p>
          <textarea name="tkpb" id="tkpb" cols="45" rows="5" class="txt ckeditor"><?php echo $row->analisa_tkp_b;?></textarea>
        </p>
    </div>
	<div id="tabs-3">
		<p><strong>SAKSI  A</strong></p>
		<p>
		  <textarea name="saksia" id="saksia" cols="45" rows="5" class="txt ckeditor"><?php echo $row->analisa_saksi_a ;?></textarea>
		</p>
		<p><strong>SAKSI  B</strong></p>
		<p>
		  <textarea name="saksib" id="saksib" cols="45" rows="5" class="txt ckeditor"><?php echo $row->analisa_saksi_b ;?></textarea>
		</p>
		<p><strong>SAKSI  C</strong></p>
		<p>
		  <textarea name="saksic" id="saksic" cols="45" rows="5" class="txt ckeditor"><?php echo $row->analisa_saksi_c ;?></textarea>
		</p>
		<p><strong>SAKSI  D</strong></p>
		<p>
		  <textarea name="saksid" id="saksid" cols="45" rows="5" class="txt ckeditor"><?php echo $row->analisa_saksi_d ;?></textarea>
		</p>
	</div>
    <div id="tabs-4">
		<p><strong>Nama 	    </strong></p>
		<p>
		  <input type="text" name="tertanggung" id="tertanggung" value="<?php echo $row->nm_tertanggung;?>" readonly="readonly" />
	    </p>
		<p><strong>Keterangan </strong></p>
		<p>
		  <textarea name="kettertanggung" id="kettertanggung" cols="45" rows="5" class="txt ckeditor"><?php echo $row->ket_tertanggung  ;?></textarea>
		</p>
		<p><strong>Analisa </strong></p>
		<p>
		  <textarea name="analisatertanggung" id="analisatertanggung" cols="45" rows="5" class="txt ckeditor"><?php echo $row->analisa_tertanggung  ;?></textarea>
		</p>
	</div>
    
 <div id="tabs-5">
		<p><strong>Alat bukti lain</strong></p>
		<p>
		  <textarea name="buktilain" id="buktilain" cols="45" rows="5" class="txt ckeditor"><?php echo $row->alat_bukti_lain  ;?></textarea>
		</p>
	</div>
 <div id="tabs-6">
		<p><strong>Kesimpulan 1</strong></p>
		<p>
		  <textarea name="kesimpulan1" id="kesimpulan1" cols="45" rows="5" class="txt ckeditor"><?php echo $row->kesimpulan1  ;?></textarea>
		</p>
		<p><strong>Kesimpulan 2</strong></p>
		<p>
		  <textarea name="kesimpulan2" id="kesimpulan2" cols="45" rows="5" class="txt ckeditor"><?php echo $row->kesimpulan2  ;?></textarea>
		</p>
		<p><strong>Kesimpulan 3</strong></p>
		<p>
		  <textarea name="kesimpulan3" id="kesimpulan3" cols="45" rows="5" class="txt ckeditor"><?php echo $row->kesimpulan3  ;?></textarea>
		</p>
		<p><strong>Kesimpulan 4</strong></p>
		<p>
		  <textarea name="kesimpulan4" id="kesimpulan4" cols="45" rows="5" class="txt ckeditor"><?php echo $row->kesimpulan4  ;?></textarea>
		</p>
		<p><strong>Kesimpulan 5</strong></p>
		<p>
		  <textarea name="kesimpulan5" id="kesimpulan5" cols="45" rows="5" class="txt ckeditor"><?php echo $row->kesimpulan5  ;?></textarea>
		</p>
		<p><strong>Kesimpulan 6</strong></p>
		<p>
		  <textarea name="kesimpulan6" id="kesimpulan6" cols="45" rows="5" class="txt ckeditor"><?php echo $row->kesimpulan6  ;?></textarea>
        </p>
	</div>
   <div id="tabs-7">
		<p><strong>Tindakan 1</strong></p>
		<p>Judul</p>
		<p>
		  <input type="text" name="tindakan1" id="tindakan1"  class="tgl" value="<?php echo $row->tindakan1;?>"/>
		</p>
		<p>Alamat</p>
		<p>
		  <input type="text" name="almttindakan1" id="almttindakan1"  class="tgl" value="<?php echo $row->almt_tindakan1;?>"/>
		</p>
		<p>Keterangan </p>
        <textarea name="kettindakan1" id="kettindakan1" cols="45" rows="5" class="txt ckeditor"><?php echo $row->ket_tindakan1;?></textarea>
     <p><strong>Tindakan2</strong></p>
     <p>Judul</p>
     <p>
       <input type="text" name="tindakan2" id="tindakan2"  class="tgl" value="<?php echo $row->tindakan2;?>"/>
     </p>
     <p>Alamat</p>
     <p>
       <input type="text" name="almttindakan2" id="almttindakan2"  class="tgl" value="<?php echo $row->almt_tindakan2;?>"/>
     </p>
     <p>Keterangan </p>
        <textarea name="kettindakan2" id="kettindakan2" cols="45" rows="5" class="txt ckeditor"><?php echo $row->ket_tindakan2;?></textarea>
   </div>

</div>
<br />
<p>STATUS
  <select name="app" style="height:35px; width:250px">
  	<option value="<?php echo $row->surveyor_app;?>"><?php echo $status;?></option>
    <option value="0">Berlangsung</option>
    <option value="1">Approved</option>
  </select>
  </p>
<p><br />
  <input type="submit" name="button" id="button" value="SIMPAN" class="btn btn-primary btn-large" />
  <input type="submit" name="button2" id="button2" value="SIMPAN &amp; CETAK" class="btn btn-primary btn-large"/>
</p>
</form>

</div>
<?php } ?>
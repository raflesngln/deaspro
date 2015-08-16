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
<link rel="stylesheet" href="<?php echo base_url();?>asset/jquery_ui/themes/base/jquery.ui.all.css">
<section class="main-content">
    <div class="container">
        <div class="page-content">
            <div class="header">
                <h2><strong>Tambah</strong>Kwitansi</h2>
                <div class="breadcrumb-wrapper">
                  <ol class="breadcrumb">
                    <li><a href="<?php echo base_url();?>">Home</a>
                    </li>
                    <li class="active">Tambah KW</li>
                  </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 portlets ui-sortable">
                    <div class="panel">
                        <!--<div class="panel-header"></div>-->
                        <div class="panel-content">
                            <div class="smart-form">
                       
                                <form action="<?php echo base_url();?>kwitansi/save_kwitansi" method="post">
                                    <div class="form-group">
                                        <div class="table-responsive">
                                            
                                                <div class="form-group">
             <p align="center"><font color="#FF0000"><?php echo isset($message)?$message:'';?></font></p>
                                                  <label for="notugas" class="col-sm-2 control-label">Tanggal</label>
                                                  <div class="col-sm-10">
                                                    <?php
$tanggal=date('m/d/Y');
?>
  <input name="tgl" type="text" id="tgl" value="<?php echo $tanggal;?>" readonly="readonly" class="form-control"/>
                                          <input type="hidden" name="idkwitansi" id="idkwitansi" value="<?php echo $kd_kwitansi;?>" />
                                                  </div>
                                                    <div class="clearfix"></div>
                                          </div>
                                                
       <div class="form-group">
                                                    <label for="notugas" class="col-sm-2 control-label">Asuransi</label>
<div class="col-sm-10">
  <select id="id_asuransi" tabindex="5" class="chzn-select form-control" name="id_asuransi" data-placeholder="Pilih Pelanggan" >
    <option value="">Pilih Asuransi</option>
    <?php
                            if(isset($asuransi)){
                                foreach($asuransi as $row){
                                    ?>
    <option value="<?php echo $row->id_asuransi?>"><?php echo $row->nm_asuransi;?></option>
    <?php
                                }
                            }
                            ?>
  </select>
</div>
                                                    <div class="clearfix"></div>
                                          </div>
     
<div class="form-group"><label for="notugas" class="col-sm-2 control-label">ST</label>
  <div class="col-sm-10">
  <select id="id_surat_tugas" tabindex="5" class="chzn-select form-control" name="id_surat_tugas" data-placeholder="Pilih Pelanggan" >
    <option></option>
  </select>
</div>
                                                    <div class="clearfix"></div>
                                          </div>
<div class="form-group">
<label for="notugas" class="col-sm-2 control-label">&nbsp;</label>
  
  <div class="col-sm-10" id="detail">
    
  </div>
                                                    <div class="clearfix"></div>
                                          </div>
                                           <div class="clearfix"></div>
<div class="form-group">
  <label for="notugas" class="col-sm-2 control-label">&nbsp; </label>
                                            <div class="col-sm-10">
<table width="80%" border="0">
  <tr>
    <td width="16%" height="37"><strong>Trans</strong></td>
    <td width="19%"><strong>Jumlah</strong></td>
    <td width="17%"><strong>No Kwitansi</strong></td>
    </tr>
  <tr>
    <td>B.Survey</td>
    <td><input name="survey" type="text" id="survey" onchange="hitung()" class="form-control"/></td><div class="clearfix"></div>
    <td><input name="survey2" type="text" id="survey2" onchange="hitung()" placeholder="nomor kwitansi" required="required" class="form-control"/></td><div class="clearfix"></div>
    </tr>
  <tr>
    <td>B.Operasional</td>
    <td><input name="operasional" type="text" id="operasional" class="form-control"/></td><div class="clearfix"></div>
    <td><input name="operasional2" type="text" id="operasional2" placeholder="nomor kwitansi" required="required" class="form-control"/></td><div class="clearfix"></div>
    </tr>
  <tr>
    <td>B.Klaim</td>
    <td><input name="klaim" type="text" id="klaim" class="form-control"/></td>
    <td><input name="klaim2" type="text" id="klaim2" placeholder="nomor kwitansi" required="required" class="form-control"/></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
</table>
                                            </div>
                                                    <div class="clearfix"></div>
                                          </div>
<div class="form-group">
          <div class="clearfix"></div>
                                  </div>
                                                <div class="form-group">
                                                  <div class="col-sm-10"></div>
                                                    <div class="clearfix"></div>
                                          </div>
                                            <div class="form-group">
                                                <div class="col-md-6"><input type="submit" name="button" id="button" value="SIMPAN" class="btn btn-primary btn-large" /></div>
                                                <div class="clearfix"></div>
                                            </div>    
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">		
		 $("#id_asuransi").change(function(){
			  $('#detail').html('');
            var id_asuransi = $("#id_asuransi").val();
          $.ajax({
                type: "POST",
                url : "<?php echo base_url('kwitansi/get_lhs'); ?>",
                data: "id_asuransi="+id_asuransi,
                success: function(data){
                    $('#id_surat_tugas').html(data);
                }
            });
        });
		
$("#id_surat_tugas").change(function(){
            var id_surat_tugas = $("#id_surat_tugas").val();
          $.ajax({
                type: "POST",
                url : "<?php echo base_url('kwitansi/get_detail_lhs'); ?>",
                data: "id_surat_tugas="+id_surat_tugas,
                success: function(data){
                    $('#detail').html(data);
                }
            });
        });

			
       
</script>
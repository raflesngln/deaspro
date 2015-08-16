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
<section class="main-content">
    <div class="container">
        <div class="page-content">
            <div class="header">
                <h2><strong>Edit</strong>Surat Tugas</h2>
                <div class="breadcrumb-wrapper">
                  <ol class="breadcrumb">
                    <li><a href="<?php echo base_url();?>">Home</a>
                    </li>
                    <li><a href="<?php echo base_url();?>surat_tugas/list_surat_tugas">List ST</a>
                    </li>
                    <li class="active">Edit ST</li>
                  </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 portlets ui-sortable">
                    <div class="panel">
                        <!--<div class="panel-header"></div>-->
                        <div class="panel-content">
                            <div class="smart-form">
                       
                                <form action="<?php echo base_url();?>surat_tugas/update_surat_tugas" method="post">
                                <?php
foreach($st as $row){
?>
                                    <div class="form-group">
                                        <div class="table-responsive">
                                            
                                                <div class="form-group">
             <p align="center"><?php echo isset($message)?$message:'';?></p>
                                                  <label for="notugas" class="col-sm-2 control-label">No ST</label>
                                            <div class="col-sm-10">
                                              <input type="text" name="notugas" id="notugas"  class="form-control tgl" value="<?php echo $row->id_surat_tugas;?>" readonly="readonly"/>
                                              <input type="hidden" name="id" id="id"  value="<?php echo $row->id_surat_tugas;?>"/>
                                                </div>
                                                    <div class="clearfix"></div>
                                          </div>
                                                
       <div class="form-group">
                                                    <label for="notugas" class="col-sm-2 control-label">Tgl ST</label>
<div class="col-sm-10">
  <input type="text" name="tglsurat" id="tgl" style="width:20%" value="<?php echo $row->tgl_surat_tugas;?>" readonly="readonly" class="form-control"/>
  <?php echo form_error('nominal');?></div>
                                                    <div class="clearfix"></div>
                                          </div>
     
<div class="form-group"><label for="notugas" class="col-sm-2 control-label">No Kuasa</label>
  <div class="col-sm-10">
    <input type="text" name="sk" id="sk"  class="form-control tgl" value="<?php echo $row->no_kuasa;?>"/>
    <?php echo form_error('sk');?></div>
                                                    <div class="clearfix"></div>
                                          </div><div class="form-group">
                                                    <label for="notugas" class="col-sm-2 control-label">Tgl terima Kuasa</label>
<div class="col-sm-10">
  <input type="text" name="terimask" id="tgl2" style="width:20%" value="<?php echo $row->terima_kuasa;?>" readonly="readonly" class="form-control" required="required"/>
</div>
                                                    <div class="clearfix"></div>
                                          </div>
                                          <div class="form-group"><label for="notugas" class="col-sm-2 control-label">Terbit Kuasa</label>
                                            <div class="col-sm-10">
                                              <input type="text" name="terbitsk" id="tgl3" style="width:20%" value="<?php echo $row->terbit_kuasa;?>" readonly="readonly" class="form-control"required="required />
                                            </div>
                                                    <div class="clearfix"></div>
                                          </div>
                                          <div class="form-group"><label for="notugas" class="col-sm-2 control-label">Asuransi</label>
                                            <div class="col-sm-10"><span class="controls">
                                              <select name="asuransi" id="asuransi" required="required" style="height:30px" class="form-control">
                                                <option value="<?php echo $row->id_asuransi;?>"><?php echo $row->nm_asuransi;?></option>
                                                <?php
	foreach($asuransi as $cust){
	    ?>
                                                <option value="<?php echo $cust->id_asuransi;?>"><?php echo substr($cust->nm_asuransi,3);?></option>
                                                <?php } ?>
                                              </select>
                                            </span><span class="controls"><?php echo form_error('asuransi');?></span></div>
                                                    <div class="clearfix"></div>
                                          </div>
                                          <div class="form-group"><label for="notugas" class="col-sm-2 control-label">Jenis Kendaraan</label>
                                            <div class="col-sm-10">
                                              <input type="text" name="jenis" id="jenis" value="<?php echo $row->type_kendaraan;?>" class="form-control" />
                                            <?php echo form_error('jenis');?></div>
                                                    <div class="clearfix"></div>
                                          </div>
                                          <div class="form-group"><label for="notugas" class="col-sm-2 control-label">Tipe Kendaraan</label>
                                            <div class="col-sm-10">
                                              <input type="text" name="tipe" id="tipe" value="<?php echo $row->model_kendaraan;?>"  class="form-control"/>
                                            </div>
                                                    <div class="clearfix"></div>
                                          </div>
                                          <div class="form-group"><label for="notugas" class="col-sm-2 control-label">Tahun Pembuatan</label>
                                            <div class="col-sm-10">
                                              <input type="text" name="thnbuat" id="thnbuat" class=" form-control tgl" value="<?php echo $row->thn_buat;?>"/>
                                            </div>
                                                    <div class="clearfix"></div>
                                          </div>
                                          <div class="form-group"><label for="notugas" class="col-sm-2 control-label">Warna</label>
                                            <div class="col-sm-10">
                                              <input type="text" name="warna" id="warna" value="<?php echo $row->warna;?>" class="form-control"/>
                                            </div>
                                                    <div class="clearfix"></div>
                                          </div>
                                          <div class="form-group"><label for="notugas" class="col-sm-2 control-label">No Polisii</label>
                                            <div class="col-sm-10">
                                              <input type="text" name="nopol" id="nopol" value="<?php echo $row->no_polisi;?>" class="form-control" />
                                            </div>
                                                    <div class="clearfix"></div>
                                          </div>
                                          <div class="form-group"><label for="notugas" class="col-sm-2 control-label">No Rangka</label>
                                            <div class="col-sm-10">
                                              <input type="text" name="rangka" id="rangka" value="<?php echo $row->no_rangka;?>" class="form-control" />
                                            </div>
                                                    <div class="clearfix"></div>
                                          </div>
                                          <div class="form-group"><label for="notugas" class="col-sm-2 control-label">No Mesin</label>
                                            <div class="col-sm-10">
                                              <input type="text" name="rangka2" id="rangka2" value="<?php echo $row->no_rangka;?>"  class="form-control"/>
                                            </div>
                                                    <div class="clearfix"></div>
                                          </div>
                                          <div class="form-group"><label for="notugas" class="col-sm-2 control-label">Nama STNK</label>
                                            <div class="col-sm-10">
                                              <input type="text" name="namastnk" id="namastnk" value="<?php echo $row->nm_stnk;?>" class="form-control" />
                                            </div>
                                                    <div class="clearfix"></div>
                                          </div>
                                          <div class="form-group"><label for="notugas" class="col-sm-2 control-label">Alamat</label>
                                            <div class="col-sm-10">
                                              <textarea name="alamatstnk" id="alamatstnk" cols="50" rows="5" class="form-control"><?php echo $row->almt_stnk;?></textarea>
                                            </div>
                                                    <div class="clearfix"></div>
                                          </div>
                                          <div class="form-group"><label for="notugas" class="col-sm-2 control-label">Tertanggung</label>
                                            <div class="col-sm-10">
                                              <input type="text" name="tertanggung" id="tertanggung" value="<?php echo $row->nm_tertanggung;?>" class="form-control">
                                            <?php echo form_error('tertanggung');?></div>
                                                    <div class="clearfix"></div>
                                          </div>                                                                               
                                          
                                          <div class="form-group"><label for="notugas" class="col-sm-2 control-label">Alamat Tetanggung</label>
                                            <div class="col-sm-10">
                                              <textarea name="alamattertanggung" id="alamattertanggung" cols="50" rows="5" class="form-control"><?php echo $row->almt_tertanggung;?></textarea>
                                            </div>
                                                    <div class="clearfix"></div>
                                          </div>
<div class="form-group"> <label for="notugas" class="col-sm-2 control-label">Telpon</label>
                                            <div class="col-sm-10">
                                              <input type="text" name="telp" id="tgl7" style="width:20%" value="<?php echo $row->telp_tertanggung;?>" class="form-control"/>
                                            </div>
                                                    <div class="clearfix"></div>
                                          </div>
<div class="form-group"><label for="notugas" class="col-sm-2 control-label">HP</label>
                                            <div class="col-sm-10">
                                              <input type="text" name="hp" id="tgl6" style="width:20%" value="<?php echo $row->hp_tertanggung;?>" class="form-control"/>
                                            </div>
                                                    <div class="clearfix"></div>
                                          </div>
<div class="form-group"><label for="notugas" class="col-sm-2 control-label">No Kontrak</label>
  <div class="col-sm-10">
    <input type="text" name="nokontrak" id="nokontrak" value="<?php echo $row->no_kontrak;?>" class="form-control" />
  </div>
                                                    <div class="clearfix"></div>
                                          </div>
<div class="form-group"><label for="notugas" class="col-sm-2 control-label">No Polis</label>
  <div class="col-sm-10">
    <input type="text" name="polis" id="polis" value="<?php echo $row->no_polis;?>"  class="form-control"/>
  </div>
                                                    <div class="clearfix"></div>
                                          </div>
<div class="form-group"><label for="notugas" class="col-sm-2 control-label">Tgl Berlaku Polis</label>
  <div class="col-sm-10">
    <input type="text" name="tglmulai" id="tgl4" style="width:20%" value="<?php echo $row->tgl_berlaku;?>" readonly="readonly" class="form-control"/>
  </div>
                                                    <div class="clearfix"></div>
                                          </div>
<div class="form-group"><label for="notugas" class="col-sm-2 control-label">Akhir Polis</label>
  <div class="col-sm-10">
    <input type="text" name="tglakhir" id="tgl5" style="width:20%" value="<?php echo $row->tgl_kedaluwarsa;?>" readonly="readonly" class="form-control"/>
  </div>
                                                    <div class="clearfix"></div>
                                          </div>                                                
                                                
<div class="form-group">
                                                  <label for="notugas" class="col-sm-2 control-label">Surveyor</label>
                                                  <div class="col-sm-10"><span class="controls">
                                                    <select name="surveyor" id="surveyor" required="required" style="height:32px; width:56%; margin-top:3px" class="form-control">
                                                      <option value="<?php echo $row->id_pegawai;?>"><?php echo $row->nm_surveyor;?></option>
                                                      <?php
	foreach($surveyor as $sv){
	    ?>
                                                      <option value="<?php echo $sv->id_pegawai;?>"><?php echo $sv->nm_surveyor;?></option>
                                                      <?php } ?>
                                                    </select>
                                                  </span><span class="controls"><?php echo form_error('surveyor');?></span></div>

                                                  <div class="form-group">
                                                  <div class="col-sm-10"></div>
                                                    <div class="clearfix"></div>
                                          </div>
                                          
      <div class="form-group"><label for="notugas" class="col-sm-2 control-label">Alamat</label>
                                            <div class="col-sm-10">
                                              <textarea name="uraian_st" id="uraian_st" cols="50" rows="5" class="form-control"><?php echo $row->uraian_st;?></textarea>
                                            </div>
                                                    <div class="clearfix"></div>
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
                                                <div class="col-md-6"><input type="submit" name="button" id="button" value="SIMPAN" class="btn btn-primary btn-large" /><input type="submit" name="button2" id="button2" value="SIMPAN &amp; CETAK" class="btn btn-primary btn-large" /></div>
                                                <div class="clearfix"></div>
                                            </div>    
                                        </d
                                        ><?php } ?>
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
		 $("#id_parent").change(function(){
			  $('#detail').html('');
            var id_parent = $("#id_parent").val();
          $.ajax({
                type: "POST",
                url : "<?php echo base_url('transaksi/get_kategori'); ?>",
                data: "id_parent="+id_parent,
                success: function(data){
                    $('#kategori').html(data);
                }
            });
        });
		       
</script>
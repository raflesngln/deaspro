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
                <h2><strong>Tambah</strong>Surat Tugas</h2>
                <div class="breadcrumb-wrapper">
                  <ol class="breadcrumb">
                    <li><a href="<?php echo base_url();?>">Home</a>
                    </li>
                    <li class="active">Tambah Surat Tugas</li>
                  </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 portlets ui-sortable">
                    <div class="panel">
                        <!--<div class="panel-header"></div>-->
                        <div class="panel-content">
                            <div class="smart-form">
                       
                                <form action="<?php echo base_url();?>surat_tugas/save_surat_tugas" method="post">
                                    <div class="form-group">
                                        <div class="table-responsive">
                                            
                                                <div class="form-group">
             <p align="center"><font color="#FF0000"><?php echo isset($message)?$message:'';?></font></p>
                                                  <label for="notugas" class="col-sm-2 control-label">No ST</label>
                                                  <div class="col-sm-10">
                                                    <input name="notugas" type="text" class="form-control" id="notugas" required="required">
                                                      <input type="hidden" name="kodelhs" id="kodelhs" value="<?php echo isset($kodelhs)?$kodelhs:'';?>"/>
                                                  </div>
                                                    <div class="clearfix"></div>
                                          </div>
                                                
       <div class="form-group">
                                                    <label for="notugas" class="col-sm-2 control-label">Tgl ST</label>
<div class="col-sm-10">
  <input name="tglsurat" type="text" class="form-control txt-date datte" id="tgl" value="<?php echo date('m/d/Y');?>"  placeholder="date" readonly="readonly">
<?php echo form_error('nominal');?></div>
                                                    <div class="clearfix"></div>
                                          </div>
     
<div class="form-group"><label for="notugas" class="col-sm-2 control-label">No Kuasa</label>
  <div class="col-sm-10">
  <input name="sk" type="text" class="form-control txt-date datte" id="sk" value="<?php echo $this->input->post('sk');?>"/><?php echo form_error('sk');?></div>
                                                    <div class="clearfix"></div>
                                          </div><div class="form-group">
                                                    <label for="notugas" class="col-sm-2 control-label">Tgl terima Kuasa</label>
<div class="col-sm-10">
  <input name="terimask" type="text" class="form-control txt-date datte" id="tgl2" value="<?php echo $this->input->post('terimask');?>" readonly="readonly"required="required/></div>
                                                    <div class="clearfix"></div>
                                          </div>
                                          <div class="form-group"><label for="notugas" class="col-sm-2 control-label">Terbit Kuasa</label>
                                            <div class="col-sm-10">
  <input name="terbitsk" type="text" class="form-control txt-date datte" id="tgl3" value="<?php echo $this->input->post('terbitsk');?>" readonly="readonly" required="required/></div>
                                                    <div class="clearfix"></div>
                                          </div>
                                          <div class="form-group"><label for="notugas" class="col-sm-2 control-label">Asuransi</label>
                                            <div class="col-sm-10"><span class="controls">
  <select name="asuransi" id="asuransi" class="chzn-select form-control" required="required" style="height:30px">
      <option>pilih asuransi</option>
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
  <input name="jenis" type="text" class="form-control txt-date datte" id="jenis" value="<?php echo $this->input->post('jenis');?>" />
      <?php echo form_error('jenis');?></div>
                                                    <div class="clearfix"></div>
                                          </div>
                                          <div class="form-group"><label for="notugas" class="col-sm-2 control-label">Tipe Kendaraan</label>
                                            <div class="col-sm-10">
  <input name="tipe" type="text" class="form-control txt-date datte" id="tipe" value="<?php echo $this->input->post('tipe');?>">
                                            </div>
                                                    <div class="clearfix"></div>
                                          </div>
                                          <div class="form-group"><label for="notugas" class="col-sm-2 control-label">Tahun Pembuatan</label>
                                            <div class="col-sm-10">
  <input name="thnbuat" type="text" class="form-control txt-date datte" id="thnbuat" value="<?php echo $this->input->post('thnbuat');?>">
                                            </div>
                                                    <div class="clearfix"></div>
                                          </div>
                                          <div class="form-group"><label for="notugas" class="col-sm-2 control-label">Warna</label>
                                            <div class="col-sm-10">
  <input name="warna" type="text" class="form-control txt-date datte" id="warna" value="<?php echo $this->input->post('warna');?>">
                                            </div>
                                                    <div class="clearfix"></div>
                                          </div>
                                          <div class="form-group"><label for="notugas" class="col-sm-2 control-label">No Polisii</label>
                                            <div class="col-sm-10">
  <input name="nopol" type="text" class="form-control txt-date datte" id="nopolis" value="<?php echo $this->input->post('nopol');?>">
                                            </div>
                                                    <div class="clearfix"></div>
                                          </div>
                                          <div class="form-group"><label for="notugas" class="col-sm-2 control-label">No Rangka</label>
                                            <div class="col-sm-10">
  <input name="rangka" type="text" class="form-control txt-date datte" id="rangka" value="<?php echo $this->input->post('rangka');?>">
                                            </div>
                                                    <div class="clearfix"></div>
                                          </div>
                                          <div class="form-group"><label for="notugas" class="col-sm-2 control-label">No Mesin</label>
                                            <div class="col-sm-10">
  <input name="nomesin" type="text" class="form-control txt-date datte" id="nomesin" value="<?php echo $this->input->post('nomesin');?>">
                                            </div>
                                                    <div class="clearfix"></div>
                                          </div>
                                          <div class="form-group"><label for="notugas" class="col-sm-2 control-label">Nama STNK</label>
                                            <div class="col-sm-10">
  <input name="namastnk" type="text" class="form-control txt-date datte" id="namastnk" value="<?php echo $this->input->post('namastnk');?>" >
                                            </div>
                                                    <div class="clearfix"></div>
                                          </div>
                                          <div class="form-group"><label for="notugas" class="col-sm-2 control-label">Alamat</label>
                                            <div class="col-sm-10">
<textarea name="alamatstnk" class="form-control txt-date datte" id="alamatstnk"><?php echo $this->input->post('alamatstnk');?></textarea>
                                            </div>
                                                    <div class="clearfix"></div>
                                          </div>
                                          <div class="form-group"><label for="notugas" class="col-sm-2 control-label">Tertanggung</label>
                                            <div class="col-sm-10">
  <input name="tertanggung" type="text" class="form-control txt-date datte" id="tertanggung" value="<?php echo $this->input->post('tertanggung');?>">
  <?php echo form_error('tertanggung');?></div>
                                                    <div class="clearfix"></div>
                                          </div>                                                                               
                                          
                                          <div class="form-group"><label for="notugas" class="col-sm-2 control-label">Alamat Tetanggung</label>
                                            <div class="col-sm-10">
                                              <textarea name="alamattertanggung" class="form-control txt-date datte" id="alamattertanggung"><?php echo $this->input->post('alamattertanggung');?></textarea>
                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
<div class="form-group"> <label for="notugas" class="col-sm-2 control-label">Telpon</label>
                                            <div class="col-sm-10">
                                              <input name="telp" type="text" class="form-control txt-date datte" id="telp" value="<?php echo $this->input->post('telp');?>">
                      </div>
                                                    <div class="clearfix"></div>
                                          </div>
<div class="form-group"><label for="notugas" class="col-sm-2 control-label">HP</label>
                                            <div class="col-sm-10">
                                              <input name="hp" type="text" class="form-control txt-date datte" id="hp" value="<?php echo $this->input->post('hp');?>">
                      </div>
                                                    <div class="clearfix"></div>
                                          </div>
<div class="form-group"><label for="notugas" class="col-sm-2 control-label">No Kontrak</label>
  <div class="col-sm-10">
                                              <input name="nokontrak" type="text" class="form-control txt-date datte" id="nokontrak" value="<?php echo $this->input->post('nokontrak');?>">
                      </div>
                                                    <div class="clearfix"></div>
                                          </div>
<div class="form-group"><label for="notugas" class="col-sm-2 control-label">No Polis</label>
  <div class="col-sm-10">
                                              <input name="polis" type="text" class="form-control txt-date datte" id="polis" value="<?php echo $this->input->post('polis');?>">
                      </div>
                                                    <div class="clearfix"></div>
                                          </div>
<div class="form-group"><label for="notugas" class="col-sm-2 control-label">Tgl Berlaku Polis</label>
  <div class="col-sm-10">
                                              <input name="tglmulai" type="text" class="form-control txt-date datte" id="tgl4" value="<?php echo $this->input->post('tglmulai');?>" readonly="readonly">
                      </div>
                                                    <div class="clearfix"></div>
                                          </div>
<div class="form-group"><label for="notugas" class="col-sm-2 control-label">Akhir Polis</label>
  <div class="col-sm-10">
                                              <input name="tglakhir" type="text" class="form-control txt-date datte" id="tgl5" value="<?php echo $this->input->post('tglakhir');?>" readonly="readonly">
                      </div>
                                                    <div class="clearfix"></div>
                                          </div>                                                
                                                
<div class="form-group">
                                                  <label for="notugas" class="col-sm-2 control-label">Surveyor</label>
                                                  <div class="col-sm-10"><span class="controls">
<select name="surveyor" id="surveyor" class="form-control" required="required">
                                                      <option>Pilih Surveyor</option>
                                                      <?php
	foreach($surveyor as $sv){
	    ?>
                                                      <option value="<?php echo $sv->id_pegawai;?>"><?php echo $sv->nm_surveyor;?></option>
                                                      <?php } ?>
                                                    </select>
</span><span class="controls"><?php echo form_error('surveyor');?></span></div>
                                                    <div class="clearfix"></div>
                                                </div>
<div class="form-group"><label for="notugas" class="col-sm-2 control-label">Uraian Surat Tugas</label>
                                            <div class="col-sm-10">
<textarea name="uraian_st" class="form-control txt-date datte" id="uraian_st"><?php echo $this->input->post('uraian_st');?></textarea>
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
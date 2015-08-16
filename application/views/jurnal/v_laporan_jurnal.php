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
                <h2><strong>Laporan</strong> Jurnal</h2>
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
                            <form action="<?php echo base_url();?>jurnal/lap_periode_jurnal" method="post">
                            <h3 align="center">Pilih Periode  Jurnal</h3>
  <table width="40%" align="center">
    <tr>
      <td width="855" height="21"><div align="center">Status</div></td>
      <td width="113"><span class="controls">Bulan</span></td>
      <td width="41"><span class="controls">Tahun</span></td>
      
    </tr>
    <tr>
      <td height="24"><div align="right"><span class="controls">
        <select name="status" id="status" required="required" class="form-control">
          <option value="">Pilih status</option>
 		<option value="expense">Expense</option>
         <option value="income">Income</option>
   
        </select>
      </span></div></td>
      <td><span class="controls">
        <select name="bln" id="bln" class="form-control" >
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
      </span></td>
      <td><span class="controls">
        <select name="thn" id="thn" class="form-control">
          <?php 
					for($i=2015;$i<=2050;$i++){
					?>
          <option value="<?php echo $i;?>"><?php echo $i;?></option>
          <?php } ?>
        </select>
      </span></td>
      <td><input type="submit" name="btncetak" id="btncari" class="btn btn-primary" value="Cetak" /></td>

    </tr>
  </table>
</form>
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
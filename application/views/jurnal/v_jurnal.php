
<!--================ Content Wrapper===========================================-->
<div class="page" align="right">
<h3 align="center">
  <i class="fa fa-list"></i>  Laporan Jurnal Periode Bulan
</h3>
<form action="<?php echo base_url();?>kwitansi/cari_list_os" method="post">
<input name="st" type="text" id="st" placeholder="Search ST" />
<input name="" type="submit" value="Cari ST"  id="btncari" style="width:100px; height:30px"/>
</form>

<form action="<?php echo base_url();?>kwitansi/list_os_periode" method="post">
<table width="55%" height="58" border="0" class="top-cari">
    <tr>
      <td width="855" height="21"><div align="center"></div></td>
      <td width="113">Status</td>
      <td width="41"><span class="controls">Bulan</span></td>
      <td width="41"><span class="controls">Tahun</span></td>
      <td width="41">&nbsp;</td>
      <td width="41">&nbsp;</td>
      <td width="41">&nbsp;</td>
    </tr>
    <tr>
      <td height="24">&nbsp;</td>
      <td><span class="controls">
        <select name="status" id="status" required="required">
        <option value="semua">Semua</option>
          <option value="101">Cash</option>
          <option value="102">Pengeluaran</option>
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
      <td><input type="submit" name="btncari" id="btncari" value="Tampil" style="width:100px; height:30px" /></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>
&nbsp;
<?php echo isset($paginator)?$paginator:''; ?>

</div>
<div class="col-md-4 text-center">
  <div class="controls"></div>
        <table class="table table-bordered table-striped" width="80">
            <thead>
            <tr>
              <th colspan="3"><a href="#modaladd" class="btn btn-success btn-large" data-toggle="modal">
                        <i class="fa fa-plus"></i>  &nbsp; Tambah &nbsp; </a></th>
              <th class="span3">&nbsp;</th>
            </tr>
            <tr>
                <th>No</th>
                <th>Nama Account</th>
                <th>Detail</th>
                <th class="span3">Action
                   
                </th>
            </tr>
            </thead>
            <tbody>
            <?php 
$no=1;
			foreach($trans as $tr){
				
			?>

                <tr class="gradeX">
                    <td><?php echo $no?></td>
                    <td><?php echo $tr->nm_akun?></td>
                    <td><?php echo $tr->detail?></td>
                    <td><a class="tbl btn btn-mini btn-primary" href="#modaledit<?php echo $tr->id_parent?>" data-toggle="modal"><i class="fa fa-edit fa-2x"></i> &nbsp;&nbsp;Vew&nbsp;&nbsp; </a>
                    <a class="tbl btn btn-mini btn-danger" href="<?php echo base_url();?>jurnal/delete_account/<?php echo $tr->id_parent?>" onclick="return confirm('Yakin Hapus  Akun ?');"><i class="fa fa-times fa-2x"></i> &nbsp;&nbsp;HAPUS&nbsp;&nbsp; </a>
                      
                    </td>
                </tr>

                <?php $no++; } ;?>
          
            </tbody>
        </table>

  

</div>

<script type="text/javascript">
    $(document).ready(function() {
        $("#id_parent").change(function(){
            var id_parent = $("#id_parent").val();
            $.ajax({
                type: "POST",
                url : "<?php echo base_url('jurnal/get_sub_parent'); ?>",
                data: "id_parent="+id_parent,
                cache:false,
                success: function(data){
                    $('#id_sub').html(data);
                    document.frm.add.disabled=false;
                }
            });
        });

$("#add").click(function(){
            var add = $("#add").val();
		
              $.ajax({
                type: "POST",
                url : "<?php echo base_url('penjualan/add'); ?>",
                data: "idakun="+kd_pelanggan,
                cache:false,
                success: function(data){
                    $('#detail_pelanggan').html(data);
                }
            });
			});
			
        $("#kd_pelanggan").change(function(){
            var kd_pelanggan = $("#kd_pelanggan").val();
            $.ajax({
                type: "POST",
                url : "<?php echo base_url('penjualan/get_detail_pelanggan'); ?>",
                data: "kd_pelanggan="+kd_pelanggan,
                cache:false,
                success: function(data){
                    $('#detail_pelanggan').html(data);
                }
            });
        });

        $(".delbutton").click(function(){
            var element = $(this);
            var del_id = element.attr("id");
            var info = del_id;
            if(confirm("Anda yakin akan menghapus?"))
            {
                $.ajax({
                    url: "<?php echo base_url(); ?>penjualan/hapus_penjualan",
                    data: "kode="+info,
                    cache: false,
                    success: function(){
                    }
                });
                $(this).parents(".gradeX").animate({ opacity: "hide" }, "slow");
            }
            return false;
        });

    })
</script>
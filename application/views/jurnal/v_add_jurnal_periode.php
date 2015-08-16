<style>
#top-cari{width:40%;

}
#top-cari input[type=submit]
{
	width:40%;

}
</style>

<div class="page" align="right">
<h3 align="center">
  <i class="fa fa-list"></i>  Data Jurnal
</h3>
<form action="<?php echo base_url();?>jurnal/periode_jurnal" method="post">
  <table width="40%" height="58" border="0" id="top-cari">
    <tr>
      <td width="855" height="21"><div align="center">Status</div></td>
      <td width="113"><span class="controls">Bulan</span></td>
      <td width="41"><span class="controls">Tahun</span></td>
      <td width="41">&nbsp;</td>
      <td width="41">&nbsp;</td>
      <td width="41">&nbsp;</td>
      <td width="41">&nbsp;</td>
    </tr>
    <tr>
      <td height="24"><div align="right"><span class="controls">
        <select name="status" id="status" required="required">
          <option value="semua">Semua</option>
 			
          <?php
                            if(isset($data)){
                                foreach($data as $row){
                                    ?>
                                    <option value="<?php echo $row->id_parent?>"><?php echo $row->nm_akun?></option>
                                <?php
                                }
                            }
                            ?>
        </select>
      </span></div></td>
      <td><span class="controls">
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
      </span></td>
      <td><span class="controls">
        <select name="thn" id="thn">
          <?php 
					for($i=2015;$i<=2050;$i++){
					?>
          <option value="<?php echo $i;?>"><?php echo $i;?></option>
          <?php } ?>
        </select>
      </span></td>
      <td><input type="submit" name="btncari" id="btncari2" class="btn btn-inverse" value="Tampil" style="width:100px; height:30px" /></td>
      <td></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>

<?php echo isset($paginator)?$paginator:''; ?>

</div>
<!--================ Content Wrapper===========================================-->
<div class="col-md-8 text-center" style="margin-left:-2px">
    <form>
      <div class="controls">
      
      
      </div>
      
      
      
  <div class="col-md-4 text-center">
  <div class="controls"></div>
        <table class="table table-bordered table-striped" width="382">
            <thead>
            <tr>
              <th colspan="5"> <a href="#modaladdtrans" class="btn btn-success btn- btn-" data-toggle="modal">
                <i class="fa fa-plus"></i> Addd Trans
              </a>  <a href="<?php echo base_url();?>jurnal/add_jurnal_st" class="btn btn-success btn-">
                <i class="fa fa-plus"></i> Add Jurnal S.T
              </a></th>
              <th class="span3">&nbsp;</th>
            </tr>
            <tr class="gradeX">
            <?php
						if($status=='101'){
			$status2='PEMASUKAN';
			}
			elseif($status=='102'){
			$status2='PENGELUARAN';	
			}
			?>
                  <td colspan="6"><div align="LEFT"><strong><h4><?php echo $status2;?></h4></strong></div></td>
              </tr>
            <tr>
                <th>No</th>
                <th>Kd. Jurnal</th>
                <th>Tgl</th>
                <th>Nama Akun</th>
                <th>Detail</th>
                <th><div align="center">Total</div></th>
                <th class="span3"><div align="center">Action
                   
                </div></th>
            </tr>
            </thead>
            <tbody>
            <?php 
			error_reporting(0);
$no=1;
			foreach($trans as $tr){
			
			$total+=$tr->jumlah_jurnal;

			?>

                <tr class="gradeX">
                    <td><?php echo $no?></td>
                    <td><?php echo $tr->id_jurnal?></td>
                    <td><?php echo date("d-m-Y",strtotime($tr->tgl_jurnal)); ?></td>
                    <td><?php echo $tr->nm_akun?></td>
                    <td><em><?php echo substr($tr->det_jurnal,0,100);?><?php echo substr($tr->det_jurnal,0,100);?></em></td>
                    <td><div align="right"><?php echo number_format($tr->jumlah_jurnal,0,'.','.');?></div></td>
                    <td><a class="tbl btn btn-mini btn-primary" href="#modaledit<?php echo $tr->id_jurnal?>" data-toggle="modal"><i class="fa fa-eye fa-2x"></i> &nbsp;&nbsp;View&nbsp;&nbsp; </a>
                    <a class="tbl btn btn-mini btn-danger" href="<?php echo base_url();?>jurnal/delete_transaksi/<?php echo $tr->id_jurnal;?>" onclick="return confirm('Yakin Hapus  Transasi ini ?');"><i class="fa fa-times fa-2x"></i> &nbsp;&nbsp;HAPUS&nbsp;&nbsp; </a>
                      
                  </td>
                </tr><?php $no++; } ;?>
                <tr class="gradeX">
                  <td colspan="4"><div align="right"><em><strong>Sub Total</strong></em></div></td>
                  <td><div align="right"><strong>Rp. <?php echo number_format($total,0,'.','.');?></strong></div></td>
                  <td>&nbsp;</td>
                </tr>
               

                
          
            </tbody>
        </table>

  

</div>

    </form>

    
</div>


<!-----------Tambah Pelanggan------------------------------>
<div id="modaladd" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Tambah Account Transaction</h3>
    </div>
    <form class="form-horizontal" method="post" action="<?php echo site_url('jurnal/tambah_akun')?>">
        <div class="modal-body">
        <div class="control-group">
                <label class="control-label">Account Type</label>
                <div class="controls">
                  <select id="id_parent2" tabindex="5" class="chzn-select" name="id_parent2" data-placeholder="Account type">
                    <option value=""></option>
                    <?php
                            if(isset($data)){
                                foreach($data as $row){
                                    ?>
                    <option value="<?php echo $row->id_parent?>"><?php echo $row->nm_akun?></option>
                    <?php
                                }
                            }
                            ?>
                  </select>
                  <input type="hidden" name="kodejurnal" id="kodejurnal" value="<?php echo $kodejurnal?>" />
                </div>
        </div>
            <div class="control-group">
                <label class="control-label">Nama Akun</label>
                <div class="controls">
                    <input name="nm_akun" type="text" placeholder="account name" id="nm_akun">
                </div>
          </div>

            <div class="control-group">
                <label class="control-label" >Detail</label>
                <div class="controls">
                  <textarea name="detail2" placeholder="details..." id="detail2"></textarea>
                </div>
            </div>

        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
            <button class="btn btn-primary">Save changes</button>
        </div>
    </form>
</div>
<!-----tambah pelanggan-------->
<!-----------Tambah Pelanggan------------------------------>
<div id="modaladdtrans" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Tambah Transaksi</h3>
    </div>
    <form class="form-horizontal" method="post" action="<?php echo site_url('jurnal/simpan_jurnal2')?>">
        <div class="modal-body">
        <div class="control-group">
                <label class="control-label"> 
                  <div align="left">Type Akun</div>
                </label>
          <div class="controls">
                  <select id="id_parent3" tabindex="5" class="chzn-select" name="id_parent3" data-placeholder="Pilih account">
                    <option value=""></option>
                    <?php
                            if(isset($data)){
                                foreach($data as $row){
                                    ?>
                    <option value="<?php echo $row->id_parent?>"><?php echo $row->nm_akun?></option>
                    <?php
                                }
                            }
                            ?>
</select>
                  <input type="hidden" name="kdtrans2" id="kdtrans2" value="<?php echo $kodetrans?>" />
          </div>
        </div>
            <div class="control-group">
                <label class="control-label">
                  <div align="left">Nama Transaksi</div>
                </label>
                <div class="controls">
                  <select id="id_sub2" tabindex="5" class="" name="id_sub2" data-placeholder="Pilih ">
                    <option></option>
                  </select>
                </div>
          </div>

            <div class="control-group">
                <label class="control-label" >
              <div align="left">Detail </div>
                  </label>
  
               &nbsp; &nbsp;&nbsp;&nbsp;<textarea name="det2" cols="45" rows="4"></textarea>
               
              <div class="controls"></div>
            </div>
<div class="control-group">
                <label class="control-label">
                  <div align="left">Jumlah Rp.</div>
                </label>
                <div class="controls">
                  <input name="jumlah2" type="text" style="width:55%" value="" size="55" id="jumlah2" required="required"  />
                </div>
          </div>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
            <button class="btn btn-primary">Save </button>
        </div>
    </form>
</div>

<!-----edit data------->
<?php

    foreach($trans as $row){
        ?>
<div id="modaledit<?php echo $row->id_jurnal;?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Edit Transaksi</h3>
    </div>
    <form class="form-horizontal" method="post" action="<?php echo site_url('jurnal/update_transaksi')?>">
        <div class="modal-body">
        <div class="control-group">
                <label class="control-label">Nama akun</label>
                <div class="controls">
                  <input name="nm_akun" type="text" placeholder="account name" id="nm_akun" value="<?php echo $row->nm_akun;?>" readonly="readonly" />
                  <input type="hidden" name="id_trans" id="id_trans" value="<?php echo $row->id_jurnal;?>" />
          </div>
        </div>
        
      <div class="control-group">
                <label class="control-label">Nama Trans</label>
        <div class="controls">
          <input name="nm_trans" type="text" placeholder="account name" id="nm_trans" value="<?php echo $row->nm_jurnal;?>" />
        </div>
        </div>
            <div class="control-group">
                <label class="control-label">Jumlah</label>
                <div class="controls">
                    <input name="jml_trans" type="text" placeholder="account name" id="jml_trans" value="<?php echo $row->jumlah_jurnal;?>" required="required" >
                </div>
          </div>

            <div class="control-group">
                <label class="control-label" >Detail</label>
                <div class="controls">
                  <textarea name="det_trans"  id="det_trans"><?php echo $row->det_jurnal;?></textarea>
                </div>
            </div>

        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
            <button class="btn btn-primary">Update </button>
        </div>
    </form>
</div>
    <?php }

?>
<!-----tambah pelanggan-------->
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
			
                $("#id_parent3").change(function(){
            var id_parent3 = $("#id_parent3").val();
            $.ajax({
                type: "POST",
                url : "<?php echo base_url('jurnal/get_sub_parent'); ?>",
                data: "id_parent="+id_parent3,
                cache:false,
                success: function(data){
                    $('#id_sub2').html(data);
                    document.frm.add.disabled=false;
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
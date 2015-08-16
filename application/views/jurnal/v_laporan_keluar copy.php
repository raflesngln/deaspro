<section class="main-content">
    <div class="container">
        <div class="page-content">
            <div class="header">
              <h2><strong>Lap Jurnal</strong></h2>
        <div class="breadcrumb-wrapper">
                  <ol class="breadcrumb">
                    <li><a href="#">Home</a>
                    </li>
                    <li class="active"> Lap Jurnal</li>
                  </ol>
                </div>
            </div>
<div class="page" align="right">

<form action="<?php echo base_url();?>jurnal/lap_periode_jurnal" method="post">
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
          <option value="">Pilih status</option>
 		<option value="expense">Expense</option>
         <option value="income">Income</option>
   
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
      <td><input type="submit" name="btncetak" id="btncari" class="btn btn-inverse" value="Pirnt" style="width:100px; height:30px" /></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>



</div>
            <div class="row">
                <div class="col-lg-12 portlets ui-sortable">
                    <div class="panel">
                        <!--<div class="panel-header"></div>-->
                        
                                    <div class="form-group">
                                        <div class="table-responsive">
                                        <table class="table table-striped">
                                              <thead>
                                                <tr>
                                                  <th colspan="2"><?php echo isset($paginator)?$paginator:''; ?> </th>
                                                  <th>&nbsp;</th>
                                                  <th>&nbsp;</th>
                                                  <th>&nbsp;</th>
                                                  <th class="text-center">&nbsp;</th>
                                                </tr>
                                                <tr>
                                                  <th>No.</th>
                                                  <th> Tgl Trans</th>
                                                  <th>Detail</th>
                                                  <th>Jumlah</th>
                                                  <th>Total</th>
                                                  <th class="text-center">Action</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                      <?php
 error_reporting(0);
mysqli_connect("localhost","root","");
mysqli_select_db("deascom");
$tampil=mysql_query("select*from akun where id_sub_parent='102'");
while($row=mysql_fetch_array($tampil))
{
	$id=$row['id_parent'];
	 ?>
                                                <tr class="gradeX">
                                                  <th scope="row">&nbsp;</th>
                                                  <td colspan="3"><?php echo $row{'nm_akun'};?></td>
                                                  <td>&nbsp;</td>
                                                  <td class="text-center">&nbsp;</td>
                                                </tr>
                                                <?php
		  
		   $no=1;
		   $id=$id;
		  $tampil2=mysql_query("select*,sum(jumlah_transaksi) as jml from detail_jurnal a inner join jurnal b on a.id_jurnal=b.id_jurnal where a.id_parent='$id'");
		 while($row2=mysql_fetch_array($tampil2))
		{
			$idparent=$row2['id_parent'];
			$jumlah=$row2['jumlah_jurnal'];
		   ?>
                                                <tr class="gradeX">
                                                    <th scope="row"><?php echo $no;?></th>
                                                    <td><?php echo $row2{'tgl_transaksi'};?></td>
                                                    <td><?php echo $row2{'nm_transaksi'};?></td>
                                                    <td><?php echo $row2{'jumlah_jurnal'};?></td><?php $no++;} ?>
                                                    <td>&nbsp;</td>
                                                    <td class="text-center"></td>
                                                </tr>
                                                <tr class="gradeX">
                                                  <th scope="row">&nbsp;</th>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <?php $total+=$jumlah; ?>
                                                  <td><span class="text-center"><?php echo $total;?></span></td>
                                                  <td class="text-center">&nbsp;</td>
                                                </tr>                                
                                                <?php $no++; } ?>
                                              </tbody>
                                              
                                            </table>
                                        </div>
                                    </div>
                                </form>
              <div class="page" align="center"><?php echo isset($paginator)?$paginator:''; ?></div>
</div>
          </div>
      </div>
  </div>
  </div>
        </div>
    </div>
</section>
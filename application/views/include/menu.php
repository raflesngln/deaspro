<div class="container">
              <div class="navbar-header">
                <a class="navbar-brand" href="<?php echo base_url();?>"><img src="<?php echo base_url()?>/asset/images/logo.png" height="20" alt="" class="img-responsive center-block" /></a>
              </div>              
              <div id="navbar">
                <!--
                <div class="search-box">
                    <button><i class="icon-magnifier icons"></i></button>
                    <input type="text" value="" id="search" name="search" placeholder="Search" />
                </div>
                -->
         <?php
$level=$this->session->userdata('level');

if($level=='admin')
{
?>
                <ul class="nav navbar-nav main-menu">                  
                 
<li id="user-header" class="dropdown">
                    <a data-close-others="true" data-hover="dropdown" data-toggle="dropdown" href="#" aria-expanded="false">
                    <i class="icon-calendar icons"></i>Master <i class="caret"></i></a>
                    </a>
                    <ul class="dropdown-menu">
                      <li>
                        <a href="<?php echo base_url();?>c_master/tampil_asuransi"><i class="icon-plus icons"></i><span>Data Asuransi</span></a>
                      </li>
                      
                      <li>
                        <a href="<?php echo base_url();?>c_master/tampil_pegawai"><i class="fa fa-building"></i><span>Data Pegawai</span></a>
                      </li>
                    </ul>
                  </li>
 <li id="user-header" class="dropdown">
                    <a data-close-others="true" data-hover="dropdown" data-toggle="dropdown" href="#" aria-expanded="false">
                    <i class="icon-calendar icons"></i>ST <i class="caret"></i></a>
                    </a>
                    <ul class="dropdown-menu">
                      <li>
                        <a href="<?php echo base_url();?>surat_tugas/list_surat_tugas"><i class="icon-plus icons"></i><span>List S.Tugas</span></a>
                      </li>
                      
                      <li>
                        <a href="<?php echo base_url();?>surat_tugas/add_surat_tugas"><i class="fa fa-building"></i><span>Baru</span></a>
                      </li>
                    </ul>
                  </li>
  <li id="user-header" class="dropdown">
                    <a data-close-others="true" data-hover="dropdown" data-toggle="dropdown" href="#" aria-expanded="false">
                    <i class="icon-calendar icons"></i>LHS <i class="caret"></i></a>
                    </a>
                    <ul class="dropdown-menu">
                      <li>
                        <a href="<?php echo base_url();?>lhs/list_lhs"><i class="icon-plus icons"></i><span>List LHS</span></a>
                      </li>
                      
                      <li>
                        <a href="<?php echo base_url();?>lhs/lhs_baru"><i class="fa fa-building"></i><span>Baru</span></a>
                      </li>
                    </ul>
                  </li>
  <li id="user-header" class="dropdown">
                    <a data-close-others="true" data-hover="dropdown" data-toggle="dropdown" href="#" aria-expanded="false">
                    <i class="icon-calendar icons"></i>OS <i class="caret"></i></a>
                    </a>
                    <ul class="dropdown-menu">
                      <li>
                        <a href="<?php echo base_url();?>kwitansi/list_os"><i class="icon-plus icons"></i><span>List OS</span></a>
                      </li>
                      
                      <li>
                        <a href="<?php echo base_url();?>kwitansi/add_kwitansi"><i class="fa fa-building"></i><span>Baru</span></a>
                      </li>
                    </ul>
                  </li>
  <li id="user-header" class="dropdown">
                    <a data-close-others="true" data-hover="dropdown" data-toggle="dropdown" href="#" aria-expanded="false">
                    <i class="icon-calendar icons"></i>Lap <i class="caret"></i></a>
                    </a>
                    <ul class="dropdown-menu">
                      <li>
                        <a href="<?php echo base_url();?>kwitansi/laporan_kwitansi"><i class="icon-plus icons"></i><span>Lap Kwitansi</span></a>
                      </li>
                      
                      <li>
                        <a href="<?php echo base_url();?>kwitansi/laporan_os"><i class="fa fa-building"></i><span>Lap OS</span></a>
                      </li>
                    </ul>
                  </li>
  <li id="user-header" class="dropdown">
                    <a data-close-others="true" data-hover="dropdown" data-toggle="dropdown" href="#" aria-expanded="false">
                    <i class="icon-calendar icons"></i>Jurnal <i class="caret"></i></a>
                    </a>
                    <ul class="dropdown-menu">
                      <li>
                        <a href="<?php echo base_url();?>jurnal/list_account"><i class="icon-plus icons"></i><span>Account</span></a>
                      </li>
                       <li>
                        <a href="<?php echo base_url();?>jurnal/add_jurnal"><i class="fa fa-building"></i><span>Data Jurnal</span></a>
                      </li> 
                      <li>
                        <a href="<?php echo base_url();?>jurnal/laporan_jurnal"><i class="fa fa-building"></i><span>Lap Jurnal</span></a>
                      </li>
                    </ul>
                  </li>
    <li><a href="<?php echo base_url();?>asuransi/list_surat_kuasa_all" class="active" data-toggle="tooltip" data-placement="bottom" title="Projects"><i class=" fa fa-institution icon-companies icons"></i>Upload</a></li> 
                </ul>
                
          <?php
} 
elseif($level=='asuransi')
{ ?>
          <ul class="nav navbar-nav main-menu">
    <li><a href="<?php echo base_url();?>asuransi/upload_surat_kuasa" class="active" data-toggle="tooltip" data-placement="bottom" title="Projects"><i class=" fa fa-institution icon-companies icons"></i>Upload</a></li> 
      <li><a href="<?php echo base_url();?>asuransi/list_surat_kuasa" class="active" data-toggle="tooltip" data-placement="bottom" title="Projects"><i class=" fa fa-institution icon-companies icons"></i>List Data</a></li> 
        <li><a href="<?php echo base_url();?>asuransi/list_lhs" class="active" data-toggle="tooltip" data-placement="bottom" title="Projects"><i class=" fa fa-institution icon-companies icons"></i>List LHS</a></li> 
            </ul>
                
     <?php 
}

elseif($level=='surveyor')
{ ?>
     <ul class="nav navbar-nav main-menu">
     <li><a href="<?php echo base_url();?>surveyor/list_lhs" class="active" data-toggle="tooltip" data-placement="bottom" title="Projects"><i class=" fa fa-institution icon-companies icons"></i>List LHS</a></li> 
    <li><a href="<?php echo base_url();?>surveyor/lhs_baru" class="active" data-toggle="tooltip" data-placement="bottom" title="Projects"><i class=" fa fa-institution icon-companies icons"></i>Baru</a></li> 
       </ul>
                
    <?php 
}
elseif($level=='manager')
{ ?>            
                
  <ul class="nav navbar-nav main-menu">                  
                 

<li id="user-header" class="dropdown">
                    <a data-close-others="true" data-hover="dropdown" data-toggle="dropdown" href="#" aria-expanded="false">
                    <i class="icon-calendar icons"></i>Surat Tugas <i class="caret"></i></a>
                    </a>
                    <ul class="dropdown-menu">
                      <li>
                        <a href="<?php echo base_url();?>manager/list_surat_tugas"><i class="icon-plus icons"></i><span>List S.Tugas</span></a>
                      </li>
                      
                      <li>
                        <a href="<?php echo base_url();?>surat_tugas/add_surat_tugas"><i class="fa fa-building"></i><span>Baru</span></a>
                      </li>
                    </ul>
                  </li>

<li><a href="<?php echo base_url();?>manager/list_lhs" class="active" data-toggle="tooltip" data-placement="bottom" title="Projects"><i class=" fa fa-institution icon-companies icons"></i>List LHS</a></li> 
               </ul>
                
  



           
<?php } ?>     
                       
                <ul class="nav navbar-nav navbar-right">                  
                  <li id="user-header" class="dropdown">
                    <a data-close-others="true" data-hover="dropdown" data-toggle="dropdown" href="#" aria-expanded="false">
                    <img alt="user image img-circle" src="<?php echo base_url()?>/asset/images/avatar.png" height="40">
                    <span class="username"><?php echo substr($this->session->userdata('name'),0,9);?>..<i class="caret"></i></span>
                    </a>
                    <ul class="dropdown-menu">
                      <li>
                        <a href="<?php echo base_url();?>admin/profil_admin"><i class="icon-user"></i><span>My Profile</span></a>
                      </li>
                      <li>
                        <a href="<?php echo base_url();?>admin/profil_admin"><i class="icon-settings"></i><span>Account Settings</span></a>
                      </li>
                      <li>
                        <a href="<?php echo site_url('login/logout')?>"><i class="icon-logout"></i><span>Logout</span></a>
                      </li>
                    </ul>
                  </li>
                </ul>

              </div><!--/.nav-collapse -->                            
            </div>
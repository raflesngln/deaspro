
    <link rel="stylesheet" href="<?php echo base_url('asset/css/bootstrap.css')?>"/>
    <link rel="stylesheet" href="<?php echo base_url('asset/css/bootstrap-responsive.css')?>"/>
    <link rel="stylesheet" href="<?php echo base_url('asset/css/chosen.css')?>"/>
    <link rel="stylesheet" href="<?php echo base_url('asset/css/style.css')?>"/>
<script src="<?php echo base_url();?>asset/js/jquery.js" type="text/javascript"></script>

    <script type="text/javascript" src="<?php echo base_url('asset/js/jquery.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('asset/js/bootstrap.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('asset/js/chosen.jquery.js');?>"></script>
    
<script type="text/javascript">
$(document).ready(function(){
$("#menu-setting").hide();	
$(".setting").click(function(){
$("#menu-setting").slideToggle("slow");
});
});


        $(function(){
            $('.chzn-select').chosen();
            $('.chzn-select-deselect').chosen({allow_single_deselect:true});
        });
		
</script>
<style type="text/css">

.img{float:left; width:120px; height:100px; margin-left:33%}
.judul,.judul2{float:left; margin-left:8px}
#user{
	float:right; 
	margin-right:50px;
	margin-top:-33px;
	}
	.setting:hover{cursor:pointer; text-decoration:underline}
	#menu-setting{ background-color:lavender; padding:10px 15px; position:absolute; margin-left:-25px; width:95%; padding-bottom:10px}
	#menu-setting a{ text-decoration:none}
	#menu-setting a:hover{ text-decoration:underline; color:#F00}	
	#menu-setting li{ z-index:100}
	#menu-setting li{
		list-style:none;
		line-height:30px;
	}
	        .chzn-container-single .chzn-search input{
            width: 100%;
        }
</style>

<div id="header-area">
<img src="<?php echo base_url();?>asset/images/profile.png" class="img"  />
<a href="<?php echo base_url();?>login">
<h1 class="judul">PT. DEAS PROTAMA</h1></a><br /><br />
<p style="margin-left:45%; float:left; position:absolute">Surveyor Insurance Company</p>
</div>

<div id="user">
<p>Your Login as  <font color="#FF8000" size="+1"><?php echo $this->session->userdata('level');?></font> !</p>
<p class="setting"><font size="+1" color="#006699"><?php echo $this->session->userdata('name');?></font> &nbsp;<i class="fa fa-caret-down"></i></p>
<ul id="menu-setting">
<li><a href="#"><i class="fa fa-key"></i>&nbsp;Ganti Password</a></li>
<li><a href="<?php echo base_url();?>login/logout"><i class="fa fa-minus-circle"></i>&nbsp;Logout</a></li>
</ul>

</div>

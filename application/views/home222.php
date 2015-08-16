<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Deasprotama - <?php echo isset($title)? $title:'';?></title>
<style type="text/css">
*{ margin:0px; padding:0px}
body{
	background-color:#CCC;
}
#container{
	width:100%;
	float:left;
	background-color:#FFF;	
}
#header{
	width:100%;
	height:140px;
}

#header{ padding-top:10px}
#header h1{ color:#F00; font-size:xx-large}

#menu{
	width:100%;
	height:59px;
	/*box-shadow:1px 1px 4px #CCC; */
}

#konten{
	width:100%;
	padding-bottom:8%;
	padding-top:10px;
	padding-left:10px;
	text-align:justify;
	margin-top:5px;
}
#footer{
	width:100%;
	height:80px;
	text-align:center;
	background-color:#6E6E6E;
	color:#FFF;
	padding-top:10px;
}
.txt{
	width:60%;
	height:190px;
	padding-left:3px;
}
</style>
<script src="<?php echo base_url();?>asset/js/jquery.js" type="text/javascript"></script>

<link href="<?php echo base_url();?>asset/fontawesome/style/fontawesome.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php
 if($this->session->userdata('login_status') != TRUE )
	   {
		   redirect('login');

	}
	else
	{
	?>
<div id="container">

<div id="header"><?php echo $this->load->view('include/header');?></div>

<div id="menu"><?php echo $this->load->view('include/menu');?></div>

<div id="konten"><?php $this->load->view($view);?></div>

<br style="clear:both">
<div id="footer">Copyright  Deasprotama &reg;</div>

</div>
<?php
	}
	?>
</body>
</html>
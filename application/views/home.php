<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="<?php echo base_url()?>/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url()?>/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url()?>/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url()?>/apple-icon-144x144.png">
	<title>DEASPROTAMA&trade;</title>
	<!-- // start:style for must include this page // -->
    <link rel="stylesheet" href="<?php echo base_url()?>/asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>/asset/css/fuelux.css">    
    <link rel="stylesheet" href="<?php echo base_url()?>/asset/css/animate.min.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
     <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/asset/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/asset/css/simple-line-icons.css">	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/asset/css/style.css">    
<link rel="stylesheet" href="<?php echo base_url();?>asset/jquery_ui/themes/base/jquery.ui.all.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/asset/css/base.css"> 
     
    <link href="<?php echo base_url()?>/asset/css/select2.css" type="text/css" rel="stylesheet" />
    <link href="<?php echo base_url()?>/asset/css/style2.css" type="text/css" rel="stylesheet" />
	<!-- // end:style for must include this page // -->

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>g
    <![endif]-->
</head>
<body class="fixed-topbar fuelux">
<!-- // end:wrapper register // -->
    <nav class="header-navbar navbar navbar-default animated fadeInDownBig">
            
           <?php echo $this->load->view('include/menu');?> 
            
            <!--/.container-fluid -->            		
    </nav>
   
    <!-- // start:javascript for must include this page // -->
    
   <script src="<?php echo base_url()?>/asset/js/jquery-1.11.2.min.js"></script>
    <script src="<?php echo base_url()?>/asset/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>/asset/js/fuelux.min.js"></script>
    <script src="<?php echo base_url()?>/asset/js/moment.min.js"></script>    
    <script src="<?php echo base_url()?>/asset/js/jPushMenu.js"></script>
    <script src="<?php echo base_url()?>/asset/js/jquery.uniform.min.js"></script>
    <script src="<?php echo base_url()?>/asset/js/select2.min.js"></script>
    <script src="<?php echo base_url()?>/asset/js/theme.js"></script>
    <script src="<?php echo base_url()?>/asset/js/jquery.nicescroll.min.js"></script>
    <script src="<?php echo base_url()?>/asset/js/jquery.starrating.js"></script>
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
    <!-- // end:javascript for must include this page // -->
    <script src="//cdn.jsdelivr.net/requirejs/2.1.11/require.js"></script>
    <script>
      requirejs.config({
        paths: {
          'bootstrap': '//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min',
          'fuelux': '//www.fuelcdn.com/fuelux/3.6.3/js/fuelux.min',
          'jquery': '//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery',
          // Moment.js is optional
          'moment': '//cdn.jsdelivr.net/momentjs/2.6.0/lang-all.min'
        },
        // Bootstrap is a "browser globals" script :-(
        shim: { 'bootstrap': { deps: ['jquery'] } }
      });
      // Require all.js or include individual files as needed
      require(['jquery', 'bootstrap', 'fuelux'], function($){});
    </script>
    <!-- call this page plugins -->
    <script type="text/javascript">
            jQuery(function () {
                $("html").niceScroll({
                    scrollspeed: 60,
                    cursoropacitymax: 0.7,
                    cursorwidth: "10px",
                    autohidemode: false,
                    horizrailenabled: false // nicescroll can manage horizontal scroll
                });
                $('.myRadioLabel').radio();                
                $('#myWizard').wizard();
                $('#mySpinbox').spinbox();
                $('#myPillbox').pillbox();
                $('#myPlacard').placard();
                $('#myLoader').loader();
                $('#mySelectlist').selectlist();
                $('#myDatepicker').datepicker();
                $('.toggle-menu').jPushMenu({closeOnClickLink: false});
                $('.dropdown-toggle').dropdown();
                // Tooltip
                jQuery('[data-toggle="tooltip"]').tooltip({
                    'placement': 'right'
                });
                jQuery('[data-toggle="popover"]').popover({
                    trigger: 'hover',
                        'placement': 'top'
                });
                // add uniform plugin styles to html elements
                jQuery("input:checkbox, input:radio").uniform();
    
                // select2 plugin for select elements
                jQuery(".select2").select2({
                    placeholder: "Choose Category"
                });
            });
    </script>
     <?php $this->load->view($view);?>
</body>
</html>
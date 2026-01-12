<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title><?php echo $judul; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="shortcut icon" href="<?php echo base_url(); ?>images/icon-wsmu.png">
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>assets/vendors/jquery-easyui/themes/default/easyui.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>assets/vendors/jquery-easyui/themes/icon.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/css/icons.min.css" rel="stylesheet" type="text/css"/>	
    <link href="<?php echo base_url(); ?>assets/css/app.min.css?ver=3" id="app-style" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url(); ?>assets/css/kustom.css?ver=7" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url(); ?>assets/css/loading.css?ver=2" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url(); ?>assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/libs/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />	
	<link  href="<?php echo base_url(); ?>assets/css/jquery.fancybox-3-5-7.min.css" rel="stylesheet" type="text/css" />
	<script src="<?php echo base_url(); ?>assets/libs/jquery/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/libs/jquery/jquery-ui.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/jquery.fancybox-3-5-7.min.js"></script>
	<script src="//cdn.jsdelivr.net/jquery.marquee/1.4.0/jquery.marquee.min.js"></script>
	<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/vendors/jquery-easyui/jquery.easyui.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/js/socket.io.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	
	<style>
		@import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@500&family=Poppins:wght@500&display=swap');
	</style>
	
</head>

<body data-layout="horizontal" data-topbar="dark">

    <div class="container-fluid">
			
        <div id="layout-wrapper">	
		
            <header id="page-topbar">
                <div class="navbar-header">
				
					<div class="d-flex">
					
						
						<button type="button" class="btn btn-sm px-3 font-size-16 d-lg-none header-item waves-effect waves-light"
                            data-toggle="collapse" data-target="#topnav-menu-content">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>
					
						<div class="topnav">
							<nav class="navbar navbar-sm navbar-light navbar-expand-lg topnav-menu">
                                <div class="collapse navbar-collapse" id="topnav-menu-content">
									
								</div>
							</nav>
						</div>
					</div>
                    <div class="container-fluid">
                        <div class="float-right">

                            
                        </div>

                    </div>
                </div>
            </header>

            
            <div class="main-content">
                <div class="page-content"><?php echo $contents; ?></div>
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <?php echo $footer; ?>
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-right d-none d-sm-block">
                                    <a href="https://erp.wangsmu.top" target="_blank" title="Click to Launch">Develop by IT</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>

        </div>

    </div>

    
    <script src="<?php echo base_url(); ?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/libs/simplebar/simplebar.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/libs/node-waves/waves.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/libs/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/libs/select2/js/select2.full.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/libs/sweetalert2/sweetalert2.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/libs/bootbox/bootbox.all.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/libs/jquery-steps/build/jquery.steps.min.js"></script>	
	<script src="<?php echo base_url(); ?>assets/js/utils.js"></script>	
    <script src="<?php echo base_url(); ?>assets/js/app.js"></script>
	
	<script>
	
		$(document).on("shown.bs.dropdown", ".table-responsive", function(e){
			$(this).css("height",$(this).height() + 300);
		});
		
		$(document).on("hide.bs.dropdown", ".table-responsive", function(e){
			$(this).css("height","auto");			
		});
		
	</script>	
	
</body>
</html>
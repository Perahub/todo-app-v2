<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

	if(isset($site['site_name'])){
		$site_name = $site['site_name'];
	}
	else{
		$site_name = '';
	}
 
$cakeDescription = __d('cake_dev', $site_name .' | Admin Panel');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<?php echo $this->Session->flash(); ?>
<!DOCTYPE html>
<html>
	<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title><?=$site_name;?></title>
		<!-- Tell the browser to be responsive to screen width -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php
			
			echo $this->Html->css(array(
				'/template/plugins/fontawesome-free/css/all.min',
				'/template/dist/css/adminlte.min',
				'/template/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min',
				'/template/plugins/select2/css/select2.min.css',
				'/template/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css',
				'/template/plugins/icheck-bootstrap/icheck-bootstrap.min.css',
				'/template/dist/css/adminlte.min.css',
				'/template/plugins/overlayScrollbars/css/OverlayScrollbars.min.css',
				'/template/plugins/daterangepicker/daterangepicker.css',
				'/template/plugins/summernote/summernote-bs4.css',
			));
			echo $this->Html->script(array(
				'/template/plugins/jquery/jquery.min',
			));
		?>
		<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	</head>
	<style>
	
	    
                        
	</style>
	<body class="hold-transition sidebar-mini">
		<!-- Site wrapper -->
		<div class="wrapper">
			<!-- Navbar -->
			<nav class="main-header navbar navbar-expand navbar-white navbar-light">
				<!-- Left navbar links -->
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
					</li>
				</ul>
				<!-- SEARCH FORM -->
				<!-- <form class="form-inline ml-3">
					<div class="input-group input-group-sm">
						<input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
						<div class="input-group-append">
							<button class="btn btn-navbar" type="submit">
							<i class="fas fa-search"></i>
							</button>
						</div>
					</div>
				</form> -->
				<!-- Right navbar links -->
				<ul class="navbar-nav ml-auto">
				    <div class="mt-3 mb-3 d-flex" style="margin-top: 22% !important;margin-bottom: 0% !important;">
					</div>
					
					<li class="nav-item dropdown">
						<a class="nav-link" data-toggle="dropdown" href="#">
						<i class="fas fa-ellipsis-v"></i>
						</a>
						<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
							<!--<a href="<!--?=$this->Html->url(array('controller' => 'profile', 'action' => 'my_profile'));?>" class="dropdown-item">-->
							<!--<i class="fas fa-id-card mr-2"></i> My Profile-->
							<!--</a>-->
							<a href="<?=$this->Html->url(array('controller' => 'profile', 'action' => 'change_password'));?>" class="dropdown-item">
							<i class="fas fa-unlock-alt mr-2"></i> Change Password
							</a>
							<div class="dropdown-divider"></div>
							<div class="dropdown-divider"></div>
							<a href="<?=$this->Html->url(array('controller' => 'users', 'action' => 'logout'));?>" class="dropdown-item">
							<i class="fas fa-sign-out-alt mr-2"></i> Sign Out
							</a>
						</div>
					</li>
				</ul>
			</nav>
			<!-- /.navbar -->
			<!-- Main Sidebar Container -->
			<aside class="main-sidebar sidebar-dark-primary">
				<!-- Brand Logo -->
				
					<?=$this->Html->image('cake.icon.png', array('alt' => 'CLogo', 'class' => 'brand-image img-circle elevation-3', 'style' => 'opacity: .8'));?>
					<span>&nbsp;</span>
				<span class="brand-text overriden-name font-weight-light"><?=$site['site_name']?></span>
				</a>
				<!-- Sidebar -->
				<div class="sidebar">
				</div>
				<!-- /.sidebar -->
			</aside>
			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				<div class="container-fluid">
					<?php
						echo $this->fetch('content');
					?>
				</div>
			</div>
			<!-- /.content-wrapper -->
			<?=$this->element('lte-footer');?>
			<!-- Control Sidebar -->
			<aside class="control-sidebar control-sidebar-dark">
				<!-- Control sidebar content goes here -->
			</aside>
			<!-- /.control-sidebar -->
		</div>
		<!-- ./wrapper -->
		<!-- jQuery -->
		<?php
			echo $this->Html->script(array(
				'/template/plugins/bootstrap/js/bootstrap.bundle.min',
				'/template/plugins/select2/js/select2.full.min.js',
				'/template/dist/js/adminlte.min',
				'/template/plugins/summernote/summernote-bs4.min.js',
				// '/template/dist/js/demo.js',
			));
		?>
		
		<script>
			$(document).ready(function(){
				$('select').select2();

				//Initialize Select2 Elements
				$('.select2bs4').select2({
				  theme: 'bootstrap4'
				})
				
				
				$('textarea').summernote({
					tabsize: 2,
					height: 200
				});
			});
		</script>
	</body>
</html>
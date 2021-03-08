<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title><?=$site['site_name'];?></title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php
		
		echo $this->Html->css(array(
			'/template/plugins/fontawesome-free/css/all.min',
			'/template/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min',
			'/template/plugins/select2/css/select2.min.css',
			'/template/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css',
			'/template/plugins/icheck-bootstrap/icheck-bootstrap.min.css',
		));
	?>
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body>
	<div id="container">
		<div id="content">
			<?php echo $this->fetch('content'); ?>
		</div>
	</div>
	<?php
		echo $this->Html->script(array(
			'/template/plugins/jquery/jquery.min',
			'/template/plugins/bootstrap/js/bootstrap.bundle.min',
			'/template/plugins/select2/js/select2.full.min.js',
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
		});
	</script>
</body>
</html>

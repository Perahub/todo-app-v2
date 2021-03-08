<?php
	if(isset($site['site_name'])){
		$site_name = $site['site_name'];
	}
	else{
		$site_name = 'Zursion Incorporated';
	}
 
	$cakeDescription = __d('cake_dev', $site_name .' | Login');
	$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<?php echo $this->Session->flash(); ?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<?php
		echo $this->Html->charset(); 
		echo $this->Html->meta('favicon.ico', 'img/qylum-logo.png', array('type' => 'icon'));
	?>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?=$site_name;?> | Log in</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<?php
	
		echo $this->Html->css(array(
			'/template/plugins/fontawesome-free/css/all.min',
			'/template/plugins/icheck-bootstrap/icheck-bootstrap.min',
			'/template/dist/css/adminlte.min'
		));
	
	?>
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<meta name="robots" content="noindex,nofollow">
</head>
<style>
    	
	</style>
<body class="hold-transition login-page">



	<?php echo $this->fetch('content'); ?>




	<?php
	
		echo $this->Html->script(array(
			'/template/plugins/jquery/jquery.min',
			'/template/plugins/bootstrap/js/bootstrap.bundle.min',
			'/template/dist/js/adminlte.min'
		));
	
	?>

</body>
</html>
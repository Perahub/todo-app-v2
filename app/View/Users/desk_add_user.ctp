<!-- Content Header (Page header) -->
<?php
	debug($this->validationErrors);
?>
<?php echo $this->Session->flash(); ?>
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="<?=$this->Html->url(array('controller' => 'dashboard', 'action' => 'index'));?>"><i class="fas fa-home"></i></a></li>
					
						<?php
						// debug(str_replace("desk_","",$this->params->action));
							if(str_replace("desk_","",$this->params->action) == 'index') {
								echo '<li class="breadcrumb-item active">' . Inflector::humanize($this->params->controller) . '</li>';
							}
							else {
								echo '<li class="breadcrumb-item active">' . Inflector::humanize($this->params->controller) . '</li>';
								echo '<li class="breadcrumb-item active">' . Inflector::humanize(str_replace("desk_","",$this->params->action)) . '</li>';
							}
						?>
					</li>
				</ol>
			</div>
		</div>
	</div>
	<!-- /.container-fluid -->
</section>

<?php echo $this->Session->flash(); ?>

<!-- Main content -->
<section class="content">
	<!-- Default box -->
	<div class="card">
		<div class="card-header">
			<h3 class="card-title">User Information</h3>
			<div class="card-tools">
				<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
				<i class="fas fa-minus"></i></button>
			</div>
		</div>
		<?=$this->Form->create('User', array('enctype'=>'multipart/form-data', 'role' => 'form'));?>
			<div class="card-body">
				<div class="row">
					<div class="col-md-6">
						<?php
							
							echo $this->Form->input('username', array(
								'div' => 'form-group',
								'class' => 'form-control',
								'placeholder' => 'Username'
							));
							echo $this->Form->input('password', array(
								'div' => 'form-group',
								'class' => 'form-control',
								'placeholder' => 'Password'
							));
							echo $this->Form->input('confirm_password', array(
								'div' => 'form-group',
								'class' => 'form-control',
								'type' => 'password',
								'placeholder' => 'Confirm Password'
							));
							echo $this->Form->input('email_address', array(
								'div' => 'form-group',
								'class' => 'form-control',
								'placeholder' => 'E-mail Address'
							));
						?>
					</div>
					<div class="col-md-6">
						<?php 
							echo $this->Form->input('first_name', array(
								'div' => 'form-group',
								'class' => 'form-control',
								'placeholder' => 'First Name'
							));
							echo $this->Form->input('middle_name', array(
								'div' => 'form-group',
								'class' => 'form-control',
								'placeholder' => 'Middle Name'
							));
							echo $this->Form->input('last_name', array(
								'div' => 'form-group',
								'class' => 'form-control',
								'placeholder' => 'Last Name'
							));
							echo $this->Form->input('role', array(
								'div' => 'form-group',
								'class' => 'form-control',
								'placeholder' => 'Role',
								'options' => array(
									'Administrator' => 'Administrator',
									'Teacher' => 'Teacher',
									'Student' => 'Student',
								),
								'empty' => '(Please Choose Role)'
							));
						?>
					</div>
				</div>				
			</div>
			<!-- /.card-body -->

			<div class="card-footer">
				<?=$this->Form->button('Save', array('class' => 'btn btn-success', 'type' => 'submit'));?>
				<?=$this->Html->link('Cancel', array('controller' => 'users', 'action' => 'index'), array('class' => 'btn btn-default float-right'));?>
			</div>
			
		<?=$this->Form->end();?>
		<!-- /.card-footer-->
	</div>
	<!-- /.card -->
</section>
<!-- /.content -->
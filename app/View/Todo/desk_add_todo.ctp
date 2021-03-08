<!-- Content Header (Page header) -->
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					
					
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
			<h3 class="card-title">Add to do list</h3>
			<div class="card-tools">
			</div>
		</div>
		<?=$this->Form->create('Todo');?>
			<div class="card-body">
				<div class="form-group row">
					<label for="CategoryName" class="col-sm-2 col-form-label"><div class="float-sm-right">Name</div></label>
					<div class="col-sm-10">
						<?php
							echo $this->Form->input('todo_name', array(
								'div' => false,
								'class' => 'form-control',
								'placeholder' => 'todo_name',
								'label' => false
							));
						?>
					</div>
				</div>			
			</div>
			<!-- /.card-body -->

			<div class="card-footer">
				<?=$this->Form->button('Save', array('class' => 'btn btn-success float-right', 'type' => 'submit'));?>
				<?=$this->Html->link('Cancel', array('controller' => 'categories', 'action' => 'index'), array('class' => 'btn btn-default'));?>
			</div>
			
		<?=$this->Form->end();?>
		<!-- /.card-footer-->
	</div>
	<!-- /.card -->
</section>
<!-- /.content -->
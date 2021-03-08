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
			<h3 class="card-title">Todo</h3>
			<div class="card-tools">
			</div>
		</div>
			<div class="card-body">
				<div class="form-group row">
					<label for="CategoryName" class="col-sm-2 col-form-label"><div class="float-sm-right">Name</div></label>
					<div class="col-sm-10 form-control">
						<?=$this->HtmlPurifier->clean($data['Todo']['todo_name'], 'CleanHtml');?>
					</div>
				</div>
				
			</div>
			<!-- /.card-body -->

			<div class="card-footer text-center">
				<?=$this->Html->link('Back to the list', array('controller' => 'todo', 'action' => 'index'), array('class' => 'btn btn-default'));?>
			</div>
		<!-- /.card-footer-->
	</div>
	<!-- /.card -->
</section>
<!-- /.content -->
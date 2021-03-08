<!-- Content Header (Page header) -->
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<?=$this->Html->link('Add ' . Inflector::humanize(Inflector::singularize($this->params->controller)), array('controller' => $this->params->controller, 'action' => 'add_todo'), array('class' => 'btn btn-primary'));?>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
				
					
						<?php
							if(str_replace("desk_","",$this->params->action) == 'index') {
								echo '<li class="breadcrumb-item active">' . Inflector::humanize($this->params->controller) . '</li>';
							}
							else {
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

<div class="card">
	<div class="card-header">
		<h3 class="card-title">Todo List</h3>
		<div class="card-tools">
				<?php 
					echo $this->Form->create('Todo', array('type' => 'get'));
					echo '<div class="input-group input-group-sm" style="width: 150px;">';
					echo $this->Form->input('keyword', array('class' => 'form-control float-right', 'label' => false, 'div' => false, 'placeholder' => 'Search'));
					echo '
						<div class="input-group-append">
							<button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
						</div>
					';
					echo $this->Form->end();
				?>
			</div>
		</div>
	</div>
	<!-- /.card-header -->
	<div class="card-body p-0">
		<table class="table table-head-fixed">
			<thead>
				<tr>
				  <th><?php echo $this->Paginator->sort('name', 'Name'); ?></th>
				  <th class="text-center">Action</th>
				</tr>
			</thead>
			<tbody>
			<?php
				if(!empty($data)) {
					foreach($data as $data_key => $data_value) {
						echo '<tr data-id="'.$data_value['Todo']['id'].'">';
							echo '<td>'. $this->HtmlPurifier->clean($data_value['Todo']['todo_name'], 'CleanHtml').'</td>';
							echo '<td class="text-center">
								<a href="'.$this->Html->url(array('controller' => 'todo', 'action' => 'view_todo', $data_value['Todo']['id'])).'" class="btn btn-success btn-xs"><i class="fa fa-search"></i> View </a>
								<a href="'.$this->Html->url(array('controller' => 'todo', 'action' => 'edit_todo', $data_value['Todo']['id'])).'" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit </a>
								<a href="'.$this->Html->url(array('controller' => 'todo', 'action' => 'delete_todo', $data_value['Todo']['id'])).'" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete </a>
							</td>';
						echo '</tr>';
					}
				}
				else {
					echo '<tr>';
						echo '<td colspan="4" class="text-center">~ No records found ~</td>';
					echo '</tr>';
				}
				
			?>
			</tbody>
		</table>
	</div>
	<!-- /.card-body -->
	<div class="card-footer clearfix">
		<ul class="pagination pagination-sm m-0 float-right">
			<?php
				if(count($data) > 9 || (isset($this->request->query['page']) && $this->request->query['page'] > 1)) {
					echo $this->Paginator->prev('<i class="fas fa-angle-double-left"></i>', array('tag' => 'li class="page-link"', 'class' => 'page-item', 'escape' => false), '<i class="fas fa-angle-double-left"></i>', array('tag' => 'li', 'class' => 'disabled page-item','disabledTag' => 'a class="page-link"', 'escape' => false));
					echo $this->Paginator->numbers(
						array(
							'separator' => '',
							'currentTag' => 'a', 
							'tag' => 'li class="page-link"',
							'class' => 'page-item',
							'first' => true,
							'ellipsis' => '...',
							'last' => true
						)
					);
					echo $this->Paginator->next('<i class="fas fa-angle-double-right"></i>', array('tag' => 'li class="page-link"','currentClass' => 'disabled page-item', 'escape' => false), '<i class="fas fa-angle-double-right"></i>', array('tag' => 'li','class' => 'disabled page-item','disabledTag' => 'a class="page-link"', 'escape' => false));
				}
			?>
		</ul>
	</div>
</div>
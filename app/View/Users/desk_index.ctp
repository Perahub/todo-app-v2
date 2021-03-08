<!-- Content Header (Page header) -->
<?php echo $this->Session->flash(); ?>
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<?=$this->Html->link('Add ' . Inflector::humanize(Inflector::singularize($this->params->controller)), array('controller' => $this->params->controller, 'action' => 'add_user'), array('class' => 'btn btn-primary'));?>
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

<div class="card">
	<div class="card-header">
		<h3 class="card-title">User Account List</h3>
		<div class="card-tools">
				<?php 
					echo $this->Form->create('User', array('type' => 'get'));
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
	<div class="card-body p-0" style="height: <?=(count($data) > 2 ? '300px' : '100px');?>;">
		<table class="table table-head-fixed">
			<thead>
				<tr>
				  <th><?php echo $this->Paginator->sort('username', 'Username'); ?></th>
				  <th><?php echo $this->Paginator->sort('first_name', 'First Name'); ?></th>
				  <th><?php echo $this->Paginator->sort('last_name', 'Last Name'); ?></th>
				  <th><?php echo $this->Paginator->sort('role', 'Role'); ?></th>
				  <th><?php echo $this->Paginator->sort('status', 'Status'); ?></th>
				  <th class="text-center">Action</th>
				</tr>
			</thead>
			<tbody>
			<?php
				if(!empty($data)) {
					// debug($data);
					foreach($data as $data_key => $data_value) {
						echo '<tr data-id="'.$data_value['User']['id'].'">';
							echo '<td>'. $this->HtmlPurifier->clean($data_value['User']['username'], 'CleanHtml').'</td>';
							echo '<td>'. $this->HtmlPurifier->clean($data_value['User']['first_name'], 'CleanHtml').'</td>';
							echo '<td>'. $this->HtmlPurifier->clean($data_value['User']['last_name'], 'CleanHtml').'</td>';
							echo '<td>'. $this->HtmlPurifier->clean($data_value['User']['role'], 'CleanHtml').'</td>';
							echo '<td>'. $this->HtmlPurifier->clean($data_value['User']['status'], 'CleanHtml').'</td>';
							echo '<td class="text-center"><a href="'.$this->Html->url(array('controller' => 'users', 'action' => 'view_user', $data_value['User']['id'])).'" class="btn btn-success btn-xs"><i class="fa fa-search"></i> View </a></td>';
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
				if(!count($data) > 10) {
					echo $this->Paginator->prev(__('«'), array('tag' => 'li'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
					echo $this->Paginator->numbers(array('separator' => '','currentTag' => 'a', 'currentClass' => 'active','tag' => 'li','first' => 1));
					echo $this->Paginator->next(__('»'), array('tag' => 'li','currentClass' => 'disabled'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
				}
			?>
		</ul>
	</div>
</div>
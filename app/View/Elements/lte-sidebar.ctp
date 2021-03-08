<div class="user-panel mt-3 pb-3 mb-3 d-flex">
	<div class="row">
		<div class="col-md-12">
			<div class="info">
				<a href="<?=$this->Html->url(array('controller' => 'profile', 'action' => 'my_profile'));?>" class="d-block"><strong>Alexander Pierce</strong></a>
				<a href="#" class="d-block">Position</a>
			</div>
		</div>
	</div>
</div>
<!-- Sidebar Menu -->
<nav class="mt-2">
	<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
		<!-- Add icons to the links using the .nav-icon class
			with font-awesome or any other icon font library -->
		<li class="nav-item">
			<a href="<?=$this->Html->url(array('controller' => 'dashboard', 'action' => 'index'));?>" class="nav-link overriden-sidebar">
				<i class="nav-icon fab fa-buffer"></i>
				<p>
					Dashboard
				</p>
			</a>
		</li>
		<li class="nav-item">
			<a href="<?=$this->Html->url(array('controller' => 'knowledge_base', 'action' => 'index'));?>" class="nav-link overriden-sidebar">
				<i class="nav-icon fas fa-calendar-alt"></i>
				<p>
					Knowledgebase
				</p>
			</a>
		</li>
		<li class="nav-item has-treeview menu-open">
			<a href="#" class="nav-link">
				<i class="nav-icon fas fa-file-invoice"></i>
				<p>
					Tickets
					<i class="fas fa-angle-left right"></i>
				</p>
			</a>
			<ul class="nav nav-treeview">
				<li class="nav-item">
					<a href="<?=$this->Html->url(array('controller' => 'tickets', 'action' => 'index', '?' => array('ticket_status' => 'open')));?>" class="nav-link">
						<i class="far fa-circle nav-icon text-danger"></i>
						<p>Open</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?=$this->Html->url(array('controller' => 'tickets', 'action' => 'index', '?' => array('ticket_status' => 'forwarded')));?>" class="nav-link">
						<i class="far fa-circle nav-icon text-warning"></i>
						<p>Forwarded</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?=$this->Html->url(array('controller' => 'tickets', 'action' => 'index', '?' => array('ticket_status' => 'closed')));?>" class="nav-link">
						<i class="far fa-circle nav-icon text-success"></i>
						<p>Closed</p>
					</a>
				</li>
			</ul>
		</li>
		<li class="nav-item has-treeview menu-open">
			<a href="#" class="nav-link">
				<i class="nav-icon fas fa-cogs"></i>
				<p>
					System Settings
					<i class="fas fa-angle-left right"></i>
				</p>
			</a>
			<ul class="nav nav-treeview">
				<li class="nav-item">
					<a href="<?=$this->Html->url(array('controller' => 'categories', 'action' => 'index'));?>" class="nav-link">
						<i class="far fa-circle nav-icon"></i>
						<p>Categories</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?=$this->Html->url(array('controller' => 'branches', 'action' => 'index'));?>" class="nav-link">
						<i class="far fa-circle nav-icon"></i>
						<p>Branches</p>
					</a>
				</li>
			</ul>
		</li>
	</ul>
</nav>
<!-- /.sidebar-menu -->
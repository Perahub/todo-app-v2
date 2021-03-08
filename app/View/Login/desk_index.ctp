<div class="row container">
	<div class="col-md-8">
		
	</div>
	<div class="col-md-4">
		<div class="login-box">
			<?php echo $this->Session->flash(); ?>
			<div class="login-logo">
				<a class="navbar-brand" href="<?=$this->Html->url(Router::url('/', true));?>"><?=$this->Html->image('institution-logo.webp');?></a>
			</div>

			<!-- /.login-logo -->
			<div class="card">
				<div class="card-body login-card-body">
					<p class="login-box-msg">Sign in to start your session</p>
					
					<?php 
						echo $this->Form->create('User');
					?>
						<div class="input-group mb-3">
							<?=$this->Form->input('username', array('label' => false, 'div' => false, 'class' => 'form-control', 'placeholder' => 'E-mail Address'));?>
							<div class="input-group-append">
								<div class="input-group-text">
									<span class="fas fa-user"></span>
								</div>
							</div>
						</div>
						<div class="input-group mb-3">
							<?=$this->Form->input('password', array('label' => false, 'div' => false, 'class' => 'form-control', 'placeholder' => 'Password'));?>
							<div class="input-group-append">
								<div class="input-group-text">
									<span class="fas fa-lock"></span>
								</div>
							</div>
						</div>
						<div class="row">
							<!-- /.col -->
							<div class="col-12">
								<?=$this->Form->submit('Sign In', array('class' => 'btn btn-primary btn-block'));?>
							</div>
							<!-- /.col -->
						</div>
					<?php
						echo $this->Form->end();
					?>
					
					
					<!-- <p class="mb-0">
						<a href="register.html" class="text-center">Register a new membership</a>
					</p> -->
				</div>
				<!-- /.login-card-body -->
			</div>
			<div class="pull-right" style="opacity: 0.5">
			</div>
		</div>
	</div>
</div>
<?php

App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
App::uses('CakeTime', 'Utility');

class LoginController extends AppController {

	public function desk_index(){
		
		$this->Session->destroy();
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Auth->login()) {
				if ($this->Auth->user('status') == 1) {
					// $standard_name = $this->Auth->user('standard_name');
					$this->Session->write('Login.state', 'Logged In');
					return $this->redirect(array('controller' => 'todo', 'action' => 'index', 'desk' => true));
				}
				else if($this->Auth->user('status') == 0) {
					$this->Session->setFlash('Account has been disabled.', 'toast-notice-failed');
					$this->Auth->logout();
				}
			}
			else {
				$this->Session->setFlash('Invalid username or password.', 'toast-notice-failed');
				return $this->redirect(array('controller' => 'login', 'action' => 'index', 'desk' => true));
			}
		}
		else {
			if($this->Auth->user('status') != null) {
				$this->Auth->logout();
				
				$this->Session->destroy();
				return $this->redirect(array('controller' => 'login', 'action' => 'index', 'desk' => true));
			}
		}
		
		$this->layout = 'login-layout';
	}

}

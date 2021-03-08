<?php

App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
App::uses('CakeTime', 'Utility');

class UsersController extends AppController {

	public function desk_index() {
		
	}
	
	public function desk_add_user() {
		if($this->request->is('put') || $this->request->is('post')) {
			
			if($this->User->save($this->request->data)) {
				$this->Session->setFlash('User successfully saved!');
				return $this->redirect(array('controller' => 'users', 'action' => 'index', 'desk' => true));
			}
			else {
				$this->Session->setFlash('Saving failed');
			}
			
		}
	}
	
	public function desk_edit_user($id = null) {
		if($id) {
			
			$data = $this->User->find('first', array(
				'conditions' => array(
					'User.id' => $id,
					'User.status' => 1
				)
			));
			
			if($data) {
				if($this->request->is('put') || $this->request->is('post')) {
					
					if($this->User->save($this->request->data)) {
						$this->Session->setFlash('User successfully updated!');
						return $this->redirect(array('controller' => 'users', 'action' => 'index', 'desk' => true));
					}
					else {
						$this->Session->setFlash('Saving failed');
					}
					
				}
			}
			else {
				$this->Session->setFlash('No records found!');
				return $this->redirect(array('controller' => 'users', 'action' => 'index', 'desk' => true));
			}
		}
		else {
			$this->Session->setFlash('No records found!');
		}
	}
	
	public function desk_logout() {
		return $this->redirect($this->Auth->logout());
	}
	
	function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('forgot_password','desk_add_user');
	}
	
	public function isAuthorized($user) {
		if($this->Auth->user('status') == 1) {			
			return true;
		}
	}

}

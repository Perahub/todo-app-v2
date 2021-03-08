<?php

class TodoController extends AppController {

	public function desk_index() {
		
		$search ='';
		if(isset($this->request['url']['keyword'])) {
			$search = $this->request['url']['keyword'];
			$this->request->data['Todo']['keyword'] = $search;
		} 
		
		$this->Paginator->settings = array(
			'fields' => array(
				'Todo.id',
				'Todo.todo_name'
			),
			'conditions' => array(
				'Todo.status' => 1,
			),
            'paramType' => 'querystring'
		);
		
		$data = $this->Paginator->paginate('Todo', array( 
			'OR' => array(
				'Todo.todo_name LIKE' => '%'. $search .'%'
			)
		));
		
		if(!$data) {
			$this->Session->setFlash('No records found.', 'global-notice-failed');
		}
		
		$this->set('data', $data);
	}
	
	public function desk_add_todo () {
		if($this->request->is('put') || $this->request->is('post')) {
			// debug($this->request->data);
			// exit();
			if($this->Todo->save($this->request->data)) {
				

				$this->Session->setFlash('Todo successfully saved!', 'global-notice-success');
				return $this->redirect(array('controller' => 'todo', 'action' => 'index', 'desk' => true));
			}
			else {
				$this->Session->setFlash('Saving failed', 'global-notice-failed');
			}
			
		}
	}
	
	public function desk_edit_todo($id = null) {
		if($id) {
			
			$data = $this->Todo->find('first', array(
				'conditions' => array(
					'Todo.id' => $id,
					'Todo.status' => 1
				)
			));
			
			if($data) {
				if($this->request->is('put') || $this->request->is('post')) {
					
					if($this->Todo->save($this->request->data)) {
						$this->Session->setFlash('Todo successfully updated!', 'global-notice-success');
						return $this->redirect(array('controller' => 'todo', 'action' => 'index', 'desk' => true));
					}
					else {
						$this->Session->setFlash('Saving failed', 'global-notice-failed');
					}
					
				}
				else {
					$this->request->data = $data;
				}
			}
			else {
				$this->Session->setFlash('No records found!');
				return $this->redirect(array('controller' => 'todo', 'action' => 'index'));
			}
		}
		else {
			$this->Session->setFlash('No records found!');
		}
	}
	
	public function desk_delete_todo($id = null) {
		if($this->Todo->update_status($id, 0)) {
			$this->Session->setFlash('Todo successfully updated!', 'global-notice-success');
			return $this->redirect(array('controller' => 'todo', 'action' => 'index', 'prefix' => 'desk', 'desk' => true));
		}
		else {
			$this->Alert->display('failed_bank_disable');
			return $this->redirect(array('controller' => 'banks', 'action' => 'index', 'prefix' => 'desk', 'desk' => true));
		}	
	}
	
	public function desk_view_todo($id = null) {
		if($id) {
			$data = $this->Todo->find('first', array(
				'conditions' => array(
					'Todo.id' => $id,
					'Todo.status' => 1
				)
			));
			
			if($data) {
				$this->set('data', $data);
			}
			else {
				$this->Session->setFlash('No records found!');
				return $this->redirect(array('controller' => 'todo', 'action' => 'index', 'desk' => true));
			}
		}
		else {
			$this->Session->setFlash('No records found!');
		}
	}
	
	public function isAuthorized($category) {
		if($this->Auth->user('status') == 1) {			
			return true;
		}
	}

}

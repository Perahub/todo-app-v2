<?php
App::uses('Model', 'Model');

class Todo extends AppModel {
	public $tablePrefix = 'set_';
	
	public $validate = array(
        'id' => array(
			'validation 1' => array(
				'required' => 'update',
				'rule' => array('notBlank'),
				'message'	=> 'ID is required and should not be empty.'
			),
			'validation 2' => array(
				'rule' => array('naturalNumber'),
				'message'	=> 'ID should be a non-decimal number that is greater than zero.'
			),
			'validation 3' => array(
				'rule' => array('isUnique'),
				'message'	=> 'ID should be unique.'
			)
        ),
		
		'status' => array(
			'validation 1' => array(
				'required' => 'create',
				'rule' => array('notBlank'),
				'message'	=> 'Status is required and should not be empty.'
			),
			'validation 2' => array(
				'rule' => array('boolean'),
				'message'	=> 'Status should be a boolean.'
			)
        ),
		'created_by' => array(
			'validation 1' => array(
				'required' => 'create',
				'rule' => array('notBlank'),
				'message'	=> 'Created by is required and should not be empty.'
			),
			'validation 2' => array(
				'rule' => array('naturalNumber'),
				'message'	=> 'Created by should be a non-decimal number that is greater than zero.'
			)
        ),
		'last_modified_by' => array(
			'validation 1' => array(
				'required' => true,
				'rule' => array('notBlank'),
				'message'	=> 'Last modified by is required and should not be empty.'
			),
			'validation 2' => array(
				'rule' => array('naturalNumber'),
				'message'	=> 'Last modified by should be a non-decimal number that is greater than zero.'
			)
        )
	);
	
	public $hasOne = array(
		// 'Employee' => array(
			// 'conditions' => array(
				// 'Employee.status' => 1
			// )
		// )
	);
	
	public function get_list() {
		$result = $this->find('list', array(
			'fields' => array(
				'Todo.id',
				'Todo.todo_name'
			),
			'conditions' => array(
				'Todo.status' => 1
			),
			'order' => array(
				'Todo.todo_name ASC'
			)
		));
		
		return $result;
	}
	
	public function update_status($id = null, $todo = null) {
		
		$existing_todo = $this->find_existing_todo_by_id_or_code($id);
		
		if(isset($existing_todo) && count($existing_todo) > 0) {
			$existing_todo['Todo']['status'] = $todo;
			$data = $existing_todo;
		}

		return $this->save($data);
	}
	
	public function find_existing_todo_by_id_or_code($id = null) {
		
		
		$default_conditions = array(
			'Todo.id' => $id
		);
		
		$data = $this->find('first', array(
			'fields' => array(
				'Todo.id',
				'Todo.todo_name',
				'Todo.status',
			),
			'recursive'=>-1,
			'conditions' => $default_conditions
		));
		
		return $data;
	}
	
	public function beforeValidate($options = array()) {
		if(!isset($this->data['Todo']['id'])) {
			$this->data['Todo']['status'] = 1;
			$this->data['Todo']['created_by'] = $_SESSION['Auth']['User']['id'];
			$this->data['Todo']['last_modified_by'] = $_SESSION['Auth']['User']['id'];
			
		}
		else {
			$this->data['Todo']['last_modified_by'] = $_SESSION['Auth']['User']['id'];
		}
	}
	
	public function beforeSave($options = array()) {
		return true;
	}
}

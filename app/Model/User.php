<?php
App::uses('Model', 'Model');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

class User extends AppModel {
	public $useTable = 'acc_user_accounts';
	
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
		'username' => array(
			'validation 1' => array(
				'required' => 'create',
				'rule' => array('notBlank'),
				'message'	=> 'Username is required and should not be empty.'
			),
			'validation 2' => array(
				'rule' => array('alphaNumeric'),
				'message'	=> 'Username should be in alphabets and numbers only.'
			),
			'validation 3' => array(
				'rule' => array('lengthBetween', 8, 20),
				'message'	=> 'Username must be 8 to 20 characters long.'
			),
			'validation 4' => array(
				'rule' => array('isUnique'),
				'message'	=> 'Username is already taken.'
			)
        ),
		'password' => array(
			'validation 1' => array(
				'required' => 'create',
				'rule' => array('notBlank'),
				'message'	=> 'Password is required and should not be empty.'
			),
			'validation 2' => array(
				'rule' => array('alphaNumeric'),
				'message'	=> 'Password should be in alphabets and numbers only.'
			),
			'validation 3' => array(
				'rule' => array('lengthBetween', 8, 20),
				'message'	=> 'Password must be 8 to 20 characters long.'
			),
			'validation 4' => array(
				'required' => 'create',
				'on' => 'create',
				'rule' => array('equalToField', 'password', 'confirm_password'),
				'message'	=> 'Password and confirm password does not match.'
			),
			'validation 5' => array(
				'on' => 'update',
				'rule' => array('equalToField', 'password', 'new_password'),
				'message'	=> 'Password and new password does not match.'
			)
        ),
		'confirm_password' => array(
			'validation 1' => array(
				'required' => 'create',
				'rule' => array('notBlank'),
				'message'	=> 'Password should not be empty.'
			),
			'validation 2' => array(
				'rule' => array('alphaNumeric'),
				'message'	=> 'Confirm password should be in alphabets and numbers only.'
			),
			'validation 3' => array(
				'rule' => array('lengthBetween', 8, 20),
				'message'	=> 'Confirm password must be 8 to 20 characters long.'
			),
			'validation 4' => array(
				'required' => 'create',
				'on' => 'create',
				'rule' => array('equalToField', 'password', 'confirm_password'),
				'message'	=> 'Password and confirm password does not match.'
			)
        ),
		'current_password' => array(
			'validation 1' => array(
				'rule' => array('notBlank'),
				'message'	=> 'Password should not be empty.'
			),
			'validation 2' => array(
				'rule' => array('alphaNumeric'),
				'message'	=> 'Current password should be in alphabets and numbers only.'
			),
			'validation 3' => array(
				'rule' => array('lengthBetween', 8, 20),
				'message'	=> 'Current password must be 8 to 20 characters long.'
			),
			'validation 4' => array(
				'rule' => array('checkIfCurrentPasswordIsCorrect', 'current_password'),
				'message'	=> 'Current password does not match.'
			)
        ),
		'new_password' => array(
			'validation 1' => array(
				'rule' => array('notBlank'),
				'message'	=> 'New password should not be empty.'
			),
			'validation 2' => array(
				'rule' => array('alphaNumeric'),
				'message'	=> 'New password should be in alphabets and numbers only.'
			),
			'validation 3' => array(
				'rule' => array('lengthBetween', 8, 20),
				'message'	=> 'New password must be 8 to 20 characters long.'
			),
			'validation 4' => array(
				'rule' => array('equalToField', 'new_password', 'repeat_new_password'),
				'message'	=> 'New password and repeat new password does not match.'
			)
        ),
		'repeat_new_password' => array(
			'validation 1' => array(
				'rule' => array('notBlank'),
				'message'	=> 'Repeat new password should not be empty.'
			),
			'validation 2' => array(
				'rule' => array('alphaNumeric'),
				'message'	=> 'Repeat new password should be in alphabets and numbers only.'
			),
			'validation 3' => array(
				'rule' => array('lengthBetween', 8, 20),
				'message'	=> 'Repeat new password must be 8 to 20 characters long.'
			),
			'validation 4' => array(
				'rule' => array('equalToField', 'new_password', 'repeat_new_password'),
				'message'	=> 'Repeat new password and new password does not match.'
			)
        ),
		'last_name' => array(
			'validation 1' => array(
				'required' => 'create',
				'rule' => array('notBlank'),
				'message'	=> 'Last name is required and should not be empty.'
			),
			'validation 2' => array(
				'rule' => array('maxLength', 50),
				'message'	=> 'Last name must be no longer than 50 characters.'
			)
        ),
		'first_name' => array(
			'validation 1' => array(
				'required' => 'create',
				'rule' => array('notBlank'),
				'message'	=> 'First name is required and should not be empty.'
			),
			'validation 2' => array(
				'rule' => array('maxLength', 50),
				'message'	=> 'First name must be no longer than 50 characters.'
			)
        ),
		'middle_name' => array(
			'validation 1' => array(
				'required' => 'create',
				'rule' => array('notBlank'),
				'message'	=> 'Middle name is required and should not be empty.'
			),
			'validation 2' => array(
				'rule' => array('maxLength', 50),
				'message'	=> 'Middle name must be no longer than 50 characters.'
			)
        ),
		// 'middle_initial' => array(
			// 'validation 1' => array(
				// 'required' => 'create',
				// 'rule' => array('notBlank'),
				// 'message'	=> 'Middle initial is required and should not be empty.'
			// ),
			// 'validation 2' => array(
				// 'rule' => array('maxLength', 6),
				// 'message'	=> 'Middle initial must be no longer than 6 characters.'
			// )
        // ),
		// 'role' => array(
			// 'validation 1' => array(
				// 'required' => 'create',
				// 'rule' => array('notBlank'),
				// 'message'	=> 'Role is required and should not be empty.'
			// ),
			// 'validation 2' => array(
				// 'rule' => array('inApplicationSettingsList', 'role', 'ROLES'),
				// 'message'	=> 'Please select a role from the list.'
			// )
        // ),
		'is_eula_agreed' => array(
			'validation 1' => array(
				'required' => 'create',
				'rule' => array('notBlank'),
				'message'	=> 'Eula agreement status should not be empty.'
			),
			'validation 2' => array(
				'rule' => array('boolean'),
				'message'	=> 'Eula agreement status should be a boolean.'
			)
        ),
		'eula_agreed_on_date' => array(
			'validation 1' => array(
				'on' => 'update',
				'rule' => array('datetime', 'mdy'),
				'message'	=> 'EULA agreed on date should be in mm/dd/yyyy hh:mm:ss 24 hours format.'
			),
			'validation 2' => array(
				'on' => 'update',
				'rule' => array('noFutureDateTime', 'eula_agreed_on_date', 'm/d/Y H:i:s'),
				'message'	=> 'EULA agreed on date should not be later than today.'
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
		'lock_flag' => array(
			'validation 1' => array(
				'required' => 'create',
				'rule' => array('notBlank'),
				'message'	=> 'Lock flag should not be empty.'
			),
			'validation 2' => array(
				'rule' => array('boolean'),
				'message'	=> 'Lock flag should be a boolean.'
			)
        ),
		// 'created_by' => array(
			// 'validation 1' => array(
				// 'required' => 'create',
				// 'rule' => array('notBlank'),
				// 'message'	=> 'Created by is required and should not be empty.'
			// ),
			// 'validation 2' => array(
				// 'rule' => array('naturalNumber'),
				// 'message'	=> 'Created by should be a non-decimal number that is greater than zero.'
			// )
        // ),
		// 'last_modified_by' => array(
			// 'validation 1' => array(
				// 'required' => true,
				// 'rule' => array('notBlank'),
				// 'message'	=> 'Last modified by is required and should not be empty.'
			// ),
			// 'validation 2' => array(
				// 'rule' => array('naturalNumber'),
				// 'message'	=> 'Last modified by should be a non-decimal number that is greater than zero.'
			// )
        // )
	);
	
	public $hasOne = array(
		// 'Employee' => array(
			// 'conditions' => array(
				// 'Employee.status' => 1
			// )
		// )
	);
	
	public function equalToField($data_for_validation = '', $field_name_to_compare_1 = '', $field_name_to_compare_2 = '') {
		if ($this->data[$this->name][$field_name_to_compare_1] === $this->data[$this->name][$field_name_to_compare_2]) {
			return true;
		}

		return false;
    }
	
	public function checkIfCurrentPasswordIsCorrect($data_for_validation = '', $field_name_to_compare = '') {
		$password_hasher = new SimplePasswordHasher();
		
		$user_id = $this->data[$this->name]['id'];
		$user_hashed_password = $password_hasher->hash($this->data[$this->name][$field_name_to_compare]);
		
		$boolean_result = $this->hasAny(array(
			'User.id' => $user_id,
			'User.password' => $user_hashed_password
		));
		
		return $boolean_result;
    }
	
	public function add_record($data = array()) {
		return $this->save($data);
	}
	
	public function update_record($data = array()) {
		$boolean_result = $this->check_user_existency($data['User']['id']);
		
		if($boolean_result === true){
			return $this->save($data);
		}
		else{
			return false;
		}
	}
	
	public function change_password($data = array()) {
		$data['User']['id'] = $_SESSION['Auth']['User']['id'];

		return $this->save($data);
	}
	
	public function override_password($data = array()) {
		return $this->save($data);
	}
	
	public function check_user_existency($id = null) {
		$boolean_result = $this->hasAny(array(
			'User.id' => $id,
		));
		
		return $boolean_result;
	}
	
	public function find_by_id($id = null) {
		
		$results = $this->find('first', array(
			'conditions' => array(
				'User.id' => $id,
			),
			'recursive' => -1
		));
		
		if(count($results) == 1) {
			return $results;
		}
		
		return false;
	}
	
	public function update_status($id = null, $status = null) {
		$boolean_result = $this->check_user_existency($id);
		
		if($boolean_result === true) {
			$user['User']['id'] = $id;
			$user['User']['status'] = $status;
			$data = $user;
		}

		return $this->save($data);
	}
	
	public function get_list() {
		$result = $this->find('list', array(
			'fields' => array(
				'User.id',
				'User.username'
			),
			'conditions' => array(
				'User.status' => 1
			),
			'order' => array(
				'User.username ASC'
			)
		));
		
		return $result;
	}
	
	public function beforeValidate($options = array()) {
		if(!isset($this->data['User']['id'])) {
			$this->data['User']['is_eula_agreed'] = 0;
			$this->data['User']['status'] = 1;
			$this->data['User']['lock_flag'] = 0;
			$this->data['User']['created_by'] = 1;
			$this->data['User']['last_modified_by'] = 1;
		}
		else {
			$this->data['User']['last_modified_by'] = $_SESSION['Auth']['User']['id'];
			
			if(isset($this->data['User']['new_password'])) {
				$this->data['User']['password'] = $this->data['User']['new_password'];
			}
		}
		
		if(isset($this->data['User']['last_name']) && isset($this->data['User']['first_name']) && isset($this->data['User']['middle_initial'])) {
			$this->data['User']['name_format_1'] = $this->data['User']['last_name'] . ', ' . $this->data['User']['first_name'] . ' ' . $this->data['User']['middle_initial'];
			$this->data['User']['name_format_2'] = $this->data['User']['first_name'] . ' ' . $this->data['User']['middle_initial'] . ' ' . $this->data['User']['last_name'];
		}
	}
	
	public function afterValidate() {
		if(isset($this->data['User']['password'])) {
			$password_hasher = new SimplePasswordHasher();
			$this->data['User']['password'] = $password_hasher->hash($this->data['User']['password']);
		}
		
		if(isset($this->data['User']['eula_agreed_on_date'])) {
			$converted_eula_agreed_on_date = convert_datetime_from_format($this->data['User']['eula_agreed_on_date'], 'm/d/Y H:i:s');
			$this->data['User']['eula_agreed_on_date'] = $converted_eula_agreed_on_date->format('Y-m-d H:i:s');
		}
	}
	
	public function beforeSave($options = array()) {
		return true;
	}
}

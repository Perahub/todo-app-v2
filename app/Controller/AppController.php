<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
App::uses('CakeTime', 'Utility');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		https://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	
	public $components = array(
		'Session',
        'Auth' => array(
			'loginAction' => array('controller' => 'login', 'action' => 'index', 'desk' => true),
            'logoutRedirect' => array('controller' => 'login', 'action' => 'index', 'desk' => true),			
			'authorize' => array('Controller'),
			'authenticate' => array(
				'Form'
			)
        ),
		'RequestHandler',
		'Paginator'
	);
	
	public $helpers = array(
		'HtmlPurifier.HtmlPurifier' => array(
			'config' => 'CleanHtml'
		)
	);
	
	public function beforeRender(){
        // $this->response->cache('-1 minute', '+5 days');
		$this->response->disableCache();
		
		if($this->name == 'CakeError') {
            $this->layout = 'login-layout';
        }
		
		// $this->response->compress();
		// $this->response->header(array(
			// 'X-XSS-Protection' => '1; mode=block;',
		// ));
        // $this->response->sharable(true, 3600);
        // $this->response->expires('+5 days');
	}
	
	function beforeFilter(){
		// debug($_SESSION);
		if(!empty($this->params['prefix'])){
			$this->layout = 'admin-layout';
		}
		
		$site_details = $this->site_information_array();
		
		$this->set('site', $site_details);
	}
	
	public function site_information_array(){
		$this->loadModel('Option');
		$option = $this->Option->find('all');
		
		foreach($option as $site_array){
			$site_details[$site_array['Option']['option_name']] = $site_array['Option']['option_value'];
		}
		
		return $site_details;
	}
}

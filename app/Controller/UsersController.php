<?php

/*
 * todo:
 * move crap into its own controller action (like login and register are now)
 * fix edit user (lookup equalTo validation function)
 */

class UsersController extends AppController {

    var $name = 'Users';
    var $components = array('Auth');

	public $helpers = array('Form');

    function login() {
    		
    	$this->layout = 'home';

		// if posted data, login
		if ($this->request->is('post')) {
		
			$this->User->set($this->data);
			if ($this->User->validates(array('fieldList' => array('username', 'password')))) {
				if ($this->Auth->login()) {
					$this->Session->setFlash("成功登入 Login successful");
					$this->redirect(array('controller' => 'admin'));
		            $this->redirect($this->Auth->redirect());
		        } 
		        else {
		            $this->Session->setFlash("登入失败：无此用户／密码 Login failed: no such user/password pair");
		        }
			}
			else {
				$this->Session->setFlash("登入失败： Login failed");
			}
    	}
    }
 
    function logout() {
    	
		$this->Session->setFlash("您已成功退出 You have successfully logged out");
    	$this->redirect($this->Auth->logout());
    }
	
	function register() {
		
		$this->layout = 'home';
		
		// if posted data, register the user
		if ($this->request->is('post')) {
    		
			$formdata = $this->request->data;
			
			$dbdata = array(
				'id' => $this->User->getNextId(),
				'username' => $formdata['User']['username'],
				'password' => $formdata['User']['password'],
				'password_confirm' => $formdata['User']['password_confirm']
			);
			
			$this->User->set($dbdata);
			if ($this->User->validates(array('fieldList' => array('username', 'password', 'password_confirm')))) {

				if ($this->User->save($dbdata, false)) {
					$this->Session->setFlash("用户注册成功 User registration successful");
				}
				else {
					$this->Session->setFlash("User Registration failed: couldn't write to database");
				}
				$this->redirect(array('controller' => 'admin'));
				
			}
			else {
				$this->Session->setFlash("User registration failed");
			}
		}
		
	}
	
	public function edit($username) {
		
		$this->layout = 'home';
		
		if (!empty($this->data)) {
    		
			$formdata = $this->data;
			
			// encrypt password_old so it can be validated
			$formdata['User']['password_old'] = $this->Auth->password($formdata['User']['password_old']);
			
			$this->User->set($formdata);
			if ($this->User->validates(array('fieldList' => array('password', 'password_confirm', 'password_old')))) {

				unset($formdata['User']['password_confirm']);
				unset($formdata['User']['password_old']);

				if ($this->User->save($formdata, false)) {
					$this->Session->setFlash("Password change successful");
				}
				else {
					$this->Session->setFlash("Password change failed:  couldn't write to the database");
				}
				
			}
			else {
				$this->Session->setFlash("Password change failed");
			}
		}

		$user = $this->User->find('first', array('conditions' => array('username' => $username)));
				
		$this->set(array('user' => $user));
	}
}

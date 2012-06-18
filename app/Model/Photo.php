<?php

class Photo extends AppModel {
	
	public function connect() {
		
		App::import('Vendor', 'rackspace-php-cloudfiles-5b45176/cloudfiles');
		
 		$auth = new CF_Authentication(Configure::read('Cloudfiles.username'),Configure::read('Cloudfiles.apikey'));
		$auth->authenticate(); 
 		$conn = new CF_Connection($auth);
		
		return $conn;
	}
	
	public function getPrefixContainers ($conn, $prefix) {
		
		$contsList = $conn->list_containers();

		$conts = array();
		foreach ($contsList as $contName) {
			if (strpos($contName, $prefix) === 0) {	
				$conts[] = $conn->get_container("$contName");
			} 
		}
		
		return $conts;
	}
	
}
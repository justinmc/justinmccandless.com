<?php
class PhotosController extends AppController {
    	
    public $helpers = array('Html');

	
	public function index() {
	    $this->layout = 'home';
		$this->set('title_for_layout', 'Pictures');
		$this->set('description_for_layout', 'List of all picture albums');
		$this->loadModel('Photo');

		$conn = $this->Photo->connect();
		$conts = $this->Photo->getPrefixContainers($conn, Configure::read('Cloudfiles.prefix'));

		$this->set(array('conts' => $conts));
	}
	
	public function album($album) {
		$this->layout = 'home';
		$this->set('title_for_layout', ($title . ' - Pictures'));
		$this->set('description_for_layout', ('All pictures in the album ' . $title));
		$this->loadModel('Photo');
		
		$conn = $this->Photo->connect();
		$cont = $conn->get_container(Configure::read('Cloudfiles.prefix') . $album);
		
		$photos = $cont->list_objects();
		$title = str_replace(Configure::read('Cloudfiles.prefix'), '', $cont->name);
		$cdn_uri = $cont->cdn_uri;

		$this->set(array('photos' => $photos, 'cdn_uri' => $cdn_uri, 'title' => $title));
	}
}
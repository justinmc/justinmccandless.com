<?php
class AboutsController extends AppController {
	
	public $helpers = array('Html');
	
	public function index() {
	    $this->layout = 'home';
		$this->set('title_for_layout', 'About');
		$this->set('description_for_layout', 'Information about Justin McCandless');
	}
	
	public function projects() {
		$this->layout = 'home';
		$this->set('title_for_layout', 'Projects');
		$this->set('description_for_layout', 'Projects that I have worked on');
	}
	
}
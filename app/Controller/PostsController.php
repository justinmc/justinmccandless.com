<?php

class PostsController extends AppController {
    	
    public $helpers = array('Html', 'Time', 'Paginator');
	
	public $paginate = array(
			'fields' => array('id', 'title', 'date', 'titlepic', 'post', 'post_intro'), 
			'order' => 'date DESC',
			'conditions' => array('deletions.posts_id is null'), 
			'joins' => array(
				array(
					'table' => 'deletions',
					'type' => 'LEFT',
					'conditions' => array(
						'Post.id = deletions.posts_id')
				)
			),
			'limit' => 3
    );
	
	public function index() {
	    $this->layout = 'home';
		
		$posts = $this->paginate(); // $this->Post->findNotDeleted(array('id', 'title', 'date', 'titlepic', 'post'));
		
		$this->set('posts', $posts);
	}
	
	public function post($title) {
		$this->layout = 'home';
		
		$post = $this->Post->find('first', array(
			'conditions' => array(
				'title' => urldecode($title)
				)
			));
		
		$this->set('post', $post);
	}
	
	public function archive() {
		$this->layout = 'home';
		
		$posts = $this->Post->findNotDeleted(array('id', 'title', 'date'));
		
		$this->set('posts', $posts);
	}
}
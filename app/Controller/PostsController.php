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
	
	// If a url comes in looking for posts via number (the old way), look up the title and send them to the right place
	public function postDeprecatedParam() {
		$postNum = $this->params->query['entry'];
		$postId = $postNum - 1;
		
		$this->postDeprecated($postId);
	}
	public function postDeprecatedNumPhp() {
		$postNum = $this->params['pass'][0];
		$postNum = substr($postNum, 0, strpos($postNum, '.'));
		$postId = $postNum - 1;
		
		$this->postDeprecated($postId);
	}
	public function postDeprecatedNumHtml() {
		$postNum = $this->params->url;
		$postNum = substr($postNum, 0, strpos($postNum, '.'));
		$postId = $postNum - 1;
		
		$this->postDeprecated($postId);
	}
	public function postDeprecated($postId) {
		
		$this->loadModel('Post');
		$postTitle = $this->Post->find('first', array(
			'conditions' => array(
				'id' => $postId
			),
			'fields' => 'title'
		));

		$this->redirect(array('controller' => 'posts', 'action' => 'post', urlencode($postTitle['Post']['title'])));
	}
	
	public function archive() {
		$this->layout = 'home';
		
		$posts = $this->Post->findNotDeleted(array('id', 'title', 'date'));
		
		$this->set('posts', $posts);
	}
}
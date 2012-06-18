<?php

/*
 * 
 * todo:
 * split adminsphotos adminsposts
 * edit album weird error?
 * finish delete user action
 * redactor pic uploading!
 */

class AdminsController extends AppController {
	
	var $components = array('Auth');
	public $helpers = array('Html', 'Time');
	
	public function index() {
		
	    $this->layout = 'home';
	}
	
	public function users() {
		
		$this->layout = 'home';
		$this->loadModel('Users');
		
		$users = $this->Users->find('all');
		
		$this->set(array('users' => $users));
	}

	public function deleteuser ($userid) {
		
		$this->loadModel('Users');

		$this->Users->id = 0;
		if (0) //$this->Users->delete())
			$this->Session->setFlash("Successfully deleted user");
		else
			$this->Session->setFlash("Failed to delete user: this feature is not yet implemented.  Contact the webmaster if you need a user deleted.");
		
		$this->redirect(array('controller' => 'admin', 'action' => 'users'));
	}
	
	public function photos() {
		
	    $this->layout = 'home';
		$this->loadModel('Photo');
		
		$conn = $this->Photo->connect(); 

		$conts = $this->Photo->getPrefixContainers($conn, Configure::read('Cloudfiles.prefix'));

		$this->set(array('conts' => $conts));
	}
	
	public function photosedit ($albumName) {

		$this->layout = 'home';
		$this->loadModel('Photo');
		
		$conn = $this->Photo->connect();
		$cont = $conn->get_container(Configure::read('Cloudfiles.prefix') . $albumName);
		
		$photos = $cont->list_objects();
		$title = str_replace(Configure::read('Cloudfiles.prefix'), '', $cont->name);
		$cdn_uri = $cont->cdn_uri;

		$this->set(array('photos' => $photos, 'cdn_uri' => $cdn_uri, 'title' => $title));
	}
	
	public function newphoto () {
			
		$this->loadModel('Photo');
		
		// Has any form data been POSTed?
    	if ($this->request->is('post')) {
    		
			$formdata = $this->request->data;
			
			// Check the file and write it to cloud files
			if(isset($_FILES['photo']) && !empty($_FILES['photo']['name'])) {
				if ($_FILES["photo"]["error"] > 0) {
					$this->Session->setFlash("Photo add failed: " . $_FILES["photo"]["error"][0]);
					$this->redirect(array('controller' => 'admin', 'action' => 'photos'), $formdata['albumName']);
				}
				else {
					if (file_exists("files/tmp/" . $_FILES["photo"]["name"])) {
				    	$this->Session->setFlash("Photo add failed: filename already exists on the web server");
						$this->redirect(array('controller' => 'admin', 'action' => 'photos'), $formdata['albumName']);
				    }
				    else {
				    	
						move_uploaded_file($_FILES["photo"]["tmp_name"], "files/tmp/" . $_FILES["photo"]["name"]);
						$bytes = filesize("files/tmp/" . $_FILES["photo"]["name"]);
						$file = fopen("files/tmp/" . $_FILES["photo"]["name"], "r");
						
						// create the cloud files object
						$conn = $this->Photo->connect();
				    	$cont = $conn->get_container(Configure::read('Cloudfiles.prefix') . $formdata['albumName']);
				    	$obj = $cont->create_object($_FILES["photo"]["name"]);
						
						// write to cloud files!
						$result = $obj->write($file, $bytes);
						
						// delete the uploaded file from our server to save space
						unlink("files/tmp/" . $_FILES["photo"]["name"]);
						
				    	if ($result != TRUE) {
				    		$this->Session->setFlash("Photo add failed: could not write to Cloud Files");
							$this->redirect(array('controller' => 'admin', 'action' => 'photos'), $formdata['albumName']);
						}
						else {
							$this->Session->setFlash("Photo added successfully");
						}
				    }
				}
			}
			else {
				$this->Session->setFlash("Photo add failed: file not received");
				$this->redirect(array('controller' => 'admin', 'action' => 'photos'), $formdata['albumName']);
			}
		}
		else {
			$this->Session->setFlash("Photo add failed: no data received");
			$this->redirect(array('controller' => 'admin', 'action' => 'photos'), $formdata['albumName']);
		}
		
		$this->redirect(array('controller' => 'admin', 'action' => 'photos'), $formdata['albumName']);
	}
	
	public function deletephoto ($albumName, $photoName) {
		
		$this->loadModel('Photo');
		
		$conn = $this->Photo->connect();
		$cont = $conn->get_container(Configure::read('Cloudfiles.prefix') . $albumName);
		
		if ($cont->delete_object($photoName))
			$this->Session->setFlash("Successfully deleted photo " . $photoName);
		else
			$this->Session->setFlash("Failed to delete photo " . $photoName);
		
		$this->redirect(array('controller' => 'admin', 'action' => 'photos'), $albumName);
	}
	
	public function newalbum () {
		
		$this->loadModel('Photo');
		
		// Has any form data been POSTed?
    	if ($this->request->is('post')) {
    		
			$formdata = $this->request->data;
			
			if ($formdata['albumName']) {
				$conn = $this->Photo->connect();
		
				if ($conn->create_container(Configure::read('Cloudfiles.prefix') . $formdata['albumName'])) {
					// make it public so we can see the images
					$cont = $conn->get_container(Configure::read('Cloudfiles.prefix') . $formdata['albumName']);
					$cont->make_public();
					$this->Session->setFlash("Successfully created album " . $formdata['albumName']);
				}
				else {
					$this->Session->setFlash("Failed to create album " . $formdata['albumName']);
				}
			}
			else {
				$this->Session->setFlash("Failed to create album: no album title received");
			}
			
		}
		else {
			$this->Session->setFlash("Failed to create album: no data received");
		}
		
		$this->redirect(array('controller' => 'admin', 'action' => 'photos'), $albumName);
	}
	
	public function deletealbum ($albumName) {
		
		$this->loadModel('Photo');
		
		$conn = $this->Photo->connect();
		$cont = $conn->get_container(Configure::read('Cloudfiles.prefix') . $albumName);
		
		// delete every object first
		$photos = $cont->list_objects();
		foreach ($photos as $photo) {
			if ($cont->delete_object($photo) != TRUE) {
				$this->Session->setFlash("Failed to delete album " . $albumName . ": deletion of photo " . $photo . " failed");
				$this->redirect(array('controller' => 'admin', 'action' => 'photos'));
			}
		}
		
		if ($conn->delete_container(Configure::read('Cloudfiles.prefix') . $albumName))
			$this->Session->setFlash("Successfully deleted album " . $albumName);
		else
			$this->Session->setFlash("Failed to delete album " . $albumName);
		
		$this->redirect(array('controller' => 'admin', 'action' => 'photos'));
	}
	
	public function posts() {
		
	    $this->layout = 'home';
		$this->loadModel('Post');
		
		$nextId = $this->Post->getNextId();
		
		$posts = $this->Post->findNotDeleted(array('id', 'title', 'date'));
		
		$this->set(array('nextId' => $nextId, 'posts' => $posts));
	}
	
	public function newpost() {
		
	    $this->layout = 'home';
		$this->loadModel('Post');
		
		$nextId = $this->Post->getNextId();
		
		$this->set(array('nextId' => $nextId));
	}
	
	public function editpost($postTitle) {
		
	    $this->layout = 'home';
		$this->loadModel('Post');

		$post = $this->Post->find('first', array('conditions' => array('title' => urldecode($postTitle))));
		
		$this->set(array('post' => $post));
	}
	
	public function postedits() {
		
	    $this->layout = 'home';
		$this->loadModel('Edits');
		
		$edits = $this->Edits->find('all', array(
			'fields' => array('posts_id', 'date', 'field', 'value_old', 'value_new'),
			'order' => 'posts_id'));
		
		$this->set(array('edits' => $edits));
	}
	
	public function deletepost($postsid) {
		
		$this->loadModel('Deletions');
		
	    if ($this->Deletions->deletePost($postsid))
			$this->Session->setFlash("成功删除博客 Post successfully deleted");
		else 
			$this->Session->setFlash("删除失败－已存在该删除纪录 Delete failed - delete record already exists");

		$this->redirect(array('controller' => 'admin'));
	}

	// Add or edit a post in the database
	public function postsedit () {
		$this->loadModel('Post');
		$this->loadModel('Edits');

		// Has any form data been POSTed?
    	if ($this->request->is('post')) {
    		
			$formdata = $this->request->data;

			// Are we adding a new post, or editing an old one?
			$errorTitle;
			$addPost;
			if ($formdata['id'] == $this->Post->getNextId()) {
				$errorTitle = "New post";
				$addPost = 1;
			}
			else {
				$errorTitle = "Post edit";
				$addPost = 0;
			}
			
			// Upload a file if needed
			$uploadResult = $this->uploadIfFile($_FILES);
			if ($uploadResult == 1) {
				$formdata['titlepic'] = "files/" . $_FILES["titlepic"]["name"];
			}
			else if (($uploadResult == 0) && ($addPost == 0)) {
				$formdata['titlepic'] = $formdata['original_titlepic'];
			}
			else if ($addPost == 0) {
				$this->Session->setFlash($errorTitle . " failed: " . $uploadResult);
				$this->redirect(array('controller' => 'admin', 'action' => 'editpost'), urlencode($formdata['original_title']));
			}

			// And send the data to the database
			$success;
			if ($addPost){
				$success = $this->Post->add($formdata);
			}
			else {
				$olddata = $this->Post->find('first', array(
					'conditions' => array(
						'id' => $formdata['id']
						),
					'fields' => array('id', 'title', 'titlepic', 'post', 'post_intro')
					)
				);
				$success = $this->Edits->add($formdata, $olddata['Post']);
				if ($success)
					$success = $success && $this->Post->edit($formdata);
			}
			if ($success) {
		        $this->Session->setFlash($errorTitle . " 成功 successful");
		    }
			else {
				$this->Session->setFlash($errorTitle . " 失败：录入数据库问题 failed: problem writing to database");
			}
		}
		else {
			$this->Session->setFlash("输入失败：没有收到到信息 Submission failed: no information received");
		}
		$this->redirect(array('controller' => 'admin', 'action' => 'posts'));
    }
	
	// Uploads a file in $_FILES, returns 1 on success, 0 on no file, error on failure
	private function uploadIfFile ($_FILES) {
		if(isset($_FILES['titlepic']) && !empty($_FILES['titlepic']['name'])) {
			$uploadResult = $this->Post->uploadFile($_FILES);
			if (!$uploadResult) {
				return $uploadResult;
			}
			else {
				return 1;
			}
		}
		return 0;
	}
	
	// Uploads a file in $_FILES for the redactor wysiwyg editor, returns <img> tag
	public function redactorUpload () {
		if(isset($_FILES['file']) && !empty($_FILES['file']['name'])) {
			if (!$_FILES['file']['error']) {
				if (!file_exists($this->Html->url('files/' . $_FILES['file']['name']))) {
			    	move_uploaded_file($_FILES['file']['tmp_name'], $this->Html->url('files/' . $_FILES['file']['name']));
			    }
			}
			
			echo $this->Html->image('/files/' . $_FILES['file']['name']); //'<img src="' . $this->Html->url('/files/' . $_FILES['file']['name']) . '" />';
		}
		exit();
	}
	
}

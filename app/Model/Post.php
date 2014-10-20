<?php

class Post extends AppModel {
	
	// finds all posts that haven't been deleted
	public function findNotDeleted ($fields) {
		
		return $this->find('all', array(
			'fields' => $fields, 
			'order' => 'date DESC',
			'conditions' => array('deletions.posts_id is null'), 
			'joins' => array(
				array(
					'table' => 'deletions',
					'type' => 'LEFT',
					'conditions' => array(
						'Post.id = deletions.posts_id')
					)
			)
		));
	}
	
	// updates a post in the database
	// returns 1 on success, 0 on failure
	public function edit ($formdata) {		
		$dbdata = $this->formatPost($formdata);

        if ($this->save($dbdata)) {	
            return 1;
        }
		else {
			return 0;
		}
	}
	
	// adds a post to the database
	// returns 1 on success, 0 on failure
	public function add ($formdata) {		
		$dbdata = $this->formatPost($formdata);
		
		if ($this->save($dbdata)) {	
            return 1;
        }
		else {
			return 0;
		}
	}


	// uploads a file to /files/
	// returns 1 on success, failure message on failure
	public function uploadFile ($files) {
		
		$result = 1;
		if(isset($files['titlepic']) && !empty($files['titlepic']['name'])) {
			if ($files["titlepic"]["error"] > 0) {
				$result = "Upload failed: " . $files["titlepic"]["error"][0];
			}
			else {
				if (file_exists("files/" . $files["titlepic"]["name"])) {
			    	$result = "Upload failed: filename already exists on the server";
			    }
			    else {
			    	move_uploaded_file($files["titlepic"]["tmp_name"], "files/" . $files["titlepic"]["name"]);
			    }
			}
		}
		return $result;
	}

	// Takes an array of form data, formats it for db entry
	private function formatPost ($unformatted) {
		// No title pic should be an empty string
		if (!isset($unformatted['titlepic']))
			$unformatted['titlepic'] = '';

		// format date if needed
		if ($unformatted['id'] == $this->getNextId()) {
			$unformatted['date'] = intval($unformatted['date']);
		}

		return $unformatted;
	}
}

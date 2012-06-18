<?php

class Deletions extends AppModel {
	
	// Deletes a post (writes to deletions table, doesn't actually remove the entry)
	// Returns 1 on success, 0 on failure (entry already exists)
	public function deletePost ($postsid) {
		
		$duplicate = $this->find('first', array('conditions' => array('posts_id' => $postsid)));
		
		if ($duplicate['Deletions']['posts_id'] == $postsid)
			return 0;
		else {
			$deletionsNextId = $this->find('all', array('fields' => 'MAX(id)'));
			$deletionsNextId = $deletionsNextId[0][0]['MAX(id)'] + 1;
			
			$deletionData = array('id' => $deletionsNextId, 'date' => time(), 'posts_id' => $postsid);
			
			$this->save($deletionData);
		 
			return 1;
		}
	}
	
}
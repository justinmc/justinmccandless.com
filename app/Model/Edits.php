<?php

class Edits extends AppModel {
	
	// adds a new edit to the database for each field changed
	// returns 1 on success, 0 on failure
	public function add ($newdata, $olddata) {
		
		$time = time();
		
		$newdata = $this->formatPost($newdata);
		
		foreach ($newdata as $key => $newfield) {
			if ($newfield != $olddata[$key]) {

				$dbdata = array('id' => $this->getNextId(),
								'date' => $time,
								'field' => $key,
								'value_new' => $newfield,
								'value_old' => $olddata[$key],
								'posts_id' => $olddata['id']
				);
				
				if (!$this->save($dbdata)) {	
         			return 0;
        		}	
			}
		}
		return 1;
	}
	
	// Takes an array of form data, formats it for db entry
	private function formatPost ($unformatted) {
		$unformatted['title'] = addslashes($unformatted['title']);
		$unformatted['post'] = addslashes($unformatted['post']);
		$unformatted['post_intro'] = addslashes($unformatted['post_intro']);
		
		// The only fields that can be edited
		$formatted = array('title' => $unformatted['title'], 
						'titlepic' => $unformatted['titlepic'], 
						'post' => $unformatted['post'],
						'post_intro' => $unformatted['post_intro']);
						
		return $formatted;
	}
}


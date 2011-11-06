<?php 

/****************************************************************************
 *
 * This file contains a class representing everything needed by one load of a page
 *
****************************************************************************/


require $rootDir . '/app/models/db.php';
require $rootDir . '/app/controllers/session.php';

class Page
{
	public $user;
	public $dbJmc;
	public $dirRoot;	// /home/usr/justin/public_html/justinmccandless.com/public/
	public $dirUrl;		// http://www.justinmccandless.com/
	public $entry;		// What # entry to display, requested by index.php?entry=57 for example
	public $tag;		// What tag to display if it's wanted (id, not name of tag)

	public function Page($root, $url, $reqEntry, $reqTag, $reqLogout, $postId)
	{
		$this->dbJmc = new DB();
		$this->dirRoot = $root;

		if ($reqEntry == '')
			$this->entry = $this->dbJmc->numRows("dat_entries");
		else
			$this->entry = $reqEntry;

		$tagId = mysql_fetch_array($this->dbJmc->query("SELECT `id` from dat_tags WHERE `tag` = '$reqTag'"));
		$this->tag = $tagId[0];

		$this->user = new Session($postId);
		if ($reqLogout)
			$this->user->logout();
	}

	// includes the content file given in $file, also handles authentication
    public function content($file)
    {
		$htmlFile = $this->dirRoot . '/app/views/content/' . $file;
		$htmlFileProtected = $this->dirRoot . '/app/views/content/protected/' . $file;

		if (!include($htmlFile))	// otherwise, normal content is included
		{
			if ($this->user->authenticated)
			{
				if (!include($htmlFileProtected))	// otherwise, protected content is included
				{	echo '<br>Sorry!  The content you\'re trying to access does not exist.' . "<br>\n";
					echo '|' . $file . "|<br>\n";
					echo '<a href = "/index.php">Return Home</a>';
				}
			}
			else
			{	echo '<br>Sorry!  Either the content you\'re trying to access does not exist, or you are not authorized to view it.' . "<br>\n";
				echo '|' . $file . "|<br>\n";
				echo '<a href = "/index.php">Return Home</a>';
			}
		}
	
		return;
	}

	public function entryToTags ($entry)
	{
		$entry--;
		$result = $this->dbJmc->query("SELECT `tag` from rel_entries_tags where `entry` = $entry");

		$tags = array();
		$i = 0;
		while ($holder = mysql_fetch_array($result))
		{
			$tags[$i] = $holder;
			$i++;
		}

		return $tags;
	}

	public function tagIdToTitle ($id)
	{
		$result = mysql_fetch_array($this->dbJmc->query("SELECT `tag` from dat_tags where `id` = $id"));

		return $result[0];
	}

	// takes a whole url and returns just the name of the file without the extension
	public function nameShort ($filename)
	{
		$start = strripos($filename, '/');
		$end = strripos($filename, '.');

		return (substr($filename, ($start + 1), ($end - $start - 1)));
	}

// takes a machine date and returns a human readable one
	public function dateMacHum ($dateMachine)
	{
		$dateHuman = substr($dateMachine, 0, 10); // yyyy-mm-dd no time

		return ($dateHuman);
	}
}

?>

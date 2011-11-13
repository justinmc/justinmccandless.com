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
	public $dirRoot;		// /home/usr/justin/public_html/justinmccandless.com/public/
	public $rootUrl;		// http://www.justinmccandless.com/
	public $filename;
	public $entry;			// What # entry to display, requested by index.php?entry=57 for example
	public $tag;			// What tag to display if it's wanted (tag page) (id, not name of tag)
	public $tags;			// What tags pertain to this post if needed (names in array)
	public $title;			// Title used in the title tag on this page
	public $description;	// Description for description meta tag

	public function Page($root, $url, $file, $reqEntry, $reqTag, $reqLogout, $postId)
	{
		$this->dirRoot = $root;
		$this->rootUrl = $url;
		$this->filename = $file;

		require $this->dirRoot . '/private/config.php';

		$this->dbJmc = new DB($server, $username, $password, $db);

		if ($reqEntry == '')
			$this->entry = $this->dbJmc->numRows("dat_entries");
		else
			$this->entry = $reqEntry;

		$tagId = mysql_fetch_array($this->dbJmc->query("SELECT `id` from dat_tags WHERE `tag` = '$reqTag'"));
		$this->tag = $tagId[0];
		$this->tags = $this->entryToTags($this->entry);
		for ($i = 0; $i < count($this->tags); $i++) 
			$this->tags[$i] = $this->tagIdToTitle($this->tags[$i]);

		$this->description = "The Personal Blog of Justin McCandless";
		if ($this->tag != "")
			$this->description = $this->description . " | " . $this->tagIdToTitle($this->tag);
		else if (strpos($this->filename, "archive") != false)
			$this->description = $this->description . " | Entry Archive";
		else if (strpos($this->filename, "about") != false)
			$this->description = $this->description . " | About";
		else if (strpos($this->filename, "projects") != false)
			$this->description = $this->description . " | My Projects";
		else if (strpos($this->filename, "tags") != false)
			$this->description = $this->description . " | Entry Tags";
		else if (strpos($this->filename, "index") != false)
		{
			$DATA = $this->dbJmc->getRow("dat_entries", ($this->entry - 1));
			$this->description = $this->description . " | " . substr(str_replace("\n", "", strip_tags($DATA["entry"])), 0, 128);
		}

		$this->user = new Session($passwordAdmin, $postId);
		if ($reqLogout)
			$this->user->logout();

		$this->title = "The Personal Blog of Justin McCandless";
		$pageS = $this->nameShort($this->filename);
		if ($pageS == "projects")
			$this->title = $this->title . " | Projects";
		else if ($pageS == "about")
			$this->title = $this->title . " | About";
		else if ($pageS == "archive")
			$this->title = $this->title . " | Archive";
		else if ($pageS == "tags")
		{	$this->title = $this->title . " | Tags";
			if ($this->tag != "")
			{	$tagTitle = mysql_fetch_array($this->dbJmc->query("SELECT `tag` from dat_tags WHERE `id` = '$this->tag'"));
				$this->title = $this->title . " | " . $tagTitle[0];
			}
		}
		else
		{	$entryTitle = mysql_fetch_array($this->dbJmc->query("SELECT `title` from dat_entries WHERE `id` = ($this->entry - 1)"));
			$this->title = $this->title . " | " . $entryTitle[0];
		}
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
			$tags[$i] = $holder[0];
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

<?php 

/****************************************************************************
 *
 * This file contains a class representing everything needed by one load of a page
 *
****************************************************************************/


//require $rootDir . '/app/models/session.php';
require $rootDir . '/app/models/db.php';
// require $rootDir . '/app/controllers/ssi.php';

class Page
{
//	private $user;
	public $dbJmc;
	public $dirRoot;	// /home/usr/justin/public_html/justinmccandless.com/public/
	public $dirUrl;		// http://www.justinmccandless.com/
	public $entry;		// What # entry to display, requested by index.php?entry=57 for example
	public $tag;		// What tag to display if it's wanted

	public function Page($root, $url, $reqEntry, $reqTag)
	{
//		$user = new Session();
		$this->dbJmc = new DB();
		$this->dirRoot = $root;

		if ($reqEntry == '')
			$this->entry = $this->dbJmc->numRows("Entries");
		else
			$this->entry = $reqEntry;

		$this->tag = $reqTag;
	}

	// includes the content file given in $file, also handles authentication
    public function content($file, $authenticated)
    {
		$htmlFile = $this->dirRoot . '/app/views/content/' . $file;
		$htmlFileProtected = $this->dirRoot . '/app/views/content/protected/' . $file;

		if (!include($htmlFile))	// otherwise, normal content is included
		{
			if ($authenticated)
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

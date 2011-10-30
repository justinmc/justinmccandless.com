<?php 

/****************************************************************************
 *
 * This file contains all server side includes used by the layouts
 *
****************************************************************************/


//require $rootDir . '/app/models/db.php';

class SSI
{
// handles all the including of main div content!
    public function content($phpFile, $authenticated)
    {	global $page;

		$htmlFile = $page->dirRoot . '/app/views/content/' . $this->nameShort($phpFile) . '.html';
		$htmlFileProtected = $page->dirRoot . '/app/views/content/protected/' . $this->nameShort($phpFile) . '.html';

		if (!include($htmlFile))	// otherwise, normal content is included
		{
			if ($authenticated)
			{
				if (!include($htmlFileProtected))	// otherwise, protected content is included
				{	echo '<br>Sorry!  The page you\'re trying to access does not exist.' . "<br>\n";
					echo '|' . $phpFile . "|<br>\n";
					echo '<a href = "/index.php">Return Home</a>';
				}
			}
			else
			{	echo '<br>Sorry!  Either the page you\'re trying to access does not exist, or you are not authorized to view it.' . "<br>\n";
				echo '|' . $phpFile . "|<br>\n";
				echo '<a href = "/index.php">Return Home</a>';
			}
		}
	
		return;
	}

// includes all tags from the tags table
	public function	tags()
	{	global $page;

		$rows = $page->dbJmc->numRows("tags");
		
		for ($count = 0; $count < $rows; $count++)
		{	$DATA = $page->dbJmc->getRow("tags", $count);
			include ($page->dirRoot . '/app/views/content/tag.html');
		}
	}

// includes the latest entries
	public function news()
	{	global $page;

		$rows = $page->dbJmc->numRows("Entries");

		for ($count = 0; $count < 8; $count++)
		{	$DATA = $page->dbJmc->getRow("Entries", ($rows - $count - 1));

			include ($page->dirRoot . '/app/views/content/news.html');	
		}

		return;
	}

// takes a whole url and returns just the name of the file without the extension
	private function nameShort ($filename)
	{
		$start = strripos($filename, '/');
		$end = strripos($filename, '.');

		return (substr($filename, ($start + 1), ($end - $start - 1)));
	}

// takes a machine date and returns a human readable one
	private function dateMacHum ($dateMachine)
	{
		$dateHuman = substr($dateMachine, 0, 10); // yyyy-mm-dd no time

		return ($dateHuman);
	}
}

// Echoes the comments form if needed
/*function ssiComments($enabled)
{
	if ($enabled)
		include $_SERVER["DOCUMENT_ROOT"] . '/page/content/comments.html';

	return;
} */

?>

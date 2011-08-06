<?php 

/****************************************************************************
 *
 * This file contains all server side includes used by the layouts
 *
****************************************************************************/


require $rootDir . '/app/models/db.php';

class SSI
{
// handles all the including of main div content!
    public function content($phpFile)
    {	global $rootDir;

		$htmlFile = $rootDir . '/app/views/content/' . $this->nameShort($phpFile) . '.html';

		if (!include($htmlFile))
		{
			echo '<br>Sorry!  The page you\'re trying to access does not exist.' . "<br>\n";
			echo '|' . $phpFile . "|<br>\n";
			echo '<a href = "/index.php">Return Home</a>';
		}

		return;
	}

// includes all tags from the tags table
	public function	tags()
	{	global $rootDir, $data;

		$rows = $data->numRows("tags");

		for ($count = 0; $count < $rows; $count++)
		{	$DATA = $data->getRow("tags", $count);
			include ($rootDir . '/app/views/content/tag.html');
		}
	}

// includes the latest entries
	public function news()
	{	global $rootDir, $data;

		$rows = $data->numRows("Entries");

		for ($count = 0; $count < 8; $count++)
		{	$DATA = $data->getRow("Entries", ($rows - $count - 1));

			include ($rootDir . '/app/views/content/news.html');	
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

<?php 

/****************************************************************************
 *
 * This file contains a class representing everything needed by one load of a page
 *
****************************************************************************/


//require $rootDir . '/app/models/session.php';
require $rootDir . '/app/models/db.php';
require $rootDir . '/app/controllers/ssi.php';

class Page
{
//	private $user;
	public $dbJmc;
	public $include;
	public $dirRoot;
	public $dirUrl;

	public function Page($root, $url)
	{
//		$user = new Session();
		$this->dbJmc = new DB();
		$this->include = new SSI();
		$this->dirRoot = $root;
	}

// takes a whole url and returns just the name of the file without the extension
	public function nameShort ($filename)
	{
		$start = strripos($filename, '/');
		$end = strripos($filename, '.');

		return (substr($filename, ($start + 1), ($end - $start - 1)));
	}
}

?>

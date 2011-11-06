<?php 

/****************************************************************************
 *
 * This file contains all authentication and session methods
 *
****************************************************************************/


class Session
{
	public $authenticated;
	private $identifier;

	public function Session($id)
	{
		// Cookie must be set before any html!
		if ($id)
		{  $identifier = $id;
		  setcookie("identifier", $id, time() +108000);
		}
		else
		  $identifier = $_COOKIE["identifier"];

		$this->authenticate($identifier);
	}

	public function authenticate($id)
	{
		if ($id == "glamis")
			$this->authenticated = 1;
		else
			$this->authenticated = 0;
	}

	public function logout()
	{
		setcookie("identifier", "", time() -108000);
		$this->identifier = "";
	}
}

?>

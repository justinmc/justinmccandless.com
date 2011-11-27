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
	private $passwordAdmin;

	public function Session($passwordAdmin, $id)
	{
		$this->passwordAdmin = $passwordAdmin;

		// Cookie must be set before any html!
		if ($id)
		{  $identifier = $id;
		  setcookie("identifier", $id, time() +(60 * 60));
		}
		else
		  $identifier = $_COOKIE["identifier"];

		$this->authenticate($identifier);
	}

	public function authenticate($id)
	{
		if ($id == $this->passwordAdmin)
			$this->authenticated = 1;
		else
			$this->authenticated = 0;
	}

	public function logout()
	{
		setcookie("identifier", "", time() -108000);
		$this->identifier = "";
		$this->authenticated = 0;
	}
}

?>

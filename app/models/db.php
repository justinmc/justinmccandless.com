<?php 

/******************************************************************************
 *
 *  This file talks directly with the sql database
 *
 *****************************************************************************/


//require $rootDir . '/private/config.php';

class DB
{
	private $server;
	private $username;
	private $password;
	private $db;

	function DB ($server, $username, $password, $db)
	{
		$this->server = $server;
		$this->username = $username;
		$this->password = $password;
		$this->db = $db;
	}

	// Executes a SQL query and returns the result
	function query ($queryString)
	{
		$con = $this->connect();
	    
		$result = mysql_query($queryString);

		$this->close($con);

	    return ($result);
	}

	// Returns the number of rows in table
	function numRows ($table)
	{
		$con = $this->connect();

	    $QUERY = mysql_query("SELECT * FROM $table");   
	    $rows = 0;
	    $rows = mysql_num_rows($QUERY);

		$this->close($con);

	   return ($rows);
	}

	// Returns a row given its table and id
	public function getRow($table, $row)
	{
		$con = $this->connect();

		// find the name of the table's Primary Key
		$QUERY = mysql_query("SHOW KEYS FROM $table WHERE Key_name = 'PRIMARY'");
		$DATA = mysql_fetch_array($QUERY);
		$primary = $DATA["Column_name"];

		// search for $row in that column
		$QUERY = mysql_query("SELECT * FROM `$table` WHERE `$primary` = $row");

	    $DATA = mysql_fetch_array($QUERY);

		$this->close($con);

    	return ($DATA);
	}

	private function connect()
	{
    	$con = mysql_connect($this->server, $this->username, $this->password);
	    if (!$con)
    	    die('getDB could not connect: ' . mysql_error());

	    mysql_select_db($this->db);

		return ($con);
	}

	private function close($con)
	{
	    mysql_close($con);
	}
}

/*
// Returns index of row with field that matches string in the column, -1 otherwise
function dbColSearch ($col, $string, $table)
{ 
	$rows = getrows($table);
	$i = 0;
	
	while ($i < $rows)
	{
		$DATA = getDB($table, $i);
		
		if ($DATA[$col] == $string)
		   return $i;
		$i++;
	}
	return -1;
}

	// Inserts a new row given the index and an array of strings for column values
	function dbInsert($index, $string, $table)
	{
		$con = $this->connect();

		$query = "INSERT INTO `$table` VALUES ('$index";
		for ($i = 0; $i < sizeof($string); $i++)
		{   $string[$i] = str_replace("\'", "''", $string[$i]);            // PHP to SQL apostrophe escape (\' to '')
			$query = $query . "', '" . $string[$i];
		}
		$query = $query . "')";

		$result = mysql_query($query);

		if (!$result)
		    die("MYSQL ERROR: " . mysql_error());

		$this->close($con);
	}
	

// Writes a string to a cell given by its row and column
function dbWrite($row, $col, $string, $table)
{     global $server, $username, $password, $db;

	  $con = mysql_connect($server, $username, $password);
      if (!$con)
         die('Could not connect: ' . mysql_error());

      mysql_select_db($db);
	  $result = mysql_query("UPDATE `$table` SET `$col` = '$string' WHERE `index` = $row LIMIT 1");

    if (!$result)
        die("MYSQL ERROR: " . mysql_error());

      mysql_close($con);
}

*/

?>

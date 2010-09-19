<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">

<html>

<head>																																		
<?php 

// Gets the functions for php
include $_SERVER['DOCUMENT_ROOT'].'/scripts/functions.php';

$filename = "http://www.justinmccandless.com" . $_SERVER["PHP_SELF"];
// Remove the slash...
if (substr($filename, (strlen($filename) - 1), 1) == '/')
   $filename = substr($filename, 0, (strlen($filename) - 1));

$cat = getcat($filename);
// Types: entry, archive, catindex, aboutme, links 
$type = getkind($filename, $cat);

head($cat); 

?>
</head>

<body>
<?php

titlenav($cat);

news($cat);

content($type, $cat, $filename);
      
?>
</body>

</html>
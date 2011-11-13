<?php

$filename = $_SERVER["DOCUMENT_ROOT"] . $_SERVER["PHP_SELF"];

$rootDir = substr($_SERVER["DOCUMENT_ROOT"], 0, (strlen($_SERVER["DOCUMENT_ROOT"]) - 7));	// lose the 'public/'
$rootUrl = 'http://' . $_SERVER["HTTP_HOST"];

require ($rootDir . '/app/views/layouts/simple.html');

?>

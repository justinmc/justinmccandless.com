<?php

require $_SERVER["DOCUMENT_ROOT"] . '/app/ssi.php';

$entry = $_REQUEST["entry"];

$DBjmc = new DB();

if ($entry == '')
	$entry = $DBjmc->numRows("Entries") - 1;

$tag = $_REQUEST["tag"];

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>

<head>																																		
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<link rel = stylesheet type = "text/css" href = "public/stylesheets/main.css">
<title>Justin McCandless</title>
<link REL="SHORTCUT ICON" href="public/images/faviconjm.ico">
<!-- <link rel="alternate" type="application/rss+xml" title="All RSS" href="http://justinmccandless.com/feeds/rss.xml" /> -->
<!-- <link rel="alternate" type="application/rss+xml" title="All Atom" href="http://justinmccandless.com/feeds/atom.xml" /> -->
<?php

$isPost;	// if this page is a post, need date and comments
if ($filename == "http://www.justinmccandless.com/about.php")
	$isPost = 0;
elseif ($filename == "http://www.justinmccandless.com/archive.php")
	$isPost = 0;
else
	$isPost = 1;

?>
</head>

<body>

<br><br>

<div class = "all">
	<div class = "decCornerTop"></div>
    <img src = "public/images/titleSuits.png" style = "position: absolute; top: -10px; right: 64px;">
    <a href = "index.php"><h1 style = "position: relative; top: -10px; left: 0px;">Justin John McCandless</h1></a>
    <ul class = "nav" style = "position: relative; top: -20px; left: 0px;">
    <li><a href = "index.php">Home</a>
    <li><a href = "about.php">About</a>
    <li><a href = "projects.php">Projects</a>
    <li><a href = "archive.php">Archive</a>
    </ul>
    <div class = "news">
        <!-- Begin Google Custom Search -->        
        <form action="http://www.google.com/cse" id="cse-search-box">
        <div style = "position: relative; top: -4px;">
        <input type="hidden" name="cx" value="005531558768930437238:6naufsgqivo" />
        <input type="hidden" name="ie" value="UTF-8" />
        <input type="text" name="q" size="16" />
        <input type="submit" name="sa" value="Search" />
        </div>
        </form>
        <script type="text/javascript" src="http://www.google.com/jsapi"></script>
        <script type="text/javascript">google.load("elements", "1", {packages: "transliteration"});</script>
        <script type="text/javascript" src="http://www.google.com/coop/cse/t13n?form=cse-search-box&t13n_langs=en"></script>
        <script type="text/javascript" src="http://www.google.com/coop/cse/brand?form=cse-search-box&lang=en"></script>
        <!-- End Google Custom Search -->
        <br><br><br><br>
        <div class = "newstitle">
            <a href = "tags.php">Tags</a>
        </div>
<?php

$include = new SSI();
$include->tags();

?>
        <br><br>
<?php  

$include->news();

?>
    </div>
    <div class = "main">
<?php  

$include->content($filename);

// $include->comments($isPost);

?>
    </div>
    <p class = "h7" style = "position: relative; bottom: -128px;"> content copyright Justin McCandless 2011 </p>
    <p class = "h7" style = "position: relative; bottom: -118px;"> design and engine <a href = "http://www.github.com/justinmc/justinmccandless.com">open source</a> </p>
	<p class = "h7" style = "position: relative; bottom: -118px;">&nbsp;</p>
	<div class = "decCornerBot"></div>
</div>

</body>

</html>


<!--

Notes

Right now, you link to entries via Index.  Previously it was done via Number.  So watch out for old links no longer working.
fix broken image links
ensure analytics ok
touch up everything and launch it!
don't forget database!
change pictures in entries to public/uploads/images/

-->

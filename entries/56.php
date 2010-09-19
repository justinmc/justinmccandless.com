<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">

<html>

<head>

<meta http-equiv="Content-Type" content="text/html;charset=utf-8">

<link rel = stylesheet type = "text/css" href = "../style.css">																		<!-- CSS link -->

<title> Justin McCandless </title>

<link REL="SHORTCUT ICON" HREF="../images/faviconjm.ico">																				<!-- Favicon link -->
																																						
<?php include("../scripts/functions.php"); ?>																								<!-- php functions -->

</head>

<body>

<br><br>
<div class = "all">
   <br>
   <div class = "titlenav">
      <script language = "JavaScript" type = "text/javascript" src = "../scripts/titleout.js"></script>					<!-- random title pic javascript -->
      <ul class = "nav1">
      <li><a href = "../index.php">&nbsp;</a>
      </ul>
      <ul class = "nav2">    
      <li><a href = "../archive.php">&nbsp;</a>
      </ul>
      <ul class = "nav3">    
      <li><a href = "../aboutme.php">&nbsp;</a>
      </ul>
      <ul class = "nav4">    
      <li><a href = "../links.php">&nbsp;</a>
      </ul>
   </div>
   <br>
   <div class = "news">
      <div class = "newstitle">
         Search
      </div>
      <br>
      <form action="http://www.google.com/cse" id="cse-search-box">																		<!-- Google Custom Search -->
      <div>
         <input type="hidden" name="cx" value="011335546969155053337:8wtwpvgol1w" />
         <input type="hidden" name="ie" value="UTF-8" />
         <input type="text" name="q" size="18" />
         <input type="submit" name="sa" value="Search" />
      </div>
      </form>
      <script type="text/javascript" src="http://www.google.com/jsapi"></script>
      <script type="text/javascript">google.load("elements", "1", {packages: "transliteration"});</script>
      <script type="text/javascript" src="http://www.google.com/coop/cse/t13n?form=cse-search-box&t13n_langs=en"></script>
      <script type="text/javascript" src="http://www.google.com/coop/cse/brand?form=cse-search-box&lang=en"></script>					<!-- End Google Custom Search -->

      <br><br>
      <div class = "newstitle">
         Categories      
      </div>
      <a href = "../life/index.php">Life</a><br>
      <a href = "../technology/index.php">Technology</a><br>
      <a href = "../solutions/index.php">Solutions</a><br>
      <a href = "../travel/index.php">Travel</a><br>
      <a href = "../websites/index.php">Websites</a>
      <br><br>
      <div class = "newstitle">
         Recent Posts
      </div>
      <?php
         
      getnews('all');

      ?>
   </div>
  
   <div class = "entries">
      <?php
	      
	   entry('56');
      
	   ?>
   </div>
</div>
<br><br>

<script type="text/javascript">																																		<!-- Google Analytics Crap -->
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
var pageTracker = _gat._getTracker("UA-5561746-1");
pageTracker._trackPageview();
</script>
</body>

</html>
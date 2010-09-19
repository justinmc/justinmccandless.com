<?php include("/usr/local/pem/vhosts/163209/webspace/httpdocs/update/password_protect.php"); ?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">

<html>

<head>
<?php include("../scripts/functions.php"); ?>		

<!--

<script type="text/javascript" src = "http://www.justinmccandless.com/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		mode : "textareas",
		theme : "simple"
	});
</script>

-->	
																						<!-- php functions -->
<title> Justin McCandless </title>

</head>																									

<body>
   <h2>Entry Updater</h2>
   <br>
   <?php

   if (!$_GET["num"])
   {  $num = 1;
   }
   else 
   {  $num = $_GET["num"];
   }

   update($num);

   ?>     
   <a href="http://www.justinmccandless.com/update/index.php?logout=1">Logout</a>   
   <a href = "index.php">Reanudar</a>					
      
</body>

</html>

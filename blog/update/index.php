<?php include("/usr/local/pem/vhosts/163209/webspace/httpdocs/update/password_protect.php"); ?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">

<html>

<head>
<?php 

include("../scripts/functions.php"); 																		// Gets the functions for php

if ($_GET["num"] == 2)
{
   echo "<script type=\"text/javascript\" src=\"fckeditor/fckeditor.js\"></script>\n";
   echo "<script type=\"text/javascript\">\n";
   echo "window.onload = function()\n";
   echo "{\n";
   echo "var oFCKeditor = new FCKeditor( 'MyTextarea' , '600', '700') ;\n";
   echo "oFCKeditor.BasePath = \"fckeditor/\" ;\n";
   echo "oFCKeditor.ReplaceTextarea() ;\n";
   echo "fck.Height = '800' ;\n"; 
   echo "}\n";
   echo "</script>\n";
}

?>
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
   <a href="index.php?logout=1">Logout</a>   
   <a href = "index.php">Reanudar</a>					
      

</body>

</html>

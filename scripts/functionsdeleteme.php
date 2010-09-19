<?php

//////// Settings ////////

// Database info
$db_server = "mysql2561int.domain.com";
$db_username = "u1064984_justin";
$db_password = "epeh883_mpafd";
$db_database = "db1064984_Entries";
$db_table = "Entries";
 
// Other
$itemsper = 8;		// Number of news items echoed by getnews.  I should change this to an argument.  

//////////////////////////


function entries ($num, $cat)																													// Currently unused new fn, will replace index, entry, entrycat
{
   $DATA = getdb($num);
   
   echo "<h1> <a href = \"http://www.justinmccandless.com/entries/"; 
   echo $DATA['Number'];
   echo ".php\"> "; 
   echo $DATA['Title']; 
   echo " </a> </h1>\n";
   echo "<font style = \"font-size: 11pt;\">Category: <a href = \"http://www.justinmccandless.com/";
   echo decap($DATA['Category']);																						// Category
   echo "/index.php\">";
   echo $DATA['Category'];
   echo "</a></font><br><br>\n";																							// Title
   echo $DATA['Entry'];
   echo "\n";																													// Entry
         
   $Date = datechange($DATA['Date']);
   echo "<br><h6> Posted $Date </h6>\n";																				// Date
         
   echo "<br><br><br>\n";
   echo "</div>\n";
   
   $rows = getrows($cat);
   $num = $DATA['Number'];
      
   if ($num == 1)
   {
      $out = "<!-- No previous, this is the oldest post -->";
   }
   else
   {  $prevnum = $num - 1;
      $prev = "<a href = \"http://www.justinmccandless.com/index.php?entry=" . $prevnum . ".php\">Older Post</a>\n";
   }

   if ($num == $rows)
   {
      $out = "<!-- No next, this is the newest post -->";
   }
   else
   {  $nextnum = $num + 1;
      $next = "<a href = \"http://www.justinmccandless.com/index.php?entry=" . $nextnum . "\">Newer Post</a>\n";
   }      
      
   echo "<div class = \"footer\">\n";																					// Footer nav
   echo "<div class = \"prev\">\n";
   echo $prev;
   echo "</div>\n";
   echo "<div class = \"next\">\n";
   echo $next;
   echo "</div>\n";

   $wyear = substr($DATA['Date'],6,2);																					// Echoes the footer date as when the post was made
   $wyear = "20" . $wyear;
      
   echo "<div class = \"footerline\">\n";																				// Footer Sig      
   echo "<h3> Justin McCandless, ";
   echo $wyear;
   echo " </h3>\n";
   echo "</div>\n";
}




function index ($num)																															// Master Function
{																																						// On the home page, does everything needed to paste in the entry
   $DATA = getdb($num);																															// Only differs from entry() in a few links
   
   echo "<h1> <a href = \"entries/"; 
   echo $DATA['Number'];
   echo ".php\"> "; 
   echo $DATA['Title']; 
   echo " </a> </h1>\n";
   echo "<font style = \"font-size: 11pt;\">Category: <a href = \"";
   echo decap($DATA['Category']);																						// Category
   echo "/index.php\">";
   echo $DATA['Category'];
   echo "</a></font><br><br>\n";																							// Title
   echo $DATA['Entry'];
   echo "\n";																													// Entry
         
   $Date = datechange($DATA['Date']);
   echo "<br><h6> Posted $Date </h6>\n";																				// Date
         
   echo "<br><br><br>\n";
   echo "</div>\n";
      
   $prev = getnavprevindex($DATA['Number']);      
   $next = getnavnext('all', $DATA['Number']);      
      
   echo "<div class = \"footer\">\n";																					// Footer nav
   echo "<div class = \"prev\">\n";
   echo $prev;
   echo "</div>\n";
   echo "<div class = \"next\">\n";
   echo $next;
   echo "</div>\n";

   $wyear = substr($DATA['Date'],6,2);
   $wyear = "20" . $wyear;
      
   echo "<div class = \"footerline\">\n";																				// Footer Sig      
   echo "<h3> Justin McCandless, ";
   echo $wyear;
   echo " </h3>\n";
   echo "</div>\n";
}

function entry ($num)																															// Master Function
{																																						// On entry pages, does everything needed to paste in the entry
   $DATA = getdb($num);
   
   echo "<h1> <a href = \""; 
   echo $DATA['Number'];
   echo ".php\"> "; 
   echo $DATA['Title']; 
   echo " </a> </h1>\n";
   echo "<font style = \"font-size: 11pt;\">Category: <a href = \"../";
   echo decap($DATA['Category']);																						// Category
   echo "/index.php\">";
   echo $DATA['Category'];
   echo "</a></font><br><br>\n";																							// Title
   echo $DATA['Entry'];
   echo "\n";																													// Entry
         
   $Date = datechange($DATA['Date']);
   echo "<br><h6> Posted $Date </h6>\n";																				// Date
         
   echo "<br><br><br>\n";
   echo "</div>\n";
      
   $prev = getnavprev($DATA['Number']);      
   $next = getnavnext('all', $DATA['Number']);      
      
   echo "<div class = \"footer\">\n";																					// Footer nav
   echo "<div class = \"prev\">\n";
   echo $prev;
   echo "</div>\n";
   echo "<div class = \"next\">\n";
   echo $next;
   echo "</div>\n";

   $wyear = substr($DATA['Date'],6,2);
   $wyear = "20" . $wyear;
      
   echo "<div class = \"footerline\">\n";																				// Footer Sig      
   echo "<h3> Justin McCandless, ";
   echo $wyear;
   echo " </h3>\n";
   echo "</div>\n";
}

function entrycat ($cat, $num)																							// Master Function
{																																	// On category entry pages, does everything needed to paste in the entry
 	$count = 0;																													// Given the category, and which entry is needed (1 = oldest, 2 = second oldest, etc.)
 	$found = 0;
 	while ($found != $num)
 	{
 	   $DATA = getdb($count);
 	   if ($DATA['Category'] == $cat)
 	   {  $found++;
 	   }
 	   $count++;
 	} 																																
   $count--;																													// Just to correct an off by one error

   $DATA = getdb($count);																										
   
   echo "<h1> <a href = \""; 
   echo $DATA['Number'];
   echo ".php\"> "; 
   echo $DATA['Title']; 
   echo " </a> </h1>\n";
   echo "<font style = \"font-size: 11pt;\">Category: <a href = \"../";
   echo decap($DATA['Category']);																						// Category
   echo "/index.php\">";
   echo $DATA['Category'];
   echo "</a></font><br><br>\n";																							// Title
   echo $DATA['Entry'];
   echo "\n";																													// Entry
         
   $Date = datechange($DATA['Date']);
   echo "<br><h6> Posted $Date </h6>\n";																				// Date
         
   echo "<br><br><br>\n";
   echo "</div>\n";
      
   $prev = getnavprev($num);      
   $next = getnavnext($cat, $num);      
      
   echo "<div class = \"footer\">\n";																					// Footer nav
   echo "<div class = \"prev\">\n";
   echo $prev;
   echo "</div>\n";
   echo "<div class = \"next\">\n";
   echo $next;
   echo "</div>\n";

   $wyear = substr($DATA['Date'],6,2);
   $wyear = "20" . $wyear;
      
   echo "<div class = \"footerline\">\n";																				// Footer Sig      
   echo "<h3> Justin McCandless, ";
   echo $wyear;
   echo " </h3>\n";
   echo "</div>\n";
}

function getdb ($row)																															// Accesses the database
{
   $con = mysql_connect("mysql2561int.domain.com", "u1064984_justin", "epeh883_mpafd");

   if (!$con)
   {
      die('Could not connect: ' . mysql_error());
   }
   mysql_select_db("db1064984_Entries");
   $QUERY = mysql_query("SELECT * FROM Entries WHERE Number = $row");
   $DATA = mysql_fetch_array($QUERY);

   mysql_close($con);
   
   return ($DATA);
}

function getrows ($cat)																																// Returns the total number of rows in the database
{																																						   // Or the number of entries of a specific category
   $con = mysql_connect("mysql2561int.domain.com", "u1064984_justin", "epeh883_mpafd");
   if (!$con)
   {
      die('Could not connect: ' . mysql_error());
   }
   mysql_select_db("db1064984_Entries");
   $QUERY = mysql_query("SELECT * FROM Entries");
   $rows = 0;
   if ($cat == "all")
   {  $rows = mysql_num_rows($QUERY);
   }
   else
   {
      $count = 0;
      while ($count <= getrows('all'))
      {
         $DATA = getdb($count);
         if ($DATA['Category'] == $cat)
         {  $rows++;
         }
         $count++;
      }
   }   
   
   mysql_close($con);
   
   return ($rows);
}

function datechange ($num)																														// Changes a date of the format
{																																						//	dd/mm/yy or dd-mm-yy to the full format
   $nday = substr($num,0,2);																													// day month year
   $nmonth = substr($num,3,2);
   $nyear = substr($num,6,2);

   switch ($nmonth)
   {  case "01":
         $wmonth = "January";
      break;
      case "02":
         $wmonth = "February";
      break;
      case "03":
         $wmonth = "March";
      break;
      case "04":
         $wmonth = "April";
      break;
      case "05":
         $wmonth = "May";
      break;
      case "06":
         $wmonth = "June";
      break;
      case "07":
         $wmonth = "July";
      break;
      case "08":
         $wmonth = "August";
      break;
      case "09":
         $wmonth = "September";
      break;
      case "10":
         $wmonth = "October";
      break;
      case "11":
         $wmonth = "November";
      break;
      case "12":
         $wmonth = "December";
      break;
   }

   $wyear = "20" . $nyear;
   
   $wdate = $nday . " " . $wmonth . " " . $wyear;   
   
   return ($wdate);
}

function decap ($cat)																																// Makes the first letter of a category lowercase
{																																							// For the purpose of links
   switch ($cat)
   {  case "Life":
         $lcat = "life";
      break;
      case "Travel":
         $lcat = "travel";
      break;
      case "Solutions":
         $lcat = "solutions";
      break;
      case "Websites":
         $lcat = "websites";
      break;
      case "Technology":
         $lcat = "technology";
      break;
   }
   return ($lcat);
}

function getnews ($cat)																																// Gets the newest news items from a specific category or from all
{																																							// The passed in parameter cat can equal
   $row = getrows('all');																																	// all, Websites, Solutions, Technology, Travel, or Life
   $count = 0;
   while (($count < 8) && ($row > 0))
   {  
      $DATA = getdb($row);
      if (($DATA['Category'] == $cat) || ($cat == "all"))
      { 
         echo $DATA['Date'];
         echo "\n";
         echo "<h2><a href = \"";
         echo $DATA['Address'];
         echo "\">";
         echo $DATA['Title'];
         echo "</a></h2><br>\n";
         echo "<div class = \"dividernews\"></div><br>\n";
         $count++;
      }      
      $row--;
   }
}

function getnavprev ($num)																						// Fills in the link at the bottom for previous
{
   if ($num == 1)
   {
      $out = "<!-- No previous, this is the oldest post -->";
   }
   else
   {  $prev = $num - 1;
      $out = "<a href = \"" . $prev . ".php\">Older Post</a>\n";
   }
   
   return ($out);
}

function getnavprevindex ($num)																				// Same as getnavprev but for index.php, not entries.
{
   $prev = $num - 1;
   $out = "<a href = \"/entries/" . $prev . ".php\">Older Post</a>\n";
   
   return ($out);
}

function getnavnext ($cat, $num)																						// Fills in the link at the bottom for next
{
   $rows = getrows($cat);
   if ($num == $rows)
   {
      $out = "<!-- No next, this is the newest post -->";
   }
   else
   {  $next = $num + 1;
      $out = "<a href = \"" . $next . ".php\">Newer Post</a>\n";
   }
   
   return ($out);
}

function update($stage)																												// Updates, adds, or deletes entries
{
   if ($stage == 1)																													// Select the file to edit or new
   {
      echo "<p>Select the entry you want to edit/delete, or pick the green one to create an all new entry</p><br><br>\n";
    
      echo "<form method = \"post\" action = \"index.php?num=2\">\n";
      echo "<table cellspacing=\"1\" cellpadding=\"2\" width=\"504\" border=\"1\">\n";
      echo "<tr>\n";
      echo "<td>Title</td>\n";
      echo "<td>Category</td>\n";
      echo "<td></td>\n";
      echo "</tr>\n";
      echo "<tr>\n";
      echo "<td></td>\n";
      echo "<td><font color = \"#2afd00\">New Entry</font></td>\n";
      echo "<td><input type = \"radio\" value = \"0\" name = \"entry\" checked></td>\n";
      echo "</tr>\n";
      
      $count = getrows('all');
      while ($count > 0)
      {
         $DATA = getdb($count);
         echo "<tr>\n";
         echo "<td>" . $DATA['Title'] .  "</td>\n";
         echo "<td>" . $DATA['Category'] . "</td>\n";
         echo "<td><input type = \"radio\" value = \"" . $count . "\" name = \"entry\"></td>\n";
         echo "</tr>\n";
         $count--;
      }
      
      echo "</table>\n";
      echo "<br><br><br>\n";
      echo "<input type = \"submit\" value = \"Submit\">\n";
      echo "</form>\n";
      echo "<br><br><br><br><br>\n";
   }
   
    elseif ($stage == 2)																																		// Edit the html
   {
      $num = $_REQUEST["entry"];
      if ($num != 0)
      {  $DATA = getdb($num);
         $title = $DATA['Title'];
         $date = $DATA['Date'];
         $cat = $DATA['Category'];
      }
      else
      {  $title = "";
         $date = "";
      }
      echo "<p>\n";
      echo "Edit everything here, or just select 'Erase' at the bottom if that's what you're going for.<br>\n";
      echo "</p>\n";
      echo "<br><br>\n";
      echo "<form method = \"post\" action = \"index.php?num=3\">\n";
      echo "Title:<br><br>\n";
      echo "<input type = \"text\" name = \"title\" value = \"" . $title . "\"><br><br><br><br>\n";
      echo "Category:<br><br>\n";
      echo "<input type = \"text\" name = \"category\" value = \"" . $cat . "\"><br><br><br><br>\n";
      echo "Date:<br><br>\n";
      echo "<input type = \"text\" name = \"date\" value = \"" . $date . "\"><br><br><br><br>\n";
      echo "Entry:<br><br>\n";
      echo "<textarea id=\"tinymce\" name=\"tinymce\" rows=\"15\" cols=\"80\" style=\"width: 80%\">";
      if ($num != 0)
      {  echo $DATA['Entry'];
      }
      echo "</textarea>\n";
      echo "<input type = \"hidden\" name = \"num\" value = \"";												// Ninja style submit the number
      echo $num;
      echo "\">\n"; 

	   echo "<br><br><br>\n";
	   echo "<input type = \"radio\" name = \"action\" value = \"edit\" checked> Edit\n";
	   echo "&nbsp;&nbsp;&nbsp;&nbsp;\n";
	   echo "<input type = \"radio\" name = \"action\" value = \"erase\"> Erase\n"; 
	   echo "<br><br>\n";
      echo "<input type = \"submit\" value = \"Submit\">\n";
      echo "</form>\n";
      echo "<br><br><br><br><br>\n";
   }
   
   elseif ($stage == 3)																																			// Update the database
   {
      $con = mysql_connect("mysql2561int.domain.com", "u1064984_justin", "epeh883_mpafd");
      if (!$con)
      {
         die('Could not connect: ' . mysql_error());
      }
      mysql_select_db("db1064984_Entries");

      $html = $_POST["tinymce"];
      $apost = "'";
      $apostcom = "\\'";
      $html = str_replace($apost,$apostcom,$html);																				// Fixes the murderous apostrophe error by escaping apostrophes
      $action = $_POST["action"];
      $num = $_POST["num"];
      $title = $_POST["title"];
      $date = $_POST["date"];
      $cat = $_POST["category"];
      
      $QUERY = mysql_query("SELECT * FROM Entries");
      $rows = mysql_num_rows($QUERY);
		$number = $rows + 1;
		
		if ($action == 'erase')
		{  mysql_query("DELETE FROM Entries WHERE Number = $num");
		   for ($count = ($num + 1); $count <= $rows; $count++)
		   {  $newnum = $count - 1;
		      $newindex = $count - 2;
		      mysql_query("UPDATE Entries SET Index = $newindex WHERE Number = '$count'");
		      mysql_query("UPDATE Entries SET Number = $newnum WHERE Number = '$count'");
		   } 
		}
		else
		{
		   if ($num == 0)																														// If we're adding a row
         {  mysql_query("INSERT INTO Entries (Number, Title, Category, Date, Entry) VALUES ($number, '$title', '$cat', '$date', '$html')");
         }
         else																																	// If we're updating
         {  mysql_query("UPDATE Entries SET Entry = '$html' WHERE Number = '$num'");
            mysql_query("UPDATE Entries SET Title = '$title' WHERE Number = '$num'");
            mysql_query("UPDATE Entries SET Category = '$cat' WHERE Number = '$num'");
            mysql_query("UPDATE Entries SET Date = '$date' WHERE Number = '$num'");
            mysql_query("UPDATE Entries SET Updated = '$date' WHERE Number = '$num'");
         }
      }
      
      mysql_close($con);
      
      echo "<h3> Update Received </h3><br><br><br><br>";
   }

  // The problem with this fn only exists in stage 3.  I think it might have something to do with num, since it's posted and getted I think...
}








?>
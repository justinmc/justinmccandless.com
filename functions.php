<?php

//////// Settings ////////

// Database info
$db_host = "localhost";
$db_user = "justin";
$db_password = "MjustbeatND";
$db_database = "justinmccandless";
$db_table = "Entries";
 
// Other
//$itemsper = 8;		// Number of news items echoed by getnews.  I should change this to an argument.  

//////////////////////////


function getcat ($filename)
{
   if (strpos($filename, "life"))
      $cat = "Life";
   elseif (strpos($filename, "travel"))
      $cat = "Travel";
   elseif (strpos($filename, "technology"))
      $cat = "Technology";
   elseif (strpos($filename, "solutions"))
      $cat = "Solutions";
   elseif (strpos($filename, "websites"))
      $cat = "Websites";
   elseif (strpos($filename, "works"))
      $cat = "Works";
   else
      $cat = "all";
      
   return($cat);
}

function getkind($filename, $cat)
{
   if (strpos($filename, "archive"))		// archive
      return("archive");
   elseif (strpos($filename, "cv"))	// cv
      return("cv");
   elseif (strpos($filename, "links"))		// links
      return("links");
   elseif ($cat != 'all')						// catindex
      return("catindex");
   else												// entry
      return("index");
}

//function doctype ()
//{
//   echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">\n\n';
//}

function getname ($filename)
{
   $pos = strlen($filename);
      
   $pos = $pos - 4;																					// Get past .php
   $end = $pos;
      
   while (substr($filename, $pos, 1) != "/")
   {  $pos--;
   }
   $pos++;																								// Jump back on other side of the slash
      
   $filename = substr($filename, $pos, ($end - $pos));
      
   return ($filename); 
}           



function head ($cat)
{
   if ($cat == 'all')
   {  $cat = "All";
      $append = "";
   }
   else
      $append = decap($cat); 

   // Encoding
   echo '<meta http-equiv="Content-Type" content="text/html;charset=utf-8">' . "\n";
   // Stylesheet
   echo '<link rel = stylesheet type = "text/css" href = "http://www.justinmccandless.com/style.css">' . "\n";
   // Title
	echo '<title>Justin McCandless</title>' . "\n";   
	// Favicon
   echo '<link REL="SHORTCUT ICON" HREF="http://www.justinmccandless.com/images/faviconjm.ico">' . "\n";
   // Feeds
   echo '<link rel="alternate" type="application/rss+xml" title="' . $cat . ' RSS" href="http://justinmccandless.com/feeds/rss' . $append . '.xml" />' . "\n";
   echo '<link rel="alternate" type="application/rss+xml" title="' . $cat . ' Atom" href="http://justinmccandless.com/feeds/atom' . $append . '.xml" />' . "\n";
}

function titlenav($cat)
{
   if ($cat == 'all')
   {
      $cat = "";
      $out = ""; 
   }
   else
   {
      $cat = decap($cat) . "/";
      $out = "out";
   }

   echo '<br><br>' . "\n";
   echo '<div class = "all">' . "\n";
   echo '   <br>' . "\n";
   echo '   <div class = "titlenav">' . "\n";
   echo '      <script language = "JavaScript" type = "text/javascript" src = "scripts/title' . $out . '.js"></script><!-- random title pic javascript -->' . "\n";
   echo '      <ul class = "nav1">' . "\n";
   echo '      <li><a href = "http://www.justinmccandless.com/index.php">&nbsp;</a>' . "\n";
   echo '      </ul>' . "\n";
   echo '      <ul class = "nav2">' . "\n";
   echo '      <li><a href = "http://www.justinmccandless.com/' . $cat . 'archive.php">&nbsp;</a>' . "\n";
   echo '      </ul>' . "\n";
   echo '      <ul class = "nav3">' . "\n";
   echo '      <li><a href = "http://www.justinmccandless.com/aboutme.php">&nbsp;</a>' . "\n";
   echo '      </ul>' . "\n";
   echo '      <ul class = "nav4">' . "\n";
   echo '      <li><a href = "http://www.justinmccandless.com/links.php">&nbsp;</a>' . "\n";
   echo '      </ul>' . "\n";
   echo '   </div>' . "\n";
   echo '   <br>' . "\n";

}

function news ($cat)
{
   echo '   <div class = "news">' . "\n";
   echo '      <div class = "newstitle">' . "\n";
   echo '         Search' . "\n";
   echo '      </div>' . "\n";
   echo '      <br>' . "\n";
   echo '      <form action="http://www.google.com/cse" id="cse-search-box"><!-- Google Custom Search -->' . "\n";
   echo '      <div>' . "\n";
   echo '      <input type="hidden" name="cx" value="005531558768930437238:6naufsgqivo" />' . "\n";
   echo '      <input type="hidden" name="ie" value="UTF-8" />' . "\n";
   echo '      <input type="text" name="q" size="18" />' . "\n";
   echo '      <input type="submit" name="sa" value="Search" />' . "\n";
   echo '      </div>' . "\n";
   echo '      </form>' . "\n";
   echo '      <script type="text/javascript" src="http://www.google.com/jsapi"></script>' . "\n";
   echo '      <script type="text/javascript">google.load("elements", "1", {packages: "transliteration"});</script>' . "\n";
   echo '      <script type="text/javascript" src="http://www.google.com/coop/cse/t13n?form=cse-search-box&t13n_langs=en"></script>' . "\n";
   echo '      <script type="text/javascript" src="http://www.google.com/coop/cse/brand?form=cse-search-box&lang=en"></script>' . "\n";
   echo '      <!-- End Google Custom Search -->' . "\n";
   echo '      <br><br>' . "\n";
   echo '      <div class = "newstitle">' . "\n";
   echo '         Categories' . "\n";      
   echo '      </div>' . "\n";
   echo '      <a href = "http://www.justinmccandless.com/life/index.php">Life</a><br>' . "\n";
   echo '      <a href = "http://www.justinmccandless.com/technology/index.php">Technology</a><br>' . "\n";
   echo '      <a href = "http://www.justinmccandless.com/solutions/index.php">Solutions</a><br>' . "\n";
   echo '      <a href = "http://www.justinmccandless.com/travel/index.php">Travel</a><br>' . "\n";
   echo '      <a href = "http://www.justinmccandless.com/websites/index.php">Websites</a><br>' . "\n";
   echo '      <a href = "http://www.justinmccandless.com/works/index.php">Works</a>' . "\n";
   echo '      <br><br>' . "\n";
   echo '      <div class = "newstitle">' . "\n";
   echo '         Recent Posts' . "\n";
   echo '      </div>' . "\n";
   getnews($cat);
   echo '   </div>' . "\n";
}

function content ($type, $cat, $filename)
{
   echo '   <div class = "entries">' . "\n";
   
   if (($type == 'entry') || ($type == 'index'))
   {
      if ($_GET["entry"])
         $entry = $_GET["entry"]; 
      elseif (strpos($filename, "index"))
         $entry = getrows($cat);
      else
         $entry = getname($filename);
      
      $DATA = getdb($entry);
      $Date = datechange(datemachum($DATA['Date']));
      
      echo "      <h1> <a href = \"http://www.justinmccandless.com/entries/" . $entry . ".php\">" . $DATA['Title'] . "</a> </h1>\n";
      echo "      <font style = \"font-size: 11pt;\">Category: <a href = \"http://www.justinmccandless.com/";
      echo decap($DATA['Category']);
      echo "/index.php\">";
      echo $DATA['Category'] . "</a></font><br><br>\n";
      echo $DATA['Entry'] . "\n";   
      echo "      <br><h6> Posted $Date </h6>\n";
   }

   elseif ($type == 'archive')
   {
      if ($cat == 'all')
         $catTemp = "";
      else
         $catTemp = $cat;
         

      echo '      <h1> <a href = "http://www.justinmccandless.com/' . decap($catTemp) . '/archive.php"> ' . $catTemp . ' Archive </a> </h1><br>' . "\n";

      echo '      Categories:<br>' . "\n";
      echo '      <ul>' . "\n";
      echo '      <li><a href = "http://www.justinmccandless.com/life/archive.php">Life</a></li>' . "\n";
      echo '      <li><a href = "http://www.justinmccandless.com/technology/archive.php">Technology</a></li>' . "\n";
      echo '      <li><a href = "http://www.justinmccandless.com/solutions/archive.php">Solutions</a></li>' . "\n";
      echo '      <li><a href = "http://www.justinmccandless.com/travel/archive.php">Travel</a></li>' . "\n";
      echo '      <li><a href = "http://www.justinmccandless.com/websites/archive.php">Websites</a></li>' . "\n";
      echo '      <li><a href = "http://www.justinmccandless.com/works/archive.php">Works</a></li>' . "\n";
      echo '      </ul><br><br>' . "\n";

      echo '      <table border = "0" width = "600" cellpadding = "2">' . "\n";
      echo '      <tr style = "text-align: center;">' . "\n";
      echo '      <td><u>Entry</u></td>' . "\n";
      echo '      <td><u>Title</u></td>' . "\n";
      echo '      <td><u>Category</u></td>' . "\n";
      echo '      <td><u>Date Posted</u></td>' . "\n";
      echo '      </tr>' . "\n";
      echo '      <tr>' . "\n";
      echo '      <td>&nbsp;</td>' . "\n";
      echo '      <td>&nbsp;</td>' . "\n";
      echo '      <td>&nbsp;</td>' . "\n";
      echo '      <td>&nbsp;</td>' . "\n";
      echo '      </tr>' . "\n";
      
      $counter = getrows('all');
      while ($counter > 0)
      {
         $DATA = getdb($counter);
         $catl = decap($DATA['Category']) . "/";
         $catr = $catl;
         if ($cat == 'all')
            $catr = "";
         if (($cat == $DATA['Category']) || ($cat == 'all'))
         {
            echo "      <tr>";
            echo "      <td>";
            echo $DATA['Number'];
            echo "      </td>\n";																		// Entry
            echo "      <td><a href = \"http://www.justinmccandless.com/" . $catr . "index.php?entry=" . $DATA['Number'] . "\"";
            echo $DATA['Number'];
            echo ".php\">";   
            echo $DATA['Title'];
            echo "      </a></td>\n";																	// Title
            echo "      <td><a href = \"http://www.justinmccandless.com/" . $catl . "index.php\">";
            echo $DATA['Category'];
            echo "      </a></td>\n";																	// Category
            echo "      <td>";
            echo datemachum($DATA['Date']);
            echo "      </td>\n";																		// Date Posted
            echo "      </tr>\n";
         }
         $counter--;
      }
      echo "      </table>\n";
   }

   elseif ($type == 'cv')
   {
      /*echo '      <table>
                  <tr>
                  <td>Work Experience</td>
                  <td>Head of External Relations, AIESEC Michigan</td>
                  <td><i>2009 to Present</i></td>
                  </tr>
                  </table>' . "\n";*/
      echo '      <br><br><br><i>CV Coming Soon</i>' . "\n";
   }
   
   elseif ($type == 'links')
   {
      echo '      <h1><u> Links </u></h1>' . "\n";
      echo '      <p>' . "\n";
      echo '      Here are a couple links to other major projects of mine:<br><br><br>' . "\n";
      echo '      <a href = "http://www.asquaredforum.com"> asquaredforum </a><br>' . "\n";
      echo '      A forum about everything Ann Arbor, Michigan, that I\'m just now starting up.<br><br>' . "\n";
      echo '      <a href = "http://www.arcoiris.org.ec"> Arcoiris </a><br>' . "\n";
      echo '      An Ecuadorian non-profit ecologic foundation that I worked at over the summer.  On the' . "\n";
      echo '      website.<br><br>' . "\n";
      echo '      <a href = "http://www.turkiball.com"> Turkiball </a><br>' . "\n";
      echo '      An amazing new sport invented by a friend at Michigan.  I\'m on the web development team. <br><br>' . "\n";
      echo '      <a href = "http://www.markupcartoons.com"> Markup Cartoons	</a><br>' . "\n";
      echo '      A webcomic I created as one of my first html projects, along with this blog.<br><br>' . "\n";   
      echo '      <a href = "http://www.theelectronicshandyman.com"> The Electronics Handyman </a><br>' . "\n";
      echo '      A company that a friend and I started last summer helping people out with their home tech' . "\n"; 	
      echo '      problems in the Las Vegas valley.<br><br>' . "\n";
      echo '      </p>' . "\n";
   } 
   elseif ($type == 'catindex')
   {
      if (!$_GET["entry"])
      {  $num = 0;
      }
      else 
      {  $num = $_GET["entry"];
      }   
   	// Category homepage
      if ($num == 0)
      {
         if ($cat == 'Life')
         {
            echo '      <h1>' . $cat . '</h1>' . "\n"; 
            echo '      <br>' . "\n";
            echo '      <a onClick = "javascript:window.open(\'../images/catlifeb.jpg\', \'popup\', \'height = 660, width = 1000\');" style = "cursor: pointer;">' . "\n";
            echo '      <img src = "../images/catlife.jpg" alt = "Life" title = "The Diag during spring in Ann Arbor" style = "float: left; padding: 10px;">' . "\n";
            echo '      </a>' . "\n";
            echo '      <p>' . "\n";
            echo '      Here you\'ll find all of the general posts about my life.  This is mostly just stuff that doesn\'t fit directly' . "\n";
            echo '      into any of the other categories, like what I\'m doing at the moment, how it\'s going, etc.  More often than' . "\n";
            echo '      not this involves something about school.' . "\n";
         }
      
         elseif ($cat == 'Solutions')  
         {
            echo '      <h1>' . $cat . '</h1>' . "\n"; 
            echo '      <br>' . "\n";
            echo '      <a onClick = "javascript:window.open(\'../images/catsolb.jpg\', \'popup\', \'height = 660, width = 1000\');" style = "cursor: pointer;">' . "\n";
            echo '      <img src = "../images/catsol.jpg" alt = "Solutions" title = "Insert metaphor here" style = "float: left; padding: 10px;">' . "\n";
            echo '      </a>' . "\n";
            echo '      <p>' . "\n";
            echo '      Whenever I figure out a solution to some computer problem and think that I might not be the only one' . "\n"; 
            echo '      facing it, I post the solution here.  I also write a fair amount of code with all the messing around' . "\n";
            echo '      I do with web design stuff, and I\'d like to try and share some of code and/or utility programs that' . "\n";
            echo '      I\'d write with the rest of the world if I think it might help someone out.  Hopefully I pop up in' . "\n";
            echo '      someone\'s frustrated twelve thousandth Google search and save the day every once in awhile.' . "\n";
         }  
      
         elseif ($cat == 'Technology')  
         {
            echo '      <h1>' . $cat . '</h1>' . "\n"; 
            echo '      <br>' . "\n";
            echo '      <a onClick = "javascript:window.open(\'../images/cattechb.jpg\', \'popup\', \'height = 660, width = 1000\');" style = "cursor: pointer;">' . "\n";
            echo '      <img src = "../images/cattech.jpg" alt = "Technology" title = "Big Rubik\'s Cube = Technology" style = "float: left; padding: 10px;">' . "\n";
            echo '      </a>' . "\n";
            echo '      <p>' . "\n";
            echo '      Seeing as I\'m an electrical engineering student, some of my interests are in technology.  Here you\'ll' . "\n";
            echo '      find all my posts about gadgets, computers, video games, etc.  Sometimes I like to review stuff I' . "\n";
            echo '      have experience with, sometimes I like to salivate over up and coming stuff, and sometimes I like to' . "\n";
            echo '      complain about how the industry is spiraling to its doom.  It\'s all here.' . "\n";
         }
         
         elseif ($cat == 'Travel')  
         {
            echo '      <h1>' . $cat . '</h1>' . "\n"; 
            echo '     <br>' . "\n";
            echo '     <a onClick = "javascript:window.open(\'../images/cattravelb.jpg\', \'popup\', \'height = 660, width = 1000\');" style = "cursor: pointer;">' . "\n";
            echo '     <img src = "../images/cattravel.jpg" alt = "Travel" title = "Me near Manta, Ecuador" style = "float: left; padding: 10px;">' . "\n";
            echo '     </a>' . "\n";
            echo '     <p>' . "\n";
            echo '     My summer trip to Ecuador has made me decide that I really like travel.  This category currently consists' . "\n";
            echo '     mainly of all my entries during that trip, but I would like to do a lot more traveling whenever possible and' . "\n";
            echo '     anything I have to say during these potential trips will go here also.  Even if for awhile it is only in' . "\n";
            echo '     the general vicinity of my two homebases, Ann Arbor and Las Vegas.' . "\n";
         }      
         
         elseif ($cat == 'Websites')  
         {
            echo '      <h1>' . $cat . '</h1>' . "\n"; 
            echo '      <br>' . "\n";
            echo '      <a onClick = "javascript:window.open(\'../images/catwebb.jpg\', \'popup\', \'height = 660, width = 1000\');" style = "cursor: pointer;">' . "\n";
            echo '      <img src = "../images/catweb.jpg" alt = "Websites" title = "Website making machine" style = "float: left; padding: 10px;">' . "\n";
            echo '      </a>' . "\n";
            echo '      <p>' . "\n";
            echo '      I write a good amount of websites.  Whether it\'s for either of the two web design jobs I had this summer' . "\n";
            echo '      in Ecuador, the student organization/revolution' . "\n";
            echo '      <a href = "http://www.turkiball.com">Turkiball</a>' . "\n";
            echo '      , or the company I started last summer called' . "\n";
            echo '      <a href = "http://www.theelectronicshandyman.com">The Electronics Handyman</a>, I\'m always working on' . "\n"; 
            echo '      something related to web design and coding.  And that\'s not to mention the many sites I\'ve created on my' . "\n";
            echo '      own, such as' . "\n";
            echo '      <a href = "http://www.markupcartoons.com">Markup Cartoons</a>,' . "\n";
            echo '      <a href = "http://www.asquaredforum.com">asquaredforum</a>,' . "\n";
            echo '      the blog you\'re visiting right now, or a thousand ideas and drafts that never made it to a server.  Yet...' . "\n";
            echo '      But anyways, here I post updates, ideas, and news about anything having to do with web design.' . "\n";
         }
         
         elseif ($cat == 'Works')  
         {
            echo '      <h1>' . $cat . '</h1>' . "\n"; 
            echo '      <br>' . "\n";
            echo '      <a onClick = "javascript:window.open(\'../images/catworksb.jpg\', \'popup\', \'height = 660, width = 1000\');" style = "cursor: pointer;">' . "\n";
            echo '      <img src = "../images/catworks.jpg" alt = "Websites" title = "The Domestication of the Horse" style = "float: left; padding: 10px;">' . "\n";
            echo '      </a>' . "\n";
            echo '      <p>' . "\n";
            echo '      Here in the Works section I put everything that I create and want to show to the world.
                        This mainly consists of <a href = "http://www.gimp.org">GIMP</a> drawings and cartoons, but
                        may grow to include other things.</p>' . "\n;";
         }
         elseif ($cat == 'all')
            echo '      <br>' . "\n";
            
         else         
            echo 'ERROR: Variable $cat contains invalid value.' . "\n";
         
         if ($cat != 'all')
         {
            echo '      </p>' . "\n"; 
            echo '      <br clear="all">' . "\n"; 
            echo '      <p>' . "\n"; 
            echo '      All recent posts in this category are now in the bar to the right, the' . "\n"; 
            echo '      <a href = "archive.php">Archive</a>' . "\n"; 
            echo '      has a list of every post made here, or just start from the beginning or end of them all using the nav' . "\n"; 
            echo '      buttons down at the bottom.' . "\n";             
            echo '      </p>' . "\n"; 
            echo "      <br><br><br><br>\n";
         }
      }
      // Post an entry
      if ($num == 0)
      {
         $entry = getrows($cat);
         
         if ($cat != 'all')
         {
            // So we have the number of the entry in its given category
            // But we need its number overall.
            // Let's cycle through entries, when we hit a category match then count, when we reach $entry, read number.  Bam.
            $count = 0;
            while (($countCat < $entry) && ($count <= getrows("all")))
            {
               $DATA = getdb($count);
               
               if ($DATA['Category'] == $cat)
                  $countCat++;
                  
               $count++;   
            }
            $DATA = getdb($DATA['Number']);
            $entry = $DATA['Number'];
         }         
      }
      else
         $entry = $num;
      
      $DATA = getdb($entry);
      $Date = datechange(datemachum($DATA['Date']));
      
      echo "      <h1> <a href = \"http://www.justinmccandless.com/entries/" . $entry . ".php\">" . $DATA['Title'] . "</a> </h1>\n";
      echo "      <font style = \"font-size: 11pt;\">Category: <a href = \"http://www.justinmccandless.com/";
      echo decap($DATA['Category']);
      echo "/index.php\">";
      echo $DATA['Category'] . "</a></font><br><br>\n";
      echo $DATA['Entry'] . "\n";   
      echo "      <br><h6> Posted $Date </h6>\n";
   }
         
   echo "      <br><br><br>\n";
   echo "   </div>\n";

   // Now the footer
   $num = $DATA['Number'];
   $rows = getrows('all');	
   
   if ($cat != 'all')
   {
      // Find prevnum.  Cycle through all previous entries, if there is one in your category, that's it.
      $prevnum = 0;
      $count = $num - 1;
      while (($count >= 0) && !$prevnum)
      {
         $DATA = getdb($count);
         if ($DATA['Category'] == $cat)
            $prevnum = $count;      
         
         $count--;
      }
   
      // Find nextnum.  Cycle through all newer entries, if there is one in your category, that's it.
      $nextnum = 0;
      $count = $num + 1;
      while (($count <= $rows) && !$nextnum)
      {
         $DATA = getdb($count);
         if ($DATA['Category'] == $cat)
            $nextnum = $count;      
      
         $count++;
      }   
   
      $catLink = decap($cat) . "/";   
   }
   else
   {  $prevnum = $num - 1;
      $nextnum = $num + 1;
   }
    
   if (($num == 1) || ($type == 'cv') || ($type == 'links') || ($type == 'archive') || ($type == 'index') || ($prevnum == 0))
      $prev = "<!-- No previous, this is the oldest post or doesn't need nav-->";
   else
      $prev = "<a href = \"http://www.justinmccandless.com/" . $catLink . "index.php?entry=" . $prevnum . "\">Older Post</a>\n";

   if (($num == $rows) || ($type == 'cv') || ($type == 'links') || ($type == 'archive') || ($type == 'index') || ($nextnum == 0))
      $next = "<!-- No next, this is the newest post or doesn't need nav -->";
   else
      $next = "<a href = \"http://www.justinmccandless.com/" . $catLink . "index.php?entry=" . $nextnum . "\">Newer Post</a>\n";     
      
   echo "<div class = \"footer\">\n";																					// Footer nav
   echo "<div class = \"prev\">\n";
   echo $prev;
   echo "</div>\n";
   echo "<div class = \"next\">\n";
   echo $next;
   echo "</div>\n";

   if (($type == 'archive') || ($type == 'cv') || ($type == 'links') || ($type == 'index'))
      $wyear = date("Y");
   else
   {  $wyear = substr(datemachum($DATA['Date']),6,2);																					// Echoes the footer date as when the post was made
      $wyear = "20" . $wyear;
   }
      
   echo "<div class = \"footerline\">\n";																				// Footer Sig      
   echo "<h3> Justin McCandless, ";
   echo $wyear;
   echo " </h3>\n";
   echo "</div>\n";
   echo "<br><br><br>\n";
   
   echo '<script type="text/javascript"><!-- Google Analytics -->' . "\n";
   echo 'var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");' . "\n";
   echo 'document.write(unescape("%3Cscript src=\'" + gaJsHost + "google-analytics.com/ga.js\' type=\'text/javascript\'%3E%3C/script%3E"));' . "\n";
   echo '</script>' . "\n";
   echo '<script type="text/javascript">' . "\n";
   echo 'try {' . "\n";
   echo 'var pageTracker = _gat._getTracker("UA-10096632-2");' . "\n";
   echo 'pageTracker._trackPageview();' . "\n";
   echo '} catch(err) {}</script><!-- End Google Analytics -->' . "\n";
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
{  global $db_host, $db_user, $db_password, $db_database;
   $con = mysql_connect($db_host, $db_user, $db_password);

   if (!$con)
   {
      die('Could not connect: ' . mysql_error());
   }
   mysql_select_db($db_database);
   $QUERY = mysql_query("SELECT * FROM Entries WHERE Number = $row");
   $DATA = mysql_fetch_array($QUERY);

   mysql_close($con);
   
   return ($DATA);
}

function getrows ($cat)																																// Returns the total number of rows in the database
{  global $db_host, $db_user, $db_password, $db_database;																						   // Or the number of entries of a specific category
   $con = mysql_connect($db_host, $db_user, $db_password);
   if (!$con)
   {
      die('Could not connect: ' . mysql_error());
   }
   mysql_select_db($db_database);
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

function datemachum ($machine)																													// Takes an atom formatted date and turns it
{																																							// into a nice dd/mm/yy formatted date
   $yy = substr($machine, 2, 2);
   $mm = substr($machine, 5, 2);
   $dd = substr($machine, 8, 2); 

   $human = $dd . "/" . $mm . "/" . $yy;
   
   return ($human);
}


function datechange ($ndate)																														// Changes a date of the rss/ atom format to
{																																								//	the full day month year format\
   $nday = substr($ndate,0,2);
   $nmonth = substr($ndate,3,2);
   $nyear = substr($ndate,6,2);

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
         if ($cat != 'all')
            $catl = decap($cat) . "/";
         else
            $catl = "";
            
         echo datemachum($DATA['Date']);
         echo "\n";
         echo "<h2><a href = \"";
         echo "http://www.justinmccandless.com/" . $catl . "index.php?entry=" . $DATA['Number'];
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

function removehtml($text)																																// Removes all html tags from the input, as well as &nbsp;, and replaces accented characters
{																																								// Used for the feeds, which can't have html
   $text = " " . $text;																		// Prevents the whole html at first character returning a 0 problem.   
   $gow = 1;
   while ($gow)
   {
      $gof = 1;   
      $here = strpos($text, "<");
      if (!$here)
      {  $gow = 0;
         $gof = 0;
      }
      for ($i = $here; (($gof) && ($i < strlen($text))); $i++)
      {
         if (substr($text, $i, 1) == '>')
         {
            $text = substr($text, 0, $here) . substr($text, ($i + 1), strlen($text));
            $gof = 0;
         }
         else
         {  $gof = 1;
         }
      }
   }

   $text = str_replace("&nbsp;", "", $text);							// And gets rid of &nbsp;
   $text = str_replace("&aacute;", "á", $text);							// And fixes characters
   $text = str_replace("&Aacute;", "Á", $text);							// And fixes characters
   $text = str_replace("&eacute;", "é", $text);							// And fixes characters
   $text = str_replace("&Eacute;", "É", $text);							// And fixes characters
   $text = str_replace("&iacute;", "í", $text);							// And fixes characters
   $text = str_replace("&Iacute;", "Í", $text);							// And fixes characters
   $text = str_replace("&oacute;", "ó", $text);							// And fixes characters
   $text = str_replace("&Oacute;", "Ó", $text);							// And fixes characters
   $text = str_replace("&uacute;", "ú", $text);							// And fixes characters
   $text = str_replace("&Uacute;", "Ú", $text);							// And fixes characters
   $text = str_replace("&ntilde;", "ñ", $text);							// And fixes characters
   $text = str_replace("&Ntilde;", "Ñ", $text);							// And fixes characters
   $text = str_replace("&uuml;", "ü", $text);							// And fixes characters
   $text = str_replace("&Uuml;", "Ü", $text);							// And fixes characters
   $text = str_replace("&iexcl;", "¡", $text);							// And fixes characters
   $text = str_replace("&iquest;", "¿", $text);							// And fixes characters
   $text = str_replace("&ldquo;", "\"", $text);							// And fixes characters
   $text = str_replace("&rdquo;", "\"", $text);							// And fixes characters
   $text = str_replace("&ndash;", "-", $text);							// And fixes characters
   $text = str_replace("Ã", "í", $text);
 
   return($text);
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
         $cat = $DATA['Category'];
      }
      else
      {  $title = "";
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
      echo "Entry:<br><br>\n";
      echo "<textarea id=\"MyTextarea\" name=\"MyTextarea\" rows=\"15\" cols=\"80\" style=\"width: 80%\">";
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

      $html = $_POST["MyTextarea"];
      // For whatever reason, I'm not having the murderous apostrophe error I had
      // with Arcoiris.  So I omitted the fix for that.  But watch out.
      $action = $_POST["action"];
      $num = $_POST["num"];
      $title = $_POST["title"];
      //date_default_timezone_set('UTC');
      $date = date("Y-m-d") . "T" . date("H:i:s") . "Z";
      $cat = $_POST["category"];
      
      $QUERY = mysql_query("SELECT * FROM Entries");
      $rows = mysql_num_rows($QUERY);
		$number = $rows + 1;
		$address = "http://www.justinmccandless.com/entries/" . $number . ".php";
		
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
         {     
            $sql = "INSERT INTO `db1064984_Entries`.`Entries` (`Index`, `Number`, `Address`, `Title`, `Date`, `Updated`, `Category`, `Entry`) VALUES ('$rows', '$number', '$address', '$title', '$date', '$date', '$cat', '$html');";
            if (!mysql_query($sql,$con))
            {  die('Error: ' . mysql_error());
            }                    
         }
         else																																	// If we're updating
         {  mysql_query("UPDATE Entries SET Entry = '$html' WHERE Number = '$num'");
            mysql_query("UPDATE Entries SET Title = '$title' WHERE Number = '$num'");
            mysql_query("UPDATE Entries SET Category = '$cat' WHERE Number = '$num'");
            mysql_query("UPDATE Entries SET Updated = '$date' WHERE Number = '$num'");
         }
      }
      
      mysql_close($con);
      
      atom($cat);
      rss($cat);
      
      echo "<h3> Update Received </h3><br><br><br><br>";
   }
}

function atom ($cat)																				// Updates the atom feed for a given category (not yet, just all)
{
   $entriesper = 12;																	// The max number of entries in the feed at any given time

   $name = "atom";
   $title = "Español";
   $dir = "http://www.justinmccandless.com/entries/";
   
   $filename = "../feeds/" . $name . ".xml";
   //date_default_timezone_set('UTC');
   $time = date("Y-m-d") . "T" . date("H:i:s") . "Z";
   
   $fh = fopen($filename, 'w') or die("can't open file");

   fwrite ($fh, "<?xml version=\"1.0\" encoding=\"UTF-8\" standalone=\"yes\"?>\n\n");
   fwrite ($fh, "<feed xmlns=\"http://www.w3.org/2005/Atom\">\n\n");
   fwrite ($fh, "   <id>http://www.acroiris.org.ec/feeds/" . $name . ".xml</id>\n");
   fwrite ($fh, "   <title>justinmccandless.com All Categories Atom</title>\n");
   fwrite ($fh , "   <updated>" . $time . "</updated>\n");
   fwrite ($fh , "   <link rel=\"self\" href=\"http://www.justinmccandless.com/feeds/" . $name . ".xml\" type=\"application/atom+xml\" />\n\n");
   
   fwrite ($fh , "   <author>\n");
   fwrite ($fh , "      <name>Justin John McCandless</name>\n");
   fwrite ($fh , "      <uri>http://www.justinmccandless.com/</uri>\n");
   fwrite ($fh , "      <email>justin@justinmccandless.com</email>\n");
   fwrite ($fh , "   </author>\n\n");
   
   $rows = getrows('all');
   for (($i = $rows); (($i > ($rows - $entriesper)) && ($i > 0)); $i--)
   {
      $DATA = getdb($i);
	   
	   fwrite ($fh , "   <entry>\n");
      fwrite ($fh , "      <title>" . $DATA['Title'] . "</title>\n");
      fwrite ($fh , "      <category term=\"" . $DATA['Category'] . "\"/>\n");
      fwrite ($fh , "      <id>" . $dir . $i . ".php</id>\n");
      fwrite ($fh , "      <published>" . $DATA['Date'] . "</published>\n");
      fwrite ($fh , "      <updated>" . $DATA['Updated'] . "</updated>\n");
      fwrite ($fh , "      <link href=\"" . $dir . $i . ".php\"/>\n");
      fwrite ($fh , "      <summary>Posted in " . $DATA['Category'] . " on " . datemachum($DATA['Date']) . "</summary>\n");
      fwrite ($fh , "      <content>\n");
      fwrite ($fh , "         " . removehtml($DATA['Entry']) . "\n");
      fwrite ($fh , "      </content>\n");
      fwrite ($fh , "   </entry>\n\n");
      fwrite ($fh , "   \n\n");
   }
   
   fwrite ($fh , "</feed>\n");
   
   fclose($fh);
}

function rss ($cat)																				// Updates the rss feed for a given category (not yet)
{
   $entriesper = 12;																// The max number of entries in the feed at any given time
   
   $name = "rss";
   $title = "Español";
   $dir = "http://www.justinmccandless.com/entries/";
   $filename = "../feeds/". $name . ".xml";
  
   $fh = fopen($filename, 'w') or die("can't open file");
   
   fwrite ($fh, "<?xml version=\"1.0\" encoding=\"UTF-8\" ?>\n");
   fwrite ($fh, "<rss version=\"2.0\" xmlns:atom=\"http://www.w3.org/2005/Atom\">\n\n");
   fwrite ($fh, "<channel>\n");
   fwrite ($fh, "   <title>justinmccandless.com RSS Feed</title>\n");
   fwrite ($fh, "   <link>http://www.justinmccandless.com/</link>\n");
   fwrite ($fh, "   <atom:link href=\"http://www.justinmccandless.com/feeds/" . $name . ".xml\" rel=\"self\" type=\"application/rss+xml\" />\n");
   fwrite ($fh, "   <description>justinmccandless.com All Categories Feed</description>\n\n");
   
   $rows = getrows('all');
   for (($i = $rows); (($i > ($rows - $entriesper)) && ($i > 0)); $i--)
   {
      $DATA = getdb($i);
      
      fwrite ($fh, "   <item>\n");
      fwrite ($fh, "      <title>" . $DATA['Title'] . "</title>\n");
      fwrite ($fh, "      <guid>" . $dir . $i . ".php</guid>\n");
      fwrite ($fh, "      <link>" . $dir . $i . ".php</link>\n");
      fwrite ($fh, "      <description>\n");
      fwrite ($fh, "         " . removehtml($DATA['Entry']) . "\n");
      fwrite ($fh, "      </description>\n");
      fwrite ($fh, "   </item>\n\n");
   }
   
   fwrite ($fh, "</channel>\n\n");
   fwrite ($fh, "</rss>\n");
   
   fclose($fh);
}




?>
// All the javascript functions for the site!
// Doesn't work right now cuz I can't flippin' call a fn correctly

// Preloads the mouseover nav images
function preloadNav ()
{
   home= new Image(125,35);
   home.src="http://www.justinmccandless.com/images/homeo.jpg";
   archive= new Image(125,35);
   archive.src="http://www.justinmccandless.com/images/archiveo.jpg";
   aboutme= new Image(125,35);
   aboutme.src="http://www.justinmccandless.com/images/aboutmeo.jpg";
   links= new Image(125,35);
   links.src="http://www.justinmccandless.com/images/linkso.jpg";
}

// Writes the title image, linked to the homepage
function title()
{
   picturea = new Array(3);
   pictureimg = new Array(3);

   picturea[0] = "<a href = \"http://www.justinmccandless.com/index.php\" onmouseover = \"document.but.src = \'http://www.justinmccandless.com/images/titles/title0bg.jpg\'\" onmouseout = \"document.but.src = \'http://www.justinmccandless.com/images/titles/title0.jpg\'\">";
   pictureimg[0] = "<img src = \"http://www.justinmccandless.com/images/titles/title0.jpg\" name = \"but\" border = \"0\" alt = \"Justin McCandless\" title = \"Ann Arbor, Michigan\"></a>";
   picturea[1] = "<a href = \"http://www.justinmccandless.com/index.php\" onmouseover = \"document.but.src = \'http://www.justinmccandless.com/images/titles/title1bg.jpg\'\" onmouseout = \"document.but.src = \'http://www.justinmccandless.com/images/titles/title1.jpg\'\">";
   pictureimg[1] = "<img src = \"http://www.justinmccandless.com/images/titles/title1.jpg\" name = \"but\" border = \"0\" alt = \"Justin McCandless\" title = \"Las Vegas, Nevada\"></a>";
   picturea[2] = "<a href = \"http://www.justinmccandless.com/index.php\" onmouseover = \"document.but.src = \'http://www.justinmccandless.com/images/titles/title2bg.jpg\'\" onmouseout = \"document.but.src = \'http://www.justinmccandless.com/images/titles/title2.jpg\'\">";
   pictureimg[2] = "<img src = \"http://www.justinmccandless.com/images/titles/title2.jpg\" name = \"but\" border = \"0\" alt = \"Justin McCandless\" title = \"Ba&ntilde;os de Ambato, Ecuador\"></a>";

   showme = Math.floor(Math.random() * picturea.length);

   title= new Image(600,100);																		// Preload the mouseout image
   title.src="http://www.justinmccandless.com/images/titles/title" . showme . "bg.jpg"; 

   document.write(picturea[showme]);
   document.write(pictureimg[showme]);
}   

function test()
{
   document.write("I came from a javascript funciton.<br>");
}
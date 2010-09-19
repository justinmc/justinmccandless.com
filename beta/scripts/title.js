  picturea = new Array(3);
pictureimg = new Array(3);

picturea[0] = "<a href = \"index.php\" onmouseover = \"document.but.src = \'images/titles/title0bg.jpg\'\" onmouseout = \"document.but.src = \'images/titles/title0.jpg\'\">";
pictureimg[0] = "<img src = \"images/titles/title0.jpg\" name = \"but\" border = \"0\" alt = \"Justin McCandless\" title = \"Ann Arbor, Michigan\"></a>";
picturea[1] = "<a href = \"index.php\" onmouseover = \"document.but.src = \'images/titles/title1bg.jpg\'\" onmouseout = \"document.but.src = \'images/titles/title1.jpg\'\">";
pictureimg[1] = "<img src = \"images/titles/title1.jpg\" name = \"but\" border = \"0\" alt = \"Justin McCandless\" title = \"Las Vegas, Nevada\"></a>";
picturea[2] = "<a href = \"index.php\" onmouseover = \"document.but.src = \'images/titles/title2bg.jpg\'\" onmouseout = \"document.but.src = \'images/titles/title2.jpg\'\">";
pictureimg[2] = "<img src = \"images/titles/title2.jpg\" name = \"but\" border = \"0\" alt = \"Justin McCandless\" title = \"Ba&ntilde;os de Ambato, Ecuador\"></a>";

showme = Math.floor(Math.random() * picturea.length);

document.write(picturea[showme]);
document.write(pictureimg[showme]);

<a href="http://www.justinmccandless.com/index.php" 
   onmouseover="image1.src='http://www.justinmccandless.com/images/homeo.jpg';"
   onmouseout="image1.src='http://www.justinmccandless.com/images/home.jpg';">
<img name="image1" src="http://www.justinmccandless.com/images/home.jpg" border=0></a>

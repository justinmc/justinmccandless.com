picturea = new Array(2);
pictureimg = new Array(2);

picturea[0] = "<a href = \"../index.php\" onmouseover = \"document.but.src = \'../images/titles/title0bg.jpg\'\" onmouseout = \"document.but.src = \'../images/titles/title0.jpg\'\">";
pictureimg[0] = "<img src = \"../images/titles/title0.jpg\" name = \"but\" border = \"0\" alt = \"Justin McCandless\" title = \"Ann Arbor, Michigan\"></a>";
picturea[1] = "<a href = \"../index.php\" onmouseover = \"document.but.src = \'../images/titles/title1bg.jpg\'\" onmouseout = \"document.but.src = \'../images/titles/title1.jpg\'\">";
pictureimg[1] = "<img src = \"../images/titles/title1.jpg\" name = \"but\" border = \"0\" alt = \"Justin McCandless\" title = \"Las Vegas, Nevada\"></a>";
picturea[2] = "<a href = \"index.php\" onmouseover = \"document.but.src = \'../images/titles/title2bg.jpg\'\" onmouseout = \"document.but.src = \'../images/titles/title2.jpg\'\">";
pictureimg[2] = "<img src = \"../images/titles/title2.jpg\" name = \"but\" border = \"0\" alt = \"Justin McCandless\" title = \"Ba&ntilde;os de Ambato, Ecuador\"></a>";

showme = Math.floor(Math.random() * picturea.length);

document.write(picturea[showme]);
document.write(pictureimg[showme]);
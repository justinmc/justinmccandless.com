









   picturea = new Array(3);
   pictureimg = new Array(3);
   
   showme = Math.floor(Math.random() * picturea.length);


   image= new Image(600,100);																		// Preload
   image.src="http://www.justinmccandless.com/images/titles/title" + showme + ".jpg";
   imagefile = image.src;
   imagebg= new Image(600,100);
   imagebg.src="http://www.justinmccandless.com/images/titles/title" + showme + "bg.jpg";
   imagebgfile = imagebg.src;

   document.write("<a href = \"http://www.justinmccandless.com/index.php\" onmouseover = \"document.but.src = \'" + imagebgfile + "\'\" onmouseout = \"document.but.src = \'" + image + "\'\">");
   document.write("<img src = \"" + imagefile + "\" name = \"but\" border = \"0\" alt = \"Justin McCandless\" title = \"Ann Arbor, Michigan\"></a>");
// This is functions.h
// It's a header file for all the functions in functions.php.  Right now it's just for organization; no code uses it.
// I don't know if anybody does this with php, but I'll find out next time I have internets.
// Go:

$type gettype($filename, $cat)
// EFFECT: 		Looks at the filename to see what type of file it is (entry, archive, catindex, aboutme, links) 
// RETURNS:		The type
// MODIFIES:	Nothing

$filename getname($filename)
// EFFECT: 		Gets the 'name' of the file 
// RETURNS:		Everything between the last slash and the file extension
// MODIFIES:	Nothing

void doctype()
// EFFECT: 		Echoes the doctype
// RETURNS:		Nothing
// MODIFIES:	Output stream 

void head($cat)
// EFFECT: 		Echoes everything b/t the <head> tags
// RETURNS:		Nothing
// MODIFIES:	Output stream 

$cat getcat($filename)
// EFFECT: 		Looks at the filename to see what category you're in 
// RETURNS:		The category, capitalized
// MODIFIES:	Nothing

void titlenav($cat)
// EFFECT: 		Echoes the titlenav div, and also opens the all div before it 
// RETURNS:		Nothing
// MODIFIES:	Output Stream

void news($cat)
// EFFECT: 		Echoes the news div and all in it.  Uses the news fn too. 
// RETURNS:		Nothing
// MODIFIES:	Output Stream

void content($type, $cat, $filename)
// EFFECT: 		Echoes the content for any type of page.  It's huge.  Includes footer nav stuff now.
// RETURNS:		Nothing
// MODIFIES:	Output stream

void index($num)
// EFFECT:		Echoes in the entry for the homepage.
// RETURNS:		Nothing
// MODIFIES:	Output stream	 

void entry($num)
// EFFECT: 		Echoes the entry on entry pages
// RETURNS:		Nothing
// MODIFIES:	Output stream

void entrycat($cat, $num)
// EFFECT: 		Echoes in the entry on category pages.  Note when num = 1 the oldest entry is echoed.
// RETURNS:		Nothing.
// MODIFIES:	Output stream

$DATA getdb($row)
// EFFECT: 		Accesses the database at a given row.
// RETURNS:		A variable containing all data in the database at the given row.
// MODIFIES:	Nothing

$rows getrows($cat)
// EFFECT: 		Gets the number of rows of the given category, or in the whole table if passed 'all'
// RETURNS:		The number of rows
// MODIFIES:	Nothing

$wdate datechange($num)
// EFFECT:		Given a date of the format dd/mm/yy or dd-mm-yy...
// RETURNS:		A string representing the date in full written out format (day month year)
// MODIFIES:	Nothing

$lcat decap($cat)
// EFFECT:		Given a string containing the name of one of the categories with the first letter capitalized...
// RETURNS:		A string containing the name of the given category with the first letter lowercase (for links)
// MODIFIES:	Nothing

void getnews($cat)
// EFFECT:		Echoes out the 8 newest news items with dates and dividers from a given category, or overall if passed 'all'
// RETURNS:		Nothing
// MODIFIES:	Output stream

void getnavprev($num)
// EFFECT:		Echoes out the correct output for the previous nav div, given the entry on the page.  If the entry is the oldest,
//					echoes a commented out statement.  Otherwise, echoes 'Older Post' linked to the next oldest item 		
// RETURNS:		Nothing
// MODIFIES:	Output Stream

void getnavprevindex($num)
// EFFECT:		Same as getnavprev, but for the homepage.  Link is different.
// RETURNS:		Nothing
// MODIFIES:	Output stream

void getnavnext($num)
// EFFECT:		Same as getnavprev, but for the next newest post
// RETURNS:		Nothing
// MODIFIES:	Output stream

void update($stage)
// EFFECT:		Complex.  Echoes the correct stage of the update process into update/index.php. 
// RETURNS:		Nothing
// MODIFIES:	Output stream

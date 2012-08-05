/***************************************************************************
Rank
HTML Form Rank Selector
Justin McCandless
www.justinmccandless.com
***************************************************************************/

// Settings
var speed = 0.5 * 1000; // how long each transition is, milliseconds

$(document).ready(
function()
{
	// initialize
	var distance = $(".rankElement").css("height");
	distance = parseFloat(distance.substr(0,(distance.length - 2))) + 9; // distance to move when changing rank
	var ranksIds = new Array();
	var idsRanks = new Array();
	var idsPoss = new Array();
	for (var i = 0; i < $(".rankElement").length; i++)
	{	ranksIds[i] = i;
		idsRanks[i] = i;
		idsPoss[i] = 0;

		// initialize the form input values in case the browser cached them
		$("input[name='"+i+"']").attr("value",idsRanks[i]);
		$("font.rankDisp#el"+i).html(i+1);
	}

	// Connect the up/down buttons to their functions
    $(".up").on("click",function(){rankChange(1, $(this).parent(), distance, ranksIds, idsRanks, idsPoss)});
    $(".down").on("click",function(){rankChange(-1, $(this).parent(), distance, ranksIds, idsRanks, idsPoss)});
}
);

function rankChange(dir, element, distance, ranksIds, idsRanks, idsPoss)
{
	var id = $(element).attr("id");
	id = parseFloat(id.substring(2,id.length));	// remove the "el"
	var idDisp = parseFloat(ranksIds[idsRanks[id] - dir]);
	distance = distance * dir;

	// if we're not trying to move it too high/low
	if (((idsRanks[id] < (ranksIds.length - 1)) && (dir == -1)) || ((idsRanks[id] > 0) && (dir == 1)))
	{	// move the clicked one down in the variables
		idsRanks[id] = idsRanks[id] - dir;
		ranksIds[idsRanks[id]] = id;
		idsPoss[id] = idsPoss[id] - distance;

		// move the displaced one up in the variables		
		idsRanks[idDisp] = idsRanks[id] + dir;
		ranksIds[idsRanks[id] + dir] = idDisp;
		idsPoss[idDisp] = idsPoss[idDisp] + distance;

		// change the form input values
		$("input[name='"+id+"']").attr("value",idsRanks[id]);
		$("input[name='"+idDisp+"']").attr("value",idsRanks[idDisp]);

		// change the rank display number
		$("font.rankDisp#el"+id).html(idsRanks[id]+1);
		$("font.rankDisp#el"+idDisp).html(idsRanks[idDisp]+1);

		// move them physically
		$(".rankElement#el"+id).animate({top:idsPoss[id]+"px"},speed);
    	$(".rankElement#el"+idDisp).animate({top:idsPoss[idDisp]+"px"},speed);
	}
}


/* Todo

test for more guys
	check if you really need an id for each up/down button?

*/


$(document).ready(function () {
    	$('a[data-confirm-link]').click(function () {
    		if (confirm($(this).data('confirm-link')))
    			window.location = $(this).attr('href');
    		return false;
    	});
    });

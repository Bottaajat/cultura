/*$(document).ready(function() {
	for (var j = 1; j < 4; j++) {
		$('#menu-' + j + '-toggle').click( function() {
			var iSelector = $(this).find('i:first');
			if (iSelector.hasClass('glyphicon-triangle-bottom')) {
				iSelector.removeClass('glyphicon-triangle-bottom')
				iSelector.addClass('glyphicon-triangle-top')
			} else if (iSelector.hasClass('glyphicon-triangle-top')) {
				iSelector.removeClass('glyphicon-triangle-top')
				iSelector.addClass('glyphicon-triangle-bottom')
			}
		});
	}
});*/
function playAudio(src) {
	document.getElementById("play").innerHTML="<embed src='"+src+"' autostart=false loop=false volume=100 hidden=true>";
	return true;
}
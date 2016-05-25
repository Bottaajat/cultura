$(document).ready(function(src){
	var audioElement = document.createElement('audio');
	audioElement.setAttribute('src', src);
	$.get();
	audio.Element.addEventListener("load", function() {
	audioElement.play();
	}, true);

	$('play').click(function() { 
	audioElement.play();
	});
});
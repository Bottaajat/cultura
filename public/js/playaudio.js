function playAudio(src) {
  elem = document.getElementById("play")
  if (elem != null) {
      if (elem.innerHTML.includes("embed src=\""+src+"\"")) {
        elem.parentNode.removeChild(elem);
        return false;
      }
  } else {
    var div = document.createElement("div");
    div.id = "play";
    document.body.appendChild(div);
  } 
  
  document.getElementById("play").innerHTML="<embed src='"+src+"' autostart=false loop=false volume=100 hidden=true>";
	return true;
} 
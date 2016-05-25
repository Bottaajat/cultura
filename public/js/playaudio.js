function playAudio(src,btn) {


  elem = document.getElementById("play")
  if (elem != null) {
      if (elem.innerHTML.includes("embed src=\""+src+"\"")) {
        elem.parentNode.removeChild(elem);
        btn.className = "btn btn-primary";
        return false;
      }
  } else {
    var div = document.createElement("div");
    div.id = "play";
    document.body.appendChild(div);
    btn.className = "btn btn-success";
  } 
  
  document.getElementById("play").innerHTML="<embed src='"+src+"' autostart=false loop=true volume=100 hidden=true>";
	return true;
} 
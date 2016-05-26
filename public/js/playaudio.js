function playAudio(src,btn) {

  // reset button colors
  var buttons = document.getElementsByTagName("button");
  for(var i = 0; i < buttons.length; i++){
    if (buttons[i].id == "soundbtn") {
       buttons[i].className = "btn btn-primary";
    }
  }
  
  
  elem = document.getElementById("play")
  if (elem != null) {
      if (elem.innerHTML.includes("src=\""+src+"\"")) {
        elem.parentNode.removeChild(elem);
        return false;
      }
  } 

  var div = document.createElement("div");
  div.id = "play";
  document.body.appendChild(div);
  btn.className = "btn btn-success";

  document.getElementById("play").innerHTML="<audio id=\"audio\" playcount=\"999\" loop src='"+src+"'> Selain ei tue äänitiedostoja </audio>";
	
	var audio = document.getElementById('audio');
	audio.play();
	return true;
} 
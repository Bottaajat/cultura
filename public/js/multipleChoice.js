function checkSolutions() {
  var corrects = 0;
  var questions = document.getElementsByClassName("radio");
  for(var i = 0; i <= questions.length; i++) {
    if(questions[i]) {
      var radio = questions[i].getElementsByTagName("input")[0];
      if(radio.checked === true) {
        if(radio.getAttribute('value') === 0) {
          radio.parentNode.parentNode.style.backgroundColor = "green";
          corrects = corrects + 1;
        } else {
          radio.parentNode.parentNode.style.backgroundColor = "red";
        }
      } else {
        radio.parentNode.parentNode.style.backgroundColor = "white";
      }
    }
  }
  if (corrects === 4) $("#success").modal() 
}
function checkSolutions() {

  var questions = document.getElementsByName("question");
  for(var i = 0; i <= questions.length; i++) {
    if(questions[i]) {
      var options = questions[i].getElementsByClassName("option");
      var checked = 0;
      var correctCount = 0;
      
      for(var j = 0; j <= options.length; j++) {
        if(options[j]) {
          var option = options[j];
          option.parentNode.parentNode.style.backgroundColor = "white";
          if (option.checked === true)
            checked = checked + 1;
          if (option.getAttribute('value')) 
            correctCount = correctCount + 1;
        }
      }
      if (checked < correctCount) {
        $("#tooFew").modal();
        return;
      } else if (checked > correctCount) {
        $("#tooMany").modal();
        return;
      }
    }
  }
  
  var options = document.getElementsByClassName("option");
  var corrects = 0;
  var correctCount = 0;
    
  for(var j = 0; j <= options.length; j++) {
    if(options[j]) {
      var option = options[j];
      option.parentNode.parentNode.style.backgroundColor = "white";
      if(option.getAttribute('value')) {
        correctCount = correctCount + 1;
        if(option.checked === true) {
          option.parentNode.parentNode.style.backgroundColor = "green";
          corrects = corrects + 1;
        } 
      } else if (option.checked === true) {
        option.parentNode.parentNode.style.backgroundColor = "red";
      } 
    }
  }

  if (corrects === correctCount) $("#success").modal();

}

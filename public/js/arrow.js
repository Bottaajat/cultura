$(document).ready(function() {

  $('#accordion').on('shown.bs.collapse', function (e) {
    changeIcon(e, true);
  })
  $('#accordion').on('hidden.bs.collapse', function (e) {
    changeIcon(e, false);
  })
  
  
  $('#collapseMat').on('shown.bs.collapse', function (e) {
    changeIcon(e, true);
  })
  $('#collapseMat').on('hidden.bs.collapse', function (e) {
    changeIcon(e, false);
  })
  
  
  $('#collapseExer').on('shown.bs.collapse', function (e) {
    changeIcon(e, true);
  })
  $('#collapseExer').on('hidden.bs.collapse', function (e) {
    changeIcon(e, false);
  })
  
});


function changeIcon(elem, isDown) {
  var panel = $(elem.target).parent().get(0);
  var icon = $(panel).find("#panelarrow").get(0);
  if (isDown) {
    icon.className = "glyphicon glyphicon-triangle-bottom pull-right"
  } else {
    icon.className = "glyphicon glyphicon-triangle-left pull-right"
  }
} 

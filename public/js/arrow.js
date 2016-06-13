$(document).ready(function() {

  for(var i = 1; i<3; i++) {
    $('#collapseTopic'+i).on('shown.bs.collapse', function (e) {
      changeIcon(e, true);
    })
    $('#collapseTopic'+i).on('hidden.bs.collapse', function (e) {
      changeIcon(e, false);
    })
  }


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

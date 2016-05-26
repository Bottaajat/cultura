$(document).ready(function() {

  // When expanded
  $('#accordion').on('shown.bs.collapse', function (e) {
    var panel = $(e.target).parent().get(0);
    var icon = $(panel).find("#panelarrow").get(0);
    icon.className = "glyphicon glyphicon-triangle-bottom pull-right"
  })

  // When collapsed
  $('#accordion').on('hidden.bs.collapse', function (e) {
    var panel = $(e.target).parent().get(0);
    var icon = $(panel).find("#panelarrow").get(0);
    icon.className = "glyphicon glyphicon-triangle-top pull-right"
  })
});

$('#form').submit(function() {
  $( "input:checked" )
});
$( "input" ).on( "click", function() {
  $( "#log" ).html( $( "input:checked" ).val() + " is checked!" );
});

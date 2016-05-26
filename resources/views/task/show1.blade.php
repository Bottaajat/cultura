@extends('layouts.master')

@section('content')

<div class="page-header">
	<h1>{{ $task->name }}</h1>
</div>

<style>
.droptarget {
    float: left; 
    width: 30px; 
    height: 30px;
    margin: 15px;
    padding: 10px;
    border: 1px solid #aaaaaa;
}
/* Add some margin to the page and set a default font and colour */
 
body {
  margin: 30px;
  font-family: "Georgia", serif;
  line-height: 1.8em;
  color: #333;
}
 
/* Give headings their own font */
 
h1, h2, h3, h4 {
  font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
}
 
/* Main content area */
 
#content {
  margin: 80px 70px;
  text-align: center;
  -moz-user-select: none;
  -webkit-user-select: none;
  user-select: none;
}
 
/* Header/footer boxes */
 
.wideBox {
  clear: both;
  text-align: center;
  margin: 70px;
  padding: 10px;
  background: #ebedf2;
  border: 1px solid #333;
}
 
.wideBox h1 {
  font-weight: bold;
  margin: 20px;
  color: #666;
  font-size: 1.5em;
}
 
/* Slots for final card positions */
 
#droppablearea {
  margin: 50px auto 0 auto;
  background: #ddf;
}
 
/* The initial pile of unsorted cards */
 
#draggablearea {
  margin: 0 auto;
  background: #ffd;
}
 
#droppablearea, #draggablearea {
  width: 910px;
  height: 120px;
  padding: 20px;
  border: 2px solid #333;
  -moz-border-radius: 10px;
  -webkit-border-radius: 10px;
  border-radius: 10px;
  -moz-box-shadow: 0 0 .3em rgba(0, 0, 0, .8);
  -webkit-box-shadow: 0 0 .3em rgba(0, 0, 0, .8);
  box-shadow: 0 0 .3em rgba(0, 0, 0, .8);
}
 
/* Individual cards and slots */
 
#droppablearea div, #draggablearea div {
  float: left;
  width: 58px;
  height: 78px;
  padding: 10px;
  padding-top: 40px;
  padding-bottom: 0;
  border: 2px solid #333;
  -moz-border-radius: 10px;
  -webkit-border-radius: 10px;
  border-radius: 10px;
  margin: 0 0 0 10px;
  background: #fff;
}
 
#droppablearea div:first-child, #draggablearea div:first-child {
  margin-left: 0;
}
 
#droppablearea div.hovered {
  background: #aaa;
}
 
#droppablearea div {
  border-style: dashed;
}
 
#draggablearea div {
  background: #666;
  color: #fff;
  font-size: 50px;
  text-shadow: 0 0 3px #000;
}
 
#draggablearea div.ui-draggable-dragging {
  -moz-box-shadow: 0 0 .5em rgba(0, 0, 0, .8);
  -webkit-box-shadow: 0 0 .5em rgba(0, 0, 0, .8);
  box-shadow: 0 0 .5em rgba(0, 0, 0, .8);
}
 
/* Individually coloured cards */
 
#card1.correct { background: red; }
#card2.correct { background: brown; }
#card3.correct { background: orange; }
#card4.correct { background: yellow; }
#card5.correct { background: green; }
#card6.correct { background: cyan; }
#card7.correct { background: blue; }
#card8.correct { background: indigo; }
#card9.correct { background: purple; }
#card10.correct { background: violet; }
 
 
/* "You did it!" message */
#successMessage {
  position: absolute;
  left: 580px;
  top: 250px;
  width: 0;
  height: 0;
  z-index: 100;
  background: #dfd;
  border: 2px solid #333;
  -moz-border-radius: 10px;
  -webkit-border-radius: 10px;
  border-radius: 10px;
  -moz-box-shadow: .3em .3em .5em rgba(0, 0, 0, .8);
  -webkit-box-shadow: .3em .3em .5em rgba(0, 0, 0, .8);
  box-shadow: .3em .3em .5em rgba(0, 0, 0, .8);
  padding: 20px;
}

</style>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.min.js"></script>
<script>
 
	var correctCards = 0;
	$( init );
	 
	function init() {
	 
	  // Hide the success message
	  $('#successMessage').hide();
	  $('#successMessage').css( {
		left: '580px',
		top: '250px',
		width: 0,
		height: 0
	  } );
	 
	  // Reset the game
	  correctCards = 0;
	  $('#draggablearea').html( '' );
	  $('#droppablearea').html( '' );
	 
	  // Create the pile of shuffled cards
	  var letters = [ 'А а', 'Б б', 'В в', 'Г г', 'Д д', 'Е е', 'Ё ё', 'Ж ж', 'З з', 'И и' ];
	  letters.sort( function() { return Math.random() - .5 } );
	 
	  for ( var i=0; i<10; i++ ) {
		$('<div>' + letters[i] + '</div>').data( 'letter', letters[i] ).attr( 'id', 'card'+letters[i] ).appendTo( '#draggablearea' ).draggable( {
		  containment: '#content',
		  stack: '#draggablearea div',
		  cursor: 'move',
		  revert: true
		} );
	  }
	 
	  // Create the card slots
	  var words = [ 'A a', 'B b', 'C c', 'D d', 'E e', 'F f', 'G g', 'H h', 'I i', 'J j' ];
	  for ( var i=1; i<=10; i++ ) {
		$('<div>' + words[i-1] + '</div>').data( 'words', i ).appendTo( '#droppablearea' ).droppable( {
		  accept: '#draggablearea div',
		  hoverClass: 'hovered',
		  drop: handleCardDrop
		} );
	  }
	 
	}
	
	function handleCardDrop( event, ui ) {
	  var slotNumber = $(this).data( 'words' );
	  var cardNumber = ui.draggable.data( 'letter' );
	 
	  // If the card was dropped to the correct slot,
	  // change the card colour, position it directly
	  // on top of the slot, and prevent it being dragged
	  // again
	 
	  if ( slotNumber == cardNumber ) {
		ui.draggable.addClass( 'correct' );
		ui.draggable.draggable( 'disable' );
		$(this).droppable( 'disable' );
		ui.draggable.position( { of: $(this), my: 'left top', at: 'left top' } );
		ui.draggable.draggable( 'option', 'revert', false );
		correctCards++;
	  } 
	   
	  // If all the cards have been placed correctly then display a message
	  // and reset the cards for another go
	 
	  if ( correctCards == 10 ) {
		$('#successMessage').show();
		$('#successMessage').animate( {
		  left: '380px',
		  top: '200px',
		  width: '400px',
		  height: '100px',
		  opacity: 1
		} );
	  }
	 
	}
 
</script>

<div id="content">
 
  <div id="droppablearea"> </div>
  <div id="draggablearea"> </div>
 
  <div id="successMessage">
    <h2>You did it!</h2>
    <button onclick="init()">Play Again</button>
  </div>
 
</div>

<div class="panel panel-default">
	<div class="panel-heading">
		<div class="panel-title">{{$task->type}}</div>
	</div>
	<div class="panel-body">
		<div class="droppablearea">
			<!--
			<div class="droptarget" ondrop="drop(event)" ondragover="allowDrop(event)" id="droptarget-a" data-target="a">
			
			</div>
			
			<div class="droptarget" ondrop="drop(event)" ondragover="allowDrop(event)" id="droptarget-b" data-target="b">
				
			</div>
			
			<div class="droptarget" ondrop="drop(event)" ondragover="allowDrop(event)" id="droptarget-c" data-target="c">
			
			</div>
			-->
		</div>
		<div class="draggablearea">
			<!--
			<p class="draggable" ondragstart="dragStart(event)" ondrag="dragging(event)" draggable="true" id="draggable-a">&#1072;</p>
			<p class="draggable" ondragstart="dragStart(event)" ondrag="dragging(event)" draggable="true" id="draggable-b">&#1073;</p>
			<p class="draggable" ondragstart="dragStart(event)" ondrag="dragging(event)" draggable="true" id="draggable-c">&#1074;</p>
			-->
		</div>
	</div>
</div>

@stop
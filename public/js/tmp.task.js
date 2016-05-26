function asd(arr) {
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
	  var draggables = arr;
	  draggables.sort( function() { return Math.random() - .5 } );
	 
	  for ( var i=0; i<arr.length; i++ ) {
		$('<div>' + draggables[i] + '</div>').data( 'dragged', draggables[i] ).attr( 'id', 'dragged'+draggables[i] ).appendTo( '#draggablearea' ).draggable( {
		  containment: '#content',
		  stack: '#draggablearea div',
		  cursor: 'move',
		  revert: true
		} );
	  }
	 
	  // Create the card slots
	  var words = arr;
	  for ( var i=1; i<=arr.length; i++ ) {
		$('<div>' + words[i-1] + '</div>').data( 'slot', words[i-1] ).appendTo( '#droppablearea' ).droppable( {
		  accept: '#draggablearea div',
		  hoverClass: 'hovered',
		  drop: handleCardDrop
		} );
	  }
	 
	}
	  
	function handleCardDrop( event, ui ) {
		var slotNumber = $(this).data( 'slot' );
		var cardNumber = ui.draggable.data( 'dragged' );
		//alert("slot: "+ slotNumber + " card: " + cardNumber);
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

		if ( correctCards == arr.length ) {
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
}
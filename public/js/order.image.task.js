function asd(arr1, arr2, arr3, source) {
	var correctCards = 0;
	$( init );
	 
	function init() {

	  $('#btn').hide();
	 
	  // Reset the game
	  correctCards = 0;
	  $('#draggablearea').html( '' );
	  $('#droppablearea').html( '' );
	 
	  // Create the pile of shuffled cards
	  var draggables = arr1;
	  var correct = arr1.slice(0);
	  draggables.sort( function() { return Math.random() - .5 } );
	  for ( var i=0; i<arr1.length; i++ ) {
		$('<div>' + draggables[i] + '</div>').data( 'dragged', draggables[i] ).attr( 'id', draggables[i]+'-drag'  ).appendTo( '#draggablearea' ).draggable( {
		  containment: '#limit',
		  stack: '#draggablearea div',
		  cursor: 'move',
		  revert: true
		} );
	  }
	 
	  // Create the card slots
	  for ( var i=1; i<=arr1.length; i++ ) {
		$('<div style="min-height: 88px; min-width: 88px">' + correct[i-1] + '</div>').text('').data( 'slot', correct[i-1] ).attr( 'id', correct[i-1]+'-drop' ).appendTo( '#droppablearea' ).droppable( {
		  accept: '#draggablearea div',
		  hoverClass: 'hovered',
		  drop: handleCardDrop
		} );
		$( '#'+correct[i-1]+'-drop' ).css( 'background-image', 'url('+source[i-1]+') ' );
		$( '#'+correct[i-1]+'-drop' ).css( 'background-repeat', 'no-repeat' );
		$( '#'+correct[i-1]+'-drop' ).css( 'background-size', 'contain' );
	  }
	}
	  
	function handleCardDrop( event, ui ) {
		var slot = $(this).data( 'slot' );
		var card = ui.draggable.data( 'dragged' );
		//alert("slot: "+ slotNumber + " card: " + cardNumber);
		// If the card was dropped to the correct slot,
		// change the card colour, position it directly
		// on top of the slot, and prevent it being dragged
		// again
		
		//alert("slot: "+ slot + " card: " + card);
		if ( slot == card ) {
			ui.draggable.addClass( 'correct' );
			ui.draggable.draggable( 'disable' );
			$(this).droppable( 'disable' );
			ui.draggable.position( { of: $(this), my: 'left top', at: 'left top' } );
			ui.draggable.draggable( 'option', 'revert', false );
			$( '#'+card+'-drag' ).css( 'visibility', 'hidden' ); //poistaa tekstin kuvan p‰‰lt‰, kun oikein
			$( '#'+slot+'-drop' ).css( 'color', '#00FF00' );
			correctCards++;
		} 

		// If all the cards have been placed correctly then display a message
		// and reset the cards for another go

		if ( correctCards == arr1.length ) {
			$('#btn').click();
		}

	}
	
}
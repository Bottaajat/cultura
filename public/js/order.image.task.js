function init(draggables, droppables) {
	var correctCards = 0;
	$( init );
	 
	function init() {

	  $('#btn').hide();
	 
	  // Reset the game
	  correctCards = 0;
	  $('#draggablearea').html( '' );
	  $('#droppablearea').html( '' );
	 
	  // Create the pile of shuffled cards
	  //var draggables = arr1;
	  var correct = draggables.slice();
	  draggables.sort( function() { return Math.random() - .5 } );
	  for ( var i=0; i<draggables.length; i++ ) {
		$('<div>' + draggables[i] + '</div>').data( 'dragged', draggables[i] ).attr( 'id', i+'-drag'  ).appendTo( '#draggablearea' ).draggable( {
		  containment: '#task',
		  stack: '#draggablearea div',
		  cursor: 'move',
		  revert: true
		} );
	  }
	 
	  // Create the card slots
	  for ( var i=0; i<draggables.length; i++ ) {
		$('<div style="min-height: 88px; min-width: 88px">' + draggables[i] + '</div>').text('').data( 'slot', draggables[i] ).attr( 'id', (i)+'-drop' ).appendTo( '#droppablearea' ).droppable( {
		  accept: '#draggablearea div',
		  hoverClass: 'hovered',
		  drop: handleCardDrop
		} );
		$( '#'+correct[i]+'-drop' ).css( 'background-image', 'url(/img/'+droppables[i]+') ' );
		$( '#'+correct[i]+'-drop' ).css( 'background-repeat', 'no-repeat' );
		$( '#'+correct[i]+'-drop' ).css( 'background-size', 'contain' );
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
			var id = ((this.id).split('-'))[0];
			$( '#'+id+'-drag' ).css( 'visibility', 'hidden' ); //poistaa tekstin kuvan p‰‰lt‰, kun oikein
			$( '#'+id+'-drop' ).css( 'color', '#00FF00' );
			correctCards++;
		} 

		// If all the cards have been placed correctly then display a message
		// and reset the cards for another go

		if ( correctCards == draggables.length ) {
			$('#btn').click();
		}

	}
	
}
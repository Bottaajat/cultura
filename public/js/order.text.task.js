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
		$('<div>' + draggables[i] + '</div>').data( 'dragged', draggables[i] ).attr( 'id', draggables[i]+'-drag' ).appendTo( '#draggablearea' ).draggable( {
		  containment: '#limit',
		  stack: '#draggablearea div',
		  cursor: 'move',
		  revert: true
		} );
	  }
	 
	  // Create the card slots
	  var label = arr2;
	  var showable = arr3;
	  for ( var i=1; i<=arr1.length; i++ ) {
	    var info = correct[i-1]+'/'+showable[i-1];
		$('<div>' + correct[i-1] + '</div>').text(label[i-1]).data( 'info',info ).attr( 'id', correct[i-1]+'-drop' ).appendTo( '#droppablearea' ).droppable( {
		//$('<div>' + correct[i-1] + '</div>').text(show[i-1]).data( 'slot',correct[i-1]).attr( 'id', correct[i-1]+'-drop' ).appendTo( '#droppablearea' ).droppable( {
		  accept: '#draggablearea div',
		  hoverClass: 'hovered',
		  drop: handleCardDrop
		} );
	  }
	}
	  
	function handleCardDrop( event, ui ) {
		var info = ($(this).data( 'info' )).split("/");
		var slot = info[0];
		var card = ui.draggable.data( 'dragged' );
		//alert("slot: "+ slotNumber + " card: " + cardNumber);
		// If the card was dropped to the correct slot,
		// change the card colour, position it directly
		// on top of the slot, and prevent it being dragged
		// again

		if ( slot == card ) {
			ui.draggable.addClass( 'correct' );
			ui.draggable.draggable( 'disable' );
			$(this).droppable( 'disable' );
			ui.draggable.position( { of: $(this), my: 'left top', at: 'left top' } );
			ui.draggable.draggable( 'option', 'revert', false );
			/*
			var width = $(this).css('width');
			var height = $(this).css('height');
			$( ui.draggable ).css( 'width', width ); //poistaa tekstin kuvan päältä, kun oikein
			$( ui.draggable ).css( 'height', height );
			*/
			//var showable = $(this).data( 'info[1]' );
			$( ui.draggable ).css( 'visibility', 'hidden' );
			$(this).css( 'border-color', '#00FF00' );
			$(this).text(info[1]);
			correctCards++;
		} 

		// If all the cards have been placed correctly then display a message
		// and reset the cards for another go

		if ( correctCards == arr1.length ) {
			$('#btn').click();
		}

	}
	
}
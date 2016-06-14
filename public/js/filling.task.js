function fill (text) {


	var correctCards = 0;
	var draggables = [];
	var fill = 0;
	var fillable = (text.substring(0, 0)).includes("#");
	text = text.split('#');
	for (var i = 0; i < text.length; i++) {
		if (fillable === false) {
			$("#text").append(text[i]);
			fillable = true;
		}
		else {
			//$("#text").append('<div class = "box" id = "'+text[i]+'">');
			$('<div></div>').attr( 'id', text[i] ).appendTo( '#text' ).droppable( {
			  accept: '#draggablearea div',
			  hoverClass: 'hovered',
			  drop: handleCardDrop
			} ).addClass('box');
			fillable = false;
			draggables[fill]=text[i];
			fill++;
		}
	}
	draggables.sort( function() { return Math.random() - .5 } );
	for ( var i=0; i<draggables.length; i++ ) {
		$('<div>' + draggables[i] + '</div>').data( 'word',draggables[i] ).attr( 'id', draggables[i] +'-drag' ).appendTo( '#draggablearea' ).draggable( {
		  containment: '#task',
		  stack: '#draggablearea div',
		  cursor: 'move',
		  revert: true
		} );
	}

	//Muokkaa laatikoiden leveydet sanan pituuden mukaan
	$('.box').each(function(i, obj) {
		var width = (this.id).length * 9;
		$(this).css('width',width+'px');
	});
	
	function handleCardDrop( event, ui ) {
		var word = ui.draggable.data('word');
		var slot = this.id;
		//alert(word +' ' +slot);
		if ( slot == word ) {
			ui.draggable.addClass( 'correct' );
			ui.draggable.draggable( 'disable' );
			$(this).droppable( 'disable' );
			ui.draggable.position( { of: $(this), my: 'left top', at: 'left top' } );
			ui.draggable.draggable( 'option', 'revert', false );
			$( ui.draggable ).css( 'visibility', 'hidden' );
			$(this).css( 'border-color', '#00FF00' );
			$(this).text(this.id);
			correctCards++;
		} 

		// If all the cards have been placed correctly then display a message
		// and reset the cards for another go

		if ( correctCards == draggables.length ) {
			$('#btn').click();
		}

	}

}

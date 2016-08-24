function Edit_OrderingWords(draggables,droppables,showables,id) {
	var words = 0;
	$('<input type="button" class="btn btn-success" value="Lisää uusi"/>').attr( 'id', 'edit-'+id+'-add' ).appendTo( '#edit-'+id+'-input' );
	$('<input type="button" class="btn btn-danger" value="Poista viimeisin"/>').attr( 'id', 'edit-'+id+'-del' ).appendTo( '#edit-'+id+'-input' );

	$('#edit-'+id+'-add').on( 'click', function() {
		var pair_add = $('<div id="edit-'+id+'-pair-'+words+'" class="word_pair">');
		$(pair_add).append('<input type="text" name="droppable[]"  id="edit-'+id+'-droppable-'+words+'" placeholder="kohde" required/>');
		$(pair_add).append('<input type="text" name="draggable[]"  id="edit-'+id+'-draggable-'+words+'" placeholder="vedettävä" required/>');
		$(pair_add).append('<input type="text" name="showable[]"  id="edit-'+id+'-showable-'+words+'" placeholder="näytettävä" required/>');
		$(pair_add).append('</div>');
		$('#edit-'+id+'-input').append(pair_add);
		words++;
	});
	
	$('#edit-'+id+'-del').on( 'click', function() {
		if (words > 3) {
			$( '#edit-'+id+'-pair-'+(words-1) ).remove();
			words--;
		}
	});
	
	for (var i = 0; i < draggables.length; i++){
		$('#edit-'+id+'-add').click();
		$('#edit-'+id+'-draggable-'+i).val(draggables[i]);
		$('#edit-'+id+'-droppable-'+i).val(droppables[i]);
		$('#edit-'+id+'-showable-'+i).val(showables[i]);
		//if (droppables[i] != 'no img') $('#edit-'+id+'-droppable-'+i).val(droppables[i]);
	}
}

function Edit_OrderingImages(draggables,droppables,id) {
	var words = 0;
	$('<input type="button" class="btn btn-success" value="Lisää uusi"/>').attr( 'id', 'edit-'+id+'-add' ).appendTo( '#edit-'+id+'-input' );
	$('<input type="button" class="btn btn-danger" value="Poista viimeisin"/>').attr( 'id', 'edit-'+id+'-del' ).appendTo( '#edit-'+id+'-input' );

	$('#edit-'+id+'-add').on( 'click', function() {
		var pair_add = $('<div id="edit-'+id+'-pair-'+words+'" class="word_pair">');
		$(pair_add).append('<span><input type="file" name="droppable[]"  id="edit-'+id+'-droppable-'+words+'" required/></span>');
		$(pair_add).append('<input type="text" name="draggable[]"  id="edit-'+id+'-draggable-'+words+'" placeholder="vedettävä" required/>');
		$(pair_add).append('</div>');
		$('#edit-'+id+'-input').append(pair_add);
		words++;
	});
	
	$('#edit-'+id+'-del').on( 'click', function() {
		if (words > 3) {
			$( '#edit-'+id+'-pair-'+(words-1) ).remove();
			words--;
		}
	});
	
	for (var i = 0; i < draggables.length; i++){
		$('#edit-'+id+'-add').click();
		$('#edit-'+id+'-draggable-'+i).val(draggables[i]);
		if (droppables[i] === 'no img') $('#edit-'+id+'-droppable-'+i).addClass("warning");
		else document.getElementById('edit-'+id+'-droppable-'+i).required = false;
	}
}

function Edit_MultipleChoice(questions,choices,solutions,id) {
	var questions_count = 0;
	$('<input type="button" class="btn btn-success" value="Lisää uusi"/>').attr( 'id', 'edit-'+id+'-add' ).appendTo( '#edit-'+id+'-input' );
	$('<input type="button" class="btn btn-danger" value="Poista viimeisin"/>').attr( 'id', 'edit-'+id+'-del' ).appendTo( '#edit-'+id+'-input' );
	
	$('#edit-'+id+'-add').on( 'click', function() {
		var question_add = $('<div id="edit-'+id+'-question-'+questions_count+'" class="edit-question question">');
		$(question_add).append('<textarea class="column" name="questions[]" rows="4" id="edit-'+id+'-questions-'+questions_count+'" placeholder="kysymys" required />');
		$(question_add).append('<textarea class="column" name="choices[]" rows="4" id="edit-'+id+'-choices-'+questions_count+'" placeholder="vaihtoehdot" required />');
		$(question_add).append('<textarea class="column" name="solutions[]" rows="4" id="edit-'+id+'-solutions-'+questions_count+'" placeholder="vastaukset" required />');
		$(question_add).append('</div>');
		$('#edit-'+id+'-input').append(question_add);
		questions_count++;
	});
	
	$('#edit-'+id+'-del').on( 'click', function() {
		if (questions_count > 1) {
			$( '#edit-'+id+'-question-'+(questions_count-1) ).remove();
			questions_count--;
		}
	});
	
	for (var i = 0; i < questions.length; i++){
		$('#edit-'+id+'-add').click();
		var choices_lines = (choices[i]).replace(/###/g,"\r\n");
		var solutions_lines = (solutions[i]).replace(/###/g,"\r\n");
		$('#edit-'+id+'-questions-'+i).val(questions[i]);
		$('#edit-'+id+'-choices-'+i).val(choices_lines);
		$('#edit-'+id+'-solutions-'+i).val(solutions_lines);
	}
}

function Edit_Crossword(answers,clues,positions,id) {
	var words = 0;
	$('<input type="button" class="btn btn-success" value="Lisää uusi"/>').attr( 'id', 'edit-'+id+'-add' ).appendTo( '#edit-'+id+'-input' );
	$('<input type="button" class="btn btn-danger" value="Poista viimeisin"/>').attr( 'id', 'edit-'+id+'-del' ).appendTo( '#edit-'+id+'-input' );
	$('<input type="text" name="vertical" readonly/>').attr( 'id', 'edit-'+id+'-vertical' ).attr( 'value', answers[answers.length-1] ).attr( 'placeholder', 'pystysana' ).appendTo( '#edit-'+id+'-preview' );
	$('<input type="text" name="vertical_clue"/>').attr( 'id', 'edit-'+id+'-vertical_clue' ).attr( 'value', clues[answers.length-1] ).attr( 'placeholder', 'pystysanan vihje' ).appendTo( '#edit-'+id+'-preview' );
	
	$('#edit-'+id+'-add').on( 'click', function() {
		var word_add = $('<div id="edit-'+id+'-word-'+words+'" class="word">');
		$(word_add).append('<input type="text" class="edit-'+id+'-words" name="words[]" id="edit-'+id+'-words-'+words+'" placeholder="sana" required/>');
		$(word_add).append('<input type="number" class="edit-'+id+'-middles" name="middles[]" id="edit-'+id+'-middles-'+words+'" min="1" max="1" value="1" required/>');
		$(word_add).append('<input type="text" class="clues" name="clues[]" id="edit-'+id+'-clues-'+words+'" placeholder="vihje" required/>');
		$(word_add).append('</div>');
		$('#edit-'+id+'-input').append(word_add);
		words++;
	});
	
	$('#edit-'+id+'-del').on( 'click', function() {
		if (words > 4) {
			$( '#edit-'+id+'-word-'+(words-1) ).remove();
			words--;
		}
		var middle = $('#edit-'+id+'-vertical').val();
		$('#edit-'+id+'-vertical').val(middle.substring(0, words));
	});
	
	for (var i = 0; i < answers.length-1; i++){
		$('#edit-'+id+'-add').click();
	}
	
	$('.edit-'+id+'-words').each(function(i, obj) {
		var x = positions[i].split('.')[0];
		var letter_number = (-1*x+1);
		$('#edit-'+id+'-words-'+i).val(answers[i]);
		$('#edit-'+id+'-middles-'+i).attr('max', answers[i].length);
		$('#edit-'+id+'-middles-'+i).val(letter_number);
		$('#edit-'+id+'-clues-'+i).val(clues[i]);
	});
	
	$('#edit-'+id+'-input').on( 'keyup', '.edit-'+id+'-words', function () {
		var change_id = this.id;
		change_id = change_id.split('-');
		$('#edit-'+id+'-middles-'+change_id[3]).attr('max', $(this).val().length);
		refresh_middle();
	});
	
	$('#edit-'+id+'-input').on( 'change', '.edit-'+id+'-middles', function () {
		refresh_middle();
	});
	
	function refresh_middle() {
		var middle = '';
		$('.edit-'+id+'-middles').each(function(i, obj) {
			var word = '';
			var letter ='';
			if ($('#edit-'+id+'-words-'+i).val().length != 0) {
				word = $('#edit-'+id+'-words-'+i).val();
				letter = word[$(this).val()-1];
			}
			middle = middle+letter;
		});
		$('#edit-'+id+'-vertical').val(middle);
	}
}

function Edit_Filling(text,id) {
	$('<textarea name="text" id="edit-'+id+'-text" class="text" rows="8" required>'+text+'</textarea>').appendTo( '#edit-'+id+'-input' );
}
$(window).load(function(){
	var type = ($( '#task_type option:selected' ).text());
	$( '#input' ).empty();
	$( '#preview' ).empty();
	if (type === 'Sanojen yhdistäminen') Ordering_words();
	if (type === 'Kuvien yhdistäminen') Ordering_images();
	if (type === 'Monivalinta') MultipleChoice();
	if (type === 'Sanaristikko') Crossword();
	if (type === 'Täyttö') Filling();
})

$('#task_type').on( 'change', function() {
	var type = ($( '#task_type option:selected' ).text());
	$( '#input' ).empty();
	$( '#preview' ).empty();
	if (type === 'Sanojen yhdistäminen') Ordering_words();
	if (type === 'Kuvien yhdistäminen') Ordering_images();
	if (type === 'Monivalinta') MultipleChoice();
	if (type === 'Sanaristikko') Crossword();
	if (type === 'Täyttö') Filling();
});

function Ordering_words() {
	var words = 0;
	$('<input type="button" class="btn btn-success" value="Lisää uusi"/>').attr( 'id', 'add' ).appendTo( '#input' );
	$('<input type="button" class="btn btn-danger" value="Poista viimeisin"/>').attr( 'id', 'del' ).appendTo( '#input' );
	$('<div></div>').attr( 'id', 'words' ).appendTo( '#input' );
	$('<div></div>').attr( 'id', 'box' ).appendTo( '#preview' );
	
	$("#add").on( 'click', function() {
		var pair_add = $('<div id="pair-'+words+'" class="word_pair">');
		$(pair_add).append('<input type="text" name="droppable[]"  id="droppable-'+words+'" placeholder="kohde" required/>');
		$(pair_add).append('<input type="text" name="draggable[]"  id="draggable-'+words+'" placeholder="vedettävä" required/>');
		$(pair_add).append('<input type="text" name="showable[]"  id="showable-'+words+'" placeholder="näytettävä" required/>');
		$(pair_add).append('</div>');
		$("#input").append(pair_add);
		words++;
	});
	
	$("#del").on( 'click', function() {
		if (words > 3) {
			$( '#pair-'+(words-1) ).remove();
			words--;
		}
	});
	
	for (var i = 0; i < 3; i++){
		$('#add').click();
	}
}

function Ordering_images() {
	var words = 0;
	$('<input type="button" class="btn btn-success" value="Lisää uusi"/>').attr( 'id', 'add' ).appendTo( '#input' );
	$('<input type="button" class="btn btn-danger" value="Poista viimeisin"/>').attr( 'id', 'del' ).appendTo( '#input' );
	$('<div></div>').attr( 'id', 'words' ).appendTo( '#input' );
	$('<div></div>').attr( 'id', 'box' ).appendTo( '#preview' );
	
	$("#add").on( 'click', function() {
		var pair_add = $('<div id="pair-'+words+'" class="word_pair">');
		$(pair_add).append('<span><input type="file" name="droppable[]"  id="droppable-'+words+'" required/></span>');
		$(pair_add).append('<input type="text" name="draggable[]"  id="draggable-'+words+'" placeholder="vedettävä" required/>');
		$(pair_add).append('</div>');
		$("#input").append(pair_add);
		words++;
	});
	
	$("#del").on( 'click', function() {
		if (words > 3) {
			$( '#pair-'+(words-1) ).remove();
			words--;
		}
	});
	
	for (var i = 0; i < 3; i++){
		$('#add').click();
	}
}

function MultipleChoice() {
	var questions = 0;
	$('<input type="button" class="btn btn-success" value="Lisää uusi"/>').attr( 'id', 'add' ).appendTo( '#input' );
	$('<input type="button" class="btn btn-danger" value="Poista viimeisin"/>').attr( 'id', 'del' ).appendTo( '#input' );
	
	$("#add").on( 'click', function() {
		var question_add = $('<div id="question-'+questions+'" class="question">');
		$(question_add).append('<textarea class="column" name="questions[]" rows="4" id="questions-'+questions+'" placeholder="kysymys" required />');
		$(question_add).append('<textarea class="column" name="choices[]" rows="4" id="choices-'+questions+'" placeholder="vaihtoehdot" required />');
		$(question_add).append('<textarea class="column" name="solutions[]" rows="4" id="solutions-'+questions+'" placeholder="vastaukset" required />');
		$(question_add).append('</div>');
		$("#input").append(question_add);
		questions++;
	});
	
	$("#del").on( 'click', function() {
		if (questions > 1) {
			$( '#question-'+(questions-1) ).remove();
			questions--;
		}
	});
	
	$('#add').click();
}

function Crossword() {
	var words = 0;
	$('<input type="button" class="btn btn-success" value="Lisää uusi"/>').attr( 'id', 'add' ).appendTo( '#input' );
	$('<input type="button" class="btn btn-danger" value="Poista viimeisin"/>').attr( 'id', 'del' ).appendTo( '#input' );
	$('<input type="text" name="vertical" readonly/>').attr( 'id', 'vertical' ).attr( 'placeholder', 'pystysana' ).appendTo( '#preview' );
	$('<input type="text" name="vertical_clue"/>').attr( 'id', 'vertical_clue' ).attr( 'placeholder', 'pystysanan vihje' ).appendTo( '#preview' );
	
	$("#add").on( 'click', function() {
		var word_add = $('<div id="word-'+words+'" class="word">');
		$(word_add).append('<input type="text" class="words" name="words[]"  id="words-'+words+'" placeholder="sana" required/>');
		$(word_add).append('<input type="number" class="middles" name="middles[]"  id="middles-'+words+'" min="1" max="1" value="1" required/>');
		$(word_add).append('<input type="text" class="clues" name="clues[]"  id="clues-'+words+'" placeholder="vihje" required/>');
		$(word_add).append('</div>');
		$("#input").append(word_add);
		words++;
	});
	
	$("#del").on( 'click', function() {
		if (words > 4) {
			$( '#word-'+(words-1) ).remove();
			words--;
		}
		var middle = $('#vertical').val();
		$('#vertical').val(middle.substring(0, words));
	});
	
	for (var i = 0; i < 4; i++){
		$('#add').click();
	}
	
	$("#input").on( 'keyup', '.words', function () {
		var id = this.id;
		id = id.split('-');
		$('#middles-'+id[1]).attr('max', $(this).val().length);
		refresh_middle();
	});
	
	$("#input").on( 'change', '.middles', function () {
		refresh_middle();
	});
	
	function refresh_middle() {
		var middle = '';
		$('.middles').each(function(i, obj) {
			var word = '';
			var letter ='';
			if ($('#words-'+i).val().length != 0) {
				word = $('#words-'+i).val();
				letter = word[$(this).val()-1];
			}
			middle = middle+letter;
		});
		$("#vertical").val(middle);
	}
}

function Filling() {
	$('<textarea name="text" id="text" class="text" rows="8" required />').appendTo( '#input' );
	$('<div></div>').attr( 'id', 'box' ).appendTo( '#preview' );
}
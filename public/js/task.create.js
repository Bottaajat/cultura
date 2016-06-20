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
	$('<input type="button" class="btn btn-success" value="Lisää uusi"/>').attr( 'id', 'new_pair' ).appendTo( '#input' );
	$('<input type="button" class="btn btn-danger" value="Poista viimeisin"/>').attr( 'id', 'del_pair' ).appendTo( '#input' );
	$('<div></div>').attr( 'id', 'words' ).appendTo( '#input' );
	$('<div></div>').attr( 'id', 'box' ).appendTo( '#preview' );
	
	$("#new_pair").on( 'click', function() {
		var pair_add = $('<div id="pair-'+words+'" class="word_pair">');
		$(pair_add).append('<input type="text" name="droppable[]"  id="droppable-'+words+'" placeholder="kohde" required/>');
		$(pair_add).append('<input type="text" name="draggable[]"  id="draggable-'+words+'" placeholder="vedettävä" required/>');
		$(pair_add).append('<input type="text" name="showable[]"  id="showable-'+words+'" placeholder="näytettävä" required/>');
		$(pair_add).append('</div>');
		$("#input").append(pair_add);
		words++;
	});
	
	$("#del_pair").on( 'click', function() {
		if (words > 3) {
			$( '#pair-'+(words-1) ).remove();
			words--;
		}
	});
	
	for (var i = 0; i < 3; i++){
		$('#new_pair').click();
	}
}

function Ordering_images() {
	var words = 0;
	$('<input type="button" class="btn btn-success" value="Lisää uusi"/>').attr( 'id', 'new_pair' ).appendTo( '#input' );
	$('<input type="button" class="btn btn-danger" value="Poista viimeisin"/>').attr( 'id', 'del_pair' ).appendTo( '#input' );
	$('<div></div>').attr( 'id', 'words' ).appendTo( '#input' );
	$('<div></div>').attr( 'id', 'box' ).appendTo( '#preview' );
	
	$("#new_pair").on( 'click', function() {
		var pair_add = $('<div id="pair-'+words+'" class="word_pair">');
		$(pair_add).append('<span><input type="file" name="droppable[]"  id="droppable-'+words+'" required/></span>');
		$(pair_add).append('<input type="text" name="draggable[]"  id="draggable-'+words+'" placeholder="vedettävä" required/>');
		$(pair_add).append('</div>');
		$("#input").append(pair_add);
		words++;
	});
	
	$("#del_pair").on( 'click', function() {
		if (words > 3) {
			$( '#pair-'+(words-1) ).remove();
			words--;
		}
	});
	
	for (var i = 0; i < 3; i++){
		$('#new_pair').click();
	}
}

function MultipleChoice() {
	var questions = 0;
	$('<input type="button" class="btn btn-success" value="Lisää uusi"/>').attr( 'id', 'new_question' ).appendTo( '#input' );
	$('<input type="button" class="btn btn-danger" value="Poista viimeisin"/>').attr( 'id', 'del_question' ).appendTo( '#input' );
	
	$("#new_question").on( 'click', function() {
		var question_add = $('<div id="question-'+questions+'" class="question">');
		$(question_add).append('<textarea class="column" name="questions[]" rows="4" id="questions-'+questions+'" placeholder="kysymys" required />');
		$(question_add).append('<textarea class="column" name="choices[]" rows="4" id="choices-'+questions+'" placeholder="vaihtoehdot" required />');
		$(question_add).append('<textarea class="column" name="solutions[]" rows="4" id="solutions-'+questions+'" placeholder="vastaukset" required />');
		$(question_add).append('</div>');
		$("#input").append(question_add);
		questions++;
	});
	
	$("#del_question").on( 'click', function() {
		if (questions > 1) {
			$( '#question-'+(questions-1) ).remove();
			questions--;
		}
	});
	
	$('#new_question').click();
}

function Crossword() {
	var words = 0;
	$('<input type="button" class="btn btn-success" value="Lisää uusi"/>').attr( 'id', 'new_word' ).appendTo( '#input' );
	$('<input type="button" class="btn btn-danger" value="Poista viimeisin"/>').attr( 'id', 'del_word' ).appendTo( '#input' );
	$('<input type="text" disabled/>').attr( 'id', 'vertical' ).appendTo( '#preview' );
	
	$("#new_word").on( 'click', function() {
		var word_add = $('<div id="word-'+words+'" class="word">');
		$(word_add).append('<input type="text" class="words" name="words[]"  id="words-'+words+'" placeholder="sana" required/>');
		$(word_add).append('<input type="number" class="middle" name="middle[]"  id="middle-'+words+'" min="1" max="1" value="1" required/>');
		$(word_add).append('</div>');
		$("#input").append(word_add);
		words++;
	});
	
	$("#del_word").on( 'click', function() {
		if (words > 4) {
			$( '#word-'+(words-1) ).remove();
			words--;
		}
	});
	
	for (var i = 0; i < 4; i++){
		$('#new_word').click();
	}
	
	$(".words").on( 'change', function () {
		var id = this.id;
		id = id.split('-');
		$('#middle-'+id[1]).attr('max', $(this).val().length);
	});
	
	$(".middle").on( 'change', function () {
		var middle = '';
		$('.middle').each(function(i, obj) {
			var word = '';
			var letter ='';
			if ($('#words-'+i).val().length != 0) {
				word = $('#words-'+i).val();
				letter = word[$(this).val()-1];
			}
			middle = middle+letter;
		});
		$("#vertical").val(middle);
	});
}

function Filling() {
	$('<textarea name="text" id="text" rows="8" required />').appendTo( '#input' );
	$('<div></div>').attr( 'id', 'box' ).appendTo( '#preview' );
}
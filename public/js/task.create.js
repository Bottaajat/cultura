$(window).load(function(){
	var type = ($( '#task_type option:selected' ).text());
	$( '#input' ).empty();
	$( '#preview' ).empty();
	if (type == 'Sanojen yhdistäminen') yhdistaminen_sanat();
	if (type == 'Kuvien yhdistäminen') yhdistaminen_kuvat();
	if (type == 'Monivalinta') Monivalinta();
	if (type == 'Sanaristikko') Sanaristikko();
	if (type == 'Täyttö') Taytto();
})

$('#task_type').on( 'change', function() {
	var type = ($( '#task_type option:selected' ).text());
	$( '#input' ).empty();
	$( '#preview' ).empty();
	if (type == 'Sanojen yhdistäminen') yhdistaminen_sanat();
	if (type == 'Kuvien yhdistäminen') yhdistaminen_kuvat();
	if (type == 'Monivalinta') Monivalinta();
	if (type == 'Sanaristikko') Sanaristikko();
	if (type == 'Täyttö') Taytto();
});

function yhdistaminen_sanat() {
	var words = 0;
	$('<input type="button" class="btn btn-success" value="Lisää uusi"/>').attr( 'id', 'new_pair' ).appendTo( '#input' );
	$('<input type="button" class="btn btn-danger" value="Poista viimeisin"/>').attr( 'id', 'del_pair' ).appendTo( '#input' );
	$('<div></div>').attr( 'id', 'words' ).appendTo( '#input' );
	$('<div></div>').attr( 'id', 'box' ).appendTo( '#preview' );
	
	for (var i = 0; i < 3; i++){
		var pair_add = $('<div id="pair-'+words+'" class="word_pair">');
		$(pair_add).append('<input type="text" name="droppable[]"  id="droppable-'+words+'" placeholder="kohde" required/>');
		$(pair_add).append('<input type="text" name="draggable[]"  id="draggable-'+words+'" placeholder="vedettävä" required/>');
		$(pair_add).append('<input type="text" name="showable[]"  id="showable-'+words+'" placeholder="näytettävä" required/>');
		$(pair_add).append('</div>');
		$("#input").append(pair_add);
		words++;
	}
	
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
}

function yhdistaminen_kuvat() {
	var words = 0;
	$('<input type="button" class="btn btn-success" value="Lisää uusi"/>').attr( 'id', 'new_pair' ).appendTo( '#input' );
	$('<input type="button" class="btn btn-danger" value="Poista viimeisin"/>').attr( 'id', 'del_pair' ).appendTo( '#input' );
	$('<div></div>').attr( 'id', 'words' ).appendTo( '#input' );
	$('<div></div>').attr( 'id', 'box' ).appendTo( '#preview' );
	
	for (var i = 0; i < 3; i++){
		var pair_add = $('<div id="pair-'+words+'" class="word_pair">');
		$(pair_add).append('<input type="file" name="droppable[]"  id="droppable-'+words+'" required/>');
		$(pair_add).append('<input type="text" name="draggable[]"  id="draggable-'+words+'" placeholder="vedettävä" required/>');
		$(pair_add).append('</div>');
		$("#input").append(pair_add);
		words++;
	}
	
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
	
}

function Monivalinta() {
	
}

function Sanaristikko() {
	$('<div><input type="button" value="Lisää sana"/></div>').attr( 'id', 'new_word' ).appendTo( '#input' );
	$('<div></div>').attr( 'id', 'words' ).appendTo( '#input' );
	$('<div></div>').attr( 'id', 'box' ).appendTo( '#preview' );
	$("#new_word").on( 'click', function() {
		
	});
}

function Taytto() {
	$('<textarea name="text" id="text" rows="8" required/textarea>').appendTo( '#input' );
	$('<div></div>').attr( 'id', 'box' ).appendTo( '#preview' );
}
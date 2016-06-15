$(window).load(function(){
	var type = ($( '#task_type option:selected' ).text());
	$( '#input' ).empty();
	$( '#preview' ).empty();
	if (type == 'järjestys/sanat') jarjestys_sanat();
	if (type == 'järjestys/kuvat') jarjestys_kuvat();
	if (type == 'Monivalinta') Monivalinta();
	if (type == 'Sanaristikko') Sanaristikko();
	if (type == 'Täyttö') Taytto();
})

$('#task_type').on( 'change', function() {
	var type = ($( '#task_type option:selected' ).text());
	$( '#input' ).empty();
	$( '#preview' ).empty();
	if (type == 'järjestys/sanat') jarjestys_sanat();
	if (type == 'järjestys/kuvat') jarjestys_kuvat();
	if (type == 'Monivalinta') Monivalinta();
	if (type == 'Sanaristikko') Sanaristikko();
	if (type == 'Täyttö') Taytto();
});

function jarjestys_sanat() {
	var words = 0;
	$('<div><input type="button" value="Lisää pari"/></div>').attr( 'id', 'new_pair' ).appendTo( '#input' );
	$('<div></div>').attr( 'id', 'words' ).appendTo( '#input' );
	$('<div></div>').attr( 'id', 'box' ).appendTo( '#preview' );
	$("#new_pair").on( 'click', function() {
		var pair_add = $('<div id="pair-'+words+'" class="word_pair">');
		$(pair_add).append('<input type="text" id="droppable-'+words+'" placeholder="droppable"/>');
		$(pair_add).append('<input type="text" id="draggable-'+words+'" placeholder="draggable"/>');
		$(pair_add).append('</div>');
		$("#input").append(pair_add);
		words++;
	});
}

function jarjestys_kuvat() {
	$('<div><input type="button" value="Lisää pari"/></div>').attr( 'id', 'new_pair' ).appendTo( '#input' );
	$('<div></div>').attr( 'id', 'words' ).appendTo( '#input' );
	$('<div></div>').attr( 'id', 'box' ).appendTo( '#preview' );
	$("#new_pair").on( 'click', function() {
		
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
	$('<textarea name="text" id="text" rows="8"/textarea>').appendTo( '#input' );
	$('<div></div>').attr( 'id', 'box' ).appendTo( '#preview' );
}
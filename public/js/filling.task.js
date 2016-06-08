function fill (text) {

	$('#btn').hide();
	var fillable = (text.substring(0, 0)).includes("#");
	var text = text.split('#');
	for (var i = 0; i < text.length; i++) {
		if (fillable == false) {
			$("#text").append(text[i]);
			fillable = true;
		}
		else {
			$("#text").append('<span id = "'+text[i]+'" class= "box" contenteditable="true">');
			fillable = false;
		}
	}
	
	//Muokkaa laatikoiden leveydet sanan pituuden mukaan
	$('.box').each(function(i, obj) {
		var width = (this.id).length * 8;
		$(this).css('width',width+'px');
	});
	
	//Palauta väri mustaksi, jos värjätty tarkistuksen yhteydessä
	$(".box").click(function(){
		$(this).css('color','black');	
	});
	
}

function check () {
	var correct = true;
	$('.box').each(function(i, obj) {
		if ($(this).text() != '') {
			if (this.id == $(this).text()) {
				$(this).css('color','green');
			}
			else {
				$(this).css('color','red');
				correct = false;
			}
		}
		else correct = false;
	});
	if (correct == true) $('#btn').click();
}

function clear_all () {
	$('.box').each(function(i, obj) {
		$(this).text('');
		$(this).css('color','black');
	});
}
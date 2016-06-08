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
			//$("#text").append('<span id = "'+text[i]+'" class= "box" contenteditable="true">');
			//$("#text").append('<input type = "text" id = "'+text[i]+'">');
			$("#text").append('<input type = "text" class = "keyboard" id = "'+text[i]+'">');
			fillable = false;
		}
	}
	
	//Muokkaa laatikoiden leveydet sanan pituuden mukaan
	$('.keyboard').each(function(i, obj) {
		var width = (this.id).length * 9;
		$(this).css('width',width+'px');
		$(this).css('dispaly','inline');
	});
	
	//Palauta väri mustaksi, jos värjätty tarkistuksen yhteydessä
	$(".keyboard").click(function(){
		$(this).css('color','black');	
	});
	
}

function check () {
	var correct = true;
	$('.keyboard').each(function(i, obj) {
		if ($(this).val() != '') {
			if (this.id == $(this).val()) {
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
	$('.keyboard').each(function(i, obj) {
		$(this).val('');
		$(this).css('color','black');
	});
}
function init (answers, clues, positions, orientations) {

	//TODO
	// sanan numeron listaus alkukohtaan
	// yhden sanan täyttö yhdellä klikkauksella
	
	$('#btn').hide();
	
	var limits = grid_size(positions, answers, orientations);
	var grid = grid_create(limits[0], limits[1], limits[2], limits[3]);
	var filled_grid = grid_fill(grid, positions, answers, orientations, limits[0]);

	//draw puzzle
	for (var y = limits[2]; y < limits[3]; y++) {
		var row = grid[y];
		var row_add = $('<tr></tr>');
		for (var x = limits[0]; x < limits[1]; x++){
			if(row[x] == 0){
				$(row_add).append('<td class="square empty"></td>');
			}
			else{
				var span = '';
				for (var i = 0; i < positions.length; i++) {
					if (positions[i] == x+'.'+y) {
						span = '<span class="question_number">'+(i+1)+'</span>';
					}
				}
				$(row_add).append('<td>'+span+'<div id="'+x+','+y+'" class="square letter" data-letter="'+row[x]+'" contenteditable="true"></div></td>');
			}	
		}
		$("#puzzle").append(row_add);
	}
	
	//hints
	var vertical_hints = $('<div id="vertical_hints"></div>');
	var horizontal_hints = $('<div id="horizontal_hints"></div>');
	for (var i = 0; i < clues.length; i++) {
		if (orientations[i] == 'horizontal') {
			horizontal_hints.append((i+1)+'. '+clues[i]+'<br>');
		}
		else {
			vertical_hints.append((i+1)+'. '+clues[i]+'<br>');
		}
	}
	$("#vertical_hints_container").append(vertical_hints);
	$("#horizontal_hints_container").append(horizontal_hints);
	
	//click
	$(".letter").click(function(){
		document.execCommand('selectAll',false,null);
		$(".letter").removeClass("active");
		$(this).addClass("active");
		var start = this.id;
		for (var i = 0; i < positions.length; i++) {
			start = start.replace(',', '.');
			//alert(start+' '+positions[i]);
			if (start == positions[i]) {
				var index = i;
			}
		}
		$(".letter").keyup(function(){
			var next = this.id;
			//alert(next);
			var this_text = $(this).text();
			if(this_text.length >= 1){
				$(this).css('color','black');
				$(this).text(this_text.slice(0,1));
				next = next.split(',');
				var next_x = Number(next[0]);
				var next_y = Number(next[1]);
				//alert(next_x+' '+next_y);
				var orientation = orientations[index];
				if (orientation == 'horizontal') {
					next_x++;
				}
				else {
					next_y++;
				}
				next = next_x.toString()+','+next_y.toString();
				//alert(next);
				//next.focus;
				if ( document.getElementById(next) != null) {
					document.getElementById(next).focus();
				}
				else {
					$(this).text(this_text.slice(0,1));
				}
			}
		});
	});
	
}

//CLEAR ALL
function clear_all () {
	$('.letter').each(function(i, obj) {
		$(this).text('');
		$(this).css('color','black');
	});
}

//CHECK
function check () {
	var correct = true;
	$('.letter').each(function(i, obj) {
		if ($(this).text() != '') {
			if ($(this).data('letter')==$(this).text()) {
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

function grid_size (positions, answers, orientations) {
	var x_min = 0;
	var x_max = 0;
	var y_min = 0;
	var y_max = 0;
	
	var x_start = 0;
	var x_end = 0;
	var y_start = 0;
	var y_end = 0;
	
    for (i = 0; i < positions.length; i++) {
		var position_start = positions[i].split('.');
		x_start = Number(position_start[0]);
		y_start = Number(position_start[1]);
		x_end = 0;
		y_end = 0;
		//alert('start '+x_start+' '+y_start);
		if (orientations[i] == 'horizontal') {
			x_end = x_start + answers[i].length;
			y_end = y_start;
		}
		else{
			y_end = y_start + answers[i].length;
			x_end = x_start;
		}
		if (i == 0) {
			x_min = x_start;
			x_max = x_end;
			y_min = y_start;
			y_max = y_end;
		}
		//alert('end '+x_end+' '+y_end);
		if (x_min > x_start) x_min = x_start;
		if (x_max < x_end) x_max = x_end;
		if (y_min > y_start) y_min = y_start;
		if (y_max < y_end) y_max = y_end;
	}
	//alert('min-x: '+x_min+'   max-x: '+x_max+'\nmin-y: '+y_min+'   max-y: '+y_max);
	var values = [x_min, x_max, y_min, y_max];
	return values;
}

function grid_create(x_min, x_max, y_min, y_max) {
	var grid = [];
	var insert = 0;
	for (i = y_min; i < y_max; i++) {
		var row = [];
		for (j = x_min; j < x_max; j++) {
			row[j] = 0;
		}
		grid[i]=row;
	}
	return grid;
}

function grid_fill(grid, positions, answers, orientations, x_min) {
	
    for (i = 0; i < positions.length; i++) {
	
		var position_start = positions[i].split('.');		
		var x_start = Number(position_start[0]);
		var y_start = Number(position_start[1]);
		
		var x_end = x_start;
		var y_end = y_start;
		
		var answer = answers[i];
		var letter = 0;
		
		if (orientations[i] == 'horizontal') {
			x_end = x_start + answers[i].length;
			var row = grid[y_start];
			for (x = x_min; x < row.length; x++) {
				if (x >= x_start && x < x_end) {
					row[x] = answer[letter];
					letter ++;
				}
			}
			grid[y_start] = row;
		}
		else {
			y_end = y_start + answers[i].length;
			for (y = y_start; y < y_end; y++) {
				row = grid[y];
				row[x_start] = answer[letter];
				letter++;
				grid[y]=row;
			}
		}
	}
	return grid;
}
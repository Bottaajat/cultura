function init (answers, clues, positions, orientations) {
	
	var limits = grid_size(positions, answers, orientations);
	var grid = grid_create(limits[0], limits[1], limits[2], limits[3]);
	var filled_grid = grid_fill(grid, positions, answers, orientations, limits[0]);
	
	var isMobile = false; //initiate as false
		// device detection
	if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4))) {
		isMobile = true;
		$( "#vkb_container" ).hide();
	}
	
	var vertical_x = 0;
	for (var i=0; i < orientations.length; i++) {
		if (orientations[i] == 'vertical') vertical_x = (positions[i].split('.'))[0];
	}
	
	//draw puzzle
	var word = 0;
	for (var y = limits[2]; y < limits[3]; y++) {
		var row = grid[y];
		var row_add = $('<tr></tr>');
		for (var x = limits[0]; x < limits[1]; x++){
			if (row[x] == 0) {
				$(row_add).append('<td class="square empty"></td>');
			}
			else {
				//alert(x+'.'+y);
				/*
				for (var i = 0; i < positions.length; i++) {
					if (positions[i] == x+'.'+y) {
						alert(x+'.'+y);
					}
				}
				*/
				//$(row_add).append('<td>'+span+'<div id="'+x+','+y+'" class="square letter" data-letter="'+row[x]+'" contenteditable="true"></div></td>');
				if (vertical_x == x) {
					if (isMobile == true) $(row_add).append('<td><input type = "text" class = "square vertical letter" id = "'+x+','+y+'" word = "'+y+'" letter = "'+row[x]+'"></td>');
					else $(row_add).append('<td><input type = "text" class = "keyboard square vertical letter" id = "'+x+','+y+'" word = "'+y+'" letter = "'+row[x]+'"></td>');
				}
				else {
					if (isMobile == true) $(row_add).append('<td><input type = "text" class = "square letter" id = "'+x+','+y+'" word = "'+y+'" letter = "'+row[x]+'"></td>');
					else $(row_add).append('<td><input type = "text" class = "keyboard square letter" id = "'+x+','+y+'" word = "'+y+'" letter = "'+row[x]+'"></td>');
				}
				//value = "'+(y+1)+'"
			}	
		}
		$("#puzzle").append(row_add);
		word++;
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
	
	$(".letter").keyup(function(){
		if (isMobile == true) {
			var this_text = $(this).val();
			if(this_text.length >= 1){
				$(this).val(this_text.slice(0,1));
				var next = this.id;
				next = next.split(',');
				var next_x = Number(next[0]);
				var next_y = Number(next[1]);
				if (orientations[next_y] == 'horizontal') {
					next_x++;
				}
				else {
					next_y++;
				}
				next = next_x.toString()+','+next_y.toString();
				if ( document.getElementById(next) != null) {
					document.getElementById(next).focus();
				}
				else {
					$(this).val(this_text.slice(0,1));
				}
			}
		}
	});
	
	$('.letter').on('focus', function (event) {
		document.execCommand('selectAll',false,null);
		$(".letter").removeClass("active");
		$(this).addClass("active");
		this.select();
		$(this).css('color','black');
	});
	
	$('#clear').on('focus', function (event) {
		document.getElementById("clear").blur();
	});
}

//CLEAR ALL
function clear_all () {
	$('.letter').each(function(i, obj) {
		$(this).val('');
		$(this).css('color','black');
	});
}

//CHECK
function check () {
	var correct = true;
	$('.letter').each(function(i, obj) {
		if ($(this).val() != '') {
			if ($(this).attr('letter')==$(this).val()) {
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

//GRID SIZE
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

//GRID CREATION
function grid_create(x_min, x_max, y_min, y_max) {
	var grid = [];
	var insert = 0;
	for (i = y_min; i < y_max; i++) {
		var row = [];
		for (j = x_min; j < x_max; j++) {
			row[j] = 0;
		}
		grid[i]=row;
		//alert('created row '+i)
	}
	return grid;
}

//GRID FILLING
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
			//alert('loop '+i+' '+y_start+' row='+row);
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
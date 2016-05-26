function dragStart(event) {
    event.dataTransfer.setData("Text", event.target.id);
	//alert("dragging: " + event.target.id);
}

function allowDrop(event) {
    event.preventDefault();
}

function drop(event) {
    event.preventDefault();
    var data = event.dataTransfer.getData("Text");
	var drag_id = data.split("-");
	var drop_id = (event.target.id).split("-");
	if (drag_id[1] == drop_id[1]) {
		event.target.appendChild(document.getElementById(data));
		var element = event.target.id;
		document.getElementById(element).style.border = "1px solid #00FF00";
	}
}
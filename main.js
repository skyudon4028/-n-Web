function postCmt() {
	let cmtfield = document.getElementById('cmt');
	var table = document.getElementById('cmtplace');
	
	if (cmtfield.value === "") {
		cmtfield.focus();
		return false;
	}
	else {
		var row = table.insertRow(-1);
		var cell1 = row.insertCell(0);
		var cell2 = row.insertCell(1);
		cell1.innerHTML = cmt.value;
		cell2.innerHTML = '<div class="btn-group dropleft"><button type="button" id="cmtoptions" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></button><div class="dropdown-menu"><button class="dropdown-item" type="button" onclick="deleteCmt(this)">Delete</button></div></div>';;		
		
		cmtfield.value = "";	
		return true;
	}
}

function postPrivateCmt() {
	let pri_cmtfield = document.getElementById('private_cmt');
	var table = document.getElementById('private_place');
	
	if (pri_cmtfield.value === "") {
		pri_cmtfield.focus();
		return false;
	}
	else {
		var row = table.insertRow(-1);
		var cell1 = row.insertCell(0);
		var cell2 = row.insertCell(1);
		cell1.innerHTML = private_cmt.value;
		cell2.innerHTML = '<div class="btn-group dropleft"><button type="button" id="cmtoptions" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></button><div class="dropdown-menu"><button class="dropdown-item" type="button" onclick="deletePrivateCmt(this)">Delete</button></div></div>';
		
		pri_cmtfield.value = "";
		return true;
	}
}

function deleteCmt(r) {
	var i = r.parentNode.parentNode.rowIndex;
	document.getElementById('cmtplace').deleteRow(i);
}

function deletePrivateCmt(r) {
	var i = r.parentNode.parentNode.rowIndex;
	document.getElementById('private_place').deleteRow(i);
}

function openNav() {
	document.getElementById("mySidebar").style.width = "250px";
	document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
	document.getElementById("mySidebar").style.width = "0";
	document.getElementById("main").style.marginLeft= "0";
}

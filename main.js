function checkInput(options) {

    var selectorRules = {};

    function validate(inputElement, rule) {

        var errorElement = inputElement.closest('.form-group').querySelector(options.errorSelector);
        var errorMessage;
        var rules = selectorRules[rule.selector];

        for (var i = 0; i < rules.length; i++) {
            errorMessage = rules[i](inputElement.value);
            if (errorMessage) break;
        }
        if (errorMessage) {
            errorElement.innerText = errorMessage;
            inputElement.closest('.form-group').classList.add('invalid');
        } else {
            errorElement.innerText = '';
            inputElement.closest('.form-group').classList.remove('invalid');
        }
        return errorMessage;
    }
    var formElement = document.querySelector(options.form);
    if (formElement) {
        formElement.onsubmit = function(e) {
          
            e.preventDefault();
            var isFormValid = true;

            options.rules.forEach(function(rule) {
                var inputElement = formElement.querySelector(rule.selector);
                var isValid = validate(inputElement, rule);     // Không lỗi trả về false
                if (isValid) {
                    isFormValid = false;
                }
            });
            if (isFormValid) {
                formElement.submit();
            }
        }
        options.rules.forEach(function(rule) {
            if (Array.isArray(selectorRules[rule.selector])) {
                selectorRules[rule.selector].push(rule.test);
            } else {
                selectorRules[rule.selector] = [rule.test];
            }

            var inputElement = formElement.querySelector(rule.selector);

            if (inputElement) {
                inputElement.onblur = function() {
                    validate(inputElement, rule);
                }
                inputElement.oninput = function() {
                    var errorElement = inputElement.closest('.form-group').querySelector(options.errorSelector);
                    errorElement.innerText = '';
                    inputElement.closest('.form-group').classList.remove('invalid');
                }
            }
        });
    }
}

checkInput.isRequired = function(selector) {
    return {
        selector: selector,
        test: function(value) {
            return value.trim() ? undefined : 'Please enter this field'
        }
    };
}

checkInput.minLength = function(selector, min) {
    return {
        selector: selector,
        test: function(value) {
            return value.length >= min ? undefined : `Please enter at least ${min} characters`
        }
    };
}

checkInput.isConfirmed = function(selector, getConfirmValue) {
    return {
        selector: selector,
        test: function(value) {
            return value === getConfirmValue() ? undefined : 'Confirm password does not match'
        }
    };
}



checkInput({
    form: '#form-2',
    errorSelector: '.form-message',
    rules: [
        checkInput.isRequired('#username'),
        checkInput.minLength('#password', 6)
    ]
});

checkInput({
    form: '#form-1',
    errorSelector: '.form-message',
    rules: [
        checkInput.isRequired('#fullname'),
        checkInput.isRequired('#username'),
        checkInput.isRequired('#email'),
        checkInput.isEmail('#email'),
        checkInput.isPhone('#phone'),
        checkInput.isDateOfBirth('#dateofbirth'),
        checkInput.minLength('#password', 6),
        checkInput.isRequired('#password-confirmation'),
        checkInput.isConfirmed('#password-confirmation', function() {
            return document.querySelector('#form-1 #password').value;
        })
    ]
});

checkInput({
    form: '#form-3',
    errorSelector: '.form-message',
    rules: [
        checkInput.isRequired('#email'),
        checkInput.isEmail('#email')
    ]
});

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

showPanel(0);
/*Edit class*/
function openEditForm() {
	document.getElementById("formEditClass").style.display = "inline-block";
}

function closeEditForm() {
	document.getElementById("formEditClass").style.display = "none";
}
/*New class*/
function openNewClass() {
	document.getElementById("formNewClass").style.display = "inline-block";
}
function closeNewClass() {
	document.getElementById("formNewClass").style.display = "none";
}
/*Register Class*/
function openRegisterClass(){
	document.getElementById("formRegisterClass").style.display = "inline-block";
}
function closeRegisterClass(){
	document.getElementById("formRegisterClass").style.display = "none";
}
/*Delete Class*/
function deleteClass(){
	
}
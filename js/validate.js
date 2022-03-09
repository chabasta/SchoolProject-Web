
function create_error(element, text) {   // create error block 
	var error = document.createElement("div");
	error.id = element.name + "-alert";
	error.className = "alert-form";
	error.innerHTML = text;
	element.parentElement.insertBefore(error, element.nextSibling);
	element.style.borderColor = "red";
}

function remove_error(element) {	//remove error
	var error = document.getElementById(element.name + "-alert");
	element.style.removeProperty("border-color");

	if (error) {
		error.remove();
	}
}

function remove_attributes(element){ //remove attributes 

	element.removeAttribute('required');
	element.removeAttribute('pattern');

}

function remove_passwords(elements){ //remove passwords

	for (var i = 0; i < elements.length - 1; i++){

		if (elements[i].type === 'password'){

			elements[i].value='';
		}

	}	
}

function is_empty(value) {  // check is inputs empty

	return value === "";   //result true or false if value is empty 
}

function check_inputs(element) {  // checking inputs and return error message
	var error_msg = "";

	if (is_empty(element.value)) {
		error_msg = "Vyplnte policko";
		return error_msg;
	}

	switch (element.name) {
		case 'email':
			if (!/^\w+@\w+\.\w+$/gm.test(element.value)) {
				error_msg = "Spatny email";
			}
			break;
		case 'username':
			if (!/^\w{3,}$/gm.test(element.value)) {
				error_msg = "Spatny username";
			}
			break;
		case "password":
		case "password1":
			if (!/^\w{6,}$/gm.test(element.value)) {
				error_msg = "Spatne heslo";
			}
			break;
		case "password2":
			let password1 = document.getElementById("password1");
			if (element.value !== password1.value) {
				error_msg = "Zadejte stejne heslo";
			}
			break;
		case "comment":
			if (element.value.length > 500){
				error_msg = "Max 500 znaku";

			}
			break;
		case "language":
			languages= ['en', 'ru', 'cz'];
			if (!languages.includes(element.value)){
				error_msg = "Takovy jazyk neni k dispozici";

			}
			break;

	}

	return error_msg;
}



function validate (element) {  // validate element
	remove_error(element);
	var msg = check_inputs(element);

	if (!is_empty(msg)) {
		create_error(element, msg);
		return false;
	}

	return true;
}


function create_alert_block(form ,text){ // create alert block for ajax
	var alert_block = document.getElementById('alert-block');
	if (alert_block){

		alert_block.remove();

	}
	var alert = document.createElement("div");
	alert.id = "alert-block";
	alert.className = "alert-block";
	alert.innerHTML = text;
	form.parentElement.insertBefore(alert, form.nextSibling);

	$(alert).fadeIn(1000);
}

function ajax_form (form, url) { //send form 
	$.ajax({
		url : url,
		type : "post",
		dataType: "text",
		data: $(form).serialize(),
		success : function(status) {
			let result = status.replace(/(<([^>]+)>)/gi, ""); // delete html tags

			if (result.trim() === 'redirect'){

				window.location.href='./index.php';
			
			}
			else if (result.trim() === 'redirect_on_comments'){

				window.location.href='./zkusenosti.php';
			}
			else{

				create_alert_block(form, result.trim());

			}
		}
	});
}

function bind_events(form) { // bind blur and submit on form 

	let url= form.action; 

	let inputs = form.querySelectorAll("input, textarea, select"); 

	for (var i = 0; i < inputs.length - 1; i++) {

		remove_attributes(inputs[i]);  //delete requird and patter on inputs 

		inputs[i].addEventListener("blur", function() {
			validate(this);
		});
	}

	form.addEventListener("submit", function (e) {
		e.preventDefault();
		var result = true;

		for (var i = 0; i < inputs.length - 1; i++) {
			
			if (!validate(inputs[i])) {
				
				result = false;
			}

		}

		if (result) {
			
			ajax_form(form, url);
			remove_passwords(inputs);
		}
	});
}
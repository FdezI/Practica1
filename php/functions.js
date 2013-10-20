function show_comment_form(){
	document.getElementById('comments').style.display = 'none';
	document.getElementById('commentsFormSection').style.display ='block';
}

function submit_comment_form(form){
	if(form) if(!validate_form(form)) return false;
	
	document.getElementById('comments').style.display = 'block';
	document.getElementById('commentsFormSection').style.display = 'none';
}

function validate_form(form){
	var toCheck;
	form = document.forms[form];

	//username validation
	if(form["username"]){
		toCheck=form["username"].value;
		if(toCheck.length < 5 || toCheck.length > 15){
			form["username"].focus;
			alert("El nombre de usuario debe tener entre 5 y 15 caracteres");
			return false;
		}
		if(form["availabilityImg"]) if(form["availabilityImg"].getAttribute("alt") == "no disponible"){
			alert("Nombre de usuario no disponible");
			return false;
		}
	}
	
	//name validation
	if(form["name"]){
		toCheck=form["name"].value;
		if(toCheck.length == 0){
			form["name"].focus;
			alert("El nombre no se puede dejar vacío");
			return false;
		}
		else if(toCheck.length > 50){
			form["name"].focus;
			alert("El nombre no se puede tener más de 50 caracteres");
			return false;
		}
	}
	
	//surname validation
	if(form["surname"]){
		toCheck=form["surname"].value;
		if(toCheck.length === 0){
			form["surname"].focus;
			alert("El apellido no se puede dejar vacío");
			return false;
		}
		if(toCheck.length > 100){
			form["surname"].focus;
			alert("El apellido no puede tener más de 100 caracteres");
			return false;
		}
	}
	
	//password validation
	if(form["password"]){
		toCheck=form["password"].value;
		if(toCheck.length < 8 || toCheck.length > 16){
			form["password"].focus;
			alert("Debe especificar una contraseña de más de entre 8 y 16 caracteres");
			return false;
		}
	}
	
	//email validation
	if(form["email"]){
		toCheck=form["email"].value;
		var atpos=toCheck.indexOf("@");
		var dotpos=toCheck.lastIndexOf(".");
		if (atpos<1 || dotpos<atpos+2 || dotpos+2>=toCheck.length || toCheck.length > 150){
		  alert("¡Dirección de e-mail inválida!");
		  return false;
		}
		if(toCheck.length > 150){
			form["email"].focus;
			alert("El e-mail no puede tener más de 150 caracteres");
			return false;
		}
	}
	
	//phone validation
	if(form["phone"]){
		toCheck=form["phone"].value;
		if(toCheck.length != 0  && !(/^\d{9}$/).test(toCheck)){
			form["phone"].focus;
			alert("Si especifica un teléfono debe ser válido, de 9 dígitos sin caracteres");
			return false;
		}
	}
	
	//address validation
	if(form["address"]){
		toCheck=form["address"].value;
		if(toCheck.length > 200){
			form["address"].focus;
			alert("Su dirección no puede contener más de 200 caracteres");
			return false;
		}
	}
	
	//zip validation
	if(form["zip"]){
		toCheck=form["zip"].value;
		if(((toCheck.length !== 0 && toCheck.length < 4) || toCheck.length > 8) && !(/^\d{9}$/).test(toCheck)){
			form["zip"].focus;
			alert("Su código postal no puede tener más de 8 dígitos ni menos de 4");
			return false;
		}
	}
	
	//content validation
	if(form["content"]){
		toCheck=form["content"].value;
		if( toCheck.length < 50 || toCheck.length > 500){
			form["content"].focus;
			alert("Contenido inadecuado, debe tener entre 50 y 500 caracteres");
			return false;
		}
	}
	
	
	return true;
}

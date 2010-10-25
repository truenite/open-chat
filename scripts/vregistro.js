window.onload=initPagina;
var usuarioBien = 0;
var passwordsBien = 0;
var mailsBien = 0;


function initPagina(){
	document.getElementById("usuario").onblur=checarUsuario;
	document.getElementById("repass").onblur=checarPassword;
	document.getElementById("repmail").onblur=checarMail;
	document.getElementById("registrar").onclick=confirmarRegistro;
}
function checarUsuario(){
	usuarioBien = 0;
	request = crearReq();
	if(request == null){
		alert("No se pudo crear request");
	}else{
		var texto= document.getElementById("usuario").value;
		var checUsuario = escape(texto);
		var url = "registrar.php";
		request.onreadystatechange = mostrarEstadoUsername;
		request.open("POST",url,true);
		request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		var params = "checarUsuario="+checUsuario;
		request.send(params);
	}
}
function mostrarEstadoUsername(){
	if(request.readyState == 4){
		if(request.status == 200){
			if(request.responseText=="noUsado"){
				usuarioBien = 1;
				document.getElementById("usuario").className="bien";
			}else{
				document.getElementById("usuario").className="error";	
			}
		}
	}
}

function checarPassword(){
	passwordsBien = 0;
	pass = document.getElementById("pass").value;
	passrep = document.getElementById("repass").value;
	if(pass == passrep){
		passwordsBien = 1;
		document.getElementById("pass").className="bien";
		document.getElementById("repass").className="bien";
	}
	else{
		document.getElementById("pass").className="error";
		document.getElementById("repass").className="error";
	}
	
}

function checarMail(){
	mailsBien = 0;
	mail = document.getElementById("mail").value;
	mailrep = document.getElementById("repmail").value;
	if(mail == mailrep){
		mailsBien = 1;
		document.getElementById("mail").className="bien";
		document.getElementById("repmail").className="bien";
	}
	else{
		document.getElementById("mail").className="error";
		document.getElementById("repmail").className="error";
	}
	
}

function confirmarRegistro(){
	var campoChecar;	
	var campos = document.getElementsByTagName("input");
	for(i = 0;i< campos.length;i++){
		if(campoChecar.value.length==0 || campoChecar.value.charAt(0) == ' '|| campoChecar.value =="" || campoChecar.value == null){
			alert("No puedes dejar los campos especificados en blanco.");
			campoChecar.focus();
			campoChecar.className="error";
			return false;
		}
	}
	checarUsuario();
	checarPassword();
	checarMail();
	if(usuarioBien == 0){
		alert("El nombre de usuario ya esta ocupado.");	
		return false;
	}
	if(passwordsBien == 0){
		alert("Los passwords no coinciden.");	
		return false;
	}
	if(mailsBien == 0){
		alert("Los mails no coinciden.");	
		return false;
	}
	if(!isValidEmail(document.getElementById("mail").value)){
		alert("El e-mail que insertaste no es valido.");
		return false;
	}
	return true;
}

// JavaScript Document
function enviarTexto(){
	request = crearReq();
	if(request == null){
		alert("No se pudo crear request");
	}else{
		var campoChecar= document.getElementById("oracion");
		if(campoChecar.value.length==0 || campoChecar.value.charAt(0) == ' '|| campoChecar.value =="" || campoChecar.value == null){
			return false;
		}
		var texto = document.getElementById("oracion").value;
		var insertarTexto = escape(texto);
		var url = "insertar.php?emisor="+document.getElementById("emisor").value+"&receptor="+document.getElementById("destinatario").value+"&insertarTexto="+insertarTexto;
		request.onreadystatechange = enviarOraciones;
		request.open("GET",url,true);
		request.send(null);
	}
}
function enviarOraciones(){
	if(request.readyState == 4){
		if(request.status == 200){
			if(request.responseText=="listo"){
				document.getElementById("oracion").value = "";
			}
		}
	}
}
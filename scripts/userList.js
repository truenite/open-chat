// JavaScript Document// JavaScript Document
window.onload=initPagina;
var arregloVentanas = new Array();
var url;

function initPagina(){
	pedirRefrescar();
	pedirVentanasPrivadas();
	checarVentana();
}
function pedirRefrescar(){
	request = crearReq();
	if(request == null){
		alert("No se pudo crear request");
	}else{
		var url = "userList.php";  // mi archivo
		request.onreadystatechange = mostrarNuevasOraciones;
		request.open("GET",url,true);
		request.send(null);
	}
}
function mostrarNuevasOraciones(){
	if(request.readyState == 4){
		if(request.status == 200){
			if(request.responseText=="nohaynuevos"){
				setTimeout("pedirRefrescar()",1000);
			}else{
				document.getElementById("userList").innerHTML = request.responseText;
				
				setTimeout("pedirRefrescar()",1000);
			}
		}
	}
}

function pedirVentanasPrivadas(){
	request2 = crearReq();
	if(request2 == null){
		alert("No se pudo crear request");
	}else{
		var url = "crearVentanaPrivada.php";
		request2.onreadystatechange = crearVentanaPrivada;
		request2.open("GET",url,true);
		request2.send(null);
	}
}
function crearVentanaPrivada(){
	if(request2.readyState == 4){
		if(request2.status == 200){
			eval(request2.responseText);
			setTimeout("pedirVentanasPrivadas()",1000);
		}
	}
}
function checarVentanaPrivada(emisor,receptor){
	url = "http://localhost/Chat/privateChat.php?emisor="+emisor+"&receptor="+receptor;
	url2 = "http://localhost/Chat/privateChat.php?emisor="+receptor+"&receptor="+emisor;
	var existe = 0;
	try{
		for(i = 0; i< arregloVentanas.length; i++){
			try{
				if(arregloVentanas[i].location == url || arregloVentanas[i].location == url2){
					existe=1;
				}
			}catch(e){
				arregloVentanas[i] = null;
			}
		}
	}
	catch(e){
		alert(e);
	}
	if(existe == 0){
		arregloVentanas[arregloVentanas.length] = window.open(url,emisor,'height=400,width=500');
	}
}
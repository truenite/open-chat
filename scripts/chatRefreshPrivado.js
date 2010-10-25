// JavaScript Document
window.onload=initPagina;
var contadorSecundario = 100;

function initPagina(){
	try{
		pedirRefrescar();
	}
	catch(e){
		alert(e);	
	}
}
function pedirRefrescar(){
	request = crearReq();
	if(request == null){
		alert("No se pudo crear request");
	}else{
		var url = "refrescar.php?emisor="+document.getElementById("emisor").value+"&receptor="+document.getElementById("destinatario").value;
		request.onreadystatechange = mostrarNuevasOraciones;
		request.open("GET",url,true);
		request.send(null);
	}
}
function mostrarNuevasOraciones(){
	if(request.readyState == 4){
		if(request.status == 200){
			if(request.responseText=="nohaynuevos"){
				contadorSecundario = 100;
				setTimeout("pedirRefrescar()",1000);
			}else{
				document.getElementById("centroChat").innerHTML = document.getElementById("centroChat").innerHTML+request.responseText;
				document.getElementById("centroChat").scrollTop = document.getElementById("centroChat").scrollHeight;
				contadorSecundario = 100;
				setTimeout("pedirRefrescar()",1000);
			}
		}
	}
}
function contadorSecundario(){ 
	if (contadorSecundario==70){ 
		
	}
	else{
		if(contadorSecundario==0){
			
		}
		else{
			contadorSecundario-=1;
			setTimeout("contadorSecundario()",1000);
		}
	}
} 
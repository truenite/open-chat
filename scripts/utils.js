function crearReq(){
	var request = null;
	try{
		request = new XMLHttpRequest();
	}
	catch(tryMS){
		try{
			request = new ActiveXObject("Msxml2.XMLHTTP");
		}catch(otherMS){
			try{
				request = new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(failed){
				request = null;
			}
		}
	}
	return request;
}

function isValidEmail(email) {
    if (! allValidChars(email)) {  // check to make sure all characters are valid
        return false;
	}
    if (email.indexOf("@") < 1) { //  must contain @, and it must not be the first character
        return false;
    } 
	else
		if (email.lastIndexOf(".") <= email.indexOf("@")) {  // last dot must be after the @
        	return false;
    	}
		else 
			if (email.indexOf("@") == email.length) {  // @ must not be the last character
        		return false;
    		}
			else 
				if (email.indexOf("..") >=0) { // two periods in a row is not valid
					return false;
    			} 
				else 
					if (email.indexOf(".") == email.length) {  // . must not be the last character
						return false;
    				}
    return true;
}

function allValidChars(str) {
  var parsed = true;
  var validchars = "abcdefghijklmnopqrstuvwxyz0123456789@.-_";
  for (var i=0; i < str.length; i++) {
    var letter = str.charAt(i).toLowerCase();
    if (validchars.indexOf(letter) != -1)
      continue;
    parsed = false;
    break;
  }
  return parsed;
}
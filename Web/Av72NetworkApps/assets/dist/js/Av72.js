if (typeof jQuery === "undefined") {
    throw new Error("Av72 requires jQuery");
}

function _encodePassword(param){
    var encodedPassword = param;
    for(var i=0; i<7; i++){
        encodedPassword = btoa(encodedPassword);
    }
    return encodedPassword;
}

function _decodePassword(param){
    var decodedPassword = param;
    for(var i=0; i<7; i++){
        decodedPassword = atob(decodedPassword);
    }
    return decodedPassword;
}

function _checkLengthPassword(param){
    var password = $("#"+param).val();
    var passwordLength = password.length
    if(passwordLength > 0){
        if(passwordLength >= 8){
            return true;
        }else{
            return false;
        }
    }else{
        return true;
    }
}

function _comparePassword(param1, param2){
    var result = "";

    if(param1.indexOf('#') == -1){
        param1 = "#"+param1;
    }

    if(param2.indexOf('#') == -1){
        param2 = "#"+param2;
    }

    if($(param1).length != 1){
        var flags = 1;
    }else if($(param2).length != 1){
        var flags = 2;
    }else if($(param1).length != 1 && $(param2).length != 1){
        var flags = 3;
    }else{
        var flags = 0;
    }

    switch(flags){
        case 1 : result = "ID PASSWORD TIDAK DITEMUKAN!"; break;
        case 2 : result = "ID KONFIRMASI PASSWORD TIDAK DITEMUKAN!"; break;
        case 3 : result = "ID PASSWORD DAN KONFIRMASI PASSWORD TIDAK DITEMUKAN!"; break;
        default : break;
    }

    if(flags == 0){
        var password = $(param1).val();
        var confirmPassword = $(param2).val();
        if(password == confirmPassword){
            result = true;
        }else{
            result = false;
        }
    }

    return result;
}
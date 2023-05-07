function cNombre(el_objeto) {
    var strLongitud = el_objeto.value.length;
    document.getElementById("chNombre").style.margin = "0em -.1875";
    document.getElementById("chNombre").innerHTML = strLongitud.toString().trim();
}
function cBuscar(el_objeto) {
    var strLongitud = el_objeto.value.length;
    document.getElementById("chBuscar").style.margin = "0em -.1875em 0em 0em";
    document.getElementById("chBuscar").innerHTML = strLongitud.toString().trim();
}
function cApellido(el_objeto) {
    var strLongitud = el_objeto.value.length;
    document.getElementById("chApellido").style.margin = "0em -.1875em";
    document.getElementById("chApellido").innerHTML = strLongitud.toString().trim();
}
function cNomCom(el_objeto) {
    var strLongitud = el_objeto.value.length;
    document.getElementById("chNomCom").style.margin = "0em -.1875em";
    document.getElementById("chNomCom").innerHTML = strLongitud.toString().trim();
}
function cNValor(el_objeto) {
    var strLongitud = el_objeto.value.length;
    document.getElementById("chNValor").style.margin = "0em -.1875em";
    document.getElementById("chNValor").innerHTML = strLongitud.toString().trim();
}
function cUsuario(el_objeto) {
    var strLongitud = el_objeto.value.length;
    document.getElementById("chUsuario").style.margin = "0em -.1875em";
    document.getElementById("chUsuario").innerHTML = strLongitud.toString().trim();
}
function cPass(el_objeto) {
    var strLongitud = el_objeto.value.length;
    document.getElementById("chPass").style.margin = "0em -.1875em";
    document.getElementById("chPass").innerHTML = strLongitud.toString().trim();
}
function cKeyPass(el_objeto) {
    var strLongitud = el_objeto.value.length;
    document.getElementById("chKeyPass").style.margin = "0em -.1875em";
    document.getElementById("chKeyPass").innerHTML = strLongitud.toString().trim();
}
function cEMail(el_objeto) {
    var strLongitud = el_objeto.value.length;
    document.getElementById("chEMail").style.margin = "0em -.1875em";
    document.getElementById("chEMail").innerHTML = strLongitud.toString().trim();
}
function cItem(el_objeto) {
    var strLongitud = el_objeto.value.length;
    document.getElementById("chItem").style.margin = "0em -.1875em";
    document.getElementById("chItem").innerHTML = strLongitud.toString().trim();
}
function cSubItem(el_objeto) {
    var strLongitud = el_objeto.value.length;
    document.getElementById("chSubItem").style.margin = "0em -.1875em";
    document.getElementById("chSubItem").innerHTML = strLongitud.toString().trim();
}
function cUrl(el_objeto) {
    var strLongitud = el_objeto.value.length;
    document.getElementById("chUrl").style.margin = "0em -.1875em";
    document.getElementById("chUrl").innerHTML = strLongitud.toString().trim();
}
function cIUDatP(el_objeto) {
    var strLongitud = el_objeto.value.length;
    var strContenn = el_objeto.value;
    if (strLongitud <= 12) {
        document.getElementById("chIUDatPer").style.margin = "0em -.1875em";
        document.getElementById("chIUDatPer").innerHTML = strLongitud.toString().trim();
    } else {
        document.getElementById("txtIUDatPer").value = strContenn.substr(0, 12);
    }
}
//var maxLongitud = el_objeto.maxLength;
//var strRestantes = maxLongitud - strLongitud;
// Esquema Abierto
/*if(strLongitud > maxLongitud){
    document.getElementById("charNum").innerHTML = '<span style="color: red;">Ha excedido el límite de ' + maxLongitud + ' caracteres</span>';
}else{
    document.getElementById("charNum").innerHTML = strLongitud + ' caracteres de ' + strRestantes + ' restantes';
}*/
    //document.getElementById("oApellido").style.display = "none";
    //document.getElementById("chApellido").style.margin = "0em 0.3em 0em 0em";
    //document.getElementById("chApellido").innerHTML = strLongitud + ' caracteres de ' + strRestantes + ' restantes...';

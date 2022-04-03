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

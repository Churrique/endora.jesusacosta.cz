function cuentalos(el_objeto){
    var maxLongitud = el_objeto.maxlength;
    var strLongitud = el_objeto.value.length;
    if(strLongitud > maxLongitud){
        document.getElementById("charNum").innerHTML = '<span style="color: red;">Ha excedido el límite de ' + maxLongitud + ' caracteres</span>';
    }else{
        document.getElementById("charNum").innerHTML = strLongitud + ' caracteres de' + maxLongitud + ' restantes';
    }
}
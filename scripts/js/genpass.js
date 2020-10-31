function GeneraContrasena (largo,caresp) {
    document.getElementById("temporal").innerHTML = largo;
    //multiplicar por (máximo-mínimo)+1
    // índice de 0..9
    var numeros = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9"];
    // índice de 0..25
    var mayusculas = ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z"];
    var minusculas = ["a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z"];
    var quetoca = ["Números", "Mayúsculas", "Minúsculas"];
    var nuevovalor = "";
    var i_que_toca = 0;
    for(var i=0; i<largo; i++) {
        var i_may = 0;
        var i_min = 0;
        var i_num = 0;
        i_que_toca = Math.floor(Math.random()*3);
        switch(i_que_toca) {
            case 0:
                i_num = Math.floor(Math.random()*10);
                nuevovalor += numeros[i_num];
                break;
            case 1:
                i_may = Math.floor(Math.random()*26);
                nuevovalor += mayusculas[i_may];
                break;
            default:
                i_min = Math.floor(Math.random()*26);
                nuevovalor += minusculas[i_min];
                break;
        }
        //document.getElementById("corrida").innerHTML = "<br>" + i + " " + nuevovalor;
    }
    if(caresp !== "") {
        var subcadena = "";
        var i_sub = Math.floor(Math.random()*largo);
        for(var i=0; i<(largo+1); i++) {
            if (i == i_sub) {
                subcadena += caresp;
            }
            else {
                subcadena += nuevovalor.substr(i, 1);
            }
        }
        subcadena = nuevovalor.substr(i_sub, 1);
        document.getElementById("contrasena").value = subcadena;
    }
    else {
        document.getElementById("contrasena").value = nuevovalor;
    }
}
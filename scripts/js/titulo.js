var el_texto = document.title;
var espera = 100;
var refresca = null;
function mueve_el_titulo(){
  document.title = el_texto;
  el_texto = el_texto.substring(1, el_texto.length) + el_texto.charAt(0);
  refresca = setTimeout("mueve_el_titulo()", espera);
}
mueve_el_titulo();

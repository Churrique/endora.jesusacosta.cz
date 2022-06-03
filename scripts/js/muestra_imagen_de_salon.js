function MontaImagenSalonDeClases(min, max) {
  //* Aleatorio * max -> Da un valor entre 0 y 3 => + min -> Da un valor entre 1 y 4
  let vn = Math.floor( ( Math.random() * max ) + min);
  let str_vn = vn.toString();
  let txt_vn = "";
  txt_vn = "url(../../demo/academico/img/jpg/foto" + str_vn + ".jpg)";
  document.querySelector("body#backgroundimage").style.backgroundImage = txt_vn;
}

function MontaImagen() {
    let vn = Math.floor(Math.random() * 24);
    let str_vn = vn.toString();
    let txt_vn = "";
    if (str_vn.length == 1) {
      txt_vn = "url(../img/coches/fondo_coche_0" + str_vn + ".jpg)";
    }
    else {
      txt_vn = "url(../img/coches/fondo_coche_" + str_vn + ".jpg)";
    }
    document.querySelector("body#imagendefondo").style.backgroundImage = txt_vn;
  }

function trigger_click_in_dp (pid) {
  let k1 = document.getElementById("txt_id_dat" + pid);
  let k2 = document.getElementById("txt_id_doc" + pid);
  let k4 = document.getElementById("txtNValor");
  let targetURL = "datos_personales_ingfor.php?k1=" + k1.value + "&k2=" + k2.value + "&k4=" + k4.value;
  let newURL = document.createElement('a');
  newURL.href = targetURL;
  document.body.appendChild(newURL);
  newURL.click();
  // ? Aquí, logramos la redirección mediante:
  // ?
  // ? Creación de un elemento de etiqueta de anclaje document.createElement('a');
  // ? Configuración de la propiedad href con la nueva URL newURL.href = targetURL
  // ? Adjuntar la etiqueta creada dinámicamente al nodo DOM con document.body.appendChild(newURL)
  // ? Finalmente, invocándolo emulando a un usuario, haga clic en newURL.click()
  // ? El navegador cargará la nueva URL.
}

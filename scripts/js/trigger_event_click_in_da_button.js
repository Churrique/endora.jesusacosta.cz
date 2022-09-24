// ?
// ! Llamada desde DATOS_ADICIONALES.PHP
// ?
function trigger_click_in_add (p1_ns, p2_messaje) {
  let targetURL = "plantilla_busqueda.php?ns=" + p1_ns + "&message=" + p2_messaje;
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

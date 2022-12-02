function s_and_c() {
  if (confirm('¿Quiere enviar la información de este formulario?')) {
     document.frmLogIn.submit();
     alert("Su formulario ha sido enviado...!");
  }
  alert("Voy a cerrar la ventana...!");
  window.close();
}
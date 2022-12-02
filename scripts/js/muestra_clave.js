  function MostrarClave(p_imagen){
    var tipo = document.getElementById("txtPass");
      if(tipo.type == "password"){
          tipo.type = "text";
          p_imagen.src = "../demo/academico/img/frm/eye-slash-fill.svg"
          tipo.style.width = 16 + "em";
      }else{
          tipo.type = "password";
          p_imagen.src = "../demo/academico/img/frm/eye-fill.svg"
      }
  }

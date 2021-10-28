function BuscaIdioma() {
  var slct_change = document.getElementById("sltLista");
  switch (slct_change.value) {
    case "Čeština":
    case "Czech":
      document.location.href = "/rfc/cs";
      break
    case "English":
    case "Anglický":
      alert("You will be redirected to the English page...!");
      document.location.href = "/rfc/en";
      break
    default : // Español || Spanish || Španělský
    alert("Usted va a ser redirigido a la página en Español...!");
    document.location.href = "../../index.html";
  }
}

function JoinTextBoxs() {
  var first_name = document.getElementById('txtNombre').value;
  var second_name = document.getElementById('txtApellido').value;
  var full_name = first_name + " " + second_name;
  document.getElementById("txtNomCom").value = full_name;
  document.getElementById("chNomCom").innerHTML = full_name.length.toString().trim();
}
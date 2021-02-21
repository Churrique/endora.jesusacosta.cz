function m_l_p_8_c() {
    document.getElementById("pra_linea").style.display = "block";
    document.getElementById("desplegar1").style.display = "block";
    document.getElementById("mas1").style.display = "none";
}
function o_l_p_8_c() {
    document.getElementById("desplegar1").style.display = "none";
    document.getElementById("mas1").style.display = "block";
}
function m_l_u_8_c() {
    //document.getElementById("menos1").style.display = "none";
    //document.getElementById("mas2").style.display = "none";
    document.getElementById("pra_linea").style.display = "none";
    document.getElementById("desplegar2").style.display = "block";
}
function limpia_el_texto() {
    document.getElementById("contrasena").value = "";
}
function oculta_todo() {
    document.getElementById("desplegar1").style.display = "none";
    document.getElementById("desplegar2").style.display = "none";
    document.getElementById("mas1").style.display = "block";
}

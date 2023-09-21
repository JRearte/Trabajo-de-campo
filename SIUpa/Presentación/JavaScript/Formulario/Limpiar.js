/**-----------------USUARIO -------------**/
function limpiarCamposUsuario() 
{
    document.getElementById("idLegajo").value = ' ';//sobrecarga para evitar los required input
    document.getElementById("idNombre").value = ' ';
    document.getElementById("idApellido").value = ' ';
    document.getElementById("idContrasenia").value = ' ';
}

function limpiarCamposUsuario2()
{
    document.getElementById("idLegajo2").value = ' ';
    document.getElementById("idNombre2").value = ' ';
    document.getElementById("idApellido2").value = ' ';
    document.getElementById("idContrasenia2").value = ' ';
}

/**--------------- SALA -----------**/
function limpiarCamposSala()
{
    /** FORMULARIO SALA **/
    document.getElementById("idNombre").value = ' ';
    document.getElementById("idEdad").value = ' ';
    document.getElementById("idCapacidad").value = ' ';
}


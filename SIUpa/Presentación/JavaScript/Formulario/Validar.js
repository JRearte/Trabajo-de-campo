/**
 * Validación del campo LEGAJO, donde solo se podra usar números y simbolos.
 */
document.getElementById('idLegajo').addEventListener('keydown', function(event)
{
    var tecla = event.key;
    var regex = /^[0-9\s\W]+$/; //Expresión regular que permite números y símbolos

    if (!(regex.test(tecla) || tecla === 'Backspace' || tecla.startsWith('Arrow'))|| tecla === ' ') 
    {
        event.preventDefault();
    }
});



/**
 * Validación del campo NOMBRE, donde solo se podra usar letras
 * Permitiendo que cada nombre inicie con una mayuscula y el resto minusculas.
 */
document.getElementById('idNombre').addEventListener('keydown', function(event) 
{
    var entradaElemento = event.target;
    var entradaDatos = entradaElemento.value;
    var corrector = '';

    var tecla = event.key;
    var regex = /^[a-zA-Z]*$/; //Expresión regular que permite solo letras

    entradaDatos = entradaDatos.toLowerCase();  //Coloca la primera letra en mayúscula y el resto en minúscula
    corrector = entradaDatos.replace(/\b\w/g, function(txt) 
    {
        return txt.charAt(0).toUpperCase() + txt.substr(1);
    });

    entradaElemento.value = corrector;   // Actualiza el valor de la entrada cuando se da un espacio
    
    if (!(regex.test(tecla) || tecla === 'Backspace' || tecla.startsWith('Arrow')|| tecla === ' ')) 
    {
        event.preventDefault();
    }
});



/**
 * Validación del campo APELLIDO, donde solo se podra usar letras
 * Permitiendo que cada apellido inicie con una mayuscula y el resto minusculas.
 */
document.getElementById('idApellido').addEventListener('keydown', function(event) 
{
    var entradaElemento = event.target;
    var entradaDatos = entradaElemento.value;
    var corrector = '';

    var tecla = event.key;
    var regex = /^[a-zA-Z]*$/; //Expresión regular que permite solo letras

    entradaDatos = entradaDatos.toLowerCase();  //Coloca la primera letra en mayúscula y el resto en minúscula
    corrector = entradaDatos.replace(/\b\w/g, function(txt) 
    {
        return txt.charAt(0).toUpperCase() + txt.substr(1);
    });

    entradaElemento.value = corrector;   // Actualiza el valor de la entrada cuando se da un espacio
    
    if (!(regex.test(tecla) || tecla === 'Backspace' || tecla.startsWith('Arrow')|| tecla === ' ')) 
    {
        event.preventDefault();
    }
});

/**------------------------ MODIFICAR USUARIO ---------------------------**/
/**
 * Validación del campo LEGAJO, donde solo se podra usar números y simbolos.
 */
document.getElementById('idLegajo2').addEventListener('keydown', function(event)
{
    var tecla = event.key;
    var regex = /^[0-9\s\W]+$/; //Expresión regular que permite números y símbolos

    if (!(regex.test(tecla) || tecla === 'Backspace' || tecla.startsWith('Arrow'))|| tecla === ' ') 
    {
        event.preventDefault();
    }
});



/**
 * Validación del campo NOMBRE, donde solo se podra usar letras
 * Permitiendo que cada nombre inicie con una mayuscula y el resto minusculas.
 */
document.getElementById('idNombre2').addEventListener('keydown', function(event) 
{
    var entradaElemento = event.target;
    var entradaDatos = entradaElemento.value;
    var corrector = '';

    var tecla = event.key;
    var regex = /^[a-zA-Z]*$/; //Expresión regular que permite solo letras

    entradaDatos = entradaDatos.toLowerCase();  //Coloca la primera letra en mayúscula y el resto en minúscula
    corrector = entradaDatos.replace(/\b\w/g, function(txt) 
    {
        return txt.charAt(0).toUpperCase() + txt.substr(1);
    });

    entradaElemento.value = corrector;   // Actualiza el valor de la entrada cuando se da un espacio
    
    if (!(regex.test(tecla) || tecla === 'Backspace' || tecla.startsWith('Arrow')|| tecla === ' ')) 
    {
        event.preventDefault();
    }
});



/**
 * Validación del campo APELLIDO, donde solo se podra usar letras
 * Permitiendo que cada apellido inicie con una mayuscula y el resto minusculas.
 */
document.getElementById('idApellido2').addEventListener('keydown', function(event) 
{
    var entradaElemento = event.target;
    var entradaDatos = entradaElemento.value;
    var corrector = '';

    var tecla = event.key;
    var regex = /^[a-zA-Z]*$/; //Expresión regular que permite solo letras

    entradaDatos = entradaDatos.toLowerCase();  //Coloca la primera letra en mayúscula y el resto en minúscula
    corrector = entradaDatos.replace(/\b\w/g, function(txt) 
    {
        return txt.charAt(0).toUpperCase() + txt.substr(1);
    });

    entradaElemento.value = corrector;   // Actualiza el valor de la entrada cuando se da un espacio
    
    if (!(regex.test(tecla) || tecla === 'Backspace' || tecla.startsWith('Arrow')|| tecla === ' ')) 
    {
        event.preventDefault();
    }
});


/*************************************************************************************************/

/**
 * Permite validar la entrada de Legajo, evitando que el usuario ingrese uno existente o
 * uno que sea menor a los 13 caracteres, anulando el boton de guardar y tirando mensajes.
 * @returns 
 */
function obtenerEntradaLegajo() 
{
    var arreglo = obtenerArregloUsuarios();
    var valor = document.getElementById('idLegajo').value;

    for (var i = 0; i < arreglo.length; i++)
    {
        if (arreglo[i].legajo === valor) 
        {
            document.getElementById('mensaje_longitud').style.display = "none";
            document.getElementById('mensaje_exito').style.display = "none";
            document.getElementById('mensaje_error').style.display = "block";
            document.getElementById('guardar').disabled = true;
            return
        } 
    }
    if(valor.length === 13)
    {
        document.getElementById('mensaje_longitud').style.display = "none";
        document.getElementById('mensaje_error').style.display = "none";
        document.getElementById('mensaje_exito').style.display = "block";
        document.getElementById('guardar').disabled = false;
        return
    }
    else
    {
        document.getElementById('mensaje_longitud').style.display = "block";
        document.getElementById('mensaje_exito').style.display = "none";
        document.getElementById('mensaje_error').style.display = "none";
        document.getElementById('guardar').disabled = true;
        return
    }
}



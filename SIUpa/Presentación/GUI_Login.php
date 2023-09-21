<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!---------------------------- CSS ----------------------------------->
    <link rel = "stylesheet" href = "./css/Login.css?1">

    <!------------------------ JAVASCRIPT --------------------------------> 
    <script src = "JavaScript/Formulario/Validar.js?3" defer></script>
    <script src = "JavaScript/Formulario//Password.js" defer></script>
    <script src = "JavaScript/Scroll.js" defer></script>

    <!------------------------ LLAMADAS PHP ------------------------------>
    <?php require_once("../Dato/CRUD_Usuario.php"); ?>
    <?php require_once("../Lógica/Usuario.php"); ?>
    <title>Login</title>
</head>

<body>
    <!-- FONDO DE PANTALLA -->
    <div class = "estrella">
                <span style = "--i:1;"></span>
                <span style = "--i:2;"></span>
                <span style = "--i:3;"></span>
                <span style = "--i:4;"></span>
                <span style = "--i:5;"></span>
                <span style = "--i:6;"></span>
                <span style = "--i:7;"></span>
                <span style = "--i:8;"></span>
                <span style = "--i:9;"></span>
                <span style = "--i:10;"></span>
                <span style = "--i:11;"></span>
                <span style = "--i:12;"></span>
                <span style = "--i:13;"></span>
                <span style = "--i:14;"></span>
                <span style = "--i:15;"></span>
                <span style = "--i:16;"></span>
                <span style = "--i:17;"></span>
                <span style = "--i:18;"></span>
                <span style = "--i:19;"></span>
                <span style = "--i:20;"></span>
    </div>
    <div class = "luna"></div>
    <div class = "nube"></div>
    <div class = "nube2"></div>
    <div class = "nube3"></div>
    <div class = "nube4"></div>
    <!-- FONDO DE PANTALLA -->


    <div class = "login-box">
        <form method = "post">
            
            <!--Legajo de usuario-->
            <input type = "text" placeholder = "Ingrese legajo" maxlength = 13 name = "txtUsuario" class = "txtUsuario" autocomplete = "off" id = 'idLegajo' required>
            <img src = "./css/imagen/usuario.png" class = "usuario">

            <!--Contraseña-->
            <input type = "password" placeholder = "Ingrese Contraseña" maxlength = 20 name = "txtPassword" class = "txtContrasenia" id = "idContrasenia" required>  
            <img src = "./css/imagen/ocultar.png" id = "ojo" class = "visual">
            <img src = "./css/imagen/contraseña.png" class = "contrasenia">

            <input type = "submit" value = "Ingresar" name = "btnIngresar" class = "btnIngresar">
            
            <?php
            if(isset($_POST["btnIngresar"]))
            {
                $usuario = new Usuario(0,'','','','','');
                $legajo = $_POST['txtUsuario'];
                $contrasenia = $_POST['txtPassword'];
                $tipo_usuario = $usuario->validarUsuario($legajo,$contrasenia);

                if($tipo_usuario === 'Coordinador')
                {
                    echo '<script>window.location = "../Presentación/GUI_Menú.php"</script>';
                    exit();
                }
                elseif($tipo_usuario === 'Maestro')
                {
                    echo 'PROXIMAMENTE INTERFAZ MAESTRO';
                }
                else
                {
                    echo '<p class = mensaje >El usuario es invalido 😡</p>';
                }
            }
            ?>
    </div>
    
</body>
</html>
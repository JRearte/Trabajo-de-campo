<?php

require 'Persona.php';

class Usuario extends Persona implements JsonSerializable
{
    private string $legajo;
    private string $categoria;
    private string $contrasenia;
    
    function __construct(int $id, string $legajo, string $nombre, string $apellido,  string $categoria, string $contrasenia)
    {
        parent::__construct($id,$nombre,$apellido);
        $this->legajo = $legajo;
        $this->categoria = $categoria;
        $this->contrasenia = $contrasenia;
    }

    public function getLegajo():string
    {
        return $this->legajo;
    }

    public function setLegajo(string $legajo):void
    {
        $this->legajo = $legajo;
    }

    public function getCategoria():string
    {
        return $this->categoria;
    }

    public function setCategoria(string $categoria):void
    {
        $this->categoria = $categoria;
    }

    public function getContrasenia():string
    {
        return $this->contrasenia;
    }

    public function setContrasenia(string $contrasenia):void
    {
        $this->contrasenia = $contrasenia;
    }

    public function __toString():string
    {
        return "ID = ".$this->getId()." Legajo = ".$this->getLegajo()." Nombre = ".$this->getNombre() . " Apellido = ".$this->getApellido()." Categoria = ".$this->getCategoria() ." Contraseña = ".$this->getContrasenia();
    }

/*******************************************************************************************************************************/
    /**
     * Permite convertir los datos del objeto Usuario a JSON
     * para su manejo dentro de las funciones JavaScript.
     */
    public function jsonSerialize() //similar al toString, pero es para visualizar datos en la consola del navegador
    {
        return [
            'id' => $this->getId(),
            'legajo' => $this->getLegajo(),
            'nombre' => $this->getNombre(),
            'apellido' => $this->getApellido(),
            'categoria' => $this->getCategoria(),
            'contrasenia' => $this->getContrasenia()
        ];
    }

    /**
     * Obtiene una lista de usuarios a partir de los datos obtenidos de la capa de datos CRUD_Usuario.
     * @return array Un array de objetos Usuario que representa la lista de usuarios.
     */
    public function listarUsuarios():array
    {
        try
        {
            $crudUsuario = new CRUD_Usuario(); 
            $datosUsuario = $crudUsuario->listarUsuarios();
            foreach ($datosUsuario as $datoUsuario) 
            {
                $usuario = new Usuario(
                    $datoUsuario['id_usuario'],
                    $datoUsuario['Legajo'],
                    $datoUsuario['Nombre'],
                    $datoUsuario['Apellido'],
                    $datoUsuario['Categoria'],
                    $datoUsuario['Contrasenia']
                );
                $usuarios[] = $usuario;
            }
            return $usuarios;
        }
        catch(Exception $ex)
        {
            echo 'En la linea '.$ex->getLine().' se produjo el error '.$ex->getMessage().
            ', del archivo ubicado en: '.$ex->getFile();
            die();
        }
    }
    

    /**
     * Reutiliza el metodo listarUsuarios de la capa lógica para:
     * → obtener un usuario específico a partir de su ID.
     * → optimizar la reducción de código en el CRUD_Usuario.
     * @param int $id → El identificado principal del usuario dentro del código.
     * @return Usuario → El objeto que representa al Usuario junto a todos sus datos.
     */
    public function obtenerUsuario(int $id): Usuario
    {
        try
        {
            $datoUsuarios = $this->listarUsuarios();
            foreach ($datoUsuarios as $datoUsuario) 
            {
                if ($datoUsuario->getID() === $id) 
                {
                    return $datoUsuario;
                }
            }
        }
        catch(Exception $ex)
        {
            echo 'En la linea '.$ex->getLine().' se produjo el error '.$ex->getMessage().
            ', del archivo ubicado en: '.$ex->getFile();
            die();
        }
    }


    /**
     * Reutiliza el metodo listarUsuarios de la capa lóogica para:
     * → obtener un usuario especifico a partir de su legajo y contraseña,
     *   con esto realiza la validación de usuario junto a su categoria.
     * @param string $legajo → Es el dato con el que se identifica el usuario en su dominio.
     * @param string $contrasenia → Es la medida de seguridad para el usuario.
     * @return string valores en caracteres
     */
    public function validarUsuario(string $legajo, string $contrasenia): string
    {
        try
        {
            $datoUsuarios = $this->listarUsuarios();
            foreach ($datoUsuarios as $datoUsuario) 
            {
                if ($datoUsuario->getLegajo() === $legajo && $datoUsuario->getContrasenia() === $contrasenia)
                {
                    if ($datoUsuario->getCategoria() === 'Coordinador')
                    {
                        return 'Coordinador';
                    }
                    else
                    {
                        return 'Maestro';
                    }
                }
            }
            return 'Invalido';
        }
        catch(Exception $ex)
        {
            echo 'En la linea '.$ex->getLine().' se produjo el error '.$ex->getMessage().
            ', del archivo ubicado en: '.$ex->getFile();
            die();
        }
    }


    /**
     * Permite la negociación de los datos para dar el alta de un nuevo usuario
     * @param string $legajo → El dato con el que se identifica el usuario en su dominio.
     * @param string $nombre → El nombre principal de la identidad del usuario.
     * @param string $apellido → El identificador familiar del usuario.
     * @param string $categoria → El dato principal que designara los permisos que se le dara al usuario.
     * @param string $contrasenia → La medida de seguridad para el usuario.
     * @return void No devuelve nada despues de su ejecución.
     */
    public function darAltaUsuario(string $legajo, string $nombre, string $apellido, string $categoria, string $contrasenia):void
    {
        $usuario = new Usuario(0, $legajo, $nombre, $apellido, $categoria, $contrasenia);
        $crud = new CRUD_Usuario();
        $crud->darAltaUsuario($usuario);
    }


    /**
     * Permite la negociación de los datos para la modificación de un usuario
     * @param int $id → El identificado principal del usuario dentro del código.
     * @param string $legajo → El dato con el que se identifica el usuario en su dominio.
     * @param string $nombre → El nombre principal de la identidad del usuario.
     * @param string $apellido → El identificador familiar del usuario.
     * @param string $categoria → El dato principal que designara los permisos que se le dara al usuario.
     * @param string $contrasenia → La medida de seguridad para el usuario.
     * @return void No devuelve nada despues de su ejecución.
     */
    public function modificarUsuario(int $id,string $legajo, string $nombre, string $apellido, string $categoria, string $contrasenia):void
    {
        $usuario = new Usuario($id, $legajo, $nombre, $apellido, $categoria, $contrasenia);
        $crud = new CRUD_Usuario(); 
        $crud->modificarUsuario($usuario);
    }

    
    /**
     * Permite la negociación de los datos para dar la baja de un usuario
     * @param int $id → El identificado principal del usuario dentro del código.
     * @return void No devuelve nada despues de su ejecución.
     */
    public function darBajaUsuario(int $id):void
    {
        $crud = new CRUD_Usuario(); 
        $crud->darBajaUsuario($id);
    }
}
?>


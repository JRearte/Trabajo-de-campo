<?php 

class Sala implements JsonSerializable
{
    private int $id;
    private string $nombre;
    private int $edad;
    private int $capacidad;


    function __construct(int $id, string $nombre, int $edad, int $capacidad)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->capacidad = $capacidad;
        $this->edad = $edad;
    }

    public function getID()
    {
        return $this->id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre)
    {
        $this->nombre = $nombre;
    }

    public function getEdad()
    {
        return $this->edad;
    }

    public function setEdad(int $edad)
    {
        $this->edad = $edad;
    }

    public function getCapacidad()
    {
        return $this->capacidad;
    }

    public function setCapacidad(int $capacidad)
    {
        $this->capacidad = $capacidad;
    }

    public function __toString()
    {
        return "ID = ".$this->getId()." Nombre = ".$this->getNombre() . " Edad = ".$this->getEdad()." Capacidad = ".$this->getCapacidad();
    }

/*********************************************************************************/

    /**
     * Permite convertir los datos del objeto Sala a JSON
     * para su manejo dentro de las funciones JavaScript.
     */
    public function jsonSerialize()
    {
        return [
            'id_sala' => $this->getId(),
            'nombre' => $this->getNombre(),
            'edad' => $this->getEdad(),
            'capacidad' => $this->getCapacidad()
        ];
    }

    /**
     * Obtiene una lista de salas a partir de los datos obtenidos de la capa de datos CRUD_Sala.
     * @return array Un array de objetos Salas que representa la lista de salas.
     */
    public function listarSalas():array
    {
        $crudSala = new CRUD_Sala();
        $salas = [];
        $datosSala = $crudSala->listarSalas();
        foreach($datosSala as $datoSala)
        {
            $sala = new Sala(
                $datoSala['id_sala'],
                $datoSala['Nombre_de_sala'],
                $datoSala['Rango_de_edad'],
                $datoSala['Capacidad']
            );
            $salas[] = $sala;
        }
        return $salas;
    }

    /**
     * Reutiliza el metodo listarSala de la capa lógica para:
     * -> obtener una sala especifica a partir de su ID.
     * -> optimizar la reducción de código en el CRUD_Sala.
     * @param int $id -> El identificador principal de la sala dentro del código.
     * @return Sala -> El objeto que representa a la Sala junto a todos sus datos.
     */
    public function obtenerSala(int $id): Sala
    {
        $datosSala = $this->listarSalas();
        foreach($datosSala as $datoSala)
        {
            if($datoSala->getID() === $id)
            {
                return $datoSala;
            }
        }

    }

    /**
     * Permite la negociación de los datos para dar el alta de una nueva sala.
     * @param string $nombre -> El nombre que identifica a la sala.
     * @param int $edad -> La edad limite que admite la sala.
     * @param int $capacidad -> El valor que determinara cuantos niños pueden estar dentro de la sala.
     * @return void No devuelve nada despues de su ejecución.
     */
    public function darAltaSala(string $nombre,int $edad,int $capacidad):void
    {
        $sala = new Sala(0,$nombre,$edad,$capacidad);
        $crud = new CRUD_Sala();
        $crud->darAltaSala($sala);
    }


    /**
     * Permite la negociación de los datos para la modificación de una sala.
     * @param int $id -> El identificado principal de la sala dentro del código.
     * @param string $nombre -> El nombre que identifica a la sala.
     * @param int $edad -> La edad limite que admite la sala.
     * @param int $capacidad -> El valor que determinara cuantos niños pueden estar dentro de la sala.
     * @return void No devuelve nada despues de su ejecución.
     */
    public function modificarSala(int $id, string $nombre, int $edad,int $capacidad):void
    {
        $sala = new Sala($id,$nombre,$edad,$capacidad);
        $crud = new CRUD_Sala();
        $crud->modificarSala($sala);
    }

    /**
     * Permite la negociación de los datos para dar la baja de una sala.
     * @param int $id -> El identificador principal de la sala dentro del código.
     * @return void No devuelve nada despues de su ejecución.
     */
    public function darBajaSala(int $id):void
    {
        $crud = new CRUD_Sala();
        $crud->darBajaSala($id);
    }
}
?>
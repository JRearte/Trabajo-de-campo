<?php

    require "Persona.php";

    class Familiar extends Persona
    {
        private int $nrodoc;
        private string $tipodoc;
        private string $fechanac; // tipo date (por revisar)
        private string $género; //vinculo

        function __construct(int $id, string $nombre, string $apellido, int $nrodoc, string $tipodoc, string $fechanac, string $género)
        {
            parent::__construct($id,$nombre,$apellido);
            $this->nrodoc = $nrodoc;
            $this->tipodoc = $tipodoc;
            $this->fechanac = $fechanac;
            $this->género = $género;
        }

        public function getNrodoc()
        {
            return $this->nrodoc;
        }

        public function setNrodoc(int $nrodoc)
        {
            $this->nrodoc = $nrodoc;
        }

        public function getTipodoc()
        {
            return $this->tipodoc;
        }

        public function setTipodoc(string $tipodoc)
        {
            $this->tipodoc = $tipodoc;
        }

        public function getFechanac()
        {
            return $this->fechanac;
        }

        public function setFechanac(string $fechanac)
        {
            $this->fechanac = $fechanac;
        }

        public function getGénero()
        {
            return $this->género;
        }

        public function setGénero(string $género)
        {
            $this->género = $género;
        }

        public function __toString()
        {
          return "ID = ".$this->getId() ." Nombre = ".$this->getNombre() . " Apellido = ".$this->getApellido(). " Número de documento = ".$this->getNrodoc(). " Tipo de documento = ".$this->getTipodoc(). " Fecha de nacimiento = ". $this->getFechanac(). " Género = " .$this->getGénero();
        }
    }
?>
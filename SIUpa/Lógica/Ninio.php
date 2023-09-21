<?php

    require "Familiar.php";

    class Ninio extends Familiar
    {
        private string $categoria;
        private string $fechasig; //un date por investigar

        function __construct(int $id, string $nombre, string $apellido, int $nrodoc, string $tipodoc, string $fechanac, string $género ,string $categoria, string $fechasig)
        {
            parent::__construct($id,$nombre,$apellido,$nrodoc,$tipodoc,$fechanac,$género);
            $this->categoria = $categoria;
            $this->fechasig = $fechasig;
        }

        public function getCategoria()
        {
            return $this->categoria;
        }

        public function setCategoria(string $categoria)
        {
            $this->categoria = $categoria;
        }

        public function getFechasig()
        {
            return $this->fechasig;
        }

        public function setFechasig(string $fechasig)
        {
            $this->fechasig = $fechasig;
        }

        public function __toString()
        {
          return "ID = ".$this->getId() ." Nombre = ".$this->getNombre() . " Apellido = ".$this->getApellido(). " Número de documento = ".$this->getNrodoc(). " Tipo de documento = ".$this->getTipodoc(). " Fecha de nacimiento = ". $this->getFechanac(). " Género = " .$this->getGénero(). " Categoria = ".$this->getCategoria(). "Fecha de Asignación = ".$this->getFechasig();
        }
    }
?>
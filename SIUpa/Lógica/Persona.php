<?php

abstract class Persona
{
  private int $id;
  private string $nombre;
  private string $apellido;

  function __construct(int $id, string $nombre, string $apellido)
  {
    $this->id = $id;
    $this->nombre = $nombre;
    $this->apellido = $apellido;
  }

  public function getId()
  {
    return $this->id;
  }

  public function setID(int $id)
  {
    $this->id = $id;
  }

  public function getNombre()
  {
    return $this->nombre;
  }

  public function setNombre(string $nombre)
  {
    $this->nombre = $nombre;
  }

  public function getApellido()
  {
    return $this->apellido;
  }

  public function setApellido(string $apellido)
  {
    $this->apellido = $apellido;
  }
}
?>
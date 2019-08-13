<?php

class Pais
{
    protected $id_pais;
    protected $nombre;
    protected $estados;
    protected $ciudades;

    public function __construct(string $nombre)
    {
        $this->nombre = $nombre;
    }

    public function getIdPais(): int
    {
        return $this->id_pais;
    }

    public function setIdPais(int $id)
    {
        $this->id_pais =$id;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre)
    {
        $this->nombre =$nombre;
    }

    public function getEstados(): ?array
    {
        return $this->estados;
    }

    public function setEstados(array $estados)
    {
        $this->estados =$estados;
    }

    public function getCiudades(): ?array
    {
        return $this->ciudades;
    }

    public function setCiudades(array $ciudades)
    {
        $this->ciudades =$ciudades;
    }

}
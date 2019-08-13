<?php

class Usuario
{
    protected $ID;
    protected $email;
    protected $password;
    protected $idPerfil;
    protected $tipoDoc;
    protected $documento;
    protected $apellido;
    protected $nombre;
    protected $nacimiento;
    protected $telefono;
    protected $calle;
    protected $altura;
    protected $piso;
    protected $dpto;
    protected $ciudad;

    public function __construct($email, $apellido, $nombre, $nacimiento, $documento)
    {
        $this->email = $email;
        $this->apellido = $apellido;
        $this->nombre = $nombre;
        $this->nacimiento = $nacimiento;
        $this->documento = $documento;
    }


    public function getID(): int
    {
        return $this->ID;
    }

    public function setID(int $id)
    {
        $this->ID = $id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    public function setPasswordFromDB($password)
    {
        $this->password = $password;
    }

    public function getIdPerfil(): int
    {
        return $this->idPerfil;
    }

    public function setIdPerfil(int $id)
    {
        $this->idPerfil = $id;
    }

    public function getTipoDoc(): string
    {
        return $this->tipoDoc;
    }

    public function setTipoDoc(string $tipo)
    {
        $this->tipoDoc = $tipo;
    }

    public function getDocumento(): int
    {
        return $this->documento;
    }

    public function setDocumento(int $doc)
    {
        $this->documento = $doc;
    }

    public function getApellido(): string
    {
        return $this->apellido;
    }

    public function setApellido(string $apellido)
    {
        $this->apellido = $apellido;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre)
    {
        $this->nombre = $nombre;
    }

    public function getNacimiento()
    {
        return $this->nacimiento;
    }

    public function setNacimiento($nacimiento)
    {
        $this->nacimiento = $nacimiento;
    }

    public function getTelefono(): ?int
    {
        return $this->telefono;
    }

    public function setTelefono(int $telefono)
    {
        $this->telefono = $telefono;
    }

    public function getCalle(): ?string
    {
        return $this->calle;
    }

    public function setCalle(string $calle)
    {
        $this->calle = $calle;
    }

    public function getAltura(): ?int
    {
        return $this->altura;
    }

    public function setAltura(int $altura)
    {
        $this->altura = $altura;
    }

    public function getPiso(): ?int
    {
        return $this->piso;
    }

    public function setPiso(int $piso)
    {
        $this->piso = $piso;
    }

    public function getDpto()
    {
        return $this->dpto;
    }

    public function setDpto($dpto)
    {
        $this->dpto = $dpto;
    }

    public function getCiudad(): string
    {
        return $this->ciudad;
    }

    public function setCiudad(string $ciudad)
    {
        $this->ciudad = $ciudad;
    }
}

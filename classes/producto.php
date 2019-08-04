<?php

    class Producto
    {
        protected $idProducto;
        protected $name;
        protected $descripcion;
        protected $precio;
        protected $graduacion;
        protected $origen;
        protected $imagen;
        protected $anio;
        protected $volumen;
        protected $idMarcas;
        protected $categoria;

        public function __construct(string $name, string $descripcion, float $precio, int $categoria)
        {
            $this->name = $name;
            $this->descripcion = $descripcion;
            $this->setPrecio($precio);
            $this->categoria = $categoria;
        }

        public function getIdProducto(): int
        {
            return $this->idProducto;
        }

        public function setIdProducto(int $idProducto)
        {
            $this->idProducto =$idProducto;
        }

        public function getName(): string
        {
            return $this->name;
        }

        public function setName(string $name)
        {
            $this->name =$name;
        }

        public function getDescripcion(): ?string
        {
            return $this->descripcion;
        }

        public function setDescripcion(string $descripcion)
        {
            $this->descripcion =$descripcion;
        }

        public function getPrecio(): ?float
        {
            return $this->precio;
        }

        public function setPrecio(float $precio)
        {
            if ($precio > 0) {
                $this->precio = $precio;
            } else {
                return "Precio invalido";
            }
        }

        public function getGraduacion()
        {
            return $this->graduacion;
        }

        public function setGraduacion($graduacion)
        {
            $this->graduacion =$graduacion;
        }

        public function getOrigen(): string
        {
            return $this->origen;
        }

        public function setOrigen(string $origen)
        {
            $this->origen =$origen;
        }

        public function getImagen()
        {
            return $this->imagen;
        }

        public function setImagen($imagen)
        {
            $this->imagen =$imagen;
        }

        public function getAnio()
        {
            return $this->anio;
        }

        public function setAnio($anio)
        {
            $this->anio = $anio;
        }

        public function getVolumen()
        {
            return $this->volumen;
        }

        public function setVolumen($volumen)
        {
            $this->volumen =$volumen;
        }

        public function getidMarcas()
        {
            return $this->idMarcas;
        }

        public function setIdMarcas($idMarcas)
        {
            $this->idMarcas =$idMarcas;
        }

        public function getCategoria(): int
        {
            return $this->categoria;
        }

        public function setCategoria(int $categoria)
        {
            $this->categoria = $categoria;
        }

    }
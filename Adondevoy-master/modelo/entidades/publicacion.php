<?php

class Publicacion
{
    private $id;
    private $titulo;
    private $descripcion;
    private $precio;
    private $categoria;
    private $usuario;
    private $tipo;
 

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }


    public function getTitulo()
    {
        return $this->titulo;
    }


    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }


    public function getDescrpcion()
    {
        return $this->descrpcion;
    }


    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    public function getCategoria()
    {
        return $this->categoria;
    }


    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
    }


    public function getUsuario()
    {
        return $this->usuario;
    }


    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }


    public function getTipo()
    {
        return $this->tipo;
    }


    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }
}
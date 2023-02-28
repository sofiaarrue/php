<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Persona {
    protected $dni;
    protected $nombre;
    protected $correo;
    protected $celular;

    public function __get($propiedad)
    {
        return $this->$propiedad;
    }

    public function __set($propiedad, $valor)
    {
        $this->$propiedad = $valor;
    }
}

class Tarjeta {
    private $nombreTitular;
    private $numero;
    private $fechaDesde;
    private $fechaVto;
    private $tipo;
    private $cvv;

    public function __get($propiedad)
    {
        return $this->$propiedad;
    }

    public function __set($propiedad, $valor)
    {
        $this->$propiedad = $valor;
    }
}

class Cliente {
    private $aTarjetas = array();
    private function __construct(){
        $this->bActivo = true;
        $this->fechaAlta = date("dd-mm-aaaa");
    }
    private $fechaBaja;

    public function __get($propiedad)
    {
        return $this->$propiedad;
    }

    public function __set($propiedad, $valor)
    {
        $this->$propiedad = $valor;
    }

    public function agregarTarjeta($tarjeta){
        $this->aTarjetas[] = $tarjeta;
    }

    public function darDeBaja(){

    }

    public function imprimir(){
        
    }
}


?>
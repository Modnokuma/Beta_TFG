<?php

class Base_Action_Validations
{
    protected $estructura;
    protected $valores;
    protected $listaAtributos;
    protected $controlador;

    public function action_validations($estructura, $valores, $listaAtributos)
    {
        $respuesta = true;
        $this->estructura = $estructura;
        $this->valores = $valores;
        $this->listaAtributos = $listaAtributos;
        

        $same_user = $this->same_user_name();
        
        if ($same_user !== true) {
            return $same_user;
        }
        
        return $respuesta;
    }

    public function same_user_name()
    {
    
        $controlador = variables['controlador'];
        include_once "./app/" . $controlador . "/" . $controlador . "_SERVICE.php";

        $controlador .= "_SERVICE";
        $service = new $controlador($this->estructura);

        $accion = "same_user";
        $prueba = $service->$accion();

        return $prueba;
    }
    
}

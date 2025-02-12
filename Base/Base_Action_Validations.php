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

        
        foreach ($this->listaAtributos as $atributo) {
            
            // unique, pk (no repeat values)
            if ((isset($this->valores[$atributo])) && ((action == 'ADD') || action == 'EDIT')) {
  
                if ((isset($this->estructura['attributes'][$atributo]['pk']))
                    ||
                    (isset($this->estructura['attributes'][$atributo]['unique']))
                    )
                {
                    $resp = $this->action_validate_pk_unique();
                    if ($resp !== true){
                        return $resp;
                    }
                }
            }

            // foreign key (error si valor no esta en la otra tabla)
            // si foreign key para un atributo
            if ((isset($this->estructura['attributes'][$atributo]['foreign_key']))){

                $entidad = $this->estructura['attributes'][$atributo]['foreign_key']['table'];
                $campo = $this->estructura['attributes'][$atributo]['foreign_key']['attribute'];
                $resp = $this->exist_in_other_entity($entidad, $campo, $atributo, $this->valores[$atributo]);
                if ($resp !== true){
                    return "construyo respuesta para error";
                }
            }
        }
        
/*
        $same_user = $this->same_user_name();
        
        if ($same_user !== true) {
            return $same_user;
        }
*/        
        return $respuesta;

    }
    public function exist_in_other_entity($entidad, $campo, $atributo, $valorvariable){

        include_once "./app/" . $entidad . "/" . $entidad . "_SERVICE.php";
        include_once "./app/" . $entidad . "/" . $entidad . "_description.php";

        $nombreestructura = $entidad.'_description';
        $contenidoestructura = $$nombreestructura;

        $entidad_service = $entidad."_SERVICE";
        $service = new $entidad_service($contenidoestructura, 'SEARCH', array($campo => $valorvariable));
        $resultado = $service->SEARCH();

        if ($resultado['code'] === 'RECORDSET_DATOS'){
            return true;
        }else{
            return false;
        }

    }

    public function action_validate_pk_unique(){
        return true;
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

<?php

include_once './Base/Base_Validations.php';

class Base_CONTROLLER extends Base_Validations
{
    public function __construct()
    {

        $controlador = variables['controlador'];

        include_once "./app/" . $controlador . "/" . $controlador . "_SERVICE.php";
        include_once "./app/" . $controlador . "/" . $controlador . "_description.php";
        
        $controlador .= "_SERVICE";
        $description = variables['controlador'] . '_description';
       
        // Inicializar las propiedades heredadas
        $this->estructura = $$description;
        $this->valores = variables;
        $this->listaAtributos = array_keys($this->estructura['attributes']);
        $this->controlador = variables['controlador'];
        
        $respuesta_validations = $this->validations();
       
        if (is_array($respuesta_validations)) {
            //  Si existen errores
            responder($respuesta_validations);
        }
        
        /*if (method_exists(get_class($this),"data_attribute_personalize")){

            $this->data_attribute_personalize();
        
        }*/
       

        $service = new $controlador($this->estructura, action ,$this->valores, variables['controlador']);

        $accion = action;
        
        responder($service->$accion());
    }
}

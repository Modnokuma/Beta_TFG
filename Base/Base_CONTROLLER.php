<?php

include './Base/Base_Validations.php';

class Base_CONTROLLER extends Base_Validations
{
    public function __construct()
    {

        $controlador = variables['controlador'];

        include "./app/" . $controlador . "/" . $controlador . "_SERVICE.php";
        include "./app/" . $controlador . "/" . $controlador . "_description.php";
        
        $controlador .= "_SERVICE";
        $description = variables['controlador'] . '_description';

        // Inicializar las propiedades heredadas
        $this->estructura = $$description;
        $this->valores = variables;
        $this->listaAtributos = array_keys($this->estructura['attributes']);

        $service = new $controlador($this->estructura);
        $respuesta_validations = $this->validations();

        if (is_array($respuesta_validations)) {
            //  Si existen errores
            responder($respuesta_validations);
        }

        $accion = action;
        responder($service->$accion());
    }
}

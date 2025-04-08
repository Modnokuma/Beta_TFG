<?php

include_once './Base/Base_Validations.php';

class Base_CONTROLLER extends Base_Validations
{
    public function __construct()
    {

        $controlador = variables['controlador'];
        $serviceFile = "./app/" . $controlador . "/" . $controlador . "_SERVICE.php";
        include_once "./app/" . $controlador . "/" . $controlador . "_description.php";

        // Comprobar si los archivos existen antes de incluirlos
        if (!file_exists($serviceFile)) {
            $controlador = "Base_SERVICE";
            include_once "./Base/Base_SERVICE.php";
        } else {
            $controlador .= "_SERVICE";
            include_once $serviceFile;
        }

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

        // Instancia del service. No despistarse al llamarse la variable controlador
        $service = new $controlador($this->estructura, action, $this->valores, $this->controlador);
        $accion = action;
        responder($service->$accion());
    }
}

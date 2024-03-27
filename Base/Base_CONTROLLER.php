<?php

class Base_CONTROLLER{

    public function __construct(){

        $controlador =  variables['controlador'];
        include "./app/".$controlador."/".$controlador."_SERVICE.php";
        include "./app/".$controlador."/".$controlador."_description.php";
        $controlador .= "_SERVICE";
        $service = new $controlador;

        $action = action;
        responder($service->$action());

    }

}

?>
<?php

class Base_SERVICE{

    public $model;
    public $listaAtributos = array();

    function __construct(){
        
        $accion = action;
        $controlador =  variables['controlador'];

        include "./app/".$controlador."/".$controlador."_MODEL.php";
                  
        $modelo = $controlador."_MODEL"; 
        $this->inicializarRest();

        $this->model = new $modelo;
 

    }

    function ADD(){

        return $this->model->ADD();
        
    }

    function EDIT(){
        
        return $this->model->EDIT();
    
    }

    function SEARCH(){

        return $this->model->SEARCH();
        
    }

    function DELETE(){

        return $this->model->DELETE();
        
    }

    function otraaction(){

        return 'llegue a otra accion del service';

    }

}

?>
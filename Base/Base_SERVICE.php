<?php

class Base_SERVICE{

    public $model;
    public $listaAtributos = array();

    function __construct(){
        
        $accion = action;
        $controlador = variables['controlador'];

        $this->inicializarRest();
    }

    function crearModelo($controlador){
        //controlador es el nombre de la tabla
        include "./app/".$controlador."/".$controlador."_MODEL.php";
        $modelo = $controlador."_MODEL"; 
        $this->model = new $modelo;

        //Si existe la lista de atributos de la entidad se llama a este metodo
        if(isset($this->listaAtributos)){
            $this->rellenarModelo($this->listaAtributos);
        }
        return $this->model;
    }

    //
    function rellenarModelo($listaAtributos){
        
        foreach ($listaAtributos as $atributo){
            //Si no viene el atributo de la entidad en lo que recibimos
            if (action == 'SEARCH'){
                if(!isset($_GET[$atributo])){
                    //Aqui deberiamos comprobar si tiene un valor predeterminado. Hacerlo en un futuro.
                    $_GET[$atributo] = '';
                }
                $this->model->valores[$atributo] = $_GET[$atributo];
            }
            else{
                if(!isset($_POST[$atributo])){
                    //Aqui deberiamos comprobar si tiene un valor predeterminado. Hacerlo en un futuro.
                    $_POST[$atributo] = '';
                }
                $this->model->valores[$atributo] = $_POST[$atributo];
            }
            
        }

        $this->model->listaAtributos = $this->listaAtributos;

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
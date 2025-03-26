<?php

class Base_SERVICE
{

    public $model;
    public $listaAtributos = array();
    public $valores = array();
    public $estructura;
    public $accion;
    public $controlador;
    public $prueba;

    function __construct($estructura, $action, $variables)
    {

        $this->accion = $action;
        $this->valores = $variables;
        
        $this->controlador = variables['controlador'];
        $this->estructura = $estructura;
        $this->listaAtributos = array_keys($this->estructura['attributes']);
        //$this->inicializarRest();
        $this->model = $this->crearModelo($this->controlador); // crear en base service en base al nombre de la clase instanciada
    }

    function crearModelo($controlador)
    {

        //controlador es el nombre de la tabla
        include_once "./app/" . $controlador . "/" . $controlador . "_MODEL.php";
        $modelo = $controlador . "_MODEL";
        $this->model = new $modelo;


        //Si existe la lista de atributos de la entidad se llama a este metodo
        if (isset($this->listaAtributos)) {

            $this->rellenarModelo($this->listaAtributos);
        }

        $this->model->estructura = $this->estructura;
        $this->model->tabla = $controlador; 
        // aqui deberiamos rellenar el atributo $this->model->clavesPrimarias con el array de PK  

        return $this->model;
    }

    function rellenarModelo($listaAtributos)
    {

        foreach ($listaAtributos as $atributo) {

            if (!isset($this->valores[$atributo])) {
                //Aqui deberiamos comprobar si tiene un valor predeterminado. Hacerlo en un futuro.
                if (isset($this->estructura['attributes'][$atributo]['default_value'])) {
                    $this->valores[$atributo] = $this->estructura['attributes'][$atributo]['default_value'];
                } else {
                    $this->valores[$atributo] = '';
                }
            }

            $this->model->valores[$atributo] = $this->valores[$atributo];
        }

        $this->model->listaAtributos = $this->listaAtributos;
    }

    function ADD()
    {

        return $this->model->ADD();
    }

    function EDIT()
    {

        return $this->model->EDIT();
    }

    function SEARCH()
    {

        return $this->model->SEARCH();
    }
    function SEARCH_BY()
    {

        return $this->model->SEARCH_BY();
    }


    function DELETE()
    {

        return $this->model->DELETE();
    }

    function ejecutarPersonalizedQuery($query)
    {

        return $this->model->personalized_query($query);

    }
}

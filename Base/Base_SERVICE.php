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

    function __construct($estructura, $action, $variables, $controlador)
    {
        
        $this->accion = $action;
        
        //¡¡  echo "accion: ".action. "\n";
        //  echo "variables: ".var_dump($variables). "\n";
        //  echo "estructura: ".var_dump($estructura). "\n";
        $this->valores = $variables;

        $this->controlador = $controlador;
        // echo "controlador: " . $this->controlador . "\n";
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
        $clavesPrimarias = array();
        foreach ($listaAtributos as $atributo) {

            if (!isset($this->valores[$atributo])) {
                //Aqui deberiamos comprobar si tiene un valor predeterminado. Hacerlo en un futuro.
                if (isset($this->estructura['attributes'][$atributo]['default_value'])) {
                    $this->valores[$atributo] = $this->estructura['attributes'][$atributo]['default_value'];
                } else {
                    $this->valores[$atributo] = '';
                }
            }
            //Si el atributo es una PK, lo guardamos en el array de claves primarias
            if (isset($this->estructura['attributes'][$atributo]['pk']) && isset($this->valores[$atributo])) {
                $clavesPrimarias[$atributo] = $this->valores[$atributo];
            }

            $this->model->valores[$atributo] = $this->valores[$atributo];
        }

        $this->model->clavesPrimarias = $clavesPrimarias;
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

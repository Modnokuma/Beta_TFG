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

        if ($action !== '') {
            $this->accion = $action;
        } else {
            $this->accion = action;
        }
        if ($variables !== '') {
            
            $this->valores = $variables;
            //echo "VALORES: ";
            //var_dump($this->valores);
        } else {
            $this->valores = variables;
        }

        $this->controlador = variables['controlador'];
        $this->estructura = $estructura;
        $this->listaAtributos = array_keys($this->estructura['attributes']);
        $this->inicializarRest();
    }
    function ejecutarPersonalizedQuery($query)
    {
        return $this->model->personalized_query($query);
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

        return $this->model;
    }

    //
    function rellenarModelo($listaAtributos)
    {

        foreach ($listaAtributos as $atributo) {

            if (!isset($this->valores[$atributo])) {
                //Aqui deberiamos comprobar si tiene un valor predeterminado. Hacerlo en un futuro.
                $this->valores[$atributo] = '';
            }

            //echo $_POST[$atributo];
            $this->model->valores[$atributo] = $this->valores[$atributo];
        }

        $this->model->listaAtributos = $this->listaAtributos;
        //$this->model->listaValores = array_slice(array_values($_POST), 1); // El primero es controlador por eso nos lo cargamos

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

    function otraaction()
    {

        return 'llegue a otra accion del service';
    }

    function same_user()
    {

        return $this->model->same_user();
    }
}
